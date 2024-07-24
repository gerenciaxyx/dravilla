<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

// phpcs:ignore WordPress.NamingConventions.ValidVariableName.VariableNotSnakeCase
$showInfoIcons = isset( $showInfoIcons ) && ! empty( $showInfoIcons ) ? $showInfoIcons : 'no';
?>
<div class="qodef-e-info-item qodef-e-info-author">
	<a class="qodef-e-info-author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
		<?php if ( 'yes' === $showInfoIcons ) { ?>
			<svg class="qodef-e-info-item-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 15.9 15.9" xml:space="preserve"><path d="M2.5,2.5C4,1,5.8,0.2,7.9,0.2c2.1,0,3.9,0.8,5.5,2.3c1.5,1.5,2.3,3.3,2.3,5.5c0,2.1-0.8,3.9-2.3,5.5c-1.5,1.5-3.3,2.3-5.5,2.3c-2.1,0-3.9-0.8-5.5-2.3C1,11.9,0.2,10,0.2,7.9C0.2,5.8,1,4,2.5,2.5z M12.9,2.9c-1.4-1.4-3.1-2.1-5-2.1c-2,0-3.6,0.7-5,2.1C1.5,4.3,0.9,6,0.9,7.9c0,1.7,0.6,3.2,1.7,4.5c1-0.4,2.1-0.8,3.3-1.2c0.1,0,0.1-0.2,0.1-0.4c0-0.4,0-0.7-0.1-0.9C5.7,9.7,5.6,9.3,5.5,8.8C5.3,8.5,5.1,8.1,5,7.6c-0.1-0.4-0.1-0.7,0-1V6.5c0.1-0.2,0-0.7-0.1-1.4C4.8,4.5,5,3.8,5.5,3.2c0.5-0.6,1.2-1,2.2-1h0.7c1,0,1.7,0.4,2.2,1c0.5,0.6,0.7,1.3,0.6,1.9c-0.1,0.7-0.2,1.2-0.1,1.4c0,0,0,0,0,0.1c0.1,0.2,0.1,0.6,0,1c-0.1,0.5-0.3,0.9-0.5,1.2c-0.1,0.5-0.2,0.9-0.3,1.2c-0.1,0.3-0.2,0.6-0.2,0.9c0,0.2,0,0.4,0.1,0.4c1.2,0.4,2.4,0.8,3.5,1.2c1.1-1.3,1.7-2.8,1.7-4.5C15,6,14.3,4.3,12.9,2.9z"/></svg>
		<?php }	?>
		<?php the_author_meta( 'display_name' ); ?>
	</a>
</div>
