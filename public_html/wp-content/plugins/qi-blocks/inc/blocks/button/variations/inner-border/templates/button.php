<a <?php qi_blocks_class_attribute( $button_classes ); ?> href="<?php echo esc_url( $button_link['url'] ); ?>" <?php qi_blocks_inline_attrs( $data_attrs ); ?>>
	<span class="qodef-m-text"><?php echo esc_html( $buttonText ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.VariableNotSnakeCase ?></span>
	<?php
	qi_blocks_template_part( 'blocks/button', 'templates/parts/icon', '', $params );
	?>
	<div class="qodef-m-inner-border">
		<?php
		// phpcs:ignore WordPress.NamingConventions.ValidVariableName.VariableNotSnakeCase
		if ( 'move-outer-edge' !== $buttonInnerBorderHoverType ) {
			?>
			<span class="qodef-m-border-top"></span>
			<span class="qodef-m-border-right"></span>
			<span class="qodef-m-border-bottom"></span>
			<span class="qodef-m-border-left"></span>
			<?php
		}
		?>
	</div>
	<?php
	// phpcs:ignore WordPress.NamingConventions.ValidVariableName.VariableNotSnakeCase
	if ( ! empty( $buttonInnerBorderHoverType ) && ( ( 'draw q-draw-center' == $buttonInnerBorderHoverType ) || ( 'draw q-draw-one-point' == $buttonInnerBorderHoverType ) || ( 'draw q-draw-two-points' == $buttonInnerBorderHoverType ) ) ) {
		?>
		<div class="qodef-m-inner-border qodef-m-inner-border-copy">
			<span class="qodef-m-border-top"></span>
			<span class="qodef-m-border-right"></span>
			<span class="qodef-m-border-bottom"></span>
			<span class="qodef-m-border-left"></span>
		</div>
		<?php
	}
	?>
</a>
