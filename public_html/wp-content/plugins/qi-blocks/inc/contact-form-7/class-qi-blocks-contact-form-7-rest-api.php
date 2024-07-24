<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

class Qi_Blocks_Contact_Form_7_Rest_API {
	private static $instance;

	public function __construct() {
		// Extend main rest api routes with new case.
		add_filter( 'qi_blocks_filter_rest_api_routes', array( $this, 'add_rest_api_routes' ) );
	}

	/**
	 * Instance of module class
	 *
	 * @return Qi_Blocks_Contact_Form_7_Rest_API
	 */
	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function add_rest_api_routes( $routes ) {
		$routes['get-contact-form-7'] = array(
			'route'               => 'get-contact-form-7',
			'methods'             => WP_REST_Server::READABLE,
			'callback'            => array( $this, 'get_contact_form_7_callback' ),
			'permission_callback' => function () {
				return current_user_can( 'edit_posts' );
			},
		);

		$routes['render-contact-form-7'] = array(
			'route'               => 'render-contact-form-7',
			'methods'             => WP_REST_Server::CREATABLE,
			'callback'            => array( $this, 'render_contact_form_7_callback' ),
			'permission_callback' => function () {
				return current_user_can( 'edit_posts' );
			},
			'args'                => array(
				'formID' => array(
					'required'          => true,
					'validate_callback' => function ( $param ) {
						return intval( $param );
					},
				),
			),
		);

		return $routes;
	}

	public function get_contact_form_7_callback() {

		if ( empty( $_GET ) ) {
			qi_blocks_get_ajax_status( 'error', esc_html__( 'Get method is invalid', 'qi-blocks' ), array() );
		} else {
			$results = array();
			$items   = new WP_Query(
				array(
					'post_status'    => 'publish',
					'post_type'      => 'wpcf7_contact_form',
					'posts_per_page' => - 1,
					'fields'         => 'ids',
				)
			);

			if ( $items->have_posts() ) {
				foreach ( $items->posts as $form_id ) :
					$results[ $form_id ] = esc_html( get_the_title( $form_id ) );
				endforeach;
			}

			wp_reset_postdata();

			if ( ! empty( $results ) ) {
				qi_blocks_get_ajax_status( 'success', esc_html__( 'Contact forms are successfully returned', 'qi-blocks' ), $results );
			} else {
				qi_blocks_get_ajax_status( 'error', esc_html__( 'No available contact forms', 'qi-blocks' ), array() );
			}
		}
	}

	public function render_contact_form_7_callback( $response ) {

		if ( ! isset( $response ) || empty( $response->get_body() ) ) {
			qi_blocks_get_ajax_status( 'error', esc_html__( 'Rest is invalid', 'qi-blocks' ), array() );
		} else {
			$response_data = json_decode( $response->get_body() );
			$form_id       = isset( $response_data->formID ) && ! empty( $response_data->formID ) ? intval( $response_data->formID ) : 0;

			if ( ! empty( $form_id ) ) {
				$html = do_shortcode( '[contact-form-7 id="' . esc_attr( $form_id ) . '"]' );

				qi_blocks_get_ajax_status( 'success', esc_html__( 'Returned contact form HTML content', 'qi-blocks' ), $html );
			} else {
				qi_blocks_get_ajax_status( 'error', esc_html__( 'Parameters are invalid', 'qi-blocks' ), array() );
			}
		}
	}
}

Qi_Blocks_Contact_Form_7_Rest_API::get_instance();
