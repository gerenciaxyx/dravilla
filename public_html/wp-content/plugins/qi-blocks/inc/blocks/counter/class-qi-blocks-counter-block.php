<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Qi_Blocks_Counter_Block' ) ) {
	class Qi_Blocks_Counter_Block extends Qi_Blocks_Blocks {
		private static $instance;

		public function __construct() {
			// Set block data.
			$this->set_block_name( 'counter' );
			$this->set_block_title( esc_html__( 'Counters', 'qi-blocks' ) );
			$this->set_block_subcategory( esc_html__( 'Infographics', 'qi-blocks' ) );
			$this->set_block_demo_url( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/counters/' );
			$this->set_block_documentation( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#counter' );
			$this->set_block_video( 'https://www.youtube.com/watch?v=ldQgXyRLUUg' );

			parent::__construct();
		}

		/**
		 * Module class instance
		 *
		 * @return Qi_Blocks_Counter_Block
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}
	}

	Qi_Blocks_Counter_Block::get_instance();
}
