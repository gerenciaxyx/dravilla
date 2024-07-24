<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

class Qi_Blocks_Blog_Rest_API {
	private static $instance;

	public function __construct() {

		// Extend main rest api routes with new case.
		add_filter( 'qi_blocks_filter_rest_api_routes', array( $this, 'add_rest_api_routes' ) );
	}

	/**
	 * Instance of module class
	 *
	 * @return Qi_Blocks_Blog_Rest_API
	 */
	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function add_rest_api_routes( $routes ) {

		$routes['get-blog-posts'] = array(
			'route'               => 'get-blog-posts',
			'methods'             => WP_REST_Server::CREATABLE,
			'callback'            => array( $this, 'get_blog_posts_callback' ),
			'permission_callback' => function () {
				return current_user_can( 'edit_posts' );
			},
			'args'                => array(
				'queryAttributes' => array(
					'required'          => true,
					'validate_callback' => function ( $param ) {
						return intval( $param );
					},
				),
			),
		);

		return $routes;
	}

	public function get_blog_posts_callback( $response ) {
		$results = array();

		if ( ! isset( $response ) || empty( $response->get_body() ) ) {
			qi_blocks_get_ajax_status( 'error', esc_html__( 'Rest is invalid', 'qi-blocks' ), array() );
		} else {
			$response_data = json_decode( $response->get_body() );

			if ( ! empty( $response_data ) ) {
				$atts                 = (array) $response_data->queryAttributes;
				$inherit_global_query = isset( $atts['inheritGlobalQuery'] ) && ! empty( $atts['inheritGlobalQuery'] );

				if ( $inherit_global_query ) {
					$query_result = new WP_Query( array( 'post_type' => 'post' ) );
				} else {
					$atts['additional_query_args'] = qi_blocks_get_additional_query_args( $atts );

					$query_result = new WP_Query( qi_blocks_get_query_params( $atts ) );
				}

				$results['maxNumPages'] = $query_result->max_num_pages;
				$posts                  = array();

				if ( $query_result->have_posts() ) {
					while ( $query_result->have_posts() ) :
						$query_result->the_post();
						$post_id      = get_the_ID();
						$post_classes = get_post_class( 'qodef-blog-item' );
						$date_link    = empty( get_the_title() ) && ! is_single() ? get_the_permalink() : get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) );

						$featured_image = '';
						if ( has_post_thumbnail( $post_id ) ) {
							$featured_image = qi_blocks_get_post_image( $post_id, $atts['imagesProportion'], intval( $atts['customImageWidth'] ), intval( $atts['customImageHeight'] ) );
						}

						$date_classes = 'qodef-e-info-item qodef-e-info-date entry-date';
						if ( is_single() || is_page() || is_archive() ) {
							$date_classes .= ' published updated';
						}

						$excerpt        = get_the_excerpt();
						$excerpt_length = 180;
						$new_excerpt    = '';

						if ( isset( $atts['excerptLength'] ) && '' !== $atts['excerptLength'] ) {
							$excerpt_length = $atts['excerptLength'];
						}

						if ( ! empty( $excerpt ) ) {
							$new_excerpt = ( intval( $excerpt_length ) > 0 ) ? substr( $excerpt, 0, intval( $excerpt_length ) ) : $excerpt;
						}

						$posts[] = array(
							'postID'             => $post_id,
							'blogItemClasses'    => $post_classes,
							'isPasswordRequired' => post_password_required(),
							'authorAvatar'       => get_avatar( get_the_author_meta( 'ID' ), '48' ),
							'authorName'         => get_the_author_meta( 'display_name' ),
							'authorURL'          => esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
							'postCategories'     => get_the_category_list( '<span class="qodef-category-separator"></span>' ),
							'featuredImage'      => $featured_image,
							'dateLink'           => $date_link,
							'dateBoxed'          => esc_html( get_the_time( 'j' ) . ' ' . get_the_time( 'M' ) ),
							'date'               => esc_html( get_the_time( get_option( 'date_format' ) ) ),
							'dateClasses'        => $date_classes,
							'passwordForm'       => get_the_password_form(),
							'excerpt'            => esc_html( wp_strip_all_tags( strip_shortcodes( $new_excerpt ) ) ),
							'title'              => get_the_title(),
							'permalink'          => get_the_permalink(),
						);

					endwhile;

					$results['queriedPostsData'] = $posts;

					qi_blocks_get_ajax_status( 'success', esc_html__( 'Posts are successfully returned', 'qi-blocks' ), $results );
				} else {
					qi_blocks_get_ajax_status( 'success', esc_html__( 'No posts matching query!', 'qi-blocks' ), $results );
				}

				wp_reset_postdata();
			}
		}
	}
}

Qi_Blocks_Blog_Rest_API::get_instance();
