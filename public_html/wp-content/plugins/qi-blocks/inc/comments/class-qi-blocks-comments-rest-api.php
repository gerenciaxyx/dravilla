<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

class Qi_Blocks_Comments_Rest_API {
	private static $instance;

	public function __construct() {
		// Extend main rest api routes with new case.
		add_filter( 'qi_blocks_filter_rest_api_routes', array( $this, 'add_rest_api_routes' ) );
	}

	/**
	 * Instance of module class
	 *
	 * @return Qi_Blocks_Comments_Rest_API
	 */
	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function add_rest_api_routes( $routes ) {
		$routes['render-comments'] = array(
			'route'               => 'render-comments',
			'methods'             => WP_REST_Server::CREATABLE,
			'callback'            => array( $this, 'render_comments_callback' ),
			'permission_callback' => function () {
				return current_user_can( 'edit_posts' );
			},
			'args'                => array(
				'postID' => array(
					'required'          => true,
					'validate_callback' => function ( $param ) {
						return intval( $param );
					},
				),
				'attributes' => array(
					'required'          => true,
					'validate_callback' => function ( $param ) {
						return (array) $param;
					},
				),
			),
		);

		return $routes;
	}

	public function render_comments_callback( $response ) {

		if ( ! isset( $response ) || empty( $response->get_body() ) ) {
			qi_blocks_get_ajax_status( 'error', esc_html__( 'Rest is invalid', 'qi-blocks' ), array() );
		} else {
			$response_data = json_decode( $response->get_body() );
			$post_ID       = isset( $response_data->postID ) && ! empty( $response_data->postID ) ? intval( $response_data->postID ) : 0;
			$attributes    = isset( $response_data->attributes ) && ! empty( $response_data->attributes ) ? (array) $response_data->attributes : array();

			if ( ! empty( $post_ID ) ) {
				ob_start();

				qi_blocks_template_part( 'comments', 'templates/comments-template', '', array( 'post_ID' => $post_ID, 'attributes' => $attributes, 'ajax' => true ) );

				$html = ob_get_clean();

				qi_blocks_get_ajax_status( 'success', esc_html__( 'Returned comments HTML content', 'qi-blocks' ), $html );
			} else {
				qi_blocks_get_ajax_status( 'error', esc_html__( 'Parameters are invalid', 'qi-blocks' ), array() );
			}
		}
	}
}

Qi_Blocks_Comments_Rest_API::get_instance();
