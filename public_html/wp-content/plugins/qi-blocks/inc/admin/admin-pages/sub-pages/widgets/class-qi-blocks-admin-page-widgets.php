<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( ! function_exists( 'qi_blocks_add_widgets_sub_page_to_list' ) ) {
	/**
	 * Function that add additional sub-page item into general page list
	 *
	 * @param array $sub_pages
	 *
	 * @return array
	 */
	function qi_blocks_add_widgets_sub_page_to_list( $sub_pages ) {
		$sub_pages[] = 'Qi_Blocks_Admin_Page_Widgets';

		return $sub_pages;
	}

	add_filter( 'qi_blocks_filter_add_sub_page', 'qi_blocks_add_widgets_sub_page_to_list' );
}

if ( class_exists( 'Qi_Blocks_Admin_Sub_Pages' ) ) {
	class Qi_Blocks_Admin_Page_Widgets extends Qi_Blocks_Admin_Sub_Pages {

		public function __construct() {
			parent::__construct();

			add_action( 'wp_ajax_qi_blocks_action_widget_save_options', array( $this, 'save_widgets' ) );
		}

		public function get_sidebar() {
			qi_blocks_template_part( 'admin/admin-pages', 'sub-pages/widgets/templates/sidebar' );
		}

		public function add_sub_page() {
			$this->set_base( 'widgets' );
			$this->set_menu_slug( 'qi_blocks_blocks' );
			$this->set_title( esc_html__( 'Blocks', 'qi-blocks' ) );
			$this->set_atts( $this->set_atributtes() );
			$this->set_position( 2 );
		}

		public function set_atributtes() {
			$blocks              = $this->sort_blocks_by_subcategory( $this->get_blocks() );
			$block_status        = apply_filters( 'qi_blocks_filter_block_status', false );
			$premium_flag        = qi_blocks_is_installed( 'premium' ) && $block_status;
			$disabled            = $this->disabled_blocks();
			$enabled_subcategory = $this->complete_enabled_subcategory( $blocks, $disabled, $premium_flag );

			return array(
				'general_options'     => $this->get_general_options(),
				'blocks'              => $blocks,
				'premium_flag'        => $premium_flag,
				'disabled'            => $this->disabled_blocks(),
				'enabled_subcategory' => $enabled_subcategory,
			);
		}

		public function get_general_options() {
			return get_option( QI_BLOCKS_GENERAL_OPTIONS, array() );
		}

		public function get_blocks() {
			return Qi_Blocks_Blocks_List::get_instance()->get_blocks();
		}

		public function sort_blocks_by_subcategory( $blocks ) {
			$formatted = array();

			foreach ( $blocks as $key => $block ) {
				$subcategory_key = str_replace( ' ', '-', $block['subcategory'] );

				$formatted[ $subcategory_key ][ $key ] = $block;
			}

			return $formatted;
		}

		public function disabled_blocks() {
			return get_option( QI_BLOCKS_DISABLED_BLOCKS, array() );
		}

		public function complete_enabled_subcategory( $subcategory_blocks, $disabled, $premium_flag ) {

			if ( ! $premium_flag && ! empty( $disabled ) ) {
				foreach ( $disabled as $disabled_key => $disabled_value ) {
					if ( key_exists( $disabled_key, qi_blocks_get_premium_blocks_list() ) ) {
						unset( $disabled[ $disabled_key ] );
					}
				}
			}

			foreach ( $subcategory_blocks as $subcategory_key => $blocks ) {
				foreach ( $blocks as $block_key => $block ) {
					if ( key_exists( $block_key, $disabled ) ) {
						unset( $subcategory_blocks[ $subcategory_key ] );
						break;
					}
				}
			}

			return array_keys( $subcategory_blocks );
		}

		public function save_widgets() {

			if ( current_user_can( 'edit_theme_options' ) ) {
				if ( isset( $_REQUEST['action'] ) ) {
					unset( $_REQUEST['action'] );
				}

				check_ajax_referer( 'qi_blocks_widget_save_nonce', 'qi_blocks_widget_save_nonce' );

				$general_options = array();
				if ( ! empty( $_REQUEST['general_options'] ) ) {
					foreach ( $_REQUEST['general_options'] as $general_option_key => $general_option_value ) {
						$general_options[ sanitize_text_field( $general_option_key ) ] = esc_attr( $general_option_value );
					}
				}

				update_option( QI_BLOCKS_GENERAL_OPTIONS, $general_options );

				$disabled = array();
				$blocks   = $this->get_blocks();

				foreach ( $blocks as $block_slug => $block ) {
					if ( ! isset( $_REQUEST[ $block_slug ] ) ) {
						$disabled[ $block_slug ] = $block['title'];
					}
				}

				$results = update_option( QI_BLOCKS_DISABLED_BLOCKS, $disabled );

				if ( $results ) {
					esc_html_e( 'Saved', 'qi-blocks' );
				}

				die();
			}
		}
	}
}
