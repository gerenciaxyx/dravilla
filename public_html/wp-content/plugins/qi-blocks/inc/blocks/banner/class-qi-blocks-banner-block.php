<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Qi_Blocks_Banner_Block' ) ) {
	class Qi_Blocks_Banner_Block extends Qi_Blocks_Blocks {
		private static $instance;

		public function __construct() {
			// Set block data.
			$this->set_block_name( 'banner' );
			$this->set_block_title( esc_html__( 'Banners', 'qi-blocks' ) );
			$this->set_block_subcategory( esc_html__( 'Business', 'qi-blocks' ) );
			$this->set_block_demo_url( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/banners/' );
			$this->set_block_documentation( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#banners' );
			$this->set_block_video( 'https://www.youtube.com/watch?v=_CHN9e-TepM' );

			parent::__construct();
		}

		/**
		 * Module class instance
		 *
		 * @return Qi_Blocks_Banner_Block
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}
	}

	Qi_Blocks_Banner_Block::get_instance();
}
