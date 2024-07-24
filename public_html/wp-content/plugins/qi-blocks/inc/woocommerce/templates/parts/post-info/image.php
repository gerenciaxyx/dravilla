<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

$post_thumbnail_id = apply_filters( 'qi_blocks_filter_product_list_thumbnail_id', get_post_thumbnail_id(), get_the_ID() );

if ( has_post_thumbnail() ) {
	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo qi_blocks_get_list_block_item_image( $imagesProportion, $post_thumbnail_id, intval( $customImageWidth ), intval( $customImageHeight ) );
}
