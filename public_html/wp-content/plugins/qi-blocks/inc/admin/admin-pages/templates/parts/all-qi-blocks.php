<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}
?>
<div class="qodef-section-box qodef-section-all-qi-blocks">
	<div class="qodef-section-box-content">
		<h2><?php esc_html_e( 'All Qi Blocks', 'qi-blocks' ); ?></h2>
		<p class="qodef-large"><?php esc_html_e( 'Browse the entire custom block collection', 'qi-blocks' ); ?></p>
		<a class="qodef-btn qodef-btn-solid" href="https://qodeinteractive.com/qi-blocks-for-gutenberg/all-blocks?utm_source=dash&utm_medium=qiblocks&utm_campaign=welcome" target="_blank"><?php esc_html_e( 'View Blocks', 'qi-blocks' ); ?></a>
	</div>
	<div class="qodef-section-box-image">
		<img src="<?php echo esc_url( QI_BLOCKS_ADMIN_URL_PATH . '/admin-pages/assets/img/all-qi-blocks.png' ); ?>" alt="<?php esc_attr_e( 'Qi Blocks for Gutenberg', 'qi-blocks' ); ?>" />
	</div>
</div>
