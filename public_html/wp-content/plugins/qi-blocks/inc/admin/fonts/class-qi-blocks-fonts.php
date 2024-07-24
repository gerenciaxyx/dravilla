<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( ! class_exists( 'Qi_Blocks_Fonts' ) ) {
	/**
	 * Rest API class with configuration
	 */
	class Qi_Blocks_Fonts {
		private static $instance;

		public function __construct() {

			// Localize main editor js script with additional variables.
			add_filter( 'qi_blocks_filter_localize_main_editor_js', array( $this, 'localize_script' ) );
		}

		/**
		 * Module class instance
		 *
		 * @return Qi_Blocks_Fonts
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function get_system_fonts() {
			return array(
				array(
					'label' => esc_attr__( 'Default', 'qi-blocks' ),
					'value' => '',
				),
				array(
					'label' => esc_attr__( 'System Fonts', 'qi-blocks' ),
					'value' => 'System',
				),
				array(
					'label' => esc_attr__( 'Inherit', 'qi-blocks' ),
					'value' => 'inherit',
				),
				array(
					'label' => esc_attr__( 'Initial', 'qi-blocks' ),
					'value' => 'initial',
				),
				array(
					'label' => esc_attr__( 'Arial', 'qi-blocks' ),
					'value' => 'Arial',
				),
				array(
					'label' => esc_attr__( 'Arial Black', 'qi-blocks' ),
					'value' => 'Arial Black',
				),
				array(
					'label' => esc_attr__( 'Comic Sans MS', 'qi-blocks' ),
					'value' => 'Comic Sans MS',
				),
				array(
					'label' => esc_attr__( 'Courier New', 'qi-blocks' ),
					'value' => 'Courier New',
				),
				array(
					'label' => esc_attr__( 'Georgia', 'qi-blocks' ),
					'value' => 'Georgia',
				),
				array(
					'label' => esc_attr__( 'Impact', 'qi-blocks' ),
					'value' => 'Impact',
				),
				array(
					'label' => esc_attr__( 'Lucida Console', 'qi-blocks' ),
					'value' => 'Lucida Console',
				),
				array(
					'label' => esc_attr__( 'Lucida Sans Unicode', 'qi-blocks' ),
					'value' => 'Lucida Sans Unicode',
				),
				array(
					'label' => esc_attr__( 'Palatino Linotype', 'qi-blocks' ),
					'value' => 'Palatino Linotype',
				),
				array(
					'label' => esc_attr__( 'Tahoma', 'qi-blocks' ),
					'value' => 'Tahoma',
				),
				array(
					'label' => esc_attr__( 'Times New Roman', 'qi-blocks' ),
					'value' => 'Times New Roman',
				),
				array(
					'label' => esc_attr__( 'Trebuchet MS', 'qi-blocks' ),
					'value' => 'Trebuchet MS',
				),
				array(
					'label' => esc_attr__( 'Verdana', 'qi-blocks' ),
					'value' => 'Verdana',
				),
				array(
					'label' => esc_attr__( 'Sans-Serif', 'qi-blocks' ),
					'value' => 'sans-serif',
				),
				array(
					'label' => esc_attr__( 'Serif', 'qi-blocks' ),
					'value' => 'serif',
				),
				array(
					'label' => esc_attr__( 'Serif Alternative', 'qi-blocks' ),
					'value' => 'serif-alt',
				),
				array(
					'label' => esc_attr__( 'Monospace', 'qi-blocks' ),
					'value' => 'monospace',
				),
			);
		}

		public function localize_script( $global ) {
			$general_options      = get_option( QI_BLOCKS_GENERAL_OPTIONS, array() );
			$disable_google_fonts = ! empty( $general_options ) && isset( $general_options['disable_google_fonts'] );

			$global['fontOptions']         = $this->get_system_fonts();
			$global['systemFontOptions']   = $this->get_system_fonts();
			$global['googleFontsDisabled'] = $disable_google_fonts;

			return apply_filters( 'qi_blocks_filter_localize_main_editor_js_fonts', $global );
		}
	}

	Qi_Blocks_Fonts::get_instance();
}
