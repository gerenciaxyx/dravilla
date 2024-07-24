<a <?php qi_blocks_class_attribute( $button_classes ); ?> href="<?php echo esc_url( $button_link['url'] ); ?>" <?php qi_blocks_inline_attrs( $data_attrs ); ?>>
	<span class="qodef-m-text"><?php echo esc_html( $buttonText ); // phpcs:ignore WordPress.NamingConventions.ValidVariableName.VariableNotSnakeCase ?></span>
	<?php
	// phpcs:ignore WordPress.NamingConventions.ValidVariableName.VariableNotSnakeCase
	if ( 'yes' === $buttonIconEnableSideBorder ) {
		?>
		<span class="qodef-m-border"></span>
		<?php
	}
	qi_blocks_template_part( 'blocks/button', 'templates/parts/icon', '', $params );
	?>
</a>
