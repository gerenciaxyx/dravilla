<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( ! function_exists( 'qi_blocks_register_slider_3rd_party_scripts' ) ) {
	/**
	 * Function that set additional 3rd party scripts
	 */
	function qi_blocks_register_slider_3rd_party_scripts() {
		$general_options = get_option( QI_BLOCKS_GENERAL_OPTIONS, array() );
		$swiper_version  = ! empty( $general_options ) && isset( $general_options['swiper_library'] ) ? '8.4.5' : '5.4.5';

		// Register swiper scripts.
		wp_register_style( 'swiper', QI_BLOCKS_INC_URL_PATH . '/slider/assets/plugins/' . esc_attr( $swiper_version ) . '/swiper.min.css', array(), $swiper_version );
		wp_register_script( 'swiper', QI_BLOCKS_INC_URL_PATH . '/slider/assets/plugins/' . esc_attr( $swiper_version ) . '/swiper.min.js', array( 'jquery' ), $swiper_version, true );
	}

	add_action( 'qi_blocks_action_additional_3rd_party_scripts', 'qi_blocks_register_slider_3rd_party_scripts' );
}

if ( ! function_exists( 'qi_blocks_set_slider_style_as_block_style_dependency' ) ) {
	/**
	 * Function that set additional 3rd party scripts as block style dependency
	 *
	 * @param $style_dependency array
	 *
	 * @return array
	 */
	function qi_blocks_set_slider_style_as_block_style_dependency( $style_dependency ) {

		if ( is_admin() ) {
			$style_dependency[] = 'swiper';
		}

		return $style_dependency;
	}

	// permission 5 is set in order to be before main plugins style.
	add_filter( 'qi_blocks_filter_block_style_dependency', 'qi_blocks_set_slider_style_as_block_style_dependency', 5 );
}

if ( ! function_exists( 'qi_blocks_get_block_slider_attributes' ) ) {
	/**
	 * Function that return block slider attributes
	 *
	 * @param array $excluded_attributes
	 *
	 * @return array
	 */
	function qi_blocks_get_block_slider_attributes( $excluded_attributes = array() ) {
		$attributes = array(
			'sliderDirection'                       => array(
				'type'    => 'string',
				'default' => 'horizontal',
			),
			'sliderColumns'                         => array(
				'type'    => 'number',
				'default' => 1,
			),
			'sliderColumnsResponsive'               => array(
				'type'    => 'string',
				'default' => 'predefined',
			),
			'sliderColumns1440'                     => array(
				'type'    => 'number',
				'default' => '',
			),
			'sliderColumns1366'                     => array(
				'type'    => 'number',
				'default' => '',
			),
			'sliderColumns1024'                     => array(
				'type'    => 'number',
				'default' => '',
			),
			'sliderColumns768'                      => array(
				'type'    => 'number',
				'default' => '',
			),
			'sliderColumns680'                      => array(
				'type'    => 'number',
				'default' => '',
			),
			'sliderColumns480'                      => array(
				'type'    => 'number',
				'default' => '',
			),
			'sliderSpace'                           => array(
				'type'    => 'number',
				'default' => '',
			),
			'sliderSpaceTablet'                     => array(
				'type'    => 'number',
				'default' => '',
			),
			'sliderSpaceMobile'                     => array(
				'type'    => 'number',
				'default' => '',
			),
			'sliderLoop'                            => array(
				'type'    => 'string',
				'default' => 'yes',
			),
			'sliderAutoplay'                        => array(
				'type'    => 'string',
				'default' => 'yes',
			),
			'sliderCentered'                        => array(
				'type'    => 'string',
				'default' => 'no',
			),
			'sliderZoomCenteredSlide'               => array(
				'type'    => 'string',
				'default' => 'no',
			),
			'sliderPartialColumns'                  => array(
				'type'    => 'string',
				'default' => 'no',
			),
			'sliderPartialColumnsValue'             => array(
				'type'    => 'number',
				'default' => 0.1,
			),
			'sliderPartialColumnsResponsiveDisable' => array(
				'type'    => 'string',
				'default' => '',
			),
			'sliderDragging'                        => array(
				'type'    => 'string',
				'default' => 'yes',
			),
			'sliderSpeed'                           => array(
				'type'    => 'string',
				'default' => '',
			),
			'sliderSpeedAnimation'                  => array(
				'type'    => 'string',
				'default' => '',
			),
			'sliderNavigation'                      => array(
				'type'    => 'string',
				'default' => '',
			),
			'sliderNavigationPosition'              => array(
				'type'    => 'string',
				'default' => 'inside',
			),
			'sliderHideNavigation'                  => array(
				'type'    => 'string',
				'default' => '',
			),
			'sliderNavigationAlignment'             => array(
				'type'    => 'string',
				'default' => '',
			),
			'sliderNavigationVerticalPosition'      => array(
				'type'    => 'string',
				'default' => 'bottom',
			),
			'sliderPagination'                      => array(
				'type'    => 'string',
				'default' => '',
			),
			'sliderPaginationPosition'              => array(
				'type'    => 'string',
				'default' => 'inside',
			),
			'sliderHeight'                          => array(
				'type'    => 'number',
				'default' => '',
			),
			'sliderHeightUnit'                      => array(
				'type'    => 'string',
				'default' => 'px',
			),
			'sliderHeightDecimal'                   => array(
				'type'    => 'number',
				'default' => '',
			),
			'sliderHeightTablet'                    => array(
				'type'    => 'number',
				'default' => '',
			),
			'sliderHeightMobile'                    => array(
				'type'    => 'number',
				'default' => '',
			),
			'sliderHeightUnitTablet'                => array(
				'type'    => 'string',
				'default' => 'px',
			),
			'sliderHeightUnitMobile'                => array(
				'type'    => 'string',
				'default' => 'px',
			),
			'sliderHeightDecimalTablet'             => array(
				'type'    => 'number',
				'default' => '',
			),
			'sliderHeightDecimalMobile'             => array(
				'type'    => 'number',
				'default' => '',
			),
		);

		if ( ! empty( $excluded_attributes ) ) {
			foreach ( $excluded_attributes as $excluded_attribute ) {
				if ( array_key_exists( $excluded_attribute, $attributes ) ) {
					unset( $attributes[ $excluded_attribute ] );
				}
			}
		}

		return $attributes;
	}
}

if ( ! function_exists( 'qi_blocks_get_block_slider_navigation_attributes' ) ) {
	/**
	 * Function that return block slider navigation attributes
	 *
	 * @param array $excluded_attributes
	 *
	 * @return array
	 */
	function qi_blocks_get_block_slider_navigation_attributes( $excluded_attributes = array() ) {
		$attributes = array_merge(
			array(
				'navigationTogetherHolderBackgroundColor'         => array(
					'type'    => 'string',
					'default' => '',
				),
				'navigationInitialArrowColor'                     => array(
					'type'    => 'string',
					'default' => '',
				),
				'navigationInitialArrowBackgroundColor'           => array(
					'type'    => 'string',
					'default' => '',
				),
				'navigationHoverArrowColor'                       => array(
					'type'    => 'string',
					'default' => '',
				),
				'navigationHoverArrowBackgroundColor'             => array(
					'type'    => 'string',
					'default' => '',
				),
				'navigationHoverArrowMove'                        => array(
					'type'    => 'boolean',
					'default' => true,
				),
				'navigationVerticalOffset'                        => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationVerticalOffsetUnit'                    => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'navigationVerticalOffsetDecimal'                 => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationVerticalOffsetTablet'                  => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationVerticalOffsetMobile'                  => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationVerticalOffsetUnitTablet'              => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'navigationVerticalOffsetUnitMobile'              => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'navigationVerticalOffsetDecimalTablet'           => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationVerticalOffsetDecimalMobile'           => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationHorizontalOffset'                      => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationHorizontalOffsetUnit'                  => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'navigationHorizontalOffsetDecimal'               => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationHorizontalOffsetTablet'                => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationHorizontalOffsetMobile'                => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationHorizontalOffsetUnitTablet'            => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'navigationHorizontalOffsetUnitMobile'            => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'navigationHorizontalOffsetDecimalTablet'         => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationHorizontalOffsetDecimalMobile'         => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationTogetherSpaceBetween'                  => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationTogetherSpaceBetweenUnit'              => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'navigationTogetherSpaceBetweenDecimal'           => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationTogetherSpaceBetweenTablet'            => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationTogetherSpaceBetweenMobile'            => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationTogetherSpaceBetweenUnitTablet'        => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'navigationTogetherSpaceBetweenUnitMobile'        => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'navigationTogetherSpaceBetweenDecimalTablet'     => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationTogetherSpaceBetweenDecimalMobile'     => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationTogetherMarginTop'                     => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationTogetherMarginTopUnit'                 => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'navigationTogetherMarginTopDecimal'              => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationTogetherMarginTopTablet'               => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationTogetherMarginTopMobile'               => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationTogetherMarginTopUnitTablet'           => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'navigationTogetherMarginTopUnitMobile'           => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'navigationTogetherMarginTopDecimalTablet'        => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationTogetherMarginTopDecimalMobile'        => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationTogetherHorizontalOffset'              => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationTogetherHorizontalOffsetUnit'          => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'navigationTogetherHorizontalOffsetDecimal'       => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationTogetherHorizontalOffsetTablet'        => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationTogetherHorizontalOffsetMobile'        => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationTogetherHorizontalOffsetUnitTablet'    => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'navigationTogetherHorizontalOffsetUnitMobile'    => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'navigationTogetherHorizontalOffsetDecimalTablet' => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationTogetherHorizontalOffsetDecimalMobile' => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationTogetherHolderWidth'                   => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationTogetherHolderWidthUnit'               => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'navigationTogetherHolderWidthDecimal'            => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationTogetherHolderWidthTablet'             => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationTogetherHolderWidthMobile'             => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationTogetherHolderWidthUnitTablet'         => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'navigationTogetherHolderWidthUnitMobile'         => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'navigationTogetherHolderWidthDecimalTablet'      => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationTogetherHolderWidthDecimalMobile'      => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationTogetherHolderHeight'                  => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationTogetherHolderHeightUnit'              => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'navigationTogetherHolderHeightDecimal'           => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationTogetherHolderHeightTablet'            => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationTogetherHolderHeightMobile'            => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationTogetherHolderHeightUnitTablet'        => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'navigationTogetherHolderHeightUnitMobile'        => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'navigationTogetherHolderHeightDecimalTablet'     => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationTogetherHolderHeightDecimalMobile'     => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationBorderStyle'                           => array(
					'type'    => 'string',
					'default' => '',
				),
				'navigationBorderColor'                           => array(
					'type'    => 'string',
					'default' => '',
				),
				'navigationBorderWidthTop'                        => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationBorderWidthTopTablet'                  => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationBorderWidthTopMobile'                  => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationBorderWidthRight'                      => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationBorderWidthRightTablet'                => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationBorderWidthRightMobile'                => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationBorderWidthBottom'                     => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationBorderWidthBottomTablet'               => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationBorderWidthBottomMobile'               => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationBorderWidthLeft'                       => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationBorderWidthLeftTablet'                 => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationBorderWidthLeftMobile'                 => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationBorderWidthUnit'                       => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'navigationBorderWidthUnitTablet'                 => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'navigationBorderWidthUnitMobile'                 => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'navigationBorderRadiusTop'                       => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationBorderRadiusTopTablet'                 => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationBorderRadiusTopMobile'                 => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationBorderRadiusTopDecimal'                => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationBorderRadiusTopDecimalTablet'          => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationBorderRadiusTopDecimalMobile'          => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationBorderRadiusRight'                     => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationBorderRadiusRightTablet'               => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationBorderRadiusRightMobile'               => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationBorderRadiusRightDecimal'              => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationBorderRadiusRightDecimalTablet'        => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationBorderRadiusRightDecimalMobile'        => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationBorderRadiusBottom'                    => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationBorderRadiusBottomTablet'              => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationBorderRadiusBottomMobile'              => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationBorderRadiusBottomDecimal'             => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationBorderRadiusBottomDecimalTablet'       => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationBorderRadiusBottomDecimalMobile'       => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationBorderRadiusLeft'                      => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationBorderRadiusLeftTablet'                => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationBorderRadiusLeftMobile'                => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationBorderRadiusLeftDecimal'               => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationBorderRadiusLeftDecimalTablet'         => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationBorderRadiusLeftDecimalMobile'         => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationBorderRadiusUnit'                      => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'navigationBorderRadiusUnitTablet'                => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'navigationBorderRadiusUnitMobile'                => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'navigationArrowSize'                             => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationArrowSizeUnit'                         => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'navigationArrowSizeDecimal'                      => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationArrowSizeTablet'                       => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationArrowSizeMobile'                       => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationArrowSizeUnitTablet'                   => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'navigationArrowSizeUnitMobile'                   => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'navigationArrowSizeDecimalTablet'                => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationArrowSizeDecimalMobile'                => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationArrowHolderWidth'                      => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationArrowHolderWidthUnit'                  => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'navigationArrowHolderWidthDecimal'               => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationArrowHolderWidthTablet'                => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationArrowHolderWidthMobile'                => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationArrowHolderWidthUnitTablet'            => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'navigationArrowHolderWidthUnitMobile'            => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'navigationArrowHolderWidthDecimalTablet'         => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationArrowHolderWidthDecimalMobile'         => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationArrowHolderHeight'                     => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationArrowHolderHeightUnit'                 => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'navigationArrowHolderHeightDecimal'              => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationArrowHolderHeightTablet'               => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationArrowHolderHeightMobile'               => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationArrowHolderHeightUnitTablet'           => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'navigationArrowHolderHeightUnitMobile'           => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'navigationArrowHolderHeightDecimalTablet'        => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationArrowHolderHeightDecimalMobile'        => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationPrevIcon'                              => array(
					'type'    => 'object',
					'default' => array(
						'html' => '',
					),
				),
				'navigationPrevIconColor'                         => array(
					'type'    => 'string',
					'default' => '',
				),
				'navigationPrevIconFontSize'                      => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationPrevIconFontSizeUnit'                  => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'navigationPrevIconFontSizeDecimal'               => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationPrevIconFontSizeTablet'                => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationPrevIconFontSizeMobile'                => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationPrevIconFontSizeUnitTablet'            => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'navigationPrevIconFontSizeUnitMobile'            => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'navigationPrevIconFontSizeDecimalTablet'         => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationPrevIconFontSizeDecimalMobile'         => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationNextIcon'                              => array(
					'type'    => 'object',
					'default' => array(
						'html' => '',
					),
				),
				'navigationNextIconColor'                         => array(
					'type'    => 'string',
					'default' => '',
				),
				'navigationNextIconFontSize'                      => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationNextIconFontSizeUnit'                  => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'navigationNextIconFontSizeDecimal'               => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationNextIconFontSizeTablet'                => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationNextIconFontSizeMobile'                => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationNextIconFontSizeUnitTablet'            => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'navigationNextIconFontSizeUnitMobile'            => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'navigationNextIconFontSizeDecimalTablet'         => array(
					'type'    => 'number',
					'default' => '',
				),
				'navigationNextIconFontSizeDecimalMobile'         => array(
					'type'    => 'number',
					'default' => '',
				),
			)
		);

		if ( ! empty( $excluded_attributes ) ) {
			foreach ( $excluded_attributes as $excluded_attribute ) {
				if ( array_key_exists( $excluded_attribute, $attributes ) ) {
					unset( $attributes[ $excluded_attribute ] );
				}
			}
		}

		return $attributes;
	}
}

if ( ! function_exists( 'qi_blocks_get_block_slider_pagination_attributes' ) ) {
	/**
	 * Function that return block slider pagination attributes
	 *
	 * @param array $excluded_attributes
	 *
	 * @return array
	 */
	function qi_blocks_get_block_slider_pagination_attributes( $excluded_attributes = array() ) {
		$attributes = array_merge(
			array(
				'paginationAlignment'                            => array(
					'type'    => 'string',
					'default' => '',
				),
				'paginationEnableNumbers'                        => array(
					'type'    => 'boolean',
					'default' => false,
				),
				'paginationNumbersColor'                         => array(
					'type'    => 'string',
					'default' => '',
				),
				'paginationInitialBulletColor'                   => array(
					'type'    => 'string',
					'default' => '',
				),
				'paginationInitialBulletBorderType'              => array(
					'type'    => 'string',
					'default' => '',
				),
				'paginationInitialBulletBorderColor'             => array(
					'type'    => 'string',
					'default' => '',
				),
				'paginationHoverBulletColor'                     => array(
					'type'    => 'string',
					'default' => '',
				),
				'paginationHoverBulletBorderType'                => array(
					'type'    => 'string',
					'default' => '',
				),
				'paginationHoverBulletBorderColor'               => array(
					'type'    => 'string',
					'default' => '',
				),
				'paginationOffset'                               => array(
					'type'    => 'number',
					'default' => '',
				),
				'paginationOffsetUnit'                           => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'paginationOffsetDecimal'                        => array(
					'type'    => 'number',
					'default' => '',
				),
				'paginationOffsetTablet'                         => array(
					'type'    => 'number',
					'default' => '',
				),
				'paginationOffsetMobile'                         => array(
					'type'    => 'number',
					'default' => '',
				),
				'paginationOffsetUnitTablet'                     => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'paginationOffsetUnitMobile'                     => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'paginationOffsetDecimalTablet'                  => array(
					'type'    => 'number',
					'default' => '',
				),
				'paginationOffsetDecimalMobile'                  => array(
					'type'    => 'number',
					'default' => '',
				),
				'paginationBulletsSpaceBetween'                  => array(
					'type'    => 'number',
					'default' => '',
				),
				'paginationBulletsSpaceBetweenUnit'              => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'paginationBulletsSpaceBetweenDecimal'           => array(
					'type'    => 'number',
					'default' => '',
				),
				'paginationBulletsSpaceBetweenTablet'            => array(
					'type'    => 'number',
					'default' => '',
				),
				'paginationBulletsSpaceBetweenMobile'            => array(
					'type'    => 'number',
					'default' => '',
				),
				'paginationBulletsSpaceBetweenUnitTablet'        => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'paginationBulletsSpaceBetweenUnitMobile'        => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'paginationBulletsSpaceBetweenDecimalTablet'     => array(
					'type'    => 'number',
					'default' => '',
				),
				'paginationBulletsSpaceBetweenDecimalMobile'     => array(
					'type'    => 'number',
					'default' => '',
				),
				'paginationBulletsSize'                          => array(
					'type'    => 'number',
					'default' => '',
				),
				'paginationBulletsSizeUnit'                      => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'paginationBulletsSizeDecimal'                   => array(
					'type'    => 'number',
					'default' => '',
				),
				'paginationBulletsSizeTablet'                    => array(
					'type'    => 'number',
					'default' => '',
				),
				'paginationBulletsSizeMobile'                    => array(
					'type'    => 'number',
					'default' => '',
				),
				'paginationBulletsSizeUnitTablet'                => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'paginationBulletsSizeUnitMobile'                => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'paginationBulletsSizeDecimalTablet'             => array(
					'type'    => 'number',
					'default' => '',
				),
				'paginationBulletsSizeDecimalMobile'             => array(
					'type'    => 'number',
					'default' => '',
				),
			),
			qi_blocks_get_block_option_typography_attributes( 'paginationNumbers' ),
			array(
				'paginationInitialBulletBorderWidthTop'          => array(
					'type'    => 'number',
					'default' => '',
				),
				'paginationInitialBulletBorderWidthTopTablet'    => array(
					'type'    => 'number',
					'default' => '',
				),
				'paginationInitialBulletBorderWidthTopMobile'    => array(
					'type'    => 'number',
					'default' => '',
				),
				'paginationInitialBulletBorderWidthRight'        => array(
					'type'    => 'number',
					'default' => '',
				),
				'paginationInitialBulletBorderWidthRightTablet'  => array(
					'type'    => 'number',
					'default' => '',
				),
				'paginationInitialBulletBorderWidthRightMobile'  => array(
					'type'    => 'number',
					'default' => '',
				),
				'paginationInitialBulletBorderWidthBottom'       => array(
					'type'    => 'number',
					'default' => '',
				),
				'paginationInitialBulletBorderWidthBottomTablet' => array(
					'type'    => 'number',
					'default' => '',
				),
				'paginationInitialBulletBorderWidthBottomMobile' => array(
					'type'    => 'number',
					'default' => '',
				),
				'paginationInitialBulletBorderWidthLeft'         => array(
					'type'    => 'number',
					'default' => '',
				),
				'paginationInitialBulletBorderWidthLeftTablet'   => array(
					'type'    => 'number',
					'default' => '',
				),
				'paginationInitialBulletBorderWidthLeftMobile'   => array(
					'type'    => 'number',
					'default' => '',
				),
				'paginationInitialBulletBorderWidthUnit'         => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'paginationInitialBulletBorderWidthUnitTablet'   => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'paginationInitialBulletBorderWidthUnitMobile'   => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'paginationHoverBulletBorderWidthTop'            => array(
					'type'    => 'number',
					'default' => '',
				),
				'paginationHoverBulletBorderWidthTopTablet'      => array(
					'type'    => 'number',
					'default' => '',
				),
				'paginationHoverBulletBorderWidthTopMobile'      => array(
					'type'    => 'number',
					'default' => '',
				),
				'paginationHoverBulletBorderWidthRight'          => array(
					'type'    => 'number',
					'default' => '',
				),
				'paginationHoverBulletBorderWidthRightTablet'    => array(
					'type'    => 'number',
					'default' => '',
				),
				'paginationHoverBulletBorderWidthRightMobile'    => array(
					'type'    => 'number',
					'default' => '',
				),
				'paginationHoverBulletBorderWidthBottom'         => array(
					'type'    => 'number',
					'default' => '',
				),
				'paginationHoverBulletBorderWidthBottomTablet'   => array(
					'type'    => 'number',
					'default' => '',
				),
				'paginationHoverBulletBorderWidthBottomMobile'   => array(
					'type'    => 'number',
					'default' => '',
				),
				'paginationHoverBulletBorderWidthLeft'           => array(
					'type'    => 'number',
					'default' => '',
				),
				'paginationHoverBulletBorderWidthLeftTablet'     => array(
					'type'    => 'number',
					'default' => '',
				),
				'paginationHoverBulletBorderWidthLeftMobile'     => array(
					'type'    => 'number',
					'default' => '',
				),
				'paginationHoverBulletBorderWidthUnit'           => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'paginationHoverBulletBorderWidthUnitTablet'     => array(
					'type'    => 'string',
					'default' => 'px',
				),
				'paginationHoverBulletBorderWidthUnitMobile'     => array(
					'type'    => 'string',
					'default' => 'px',
				),
			)
		);

		if ( ! empty( $excluded_attributes ) ) {
			foreach ( $excluded_attributes as $excluded_attribute ) {
				if ( array_key_exists( $excluded_attribute, $attributes ) ) {
					unset( $attributes[ $excluded_attribute ] );
				}
			}
		}

		return $attributes;
	}
}
