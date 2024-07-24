<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

$post_ID    = isset( $post_ID ) && ! empty( $post_ID ) ? intval( $post_ID ) : 0;
$attributes = isset( $attributes ) && ! empty( $attributes ) ? (array) $attributes : array();
$ajax       = isset( $ajax ) && ! empty( $ajax );

if ( ! empty( $post_ID ) ) {
	global $wp_rewrite;

	if ( ! comments_open( $post_ID ) && get_comments_number( $post_ID ) && post_type_supports( get_post_type( $post_ID ), 'comments' ) ) {
		esc_html_e( 'Comments for this post are not enabled.', 'qi-blocks' );
	} elseif ( comments_open( $post_ID ) || get_comments_number( $post_ID ) ) {

		$comment_query = new WP_Comment_Query(
			qi_blocks_get_comments_list_args( $post_ID, $ajax )
		);

		// Get an array of comments for the current post.
		$comments = ! empty( $comment_query ) ? $comment_query->get_comments() : 0;

		// Check visibility.
		$comments_enabled = isset( $attributes['showCommentsList'] ) && ! empty( $attributes['showCommentsList'] );
		$form_enabled     = isset( $attributes['showCommentsForm'] ) && ! empty( $attributes['showCommentsForm'] );

		// Set default title tag for sections title.
		$title_tag = isset( $attributes['titleTag'] ) && ! empty( $attributes['titleTag'] ) ? $attributes['titleTag'] : 'h3';

		// Include comments form template.
		if ( $comments_enabled && count( $comments ) > 0 ) {
			$comments_number     = get_comments_number( $post_ID );
			$pagination_comments = $comments;

			if ( $ajax ) {
				$pagination_comments = ( new WP_Comment_Query( qi_blocks_get_comments_list_args( $post_ID ) ) )->get_comments();
			}
			?>
			<div id="qodef-comments-list">
				<<?php echo qi_blocks_escape_title_tag( $title_tag ); ?> class="qodef-m-title"><?php
					echo esc_html( _n( 'Comment', 'Comments', $comments_number, 'qi-blocks' ) );
				?></<?php echo qi_blocks_escape_title_tag( $title_tag ); ?>>
				<ul class="qodef-m-comments">
					<?php
					wp_list_comments(
						array(
							'callback' => 'qi_blocks_get_comments_list_template',
						),
						$comments
					);
					?>
				</ul>
				<?php
				// Include pagination comments template.
				if ( get_comment_pages_count( $pagination_comments ) > 1 ) { ?>
					<div class="qodef-m-pagination qodef--wp">
						<?php
						$pagination_args = array(
							'base'               => add_query_arg( 'cpage', '%#%' ),
							'format'             => '',
							'total'              => get_comment_pages_count( $pagination_comments ),
							'current'            => ! get_query_var( 'cpage' ) ? 1 : get_query_var( 'cpage' ),
							'add_fragment'       => '#comments',
							'prev_text'          => qi_blocks_get_svg_icon( 'icon-arrow-left' ),
							'next_text'          => qi_blocks_get_svg_icon( 'icon-arrow-right' ),
						);

						if ( $wp_rewrite->using_permalinks() ) {
							$pagination_args['base'] = user_trailingslashit( trailingslashit( get_permalink() ) . $wp_rewrite->comments_pagination_base . '-%#%', 'commentpaged' );
						}

						echo _navigation_markup(
							paginate_links( $pagination_args ),
							'comments-pagination',
							esc_html__( 'Comments navigation', 'qi-blocks' ),
							esc_html__( 'Comments', 'qi-blocks' )
						);
						?>
					</div>
				<?php } ?>
			</div>
			<?php
		}

		// Include comments form template.
		if ( $form_enabled ) {
			?>
			<div id="qodef-comments-form">
				<?php
				comment_form(
					qi_blocks_get_comment_form_args( $attributes ),
					$post_ID
				);
				?>
			</div>
			<?php
		}
	} else {
		esc_html_e( 'Comments on this post are not allowed.', 'qi-blocks' );
	}
}
