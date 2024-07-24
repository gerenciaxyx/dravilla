<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Qi_Blocks_Countdown_Block' ) ) {
	class Qi_Blocks_Countdown_Block extends Qi_Blocks_Blocks {
		private static $instance;

		public function __construct() {
			// Set block data.
			$this->set_block_name( 'countdown' );
			$this->set_block_title( esc_html__( 'Countdown', 'qi-blocks' ) );
			$this->set_block_subcategory( esc_html__( 'Showcase/Presentational', 'qi-blocks' ) );
			$this->set_block_demo_url( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/countdown/' );
			$this->set_block_documentation( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#countdown' );
			$this->set_block_video( 'https://www.youtube.com/watch?v=f_R06hey4L8' );

			parent::__construct();
		}

		/**
		 * Module class instance
		 *
		 * @return Qi_Blocks_Countdown_Block
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}
	}

	Qi_Blocks_Countdown_Block::get_instance();
}
