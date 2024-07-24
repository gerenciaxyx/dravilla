<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

$premium_block = isset( $block['type'] ) && 'premium' === $block['type'];
$item_classes  = array();

if ( $premium_block ) {

	if ( $premium_flag ) {
		$item_classes[] = 'qodef-premium--enabled';
	} else {
		$disabled[ $block_key ] = $block['title'];
		$item_classes[]         = 'qodef-premium--disabled';
	}
}
?>
<div class="qodef-widgets-item col-sm-12 col-md-6 <?php echo esc_attr( implode( ' ', $item_classes ) ); ?>">
	<div class="qodef-widgets-item-top">
		<h4 class="qodef-widgets-title"><?php echo esc_html( $block['title'] ); ?></h4>
		<div class="qodef-checkbox-toggle qodef-field" data-option-name="<?php echo esc_attr( $block_key ); ?>">
			<input type="checkbox" id="<?php echo esc_attr( $block_key ); ?>" name="<?php echo esc_attr( $block_key ); ?>" value="yes" <?php echo ( ! empty( $disabled ) && key_exists( $block_key, $disabled ) ) ? '' : 'checked'; ?> />
			<label for="<?php echo esc_attr( $block_key ); ?>"><?php echo esc_html( $block['title'] ); ?></label>
		</div>
		<?php if ( $premium_block ) { ?>
			<span class="qodef-widget-mark"><?php esc_html_e( 'Premium', 'qi-blocks' ); ?></span>
		<?php } ?>
	</div>
	<?php qi_blocks_template_part( 'admin/admin-pages', 'sub-pages/widgets/templates/parts/demo', '', array( 'block' => $block ) ); ?>
	<?php qi_blocks_template_part( 'admin/admin-pages', 'sub-pages/widgets/templates/parts/documentation', '', array( 'block' => $block ) ); ?>
	<?php qi_blocks_template_part( 'admin/admin-pages', 'sub-pages/widgets/templates/parts/video', '', array( 'block' => $block ) ); ?>
</div>
