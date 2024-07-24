<?php

if ( $query_result->have_posts() ) {
	while ( $query_result->have_posts() ) :
		$query_result->the_post();

		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo qi_blocks_get_block_list_template_part( 'blocks/blog-list', 'layouts/' . $layout, get_post_format(), $params );
	endwhile;
} else {
	// Include global posts not found.
	qi_blocks_template_part( 'blog', 'templates/parts/posts-not-found' );
}

wp_reset_postdata();
