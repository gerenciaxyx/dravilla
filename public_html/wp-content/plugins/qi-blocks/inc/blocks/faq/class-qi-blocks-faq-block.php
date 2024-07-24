<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Qi_Blocks_Faq_Block' ) ) {
	class Qi_Blocks_Faq_Block extends Qi_Blocks_Blocks {
		private static $instance;

		public function __construct() {
			// Set block data.
			$this->set_block_name( 'faq' );
			$this->set_block_title( esc_html__( 'FAQs', 'qi-blocks' ) );
			$this->set_block_subcategory( esc_html__( 'SEO', 'qi-blocks' ) );
			$this->set_block_demo_url( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/faqs/' );
			$this->set_block_documentation( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#faq' );

			// Set block 3rd party scripts.
			$this->set_block_3rd_party_scripts(
				array(
					'jquery-ui-accordion' => array(
						'block_name' => 'faq',
						'url'        => 'core',
					),
				)
			);

			parent::__construct();
		}

		/**
		 * Module class instance
		 *
		 * @return Qi_Blocks_Faq_Block
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}
	}

	Qi_Blocks_Faq_Block::get_instance();
}
