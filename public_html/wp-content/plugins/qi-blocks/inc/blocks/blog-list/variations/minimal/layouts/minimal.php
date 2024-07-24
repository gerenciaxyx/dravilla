<article <?php post_class( $item_classes ); ?>>
	<div class="qodef-e-inner">
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

				// Include post excerpt.
				qi_blocks_template_part( 'blog', 'templates/parts/post-info/excerpt', '', $params );

				if ( 'yes' === $showButton ) {
					?>
					<div class="qodef-e-info qodef-info--bottom">
						<?php
						// Include post read more.
						qi_blocks_template_part( 'blog', 'templates/parts/post-info/read-more', '', $params );
						?>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>
</article>
