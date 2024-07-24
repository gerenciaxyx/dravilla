<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}
?>
<div class="qodef-admin-sidebar-box qodef-widgets-box">
	<div class="qodef-admin-sidebar-box-image">
		<a href="https://qodeinteractive.com/qi-templates?utm_source=dash&utm_medium=qiblocks&utm_campaign=welcome" target="_blank">
			<img src="<?php echo esc_url( QI_BLOCKS_ADMIN_URL_PATH . '/admin-pages/assets/img/qi-templates.png' ); ?>" alt="<?php esc_attr_e( 'Qi Templates', 'qi-blocks' ); ?>"/>
		</a>
	</div>
	<div class="qodef-admin-sidebar-box-content">
		<h3><?php esc_html_e( 'Qi Templates', 'qi-blocks' ); ?></h3>
		<p><?php esc_html_e( '60+ demos, 265+ templates, 232+ patterns, 32+ wireframes', 'qi-blocks' ); ?></p>
		<a class="qodef-btn qodef-btn-solid-outlined" href="https://qodeinteractive.com/qi-templates?utm_source=dash&utm_medium=qiblocks&utm_campaign=welcome" target="_blank"><?php esc_html_e( 'View More', 'qi-blocks' ); ?></a>
	</div>
</div>
