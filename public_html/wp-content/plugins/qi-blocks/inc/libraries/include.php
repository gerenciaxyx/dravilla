<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

foreach ( glob( QI_BLOCKS_INC_PATH . '/libraries/*/include.php' ) as $library_module ) {
	require_once $library_module;
}
