<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}
?>
<div class="qodef-admin-sidebar qodef-admin-grid-item qodef-admin-col--3">
<?php
	qi_blocks_template_part( 'admin/admin-pages', 'templates/parts/sidebar/templates' );
	qi_blocks_template_part( 'admin/admin-pages', 'templates/parts/sidebar/help-center' );
	qi_blocks_template_part( 'admin/admin-pages', 'templates/parts/sidebar/rate' );
	qi_blocks_template_part( 'admin/admin-pages', 'templates/parts/sidebar/social' );
?>
</div>
