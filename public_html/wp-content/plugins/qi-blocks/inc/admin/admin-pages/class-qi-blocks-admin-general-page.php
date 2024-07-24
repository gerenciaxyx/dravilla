<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( ! class_exists( 'Qi_Blocks_Admin_General_Page' ) ) {
	class Qi_Blocks_Admin_General_Page {
		private static $instance;
		private $wizard_status;
		private $menu_slug;
		private $title;
		private $sub_pages;
		private $transient;

		public function __construct() {
			$this->set_wizard_status( get_option( 'qi_blocks_setup_wizard', 'init' ) );

			$main_page = 'completed' === $this->get_wizard_status() ? 'qi_blocks_welcome' : 'qi_blocks_setup_wizard';

			$this->set_menu_slug( $main_page );
			$this->set_title( esc_html__( 'Qi Blocks', 'qi-blocks' ) );
			$this->set_transient( 'qi_blocks_set_redirect' );

			add_filter( 'plugin_row_meta', array( $this, 'extend_plugin_info' ), 10, 2 );
			add_filter( 'plugin_action_links_' . QI_BLOCKS_PLUGIN_BASE_FILE, array( $this, 'plugin_action_links' ) );

			add_action( 'init', array( $this, 'register_sub_pages' ) );
			add_action( 'admin_menu', array( $this, 'dashboard_add_page' ) );

			add_action( 'admin_init', array( $this, 'redirect' ) );
			add_action( 'admin_init', array( $this, 'external_redirect' ) );

			add_filter( 'admin_footer_text', array( $this, 'admin_footer_text' ), 20 );

			add_filter( 'admin_body_class', array( $this, 'add_admin_body_classes' ) );
		}

		/**
		 * Module class instance
		 *
		 * @return Qi_Blocks_Admin_General_Page
		 */
		public static function get_instance() {

			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function get_wizard_status() {
			return $this->wizard_status;
		}

		public function set_wizard_status( $wizard_status ) {
			$this->wizard_status = $wizard_status;
		}

		public function get_menu_slug() {
			return $this->menu_slug;
		}

		public function set_menu_slug( $menu_slug ) {
			$this->menu_slug = $menu_slug;
		}

		public function get_title() {
			return $this->title;
		}

		public function set_title( $title ) {
			$this->title = $title;
		}

		public function set_sub_pages( Qi_Blocks_Admin_Sub_Pages $sub_page ) {
			$this->sub_pages[ $sub_page->get_position() ] = $sub_page;
		}

		public function get_sub_pages() {
			return $this->sub_pages;
		}

		public function get_transient() {
			return $this->transient;
		}

		public function set_transient( string $transient ) {
			$this->transient = $transient;
		}

		public function extend_plugin_info( $plugin_meta, $plugin_file ) {

			if ( QI_BLOCKS_PLUGIN_BASE_FILE === $plugin_file ) {
				$plugin_meta['qi-support']   = '<a href="https://helpcenter.qodeinteractive.com/" target="_blank">' . esc_html__( 'Help Center', 'qi-blocks' ) . '</a>';
				$plugin_meta['qi-video']     = '<a href="https://www.youtube.com/watch?v=m9beJAnVCnI&list=PLNypD600o6nIILMn287UeeRWsfc8lyiPa" target="_blank">' . esc_html__( 'Video Tutorials', 'qi-blocks' ) . '</a>';
				$plugin_meta['qi-templates'] = '<a href="https://qodeinteractive.com/qi-templates?utm_source=dash&utm_medium=qiblocks&utm_campaign=gopremium" target="_blank">' . esc_html__( 'Qi Templates', 'qi-blocks' ) . '</a>';
			}

			return $plugin_meta;
		}

		public function plugin_action_links( $links ) {
			$links['premium'] = sprintf( '<a href="%1$s" target="_blank" class="qi-blocks-premium-link" style="color:#ee2852;font-weight:700">%2$s</a>', 'https://qodeinteractive.com/pricing/?qi_product=blocks?utm_source=dash&utm_medium=qiblocks&utm_campaign=gopremium', esc_html__( 'Upgrade', 'qi-blocks' ) );

			return $links;
		}

		public function dashboard_add_page() {
			$page = add_menu_page(
				$this->get_title(),
				$this->get_title(),
				'edit_theme_options',
				$this->get_menu_slug(),
				null,
				QI_BLOCKS_ADMIN_URL_PATH . '/admin-pages/assets/img/logo-qi.png',
				998
			);

			add_action( 'load-' . $page, array( $this, 'load_admin_css' ) );

			$subpages_array = $this->get_sub_pages();

			ksort( $subpages_array );

			foreach ( $subpages_array as $key => $sub_page ) {
				$sub_page_instance = add_submenu_page(
					$this->get_menu_slug(),
					$sub_page->get_title(),
					$sub_page->get_title(),
					'edit_theme_options',
					$sub_page->get_menu_slug(),
					array( $sub_page, 'render' ),
					$sub_page->get_position()
				);

				add_action( 'load-' . $sub_page_instance, array( $this, 'load_admin_css' ) );
			}

			if ( ! empty( $subpages_array ) && count( $subpages_array ) > 1 ) {
				add_submenu_page(
					$this->get_menu_slug(),
					'',
					esc_html__( 'Qi Blocks Premium', 'qi-blocks' ),
					'edit_theme_options',
					'qi_blocks_pro',
					array( $this, 'external_redirect' )
				);

				add_submenu_page(
					$this->get_menu_slug(),
					'',
					esc_html__( 'Qi Templates', 'qi-blocks' ),
					'edit_theme_options',
					'qi_templates',
					array( $this, 'external_redirect' )
				);
			}
		}

		public function get_header( $object = null ) {
			$object = ! empty( $object ) ? $object : $this;

			$args = array(
				'menu_slug'  => $object->get_menu_slug(),
				'menu_title' => $object->get_title(),
				'menu_url'   => admin_url( 'admin.php?page=' . $this->get_menu_slug() ),
			);

			qi_blocks_template_part( 'admin/admin-pages', 'templates/header', '', $args );
		}

		public function get_footer() {
			qi_blocks_template_part( 'admin/admin-pages', 'templates/footer' );
		}

		public function get_sidebar() {
			qi_blocks_template_part( 'admin/admin-pages', 'templates/sidebar' );
		}

		public function get_content() {
			qi_blocks_template_part( 'admin/admin-pages', 'templates/general' );
		}

		public function render_holder() {
			$args = array(
				'this_object' => $this,
			);

			qi_blocks_template_part( 'admin/admin-pages', 'templates/holder', '', $args );
		}

		public function register_sub_pages() {
			$sub_pages = apply_filters( 'qi_blocks_filter_add_sub_page', array() );

			if ( ! empty( $sub_pages ) ) {
				foreach ( $sub_pages as $sub_page ) {

					if ( class_exists( $sub_page ) ) {
						$add_flag = false;

						if ( 'completed' === $this->get_wizard_status() && strpos( $sub_page, 'Setup_Wizard' ) === false ) {
							$add_flag = true;
						} elseif ( 'completed' !== $this->get_wizard_status() && strpos( $sub_page, 'Setup_Wizard' ) !== false ) {
							$add_flag = true;
						}

						if ( $add_flag ) {
							$sub_object = new $sub_page();
							$this->set_sub_pages( $sub_object );
						}
					}
				}
			}
		}

		public function load_admin_css() {
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_styles' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		}

		public function enqueue_styles() {
			wp_enqueue_style( 'qi-blocks-dashboard-style', QI_BLOCKS_ASSETS_URL_PATH . '/dist/dashboard.css' );
		}

		public function enqueue_scripts() {
			wp_enqueue_script( 'qi-blocks-framework-script', QI_BLOCKS_ASSETS_URL_PATH . '/dist/dashboard.js', array( 'jquery' ), false, true );

			do_action( 'qi_blocks_action_additional_scripts' );
		}

		public function add_admin_body_classes( $classes ) {
			$pages = $this->get_all_dashboard_slugs();

			if ( isset( $_GET['page'] ) && in_array( $_GET['page'], $pages, true ) ) {
				$classes = $classes . ' qi-blocks-dashboard';
			}

			return $classes;
		}

		public function admin_footer_text( $text ) {
			$pages = $this->get_all_dashboard_slugs();

			if ( isset( $_GET['page'] ) && in_array( $_GET['page'], $pages, true ) ) {
				return qi_blocks_get_template_part( 'admin/admin-pages', 'templates/parts/footer-text' );
			}

			return $text;
		}

		public function get_all_dashboard_slugs() {
			$pages = array(
				$this->get_menu_slug(),
			);

			$sub_pages = $this->get_sub_pages();

			if ( ! empty( $sub_pages ) ) {
				foreach ( $sub_pages as $sub_page ) {
					$pages[] = $sub_page->get_menu_slug();
				}
			}

			return $pages;
		}

		public function redirect() {

			if ( wp_doing_ajax() ) {
				return;
			}

			if ( is_network_admin() || isset( $_GET['activate-multi'] ) ) {
				return;
			}

			if ( ! empty( get_transient( QI_BLOCKS_ACTIVATED_TRANSIENT ) ) && empty( get_transient( $this->get_transient() ) ) ) {
				set_transient( $this->get_transient(), 1 );

				$redirect_page = 'completed' === $this->get_wizard_status() ? $this->get_menu_slug() : 'qi_blocks_setup_wizard';

				wp_safe_redirect(
					esc_url( admin_url( 'admin.php?page=' . esc_attr( $redirect_page ) ) )
				);

				exit;
			}
		}

		public function external_redirect() {

			if ( empty( $_GET['page'] ) ) {
				return;
			}

			if ( 'qi_blocks_pro' === $_GET['page'] ) {
				wp_redirect( 'https://qodeinteractive.com/pricing/?qi_product=blocks?utm_source=dash&utm_medium=qiblocks&utm_campaign=gopremium' );
				die;
			}

			if ( 'qi_templates' === $_GET['page'] ) {
				wp_redirect( 'https://qodeinteractive.com/qi-templates?utm_source=dash&utm_medium=qiblocks&utm_campaign=gopremium' );
				die;
			}
		}
	}

	Qi_Blocks_Admin_General_Page::get_instance();
}
