<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

// phpcs:ignore WordPress.NamingConventions.ValidVariableName.VariableNotSnakeCase
$showInfoIcons = isset( $showInfoIcons ) && ! empty( $showInfoIcons ) ? $showInfoIcons : 'no';
?>
<div class="qodef-e-info-item qodef-e-info-category">
	<?php if ( 'yes' === $showInfoIcons ) { ?>
		<svg class="qodef-e-info-item-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 16.1 14.9" xml:space="preserve"><path d="M14.6,0.3c0.3,0,0.6,0.1,0.9,0.3s0.4,0.5,0.4,0.9v10.6c0,0.3-0.1,0.6-0.4,0.9s-0.5,0.4-0.9,0.4H9.3c-0.6,0-0.9,0.2-0.9,0.7v0.5H8H7.8v-0.5c0-0.5-0.3-0.7-0.9-0.7H1.5c-0.3,0-0.6-0.1-0.9-0.4c-0.2-0.2-0.4-0.5-0.4-0.9V1.5c0-0.3,0.1-0.6,0.4-0.9c0.2-0.2,0.5-0.3,0.9-0.3h5.6c0.4,0,0.7,0.1,1,0.4c0.2-0.3,0.6-0.4,1-0.4H14.6z M7.8,13.2V1.7c0-0.2-0.1-0.4-0.3-0.5C7.3,1,7,0.9,6.8,0.9H1.5c-0.4,0-0.6,0.2-0.6,0.6v10.6c0,0.2,0.1,0.3,0.2,0.5s0.3,0.2,0.4,0.2h5.3C7.3,12.8,7.6,12.9,7.8,13.2zM15.2,12.1V1.5c0-0.4-0.2-0.6-0.6-0.6h-1.2v4.9l-1.8-1.2L9.8,5.7V0.9H9.3C9,0.9,8.8,1,8.6,1.2C8.4,1.3,8.3,1.5,8.3,1.7v11.5c0.1-0.3,0.4-0.4,0.9-0.4h5.3c0.2,0,0.3-0.1,0.4-0.2S15.2,12.3,15.2,12.1z M10.4,0.9v3.7l0.9-0.5l0.3-0.2l0.3,0.2l0.9,0.5V0.9H10.4z"/></svg>
	<?php }	?>
	<?php the_category( '<span class="qodef-category-separator"></span>' ); ?>
</div>
