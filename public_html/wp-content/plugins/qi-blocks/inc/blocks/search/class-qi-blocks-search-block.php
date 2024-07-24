<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Qi_Blocks_Search_Block' ) ) {
	class Qi_Blocks_Search_Block extends Qi_Blocks_Blocks {
		private static $instance;

		public function __construct() {
			// Set block data.
			$this->set_block_name( 'search' );
			$this->set_block_title( esc_html__( 'Search', 'qi-blocks' ) );
			$this->set_block_subcategory( esc_html__( 'Content', 'qi-blocks' ) );
			$this->set_block_demo_url( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/search/#search' );
			$this->set_block_documentation( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#search' );

			$block_options = array(
				'render_callback' => array( $this, 'dynamic_render_callback' ),
				'attributes'      => array_merge(
					array(
						'uniqueClass'           => array(
							'type'    => 'string',
							'default' => '',
						),
						'blockContainerIds'     => array(
							'type'    => 'string',
							'default' => '',
						),
						'blockContainerData'    => array(
							'type'    => 'string',
							'default' => '',
						),
						'blockContainerClasses' => array(
							'type'    => 'string',
							'default' => '',
						),
					),
					qi_blocks_get_block_container_attributes(),
					array(
						'layout'                                  => array(
							'type'    => 'string',
							'default' => 'button-inline',
						),
						'showWidgetTitle'                         => array(
							'type'    => 'boolean',
							'default' => false,
						),
						'widgetTitle'                             => array(
							'type'    => 'string',
							'default' => '',
						),
						'widgetTitleTag'                          => array(
							'type'    => 'string',
							'default' => 'h5',
						),
						'inputPlaceholder'                        => array(
							'type'    => 'string',
							'default' => '',
						),
						'buttonType'                              => array(
							'type'    => 'string',
							'default' => 'text',
						),
						'buttonText'                              => array(
							'type'    => 'string',
							'default' => esc_html__( 'Search', 'qi-blocks' ),
						),
						'buttonIcon' => array(
							'type'    => 'object',
							'default' => array(
								'html' => qi_blocks_get_svg_icon( 'search' ),
							),
						),
						'spaceBetweenInputAndButton'              => array(
							'type'    => 'number',
							'default' => '',
						),
						'spaceBetweenInputAndButtonUnit'          => array(
							'type'    => 'string',
							'default' => 'px',
						),
						'spaceBetweenInputAndButtonDecimal'       => array(
							'type'    => 'number',
							'default' => '',
						),
						'spaceBetweenInputAndButtonTablet'        => array(
							'type'    => 'number',
							'default' => '',
						),
						'spaceBetweenInputAndButtonMobile'        => array(
							'type'    => 'number',
							'default' => '',
						),
						'spaceBetweenInputAndButtonUnitTablet'    => array(
							'type'    => 'string',
							'default' => 'px',
						),
						'spaceBetweenInputAndButtonUnitMobile'    => array(
							'type'    => 'string',
							'default' => 'px',
						),
						'spaceBetweenInputAndButtonDecimalTablet' => array(
							'type'    => 'number',
							'default' => '',
						),
						'spaceBetweenInputAndButtonDecimalMobile' => array(
							'type'    => 'number',
							'default' => '',
						),
						'titleFontSize'                           => array(
							'type'    => 'number',
							'default' => '',
						),
						'titleFontSizeUnit'                       => array(
							'type'    => 'string',
							'default' => 'px',
						),
						'titleFontSizeDecimal'                    => array(
							'type'    => 'number',
							'default' => '',
						),
						'titleFontSizeTablet'                     => array(
							'type'    => 'number',
							'default' => '',
						),
						'titleFontSizeMobile'                     => array(
							'type'    => 'number',
							'default' => '',
						),
						'titleFontSizeUnitTablet'                 => array(
							'type'    => 'string',
							'default' => 'px',
						),
						'titleFontSizeUnitMobile'                 => array(
							'type'    => 'string',
							'default' => 'px',
						),
						'titleFontSizeDecimalTablet'              => array(
							'type'    => 'number',
							'default' => '',
						),
						'titleFontSizeDecimalMobile'              => array(
							'type'    => 'number',
							'default' => '',
						),
						'titleFontWeight'                         => array(
							'type'    => 'string',
							'default' => '',
						),
						'titleTextTransform'                      => array(
							'type'    => 'string',
							'default' => '',
						),
						'titleFontStyle'                          => array(
							'type'    => 'string',
							'default' => '',
						),
						'titleTextDecoration'                     => array(
							'type'    => 'string',
							'default' => '',
						),
						'titleLineHeight'                         => array(
							'type'    => 'number',
							'default' => '',
						),
						'titleLineHeightUnit'                     => array(
							'type'    => 'string',
							'default' => 'px',
						),
						'titleLineHeightDecimal'                  => array(
							'type'    => 'number',
							'default' => '',
						),
						'titleLineHeightTablet'                   => array(
							'type'    => 'number',
							'default' => '',
						),
						'titleLineHeightMobile'                   => array(
							'type'    => 'number',
							'default' => '',
						),
						'titleLineHeightUnitTablet'               => array(
							'type'    => 'string',
							'default' => 'px',
						),
						'titleLineHeightUnitMobile'               => array(
							'type'    => 'string',
							'default' => 'px',
						),
						'titleLineHeightDecimalTablet'            => array(
							'type'    => 'number',
							'default' => '',
						),
						'titleLineHeightDecimalMobile'            => array(
							'type'    => 'number',
							'default' => '',
						),
						'titleLetterSpacing'                      => array(
							'type'    => 'number',
							'default' => '',
						),
						'titleLetterSpacingUnit'                  => array(
							'type'    => 'string',
							'default' => 'px',
						),
						'titleLetterSpacingDecimal'               => array(
							'type'    => 'number',
							'default' => '',
						),
						'titleLetterSpacingTablet'                => array(
							'type'    => 'number',
							'default' => '',
						),
						'titleLetterSpacingMobile'                => array(
							'type'    => 'number',
							'default' => '',
						),
						'titleLetterSpacingUnitTablet'            => array(
							'type'    => 'string',
							'default' => 'px',
						),
						'titleLetterSpacingUnitMobile'            => array(
							'type'    => 'string',
							'default' => 'px',
						),
						'titleLetterSpacingDecimalTablet'         => array(
							'type'    => 'number',
							'default' => '',
						),
						'titleLetterSpacingDecimalMobile'         => array(
							'type'    => 'number',
							'default' => '',
						),
						'titleMarginBottom'                       => array(
							'type'    => 'number',
							'default' => '',
						),
						'titleMarginBottomUnit'                   => array(
							'type'    => 'string',
							'default' => 'px',
						),
						'titleMarginBottomDecimal'                => array(
							'type'    => 'number',
							'default' => '',
						),
						'titleMarginBottomTablet'                 => array(
							'type'    => 'number',
							'default' => '',
						),
						'titleMarginBottomMobile'                 => array(
							'type'    => 'number',
							'default' => '',
						),
						'titleMarginBottomUnitTablet'             => array(
							'type'    => 'string',
							'default' => 'px',
						),
						'titleMarginBottomUnitMobile'             => array(
							'type'    => 'string',
							'default' => 'px',
						),
						'titleMarginBottomDecimalTablet'          => array(
							'type'    => 'number',
							'default' => '',
						),
						'titleMarginBottomDecimalMobile'          => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputColor'                              => array(
							'type'    => 'string',
							'default' => '',
						),
						'inputFocusColor'                         => array(
							'type'    => 'string',
							'default' => '',
						),
						'inputBackgroundColor'                    => array(
							'type'    => 'string',
							'default' => '',
						),
						'inputFocusBackgroundColor'               => array(
							'type'    => 'string',
							'default' => '',
						),
						'inputBorderColor'                        => array(
							'type'    => 'string',
							'default' => '',
						),
						'inputFocusBorderColor'                   => array(
							'type'    => 'string',
							'default' => '',
						),
					),
					qi_blocks_get_block_option_typography_attributes( 'input' ),
					qi_blocks_get_block_option_typography_attributes( 'inputFocus' ),
					array(
						'inputBorderStyle'                        => array(
							'type'    => 'string',
							'default' => '',
						),
						'inputBorderWidthTop'                     => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputBorderWidthTopTablet'               => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputBorderWidthTopMobile'               => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputBorderWidthRight'                   => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputBorderWidthRightTablet'             => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputBorderWidthRightMobile'             => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputBorderWidthBottom'                  => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputBorderWidthBottomTablet'            => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputBorderWidthBottomMobile'            => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputBorderWidthLeft'                    => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputBorderWidthLeftTablet'              => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputBorderWidthLeftMobile'              => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputBorderWidthUnit'                    => array(
							'type'    => 'string',
							'default' => 'px',
						),
						'inputBorderWidthUnitTablet'              => array(
							'type'    => 'string',
							'default' => 'px',
						),
						'inputBorderWidthUnitMobile'              => array(
							'type'    => 'string',
							'default' => 'px',
						),
						'inputBorderRadiusTop'                    => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputBorderRadiusTopTablet'              => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputBorderRadiusTopMobile'              => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputBorderRadiusTopDecimal'             => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputBorderRadiusTopDecimalTablet'       => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputBorderRadiusTopDecimalMobile'       => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputBorderRadiusRight'                  => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputBorderRadiusRightTablet'            => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputBorderRadiusRightMobile'            => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputBorderRadiusRightDecimal'           => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputBorderRadiusRightDecimalTablet'     => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputBorderRadiusRightDecimalMobile'     => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputBorderRadiusBottom'                 => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputBorderRadiusBottomTablet'           => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputBorderRadiusBottomMobile'           => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputBorderRadiusBottomDecimal'          => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputBorderRadiusBottomDecimalTablet'    => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputBorderRadiusBottomDecimalMobile'    => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputBorderRadiusLeft'                   => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputBorderRadiusLeftTablet'             => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputBorderRadiusLeftMobile'             => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputBorderRadiusLeftDecimal'            => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputBorderRadiusLeftDecimalTablet'      => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputBorderRadiusLeftDecimalMobile'      => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputBorderRadiusUnit'                   => array(
							'type'    => 'string',
							'default' => 'px',
						),
						'inputBorderRadiusUnitTablet'             => array(
							'type'    => 'string',
							'default' => 'px',
						),
						'inputBorderRadiusUnitMobile'             => array(
							'type'    => 'string',
							'default' => 'px',
						),
						'inputPaddingTop'                         => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputPaddingTopTablet'                   => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputPaddingTopMobile'                   => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputPaddingTopDecimal'                  => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputPaddingTopDecimalTablet'            => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputPaddingTopDecimalMobile'            => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputPaddingRight'                       => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputPaddingRightTablet'                 => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputPaddingRightMobile'                 => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputPaddingRightDecimal'                => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputPaddingRightDecimalTablet'          => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputPaddingRightDecimalMobile'          => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputPaddingBottom'                      => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputPaddingBottomTablet'                => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputPaddingBottomMobile'                => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputPaddingBottomDecimal'               => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputPaddingBottomDecimalTablet'         => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputPaddingBottomDecimalMobile'         => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputPaddingLeft'                        => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputPaddingLeftTablet'                  => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputPaddingLeftMobile'                  => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputPaddingLeftDecimal'                 => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputPaddingLeftDecimalTablet'           => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputPaddingLeftDecimalMobile'           => array(
							'type'    => 'number',
							'default' => '',
						),
						'inputPaddingUnit'                        => array(
							'type'    => 'string',
							'default' => 'px',
						),
						'inputPaddingUnitTablet'                  => array(
							'type'    => 'string',
							'default' => 'px',
						),
						'inputPaddingUnitMobile'                  => array(
							'type'    => 'string',
							'default' => 'px',
						),
						'buttonColor'                             => array(
							'type'    => 'string',
							'default' => '',
						),
						'buttonHoverColor'                        => array(
							'type'    => 'string',
							'default' => '',
						),
						'buttonBackgroundColor'                   => array(
							'type'    => 'string',
							'default' => '',
						),
						'buttonHoverBackgroundColor'              => array(
							'type'    => 'string',
							'default' => '',
						),
						'buttonBorderColor'                       => array(
							'type'    => 'string',
							'default' => '',
						),
						'buttonBorderHoverColor'                  => array(
							'type'    => 'string',
							'default' => '',
						),
					),
					qi_blocks_get_block_option_typography_attributes( 'button' ),
					qi_blocks_get_block_option_typography_attributes( 'buttonHover' ),
					array(
						'buttonBorderStyle'                       => array(
							'type'    => 'string',
							'default' => '',
						),
						'buttonBorderWidthTop'                    => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonBorderWidthTopTablet'              => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonBorderWidthTopMobile'              => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonBorderWidthRight'                  => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonBorderWidthRightTablet'            => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonBorderWidthRightMobile'            => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonBorderWidthBottom'                 => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonBorderWidthBottomTablet'           => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonBorderWidthBottomMobile'           => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonBorderWidthLeft'                   => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonBorderWidthLeftTablet'             => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonBorderWidthLeftMobile'             => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonBorderWidthUnit'                   => array(
							'type'    => 'string',
							'default' => 'px',
						),
						'buttonBorderWidthUnitTablet'             => array(
							'type'    => 'string',
							'default' => 'px',
						),
						'buttonBorderWidthUnitMobile'             => array(
							'type'    => 'string',
							'default' => 'px',
						),
						'buttonBorderRadiusTop'                   => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonBorderRadiusTopTablet'             => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonBorderRadiusTopMobile'             => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonBorderRadiusTopDecimal'            => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonBorderRadiusTopDecimalTablet'      => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonBorderRadiusTopDecimalMobile'      => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonBorderRadiusRight'                 => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonBorderRadiusRightTablet'           => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonBorderRadiusRightMobile'           => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonBorderRadiusRightDecimal'          => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonBorderRadiusRightDecimalTablet'    => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonBorderRadiusRightDecimalMobile'    => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonBorderRadiusBottom'                => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonBorderRadiusBottomTablet'          => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonBorderRadiusBottomMobile'          => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonBorderRadiusBottomDecimal'         => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonBorderRadiusBottomDecimalTablet'   => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonBorderRadiusBottomDecimalMobile'   => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonBorderRadiusLeft'                  => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonBorderRadiusLeftTablet'            => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonBorderRadiusLeftMobile'            => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonBorderRadiusLeftDecimal'           => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonBorderRadiusLeftDecimalTablet'     => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonBorderRadiusLeftDecimalMobile'     => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonBorderRadiusUnit'                  => array(
							'type'    => 'string',
							'default' => 'px',
						),
						'buttonBorderRadiusUnitTablet'            => array(
							'type'    => 'string',
							'default' => 'px',
						),
						'buttonBorderRadiusUnitMobile'            => array(
							'type'    => 'string',
							'default' => 'px',
						),
						'buttonPaddingTop'                        => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonPaddingTopTablet'                  => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonPaddingTopMobile'                  => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonPaddingTopDecimal'                 => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonPaddingTopDecimalTablet'           => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonPaddingTopDecimalMobile'           => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonPaddingRight'                      => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonPaddingRightTablet'                => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonPaddingRightMobile'                => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonPaddingRightDecimal'               => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonPaddingRightDecimalTablet'         => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonPaddingRightDecimalMobile'         => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonPaddingBottom'                     => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonPaddingBottomTablet'               => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonPaddingBottomMobile'               => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonPaddingBottomDecimal'              => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonPaddingBottomDecimalTablet'        => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonPaddingBottomDecimalMobile'        => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonPaddingLeft'                       => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonPaddingLeftTablet'                 => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonPaddingLeftMobile'                 => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonPaddingLeftDecimal'                => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonPaddingLeftDecimalTablet'          => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonPaddingLeftDecimalMobile'          => array(
							'type'    => 'number',
							'default' => '',
						),
						'buttonPaddingUnit'                       => array(
							'type'    => 'string',
							'default' => 'px',
						),
						'buttonPaddingUnitTablet'                 => array(
							'type'    => 'string',
							'default' => 'px',
						),
						'buttonPaddingUnitMobile'                 => array(
							'type'    => 'string',
							'default' => 'px',
						),
						'buttonFullWidth'                         => array(
							'type'    => 'boolean',
							'default' => false,
						),
					)
				),
			);

			$this->set_block_options( $block_options );

			parent::__construct();
		}

		/**
		 * Module class instance
		 *
		 * @return Qi_Blocks_Search_Block
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function dynamic_render_callback( $attributes ) {
			$html = '';

			$block_classes   = qi_blocks_get_block_holder_classes( 'search', $attributes );
			$block_classes[] = 'qodef-layout--' . esc_attr( $attributes['layout'] );
			$block_classes[] = 'qodef-button-type--' . esc_attr( $attributes['buttonType'] );
			$block_classes[] = $attributes['buttonFullWidth'] ? 'qodef-button--full-width' : '';

			$html .= '<div ' . qi_blocks_get_block_container_html_attributes_string( $attributes ) . '>';
			$html .= '<div class="' . implode( ' ', $block_classes ) . '">';

			if ( $attributes['showWidgetTitle'] && ! empty( $attributes['widgetTitle'] ) ) {
				$html .= '<div class="qodef-m-search-title-holder">';
				$html .= '<' . qi_blocks_escape_title_tag( $attributes['widgetTitleTag'] ) . ' class="qodef-m-search-title">';
				$html .= wp_kses_post( $attributes['widgetTitle'] );
				$html .= '</' . qi_blocks_escape_title_tag( $attributes['widgetTitleTag'] ) . '>';
				$html .= '</div>';
			}

			$html .= '<div class="qodef-m-search-form-holder">';
			$html .= '<form role="search" method="get" action="' . esc_url( get_home_url( '/' ) ) . '" class="qodef-m-search-form">';

			$html .= '<input type="search" class="qodef-m-search-input" name="s" placeholder="' . esc_attr( $attributes['inputPlaceholder'] ) . '" required/>';
			$html .= '<button type="submit" class="qodef-m-search-submit">';
			if ( 'text' === $attributes['buttonType'] ) {
				$html .= wp_kses_post( $attributes['buttonText'] );
			} elseif ( 'icon' === $attributes['buttonType'] && ! empty( $attributes['buttonIcon'] ) && ! empty( $attributes['buttonIcon']['html'] ) ) {
				$html .= $attributes['buttonIcon']['html'];
			}
			$html .= '</button>';

			$html .= '</form>';
			$html .= '</div>';

			$html .= '</div>';
			$html .= '</div>';

			return $html;
		}
	}

	Qi_Blocks_Search_Block::get_instance();
}
