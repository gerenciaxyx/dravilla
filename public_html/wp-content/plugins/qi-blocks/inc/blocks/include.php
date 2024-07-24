<?php

// Hook to include additional element before blocks inclusion.
do_action( 'qi_blocks_action_before_include_blocks' );

// Include main block.
require_once QI_BLOCKS_BLOCKS_PATH . '/helper.php';
require_once QI_BLOCKS_BLOCKS_PATH . '/class-qi-blocks-blocks-list.php';
require_once QI_BLOCKS_BLOCKS_PATH . '/class-qi-blocks-blocks.php';

foreach ( glob( QI_BLOCKS_BLOCKS_PATH . '/*/*-block.php' ) as $block ) {
	require_once $block;
}

foreach ( glob( QI_BLOCKS_BLOCKS_PATH . '/*/helper.php' ) as $block_helper ) {
	require_once $block_helper;
}

// Hook to include additional element after blocks inclusion.
do_action( 'qi_blocks_action_after_include_blocks' );
