<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}
?>
<div class="qodef-widgets-section-title-holder">
	<h3 class="qodef-widgets-section-title"><?php echo esc_html( str_replace( '-', ' ', $block_subcategory ) ); ?></h3>
	<div class="qodef-checkbox-toggle qodef-field">
		<h6><?php esc_html_e( 'Activate All', 'qi-blocks' ); ?></h6>
		<input type="checkbox" class="qodef-section-enable" id="<?php echo esc_attr( $block_subcategory ); ?>" name="<?php echo esc_attr( $block_subcategory ); ?>" value="yes" <?php echo ( in_array( $block_subcategory, $enabled_subcategory, true ) ) ? 'checked' : ''; ?> />
		<label for="<?php echo esc_attr( $block_subcategory ); ?>"><?php echo esc_html( str_replace( '-', ' ', $block_subcategory ) ); ?></label>
	</div>
</div>
