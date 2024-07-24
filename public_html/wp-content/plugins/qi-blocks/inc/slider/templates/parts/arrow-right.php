<?php
// phpcs:ignore WordPress.NamingConventions.ValidVariableName.VariableNotSnakeCase
$icon = ! empty( $navigationNextIcon ) ? $navigationNextIcon : '';

if ( ! empty( $icon['html'] ) ) {
	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo qi_blocks_get_svg_icon_content( $icon['html'] );
} else {
	?>
	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 34.2 32.3" xml:space="preserve" style="stroke-width: 2;"><line x1="0" y1="16" x2="33" y2="16"/><line x1="17.3" y1="0.7" x2="33.2" y2="16.5"/><line x1="17.3" y1="31.6" x2="33.5" y2="15.4"/></svg>	<?php
}

