<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

$premium_block = isset( $block['type'] ) && 'premium' === $block['type'];
$disabled      = false;
$item_classes  = array();

if ( $premium_block ) {

	if ( $premium_flag ) {
		$item_classes[] = 'qodef-premium--enabled';
	} else {
		$disabled       = true;
		$item_classes[] = 'qodef-premium--disabled';
	}
}
?>
<div class="qodef-widgets-item col-sm-12 col-md-3 <?php echo esc_attr( implode( ' ', $item_classes ) ); ?>">
	<div class="qodef-widgets-item-top">
		<h5 class="qodef-widgets-title"><?php echo esc_html( $block['title'] ); ?></h5>
		<div class="qodef-checkbox-toggle qodef-field" data-option-name="<?php echo esc_attr( $block_key ); ?>">
			<input type="checkbox" id="<?php echo esc_attr( $block_key ); ?>" name="<?php echo esc_attr( $block_key ); ?>" value="yes" <?php echo esc_attr( $disabled ? '' : 'checked' ); ?> />
			<label for="<?php echo esc_attr( $block_key ); ?>"><?php echo esc_html( $block['title'] ); ?></label>
		</div>
		<?php if ( $premium_block ) { ?>
			<span class="qodef-widget-mark"><?php esc_html_e( 'Premium', 'qi-blocks' ); ?></span>
		<?php } ?>
	</div>
</div>
