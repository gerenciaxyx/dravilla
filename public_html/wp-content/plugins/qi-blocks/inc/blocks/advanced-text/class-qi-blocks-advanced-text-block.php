<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Qi_Blocks_Advanced_Text_Block' ) ) {
	class Qi_Blocks_Advanced_Text_Block extends Qi_Blocks_Blocks {
		private static $instance;

		public function __construct() {
			// Set block name.
			$this->set_block_name( 'advanced-text' );
			$this->set_block_title( esc_html__( 'Advanced Text', 'qi-blocks' ) );
			$this->set_block_subcategory( esc_html__( 'Typography', 'qi-blocks' ) );
			$this->set_block_demo_url( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/advanced-text/' );
			$this->set_block_documentation( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#advanced_text' );

			parent::__construct();
		}

		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}
	}

	Qi_Blocks_Advanced_Text_Block::get_instance();
}
