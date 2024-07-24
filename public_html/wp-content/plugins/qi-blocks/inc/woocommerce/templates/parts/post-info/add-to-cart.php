<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

$button_params = qi_blocks_generate_add_to_cart_button_params( $params );

if ( function_exists( 'woocommerce_template_loop_add_to_cart' ) && ! empty( $button_params ) ) {
	// phpcs:ignore WordPress.NamingConventions.ValidVariableName.VariableNotSnakeCase
	qi_blocks_template_part( 'blocks/button', 'variations/' . $buttonType . '/templates/button', '', array_merge( $params, $button_params ) );
}
