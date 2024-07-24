<article <?php post_class( $item_classes ); ?>>
	<div class="qodef-e-inner">
		<?php if ( 'no' !== $showMedia && has_post_thumbnail() ) { ?>
			<div class="qodef-e-media-holder">
				<?php
				// Include post media.
				qi_blocks_template_part( 'blog', 'templates/parts/post-info/media', '', $params );

				// phpcs:ignore WordPress.NamingConventions.ValidVariableName.VariableNotSnakeCase
				if ( 'no' !== $showDate ) {
					// Include post date info.
					qi_blocks_template_part( 'blog', 'templates/parts/post-info/date', 'boxed', $params );
				}
				?>
			</div>
		<?php } ?>
		<div class="qodef-e-content">
			<?php
			// phpcs:ignore WordPress.NamingConventions.ValidVariableName.VariableNotSnakeCase
			if ( 'no' !== $showCategory || 'no' !== $showAuthor ) {
				?>
				<div class="qodef-e-info qodef-info--top">
					<?php
					// phpcs:ignore WordPress.NamingConventions.ValidVariableName.VariableNotSnakeCase
					if ( 'no' !== $showCategory ) {
						// Include post category info.
						qi_blocks_template_part( 'blog', 'templates/parts/post-info/category', '', $params );
					}

					// phpcs:ignore WordPress.NamingConventions.ValidVariableName.VariableNotSnakeCase
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
