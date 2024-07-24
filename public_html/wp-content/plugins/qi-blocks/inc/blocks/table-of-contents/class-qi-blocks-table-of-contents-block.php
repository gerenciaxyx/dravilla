<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Qi_Blocks_Table_Of_Contents_Block' ) ) {
	class Qi_Blocks_Table_Of_Contents_Block extends Qi_Blocks_Blocks {
		private static $instance;

		public function __construct() {
			// Set block data.
			$this->set_block_name( 'table-of-contents' );
			$this->set_block_title( esc_html__( 'Table of Contents', 'qi-blocks' ) );
			$this->set_block_subcategory( esc_html__( 'SEO', 'qi-blocks' ) );
			$this->set_block_demo_url( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/table-of-contents/' );
			$this->set_block_documentation( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#table_of_contents' );

			parent::__construct();
		}

		/**
		 * Module class instance
		 *
		 * @return Qi_Blocks_Table_Of_Contents_Block
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}
	}

	Qi_Blocks_Table_Of_Contents_Block::get_instance();
}
