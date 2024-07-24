<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( 'yes' === $enablePagination && ! is_singular( 'post' ) && isset( $query_result ) && intval( $query_result->max_num_pages ) > 1 ) {
	?>
	<div class="qodef-m-pagination qodef--standard">
		<nav class="navigation pagination" role="navigation" aria-label="<?php esc_attr_e( 'Posts', 'qi-blocks' ); ?>">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Posts navigation', 'qi-blocks' ); ?></h2>
			<div class="nav-links">
				<?php
				$prev_text = qi_blocks_get_template_part( 'pagination', 'templates/parts/arrow-left', '', $params );
				$next_text = qi_blocks_get_template_part( 'pagination', 'templates/parts/arrow-right', '', $params );
				$current   = is_front_page() ? max( 1, get_query_var( 'page' ) ) : max( 1, get_query_var( 'paged' ) );

				echo paginate_links(
					array(
						'prev_text' => $prev_text,
						'next_text' => $next_text,
						'current'   => $current,
						'total'     => $query_result->max_num_pages,
					)
				);
				?>
			</div>
		</nav>
	</div>
<?php } ?>
