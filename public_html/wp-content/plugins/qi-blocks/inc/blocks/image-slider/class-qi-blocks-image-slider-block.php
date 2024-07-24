<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Qi_Blocks_Image_Slider_Block' ) ) {
	class Qi_Blocks_Image_Slider_Block extends Qi_Blocks_Blocks {
		private static $instance;

		public function __construct() {
			// Set block data.
			$this->set_block_name( 'image-slider' );
			$this->set_block_title( esc_html__( 'Image Slider', 'qi-blocks' ) );
			$this->set_block_subcategory( esc_html__( 'Showcase/Presentational', 'qi-blocks' ) );
			$this->set_block_demo_url( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/image-slider/' );
			$this->set_block_documentation( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#image_slider' );

			// Set block 3rd party scripts.
			$this->set_block_3rd_party_scripts(
				array(
					'swiper' => array(
						'block_name' => 'image-slider',
						'url'        => 'core',
						'has_style'  => true,
					),
					'fslightbox' => array(
						'block_name' => 'image-slider',
						'url'        => 'core',
						'has_style'  => false,
					),
				)
			);

			parent::__construct();
		}

		/**
		 * Module class instance
		 *
		 * @return Qi_Blocks_Image_Slider_Block
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}
	}

	Qi_Blocks_Image_Slider_Block::get_instance();
}
