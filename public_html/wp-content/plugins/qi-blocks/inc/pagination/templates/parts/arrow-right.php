<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

// phpcs:ignore WordPress.NamingConventions.ValidVariableName.VariableNotSnakeCase
$icon = ! empty( $paginationArrowNextIcon ) && isset( $paginationArrowNextIcon['html'] ) ? $paginationArrowNextIcon['html'] : '';

if ( ! empty( $icon ) ) {
	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo qi_blocks_get_svg_icon_content( $icon );
} else {
	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo qi_blocks_get_svg_icon( 'icon-arrow-right', 'qodef-m-pagination-icon' );
}
