<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}
?>
<div class="qodef-admin-sidebar-box qodef-social-boxes">
	<?php
		qi_blocks_template_part( 'admin/admin-pages', 'templates/parts/sidebar/social-instagram' );
		qi_blocks_template_part( 'admin/admin-pages', 'templates/parts/sidebar/social-facebook' );
		qi_blocks_template_part( 'admin/admin-pages', 'templates/parts/sidebar/social-dribbble' );
		qi_blocks_template_part( 'admin/admin-pages', 'templates/parts/sidebar/social-twitter' );
		qi_blocks_template_part( 'admin/admin-pages', 'templates/parts/sidebar/social-behance' );
		qi_blocks_template_part( 'admin/admin-pages', 'templates/parts/sidebar/social-pinterest' );
	?>
</div>
