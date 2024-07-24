<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'qi_blocks_button_get_holder_classes' ) ) {
	/**
	 * Function for generating add to cart button params
	 *
     * @param array $atts - options value
	 * 
	 * @return string
	 */
	function qi_blocks_button_get_holder_classes( $atts ) {
		$holder_classes[] = 'qi-block-button';
		$holder_classes[] = 'qodef-block';
		$holder_classes[] = 'qodef-m';
		$holder_classes[] = 'qodef-html--link';
		$holder_classes[] = ! empty( $atts['buttonLayout'] ) ? 'qodef-layout--' . $atts['buttonLayout'] : '';
		$holder_classes[] = ! empty( $atts['buttonType'] ) ? 'qodef-type--' . $atts['buttonType'] : '';
		$holder_classes[] = ! empty( $atts['buttonSize'] ) ? 'qodef-size--' . $atts['buttonSize'] : '';
		$holder_classes[] = ! empty( $atts['buttonRevealHover'] ) ? 'qodef-hover--reveal qodef--' . $atts['buttonRevealHover'] : '';
		$holder_classes[] = ! empty( $atts['buttonIconPosition'] ) ? 'qodef-icon--' . $atts['buttonIconPosition'] : '';
		$holder_classes[] = ! empty( $atts['buttonIconHoverMove'] ) ? 'qodef-hover--icon-' . $atts['buttonIconHoverMove'] : '';
		$holder_classes[] = ! empty( $atts['buttonIconBackgroundHoverReveal'] ) ? 'qodef-icon-background-hover--reveal qodef-icon-background-hover--' . $atts['buttonIconBackgroundHoverReveal'] : '';
		$holder_classes[] = ! empty( $atts['buttonInnerBorderHoverType'] ) ? 'qodef-inner-border-hover--' . $atts['buttonInnerBorderHoverType'] : '';
		$holder_classes[] = 'yes' === $atts['buttonUnderline'] ? 'qodef-text-underline' : '';
		$holder_classes[] = ! empty( $atts['buttonUnderlineAlignment'] ) ? 'qodef-underline--' . $atts['buttonUnderlineAlignment'] : '';
		$holder_classes[] = 'yes' === $atts['buttonUnderlineDraw'] ? 'qodef-button-underline-draw' : '';
		$holder_classes[] = ! empty( $atts['custom_class'] ) ? $atts['custom_class'] : '';

		return implode( ' ', $holder_classes );
	}
}

if ( ! function_exists( 'qi_blocks_button_get_icon_classes' ) ) {
	/**
	 * Function for generating add to cart button params
	 *
     * @param array $atts - options value
	 * 
	 * @return string
	 */
	function qi_blocks_button_get_icon_classes( $atts ) {
		$icon_classes[] = 'qodef-m-icon';
		$icon_classes[] = ! empty( $atts['buttonIconColor'] ) ? 'qodef--icon-color-set' : '';

		return implode( ' ', $icon_classes );
	}
}
