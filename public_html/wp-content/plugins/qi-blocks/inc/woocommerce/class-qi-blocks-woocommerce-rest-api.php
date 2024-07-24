<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

class Qi_Blocks_Woocommerce_Rest_API {
	private static $instance;

	public function __construct() {

		// Extend main rest api routes with new case.
		add_filter( 'qi_blocks_filter_rest_api_routes', array( $this, 'add_rest_api_routes' ) );

		// Set page ID if WooCommerce page is.
		add_filter( 'qi_blocks_filter_page_inline_style_page_id', array( $this, 'set_page_inline_style_page_id' ) );

		// Add plugin's body classes.
		add_filter( 'body_class', array( $this, 'add_body_classes' ) );
	}

	/**
	 * Instance of module class
	 *
	 * @return Qi_Blocks_Woocommerce_Rest_API
	 */
	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function add_rest_api_routes( $routes ) {
		$routes['get-products-list'] = array(
			'route'               => 'get-products-list',
			'methods'             => WP_REST_Server::READABLE,
			'callback'            => array( $this, 'get_products_list_callback' ),
			'permission_callback' => function () {
				return current_user_can( 'edit_posts' );
			},
		);

		$routes['get-products-list-query'] = array(
			'route'               => 'get-products-list-query',
			'methods'             => WP_REST_Server::CREATABLE,
			'callback'            => array( $this, 'get_products_list_query_callback' ),
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

	public function get_products_list_callback() {

		if ( empty( $_GET ) ) {
			qi_blocks_get_ajax_status( 'error', esc_html__( 'Get method is invalid', 'qi-blocks' ), array() );
		} else {
			$results  = array();
			$products = new WP_Query(
				array(
					'post_status'    => 'publish',
					'post_type'      => 'product',
					'posts_per_page' => - 1,
					'fields'         => 'ids',
				)
			);

			if ( $products->have_posts() ) {
				foreach ( $products->posts as $product_id ) :
					$product = wc_get_product( $product_id );

					if ( ! empty( $product ) ) {
						$results[ $product_id ] = array(
							'title'         => $product->get_title(),
							'addToCartText' => $product->add_to_cart_text(),
						);
					}
				endforeach;
			}

			wp_reset_postdata();

			if ( ! empty( $results ) ) {
				qi_blocks_get_ajax_status( 'success', esc_html__( 'Products are successfully returned', 'qi-blocks' ), $results );
			} else {
				qi_blocks_get_ajax_status( 'error', esc_html__( 'No available products', 'qi-blocks' ), array() );
			}
		}
	}

	public function get_products_list_query_callback( $response ) {
		$results = array();

		if ( ! isset( $response ) || empty( $response->get_body() ) ) {
			qi_blocks_get_ajax_status( 'error', esc_html__( 'Rest is invalid', 'qi-blocks' ), array() );
		} else {
			$response_data = json_decode( $response->get_body() );

			if ( ! empty( $response_data ) ) {
				$atts                          = (array) $response_data->queryAttributes;
				$atts['post_type']             = 'product';
				$atts['additional_query_args'] = qi_blocks_get_additional_product_query_args( $atts );
				$query_result                  = new WP_Query( qi_blocks_get_query_params( $atts ) );
				$results['maxNumPages']        = $query_result->max_num_pages;
				$products                      = array();

				if ( $query_result->have_posts() ) {
					while ( $query_result->have_posts() ) :
						$query_result->the_post();
						$product_id           = get_the_ID();
						$product              = wc_get_product( $product_id );
						$product_item_classes = wc_get_product_class( '', $product_id );

						if ( ! empty( $product ) ) {
							// Setting product mark.
							$product_mark = array();
							if ( ! $product->is_in_stock() ) {
								$product_mark[] = 'out-of-stock';
							}

							if ( $product->is_on_sale() && $product->is_in_stock() ) {
								$product_mark[] = 'sale';
							}

							// Setting product image.
							$product_image = '';
							if ( has_post_thumbnail( $product_id ) ) {
								$product_image = qi_blocks_get_post_image( $product_id, $atts['imagesProportion'], intval( $atts['customImageWidth'] ), intval( $atts['customImageHeight'] ) );
							}

							// Setting product link.
							$product_link = get_the_permalink( $product_id );

							// Setting product price.
							$product_price_html = $product->get_price_html();

							// Setting product category.
							$product_category_html = wc_get_product_category_list( $product->get_id(), '<span class="qodef-category-separator"></span>' );

							// Setting product rating html.
							$product_rating_html = '';
							$product_rating      = $product->get_average_rating();
							if ( ! empty( $product_rating ) ) {
								$product_rating_html = qi_blocks_woo_product_get_rating_html( '', $product_rating );
							}

							// Setting add to cart button params.
							$add_to_cart_button_params = qi_blocks_generate_add_to_cart_button_params( $atts );

							$products[] = array(
								'title'                 => $product->get_title(),
								'productItemClasses'    => $product_item_classes,
								'mark'                  => $product_mark,
								'productImage'          => $product_image,
								'productLink'           => $product_link,
								'productPriceHTML'      => $product_price_html,
								'productCategoryHTML'   => $product_category_html,
								'productRatingHTML'     => $product_rating_html,
								'addToCartButtonParams' => $add_to_cart_button_params,
							);
						}

					endwhile;

					$results['queriedProductsData'] = $products;

					qi_blocks_get_ajax_status( 'success', esc_html__( 'Products are successfully returned', 'qi-blocks' ), $results );
				} else {
					qi_blocks_get_ajax_status( 'success', esc_html__( 'No products matching query!', 'qi-blocks' ), $results );
				}

				wp_reset_postdata();
			}
		}
	}

	public function set_page_inline_style_page_id( $page_id ) {

		if ( qi_blocks_is_woo_page( 'shop' ) ) {
			$page_id = qi_blocks_woo_get_main_shop_page_id( $page_id );
		}

		return $page_id;
	}

	public function add_body_classes( $classes ) {

		if ( qi_blocks_is_woo_page( 'shop' ) ) {
			$shop_id = qi_blocks_woo_get_main_shop_page_id();

			if ( ! empty( $shop_id ) ) {
				$classes[] = 'woocommerce-page-' . esc_attr( $shop_id );
			}
		}

		return $classes;
	}
}

Qi_Blocks_Woocommerce_Rest_API::get_instance();
