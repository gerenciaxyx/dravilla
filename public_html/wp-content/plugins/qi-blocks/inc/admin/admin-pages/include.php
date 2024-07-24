<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

require_once QI_BLOCKS_ADMIN_PATH . '/admin-pages/class-qi-blocks-admin-general-page.php';
require_once QI_BLOCKS_ADMIN_PATH . '/admin-pages/class-qi-blocks-admin-sub-pages.php';

foreach ( glob( QI_BLOCKS_ADMIN_PATH . '/admin-pages/sub-pages/*/include.php' ) as $page ) {
	require_once $page;
}
