<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( ! function_exists( 'qi_blocks_register_masonry_3rd_party_scripts' ) ) {
	/**
	 * Function that set additional 3rd party scripts
	 */
	function qi_blocks_register_masonry_3rd_party_scripts() {

		// Register masonry scripts.
		wp_register_script( 'isotope', QI_BLOCKS_INC_URL_PATH . '/masonry/assets/plugins/isotope.pkgd.min.js', array( 'jquery' ), '3.0.6', true );
		wp_register_script( 'packery', QI_BLOCKS_INC_URL_PATH . '/masonry/assets/plugins/packery-mode.pkgd.min.js', array( 'jquery' ), '2.0.1', true );
	}

	add_action( 'qi_blocks_action_additional_3rd_party_scripts', 'qi_blocks_register_masonry_3rd_party_scripts' );
}
