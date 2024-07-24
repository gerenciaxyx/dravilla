<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Qi_Blocks_Cards_Gallery_Block' ) ) {
	class Qi_Blocks_Cards_Gallery_Block extends Qi_Blocks_Blocks {
		private static $instance;

		public function __construct() {
			// Set block data.
			$this->set_block_name( 'cards-gallery' );
			$this->set_block_title( esc_html__( 'Cards Gallery', 'qi-blocks' ) );
			$this->set_block_subcategory( esc_html__( 'Creative', 'qi-blocks' ) );
			$this->set_block_demo_url( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/cards-gallery/' );
			$this->set_block_documentation( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#cards_gallery' );
			$this->set_block_video( 'https://www.youtube.com/watch?v=wjtYW_3jUmU' );

			parent::__construct();
		}

		/**
		 * Module class instance
		 *
		 * @return Qi_Blocks_Cards_Gallery_Block
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}
	}

	Qi_Blocks_Cards_Gallery_Block::get_instance();
}
