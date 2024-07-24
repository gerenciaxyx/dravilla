<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Qi_Blocks_Contact_Form_7_Block' ) ) {
	class Qi_Blocks_Contact_Form_7_Block extends Qi_Blocks_Blocks {
		private static $instance;

		public function __construct() {
			// Set block data.
			$this->set_block_name( 'contact-form-7' );
			$this->set_block_title( esc_html__( 'Contact Form 7', 'qi-blocks' ) );
			$this->set_block_subcategory( esc_html__( 'Form Style', 'qi-blocks' ) );
			$this->set_block_demo_url( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/contact-form-7/' );
			$this->set_block_documentation( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#contact_form_7' );
			$this->set_block_video( 'https://www.youtube.com/watch?v=bAec78xnY7Q' );

			$block_options = array(
				'render_callback' => array( $this, 'dynamic_render_callback' ),
				'attributes'      => array_merge(
					array(
						'uniqueClass' => array(
							'type' => 'string',
							'default' => '',
						),
						'blockContainerIds' => array(
							'type'    => 'string',
							'default' => '',
						),
						'blockContainerData' => array(
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
						'formHTML' => array(
							'type' => 'string',
							'default' => '',
						),
						'allContactForms' => array(
							'type' => 'array',
							'default' => array(
							),
						),
						'contactFormID' => array(
							'type' => 'string',
							'default' => '',
						),
						'labelColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'inputColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'inputFocusColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'inputBackgroundColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'inputFocusBackgroundColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'inputBorderColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'inputFocusBorderColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'inputBoxShadowColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'inputBoxShadowHorizontal' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputBoxShadowVertical' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputBoxShadowBlur' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputBoxShadowSpread' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputBoxShadowPosition' => array(
							'type' => 'string',
							'default' => '',
						),
						'inputFocusBoxShadowColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'inputFocusBoxShadowHorizontal' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputFocusBoxShadowVertical' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputFocusBoxShadowBlur' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputFocusBoxShadowSpread' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputFocusBoxShadowPosition' => array(
							'type' => 'string',
							'default' => '',
						),
						'buttonColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'buttonHoverColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'buttonBackgroundColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'buttonHoverBackgroundColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'buttonBorderColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'buttonHoverBorderColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'buttonBoxShadowColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'buttonBoxShadowHorizontal' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonBoxShadowVertical' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonBoxShadowBlur' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonBoxShadowSpread' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonBoxShadowPosition' => array(
							'type' => 'string',
							'default' => '',
						),
						'buttonFullWidth' => array(
							'type' => 'boolean',
							'default' => false,
						),
						'errorColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'responseColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'sentBorderColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'failedBorderColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'spamBorderColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'invalidBorderColor' => array(
							'type' => 'string',
							'default' => '',
						),
					),
					qi_blocks_get_block_option_typography_attributes( 'label' ),
					qi_blocks_get_block_option_typography_attributes( 'input' ),
					qi_blocks_get_block_option_typography_attributes( 'inputFocus' ),
					array(
						'inputBorderStyle' => array(
							'type' => 'string',
							'default' => '',
						),
						'inputBorderWidthTop' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputBorderWidthTopTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputBorderWidthTopMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputBorderWidthRight' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputBorderWidthRightTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputBorderWidthRightMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputBorderWidthBottom' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputBorderWidthBottomTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputBorderWidthBottomMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputBorderWidthLeft' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputBorderWidthLeftTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputBorderWidthLeftMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputBorderWidthUnit' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'inputBorderWidthUnitTablet' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'inputBorderWidthUnitMobile' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'inputBorderRadiusTop' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputBorderRadiusTopTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputBorderRadiusTopMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputBorderRadiusTopDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputBorderRadiusTopDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputBorderRadiusTopDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputBorderRadiusRight' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputBorderRadiusRightTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputBorderRadiusRightMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputBorderRadiusRightDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputBorderRadiusRightDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputBorderRadiusRightDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputBorderRadiusBottom' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputBorderRadiusBottomTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputBorderRadiusBottomMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputBorderRadiusBottomDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputBorderRadiusBottomDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputBorderRadiusBottomDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputBorderRadiusLeft' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputBorderRadiusLeftTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputBorderRadiusLeftMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputBorderRadiusLeftDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputBorderRadiusLeftDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputBorderRadiusLeftDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputBorderRadiusUnit' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'inputBorderRadiusUnitTablet' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'inputBorderRadiusUnitMobile' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'checkboxInputSize' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxInputSizeUnit' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'checkboxInputSizeDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxInputSizeTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxInputSizeMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxInputSizeUnitTablet' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'checkboxInputSizeUnitMobile' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'checkboxInputSizeDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxInputSizeDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxInputMarginTop' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxInputMarginTopTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxInputMarginTopMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxInputMarginTopDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxInputMarginTopDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxInputMarginTopDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxInputMarginRight' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxInputMarginRightTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxInputMarginRightMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxInputMarginRightDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxInputMarginRightDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxInputMarginRightDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxInputMarginBottom' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxInputMarginBottomTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxInputMarginBottomMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxInputMarginBottomDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxInputMarginBottomDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxInputMarginBottomDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxInputMarginLeft' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxInputMarginLeftTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxInputMarginLeftMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxInputMarginLeftDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxInputMarginLeftDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxInputMarginLeftDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxInputMarginUnit' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'checkboxInputMarginUnitTablet' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'checkboxInputMarginUnitMobile' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'checkboxSpaceBetween' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxSpaceBetweenUnit' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'checkboxSpaceBetweenDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxSpaceBetweenTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxSpaceBetweenMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxSpaceBetweenUnitTablet' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'checkboxSpaceBetweenUnitMobile' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'checkboxSpaceBetweenDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxSpaceBetweenDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxHolderMarginTop' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxHolderMarginTopTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxHolderMarginTopMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxHolderMarginTopDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxHolderMarginTopDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxHolderMarginTopDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxHolderMarginRight' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxHolderMarginRightTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxHolderMarginRightMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxHolderMarginRightDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxHolderMarginRightDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxHolderMarginRightDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxHolderMarginBottom' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxHolderMarginBottomTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxHolderMarginBottomMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxHolderMarginBottomDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxHolderMarginBottomDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxHolderMarginBottomDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxHolderMarginLeft' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxHolderMarginLeftTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxHolderMarginLeftMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxHolderMarginLeftDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxHolderMarginLeftDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxHolderMarginLeftDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'checkboxHolderMarginUnit' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'checkboxHolderMarginUnitTablet' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'checkboxHolderMarginUnitMobile' => array(
							'type' => 'string',
							'default' => 'px',
						),
					),
					qi_blocks_get_block_option_typography_attributes( 'checkbox' ),
					array(
						'checkboxLabelColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'radioInputSize' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioInputSizeUnit' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'radioInputSizeDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioInputSizeTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioInputSizeMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioInputSizeUnitTablet' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'radioInputSizeUnitMobile' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'radioInputSizeDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioInputSizeDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioInputMarginTop' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioInputMarginTopTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioInputMarginTopMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioInputMarginTopDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioInputMarginTopDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioInputMarginTopDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioInputMarginRight' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioInputMarginRightTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioInputMarginRightMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioInputMarginRightDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioInputMarginRightDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioInputMarginRightDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioInputMarginBottom' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioInputMarginBottomTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioInputMarginBottomMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioInputMarginBottomDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioInputMarginBottomDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioInputMarginBottomDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioInputMarginLeft' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioInputMarginLeftTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioInputMarginLeftMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioInputMarginLeftDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioInputMarginLeftDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioInputMarginLeftDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioInputMarginUnit' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'radioInputMarginUnitTablet' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'radioInputMarginUnitMobile' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'radioSpaceBetween' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioSpaceBetweenUnit' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'radioSpaceBetweenDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioSpaceBetweenTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioSpaceBetweenMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioSpaceBetweenUnitTablet' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'radioSpaceBetweenUnitMobile' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'radioSpaceBetweenDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioSpaceBetweenDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioHolderMarginTop' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioHolderMarginTopTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioHolderMarginTopMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioHolderMarginTopDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioHolderMarginTopDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioHolderMarginTopDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioHolderMarginRight' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioHolderMarginRightTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioHolderMarginRightMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioHolderMarginRightDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioHolderMarginRightDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioHolderMarginRightDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioHolderMarginBottom' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioHolderMarginBottomTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioHolderMarginBottomMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioHolderMarginBottomDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioHolderMarginBottomDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioHolderMarginBottomDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioHolderMarginLeft' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioHolderMarginLeftTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioHolderMarginLeftMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioHolderMarginLeftDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioHolderMarginLeftDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioHolderMarginLeftDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'radioHolderMarginUnit' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'radioHolderMarginUnitTablet' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'radioHolderMarginUnitMobile' => array(
							'type' => 'string',
							'default' => 'px',
						),
					),
					qi_blocks_get_block_option_typography_attributes( 'button' ),
					array(
						'buttonBorderStyle' => array(
							'type' => 'string',
							'default' => '',
						),
						'buttonBorderWidthTop' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonBorderWidthTopTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonBorderWidthTopMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonBorderWidthRight' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonBorderWidthRightTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonBorderWidthRightMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonBorderWidthBottom' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonBorderWidthBottomTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonBorderWidthBottomMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonBorderWidthLeft' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonBorderWidthLeftTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonBorderWidthLeftMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonBorderWidthUnit' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'buttonBorderWidthUnitTablet' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'buttonBorderWidthUnitMobile' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'buttonBorderRadiusTop' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonBorderRadiusTopTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonBorderRadiusTopMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonBorderRadiusTopDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonBorderRadiusTopDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonBorderRadiusTopDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonBorderRadiusRight' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonBorderRadiusRightTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonBorderRadiusRightMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonBorderRadiusRightDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonBorderRadiusRightDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonBorderRadiusRightDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonBorderRadiusBottom' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonBorderRadiusBottomTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonBorderRadiusBottomMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonBorderRadiusBottomDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonBorderRadiusBottomDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonBorderRadiusBottomDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonBorderRadiusLeft' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonBorderRadiusLeftTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonBorderRadiusLeftMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonBorderRadiusLeftDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonBorderRadiusLeftDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonBorderRadiusLeftDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonBorderRadiusUnit' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'buttonBorderRadiusUnitTablet' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'buttonBorderRadiusUnitMobile' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'formItemPaddingTop' => array(
							'type' => 'number',
							'default' => '',
						),
						'formItemPaddingTopTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formItemPaddingTopMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formItemPaddingTopDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'formItemPaddingTopDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formItemPaddingTopDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formItemPaddingRight' => array(
							'type' => 'number',
							'default' => '',
						),
						'formItemPaddingRightTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formItemPaddingRightMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formItemPaddingRightDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'formItemPaddingRightDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formItemPaddingRightDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formItemPaddingBottom' => array(
							'type' => 'number',
							'default' => '',
						),
						'formItemPaddingBottomTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formItemPaddingBottomMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formItemPaddingBottomDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'formItemPaddingBottomDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formItemPaddingBottomDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formItemPaddingLeft' => array(
							'type' => 'number',
							'default' => '',
						),
						'formItemPaddingLeftTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formItemPaddingLeftMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formItemPaddingLeftDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'formItemPaddingLeftDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formItemPaddingLeftDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formItemPaddingUnit' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'formItemPaddingUnitTablet' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'formItemPaddingUnitMobile' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'inputPaddingTop' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputPaddingTopTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputPaddingTopMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputPaddingTopDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputPaddingTopDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputPaddingTopDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputPaddingRight' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputPaddingRightTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputPaddingRightMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputPaddingRightDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputPaddingRightDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputPaddingRightDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputPaddingBottom' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputPaddingBottomTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputPaddingBottomMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputPaddingBottomDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputPaddingBottomDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputPaddingBottomDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputPaddingLeft' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputPaddingLeftTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputPaddingLeftMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputPaddingLeftDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputPaddingLeftDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputPaddingLeftDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'inputPaddingUnit' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'inputPaddingUnitTablet' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'inputPaddingUnitMobile' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'buttonMarginTop' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonMarginTopTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonMarginTopMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonMarginTopDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonMarginTopDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonMarginTopDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonMarginRight' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonMarginRightTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonMarginRightMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonMarginRightDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonMarginRightDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonMarginRightDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonMarginBottom' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonMarginBottomTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonMarginBottomMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonMarginBottomDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonMarginBottomDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonMarginBottomDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonMarginLeft' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonMarginLeftTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonMarginLeftMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonMarginLeftDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonMarginLeftDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonMarginLeftDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonMarginUnit' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'buttonMarginUnitTablet' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'buttonMarginUnitMobile' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'buttonPaddingTop' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonPaddingTopTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonPaddingTopMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonPaddingTopDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonPaddingTopDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonPaddingTopDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonPaddingRight' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonPaddingRightTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonPaddingRightMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonPaddingRightDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonPaddingRightDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonPaddingRightDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonPaddingBottom' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonPaddingBottomTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonPaddingBottomMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonPaddingBottomDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonPaddingBottomDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonPaddingBottomDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonPaddingLeft' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonPaddingLeftTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonPaddingLeftMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonPaddingLeftDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonPaddingLeftDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonPaddingLeftDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'buttonPaddingUnit' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'buttonPaddingUnitTablet' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'buttonPaddingUnitMobile' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'horizontalAlignment' => array(
							'type' => 'string',
							'default' => '',
						),
						'horizontalAlignmentTablet' => array(
							'type' => 'string',
							'default' => '',
						),
						'horizontalAlignmentMobile' => array(
							'type' => 'string',
							'default' => '',
						),
						'errorHorizontalAlignment' => array(
							'type' => 'string',
							'default' => '',
						),
						'errorHorizontalAlignmentTablet' => array(
							'type' => 'string',
							'default' => '',
						),
						'errorHorizontalAlignmentMobile' => array(
							'type' => 'string',
							'default' => '',
						),
					),
					qi_blocks_get_block_option_typography_attributes( 'error' ),
					array(
						'errorMarginTop' => array(
							'type' => 'number',
							'default' => '',
						),
						'errorMarginTopTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'errorMarginTopMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'errorMarginTopDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'errorMarginTopDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'errorMarginTopDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'errorMarginRight' => array(
							'type' => 'number',
							'default' => '',
						),
						'errorMarginRightTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'errorMarginRightMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'errorMarginRightDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'errorMarginRightDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'errorMarginRightDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'errorMarginBottom' => array(
							'type' => 'number',
							'default' => '',
						),
						'errorMarginBottomTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'errorMarginBottomMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'errorMarginBottomDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'errorMarginBottomDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'errorMarginBottomDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'errorMarginLeft' => array(
							'type' => 'number',
							'default' => '',
						),
						'errorMarginLeftTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'errorMarginLeftMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'errorMarginLeftDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'errorMarginLeftDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'errorMarginLeftDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'errorMarginUnit' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'errorMarginUnitTablet' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'errorMarginUnitMobile' => array(
							'type' => 'string',
							'default' => 'px',
						),
					),
					qi_blocks_get_block_option_typography_attributes( 'response' ),
					array(
						'responsePaddingTop' => array(
							'type' => 'number',
							'default' => '',
						),
						'responsePaddingTopTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'responsePaddingTopMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'responsePaddingTopDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'responsePaddingTopDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'responsePaddingTopDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'responsePaddingRight' => array(
							'type' => 'number',
							'default' => '',
						),
						'responsePaddingRightTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'responsePaddingRightMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'responsePaddingRightDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'responsePaddingRightDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'responsePaddingRightDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'responsePaddingBottom' => array(
							'type' => 'number',
							'default' => '',
						),
						'responsePaddingBottomTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'responsePaddingBottomMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'responsePaddingBottomDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'responsePaddingBottomDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'responsePaddingBottomDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'responsePaddingLeft' => array(
							'type' => 'number',
							'default' => '',
						),
						'responsePaddingLeftTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'responsePaddingLeftMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'responsePaddingLeftDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'responsePaddingLeftDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'responsePaddingLeftDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'responsePaddingUnit' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'responsePaddingUnitTablet' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'responsePaddingUnitMobile' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'responseMarginTop' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseMarginTopTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseMarginTopMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseMarginTopDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseMarginTopDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseMarginTopDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseMarginRight' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseMarginRightTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseMarginRightMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseMarginRightDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseMarginRightDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseMarginRightDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseMarginBottom' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseMarginBottomTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseMarginBottomMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseMarginBottomDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseMarginBottomDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseMarginBottomDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseMarginLeft' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseMarginLeftTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseMarginLeftMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseMarginLeftDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseMarginLeftDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseMarginLeftDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseMarginUnit' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'responseMarginUnitTablet' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'responseMarginUnitMobile' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'responseBorderStyle' => array(
							'type' => 'string',
							'default' => '',
						),
						'responseBorderColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'responseBorderWidthTop' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBorderWidthTopTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBorderWidthTopMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBorderWidthRight' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBorderWidthRightTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBorderWidthRightMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBorderWidthBottom' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBorderWidthBottomTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBorderWidthBottomMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBorderWidthLeft' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBorderWidthLeftTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBorderWidthLeftMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBorderWidthUnit' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'responseBorderWidthUnitTablet' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'responseBorderWidthUnitMobile' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'responseBorderRadiusTop' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBorderRadiusTopTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBorderRadiusTopMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBorderRadiusTopDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBorderRadiusTopDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBorderRadiusTopDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBorderRadiusRight' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBorderRadiusRightTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBorderRadiusRightMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBorderRadiusRightDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBorderRadiusRightDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBorderRadiusRightDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBorderRadiusBottom' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBorderRadiusBottomTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBorderRadiusBottomMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBorderRadiusBottomDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBorderRadiusBottomDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBorderRadiusBottomDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBorderRadiusLeft' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBorderRadiusLeftTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBorderRadiusLeftMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBorderRadiusLeftDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBorderRadiusLeftDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBorderRadiusLeftDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBorderRadiusUnit' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'responseBorderRadiusUnitTablet' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'responseBorderRadiusUnitMobile' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'responseBackgroundType' => array(
							'type' => 'string',
							'default' => '',
						),
						'responseBackgroundColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'responseBackgroundImage' => array(
							'type' => 'object',
							'default' => array(
								'id' => NULL,
								'url' => '',
								'alt' => '',
							),
						),
						'responseBackgroundImageTablet' => array(
							'type' => 'object',
							'default' => array(
								'id' => NULL,
								'url' => '',
								'alt' => '',
							),
						),
						'responseBackgroundImageMobile' => array(
							'type' => 'object',
							'default' => array(
								'id' => NULL,
								'url' => '',
								'alt' => '',
							),
						),
						'responseBackgroundPosition' => array(
							'type' => 'string',
							'default' => '',
						),
						'responseBackgroundPositionTablet' => array(
							'type' => 'string',
							'default' => '',
						),
						'responseBackgroundPositionMobile' => array(
							'type' => 'string',
							'default' => '',
						),
						'responseBackgroundXPosition' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBackgroundXPositionUnit' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'responseBackgroundXPositionDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBackgroundXPositionTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBackgroundXPositionMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBackgroundXPositionUnitTablet' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'responseBackgroundXPositionUnitMobile' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'responseBackgroundXPositionDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBackgroundXPositionDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBackgroundYPosition' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBackgroundYPositionUnit' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'responseBackgroundYPositionDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBackgroundYPositionTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBackgroundYPositionMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBackgroundYPositionUnitTablet' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'responseBackgroundYPositionUnitMobile' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'responseBackgroundYPositionDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBackgroundYPositionDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBackgroundAttachment' => array(
							'type' => 'string',
							'default' => '',
						),
						'responseBackgroundRepeat' => array(
							'type' => 'string',
							'default' => '',
						),
						'responseBackgroundRepeatTablet' => array(
							'type' => 'string',
							'default' => '',
						),
						'responseBackgroundRepeatMobile' => array(
							'type' => 'string',
							'default' => '',
						),
						'responseBackgroundSize' => array(
							'type' => 'string',
							'default' => '',
						),
						'responseBackgroundSizeTablet' => array(
							'type' => 'string',
							'default' => '',
						),
						'responseBackgroundSizeMobile' => array(
							'type' => 'string',
							'default' => '',
						),
						'responseBackgroundSizeWidth' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBackgroundSizeWidthUnit' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'responseBackgroundSizeWidthDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBackgroundSizeWidthTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBackgroundSizeWidthMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBackgroundSizeWidthUnitTablet' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'responseBackgroundSizeWidthUnitMobile' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'responseBackgroundSizeWidthDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBackgroundSizeWidthDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBackgroundGradientColor1' => array(
							'type' => 'string',
							'default' => '',
						),
						'responseBackgroundGradientLocation1' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBackgroundGradientColor2' => array(
							'type' => 'string',
							'default' => '',
						),
						'responseBackgroundGradientLocation2' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBackgroundGradientType' => array(
							'type' => 'string',
							'default' => 'linear',
						),
						'responseBackgroundGradientTypeAngle' => array(
							'type' => 'number',
							'default' => '',
						),
						'responseBackgroundGradientTypePosition' => array(
							'type' => 'string',
							'default' => 'center center',
						),
					)
				),
			);

			$this->set_block_options( $block_options );

			// Override templates.
			$this->override_templates();

			parent::__construct();
		}

		/**
		 * Module class instance
		 *
		 * @return Qi_Blocks_Contact_Form_7_Block
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function register_block() {
			if ( qi_blocks_is_installed( 'contact_form_7' ) ) {
				parent::register_block();
			}
		}

		public function override_templates() {
			// Remove <p> and <br/> from Contact Form 7.
			add_filter( 'wpcf7_autop_or_not', '__return_false' );
		}

		public function dynamic_render_callback( $attributes ) {
			$block_classes = qi_blocks_get_block_holder_classes( 'contact-form-7', $attributes );

			if ( ! empty( $attributes['buttonFullWidth'] ) ) {
				$block_classes[] = 'qodef-button--full-width';
			}

			$html = '';

			if ( ! empty( $attributes['contactFormID'] ) ) {
				$html .= '<div ' . qi_blocks_get_block_container_html_attributes_string( $attributes ) . '>';
				$html .= '<div class="' . implode( ' ', $block_classes ) . '">';
				$html .= do_shortcode( '[contact-form-7 id="' . esc_attr( $attributes['contactFormID'] ) . '"]' );
				$html .= '</div>';
				$html .= '</div>';
			}

			return $html;
		}
	}

	Qi_Blocks_Contact_Form_7_Block::get_instance();
}
