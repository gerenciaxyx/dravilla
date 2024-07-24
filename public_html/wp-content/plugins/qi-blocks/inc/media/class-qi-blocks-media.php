<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( ! class_exists( 'Qi_Blocks_Media' ) ) {
	class Qi_Blocks_Media {
		private static $instance;

		public function __construct() {
			// Create global options.
			add_action( 'init', array( $this, 'add_option' ) );

			// Add new media sizes.
			add_action( 'init', array( $this, 'set_image_support' ) );

			// Extend main rest api routes with new case.
			add_filter( 'qi_blocks_filter_rest_api_routes', array( $this, 'add_rest_api_routes' ) );
		}

		/**
		 * Module class instance
		 *
		 * @return Qi_Blocks_Media
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function add_option() {
			if ( ! get_option( 'qi_blocks_cropped_images' ) ) {
				add_option(
					'qi_blocks_cropped_images',
					array()
				);
			}
		}

		public function get_image_sizes() {
			$image_sizes = array();

			$image_sizes[] = array(
				'slug'           => 'qi_blocks_image_size_square',
				'label'          => esc_html__( 'Qi Square Size', 'qi-blocks' ),
				'label_simple'   => esc_html__( 'Square', 'qi-blocks' ),
				'default_crop'   => true,
				'default_width'  => 650,
				'default_height' => 650,
			);

			$image_sizes[] = array(
				'slug'           => 'qi_blocks_image_size_landscape',
				'label'          => esc_html__( 'Qi Landscape Size', 'qi-blocks' ),
				'label_simple'   => esc_html__( 'Landscape', 'qi-blocks' ),
				'default_crop'   => true,
				'default_width'  => 1300,
				'default_height' => 650,
			);

			$image_sizes[] = array(
				'slug'           => 'qi_blocks_image_size_portrait',
				'label'          => esc_html__( 'Qi Portrait Size', 'qi-blocks' ),
				'label_simple'   => esc_html__( 'Portrait', 'qi-blocks' ),
				'default_crop'   => true,
				'default_width'  => 650,
				'default_height' => 1300,
			);

			$image_sizes[] = array(
				'slug'           => 'qi_blocks_image_size_huge_square',
				'label'          => esc_html__( 'Qi Huge Square Size', 'qi-blocks' ),
				'label_simple'   => esc_html__( 'Huge Square', 'qi-blocks' ),
				'default_crop'   => true,
				'default_width'  => 1300,
				'default_height' => 1300,
			);

			return apply_filters( 'qi_blocks_filter_set_image_sizes', $image_sizes );
		}

		public function set_image_support() {
			$image_sizes = $this->get_image_sizes();

			if ( ! empty( $image_sizes ) ) {
				foreach ( $image_sizes as $size ) {
					$image_size_name   = $size['slug'];
					$width_field_name  = $image_size_name . '_w';
					$height_field_name = $image_size_name . '_h';
					$crop_field_name   = $image_size_name . '_crop';
					$width_value       = is_string( get_option( $width_field_name ) ) ? get_option( $width_field_name ) : $size['default_width'];
					$height_value      = is_string( get_option( $height_field_name ) ) ? get_option( $height_field_name ) : $size['default_height'];
					$crop_value        = get_option( $crop_field_name ) !== false ? get_option( $crop_field_name ) : $size['default_crop'];

					add_image_size( $image_size_name, $width_value, $height_value, $crop_value );
				}
			}
		}

		public function add_rest_api_routes( $routes ) {
			$routes['resize-image'] = array(
				'route'               => 'resize-image',
				'methods'             => WP_REST_Server::CREATABLE,
				'callback'            => array( $this, 'resize_image_callback' ),
				'permission_callback' => function () {
					return current_user_can( 'edit_posts' );
				},
				'args'                => array(
					'image_id'    => array(
						'required'          => true,
						'validate_callback' => function ( $param ) {
							return intval( $param );
						},
					),
					'custom_size' => array(
						'required'          => true,
						'validate_callback' => function ( $param ) {
							return is_array( $param ) ? $param : (array) $param;
						},
					),
				),
			);

			return $routes;
		}

		public function resize_image_callback( $response ) {

			if ( ! isset( $response ) || empty( $response->get_body() ) ) {
				qi_blocks_get_ajax_status( 'error', esc_html__( 'Rest is invalid', 'qi-blocks' ), array() );
			} else {
				$response_data     = json_decode( $response->get_body() );
				$image_id          = isset( $response_data->image_id ) && ! empty( $response_data->image_id ) ? intval( $response_data->image_id ) : 0;
				$image_custom_size = isset( $response_data->custom_size ) && is_object( $response_data->custom_size ) ? (array) $response_data->custom_size : array();

				if ( ! empty( $image_id ) && ! empty( $image_custom_size ) ) {
					$editor_supports = array(
						'mime_type' => get_post_mime_type( $image_id ),
						'methods'   => array( 'rotate' ),
					);

					if ( ! wp_image_editor_supports( $editor_supports ) ) {
						qi_blocks_get_ajax_status( 'error', esc_html__( 'Image rotation is not supported by your web host.', 'qi-blocks' ), array() );
					}

					$resize_image = qi_blocks_resize_image( $image_id, $image_custom_size );

					if ( ! empty( $resize_image ) ) {
						qi_blocks_get_ajax_status( 'success', esc_html__( 'Image is resized', 'qi-blocks' ), $resize_image );
					} else {
						qi_blocks_get_ajax_status( 'error', esc_html__( 'Image can not be resized', 'qi-blocks' ), array() );
					}
				} else {
					qi_blocks_get_ajax_status( 'error', esc_html__( 'Parameters are invalid', 'qi-blocks' ), array() );
				}
			}
		}
	}

	Qi_Blocks_Media::get_instance();
}
