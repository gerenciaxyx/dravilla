<div <?php echo qi_blocks_get_block_container_html_attributes_string( $params ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	<div <?php qi_blocks_class_attribute( $holder_classes ); ?>>
		<?php
		if ( isset( $params[ 'behavior' ] ) && 'masonry' === $params['behavior'] ) { ?>
		<div <?php qi_blocks_class_attribute( $masonry_classes ); ?>>
		<?php } 
		?>
			<div class="qodef-gutenberg-row">
				<?php
				// Include global masonry template from theme.
				qi_blocks_template_part( 'masonry', 'templates/sizer-gutter', '', $params['behavior'] );

				// Include items.
				qi_blocks_template_part( 'blocks/blog-list', 'templates/loop', '', $params );
				?>
			</div>
		<?php
		if ( isset( $params[ 'behavior' ] ) && 'masonry' === $params['behavior'] ) { ?>
		</div>
		<?php } 
		// Include global pagination from theme.
		qi_blocks_template_part( 'pagination', 'templates/pagination', 'standard', $params );
		?>
	</div>
</div>
