<article <?php post_class( $item_classes ); ?>>
	<div class="qodef-e-inner">
		<?php
		if ( 'no' !== $showMedia && has_post_thumbnail() ) {
			// Include post media.
			qi_blocks_template_part( 'blog', 'templates/parts/post-info/media', '', $params );
		}
		?>
		<div class="qodef-e-content">
			<?php if ( 'no' !== $showDate || 'no' !== $showCategory ) { ?>
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
					?>
				</div>
			<?php } ?>
			<div class="qodef-e-text">
				<?php
				// Include post title.
				qi_blocks_template_part( 'blog', 'templates/parts/post-info/title', '', $params );

				// Include post excerpt.
				qi_blocks_template_part( 'blog', 'templates/parts/post-info/excerpt', '', $params );
				?>
			</div>
			<?php if ( 'no' !== $showAuthor || 'no' !== $showButton ) { ?>
				<div class="qodef-e-info qodef-info--bottom">
					<?php if ( 'no' !== $showAuthor ) { ?>
						<div class="qodef-info--left">
							<?php
							// Include post author info.
							qi_blocks_template_part( 'blog', 'templates/parts/post-info/author', 'with-image', $params );
							?>
						</div>
					<?php } ?>
					<?php if ( 'no' !== $showButton ) { ?>
						<?php
						// Include post read more.
						qi_blocks_template_part( 'blog', 'templates/parts/post-info/read-more', '', $params );
						?>
					<?php } ?>
				</div>
			<?php } ?>

		</div>
	</div>
</article>
