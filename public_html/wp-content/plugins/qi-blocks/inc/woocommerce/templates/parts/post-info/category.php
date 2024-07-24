<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

$categories = qi_blocks_woo_get_product_categories();

// phpcs:ignore WordPress.NamingConventions.ValidVariableName.VariableNotSnakeCase
if ( ! empty( $categories ) && 'no' !== $showCategory ) {
	?>
	<div class="qodef-e-product-categories"><?php echo wp_kses_post( $categories ); ?></div>
<?php } ?>
