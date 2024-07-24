<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( ! empty( $block['video'] ) ) :
	?>
	<a href="<?php echo esc_url( $block['video'] ); ?>" target="_blank"><?php esc_html_e( 'Video', 'qi-blocks' ); ?></a>
<?php endif; ?>
