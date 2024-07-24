<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( ! function_exists( 'qi_blocks_add_setup_wizard_sub_page_to_list' ) ) {
	/**
	 * Function that add additional sub-page item into general page list
	 *
	 * @param array $sub_pages
	 *
	 * @return array
	 */
	function qi_blocks_add_setup_wizard_sub_page_to_list( $sub_pages ) {
		$sub_pages[] = 'Qi_Blocks_Admin_Page_Setup_Wizard';

		return $sub_pages;
	}

	add_filter( 'qi_blocks_filter_add_sub_page', 'qi_blocks_add_setup_wizard_sub_page_to_list' );
}

if ( class_exists( 'Qi_Blocks_Admin_Sub_Pages' ) ) {
	class Qi_Blocks_Admin_Page_Setup_Wizard extends Qi_Blocks_Admin_Sub_Pages {

		public function __construct() {
			parent::__construct();

			add_action( 'in_admin_header', array( $this, 'remove_notice' ), 1000 );
			add_filter( 'admin_body_class', array( $this, 'add_admin_body_classes' ) );

			add_action( 'admin_enqueue_scripts', array( $this, 'set_additional_scripts' ) );

			add_action( 'wp_ajax_qi_blocks_action_setup_wizard_save_options', array( $this, 'save_options' ) );
		}

		public function add_sub_page() {
			$this->set_base( 'setup-wizard' );
			$this->set_menu_slug( 'qi_blocks_setup_wizard' );
			$this->set_title( esc_html__( 'Setup Wizard', 'qi-blocks' ) );
			$this->set_atts( $this->set_atributtes() );
			$this->set_position( 10 );
		}

		public function set_atributtes() {
			$blocks         = $this->sort_blocks_by_subcategory( $this->get_blocks() );
			$premium_flag   = qi_blocks_is_installed( 'premium' );
			$templates_flag = qi_blocks_is_installed( 'qi-templates' );

			return array(
				'blocks'         => $blocks,
				'premium_flag'   => $premium_flag,
				'templates_flag' => $templates_flag,
			);
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

			// Move Before/After Comparison Slider element to the end - designer requests.
			foreach ( $formatted as $formatted_key => $formatted_items ) {

				if ( isset( $formatted_items['before-after'] ) ) {
					$before_after_element = $formatted_items['before-after'];

					unset( $formatted[ $formatted_key ]['before-after'] );

					$formatted[ $formatted_key ]['before-after'] = $before_after_element;
				}
			}

			return $formatted;
		}

		public function remove_notice() {

			if ( isset( $_GET['page'] ) && 'qi_blocks_setup_wizard' === $_GET['page'] ) {
				remove_all_actions( 'admin_notices' );
				remove_all_actions( 'all_admin_notices' );
			}
		}

		public function add_admin_body_classes( $classes ) {

			if ( isset( $_GET['page'] ) && $this->get_menu_slug() === $_GET['page'] ) {
				$classes = $classes . ' qi-blocks-setup-wizard';
			}

			return $classes;
		}

		public function set_additional_scripts( $hook ) {

			if ( isset( $hook ) && strpos( $hook, $this->get_menu_slug() ) !== false ) {
				wp_enqueue_style( 'qi-blocks-setup-wizard', QI_BLOCKS_ASSETS_URL_PATH . '/dist/setup-wizard.css', array( 'qi-blocks-dashboard-style' ) );
				wp_enqueue_script( 'qi-blocks-setup-wizard', QI_BLOCKS_ASSETS_URL_PATH . '/dist/setup-wizard.js', array( 'jquery' ), false, true );
			}
		}

		public function render() {
			$args = $this->get_atts();

			qi_blocks_template_part( 'admin/admin-pages/sub-pages/' . $this->get_base(), 'templates/' . $this->get_base(), '', $args );
		}

		public function save_options() {

			if ( current_user_can( 'edit_theme_options' ) ) {
				if ( isset( $_REQUEST['action'] ) ) {
					unset( $_REQUEST['action'] );
				}

				check_ajax_referer( 'qi_blocks_setup_wizard_save_nonce', 'qi_blocks_setup_wizard_save_nonce' );

				// Prevent other handles if skip is triggered.
				if ( isset( $_REQUEST['skip_trigger'] ) && '' === sanitize_text_field( $_REQUEST['skip_trigger'] ) ) {
					// Set Elements step.
					$disabled = array();
					$blocks   = $this->get_blocks();

					foreach ( $blocks as $block_slug => $block ) {
						if ( ! isset( $_REQUEST[ $block_slug ] ) ) {
							$disabled[ $block_slug ] = $block['title'];
						}
					}

					update_option( QI_BLOCKS_DISABLED_BLOCKS, ! empty( $disabled ) ? $disabled : false );

					// Send User stats.
					if ( isset( $_REQUEST['user_stats'] ) && 'yes' === sanitize_text_field( $_REQUEST['user_stats'] ) ) {
						$this->handle_allowed_user_stats();
					}
				}

				// Set wizard flag.
				$results = update_option( 'qi_blocks_setup_wizard', 'completed' );

				if ( $results ) {
					qi_blocks_get_ajax_status( 'success', esc_html__( 'Success', 'qi-blocks' ), array( 'redirect_url' => esc_url( admin_url( 'admin.php?page=qi_blocks_welcome' ) ) ) );
				}
			}
		}

		private function handle_allowed_user_stats() {
			global $wp_version;

			$data = array(
				'plugin'      => 'qi-blocks',
				'domain'      => esc_url( get_home_url() ),
				'date'        => gmdate( 'Y-m-d H:i:s' ),
				'wp_version'  => $wp_version,
				'wp_language' => get_bloginfo( 'language' ),
				'php_version' => phpversion(),
			);

			$current_user = wp_get_current_user();
			if ( $current_user ) {
				$data['mail'] = $current_user->user_email;
			}

			$theme = $this->get_theme_info();
			if ( is_array( $theme ) && count( $theme ) > 0 ) {
				$data['active_theme'] = serialize( $theme );
			}

			$plugins = $this->get_active_plugins();
			if ( is_array( $plugins ) && count( $plugins ) > 0 ) {
				$data['active_plugins'] = serialize( $plugins );
			}

			wp_remote_post(
				'https://api.qodeinteractive.com/plugin-statistics.php',
				array(
					'body' => $data,
				)
			);
		}

		public function get_theme_info() {
			$theme_info = wp_get_theme();

			return array(
				'name'    => esc_attr( $theme_info->get( 'Name' ) ),
				'version' => esc_attr( $theme_info->get( 'Version' ) ),
				'author'  => esc_attr( $theme_info->get( 'Author' ) ),
			);
		}

		public function get_active_plugins() {
			$active_plugins = array();
			$plugins        = get_plugins();

			foreach ( $plugins as $plugin_file => $plugin_data ) {
				if ( is_plugin_active( $plugin_file ) ) {
					$active_plugins[ $plugin_file ]['title']      = esc_attr( $plugin_data['Title'] );
					$active_plugins[ $plugin_file ]['url']        = esc_url( $plugin_data['PluginURI'] );
					$active_plugins[ $plugin_file ]['author']     = esc_attr( $plugin_data['Author'] );
					$active_plugins[ $plugin_file ]['author_url'] = esc_url( $plugin_data['AuthorURI'] );
					$active_plugins[ $plugin_file ]['version']    = esc_attr( $plugin_data['Version'] );
				}
			}

			return $active_plugins;
		}
	}
}
