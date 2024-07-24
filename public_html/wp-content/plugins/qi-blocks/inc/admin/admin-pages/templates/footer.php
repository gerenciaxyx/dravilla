<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}
?>
<div class="qodef-admin-footer">
	<div class="qodef-admin-footer-logo">
		<img width="55" src="<?php echo esc_url( QI_BLOCKS_ADMIN_URL_PATH . '/admin-pages/assets/img/footer-logo-qode-interactive.png' ); ?>" alt="<?php esc_attr_e( 'Qode Interactive Logo', 'qi-blocks' ); ?>"/>
	</div>
	<div class="qodef-admin-footer-text">
		<h3><?php esc_html_e( 'Qode Interactive', 'qi-blocks' ); ?></h3>
		<p><?php esc_html_e( 'Copyright &copy; 2022 Qode Interactive, All rights reserved', 'qi-blocks' ); ?></p>
	</div>
</div>
