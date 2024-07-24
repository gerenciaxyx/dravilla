<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}
?>
<div class="qodef-admin-header">
	<div class="qodef-header-left">
		<div class="qodef-header-left-inner">
			<div class="qodef-logo-holder">
				<a href="https://qodeinteractive.com?utm_source=dash&utm_medium=qiblocks&utm_campaign=welcome" target="_blank">
					<img height="38" src="<?php echo esc_url( QI_BLOCKS_ADMIN_URL_PATH . '/admin-pages/assets/img/logo-qode-interactive.png' ); ?>" alt="<?php esc_attr_e( 'Qode Interactive Logo', 'qi-blocks' ); ?>"/>
				</a>
			</div>
		</div>
	</div>
	<div class="qodef-header-right">
		<div class="qodef-header-right-inner">
			<div class="qodef-breadcrumbs-holder">
				<p>
					<a href="<?php echo esc_url( $menu_url ); ?>"><?php esc_html_e( 'Qi Blocks', 'qi-blocks' ); ?></a>
					<span><?php esc_html_e( ' / ', 'qi-blocks' ); ?></span>
					<span><?php echo esc_html( $menu_title ); ?></span>
				</p>
			</div>
		</div>
	</div>
</div>
