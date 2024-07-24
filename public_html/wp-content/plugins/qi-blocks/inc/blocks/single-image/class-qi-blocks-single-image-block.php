<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Qi_Blocks_Single_Image_Block' ) ) {
	class Qi_Blocks_Single_Image_Block extends Qi_Blocks_Blocks {
		private static $instance;

		public function __construct() {
			// Set block data.
			$this->set_block_name( 'single-image' );
			$this->set_block_title( esc_html__( 'Single Image', 'qi-blocks' ) );
			$this->set_block_subcategory( esc_html__( 'Showcase/Presentational', 'qi-blocks' ) );
			$this->set_block_demo_url( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/single-image/' );
			$this->set_block_documentation( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#single_image' );
			$this->set_block_video( 'https://www.youtube.com/watch?v=m9beJAnVCnI' );

			// Set block 3rd party scripts.
			$this->set_block_3rd_party_scripts(
				array(
					'fslightbox' => array(
						'block_name' => 'single-image',
						'url'        => 'core',
						'has_style'  => false,
					),
				)
			);

			parent::__construct();
		}

		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}
	}

	Qi_Blocks_Single_Image_Block::get_instance();
}
