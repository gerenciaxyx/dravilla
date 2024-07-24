<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Qi_Blocks_Blocks_List' ) ) {
	class Qi_Blocks_Blocks_List {
		private static $instance;
		private $blocks = array();

		public function __construct() {
		}

		/**
		 * Module class instance
		 *
		 * @return Qi_Blocks_Blocks_List
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function add_block( $block ) {
			$this->blocks[ $block['key'] ] = $block['value'];
		}

		public function get_blocks() {
			return array_merge( $this->blocks, qi_blocks_get_premium_blocks_list() );
		}
	}
}
