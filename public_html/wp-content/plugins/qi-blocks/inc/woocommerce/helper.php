<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( ! function_exists( 'qi_blocks_is_woo_page' ) ) {
	/**
	 * Function that check WooCommerce pages
	 *
	 * @param string $page
	 *
	 * @return bool
	 */
	function qi_blocks_is_woo_page( $page ) {
		switch ( $page ) {
			case 'shop':
				return function_exists( 'is_shop' ) && is_shop();
			case 'single':
				return is_singular( 'product' );
			case 'cart':
				return function_exists( 'is_cart' ) && is_cart();
			case 'checkout':
				return function_exists( 'is_checkout' ) && is_checkout();
			case 'account':
				return function_exists( 'is_account_page' ) && is_account_page();
			case 'category':
				return function_exists( 'is_product_category' ) && is_product_category();
			case 'tag':
				return function_exists( 'is_product_tag' ) && is_product_tag();
			case 'any':
				return (
					function_exists( 'is_shop' ) && is_shop() ||
					is_singular( 'product' ) ||
					function_exists( 'is_cart' ) && is_cart() ||
					function_exists( 'is_checkout' ) && is_checkout() ||
					function_exists( 'is_account_page' ) && is_account_page() ||
					function_exists( 'is_product_category' ) && is_product_category() ||
					function_exists( 'is_product_tag' ) && is_product_tag() ||
					function_exists( 'is_product_taxonomy' ) && is_product_taxonomy()
				);
			case 'archive':
				return ( function_exists( 'is_shop' ) && is_shop() ) || ( function_exists( 'is_product_category' ) && is_product_category() ) || ( function_exists( 'is_product_tag' ) && is_product_tag() ) || ( function_exists( 'is_product_taxonomy' ) && is_product_taxonomy() );
			default:
				return false;
		}
	}
}

if ( ! function_exists( 'qi_blocks_woo_get_global_product' ) ) {
	/**
	 * Function that return global WooCommerce object
	 *
	 * @return object
	 */
	function qi_blocks_woo_get_global_product() {
		global $product;

		return $product;
	}
}

if ( ! function_exists( 'qi_blocks_woo_get_main_shop_page_id' ) ) {
	/**
	 * Function that return main shop page ID
	 *
	 * @param int $page_id
	 *
	 * @return int
	 */
	function qi_blocks_woo_get_main_shop_page_id( $page_id = 0 ) {
		// Get page id from options table.
		$shop_id = get_option( 'woocommerce_shop_page_id' );

		if ( ! empty( $shop_id ) ) {
			$page_id = $shop_id;
		}

		return $page_id;
	}
}

if ( ! function_exists( 'qi_blocks_get_additional_product_query_args' ) ) {
	/**
	 * Function that return additional query arguments
	 *
	 * @param array $atts - options value
	 *
	 * @return array
	 */
	function qi_blocks_get_additional_product_query_args( $atts ) {
		$args = qi_blocks_get_additional_query_args( $atts );

		if ( ! empty( $atts['filterBy'] ) ) {
			switch ( $atts['filterBy'] ) {
				case 'on_sale':
					$args['no_found_rows'] = 1;
					$args['post__in']      = array_merge( array( 0 ), wc_get_product_ids_on_sale() );
					break;
				case 'featured':
					$args['tax_query'] = WC()->query->get_tax_query();

					$args['tax_query'][] = array(
						'taxonomy'         => 'product_visibility',
						'terms'            => 'featured',
						'field'            => 'name',
						'operator'         => 'IN',
						'include_children' => false,
					);
					break;
				case 'top_rated':
					$args['meta_key'] = '_wc_average_rating';
					$args['order']    = 'DESC';
					$args['orderby']  = 'meta_value_num';
					break;
				case 'best_selling':
					$args['meta_key'] = 'total_sales';
					$args['order']    = 'DESC';
					$args['orderby']  = 'meta_value_num';
					break;
			}
		}

		return $args;
	}
}

if ( ! function_exists( 'qi_blocks_get_product_list_holder_classes' ) ) {
	/**
	 * Function that return element holder classes
	 *
	 * @param array $atts - options value
	 *
	 * @return string
	 */
	function qi_blocks_get_product_list_holder_classes( $atts ) {
		$classes = qi_blocks_get_block_holder_classes( 'product-list', $atts, 'qi-blocks-woo-block' );

		$classes[] = ! empty( $atts['columnClasses'] ) ? $atts['columnClasses'] : '';
		$classes[] = ! empty( $atts['itemLayout'] ) ? 'qodef-item-layout--' . $atts['itemLayout'] : '';
		$classes[] = ! empty( $atts['imageHover'] ) ? 'qodef-image--hover-' . $atts['imageHover'] : '';
		$classes[] = ! empty( $atts['imageZoomOrigin'] ) ? 'qodef-image--hover-from-' . $atts['imageZoomOrigin'] : '';

		return implode( ' ', $classes );
	}
}

if ( ! function_exists( 'qi_blocks_woo_get_product_categories' ) ) {
	/**
	 * Function that render product categories
	 *
	 * @param string $before
	 * @param string $after
	 *
	 * @return string
	 */
	function qi_blocks_woo_get_product_categories( $before = '', $after = '' ) {
		$product = qi_blocks_woo_get_global_product();

		return ! empty( $product ) ? wc_get_product_category_list( $product->get_id(), '<span class="qodef-category-separator"></span>', $before, $after ) : '';
	}
}

if ( ! function_exists( 'qi_blocks_get_out_of_stock_mark' ) ) {
	/**
	 * Function for adding out of stock template for product
	 *
	 * @return string which contains html content
	 */
	function qi_blocks_get_out_of_stock_mark() {
		return '<span class="qodef-block-woo-product-mark qodef-out-of-stock">' . esc_html__( 'Sold', 'qi-blocks' ) . '</span>';
	}
}

if ( ! function_exists( 'qi_blocks_woo_set_sale_flash' ) ) {
	/**
	 * Function that override on sale template for product
	 *
	 * @return string which contains html content
	 */
	function qi_blocks_woo_set_sale_flash() {
		$product = qi_blocks_woo_get_global_product();

		if ( ! empty( $product ) && $product->is_on_sale() && $product->is_in_stock() ) {
			$sale_label = esc_html__( 'Sale', 'qi-blocks' );

			return '<span class="qodef-block-woo-product-mark qodef-woo-onsale">' . $sale_label . '</span>';
		}

		return '';
	}
}

if ( ! function_exists( 'qi_blocks_generate_add_to_cart_button_params' ) ) {
	/**
	 * Function for generating add to cart button params
	 *
	 * @param array $atts - options value
	 *
	 * @return array
	 */
	function qi_blocks_generate_add_to_cart_button_params( $atts ) {
		$product = qi_blocks_woo_get_global_product();
		$params  = array();

		if ( $product ) {
			$args = array(
				'quantity'   => 1,
				'class'      => implode(
					' ',
					array_filter(
						array(
							'button',
							'product_type_' . $product->get_type(),
							$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
							$product->supports( 'ajax_add_to_cart' ) && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
						)
					)
				),
				'attributes' => array(
					'data-product_id'  => $product->get_id(),
					'data-product_sku' => $product->get_sku(),
					'aria-label'       => $product->add_to_cart_description(),
					'rel'              => 'nofollow',
				),
			);

			if ( isset( $args['attributes']['aria-label'] ) ) {
				$args['attributes']['aria-label'] = wp_strip_all_tags( $args['attributes']['aria-label'] );
			}

			if ( ! empty( $args['class'] ) ) {
				$atts['custom_class'] = $args['class'];
			}

			if ( count( $args['attributes'] ) ) {
				$params['custom_attrs']                  = $args['attributes'];
				$params['custom_attrs']['data-quantity'] = $args['quantity'];
			}

			$params['button_link'] = array(
				'url' => $product->add_to_cart_url(),
			);

			$params['buttonText'] = $product->add_to_cart_text();

			$params['button_classes'] = qi_blocks_button_get_holder_classes( $atts );
			$params['icon_classes']   = qi_blocks_button_get_icon_classes( $atts );
			$params['data_attrs']     = array_merge( array( 'target' => '_self' ), $params['custom_attrs'] );
		}

		return $params;
	}
}

if ( ! function_exists( 'qi_blocks_woo_product_get_rating_html' ) ) {
	/**
	 * Function that return ratings templates
	 *
	 * @param string $html - contains html content
	 * @param float  $rating
	 *
	 * @return string
	 */
	function qi_blocks_woo_product_get_rating_html( $html, $rating ) {

		if ( ! empty( $rating ) ) {
			$product_rating = apply_filters(
				'qi_blocks_filter_woocommerce_product_rating',
				'<svg class="qodef-m-star-item" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="15" x="0px" y="0px" viewBox="0 0 16.2 15.2" xml:space="preserve"><g><g><path d="M16.1,5.8l-5,3.5l1.9,5.7l-4.9-3.6l-4.9,3.6l1.9-5.7l-5-3.5h6.1l1.9-5.7L10,5.8H16.1z"/></g></g></svg>'
			);

			$html  = '<div class="qodef-m-inner">';
			$html .= '<div class="qodef-m-star qodef--initial">' . str_repeat( $product_rating, 5 ) . '</div>';
			$html .= '<div class="qodef-m-star qodef--active" style="width:' . ( ( $rating / 5 ) * 100 ) . '%">';
			$html .= str_repeat( $product_rating, 5 );
			$html .= '</div>';
			$html .= '</div>';
		}

		return $html;
	}
}
