<?php
/**
 * Gets all tags.
 *
 * @since 1.1.0
 */
function get_tags_title() {
	$dynamic_tags = new Sellkit_Dynamic_Keywords();

	$dynamic_tags_item = '';

	foreach ( $dynamic_tags::$keywords['order_keyword'] as $key => $title ) {
		if ( 'sellkit-order-custom-shipping-field' === $key || 'sellkit-order-custom-billing-field' === $key ) {
			$key .= ' field="id-of-field"';
		}

		$dynamic_tags_item .= '<li>';
		$dynamic_tags_item .= '<h5>' . esc_attr( $title ) . '</h5>';
		$dynamic_tags_item .= '<input id = "' . esc_attr( $key ) . '" type = "text"  value = "[' . esc_attr( $key ) . ']" readonly>';
		$dynamic_tags_item .= '<button value = "' . esc_attr( $key ) . '" >Copy</button>';
		$dynamic_tags_item .= '</li>';
	}

	$allowed_html = [
		'li' => [],
		'h5' => [],
		'input' => [
			'id' => true,
			'type' => true,
			'value' => true,
			'readonly' => true,
		],
		'button' => [
			'value' => true,
		],
	];

	echo wp_kses( $dynamic_tags_item, $allowed_html );
}
