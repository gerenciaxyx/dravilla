<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( ! function_exists( 'qi_blocks_get_blog_list_holder_classes' ) ) {
	/**
	 * Function that return element holder classes
	 *
	 * @param array $atts - options value
	 *
	 * @return string
	 */
	function qi_blocks_get_blog_list_holder_classes( $atts ) {
		$classes = qi_blocks_get_block_holder_classes( 'blog-list', $atts );

		if ( ! empty( $atts['itemLayout'] ) && 'standard' === $atts['itemLayout'] ) {
			$classes[] = 'qodef--list';
		}

		if ( ! empty( $atts['centerContent'] ) && 'yes' === $atts['centerContent'] ) {
			$classes[] = 'qodef-alignment--centered';
		}

		$classes[] = 'yes' !== $atts['showInfoIcons'] ? 'qodef-info-no-icons' : '';
		$classes[] = 'yes' === $atts['titleHoverUnderline'] ? 'qodef-title--hover-underline' : '';
		$classes[] = ! empty( $atts['imageHover'] ) ? 'qodef-image--hover-' . $atts['imageHover'] : '';
		$classes[] = ! empty( $atts['imageZoomOrigin'] ) ? 'qodef-image--hover-from-' . $atts['imageZoomOrigin'] : '';
		$classes[] = ( 'yes' === $atts['reverseColumns'] && 'side-image' === $atts['itemLayout'] ) ? 'qodef-reverse-columns' : '';
		$classes[] = ! empty( $atts['itemLayout'] ) ? 'qodef-item-layout--' . $atts['itemLayout'] : '';

		if ( 'columns' === $atts['behavior'] ) {
			$classes[] = 'qodef-gutenberg-section';
			$classes[] = 'qodef--columns';
			$classes[] = ! empty( $atts['columns'] ) ? 'qodef-col-num--' . $atts['columns'] : '';
			$classes[] = ! empty( $atts['columnsGap'] ) ? 'qodef-gutter--' . $atts['columnsGap'] : '';
			$classes[] = ! empty( $atts['columnsResponsive'] ) ? 'qodef-responsive--' . $atts['columnsResponsive'] : '';
			$classes[] = ( 'custom' === $atts['columnsResponsive'] && ! empty( $atts['columns1440'] ) ) ? 'qodef-col-num--1440--' . $atts['columns1440'] : '';
			$classes[] = ( 'custom' === $atts['columnsResponsive'] && ! empty( $atts['columns1366'] ) ) ? 'qodef-col-num--1366--' . $atts['columns1366'] : '';
			$classes[] = ( 'custom' === $atts['columnsResponsive'] && ! empty( $atts['columns1024'] ) ) ? 'qodef-col-num--1024--' . $atts['columns1024'] : '';
			$classes[] = ( 'custom' === $atts['columnsResponsive'] && ! empty( $atts['columns768'] ) ) ? 'qodef-col-num--768--' . $atts['columns768'] : '';
			$classes[] = ( 'custom' === $atts['columnsResponsive'] && ! empty( $atts['columns680'] ) ) ? 'qodef-col-num--680--' . $atts['columns680'] : '';
			$classes[] = ( 'custom' === $atts['columnsResponsive'] && ! empty( $atts['columns480'] ) ) ? 'qodef-col-num--480--' . $atts['columns480'] : '';
		}

		return implode( ' ', $classes );
	}
}

if ( ! function_exists( 'qi_blocks_get_blog_list_masonry_classes' ) ) {
	/**
	 * Function that return element masonry classes
	 *
	 * @param array $atts - options value
	 *
	 * @return string
	 */
	function qi_blocks_get_blog_list_masonry_classes( $atts ) {
		$classes = array(
			'qodef-gutenberg-section',
			'qodef-gutenberg-masonry-layout',
			'qodef--masonry',
			'qodef-row--no-bottom-space',
		);

		$classes[] = ! empty( $atts['columns'] ) ? 'qodef-col-num--' . $atts['columns'] : '';
		$classes[] = ! empty( $atts['columnsGap'] ) ? 'qodef-gutter--' . $atts['columnsGap'] : '';
		$classes[] = ! empty( $atts['columnsResponsive'] ) ? 'qodef-responsive--' . $atts['columnsResponsive'] : '';
		$classes[] = ( 'custom' === $atts['columnsResponsive'] && ! empty( $atts['columns1440'] ) ) ? 'qodef-col-num--1440--' . $atts['columns1440'] : '';
		$classes[] = ( 'custom' === $atts['columnsResponsive'] && ! empty( $atts['columns1366'] ) ) ? 'qodef-col-num--1366--' . $atts['columns1366'] : '';
		$classes[] = ( 'custom' === $atts['columnsResponsive'] && ! empty( $atts['columns1024'] ) ) ? 'qodef-col-num--1024--' . $atts['columns1024'] : '';
		$classes[] = ( 'custom' === $atts['columnsResponsive'] && ! empty( $atts['columns768'] ) ) ? 'qodef-col-num--768--' . $atts['columns768'] : '';
		$classes[] = ( 'custom' === $atts['columnsResponsive'] && ! empty( $atts['columns680'] ) ) ? 'qodef-col-num--680--' . $atts['columns680'] : '';
		$classes[] = ( 'custom' === $atts['columnsResponsive'] && ! empty( $atts['columns480'] ) ) ? 'qodef-col-num--480--' . $atts['columns480'] : '';

		return implode( ' ', $classes );
	}
}

if ( ! function_exists( 'qi_blocks_get_post_image' ) ) {
	/**
	 * Function that return post image
	 *
	 * @param int $post_id
	 * @param string $images_proportion
	 * @param int $custom_image_width
	 * @param int $custom_image_height
	 *
	 * @return string
	 */
	function qi_blocks_get_post_image( $post_id, $images_proportion, $custom_image_width, $custom_image_height ) {
		$image_id = apply_filters( 'qi_blocks_filter_get_post_image_id', get_post_thumbnail_id(), $post_id );

		return qi_blocks_get_list_block_item_image( $images_proportion, $image_id, intval( $custom_image_width ), intval( $custom_image_height ) );
	}
}
