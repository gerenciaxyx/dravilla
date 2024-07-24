<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( post_password_required() ) {
	echo get_the_password_form(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
} else {
	$excerpt = get_the_excerpt();

	if ( ! isset( $excerptLength ) || '' === $excerptLength ) {
		$excerptLength = 180;
	}

	if ( ! empty( $excerpt ) && 'no' !== $showExcerpt ) {
		$new_excerpt = ( intval( $excerptLength ) > 0 ) ? substr( $excerpt, 0, intval( $excerptLength ) ) : $excerpt;
		?>
		<p class="qodef-e-excerpt">
			<?php echo esc_html( strip_tags( strip_shortcodes( $new_excerpt ) ) ); ?>
		</p>
	<?php
	}
}
?>
