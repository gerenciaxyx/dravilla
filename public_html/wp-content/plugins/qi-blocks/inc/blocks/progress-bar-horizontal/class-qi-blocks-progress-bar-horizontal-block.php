<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Qi_Blocks_Progress_Bar_Horizontal_Block' ) ) {
	class Qi_Blocks_Progress_Bar_Horizontal_Block extends Qi_Blocks_Blocks {
		private static $instance;

		public function __construct() {
			// Set block data.
			$this->set_block_name( 'progress-bar-horizontal' );
			$this->set_block_title( esc_html__( 'Horizontal Progress Bar', 'qi-blocks' ) );
			$this->set_block_subcategory( esc_html__( 'Infographics', 'qi-blocks' ) );
			$this->set_block_demo_url( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/horizontal-progress-bar/' );
			$this->set_block_documentation( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#horizontal_progress_bar' );

			// Set block 3rd party scripts.
			$this->set_block_3rd_party_scripts(
				array(
					'progress-bar' => array(
						'block_name' => 'progress-bar-horizontal',
						'url'        => QI_BLOCKS_INC_URL_PATH . '/blocks/progress-bar-horizontal/assets/js/plugins/progressbar.min.js',
					),
				)
			);

			parent::__construct();
		}

		/**
		 * Module class instance
		 *
		 * @return Qi_Blocks_Progress_Bar_Horizontal_Block
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}
	}

	Qi_Blocks_Progress_Bar_Horizontal_Block::get_instance();
}
