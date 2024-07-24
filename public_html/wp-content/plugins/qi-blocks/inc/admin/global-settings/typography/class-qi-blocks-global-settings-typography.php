<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( ! class_exists( 'Qi_Blocks_Global_Settings_Typography' ) ) {
	class Qi_Blocks_Global_Settings_Typography {
		private static $instance;

		public function __construct() {
			// Create global settings option.
			add_action( 'init', array( $this, 'add_options' ) );

			// Add page inline styles.
			add_action( 'wp_enqueue_scripts', array( $this, 'set_global_typography_styles' ), 15 ); // permission 15 is set in order to be after the main css file and before the blocks custom styles (@see Qi_Blocks_Framework_Global_Styles)

			// Add page editor inline styles.
			add_action( 'enqueue_block_editor_assets', array( $this, 'set_global_typography_editor_styles' ), 15 ); // permission 15 is set in order to be after the main editor css file
		}

		/**
		 * Module class instance
		 *
		 * @return Qi_Blocks_Global_Settings_Typography
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function sanitize_typography_array( $value ) {
			return ! is_array( $value ) ? array( array() ) : $value;
		}

		public function sanitize_typography_string( $value ) {
			return ! is_string( $value ) ? '' : $value;
		}

		public function add_options() {
			$typography_schema = array(
				'type'       => 'object',
				'properties' => array(
					'fontFamily'              => array(
						'type'    => 'string',
						'default' => '',
					),
					'fontSize'                => array(
						'type'    => 'string',
						'default' => '',
					),
					'fontSizeUnit'            => array(
						'type'    => 'string',
						'default' => 'px',
					),
					'fontSizeDecimal'         => array(
						'type'    => 'string',
						'default' => '',
					),
					'fontSizeTablet'          => array(
						'type'    => 'string',
						'default' => '',
					),
					'fontSizeMobile'          => array(
						'type'    => 'string',
						'default' => '',
					),
					'fontSizeUnitTablet'      => array(
						'type'    => 'string',
						'default' => 'px',
					),
					'fontSizeUnitMobile'      => array(
						'type'    => 'string',
						'default' => 'px',
					),
					'fontSizeDecimalTablet'   => array(
						'type'    => 'string',
						'default' => '',
					),
					'fontSizeDecimalMobile'   => array(
						'type'    => 'string',
						'default' => '',
					),
					'fontWeight'              => array(
						'type'    => 'string',
						'default' => '',
					),
					'textTransform'           => array(
						'type'    => 'string',
						'default' => '',
					),
					'fontStyle'               => array(
						'type'    => 'string',
						'default' => '',
					),
					'textDecoration'          => array(
						'type'    => 'string',
						'default' => '',
					),
					'lineHeight'              => array(
						'type'    => 'string',
						'default' => '',
					),
					'lineHeightUnit'          => array(
						'type'    => 'string',
						'default' => 'px',
					),
					'lineHeightDecimal'       => array(
						'type'    => 'string',
						'default' => '',
					),
					'lineHeightTablet'        => array(
						'type'    => 'string',
						'default' => '',
					),
					'lineHeightMobile'        => array(
						'type'    => 'string',
						'default' => '',
					),
					'lineHeightUnitTablet'    => array(
						'type'    => 'string',
						'default' => 'px',
					),
					'lineHeightUnitMobile'    => array(
						'type'    => 'string',
						'default' => 'px',
					),
					'lineHeightDecimalTablet' => array(
						'type'    => 'string',
						'default' => '',
					),
					'lineHeightDecimalMobile' => array(
						'type'    => 'string',
						'default' => '',
					),
					'letterSpacing'           => array(
						'type'    => 'string',
						'default' => '',
					),
				)
			);

			$defaultAttributes       = array();
			$defaultTypographyValues = array(
				'fontFamily'                 => '',
				'fontSize'                   => '',
				'fontSizeUnit'               => 'px',
				'fontSizeDecimal'            => '',
				'fontSizeTablet'             => '',
				'fontSizeMobile'             => '',
				'fontSizeUnitTablet'         => 'px',
				'fontSizeUnitMobile'         => 'px',
				'fontSizeDecimalTablet'      => '',
				'fontSizeDecimalMobile'      => '',
				'fontWeight'                 => '',
				'textTransform'              => '',
				'fontStyle'                  => '',
				'textDecoration'             => '',
				'lineHeight'                 => '',
				'lineHeightUnit'             => 'px',
				'lineHeightDecimal'          => '',
				'lineHeightTablet'           => '',
				'lineHeightMobile'           => '',
				'lineHeightUnitTablet'       => 'px',
				'lineHeightUnitMobile'       => 'px',
				'lineHeightDecimalTablet'    => '',
				'lineHeightDecimalMobile'    => '',
				'letterSpacing'              => '',
				'letterSpacingUnit'          => 'px',
				'letterSpacingDecimal'       => '',
				'letterSpacingTablet'        => '',
				'letterSpacingMobile'        => '',
				'letterSpacingUnitTablet'    => 'px',
				'letterSpacingUnitMobile'    => 'px',
				'letterSpacingDecimalTablet' => '',
				'letterSpacingDecimalMobile' => '',
			);

			for ( $i = 1; $i <= 6; $i ++ ) {
				$defaultAttributes[ 'h' . $i ] = $defaultTypographyValues;
			}

			$defaultAttributes['p'] = $defaultTypographyValues;

			register_setting(
				'qi_blocks_global_settings',
				'qi_blocks_global_settings_typography',
				array(
					'type'              => 'array',
					'description'       => esc_attr__( 'Global Typography Settings', 'qi-blocks' ),
					'sanitize_callback' => array( $this, 'sanitize_typography_array' ),
					'show_in_rest'      => array(
						'schema' => array(
							'items' => array(
								'type'       => 'object',
								'properties' => array(
									'h1' => $typography_schema,
									'h2' => $typography_schema,
									'h3' => $typography_schema,
									'h4' => $typography_schema,
									'h5' => $typography_schema,
									'h6' => $typography_schema,
									'p'  => $typography_schema,
								)
							)
						)
					),
					'default'           => array(
						0 => $defaultAttributes,
					),
				)
			);

			register_setting(
				'qi_blocks_global_settings',
				'qi_blocks_global_settings_typography_styles',
				array(
					'type'              => 'string',
					'description'       => esc_attr__( 'Global Typography Settings Styles', 'qi-blocks' ),
					'sanitize_callback' => array( $this, 'sanitize_typography_string' ),
					'show_in_rest'      => true,
					'default'           => '',
				)
			);

			register_setting(
				'qi_blocks_global_settings',
				'qi_blocks_global_settings_typography_apply_to',
				array(
					'type'              => 'string',
					'description'       => esc_attr__( 'Global Typography Settings Apply To', 'qi-blocks' ),
					'sanitize_callback' => array( $this, 'sanitize_typography_string' ),
					'show_in_rest'      => true,
					'default'           => 'blocks-qi-native',
				)
			);
		}

		public function get_typography_styles_fonts() {
			$options = get_option( 'qi_blocks_global_settings_typography' );
			$fonts   = array(
				'family' => array(),
				'weight' => array(),
				'style'  => array(),
			);

			if ( ! empty( $options ) && isset( $options[0] ) && ! empty( $options[0] ) ) {
				foreach ( $options[0] as $option ) {

					if ( isset( $option['fontFamily'] ) && ! empty( $option['fontFamily'] ) ) {
						$fonts['family'][] = $option['fontFamily'];
					}

					if ( isset( $option['fontWeight'] ) && ! empty( $option['fontWeight'] ) ) {
						$fonts['weight'][] = $option['fontWeight'];
					}

					if ( isset( $option['fontStyle'] ) && ! empty( $option['fontStyle'] ) ) {
						$fonts['style'][] = $option['fontStyle'];
					}
				}
			}

			return $fonts;
		}

		public function set_global_typography_styles() {
			$styles = get_option( 'qi_blocks_global_settings_typography_styles' );

			if ( ! empty( $styles ) ) {
				$fonts = $this->get_typography_styles_fonts();

				// Enqueue Google Fonts.
				if ( ! empty( $fonts['family'] ) ) {
					Qi_Blocks_Framework_Global_Styles::get_instance()->include_google_fonts( $fonts );
				}

				// Load styles.
				wp_add_inline_style( 'qi-blocks-main', $styles );
			}
		}

		public function set_global_typography_editor_styles() {
			$styles = get_option( 'qi_blocks_global_settings_typography_styles' );

			if ( ! empty( $styles ) ) {
				$fonts = $this->get_typography_styles_fonts();

				// Enqueue Google Fonts.
				if ( ! empty( $fonts['family'] ) ) {
					Qi_Blocks_Framework_Global_Styles::get_instance()->include_google_fonts( $fonts );
				}

				// Load styles.
				wp_add_inline_style( 'qi-blocks-grid-editor', $styles );
			}
		}
	}

	Qi_Blocks_Global_Settings_Typography::get_instance();
}
