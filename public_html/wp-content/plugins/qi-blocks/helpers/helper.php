<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( ! function_exists( 'qi_blocks_extend_block_categories' ) ) {
	/**
	 * Function that extend default array of block categories
	 *
	 * @param array $block_categories - Array of block categories
	 *
	 * @return array
	 */
	function qi_blocks_extend_block_categories( $block_categories ) {

		return array_merge(
			array(
				array(
					'slug'  => 'qi-blocks',
					'title' => esc_html__( 'Qi Blocks', 'qi-blocks' ),
				),
			),
			$block_categories
		);
	}

	if ( version_compare( get_bloginfo( 'version' ), '5.8', '>=' ) ) {
		add_filter( 'block_categories_all', 'qi_blocks_extend_block_categories' );
	} else {
		add_filter( 'block_categories', 'qi_blocks_extend_block_categories' );
	}
}

if ( ! function_exists( 'qi_blocks_get_ajax_status' ) ) {
	/**
	 * Function that return status from ajax functions
	 *
	 * @param string       $status   - success or error
	 * @param string       $message  - ajax message value
	 * @param string|array $data     - returned value
	 * @param string       $redirect - url address
	 */
	function qi_blocks_get_ajax_status( $status, $message, $data = null, $redirect = '' ) {
		$response = array(
			'status'   => esc_attr( $status ),
			'message'  => esc_html( $message ),
			'data'     => $data,
			'redirect' => ! empty( $redirect ) ? esc_url( $redirect ) : '',
		);

		$output = wp_json_encode( $response );

		exit( $output ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

if ( ! function_exists( 'qi_blocks_is_installed' ) ) {
	/**
	 * Function check is some plugin/theme is installed
	 *
	 * @param string $plugin name
	 *
	 * @return bool
	 */
	function qi_blocks_is_installed( $plugin ) {
		switch ( $plugin ) :
			case 'premium':
				return defined( 'QI_BLOCKS_PREMIUM_VERSION' );
			case 'qi-templates':
				return defined( 'QI_TEMPLATES_VERSION' );
			case 'landing':
				return defined( 'QI_BLOCKS_LANDING_VERSION' );
			case 'woocommerce':
				return class_exists( 'WooCommerce' );
			case 'contact_form_7':
				return defined( 'WPCF7_VERSION' );
			case 'wp_forms':
				return defined( 'WPFORMS_VERSION' );
			case 'full_site_editing':
				return get_theme_support( 'block-templates' );
			case 'wpml':
				return defined( 'ICL_SITEPRESS_VERSION' );
			default:
				return apply_filters( 'qi_blocks_is_plugin_installed', false, $plugin );

		endswitch;
	}
}

if ( ! function_exists( 'qi_blocks_execute_template_with_params' ) ) {
	/**
	 * Loads module template part.
	 *
	 * @param string $template path to template that is going to be included
	 * @param array  $params params that are passed to template
	 *
	 * @return string - template html
	 */
	function qi_blocks_execute_template_with_params( $template, $params ) {
		if ( ! empty( $template ) && file_exists( $template ) ) {
			// Extract params so they could be used in template.
			if ( is_array( $params ) && count( $params ) ) {
				extract( $params, EXTR_SKIP ); // @codingStandardsIgnoreLine
			}

			ob_start();
			include $template;
			$html = ob_get_clean();

			return $html;
		} else {
			return '';
		}
	}
}

if ( ! function_exists( 'qi_blocks_get_template_with_slug' ) ) {
	/**
	 * Loads module template part.
	 *
	 * @param string $temp temp path to file that is being loaded
	 * @param string $slug slug that should be checked if exists
	 *
	 * @return string - string with template path
	 */
	function qi_blocks_get_template_with_slug( $temp, $slug ) {
		$template = '';

		if ( ! empty( $temp ) ) {
			if ( ! empty( $slug ) ) {
				$template = "$temp-$slug.php";

				if ( ! file_exists( $template ) ) {
					$template = $temp . '.php';
				}
			} else {
				$template = $temp . '.php';
			}
		}

		return $template;
	}
}

if ( ! function_exists( 'qi_blocks_get_template_part' ) ) {
	/**
	 * Loads module template part.
	 *
	 * @param string $module name of the module from inc folder
	 * @param string $template full path of the template to load
	 * @param string $slug
	 * @param array  $params array of parameters to pass to template
	 *
	 * @return string - string containing html of template
	 */
	function qi_blocks_get_template_part( $module, $template, $slug = '', $params = array() ) {
		$available_characters = '/[^A-Za-z0-9\_\-\/]/';

		if ( is_scalar( $module ) ) {
			$module = preg_replace( $available_characters, '', $module );
		} else {
			$module = '';
		}

		if ( is_scalar( $template ) ) {
			$template = preg_replace( $available_characters, '', $template );
		} else {
			$template = '';
		}

		$temp = QI_BLOCKS_INC_PATH . '/' . $module . '/' . $template;

		$template = qi_blocks_get_template_with_slug( $temp, $slug );

		return qi_blocks_execute_template_with_params( $template, $params );
	}
}

if ( ! function_exists( 'qi_blocks_template_part' ) ) {
	/**
	 * Echo module template part.
	 *
	 * @param string $module name of the module from inc folder
	 * @param string $template full path of the template to load
	 * @param string $slug
	 * @param array  $params array of parameters to pass to template
	 */
	function qi_blocks_template_part( $module, $template, $slug = '', $params = array() ) {
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo qi_blocks_get_template_part( $module, $template, $slug, $params );
	}
}

if ( ! function_exists( 'qi_blocks_get_block_list_template_part' ) ) {
	/**
	 * Echo module template part.
	 *
	 * @param string $module name of the module from inc folder
	 * @param string $template full path of the template to load
	 * @param string $slug
	 * @param array  $params array of parameters to pass to template
	 *
	 * @return string - string containing html of template
	 */
	function qi_blocks_get_block_list_template_part( $module, $template, $slug = '', $params = array() ) {
		$temp_in_variation = false;

		/* In order to use this way of templating, option for list item layout must be called layoyt */
		if ( isset( $params['layout'] ) ) {
			/* Check if folder for variation exists */
			$variation_path = apply_filters( 'qi_blocks_filter_block_list_layout_path', QI_BLOCKS_INC_PATH . '/' . $module . '/variations/' . $params['layout'], $params );
			if ( file_exists( $variation_path ) ) {
				/* Check if template file in variation folder exists */
				$temp_file = qi_blocks_get_template_with_slug( $variation_path . '/' . $template, $slug );

				if ( ! empty( $temp_file ) && file_exists( $temp_file ) ) {
					$template          = $temp_file;
					$temp_in_variation = true;
				}
			}
		}

		/* Template doesn't exist in variation folder, use default one */
		if ( ! $temp_in_variation ) {
			$temp     = QI_BLOCKS_INC_PATH . '/' . $module . '/templates/' . $template;
			$template = qi_blocks_get_template_with_slug( $temp, $slug );
		}

		return qi_blocks_execute_template_with_params( $template, $params );
	}
}

if ( ! function_exists( 'qi_blocks_class_attribute' ) ) {
	/**
	 * Function that echoes class attribute
	 *
	 * @param string|array $value - value of class attribute
	 *
	 * @see qi_blocks_get_class_attribute()
	 */
	function qi_blocks_class_attribute( $value ) {
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo qi_blocks_get_class_attribute( $value );
	}
}

if ( ! function_exists( 'qi_blocks_get_class_attribute' ) ) {
	/**
	 * Function that returns generated class attribute
	 *
	 * @param string|array $value - value of class attribute
	 *
	 * @return string generated class attribute
	 *
	 * @see qi_blocks_get_inline_attr()
	 */
	function qi_blocks_get_class_attribute( $value ) {
		return qi_blocks_get_inline_attr( $value, 'class', ' ' );
	}
}

if ( ! function_exists( 'qi_blocks_id_attribute' ) ) {
	/**
	 * Function that echoes id attribute
	 *
	 * @param string|array $value - value of id attribute
	 *
	 * @see qi_blocks_get_id_attribute()
	 */
	function qi_blocks_id_attribute( $value ) {
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo qi_blocks_get_id_attribute( $value );
	}
}

if ( ! function_exists( 'qi_blocks_get_id_attribute' ) ) {
	/**
	 * Function that returns generated id attribute
	 *
	 * @param string|array $value - value of id attribute
	 *
	 * @return string generated id attribute
	 *
	 * @see qi_blocks_get_inline_attr()
	 */
	function qi_blocks_get_id_attribute( $value ) {
		return qi_blocks_get_inline_attr( $value, 'id', ' ' );
	}
}

if ( ! function_exists( 'qi_blocks_inline_attrs' ) ) {
	/**
	 * Echo multiple inline attributes
	 *
	 * @param array $attrs
	 * @param bool  $allow_zero_values
	 */
	function qi_blocks_inline_attrs( $attrs, $allow_zero_values = false ) {
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo qi_blocks_get_inline_attrs( $attrs, $allow_zero_values );
	}
}

if ( ! function_exists( 'qi_blocks_get_inline_attrs' ) ) {
	/**
	 * Generate multiple inline attributes
	 *
	 * @param array $attrs
	 * @param bool  $allow_zero_values
	 *
	 * @return string
	 */
	function qi_blocks_get_inline_attrs( $attrs, $allow_zero_values = false ) {
		$output = '';
		if ( is_array( $attrs ) && count( $attrs ) ) {
			if ( $allow_zero_values ) {
				foreach ( $attrs as $attr => $value ) {
					$output .= ' ' . qi_blocks_get_inline_attr( $value, $attr, '', true );
				}
			} else {
				foreach ( $attrs as $attr => $value ) {
					$output .= ' ' . qi_blocks_get_inline_attr( $value, $attr );
				}
			}
		}

		$output = ltrim( $output );

		return $output;
	}
}

if ( ! function_exists( 'qi_blocks_get_inline_attr' ) ) {
	/**
	 * Function that generates html attribute
	 *
	 * @param string|array $value value of html attribute
	 * @param string       $attr - name of html attribute to generate
	 * @param string       $glue - glue with which to implode $attr. Used only when $attr is arrayed
	 * @param bool         $allow_zero_values - allow data to have zero value
	 *
	 * @return string generated html attribute
	 */
	function qi_blocks_get_inline_attr( $value, $attr, $glue = '', $allow_zero_values = false ) {
		if ( $allow_zero_values ) {
			if ( '' !== $value ) {

				if ( is_array( $value ) && count( $value ) ) {
					$properties = implode( $glue, $value );
				} else {
					$properties = $value;
				}

				return $attr . '="' . esc_attr( $properties ) . '"';
			}
		} else {
			if ( ! empty( $value ) ) {

				if ( is_array( $value ) && count( $value ) ) {
					$properties = implode( $glue, $value );
				} elseif ( '' !== $value ) {
					$properties = $value;
				} else {
					return '';
				}

				return $attr . '="' . esc_attr( $properties ) . '"';
			}
		}

		return '';
	}
}

if ( ! function_exists( 'qi_blocks_get_query_params' ) ) {
	/**
	 * Function that return query parameters
	 *
	 * @param array $atts - options value
	 *
	 * @return array
	 */
	function qi_blocks_get_query_params( $atts ) {
		$post_type      = isset( $atts['post_type'] ) && ! empty( $atts['post_type'] ) ? $atts['post_type'] : 'post';
		$posts_per_page = isset( $atts['postsPerPage'] ) && ! empty( $atts['postsPerPage'] ) ? $atts['postsPerPage'] : 9;

		$args = array(
			'post_status'         => 'publish',
			'post_type'           => esc_attr( $post_type ),
			'posts_per_page'      => $posts_per_page,
			'orderby'             => esc_attr( $atts['orderBy'] ),
			'order'               => esc_attr( $atts['order'] ),
			'ignore_sticky_posts' => 1,
		);

		if ( isset( $atts['next_page'] ) && ! empty( $atts['next_page'] ) ) {
			$args['paged'] = intval( $atts['next_page'] );
		} elseif ( ! empty( max( 1, get_query_var( 'paged' ) ) ) ) {
			if ( is_front_page() ) {
				$args['paged'] = max( 1, get_query_var( 'page' ) );
			} else {
				$args['paged'] = max( 1, get_query_var( 'paged' ) );
			}
		} else {
			$args['paged'] = 1;
		}

		if ( isset( $atts['additional_query_args'] ) && ! empty( $atts['additional_query_args'] ) ) {
			foreach ( $atts['additional_query_args'] as $key => $value ) {
				$args[ esc_attr( $key ) ] = $value;
			}
		}

		return apply_filters( 'qi_blocks_filter_query_params', $args, $atts );
	}
}

if ( ! function_exists( 'qi_blocks_get_svg_icon_content' ) ) {
	/**
	 * Function that return option value
	 *
	 * @param string $icon
	 *
	 * @return string
	 */
	function qi_blocks_get_svg_icon_content( $icon ) {
		return $icon;
	}
}

if ( ! function_exists( 'qi_blocks_get_svg_icon' ) ) {
	/**
	 * Returns svg html
	 *
	 * @param string $name - icon name
	 * @param string $class_name - custom html tag class name
	 *
	 * @return string - that contains html content
	 */
	function qi_blocks_get_svg_icon( $name, $class_name = '' ) {
		$html  = '';
		$class = isset( $class_name ) && ! empty( $class_name ) ? 'class="' . esc_attr( $class_name ) . '"' : '';

		switch ( $name ) {
			case 'menu':
				$html = '<svg ' . $class . ' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="13" x="0px" y="0px" viewBox="0 0 21.3 13.7" xml:space="preserve" aria-hidden="true"><rect x="10.1" y="-9.1" transform="matrix(-1.836970e-16 1 -1 -1.836970e-16 11.5 -9.75)" width="1" height="20"/><rect x="10.1" y="-3.1" transform="matrix(-1.836970e-16 1 -1 -1.836970e-16 17.5 -3.75)" width="1" height="20"/><rect x="10.1" y="2.9" transform="matrix(-1.836970e-16 1 -1 -1.836970e-16 23.5 2.25)" width="1" height="20"/></svg>';
				break;
			case 'menu-arrow-right':
				$html = '<svg ' . $class . ' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="6.2px" height="10.8px" viewBox="0 0 6.2 10.8" xml:space="preserve" aria-hidden="true"><g><path d="M5.9,5.9l-4.7,4.7c-0.3,0.3-0.7,0.3-1,0c-0.1-0.1-0.2-0.3-0.2-0.5c0-0.2,0.1-0.4,0.2-0.5l4.1-4.2L0.3,1.2c-0.4-0.3-0.4-0.7,0-1c0.3-0.3,0.7-0.3,1,0l4.7,4.7C6.1,5,6.2,5.2,6.2,5.4C6.2,5.6,6.1,5.8,5.9,5.9z"/></g></svg>';
				break;
			case 'close':
				$html = '<svg ' . $class . ' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 9.1 9.1" xml:space="preserve"><g><path d="M8.5,0L9,0.6L5.1,4.5L9,8.5L8.5,9L4.5,5.1L0.6,9L0,8.5L4,4.5L0,0.6L0.6,0L4.5,4L8.5,0z"/></g></svg>';
				break;
			case 'search':
				$html = '<svg ' . $class . ' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="18.7px" height="19px" viewBox="0 0 18.7 19" xml:space="preserve"><g><path d="M11.1,15.2c-4.2,0-7.6-3.4-7.6-7.6S6.9,0,11.1,0s7.6,3.4,7.6,7.6S15.3,15.2,11.1,15.2z M11.1,1.4c-3.4,0-6.2,2.8-6.2,6.2s2.8,6.2,6.2,6.2s6.2-2.8,6.2-6.2S14.5,1.4,11.1,1.4z"/></g><g><rect x="-0.7" y="14.8" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -9.9871 6.9931)" width="8.3" height="1.4"/></g></svg>';
				break;
			case 'icon-arrow-left':
				$html = '<svg ' . $class . ' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 34.2 32.3" xml:space="preserve" style="stroke-width: 2;"><line x1="0.5" y1="16" x2="33.5" y2="16"/><line x1="0.3" y1="16.5" x2="16.2" y2="0.7"/><line x1="0" y1="15.4" x2="16.2" y2="31.6"/></svg>';
				break;
			case 'icon-arrow-right':
				$html = '<svg ' . $class . ' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 34.2 32.3" xml:space="preserve" style="stroke-width: 2;"><line x1="0" y1="16" x2="33" y2="16"/><line x1="17.3" y1="0.7" x2="33.2" y2="16.5"/><line x1="17.3" y1="31.6" x2="33.5" y2="15.4"/></svg>';
				break;
			case 'button-arrow':
				$html = '<svg ' . $class . ' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="6.7px" height="11.4px" viewBox="0 0 6.7 11.4" xml:space="preserve"><path d="M6.4,5L1.7,0.3c-0.4-0.4-1-0.4-1.3,0C0.1,0.5,0,0.7,0,1s0.1,0.5,0.4,0.7l3.8,4l-3.9,4C0.1,9.8,0,10.1,0,10.4  c0,0.3,0.1,0.5,0.3,0.7c0.2,0.2,0.4,0.3,0.7,0.3c0,0,0,0,0,0c0.2,0,0.5-0.1,0.7-0.3l4.7-4.7C6.5,6.2,6.7,6,6.7,5.7  C6.7,5.4,6.6,5.1,6.4,5z"></path></svg>';
				break;
			case 'comment-reply':
				$html = '<svg ' . $class . ' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="18.7px" height="11.6px" viewBox="0 0 18.7 11.6" xml:space="preserve"><g><path d="M0.3,4.6l4.3-4.3c0.3-0.4,0.7-0.4,1,0c0.3,0.3,0.3,0.7,0,1L2.5,4.4H13c2,0,3.4,0.6,4.4,1.9c0.9,1.3,1.4,2.8,1.4,4.6c0,0.2-0.1,0.4-0.2,0.5s-0.3,0.2-0.5,0.2c-0.2,0-0.4-0.1-0.5-0.2s-0.2-0.3-0.2-0.5c0-1.3-0.4-2.5-1.1-3.5c-0.8-1-1.8-1.5-3.2-1.5H2.5l3.1,3.1c0.4,0.3,0.4,0.7,0,1c-0.3,0.3-0.7,0.3-1,0L0.3,5.6C-0.1,5.2-0.1,4.9,0.3,4.6z"/></g></svg>';
				break;
			case 'comment-edit':
				$html = '<svg ' . $class . ' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="18px" height="18px" viewBox="0 0 18 18" xml:space="preserve"><g><path d="M2.5,0.4l1.5,1.5l-2,2L0.4,2.5C0.1,2.2,0,1.8,0,1.4c0-0.4,0.1-0.7,0.4-1S1,0,1.4,0C1.8,0,2.2,0.1,2.5,0.4z M8.9,10.9L3.1,5.1l2-2l5.8,5.8l1,3L8.9,10.9z M17.7,3.7C17.9,3.9,18,4.2,18,4.5v12.4c0,0.3-0.1,0.6-0.3,0.8c-0.2,0.2-0.5,0.3-0.8,0.3H4.5c-0.3,0-0.6-0.1-0.8-0.3c-0.2-0.2-0.3-0.5-0.3-0.8v-8L4.5,10v6.9h12.4V4.5H10L8.9,3.4h8C17.2,3.4,17.4,3.5,17.7,3.7z"/></g></svg>';
				break;
		}

		return apply_filters( 'qi_blocks_filter_svg_icon', $html, $name, $class_name );
	}
}

if ( ! function_exists( 'qi_blocks_get_block_option_typography_attributes' ) ) {
	/**
	 * Function that return block option typography attributes
	 *
	 * @param string $option_name
	 *
	 * @return array
	 */
	function qi_blocks_get_block_option_typography_attributes( $option_name ) {

		if ( empty( $option_name ) ) {
			return array();
		}

		return array(
			esc_attr( $option_name ) . 'FontFamily'        => array(
				'type'    => 'string',
				'default' => '',
			),
			esc_attr( $option_name ) . 'FontSize'          => array(
				'type'    => 'number',
				'default' => '',
			),
			esc_attr( $option_name ) . 'FontSizeUnit'      => array(
				'type'    => 'string',
				'default' => 'px',
			),
			esc_attr( $option_name ) . 'FontSizeDecimal'   => array(
				'type'    => 'number',
				'default' => '',
			),
			esc_attr( $option_name ) . 'FontSizeTablet'    => array(
				'type'    => 'number',
				'default' => '',
			),
			esc_attr( $option_name ) . 'FontSizeMobile'    => array(
				'type'    => 'number',
				'default' => '',
			),
			esc_attr( $option_name ) . 'FontSizeUnitTablet' => array(
				'type'    => 'string',
				'default' => 'px',
			),
			esc_attr( $option_name ) . 'FontSizeUnitMobile' => array(
				'type'    => 'string',
				'default' => 'px',
			),
			esc_attr( $option_name ) . 'FontSizeDecimalTablet' => array(
				'type'    => 'number',
				'default' => '',
			),
			esc_attr( $option_name ) . 'FontSizeDecimalMobile' => array(
				'type'    => 'number',
				'default' => '',
			),
			esc_attr( $option_name ) . 'FontWeight'        => array(
				'type'    => 'string',
				'default' => '',
			),
			esc_attr( $option_name ) . 'TextTransform'     => array(
				'type'    => 'string',
				'default' => '',
			),
			esc_attr( $option_name ) . 'FontStyle'         => array(
				'type'    => 'string',
				'default' => '',
			),
			esc_attr( $option_name ) . 'TextDecoration'    => array(
				'type'    => 'string',
				'default' => '',
			),
			esc_attr( $option_name ) . 'LineHeight'        => array(
				'type'    => 'number',
				'default' => '',
			),
			esc_attr( $option_name ) . 'LineHeightUnit'    => array(
				'type'    => 'string',
				'default' => 'px',
			),
			esc_attr( $option_name ) . 'LineHeightDecimal' => array(
				'type'    => 'number',
				'default' => '',
			),
			esc_attr( $option_name ) . 'LineHeightTablet'  => array(
				'type'    => 'number',
				'default' => '',
			),
			esc_attr( $option_name ) . 'LineHeightMobile'  => array(
				'type'    => 'number',
				'default' => '',
			),
			esc_attr( $option_name ) . 'LineHeightUnitTablet' => array(
				'type'    => 'string',
				'default' => 'px',
			),
			esc_attr( $option_name ) . 'LineHeightUnitMobile' => array(
				'type'    => 'string',
				'default' => 'px',
			),
			esc_attr( $option_name ) . 'LineHeightDecimalTablet' => array(
				'type'    => 'number',
				'default' => '',
			),
			esc_attr( $option_name ) . 'LineHeightDecimalMobile' => array(
				'type'    => 'number',
				'default' => '',
			),
			esc_attr( $option_name ) . 'LetterSpacing'     => array(
				'type'    => 'number',
				'default' => '',
			),
			esc_attr( $option_name ) . 'LetterSpacingUnit' => array(
				'type'    => 'string',
				'default' => 'px',
			),
			esc_attr( $option_name ) . 'LetterSpacingDecimal' => array(
				'type'    => 'number',
				'default' => '',
			),
			esc_attr( $option_name ) . 'LetterSpacingTablet' => array(
				'type'    => 'number',
				'default' => '',
			),
			esc_attr( $option_name ) . 'LetterSpacingMobile' => array(
				'type'    => 'number',
				'default' => '',
			),
			esc_attr( $option_name ) . 'LetterSpacingUnitTablet' => array(
				'type'    => 'string',
				'default' => 'px',
			),
			esc_attr( $option_name ) . 'LetterSpacingUnitMobile' => array(
				'type'    => 'string',
				'default' => 'px',
			),
			esc_attr( $option_name ) . 'LetterSpacingDecimalTablet' => array(
				'type'    => 'number',
				'default' => '',
			),
			esc_attr( $option_name ) . 'LetterSpacingDecimalMobile' => array(
				'type'    => 'number',
				'default' => '',
			),
		);
	}
}

if ( ! function_exists( 'qi_blocks_get_block_container_attributes' ) ) {
	/**
	 * Function that return block element container attributes
	 *
	 * @return array
	 */
	function qi_blocks_get_block_container_attributes() {
		return array(
			'marginTop'                                => array(
				'type'    => 'number',
				'default' => '',
			),
			'marginTopTablet'                          => array(
				'type'    => 'number',
				'default' => '',
			),
			'marginTopMobile'                          => array(
				'type'    => 'number',
				'default' => '',
			),
			'marginTopDecimal'                         => array(
				'type'    => 'number',
				'default' => '',
			),
			'marginTopDecimalTablet'                   => array(
				'type'    => 'number',
				'default' => '',
			),
			'marginTopDecimalMobile'                   => array(
				'type'    => 'number',
				'default' => '',
			),
			'marginRight'                              => array(
				'type'    => 'number',
				'default' => '',
			),
			'marginRightTablet'                        => array(
				'type'    => 'number',
				'default' => '',
			),
			'marginRightMobile'                        => array(
				'type'    => 'number',
				'default' => '',
			),
			'marginRightDecimal'                       => array(
				'type'    => 'number',
				'default' => '',
			),
			'marginRightDecimalTablet'                 => array(
				'type'    => 'number',
				'default' => '',
			),
			'marginRightDecimalMobile'                 => array(
				'type'    => 'number',
				'default' => '',
			),
			'marginBottom'                             => array(
				'type'    => 'number',
				'default' => '',
			),
			'marginBottomTablet'                       => array(
				'type'    => 'number',
				'default' => '',
			),
			'marginBottomMobile'                       => array(
				'type'    => 'number',
				'default' => '',
			),
			'marginBottomDecimal'                      => array(
				'type'    => 'number',
				'default' => '',
			),
			'marginBottomDecimalTablet'                => array(
				'type'    => 'number',
				'default' => '',
			),
			'marginBottomDecimalMobile'                => array(
				'type'    => 'number',
				'default' => '',
			),
			'marginLeft'                               => array(
				'type'    => 'number',
				'default' => '',
			),
			'marginLeftTablet'                         => array(
				'type'    => 'number',
				'default' => '',
			),
			'marginLeftMobile'                         => array(
				'type'    => 'number',
				'default' => '',
			),
			'marginLeftDecimal'                        => array(
				'type'    => 'number',
				'default' => '',
			),
			'marginLeftDecimalTablet'                  => array(
				'type'    => 'number',
				'default' => '',
			),
			'marginLeftDecimalMobile'                  => array(
				'type'    => 'number',
				'default' => '',
			),
			'marginUnit'                               => array(
				'type'    => 'string',
				'default' => 'px',
			),
			'marginUnitTablet'                         => array(
				'type'    => 'string',
				'default' => 'px',
			),
			'marginUnitMobile'                         => array(
				'type'    => 'string',
				'default' => 'px',
			),
			'paddingTop'                               => array(
				'type'    => 'number',
				'default' => '',
			),
			'paddingTopTablet'                         => array(
				'type'    => 'number',
				'default' => '',
			),
			'paddingTopMobile'                         => array(
				'type'    => 'number',
				'default' => '',
			),
			'paddingTopDecimal'                        => array(
				'type'    => 'number',
				'default' => '',
			),
			'paddingTopDecimalTablet'                  => array(
				'type'    => 'number',
				'default' => '',
			),
			'paddingTopDecimalMobile'                  => array(
				'type'    => 'number',
				'default' => '',
			),
			'paddingRight'                             => array(
				'type'    => 'number',
				'default' => '',
			),
			'paddingRightTablet'                       => array(
				'type'    => 'number',
				'default' => '',
			),
			'paddingRightMobile'                       => array(
				'type'    => 'number',
				'default' => '',
			),
			'paddingRightDecimal'                      => array(
				'type'    => 'number',
				'default' => '',
			),
			'paddingRightDecimalTablet'                => array(
				'type'    => 'number',
				'default' => '',
			),
			'paddingRightDecimalMobile'                => array(
				'type'    => 'number',
				'default' => '',
			),
			'paddingBottom'                            => array(
				'type'    => 'number',
				'default' => '',
			),
			'paddingBottomTablet'                      => array(
				'type'    => 'number',
				'default' => '',
			),
			'paddingBottomMobile'                      => array(
				'type'    => 'number',
				'default' => '',
			),
			'paddingBottomDecimal'                     => array(
				'type'    => 'number',
				'default' => '',
			),
			'paddingBottomDecimalTablet'               => array(
				'type'    => 'number',
				'default' => '',
			),
			'paddingBottomDecimalMobile'               => array(
				'type'    => 'number',
				'default' => '',
			),
			'paddingLeft'                              => array(
				'type'    => 'number',
				'default' => '',
			),
			'paddingLeftTablet'                        => array(
				'type'    => 'number',
				'default' => '',
			),
			'paddingLeftMobile'                        => array(
				'type'    => 'number',
				'default' => '',
			),
			'paddingLeftDecimal'                       => array(
				'type'    => 'number',
				'default' => '',
			),
			'paddingLeftDecimalTablet'                 => array(
				'type'    => 'number',
				'default' => '',
			),
			'paddingLeftDecimalMobile'                 => array(
				'type'    => 'number',
				'default' => '',
			),
			'paddingUnit'                              => array(
				'type'    => 'string',
				'default' => 'px',
			),
			'paddingUnitTablet'                        => array(
				'type'    => 'string',
				'default' => 'px',
			),
			'paddingUnitMobile'                        => array(
				'type'    => 'string',
				'default' => 'px',
			),
			'zIndex'                                   => array(
				'type'    => 'number',
				'default' => '',
			),
			'cssId'                                    => array(
				'type'    => 'string',
				'default' => '',
			),
			'cssClasses'                               => array(
				'type'    => 'string',
				'default' => '',
			),
			'entranceAnimation'                        => array(
				'type'    => 'string',
				'default' => '',
			),
			'entranceAnimationDuration'                => array(
				'type'    => 'string',
				'default' => 'normal',
			),
			'entranceAnimationDelay'                   => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBackgroundType'                   => array(
				'type'    => 'string',
				'default' => '',
			),
			'advancedBackgroundColor'                  => array(
				'type'    => 'string',
				'default' => '',
			),
			'advancedBackgroundImage'                  => array(
				'type'    => 'object',
				'default' => array(
					'id'  => null,
					'url' => '',
					'alt' => '',
				),
			),
			'advancedBackgroundImageTablet'            => array(
				'type'    => 'object',
				'default' => array(
					'id'  => null,
					'url' => '',
					'alt' => '',
				),
			),
			'advancedBackgroundImageMobile'            => array(
				'type'    => 'object',
				'default' => array(
					'id'  => null,
					'url' => '',
					'alt' => '',
				),
			),
			'advancedBackgroundPosition'               => array(
				'type'    => 'string',
				'default' => '',
			),
			'advancedBackgroundPositionTablet'         => array(
				'type'    => 'string',
				'default' => '',
			),
			'advancedBackgroundPositionMobile'         => array(
				'type'    => 'string',
				'default' => '',
			),
			'advancedBackgroundXPosition'              => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBackgroundXPositionUnit'          => array(
				'type'    => 'string',
				'default' => 'px',
			),
			'advancedBackgroundXPositionDecimal'       => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBackgroundXPositionTablet'        => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBackgroundXPositionMobile'        => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBackgroundXPositionUnitTablet'    => array(
				'type'    => 'string',
				'default' => 'px',
			),
			'advancedBackgroundXPositionUnitMobile'    => array(
				'type'    => 'string',
				'default' => 'px',
			),
			'advancedBackgroundXPositionDecimalTablet' => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBackgroundXPositionDecimalMobile' => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBackgroundYPosition'              => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBackgroundYPositionUnit'          => array(
				'type'    => 'string',
				'default' => 'px',
			),
			'advancedBackgroundYPositionDecimal'       => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBackgroundYPositionTablet'        => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBackgroundYPositionMobile'        => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBackgroundYPositionUnitTablet'    => array(
				'type'    => 'string',
				'default' => 'px',
			),
			'advancedBackgroundYPositionUnitMobile'    => array(
				'type'    => 'string',
				'default' => 'px',
			),
			'advancedBackgroundYPositionDecimalTablet' => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBackgroundYPositionDecimalMobile' => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBackgroundAttachment'             => array(
				'type'    => 'string',
				'default' => '',
			),
			'advancedBackgroundRepeat'                 => array(
				'type'    => 'string',
				'default' => '',
			),
			'advancedBackgroundRepeatTablet'           => array(
				'type'    => 'string',
				'default' => '',
			),
			'advancedBackgroundRepeatMobile'           => array(
				'type'    => 'string',
				'default' => '',
			),
			'advancedBackgroundSize'                   => array(
				'type'    => 'string',
				'default' => '',
			),
			'advancedBackgroundSizeTablet'             => array(
				'type'    => 'string',
				'default' => '',
			),
			'advancedBackgroundSizeMobile'             => array(
				'type'    => 'string',
				'default' => '',
			),
			'advancedBackgroundSizeWidth'              => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBackgroundSizeWidthUnit'          => array(
				'type'    => 'string',
				'default' => 'px',
			),
			'advancedBackgroundSizeWidthDecimal'       => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBackgroundSizeWidthTablet'        => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBackgroundSizeWidthMobile'        => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBackgroundSizeWidthUnitTablet'    => array(
				'type'    => 'string',
				'default' => 'px',
			),
			'advancedBackgroundSizeWidthUnitMobile'    => array(
				'type'    => 'string',
				'default' => 'px',
			),
			'advancedBackgroundSizeWidthDecimalTablet' => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBackgroundSizeWidthDecimalMobile' => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBackgroundGradientColor1'         => array(
				'type'    => 'string',
				'default' => '',
			),
			'advancedBackgroundGradientLocation1'      => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBackgroundGradientColor2'         => array(
				'type'    => 'string',
				'default' => '',
			),
			'advancedBackgroundGradientLocation2'      => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBackgroundGradientType'           => array(
				'type'    => 'string',
				'default' => 'linear',
			),
			'advancedBackgroundGradientTypeAngle'      => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBackgroundGradientTypePosition'   => array(
				'type'    => 'string',
				'default' => 'center center',
			),
			'advancedBorderStyle'                      => array(
				'type'    => 'string',
				'default' => '',
			),
			'advancedBorderColor'                      => array(
				'type'    => 'string',
				'default' => '',
			),
			'advancedBorderWidthTop'                   => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBorderWidthTopTablet'             => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBorderWidthTopMobile'             => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBorderWidthRight'                 => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBorderWidthRightTablet'           => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBorderWidthRightMobile'           => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBorderWidthBottom'                => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBorderWidthBottomTablet'          => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBorderWidthBottomMobile'          => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBorderWidthLeft'                  => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBorderWidthLeftTablet'            => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBorderWidthLeftMobile'            => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBorderWidthUnit'                  => array(
				'type'    => 'string',
				'default' => 'px',
			),
			'advancedBorderWidthUnitTablet'            => array(
				'type'    => 'string',
				'default' => 'px',
			),
			'advancedBorderWidthUnitMobile'            => array(
				'type'    => 'string',
				'default' => 'px',
			),
			'advancedBorderRadiusTop'                  => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBorderRadiusTopTablet'            => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBorderRadiusTopMobile'            => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBorderRadiusTopDecimal'           => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBorderRadiusTopDecimalTablet'     => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBorderRadiusTopDecimalMobile'     => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBorderRadiusRight'                => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBorderRadiusRightTablet'          => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBorderRadiusRightMobile'          => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBorderRadiusRightDecimal'         => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBorderRadiusRightDecimalTablet'   => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBorderRadiusRightDecimalMobile'   => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBorderRadiusBottom'               => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBorderRadiusBottomTablet'         => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBorderRadiusBottomMobile'         => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBorderRadiusBottomDecimal'        => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBorderRadiusBottomDecimalTablet'  => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBorderRadiusBottomDecimalMobile'  => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBorderRadiusLeft'                 => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBorderRadiusLeftTablet'           => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBorderRadiusLeftMobile'           => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBorderRadiusLeftDecimal'          => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBorderRadiusLeftDecimalTablet'    => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBorderRadiusLeftDecimalMobile'    => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBorderRadiusUnit'                 => array(
				'type'    => 'string',
				'default' => 'px',
			),
			'advancedBorderRadiusUnitTablet'           => array(
				'type'    => 'string',
				'default' => 'px',
			),
			'advancedBorderRadiusUnitMobile'           => array(
				'type'    => 'string',
				'default' => 'px',
			),
			'advancedBoxShadowColor'                   => array(
				'type'    => 'string',
				'default' => '',
			),
			'advancedBoxShadowHorizontal'              => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBoxShadowVertical'                => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBoxShadowBlur'                    => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBoxShadowSpread'                  => array(
				'type'    => 'number',
				'default' => '',
			),
			'advancedBoxShadowPosition'                => array(
				'type'    => 'string',
				'default' => '',
			),
			'blockWidth'                               => array(
				'type'    => 'string',
				'default' => '',
			),
			'blockWidthTablet'                         => array(
				'type'    => 'string',
				'default' => '',
			),
			'blockWidthMobile'                         => array(
				'type'    => 'string',
				'default' => '',
			),
			'blockCustomWidth'                         => array(
				'type'    => 'number',
				'default' => '',
			),
			'blockCustomWidthUnit'                     => array(
				'type'    => 'string',
				'default' => 'px',
			),
			'blockCustomWidthDecimal'                  => array(
				'type'    => 'number',
				'default' => '',
			),
			'blockCustomWidthTablet'                   => array(
				'type'    => 'number',
				'default' => '',
			),
			'blockCustomWidthMobile'                   => array(
				'type'    => 'number',
				'default' => '',
			),
			'blockCustomWidthUnitTablet'               => array(
				'type'    => 'string',
				'default' => 'px',
			),
			'blockCustomWidthUnitMobile'               => array(
				'type'    => 'string',
				'default' => 'px',
			),
			'blockCustomWidthDecimalTablet'            => array(
				'type'    => 'number',
				'default' => '',
			),
			'blockCustomWidthDecimalMobile'            => array(
				'type'    => 'number',
				'default' => '',
			),
			'blockPosition'                            => array(
				'type'    => 'string',
				'default' => '',
			),
			'positionHorizontalOrientation'            => array(
				'type'    => 'string',
				'default' => 'left',
			),
			'positionHorizontalOffset'                 => array(
				'type'    => 'number',
				'default' => '',
			),
			'positionHorizontalOffsetUnit'             => array(
				'type'    => 'string',
				'default' => 'px',
			),
			'positionHorizontalOffsetDecimal'          => array(
				'type'    => 'number',
				'default' => '',
			),
			'positionHorizontalOffsetTablet'           => array(
				'type'    => 'number',
				'default' => '',
			),
			'positionHorizontalOffsetMobile'           => array(
				'type'    => 'number',
				'default' => '',
			),
			'positionHorizontalOffsetUnitTablet'       => array(
				'type'    => 'string',
				'default' => 'px',
			),
			'positionHorizontalOffsetUnitMobile'       => array(
				'type'    => 'string',
				'default' => 'px',
			),
			'positionHorizontalOffsetDecimalTablet'    => array(
				'type'    => 'number',
				'default' => '',
			),
			'positionHorizontalOffsetDecimalMobile'    => array(
				'type'    => 'number',
				'default' => '',
			),
			'positionVerticalOrientation'              => array(
				'type'    => 'string',
				'default' => 'top',
			),
			'positionVerticalOffset'                   => array(
				'type'    => 'number',
				'default' => '',
			),
			'positionVerticalOffsetUnit'               => array(
				'type'    => 'string',
				'default' => 'px',
			),
			'positionVerticalOffsetDecimal'            => array(
				'type'    => 'number',
				'default' => '',
			),
			'positionVerticalOffsetTablet'             => array(
				'type'    => 'number',
				'default' => '',
			),
			'positionVerticalOffsetMobile'             => array(
				'type'    => 'number',
				'default' => '',
			),
			'positionVerticalOffsetUnitTablet'         => array(
				'type'    => 'string',
				'default' => 'px',
			),
			'positionVerticalOffsetUnitMobile'         => array(
				'type'    => 'string',
				'default' => 'px',
			),
			'positionVerticalOffsetDecimalTablet'      => array(
				'type'    => 'number',
				'default' => '',
			),
			'positionVerticalOffsetDecimalMobile'      => array(
				'type'    => 'number',
				'default' => '',
			),
			'hideOnDesktop'                            => array(
				'type'    => 'boolean',
				'default' => false,
			),
			'hideOnTablet'                             => array(
				'type'    => 'boolean',
				'default' => false,
			),
			'hideOnMobile'                             => array(
				'type'    => 'boolean',
				'default' => false,
			),
		);
	}
}

if ( ! function_exists( 'qi_blocks_get_block_container_html_attributes_string' ) ) {
	/**
	 * Function that return block element container html attributes
	 *
	 * @param array $attributes - options value
	 *
	 * @return string
	 */
	function qi_blocks_get_block_container_html_attributes_string( $attributes ) {
		$container_ids     = ! empty( $attributes['blockContainerIds'] ) ? $attributes['blockContainerIds'] : '';
		$container_classes = ! empty( $attributes['blockContainerClasses'] ) ? $attributes['blockContainerClasses'] : '';
		$container_data    = isset( $attributes['blockContainerData'] ) && ! empty( $attributes['blockContainerData'] ) ? json_decode( $attributes['blockContainerData'], true ) : '';

		$animation = ! empty( $container_data ) && isset( $container_data['data-animation'] ) ? $container_data['data-animation'] : '';

		$html_attributes  = qi_blocks_get_id_attribute( $container_ids );
		$html_attributes .= ' ' . qi_blocks_get_class_attribute( $container_classes );
		$html_attributes .= ' ' . qi_blocks_get_inline_attr( $animation, 'data-animation' );

		return $html_attributes;
	}
}

if ( ! function_exists( 'qi_blocks_get_block_holder_classes' ) ) {
	/**
	 * Function that return block element classes
	 *
	 * @param string $block_name
	 * @param array $attributes - options value
	 * @param string $additional_class
	 *
	 * @return array
	 */
	function qi_blocks_get_block_holder_classes( $block_name, $attributes, $additional_class = '' ) {
		$classes = array();

		if ( ! empty( $block_name ) ) {
			$classes[] = 'qi-block-' . esc_attr( $block_name );
			$classes[] = 'qodef-block';
			$classes[] = 'qodef-m';
			$classes[] = 'wp-block-qi-blocks-' . esc_attr( $block_name );

			if ( isset( $attributes['className'] ) && ! empty( $attributes['className'] ) ) {
				$classes[] = esc_attr( $attributes['className'] );
			}

			if ( ! empty( $additional_class ) ) {
				$classes[] = esc_attr( $additional_class );
			}
		}

		return $classes;
	}
}

if ( ! function_exists( 'qi_blocks_get_slider_classes' ) ) {
	/**
	 * Function that return element slider classes
	 *
	 * @param array $atts - options value
	 *
	 * @return string
	 */
	function qi_blocks_get_slider_classes( $atts ) {
		$classes   = array(
			'qodef-block-swiper',
		);
		$classes[] = ! empty( $atts['sliderNavigationPosition'] ) ? 'qodef-navigation--' . $atts['sliderNavigationPosition'] : '';
		$classes[] = ! empty( $atts['sliderHideNavigation'] ) ? 'qodef-hide-navigation--' . $atts['sliderHideNavigation'] : '';
		$classes[] = ! empty( $atts['sliderPaginationPosition'] ) ? 'qodef-pagination--' . $atts['sliderPaginationPosition'] : '';
		$classes[] = ! empty( $atts['paginationEnableNumbers'] ) ? 'qodef-pagination-numbers' : '';
		$classes[] = ! empty( $atts['navigationHoverArrowMove'] ) ? 'qodef-navigation--hover-move' : '';

		if ( ! empty( $atts['sliderNavigationAlignment'] ) && 'together' === $atts['sliderNavigationPosition'] ) {
			$classes[] = 'qodef-navigation-alignment--' . $atts['sliderNavigationAlignment'];
		}
		if ( ! empty( $atts['sliderNavigationVerticalPosition'] ) && 'together' === $atts['sliderNavigationPosition'] ) {
			$classes[] = 'qodef-navigation-together--' . $atts['sliderNavigationVerticalPosition'];
		}

		return implode( ' ', $classes );
	}
}

if ( ! function_exists( 'qi_blocks_get_slider_data' ) ) {
	/**
	 * Function that return element slider data
	 *
	 * @param array $atts - options value
	 *
	 * @return string
	 */
	function qi_blocks_get_slider_data( $atts ) {
		$data = array();

		$partial_columns = isset( $atts['sliderPartialColumns'] ) && 'yes' === $atts['sliderPartialColumns'];
		if ( $partial_columns ) {
			$partial_value = isset( $atts['sliderPartialColumnsValue'] ) ? $atts['sliderPartialColumnsValue'] : 0.1;
		} else {
			$partial_value = 0;
		}

		$slider_navigation_position = isset( $atts['sliderNavigationPosition'] ) ? $atts['sliderNavigationPosition'] : '';
		$slider_pagination_position = isset( $atts['sliderPaginationPosition'] ) ? $atts['sliderPaginationPosition'] : '';

		if ( ( 'outside' === $slider_navigation_position || 'together' === $slider_navigation_position ) || 'outside' === $slider_pagination_position ) {
			$data['unique'] = isset( $atts['uniqueClass'] ) ? $atts['uniqueClass'] : '';
		}

		$data['direction']           = isset( $atts['sliderDirection'] ) ? $atts['sliderDirection'] : 'horizontal';
		$data['slidesPerView']       = isset( $atts['sliderColumns'] ) ? $atts['sliderColumns'] : 1;
		$data['spaceBetween']        = isset( $atts['sliderSpace'] ) ? $atts['sliderSpace'] : 0;
		$data['spaceBetweenTablet']  = isset( $atts['sliderSpaceTablet'] ) ? $atts['sliderSpaceTablet'] : $data['spaceBetween'];
		$data['spaceBetweenMobile']  = isset( $atts['sliderSpaceMobile'] ) ? $atts['sliderSpaceMobile'] : $data['spaceBetweenTablet'];
		$data['effect']              = isset( $atts['sliderEffect'] ) ? $atts['sliderEffect'] : '';
		$data['loop']                = isset( $atts['sliderLoop'] ) ? 'no' !== $atts['sliderLoop'] : true;
		$data['autoplay']            = isset( $atts['sliderAutoplay'] ) ? 'no' !== $atts['sliderAutoplay'] : true;
		$data['centeredSlides']      = isset( $atts['sliderCentered'] ) ? 'no' !== $atts['sliderCentered'] : false;
		$data['speed']               = isset( $atts['sliderSpeed'] ) ? $atts['sliderSpeed'] : '';
		$data['speedAnimation']      = isset( $atts['sliderSpeedAnimation'] ) ? $atts['sliderSpeedAnimation'] : '';
		$data['outsideNavigation']   = isset( $atts['sliderNavigationPosition'] ) && ( 'outside' === $atts['sliderNavigationPosition'] || 'together' === $atts['sliderNavigationPosition'] ) ? 'yes' : 'no';
		$data['outsidePagination']   = isset( $atts['sliderPaginationPosition'] ) && ( 'outside' === $atts['sliderPaginationPosition'] ) ? 'yes' : 'no';
		$data['partialValue']        = $partial_value;
		$data['disablePartialValue'] = isset( $atts['sliderPartialColumnsResponsiveDisable'] ) ? $atts['sliderPartialColumnsResponsiveDisable'] : '';

		if ( ! empty( $atts['sliderColumnsResponsive'] ) && 'custom' === $atts['sliderColumnsResponsive'] ) {
			$data['customStages']      = true;
			$data['slidesPerView1440'] = ! empty( $atts['sliderColumns1440'] ) ? $atts['sliderColumns1440'] : $atts['sliderColumns'];
			$data['slidesPerView1366'] = ! empty( $atts['sliderColumns1366'] ) ? $atts['sliderColumns1366'] : $atts['sliderColumns'];
			$data['slidesPerView1024'] = ! empty( $atts['sliderColumns1024'] ) ? $atts['sliderColumns1024'] : $atts['sliderColumns'];
			$data['slidesPerView768']  = ! empty( $atts['sliderColumns768'] ) ? $atts['sliderColumns768'] : $atts['sliderColumns'];
			$data['slidesPerView680']  = ! empty( $atts['sliderColumns680'] ) ? $atts['sliderColumns680'] : $atts['sliderColumns'];
			$data['slidesPerView480']  = ! empty( $atts['sliderColumns480'] ) ? $atts['sliderColumns480'] : $atts['sliderColumns'];
		}

		return wp_json_encode( $data );
	}
}

if ( ! function_exists( 'qi_blocks_get_additional_query_args' ) ) {
	/**
	 * Function that return additional query arguments
	 *
	 * @param array $atts - options value
	 *
	 * @return array
	 */
	function qi_blocks_get_additional_query_args( $atts ) {
		$args = array();

		if ( ! empty( $atts['additionalParams'] ) && 'id' === $atts['additionalParams'] ) {
			$post_ids         = explode( ',', $atts['postIds'] );
			$args['orderby']  = 'post__in';
			$args['post__in'] = $post_ids;
		}

		if ( ! empty( $atts['additionalParams'] ) && 'tax' === $atts['additionalParams'] ) {
			$taxonomy_values = array();

			$slug = isset( $atts['taxSlug'] ) ? $atts['taxSlug'] : '';
			$ids  = isset( $atts['taxIn'] ) ? $atts['taxIn'] : '';

			if ( ! empty( $ids ) && empty( $slug ) ) {
				$taxonomy_values['field'] = 'term_id';
				$taxonomy_values['terms'] = is_array( $ids ) ? array_map( 'intval', $ids ) : array_map( 'intval', explode( ',', str_replace( ' ', '', $ids ) ) );
			} elseif ( ! empty( $slug ) ) {
				$taxonomy_values['field'] = 'slug';
				$taxonomy_values['terms'] = $slug;
			}

			if ( ! empty( $atts['tax'] ) && ! empty( $taxonomy_values ) ) {
				// phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query
				$args['tax_query'] = array( array_merge( array( 'taxonomy' => $atts['tax'] ), $taxonomy_values ) );
			}
		}

		if ( ! empty( $atts['additionalParams'] ) && 'author' === $atts['additionalParams'] ) {
			$args['author_name'] = $atts['authorSlug'];
		}

		return $args;
	}
}

if ( ! function_exists( 'qi_blocks_framework_get_attachment_id_from_url' ) ) {
	/**
	 * Function that retrieves attachment id for passed attachment url
	 *
	 * @param string $attachment_url
	 *
	 * @return null|string
	 */
	function qi_blocks_framework_get_attachment_id_from_url( $attachment_url ) {
		global $wpdb;
		$attachment_id = '';

		if ( '' !== $attachment_url ) {
			// phpcs:ignore WordPress.DB.DirectDatabaseQuery
			$attachment_id = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM {$wpdb->posts} WHERE guid=%s", $attachment_url ) );

			// Additional check for undefined reason when guid is not image src.
			if ( empty( $attachment_id ) ) {
				$modified_url = substr( $attachment_url, strrpos( $attachment_url, '/' ) + 1 );

				// get attachment id.
				// phpcs:ignore WordPress.DB.DirectDatabaseQuery
				$attachment_id = $wpdb->get_var( $wpdb->prepare( "SELECT post_id FROM {$wpdb->postmeta} WHERE meta_key='_wp_attached_file' AND meta_value LIKE %s", '%' . $modified_url . '%' ) );
			}
		}

		return $attachment_id;
	}
}

if ( ! function_exists( 'qi_blocks_framework_get_image_html_from_src' ) ) {
	/**
	 * Function that returns image tag from url and it's attributes.
	 *
	 * @param string $url
	 * @param array $attr
	 *
	 * @return string
	 */
	function qi_blocks_framework_get_image_html_from_src( $url, $attr = array() ) {
		$html = '';

		if ( ! empty( $url ) ) {
			$html .= '<img src="' . esc_url( $url ) . '"';
			foreach ( $attr as $name => $value ) {
				$html .= ' ' . $name . '="' . $value . '"';
			}
			$html .= ' />';
		}

		return $html;
	}
}

if ( ! function_exists( 'qi_blocks_framework_resize_image' ) ) {
	/**
	 * Function that generates custom thumbnail for given attachment
	 *
	 * @param int|string $attachment - attachment id or url of image to resize
	 * @param int $width desired - height of custom thumbnail
	 * @param int $height desired - width of custom thumbnail
	 * @param bool $crop - whether to crop image or not
	 *
	 * @return array returns array containing img_url, width and height
	 *
	 * @see qi_blocks_framework_get_attachment_id_from_url()
	 * @see get_attached_file()
	 * @see wp_get_attachment_url()
	 * @see wp_get_image_editor()
	 */
	function qi_blocks_framework_resize_image( $attachment, $width = null, $height = null, $crop = true ) {
		$return_array = array();

		if ( ! empty( $attachment ) ) {
			if ( is_int( $attachment ) ) {
				$attachment_id = $attachment;
			} else {
				$attachment_id = qi_blocks_framework_get_attachment_id_from_url( $attachment );
			}

			if ( ! empty( $attachment_id ) && ( isset( $width ) && isset( $height ) ) ) {

				// Get file path of the attachment.
				$img_path = get_attached_file( $attachment_id );

				// Get attachment url.
				$img_url = wp_get_attachment_url( $attachment_id );

				// Break down img path to array, so we can use its components in building thumbnail path.
				$img_path_array = pathinfo( $img_path );

				// build thumbnail path.
				$new_img_path = $img_path_array['dirname'] . '/' . $img_path_array['filename'] . '-' . $width . 'x' . $height . '.' . $img_path_array['extension'];

				// build thumbnail url.
				$new_img_url = str_replace( $img_path_array['filename'], $img_path_array['filename'] . '-' . $width . 'x' . $height, $img_url );

				// check if thumbnail exists by its path.
				if ( ! file_exists( $new_img_path ) ) {
					// get image manipulation object.
					$image_object = wp_get_image_editor( $img_path );

					if ( ! is_wp_error( $image_object ) ) {
						// resize image and save it new to path.
						$image_object->resize( $width, $height, $crop );
						$image_object->save( $new_img_path );

						// get sizes of newly created thumbnail.
						// we don't use $width and $height because those might differ from end result based on $crop parameter.
						$image_sizes = $image_object->get_size();

						$width  = $image_sizes['width'];
						$height = $image_sizes['height'];
					}
				}

				// generate data to be returned.
				$return_array = array(
					'img_url'    => $new_img_url,
					'img_width'  => $width,
					'img_height' => $height,
				);

				// attachment wasn't found in gallery, but it is not empty.
			} elseif ( '' !== $attachment && ( isset( $width ) && isset( $height ) ) ) {
				// generate data to be returned.
				$return_array = array(
					'img_url'    => $attachment,
					'img_width'  => $width,
					'img_height' => $height,
				);
			}
		}

		return $return_array;
	}
}

if ( ! function_exists( 'qi_blocks_framework_generate_thumbnail' ) ) {
	/**
	 * Generates thumbnail img tag. It calls qi_blocks_framework_resize_image function for resizing image
	 *
	 * @param int|string $attachment - attachment id or url to generate thumbnail from
	 * @param int $width - width of thumbnail
	 * @param int $height - height of thumbnail
	 * @param bool $crop - whether to crop thumbnail or not
	 *
	 * @return string generated img tag
	 *
	 * @see qi_blocks_framework_resize_image()
	 * @see qi_blocks_framework_get_attachment_id_from_url()
	 */
	function qi_blocks_framework_generate_thumbnail( $attachment, $width = null, $height = null, $crop = true ) {
		if ( ! empty( $attachment ) ) {
			if ( is_int( $attachment ) ) {
				$attachment_id = $attachment;
			} else {
				$attachment_id = qi_blocks_framework_get_attachment_id_from_url( $attachment );
			}
			$img_info = qi_blocks_framework_resize_image( $attachment_id, $width, $height, $crop );
			$img_alt  = ! empty( $attachment_id ) ? get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ) : '';

			if ( is_array( $img_info ) && count( $img_info ) ) {
				$url            = esc_url( $img_info['img_url'] );
				$attr           = array();
				$attr['alt']    = esc_attr( $img_alt );
				$attr['width']  = esc_attr( $img_info['img_width'] );
				$attr['height'] = esc_attr( $img_info['img_height'] );

				return qi_blocks_framework_get_image_html_from_src( $url, $attr );
			}
		}

		return '';
	}
}

if ( ! function_exists( 'qi_blocks_get_list_block_item_image' ) ) {
	/**
	 * Function that generates thumbnail img tag for list shortcodes
	 *
	 * @param string $image_dimension
	 * @param int $attachment_id
	 *
	 * @return string generated img tag
	 *
	 * @see qi_blocks_framework_generate_thumbnail()
	 */
	function qi_blocks_get_list_block_item_image( $image_dimension = 'full', $attachment_id = 0, $custom_image_width = 0, $custom_image_height = 0 ) {
		$item_id = get_the_ID();
		if ( 'custom' !== $image_dimension ) {
			if ( ! empty( $attachment_id ) ) {
				$html = wp_get_attachment_image( $attachment_id, $image_dimension );
			} else {
				$html = get_the_post_thumbnail( $item_id, $image_dimension );
			}
		} else {
			if ( ! empty( $custom_image_width ) && ! empty( $custom_image_height ) ) {
				if ( ! empty( $attachment_id ) ) {
					$html = qi_blocks_framework_generate_thumbnail( intval( $attachment_id ), $custom_image_width, $custom_image_height );
				} else {
					$html = qi_blocks_framework_generate_thumbnail( intval( get_post_thumbnail_id( $item_id ) ), $custom_image_width, $custom_image_height );
				}
			} else {
				$html = get_the_post_thumbnail( $item_id, $image_dimension );
			}
		}

		return apply_filters( 'qi_blocks_filter_list_shortcode_item_image', $html, $attachment_id );
	}
}

if ( ! function_exists( 'qi_blocks_main_editor_additional_dependencies' ) ) {
	/**
	 * Function that adds additional dependencies for main editor script
	 *
	 * @param array $dependency
	 *
	 * @return array
	 */
	function qi_blocks_main_editor_additional_dependencies( $dependency ) {
		global $pagenow;

		if ( 'widgets.php' !== $pagenow ) {
			$dependency[] = 'wp-edit-post';
		}

		return $dependency;
	}

	add_filter( 'qi_blocks_filter_main_editor_dependencies', 'qi_blocks_main_editor_additional_dependencies' );
}

if ( ! function_exists( 'qi_blocks_escape_title_tag' ) ) {
	/**
	 * Function that escape title tag variable for modules
	 *
	 * @param string $title_tag
	 *
	 * @return string
	 */
	function qi_blocks_escape_title_tag( $title_tag ) {
		$allowed_tags = array(
			'h1',
			'h2',
			'h3',
			'h4',
			'h5',
			'h6',
			'p',
			'span',
			'ul',
			'ol',
		);

		$escaped_title_tag = '';
		$title_tag         = strtolower( sanitize_key( $title_tag ) );

		if ( in_array( $title_tag, $allowed_tags, true ) ) {
			$escaped_title_tag = $title_tag;
		}

		return $escaped_title_tag;
	}
}
