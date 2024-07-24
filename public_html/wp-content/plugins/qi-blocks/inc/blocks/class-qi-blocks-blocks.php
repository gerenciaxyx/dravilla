<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Qi_Blocks_Blocks' ) ) {
	class Qi_Blocks_Blocks {
		private $blocks_namespace;
		private $block_type;
		private $block_name;
		private $block_title;
		private $block_subcategory;
		private $block_demo_url;
		private $block_video;
		private $block_documentation;
		private $block_style;
		private $block_script;
		private $block_editor_style;
		private $block_editor_script;
		private $block_3rd_party_scripts = array();
		private $block_options           = array();

		public function __construct() {
			// Get block status.
			$block_flag   = true;
			$block_status = apply_filters( 'qi_blocks_filter_block_status', false );

			// Set namespace for blocks.
			$this->set_blocks_namespace( 'qi-blocks' );

			// Add block into global list.
			if ( ! empty( $this->get_block_title() ) ) {

				if ( in_array( $this->get_block_type(), array( 'premium', 'landing' ), true ) && ! $block_status ) {
					$block_flag = false;
				}

				if ( $block_flag ) {
					Qi_Blocks_Blocks_List::get_instance()->add_block(
						array(
							'key'   => $this->get_block_name(),
							'value' => array(
								'type'          => $this->get_block_type(),
								'title'         => $this->get_block_title(),
								'subcategory'   => $this->get_block_subcategory(),
								'demo'          => $this->get_block_demo_url(),
								'documentation' => $this->get_block_documentation(),
								'video'         => $this->get_block_video(),
							),
						)
					);
				}
			}

			// Register block.
			add_action( 'init', array( $this, 'register_block' ) );

			// Loads core block assets only when they are rendered on the page - WordPress 5.8.
			add_filter( 'should_load_separate_core_block_assets', '__return_true' );

			// Enqueue block 3rd party plugin's assets.
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_3rd_party_scripts' ) );
			add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_3rd_party_editor_scripts' ) );
		}

		public function get_blocks_namespace() {
			return $this->blocks_namespace;
		}

		public function set_blocks_namespace( $blocks_namespace ) {
			$this->blocks_namespace = $blocks_namespace;
		}

		public function get_block_type() {
			return $this->block_type;
		}

		public function set_block_type( $block_type ) {
			$this->block_type = $block_type;
		}

		public function get_block_name() {
			return $this->block_name;
		}

		public function set_block_name( $block_name ) {
			$this->block_name = $block_name;
		}

		public function get_block_title() {
			return $this->block_title;
		}

		public function set_block_title( $block_title ) {
			$this->block_title = $block_title;
		}

		public function get_block_subcategory() {
			return $this->block_subcategory;
		}

		public function set_block_subcategory( $block_subcategory ) {
			$this->block_subcategory = $block_subcategory;
		}

		public function get_block_demo_url() {
			return $this->block_demo_url;
		}

		public function set_block_demo_url( $block_demo_url ) {
			$this->block_demo_url = $block_demo_url;
		}

		public function get_block_video() {
			return $this->block_video;
		}

		public function set_block_video( $block_video ) {
			$this->block_video = $block_video;
		}

		public function get_block_documentation() {
			return $this->block_documentation;
		}

		public function set_block_documentation( $block_documentation ) {
			$this->block_documentation = $block_documentation;
		}

		public function get_block_style() {
			return $this->block_style;
		}

		public function set_block_style( $block_style ) {
			$this->block_style = $block_style;
		}

		public function get_block_script() {
			return $this->block_script;
		}

		public function set_block_script( $block_script ) {
			$this->block_script = $block_script;
		}

		public function get_block_editor_style() {
			return $this->block_editor_style;
		}

		public function set_block_editor_style( $block_editor_style ) {
			$this->block_editor_style = $block_editor_style;
		}

		public function get_block_editor_script() {
			return $this->block_editor_script;
		}

		public function set_block_editor_script( $block_editor_script ) {
			$this->block_editor_script = $block_editor_script;
		}

		public function get_block_3rd_party_scripts() {
			return $this->block_3rd_party_scripts;
		}

		public function set_block_3rd_party_scripts( $block_3rd_party_scripts ) {
			$this->block_3rd_party_scripts = $block_3rd_party_scripts;
		}

		public function get_block_options() {
			return $this->block_options;
		}

		public function set_block_options( $block_options ) {
			$this->block_options = $block_options;
		}

		public function register_block() {
			$disabled_blocks = get_option( QI_BLOCKS_DISABLED_BLOCKS );
			$block_status    = apply_filters( 'qi_blocks_filter_block_status', false );

			// Prevent blocks loading if it's disabled.
			if ( ! empty( $disabled_blocks ) && key_exists( $this->get_block_name(), $disabled_blocks ) ) {
				return;
			}

			if ( in_array( $this->get_block_type(), array( 'premium', 'landing' ), true ) && ! $block_status ) {
				return;
			}

			// Get blocks options.
			$block_options = $this->get_block_options();

			// Set blocks scripts.
			$this->set_blocks_scripts();

			register_block_type(
				$this->get_blocks_namespace() . '/' . $this->get_block_name(),
				array_merge(
					array(
						'style'         => $this->get_block_style(),
						'script'        => $this->get_block_script(),
						'editor_style'  => $this->get_block_editor_style(),
						'editor_script' => $this->get_block_editor_script(),
					),
					$block_options
				)
			);
		}

		public function set_blocks_scripts() {
			$block_type   = $this->get_block_type();
			$block_name   = $this->get_block_name();
			$block_status = apply_filters( 'qi_blocks_filter_block_status', false );

			if ( ! empty( $block_name ) ) {
				$is_premium     = qi_blocks_is_installed( 'premium' ) && $block_status;
				$is_landing     = qi_blocks_is_installed( 'landing' ) && $block_status;
				$block_name     = esc_attr( $block_name );
				$block_dir_path = QI_BLOCKS_ASSETS_PATH . '/dist/' . $block_name;
				$block_url_path = QI_BLOCKS_ASSETS_URL_PATH . '/dist/' . $block_name;
				$text_domain    = 'qi-blocks';
				$languages_path = QI_BLOCKS_PLUGIN_LANGUAGES_PATH;

				if ( 'premium' === $block_type && $is_premium ) {
					$block_dir_path = QI_BLOCKS_PREMIUM_ASSETS_PATH . '/dist/' . $block_name;
					$block_url_path = QI_BLOCKS_PREMIUM_ASSETS_URL_PATH . '/dist/' . $block_name;

					$text_domain    = 'qi-blocks-premium';
					$languages_path = QI_BLOCKS_PREMIUM_PLUGIN_LANGUAGES_PATH;
				} elseif ( 'landing' === $block_type && $is_landing ) {
					$block_dir_path = QI_BLOCKS_LANDING_ASSETS_PATH . '/dist/' . $block_name;
					$block_url_path = QI_BLOCKS_LANDING_ASSETS_URL_PATH . '/dist/' . $block_name;
				}

				// Check if CSS file exists.
				if ( file_exists( $block_dir_path . '.css' ) ) {
					// Set block style dependency.
					$style_dependency = apply_filters( 'qi_blocks_filter_block_style_dependency', array() );

					// Register block editor extended script.
					if ( $is_premium && file_exists( QI_BLOCKS_PREMIUM_ASSETS_PATH . '/dist/' . $block_name . '-extended.css' ) ) {
						wp_register_style(
							'qi-blocks-' . $block_name . '-extended',
							QI_BLOCKS_PREMIUM_ASSETS_URL_PATH . '/dist/' . $block_name . '-extended.css',
							$style_dependency
						);

						$style_dependency[] = 'qi-blocks-' . $block_name . '-extended';
					} elseif ( $is_landing && file_exists( QI_BLOCKS_LANDING_ASSETS_PATH . '/dist/' . $block_name . '-extended.css' ) ) {
						wp_register_style(
							'qi-blocks-' . $block_name . '-extended',
							QI_BLOCKS_LANDING_ASSETS_URL_PATH . '/dist/' . $block_name . '-extended.css',
							$style_dependency
						);

						$style_dependency[] = 'qi-blocks-' . $block_name . '-extended';
					}

					// Register block style.
					wp_register_style( 'qi-blocks-' . $block_name, $block_url_path . '.css', $style_dependency );

					// Set block style.
					$this->set_block_style( 'qi-blocks-' . $block_name );
				}

				// Check if JS file exists.
				if ( file_exists( $block_dir_path . '-script.js' ) ) {
					$script_dependency = array( 'qi-blocks-main' );

					// Register block extended script.
					if ( $is_premium && file_exists( QI_BLOCKS_PREMIUM_ASSETS_PATH . '/dist/' . $block_name . '-extended-script.js' ) ) {
						wp_register_script(
							'qi-blocks-' . $block_name . '-extended-script',
							QI_BLOCKS_PREMIUM_ASSETS_URL_PATH . '/dist/' . $block_name . '-extended-script.js',
							$script_dependency
						);

						$script_dependency[] = 'qi-blocks-' . $block_name . '-extended-script';
					} elseif ( $is_landing && file_exists( QI_BLOCKS_LANDING_ASSETS_PATH . '/dist/' . $block_name . '-extended-script.js' ) ) {
						wp_register_script(
							'qi-blocks-' . $block_name . '-extended-script',
							QI_BLOCKS_LANDING_ASSETS_URL_PATH . '/dist/' . $block_name . '-extended-script.js',
							$script_dependency
						);

						$script_dependency[] = 'qi-blocks-' . $block_name . '-extended-script';
					}

					// Register block editor script.
					wp_register_script( 'qi-blocks-' . $block_name, $block_url_path . '-script.js', $script_dependency, false, true );

					// Set block editor script.
					$this->set_block_script( 'qi-blocks-' . $block_name );
				} else {
					$register_script_flag = false;

					// Register block extended script.
					if ( $is_premium && file_exists( QI_BLOCKS_PREMIUM_ASSETS_PATH . '/dist/' . $block_name . '-extended-script.js' ) ) {
						$register_script_flag = true;

						wp_register_script(
							'qi-blocks-' . $block_name . '-extended-script',
							QI_BLOCKS_PREMIUM_ASSETS_URL_PATH . '/dist/' . $block_name . '-extended-script.js',
							array( 'qi-blocks-main' ),
							false,
							true
						);
					} elseif ( $is_landing && file_exists( QI_BLOCKS_LANDING_ASSETS_PATH . '/dist/' . $block_name . '-extended-script.js' ) ) {
						$register_script_flag = true;

						wp_register_script(
							'qi-blocks-' . $block_name . '-extended-script',
							QI_BLOCKS_LANDING_ASSETS_URL_PATH . '/dist/' . $block_name . '-extended-script.js',
							array( 'qi-blocks-main' ),
							false,
							true
						);
					}

					if ( $register_script_flag ) {
						// Set block editor script.
						$this->set_block_script( 'qi-blocks-' . $block_name . '-extended-script' );
					}
				}

				// Check if editor CSS file exists.
				if ( file_exists( $block_dir_path . '-editor.css' ) ) {
					// Set block style editor dependency.
					$editor_style_dependency = apply_filters( 'qi_blocks_filter_block_style_dependency', array() );

					// Register block editor style.
					wp_register_style( 'qi-blocks-' . $block_name . '-editor', $block_url_path . '-editor.css', $editor_style_dependency );

					// Set block editor style.
					$this->set_block_editor_style( 'qi-blocks-' . $block_name . '-editor' );
				}

				// Check if editor script file exists.
				if ( file_exists( $block_dir_path . '.js' ) ) {
					$editor_script_dependency = array( 'qi-blocks-main-editor' );

					// Register block editor extended script.
					if ( $is_premium && file_exists( QI_BLOCKS_PREMIUM_ASSETS_PATH . '/dist/' . $block_name . '-extended.js' ) ) {
						wp_register_script(
							'qi-blocks-' . $block_name . '-editor-extended',
							QI_BLOCKS_PREMIUM_ASSETS_URL_PATH . '/dist/' . $block_name . '-extended.js',
							$editor_script_dependency
						);

						$editor_script_dependency[] = 'qi-blocks-' . $block_name . '-editor-extended';

						// Enqueue localization data for our blocks.
						if ( function_exists( 'wp_set_script_translations' ) ) {
							wp_set_script_translations( 'qi-blocks-' . $block_name . '-editor-extended', 'qi-blocks-premium', QI_BLOCKS_PREMIUM_PLUGIN_LANGUAGES_PATH );
						}
					} elseif ( $is_landing && file_exists( QI_BLOCKS_LANDING_ASSETS_PATH . '/dist/' . $block_name . '-extended.js' ) ) {
						wp_register_script(
							'qi-blocks-' . $block_name . '-editor-extended',
							QI_BLOCKS_LANDING_ASSETS_URL_PATH . '/dist/' . $block_name . '-extended.js',
							$editor_script_dependency
						);

						$editor_script_dependency[] = 'qi-blocks-' . $block_name . '-editor-extended';
					}

					// Register block editor script.
					wp_register_script( 'qi-blocks-' . $block_name . '-editor', $block_url_path . '.js', $editor_script_dependency );

					// Set block editor script.
					$this->set_block_editor_script( 'qi-blocks-' . $block_name . '-editor' );

					// Enqueue localization data for our blocks.
					if ( function_exists( 'wp_set_script_translations' ) ) {
						wp_set_script_translations( 'qi-blocks-' . $block_name . '-editor', $text_domain, $languages_path );
					}
				}
			}
		}

		public function enqueue_3rd_party_scripts() {
			$this->enqueue_3rd_party_scripts_logic();
		}

		public function enqueue_3rd_party_editor_scripts() {
			$this->enqueue_3rd_party_scripts_logic( true );
		}

		public function enqueue_3rd_party_scripts_logic( $editor_mode = false ) {
			$block_3rd_party_scripts = $this->get_block_3rd_party_scripts();

			if ( ! empty( $block_3rd_party_scripts ) && is_array( $block_3rd_party_scripts ) ) {
				foreach ( $block_3rd_party_scripts as $script_key => $script_value ) {
					$script_dependency = array();
					$is_script_style   = false;
					$has_script_style  = false;

					if ( isset( $script_value['dependency'] ) && ! empty( $script_value['dependency'] ) ) {
						$script_dependency = $script_value['dependency'];
					}

					if ( isset( $script_value['is_style'] ) ) {
						$is_script_style = $script_value['is_style'];
					}

					if ( isset( $script_value['has_style'] ) ) {
						$has_script_style = $script_value['has_style'];
					}

					// Check if block exist on the page and then try to load scripts.
					$additional_conditional = true;
					if ( ! $editor_mode ) {
						$additional_conditional = function_exists( 'has_block' ) && has_block( 'qi-blocks/' . $script_value['block_name'] );

						if ( ! $additional_conditional && function_exists( 'get_the_block_template_html' ) ) {
							$template_content = qi_blocks_get_the_block_template_html();

							// Check if block exist inside FSE template part.
							if ( ! empty( $template_content ) && strpos( $template_content, 'qi-block-' . $script_value['block_name'] ) !== false ) {
								$additional_conditional = true;
							}
						}

						// Check if block exist inside Widgets sidebar area.
						if ( ! $additional_conditional ) {
							$widgets_block = get_option( 'widget_block' );

							if ( ! empty( $widgets_block ) ) {
								foreach ( $widgets_block as $widget_block ) {
									if ( isset( $widget_block['content'] ) && strpos( $widget_block['content'], 'qi-blocks/' . $script_value['block_name'] ) !== false ) {
										$additional_conditional = true;
									}
								}
							}
						}
					}

					if ( isset( $script_value['block_name'] ) && $additional_conditional ) {

						if ( ! empty( $script_value['url'] ) ) {
							if ( 'core' === $script_value['url'] ) {

								if ( $is_script_style ) {
									wp_enqueue_style( $script_key );
								} else {
									wp_enqueue_script( $script_key );

									if ( $has_script_style ) {
										wp_enqueue_style( $script_key );
									}
								}
							} else {

								if ( $is_script_style ) {
									wp_enqueue_style( $script_key, $script_value['url'] );
								} else {
									wp_enqueue_script( $script_key, $script_value['url'], $script_dependency, false, true );

									if ( $has_script_style ) {
										wp_enqueue_style( $script_key, $script_value['url'] );
									}
								}
							}
						}
					}
				}
			}
		}
	}
}
