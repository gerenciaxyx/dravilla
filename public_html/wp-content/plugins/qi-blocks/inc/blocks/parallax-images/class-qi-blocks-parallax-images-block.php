<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Qi_Blocks_Parallax_Images_Block' ) ) {
	class Qi_Blocks_Parallax_Images_Block extends Qi_Blocks_Blocks {
		private static $instance;

		public function __construct() {
			// Set block data.
			$this->set_block_name( 'parallax-images' );
			$this->set_block_title( esc_html__( 'Parallax Image Showcase', 'qi-blocks' ) );
			$this->set_block_subcategory( esc_html__( 'Creative', 'qi-blocks' ) );
			$this->set_block_demo_url( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/parallax-image-showcase/' );
			$this->set_block_documentation( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#parallax_image_showcase' );
			$this->set_block_video( 'https://www.youtube.com/watch?v=J4zQxU2VDPI' );

			// Set block 3rd party scripts.
			$this->set_block_3rd_party_scripts(
				array(
					'parallax-images' => array(
						'block_name' => 'parallax-images',
						'url'        => QI_BLOCKS_INC_URL_PATH . '/blocks/parallax-images/assets/js/plugins/jquery.parallax-scroll.js',
					),
				)
			);

			parent::__construct();
		}

		/**
		 * Module class instance
		 *
		 * @return Qi_Blocks_Parallax_Images_Block
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}
	}

	Qi_Blocks_Parallax_Images_Block::get_instance();
}
