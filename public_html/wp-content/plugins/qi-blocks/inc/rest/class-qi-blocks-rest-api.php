<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( ! class_exists( 'Qi_Blocks_Rest_API' ) ) {
	/**
	 * Rest API class with configuration
	 */
	class Qi_Blocks_Rest_API {
		private static $instance;
		private $namespace;

		public function __construct() {
			// Init variables.
			$this->set_namespace( 'qi-blocks/v1' );

			// Localize main editor js script with additional variables.
			add_filter( 'qi_blocks_filter_localize_main_editor_js', array( $this, 'localize_script' ) );

			// Function that register Rest API routes.
			add_action( 'rest_api_init', array( $this, 'register_rest_api_route' ) );
		}

		/**
		 * Module class instance
		 *
		 * @return Qi_Blocks_Rest_API
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function get_namespace() {
			return $this->namespace;
		}

		public function set_namespace( $namespace ) {
			$this->namespace = $namespace;
		}

		public function localize_script( $global ) {
			$global['restUrl']   = esc_url_raw( rest_url() );
			$global['restNonce'] = wp_create_nonce( 'wp_rest' );

			return apply_filters( 'qi_blocks_filter_localize_main_editor_js_rest_api', $global, $this->get_namespace() );
		}

		public function register_rest_api_route() {
			$routes = apply_filters( 'qi_blocks_filter_rest_api_routes', array() );

			if ( ! empty( $routes ) ) {
				foreach ( $routes as $route ) {
					$permission_callback = isset( $route['permission_callback'] ) && ! empty( $route['permission_callback'] ) ? $route['permission_callback'] : '__return_true';

					register_rest_route(
						$this->get_namespace(),
						esc_attr( $route['route'] ),
						array(
							'methods'             => $route['methods'],
							'callback'            => $route['callback'],
							'permission_callback' => $permission_callback,
							'args'                => $route['args'] ?? array(),
						)
					);
				}
			}
		}
	}

	Qi_Blocks_Rest_API::get_instance();
}
