<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( 'yes' === $showMark ) {
	$product = qi_blocks_woo_get_global_product();

	if ( ! empty( $product ) && ! $product->is_in_stock() ) {
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo qi_blocks_get_out_of_stock_mark();
	} else {
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo qi_blocks_woo_set_sale_flash();
	}
}
