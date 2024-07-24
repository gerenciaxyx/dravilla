<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Qi_Blocks_Image_Gallery_Block' ) ) {
	class Qi_Blocks_Image_Gallery_Block extends Qi_Blocks_Blocks {
		private static $instance;

		public function __construct() {
			// Set block data.
			$this->set_block_name( 'image-gallery' );
			$this->set_block_title( esc_html__( 'Image Gallery', 'qi-blocks' ) );
			$this->set_block_subcategory( esc_html__( 'Showcase/Presentational', 'qi-blocks' ) );
			$this->set_block_demo_url( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/image-gallery/' );
			$this->set_block_documentation( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#image_gallery' );
			$this->set_block_video( 'https://www.youtube.com/watch?v=8PYeKfAf5G0' );

			// Set block 3rd party scripts.
			$this->set_block_3rd_party_scripts(
				array(
					'fslightbox' => array(
						'block_name' => 'image-gallery',
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
		 * @return Qi_Blocks_Image_Gallery_Block
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}
	}

	Qi_Blocks_Image_Gallery_Block::get_instance();
}
