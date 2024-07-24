<?php if ( ! empty( $buttonIcon ) && isset( $buttonIcon['html'] ) && ! empty( $buttonIcon['html'] ) ) { ?>
	<span <?php qi_blocks_class_attribute( $icon_classes ); ?>>
		<span class="qodef-m-icon-inner">
			<?php echo qi_blocks_get_svg_icon_content( $buttonIcon['html'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			<?php if ( ! empty( $buttonIconHoverMove ) && ( $buttonIconHoverMove !== 'move-horizontal-short' ) ) { ?>
				<?php echo qi_blocks_get_svg_icon_content( $buttonIcon['html'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			<?php } ?>
		</span>
	</span>
<?php } ?>
