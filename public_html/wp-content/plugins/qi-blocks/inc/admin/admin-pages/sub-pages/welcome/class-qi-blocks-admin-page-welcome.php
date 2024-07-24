<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( ! function_exists( 'qi_blocks_add_welcome_sub_page_to_list' ) ) {
	/**
	 * Function that add additional sub-page item into general page list
	 *
	 * @param array $sub_pages
	 *
	 * @return array
	 */
	function qi_blocks_add_welcome_sub_page_to_list( $sub_pages ) {
		$sub_pages[] = 'Qi_Blocks_Admin_Page_Welcome';

		return $sub_pages;
	}

	add_filter( 'qi_blocks_filter_add_sub_page', 'qi_blocks_add_welcome_sub_page_to_list' );
}

if ( class_exists( 'Qi_Blocks_Admin_Sub_Pages' ) ) {
	class Qi_Blocks_Admin_Page_Welcome extends Qi_Blocks_Admin_Sub_Pages {

		public function __construct() {
			parent::__construct();

			add_action( 'qi_blocks_action_additional_scripts', array( $this, 'set_additional_scripts' ) );
		}

		public function add_sub_page() {
			$this->set_base( 'welcome' );
			$this->set_menu_slug( 'qi_blocks_welcome' );
			$this->set_title( esc_html__( 'Welcome Page', 'qi-blocks' ) );
			$this->set_position( 1 );
		}

		public function set_additional_scripts() {

			if ( isset( $_GET['page'] ) && $_GET['page'] === $this->get_menu_slug() ) {
				wp_enqueue_script( 'mailchimp', QI_BLOCKS_ADMIN_URL_PATH . '/admin-pages/assets/plugins/mailchimp/mailchimp.min.js', array( 'jquery' ), false, true );
			}
		}
	}
}
