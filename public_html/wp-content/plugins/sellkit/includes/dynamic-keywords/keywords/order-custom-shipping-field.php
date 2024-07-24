<?php

class Order_Custom_Shipping_Field extends Tag_Base {
	/**
	 * Get class id.
	 *
	 * @return string
	 * @since 1.8.9
	 */
	public function get_id() {
		return '_order_custom_shipping_field';
	}

	/**
	 * Get class title.
	 *
	 * @return string
	 * @since 1.8.9
	 */
	public function get_title() {
		return esc_html__( 'Custom Shipping Field', 'sellkit' );
	}

	/**
	 * Render true content.
	 *
	 * @param array $atts Shortcode attributes.
	 * @return string
	 * @since 1.8.9
	 */
	public function render_content( $atts ) {
		$this->get_data();

		if ( empty( self::$order ) ) {
			return $this->shortcode_content( $atts );
		}

		$attributes = shortcode_atts( [
			'field' => '',
		], $atts );

		if ( empty( $attributes['field'] ) ) {
			return $this->shortcode_content( $atts );
		}

		$meta_key = 'shipping_' . $attributes['field'];

		return get_post_meta( self::$order->get_id(), $meta_key, true );
	}
}
