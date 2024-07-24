<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}
?>
<div class="qodef-section-box qodef-section-knowledge">
	<div class="qodef-section-content">
		<div class="qodef-section-content-part">
			<h3><?php esc_html_e( 'Knowledge Base', 'qi-blocks' ); ?></h3>
			<p><?php esc_html_e( 'Find answers to WP-related questions', 'qi-blocks' ); ?></p>
			<a class="qodef-btn qodef-btn-simple" href="https://helpcenter.qodeinteractive.com?utm_source=dash&utm_medium=qiblocks&utm_campaign=welcome" target="_blank"><?php esc_html_e( 'view more', 'qi-blocks' ); ?></a>
		</div>
		<div class="qodef-section-content-part">
			<h3><?php esc_html_e( 'Documentation', 'qi-blocks' ); ?></h3>
			<p><?php esc_html_e( 'Detailed Qi Blocks user guide', 'qi-blocks' ); ?></p>
			<a class="qodef-btn qodef-btn-simple" href="https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation?utm_source=dash&utm_medium=qiblocks&utm_campaign=welcome" target="_blank"><?php esc_html_e( 'view more', 'qi-blocks' ); ?></a>
		</div>
	</div>
	<div class="qodef-section-knowledge-image">
		<img src="<?php echo esc_url( QI_BLOCKS_ADMIN_URL_PATH . '/admin-pages/assets/img/knowledge-base.png' ); ?>" alt="<?php esc_attr_e( 'Knowledge Base', 'qi-blocks' ); ?>"/>
	</div>
</div>
