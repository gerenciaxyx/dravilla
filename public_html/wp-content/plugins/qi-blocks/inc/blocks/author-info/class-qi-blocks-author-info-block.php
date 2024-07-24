<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Qi_Blocks_Author_Info_Block' ) ) {
	class Qi_Blocks_Author_Info_Block extends Qi_Blocks_Blocks {
		private static $instance;

		public function __construct() {
			// Set block data.
			$this->set_block_name( 'author-info' );
			$this->set_block_title( esc_html__( 'Author Info', 'qi-blocks' ) );
			$this->set_block_subcategory( esc_html__( 'Content', 'qi-blocks' ) );
			$this->set_block_demo_url( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/author-info/' );
			$this->set_block_documentation( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#author_info' );

			parent::__construct();
		}

		/**
		 * Module class instance
		 *
		 * @return Qi_Blocks_Author_Info_Block
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}
	}

	Qi_Blocks_Author_Info_Block::get_instance();
}
