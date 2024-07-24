<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( ! class_exists( 'Qi_Blocks_Framework_Global_Styles' ) ) {
	class Qi_Blocks_Framework_Global_Styles {
		private static $instance;

		public function __construct() {
			// Create global options.
			add_action( 'init', array( $this, 'add_options' ) );

			// Extend main rest api routes with new case.
			add_filter( 'qi_blocks_filter_rest_api_routes', array( $this, 'add_rest_api_routes' ) );

			// Localize main editor js script with additional variables.
			add_filter( 'qi_blocks_filter_localize_main_editor_js', array( $this, 'localize_script' ) );

			// Add page inline styles.
			add_action( 'wp_enqueue_scripts', array( $this, 'add_page_inline_style' ), 20 ); // permission 20 is set in order to be after the main css file and after the global typography styles (@see Qi_Blocks_Global_Settings_Typography)

			// Set Qode themes Gutenberg styles.
			add_action( 'enqueue_block_editor_assets', array( $this, 'set_themes_gutenberg_styles' ), 15 );
		}

		/**
		 * Module class instance
		 *
		 * @return Qi_Blocks_Framework_Global_Styles
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function localize_script( $global ) {
			$global['currentPageID']     = 0;
			$global['currentPageStyles'] = array();

			return $global;
		}

		public function add_options() {
			if ( ! get_option( 'qi_blocks_global_styles' ) ) {
				add_option(
					'qi_blocks_global_styles',
					array(
						'posts'     => array(),
						'widgets'   => array(),
						'templates' => array(),
						'undefined' => array(),
					)
				);
			}
		}

		public function add_rest_api_routes( $routes ) {
			$routes['get-global-styles'] = array(
				'route'               => 'get-styles',
				'methods'             => WP_REST_Server::READABLE,
				'callback'            => array( $this, 'get_global_styles_callback' ),
				'permission_callback' => function () {
					return current_user_can( 'edit_posts' );
				},
			);

			$routes['update-global-styles'] = array(
				'route'               => 'update-styles',
				'methods'             => WP_REST_Server::CREATABLE,
				'callback'            => array( $this, 'update_global_styles_callback' ),
				'permission_callback' => function () {
					return current_user_can( 'edit_posts' );
				},
				'args'                => array(
					'options' => array(
						'required'          => true,
						'validate_callback' => function ( $param ) {
							// Simple solution for validation can be 'is_array' value instead of callback function.
							return is_array( $param ) ? $param : (array) $param;
						},
					),
				),
			);

			return $routes;
		}

		public function get_global_styles_callback() {

			if ( empty( $_GET ) ) {
				qi_blocks_get_ajax_status( 'error', esc_html__( 'Get method is invalid', 'qi-blocks' ), array() );
			} else {
				$options = get_option( 'qi_blocks_global_styles' );
				$page_id = isset( $_GET['page_id'] ) && ! empty( $_GET['page_id'] ) ? sanitize_text_field( $_GET['page_id'] ) : '';

				if ( isset( $options ) ) {

					if ( isset( $options['widgets'] ) && 'widget' === $page_id ) {
						qi_blocks_get_ajax_status( 'success', esc_html__( 'Options are successfully returned', 'qi-blocks' ), $options['widgets'] );
					} elseif ( isset( $options['templates'] ) && 'template' === $page_id ) {
						qi_blocks_get_ajax_status( 'success', esc_html__( 'Options are successfully returned', 'qi-blocks' ), $options['templates'] );
					} elseif ( isset( $options['posts'] ) && '' !== $page_id && isset( $options['posts'][ $page_id ] ) ) {
						qi_blocks_get_ajax_status( 'success', esc_html__( 'Options are successfully returned', 'qi-blocks' ), $options['posts'][ $page_id ] );
					} else {
						qi_blocks_get_ajax_status( 'success', esc_html__( 'Options are successfully returned', 'qi-blocks' ), $options['undefined'] );
					}
				} else {
					qi_blocks_get_ajax_status( 'error', esc_html__( 'Options are invalid', 'qi-blocks' ), array() );
				}
			}
		}

		public function update_global_styles_callback( $response ) {

			if ( ! isset( $response ) || empty( $response->get_body() ) ) {
				qi_blocks_get_ajax_status( 'error', esc_html__( 'Options can\'t be updated', 'qi-blocks' ) );
			} else {
				$response_data  = json_decode( $response->get_body() );
				$global_options = get_option( 'qi_blocks_global_styles' );

				if ( ! empty( $response_data->options ) && isset( $global_options ) ) {
					$options = $response_data->options;
					$page_id = isset( $response_data->page_id ) && ! empty( $response_data->page_id ) ? esc_attr( $response_data->page_id ) : '';

					if ( isset( $global_options['widgets'] ) && 'widget' === $page_id ) {
						$global_options['widgets'] = $options;
					} elseif ( isset( $global_options['templates'] ) && 'template' === $page_id ) {
						$global_options['templates'] = $options;
					} elseif ( isset( $global_options['posts'] ) && '' !== $page_id ) {
						$global_options['posts'][ $page_id ] = $options;
					} else {
						$global_options['undefined'] = $options;
					}

					update_option( 'qi_blocks_global_styles', $global_options );

					qi_blocks_get_ajax_status( 'success', esc_html__( 'Options are saved', 'qi-blocks' ) );
				} else {
					qi_blocks_get_ajax_status( 'error', esc_html__( 'Options are invalid', 'qi-blocks' ) );
				}
			}
		}

		public function add_page_inline_style() {
			$global_styles = get_option( 'qi_blocks_global_styles' );

			if ( ! empty( $global_styles ) ) {
				$page_id = apply_filters( 'qi_blocks_filter_page_inline_style_page_id', get_queried_object_id() );
				$styles  = array();
				$fonts   = array(
					'family' => array(),
					'weight' => array(),
					'style'  => array(),
				);

				$update               = false;
				$include_italic_fonts = false;
				$templates_selector   = 'body ';

				// Widgets blocks.
				if ( isset( $global_styles['widgets'] ) && ! empty( $global_styles['widgets'] ) ) {
					foreach ( $global_styles['widgets'] as $block_style ) {

						// If the selector key is not allowed skip that styles.
						if ( strpos( $block_style->key, 'qodef-widget-block' ) === false ) {
							continue;
						}

						$block_style_fonts = (array) $block_style->fonts;
						foreach ( array_keys( $fonts ) as $font_key ) {
							if ( array_key_exists( $font_key, $block_style_fonts ) ) {
								$fonts[ $font_key ] = array_merge( $fonts[ $font_key ], $block_style_fonts[ $font_key ] );
							}
						}

						foreach ( $block_style->values as $block_element ) {

							if ( ! empty( $block_element->styles ) ) {
								$styles[] = $templates_selector . $block_element->selector . '{' . $block_element->styles . '}';
							}

							if ( isset( $block_element->tablet_styles ) && ! empty( $block_element->tablet_styles ) ) {
								$styles[] = '@media (max-width: 1024px) { ' . $templates_selector . $block_element->selector . '{' . $block_element->tablet_styles . '} }';
							}

							if ( isset( $block_element->mobile_styles ) && ! empty( $block_element->mobile_styles ) ) {
								$styles[] = '@media (max-width: 680px) { ' . $templates_selector . $block_element->selector . '{' . $block_element->mobile_styles . '} }';
							}

							if ( isset( $block_element->custom_styles ) && ! empty( $block_element->custom_styles ) ) {
								foreach ( $block_element->custom_styles as $custom_style ) {
									if ( isset( $custom_style->value ) && ! empty( $custom_style->value ) ) {
										$styles[] = '@media (max-width: ' . $custom_style->key . 'px) { ' . $templates_selector . $block_element->selector . '{' . $custom_style->value . '} }';
									}
								}
							}
						}
					}
				}

				// Template blocks.
				if ( isset( $global_styles['templates'] ) && ! empty( $global_styles['templates'] ) ) {
					foreach ( $global_styles['templates'] as $block_style ) {

						// If the selector key is not allowed skip that styles.
						if ( strpos( $block_style->key, 'qodef-template-block' ) === false ) {
							continue;
						}

						$block_style_fonts = (array) $block_style->fonts;
						foreach ( array_keys( $fonts ) as $font_key ) {
							if ( array_key_exists( $font_key, $block_style_fonts ) ) {
								$fonts[ $font_key ] = array_merge( $fonts[ $font_key ], $block_style_fonts[ $font_key ] );
							}
						}

						foreach ( $block_style->values as $block_element ) {

							if ( ! empty( $block_element->styles ) ) {
								$styles[] = $templates_selector . $block_element->selector . '{' . $block_element->styles . '}';
							}

							if ( isset( $block_element->tablet_styles ) && ! empty( $block_element->tablet_styles ) ) {
								$styles[] = '@media (max-width: 1024px) { ' . $templates_selector . $block_element->selector . '{' . $block_element->tablet_styles . '} }';
							}

							if ( isset( $block_element->mobile_styles ) && ! empty( $block_element->mobile_styles ) ) {
								$styles[] = '@media (max-width: 680px) { ' . $templates_selector . $block_element->selector . '{' . $block_element->mobile_styles . '} }';
							}

							if ( isset( $block_element->custom_styles ) && ! empty( $block_element->custom_styles ) ) {
								foreach ( $block_element->custom_styles as $custom_style ) {
									if ( isset( $custom_style->value ) && ! empty( $custom_style->value ) ) {
										$styles[] = '@media (max-width: ' . $custom_style->key . 'px) { ' . $templates_selector . $block_element->selector . '{' . $custom_style->value . '} }';
									}
								}
							}
						}
					}
				}

				// Post blocks.
				if ( isset( $global_styles['posts'][ $page_id ] ) && ! empty( $global_styles['posts'][ $page_id ] ) ) {
					$get_page_content = trim( get_the_content( null, false, $page_id ) );

					// Check if the content contains reusable blocks and expand the page content with the real reusable content.
					preg_match_all( '({[\s]?[\'\"]ref[\'\"]:(.*?)[\s]?})', $get_page_content, $reusable_matches );

					if ( ! empty( $reusable_matches ) && isset( $reusable_matches[1] ) && ! empty( $reusable_matches[1] ) ) {
						$usable_content = '';

						if ( is_array( $reusable_matches[1] ) ) {
							foreach ( $reusable_matches[1] as $reusable_match_item ) {
								$usable_content .= get_the_content( null, false, intval( $reusable_match_item ) );
							}
						} else {
							$usable_content = get_the_content( null, false, intval( $reusable_matches[1] ) );
						}

						if ( ! empty( $usable_content ) ) {
							$get_page_content .= $usable_content;
						}
					}

					// Check if the content contains italic html selector and include corresponding font weights and styles for it.
					if ( strpos( $get_page_content, '<em>' ) !== false ) {
						$include_italic_fonts = true;
					}

					foreach ( $global_styles['posts'][ $page_id ] as $block_index => $block_style ) {
						$block_style_fonts = (array) $block_style->fonts;

						foreach ( array_keys( $fonts ) as $font_key ) {
							if ( array_key_exists( $font_key, $block_style_fonts ) ) {
								$fonts[ $font_key ] = array_merge( $fonts[ $font_key ], $block_style_fonts[ $font_key ] );
							}
						}

						// Remove unnecessary styles from the database if IDS not match or values are empty, because Gutenberg can change the block ID.
						if ( ! empty( $get_page_content ) && property_exists( $block_style, 'key' ) ) {
							$blocks_removed = false;

							if ( empty( $block_style->values ) ) {
								$blocks_removed = true;
							} elseif ( ! empty( $block_style->key ) && strpos( $get_page_content, $block_style->key ) === false ) {
								$blocks_removed = true;
							}

							if ( $blocks_removed ) {
								unset( $global_styles['posts'][ $page_id ][ $block_index ] );

								$update = true;
							}
						}

						foreach ( $block_style->values as $block_element ) {

							if ( ! empty( $block_element->styles ) ) {
								$styles[] = $block_element->selector . '{' . $block_element->styles . '}';
							}

							if ( isset( $block_element->tablet_styles ) && ! empty( $block_element->tablet_styles ) ) {
								$styles[] = '@media (max-width: 1024px) { ' . $block_element->selector . '{' . $block_element->tablet_styles . '} }';
							}

							if ( isset( $block_element->mobile_styles ) && ! empty( $block_element->mobile_styles ) ) {
								$styles[] = '@media (max-width: 680px) { ' . $block_element->selector . '{' . $block_element->mobile_styles . '} }';
							}

							if ( isset( $block_element->custom_styles ) && ! empty( $block_element->custom_styles ) ) {
								foreach ( $block_element->custom_styles as $custom_style ) {
									if ( isset( $custom_style->value ) && ! empty( $custom_style->value ) ) {
										$styles[] = '@media (max-width: ' . $custom_style->key . 'px) { ' . $block_element->selector . '{' . $custom_style->value . '} }';
									}
								}
							}
						}
					}

					// Update global options indexes.
					if ( $update ) {
						$global_styles['posts'][ $page_id ] = array_values( $global_styles['posts'][ $page_id ] );
					}
				}

				// Enqueue Google Fonts.
				if ( isset( $fonts['family'] ) && ! empty( $fonts['family'] ) ) {
					$this->include_google_fonts( $fonts, $include_italic_fonts );
				}

				// Update global options.
				if ( $update ) {
					update_option( 'qi_blocks_global_styles', $global_styles );
				}

				// Load styles.
				if ( ! empty( $styles ) ) {
					wp_add_inline_style( 'qi-blocks-main', implode( ' ', $styles ) );
				}
			}
		}

		public function include_google_fonts( $fonts, $include_italic_fonts = false ) {
			$general_options      = get_option( QI_BLOCKS_GENERAL_OPTIONS, array() );
			$disable_google_fonts = ! empty( $general_options ) && isset( $general_options['disable_google_fonts'] );

			// Disable Google Fonts loading if global option is on.
			if ( $disable_google_fonts ) {
				return;
			}

			if ( ! isset( $fonts['family'] ) || empty( $fonts['family'] ) || ! is_array( $fonts['family'] ) ) {
				return;
			}

			$default_font_weight = isset( $fonts['weight'] ) && is_array( $fonts['weight'] ) ? array_unique( $fonts['weight'] ) : array();

			if ( ! empty( $default_font_weight ) && ( ( isset( $fonts['style'] ) && is_array( $fonts['style'] ) && in_array( 'italic', $fonts['style'] ) ) || $include_italic_fonts ) ) {
				foreach ( $default_font_weight as $font_weight_value ) {
					$default_font_weight[] = $font_weight_value . 'i';
				}
			}

			$fonts_array     = array_unique( apply_filters( 'qi_blocks_filter_google_fonts_list', $fonts['family'] ) );
			$font_weight_str = implode( ',', array_unique( apply_filters( 'qi_blocks_filter_google_fonts_weight_list', $default_font_weight ) ) );
			$font_subset_str = implode( ',', array_unique( apply_filters( 'qi_blocks_filter_google_fonts_subset_list', array() ) ) );

			if ( ! empty( $fonts_array ) ) {
				$modified_default_font_family = array();

				foreach ( $fonts_array as $font ) {
					$modified_default_font_family[] = $font . ':' . $font_weight_str;
				}

				$default_font_string = implode( '|', $modified_default_font_family );

				$fonts_full_list_args = array(
					'family'  => urlencode( $default_font_string ),
					'subset'  => urlencode( $font_subset_str ),
					'display' => 'swap',
				);

				$google_fonts_url = add_query_arg( $fonts_full_list_args, 'https://fonts.googleapis.com/css' );

				wp_enqueue_style( 'qi-blocks-google-fonts', esc_url_raw( $google_fonts_url ), array(), '1.0.0' );
			}
		}

		public function set_themes_gutenberg_styles() {
			$upload_dir = wp_upload_dir( null, false );

			if ( ! empty( $upload_dir ) && ini_get( 'allow_url_fopen' ) ) {
				// Set default plugin folder path.
				$uploads_qi_dir     = $upload_dir['basedir'] . '/qi-blocks';
				$uploads_qi_dir_url = $upload_dir['baseurl'] . '/qi-blocks';

				// Create a new folder inside uploads.
				if ( ! file_exists( trailingslashit( $uploads_qi_dir ) ) ) {
					wp_mkdir_p( $uploads_qi_dir );
				}

				// Get all loaded Styles.
				global $wp_styles;

				foreach ( $wp_styles->queue as $style ) :
					// Check style handle is our latest framework or previous one.
					if ( 'qi-gutenberg-blocks-style' !== $style && strpos( $style, '-gutenberg-blocks-style' ) !== false || strpos( $style, '-modules-admin-styles' ) !== false ) {
						$current_style = $wp_styles->registered[ $style ];

						// Check the current style.
						if ( ! empty( $current_style ) ) {
							// Get activated theme data.
							$current_theme      = wp_get_theme();
							$current_theme_name = esc_attr( str_replace( ' ', '-', strtolower( $current_theme->get( 'Name' ) ) ) );

							// Get current file location.
							$current_style_src       = $current_style->src;
							$current_style_info      = pathinfo( $current_style_src );
							$current_style_name      = $current_style_info['filename'];
							$current_style_extension = $current_style_info['extension'];
							$current_style_full_name = $current_theme_name . '-' . $current_style_name . '.' . $current_style_extension;

							// Set new file location.
							$filename     = $uploads_qi_dir . '/' . $current_style_full_name;
							$filename_url = $uploads_qi_dir_url . '/' . $current_style_full_name;

							// If a new file does not exist, create it.
							if ( ! file_exists( $filename ) ) {
								copy( $current_style_src, $filename ); // @codingStandardsIgnoreLine.

								// Get current style content.
								$current_style_content = @file_get_contents( $current_style_src );

								if ( ! empty( $current_style_content ) ) {
									$file_handle = @fopen( $filename, 'w+' ); // phpcs:ignore WordPress.PHP.NoSilencedErrors.Discouraged, WordPress.WP.AlternativeFunctions.file_system_read_fopen

									if ( $file_handle ) {
										@fwrite( $file_handle, str_replace( '!important', '', $current_style_content ) ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_system_read_fwrite
										@fclose( $file_handle ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_system_read_fclose
									}

									// Dequeue current theme styles.
									wp_dequeue_style( $style );

									// Enqueue new theme styles.
									wp_enqueue_style( $style . '-qi-blocks', $filename_url );
								}
							} else {

								// Check if the theme style updated.
								if ( ! get_transient( 'qi_blocks_check_theme_gutenberg_style' ) ) {
									// Set time until expiration in seconds. Default value is 1 day.
									set_transient( 'qi_blocks_check_theme_gutenberg_style', 1, 86400 );

									// Get current style content.
									$current_style_content = @file_get_contents( $current_style_src );

									if ( ! empty( $current_style_content ) ) {
										// Get new files data.
										$new_style_size           = filesize( $filename );
										$current_theme_style      = str_replace( '!important', '', $current_style_content );
										$current_theme_style_size = strlen( $current_theme_style );

										if ( $current_theme_style_size > $new_style_size ) {
											$file_handle = @fopen( $filename, 'w+' ); // phpcs:ignore WordPress.PHP.NoSilencedErrors.Discouraged, WordPress.WP.AlternativeFunctions.file_system_read_fopen

											if ( $file_handle ) {
												@fwrite( $file_handle, $current_theme_style ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_system_read_fwrite
												@fclose( $file_handle ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_system_read_fclose
											}
										}
									}
								}

								// Dequeue current theme styles.
								wp_dequeue_style( $style );

								// Enqueue new theme styles.
								wp_enqueue_style( $style . '-qi-blocks', $filename_url );
							}
						}
					}
				endforeach;
			}
		}
	}

	Qi_Blocks_Framework_Global_Styles::get_instance();
}
