<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( ! empty( $block['documentation'] ) ) :
	?>
	<a href="<?php echo esc_url( $block['documentation'] ); ?>" target="_blank"><?php esc_html_e( 'Documentation', 'qi-blocks' ); ?></a>
<?php endif; ?>
