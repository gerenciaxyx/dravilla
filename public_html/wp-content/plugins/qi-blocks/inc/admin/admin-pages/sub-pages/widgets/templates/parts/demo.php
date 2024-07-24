<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( ! empty( $block['demo'] ) ) :
	?>
	<a href="<?php echo esc_url( $block['demo'] ); ?>?utm_source=dash&utm_medium=qiblocks&utm_campaign=blocks" target="_blank"><?php esc_html_e( 'Demo', 'qi-blocks' ); ?></a>
<?php endif; ?>
