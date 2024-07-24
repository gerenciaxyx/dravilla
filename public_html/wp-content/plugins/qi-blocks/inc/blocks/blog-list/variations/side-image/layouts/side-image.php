<article <?php post_class( $item_classes ); ?>>
	<div class="qodef-e-inner">
		<?php
		if ( 'no' !== $showMedia && has_post_thumbnail() ) {
			// Include post media.
			qi_blocks_template_part( 'blog', 'templates/parts/post-info/media', '', $params );
		}
		?>
		<div class="qodef-e-content">
			<?php if ( 'no' !== $showDate || 'no' !== $showCategory || 'no' !== $showAuthor ) { ?>
				<div class="qodef-e-info qodef-info--top">
					<?php

					if ( 'no' !== $showDate ) {
						// Include post date info.
						qi_blocks_template_part( 'blog', 'templates/parts/post-info/date', '', $params );
					}
					if ( 'no' !== $showCategory ) {
						// Include post category info.
						qi_blocks_template_part( 'blog', 'templates/parts/post-info/category', '', $params );
					}

					if ( 'no' !== $showAuthor ) {
						// Include post author info.
						qi_blocks_template_part( 'blog', 'templates/parts/post-info/author', '', $params );
					}
					?>
				</div>
			<?php } ?>
			<div class="qodef-e-text">
				<?php
				// Include post title.
				qi_blocks_template_part( 'blog', 'templates/parts/post-info/title', '', $params );

				// needed extra checking because it shouldn't be visible on default (backwards compatibility.
				if ( 'yes' === $showExcerpt ) {
					// Include post excerpt.
					qi_blocks_template_part( 'blog', 'templates/parts/post-info/excerpt', '', $params );
				}
				?>
			</div>
			<?php if ( 'no' !== $showButton ) { ?>
				<div class="qodef-e-info qodef-info--bottom">
					<?php
					// Include post read more.
					qi_blocks_template_part( 'blog', 'templates/parts/post-info/read-more', '', $params );
					?>
				</div>
			<?php } ?>
		</div>
	</div>
</article>
