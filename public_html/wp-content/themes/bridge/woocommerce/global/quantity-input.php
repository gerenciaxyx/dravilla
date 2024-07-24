<?php
/**
 * Product quantity inputs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/quantity-input.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 7.4.0
 */

defined( 'ABSPATH' ) || exit;

/* translators: %s: Quantity. */
$label = ! empty( $args['product_name'] ) ? sprintf( esc_html__( '%s quantity', 'bridge' ), wp_strip_all_tags( $args['product_name'] ) ) : esc_html__( 'Quantity', 'bridge' );

$holder_classes[] = 'quantity';

if ( $max_value && $min_value === $max_value ) {
	$hidden = true;
	$holder_classes[] = 'hidden';
} else {
	$hidden = false;
	$holder_classes[] = 'buttons_added';
} ?>

<div class="<?php echo implode( ' ', $holder_classes ); ?>">
	<?php do_action( 'woocommerce_before_quantity_input_field' ); ?>
	<label class="screen-reader-text" for="<?php echo esc_attr( $input_id ); ?>"><?php echo esc_attr( $label ); ?></label>
	
	<?php if( $hidden ) { ?>
		<input type="hidden" id="<?php echo esc_attr( $input_id ); ?>" class="qty" name="<?php echo esc_attr( $input_name ); ?>" value="<?php echo esc_attr( $min_value ); ?>" />
	<?php } else { ?>
		<input type="button" value="-" class="minus" />
		<input type="text" id="<?php echo esc_attr( $input_id ); ?>" step="<?php echo esc_attr( $step ); ?>" min="<?php echo esc_attr( $min_value ); ?>" max="<?php echo esc_attr( 0 < $max_value ? $max_value : '' ); ?>" name="<?php echo esc_attr( $input_name ); ?>" value="<?php echo esc_attr( $input_value ); ?>" title="<?php echo esc_attr_x( 'Qty', 'Product quantity input tooltip', 'bridge' ) ?>" class="input-text qty text" size="4" pattern="<?php echo esc_attr( $pattern ); ?>" inputmode="<?php echo esc_attr( $inputmode ); ?>" aria-labelledby="<?php echo ! empty( $args['product_name'] ) ? sprintf( esc_attr__( '%s quantity', 'bridge' ), $args['product_name'] ) : ''; ?>" />
		<input type="button" value="+" class="plus" />
	<?php } ?>
	
	<?php do_action( 'woocommerce_after_quantity_input_field' ); ?>
</div>
