<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( ! function_exists( 'qi_blocks_get_comments_list_args' ) ) {
	/**
	 * Function that define new comment list args in order to override default WordPress comment list
	 *
	 * @param int $post_ID
	 * @param boolean $ajax
	 *
	 * @return array
	 */
	function qi_blocks_get_comments_list_args( $post_ID, $ajax = false ) {
		$args = array(
			'post_id'       => (int) $post_ID,
			'orderby'       => 'comment_date_gmt',
			'order'         => 'DESC',
			'status'        => 'approve',
			'no_found_rows' => false,
			'page'          => '',
			'per_page'      => '',
		);

		if ( 'desc' === get_option( 'comment_order' ) ) {
			$args['order'] = 'asc';
		}

		if ( get_option( 'thread_comments' ) ) {
			$args['max_depth'] = get_option( 'thread_comments_depth' );
		} else {
			$args['max_depth'] = -1;
		}

		if ( get_option( 'page_comments' ) === '1' || get_option( 'page_comments' ) === true ) {
			$per_page     = (int) get_option( 'comments_per_page' );
			$default_page = get_option( 'default_comments_page' );
			if ( $per_page > 0 ) {
				$args['per_page'] = $per_page;

				$page = (int) get_query_var( 'cpage' );
				if ( $page ) {
					$args['page']  = $page;
					$args['paged'] = $page;
				} elseif ( 'oldest' === $default_page ) {
					$args['page']  = 1;
					$args['paged'] = 1;
				} elseif ( 'newest' === $default_page ) {
					$max_comments_num = ( new WP_Comment_Query( array_merge( $args, array( 'number' => $per_page ) ) ) )->max_num_pages;

					$args['page']  = $max_comments_num;
					$args['paged'] = $max_comments_num;
				}

				// Set the `cpage` query var to ensure the previous and next pagination links are correct.
				// when inheriting the Discussion Settings.
				if ( 0 === $page && isset( $args['paged'] ) && $args['paged'] > 0 ) {
					set_query_var( 'cpage', (int) $args['paged'] );
				}
			}
		}

		return $args;
	}
}

if ( ! function_exists( 'qi_blocks_get_comments_list_template' ) ) {
	/**
	 * Function which modify default WordPress comments list template
	 *
	 * @param object $comment
	 * @param array $args
	 * @param int $depth
	 *
	 * @return string that contains comments list html
	 */
	function qi_blocks_get_comments_list_template( $comment, $args, $depth ) {
		global $post;

		$classes = array();

		$is_author_comment = $post->post_author === $comment->user_id;
		if ( $is_author_comment ) {
			$classes[] = 'qodef-comment--author';
		}

		$is_specific_comment = 'pingback' === $comment->comment_type || 'trackback' === $comment->comment_type;
		if ( $is_specific_comment ) {
			$classes[] = 'qodef-comment--no-avatar';
			$classes[] = 'qodef-comment--' . esc_attr( $comment->comment_type );
		}
		?>
	<li class="qodef-comment-item qodef-e <?php echo esc_attr( implode( ' ', $classes ) ); ?>">
		<div id="comment-<?php comment_ID(); ?>" class="qodef-e-inner">
			<?php if ( ! $is_specific_comment ) { ?>
				<div class="qodef-e-image"><?php echo get_avatar( $comment, 150 ); ?></div>
			<?php } ?>
			<div class="qodef-e-content">
				<div class="qodef-e-info">
					<div class="qodef-e-date commentmetadata">
						<a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>"><?php comment_time( get_option( 'date_format' ) ); ?></a>
					</div>
					<div class="qodef-e-links">
						<?php
						comment_reply_link(
							array_merge(
								$args,
								array(
									// translators: %s - Add svg icon for reply link.
									'reply_text' => qi_blocks_get_svg_icon( 'comment-reply' ),
									'depth'      => $depth,
									'max_depth'  => $args['max_depth'],
								)
							)
						);

						// translators: %s - Add svg icon for edit link.
						edit_comment_link( qi_blocks_get_svg_icon( 'comment-edit' ) );
						?>
					</div>
				</div>
				<h5 class="qodef-e-title vcard"><?php echo sprintf( '<span class="fn">%s%s</span>', esc_attr( $is_specific_comment ) ? sprintf( '%s: ', esc_attr( ucwords( $comment->comment_type ) ) ) : '', get_comment_author_link() ); ?></h5>
				<?php if ( ! $is_specific_comment ) { ?>
					<div class="qodef-e-text"><?php comment_text( $comment ); ?></div>
				<?php } ?>
			</div>
		</div>
		<?php //li tag will be closed by WordPress after looping through child elements ?>
		<?php
	}
}

if ( ! function_exists( 'qi_blocks_get_comment_form_args' ) ) {
	/**
	 * Function that define new comment form args in order to override default WordPress comment form
	 *
	 * @param array $attributes
	 *
	 * @return array
	 */
	function qi_blocks_get_comment_form_args( $attributes ) {
		$classes = array(
			'qodef-comment-form-button',
			'qodef--filled',
		);

		$icon = '';

		if ( $attributes['formButtonShowIcon'] ) {
			$classes[] = 'qodef--with-icon';

			$icon = qi_blocks_get_svg_icon( 'button-arrow', 'qodef-m-icon' );

			if ( isset( $attributes['formButtonIcon'] ) && ! empty( $attributes['formButtonIcon'] ) ) {

				if ( is_object( $attributes['formButtonIcon'] ) && isset( $attributes['formButtonIcon']->html ) && ! empty( $attributes['formButtonIcon']->html ) ) {
					$icon = '<span class="qodef-m-icon">' . $attributes['formButtonIcon']->html . '</span>';
				}

				if ( is_array( $attributes['formButtonIcon'] ) && isset( $attributes['formButtonIcon']['html'] ) && ! empty( $attributes['formButtonIcon']['html'] ) ) {
					$icon = '<span class="qodef-m-icon">' . $attributes['formButtonIcon']['html'] . '</span>';
				}
			}
		}

		$args = array(
			'title_reply_to'       => esc_attr__( 'Reply to %s', 'qi-blocks' ),
			'title_reply_before'   => '<' . qi_blocks_escape_title_tag( $attributes['titleTag'] ) . ' id="reply-title" class="comment-reply-title">',
			'title_reply_after'    => '</' . qi_blocks_escape_title_tag( $attributes['titleTag'] ) . '>',
			'comment_field' => sprintf(
				'<p class="comment-form-comment">%s %s</p>',
				'<label for="comment">' . esc_html__( 'Comment', 'qi-blocks' ) . '</label>',
				'<textarea id="comment" name="comment" cols="45" rows="6" maxlength="65525" required="required"></textarea>'
			),
			'submit_button' => '<button name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s"><span class="qodef-m-text">%4$s</span>' . $icon . '</button>',
			'class_submit'  => implode( ' ', $classes ),
			'class_form'    => 'qodef-comment-form',
		);

		return apply_filters( 'qi_blocks_filter_comment_form_args', $args );
	}
}
