<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Qi_Blocks_Comments_Template_Block' ) ) {
	class Qi_Blocks_Comments_Template_Block extends Qi_Blocks_Blocks {
		private static $instance;

		public function __construct() {
			// Set block data.
			$this->set_block_name( 'comments-template' );
			$this->set_block_title( esc_html__( 'Comments Template', 'qi-blocks' ) );
			$this->set_block_subcategory( esc_html__( 'Content', 'qi-blocks' ) );
			$this->set_block_demo_url( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/comments-template/#comments-template' );
			$this->set_block_documentation( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#comments_template' );

			// Set block 3rd party scripts.
			$this->set_block_3rd_party_scripts(
				array(
					'comment-reply' => array(
						'block_name' => 'comments-template',
						'url'        => 'core',
					),
				)
			);

			$block_options = array(
				'render_callback' => array( $this, 'dynamic_render_callback' ),
				'uses_context'    => array(
					'postType',
					'postId',
				),
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
						'commentsTemplate' => array(
							'type'    => 'string',
							'default' => '',
						),
						'showCommentsList' => array(
							'type'    => 'boolean',
							'default' => true,
						),
						'showCommentsForm' => array(
							'type'    => 'boolean',
							'default' => true,
						),
						'titleTag' => array(
							'type'    => 'string',
							'default' => 'h3',
						),
						'titleColor' => array(
							'type' => 'string',
							'default' => '',
						),
					),
					qi_blocks_get_block_option_typography_attributes( 'title' ),
					array(
						'commentsTitleMarginTop' => array(
							'type' => 'number',
							'default' => '',
						),
						'commentsTitleMarginTopTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'commentsTitleMarginTopMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'commentsTitleMarginTopDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'commentsTitleMarginTopDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'commentsTitleMarginTopDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'commentsTitleMarginBottom' => array(
							'type' => 'number',
							'default' => '',
						),
						'commentsTitleMarginBottomTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'commentsTitleMarginBottomMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'commentsTitleMarginBottomDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'commentsTitleMarginBottomDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'commentsTitleMarginBottomDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'commentsTitleMarginUnit' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'commentsTitleMarginUnitTablet' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'commentsTitleMarginUnitMobile' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'formTitleMarginTop' => array(
							'type' => 'number',
							'default' => '',
						),
						'formTitleMarginTopTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formTitleMarginTopMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formTitleMarginTopDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'formTitleMarginTopDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formTitleMarginTopDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formTitleMarginBottom' => array(
							'type' => 'number',
							'default' => '',
						),
						'formTitleMarginBottomTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formTitleMarginBottomMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formTitleMarginBottomDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'formTitleMarginBottomDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formTitleMarginBottomDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formTitleMarginUnit' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'formTitleMarginUnitTablet' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'formTitleMarginUnitMobile' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'commentsLineColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'commentsInfoLinksColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'commentsInfoLinksHoverColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'commentsInfoMarginBottom' => array(
							'type' => 'number',
							'default' => '',
						),
						'commentsInfoMarginBottomUnit' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'commentsInfoMarginBottomDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'commentsInfoMarginBottomTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'commentsInfoMarginBottomMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'commentsInfoMarginBottomUnitTablet' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'commentsInfoMarginBottomUnitMobile' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'commentsInfoMarginBottomDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'commentsInfoMarginBottomDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'commentsAvatarWidth' => array(
							'type' => 'number',
							'default' => '',
						),
						'commentsAvatarWidthUnit' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'commentsAvatarWidthDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'commentsAvatarMarginRight' => array(
							'type' => 'number',
							'default' => '',
						),
						'commentsAvatarMarginRightUnit' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'commentsAvatarMarginRightDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'commentsTitleColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'commentsTitleHoverColor' => array(
							'type' => 'string',
							'default' => '',
						),
					),
					qi_blocks_get_block_option_typography_attributes( 'commentsTitle' ),
					qi_blocks_get_block_option_typography_attributes( 'commentsText' ),
					array(
						'commentsTextColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'commentsTextMarginTop' => array(
							'type' => 'number',
							'default' => '',
						),
						'commentsTextMarginTopUnit' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'commentsTextMarginTopDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'commentsTextMarginTopTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'commentsTextMarginTopMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'commentsTextMarginTopUnitTablet' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'commentsTextMarginTopUnitMobile' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'commentsTextMarginTopDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'commentsTextMarginTopDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'commentsDateColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'commentsDateHoverColor' => array(
							'type' => 'string',
							'default' => '',
						),
					),
					qi_blocks_get_block_option_typography_attributes( 'commentsDate' ),
					qi_blocks_get_block_option_typography_attributes( 'formNotes' ),
					array(
						'formNotesColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'formNotesLinkHoverColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'formNotesMarginTop' => array(
							'type' => 'number',
							'default' => '',
						),
						'formNotesMarginTopTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formNotesMarginTopMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formNotesMarginTopDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'formNotesMarginTopDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formNotesMarginTopDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formNotesMarginBottom' => array(
							'type' => 'number',
							'default' => '',
						),
						'formNotesMarginBottomTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formNotesMarginBottomMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formNotesMarginBottomDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'formNotesMarginBottomDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formNotesMarginBottomDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formNotesMarginUnit' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'formNotesMarginUnitTablet' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'formNotesMarginUnitMobile' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'formLabelColor' => array(
							'type' => 'string',
							'default' => '',
						),
					),
					qi_blocks_get_block_option_typography_attributes( 'formLabel' ),
					qi_blocks_get_block_option_typography_attributes( 'formInput' ),
					array(
						'formLabelMarginBottom' => array(
							'type' => 'number',
							'default' => '',
						),
						'formLabelMarginBottomUnit' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'formLabelMarginBottomDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputPaddingTop' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputPaddingTopTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputPaddingTopMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputPaddingTopDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputPaddingTopDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputPaddingTopDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputPaddingRight' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputPaddingRightTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputPaddingRightMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputPaddingRightDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputPaddingRightDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputPaddingRightDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputPaddingBottom' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputPaddingBottomTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputPaddingBottomMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputPaddingBottomDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputPaddingBottomDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputPaddingBottomDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputPaddingLeft' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputPaddingLeftTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputPaddingLeftMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputPaddingLeftDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputPaddingLeftDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputPaddingLeftDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputPaddingUnit' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'formInputPaddingUnitTablet' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'formInputPaddingUnitMobile' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'formInputMarginBottom' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputMarginBottomUnit' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'formInputMarginBottomDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputBorderStyle' => array(
							'type' => 'string',
							'default' => '',
						),
						'formInputBorderWidthTop' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputBorderWidthTopTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputBorderWidthTopMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputBorderWidthRight' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputBorderWidthRightTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputBorderWidthRightMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputBorderWidthBottom' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputBorderWidthBottomTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputBorderWidthBottomMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputBorderWidthLeft' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputBorderWidthLeftTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputBorderWidthLeftMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputBorderWidthUnit' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'formInputBorderWidthUnitTablet' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'formInputBorderWidthUnitMobile' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'formInputBorderRadiusTop' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputBorderRadiusTopTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputBorderRadiusTopMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputBorderRadiusTopDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputBorderRadiusTopDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputBorderRadiusTopDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputBorderRadiusRight' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputBorderRadiusRightTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputBorderRadiusRightMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputBorderRadiusRightDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputBorderRadiusRightDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputBorderRadiusRightDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputBorderRadiusBottom' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputBorderRadiusBottomTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputBorderRadiusBottomMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputBorderRadiusBottomDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputBorderRadiusBottomDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputBorderRadiusBottomDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputBorderRadiusLeft' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputBorderRadiusLeftTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputBorderRadiusLeftMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputBorderRadiusLeftDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputBorderRadiusLeftDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputBorderRadiusLeftDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputBorderRadiusUnit' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'formInputBorderRadiusUnitTablet' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'formInputBorderRadiusUnitMobile' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'formInputColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'formInputFocusColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'formInputBackgroundColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'formInputFocusBackgroundColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'formInputBorderColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'formInputFocusBorderColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'formInputBoxShadowColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'formInputBoxShadowHorizontal' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputBoxShadowVertical' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputBoxShadowBlur' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputBoxShadowSpread' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputBoxShadowPosition' => array(
							'type' => 'string',
							'default' => '',
						),
						'formInputFocusBoxShadowColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'formInputFocusBoxShadowHorizontal' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputFocusBoxShadowVertical' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputFocusBoxShadowBlur' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputFocusBoxShadowSpread' => array(
							'type' => 'number',
							'default' => '',
						),
						'formInputFocusBoxShadowPosition' => array(
							'type' => 'string',
							'default' => '',
						),
					),
					qi_blocks_get_block_option_typography_attributes( 'formButton' ),
					array(
						'formButtonPaddingTop' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonPaddingTopTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonPaddingTopMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonPaddingTopDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonPaddingTopDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonPaddingTopDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonPaddingRight' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonPaddingRightTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonPaddingRightMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonPaddingRightDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonPaddingRightDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonPaddingRightDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonPaddingBottom' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonPaddingBottomTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonPaddingBottomMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonPaddingBottomDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonPaddingBottomDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonPaddingBottomDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonPaddingLeft' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonPaddingLeftTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonPaddingLeftMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonPaddingLeftDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonPaddingLeftDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonPaddingLeftDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonPaddingUnit' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'formButtonPaddingUnitTablet' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'formButtonPaddingUnitMobile' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'formButtonMarginTop' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonMarginTopUnit' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'formButtonMarginTopDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonBorderStyle' => array(
							'type' => 'string',
							'default' => '',
						),
						'formButtonBorderWidthTop' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonBorderWidthTopTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonBorderWidthTopMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonBorderWidthRight' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonBorderWidthRightTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonBorderWidthRightMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonBorderWidthBottom' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonBorderWidthBottomTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonBorderWidthBottomMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonBorderWidthLeft' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonBorderWidthLeftTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonBorderWidthLeftMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonBorderWidthUnit' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'formButtonBorderWidthUnitTablet' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'formButtonBorderWidthUnitMobile' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'formButtonBorderRadiusTop' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonBorderRadiusTopTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonBorderRadiusTopMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonBorderRadiusTopDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonBorderRadiusTopDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonBorderRadiusTopDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonBorderRadiusRight' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonBorderRadiusRightTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonBorderRadiusRightMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonBorderRadiusRightDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonBorderRadiusRightDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonBorderRadiusRightDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonBorderRadiusBottom' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonBorderRadiusBottomTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonBorderRadiusBottomMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonBorderRadiusBottomDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonBorderRadiusBottomDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonBorderRadiusBottomDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonBorderRadiusLeft' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonBorderRadiusLeftTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonBorderRadiusLeftMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonBorderRadiusLeftDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonBorderRadiusLeftDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonBorderRadiusLeftDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonBorderRadiusUnit' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'formButtonBorderRadiusUnitTablet' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'formButtonBorderRadiusUnitMobile' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'formButtonBoxShadowColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'formButtonBoxShadowHorizontal' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonBoxShadowVertical' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonBoxShadowBlur' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonBoxShadowSpread' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonBoxShadowPosition' => array(
							'type' => 'string',
							'default' => '',
						),
						'formButtonShowIcon' => array(
							'type' => 'boolean',
							'default' => true,
						),
						'formButtonIcon' => array(
							'type' => 'object',
							'default' => array(
								'html' => '',
							),
						),
						'formButtonIconSize' => array(
							'type' => 'number',
							'default' => '',
						),
						'formButtonColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'formButtonHoverColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'formButtonBackgroundColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'formButtonHoverBackgroundColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'formButtonBorderColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'formButtonHoverBorderColor' => array(
							'type' => 'string',
							'default' => '',
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
		 * @return Qi_Blocks_Comments_Template_Block
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function dynamic_render_callback( $attributes, $content, $block ) {
			$html = '';

			if ( ! empty( $block ) && empty( $block->context['postId'] ) ) {
				return '';
			}

			$block_classes = qi_blocks_get_block_holder_classes( 'comments-template', $attributes );

			$html .= '<div ' . qi_blocks_get_block_container_html_attributes_string( $attributes ) . '>';
			$html .= '<div id="qodef-comments-template" class="' . implode( ' ', $block_classes ) . '">';

			ob_start();

			qi_blocks_template_part( 'comments', 'templates/comments-template', '', array( 'post_ID' => $block->context['postId'], 'attributes' => $attributes ) );

			$html .= ob_get_clean();

			$html .= '</div>';
			$html .= '</div>';

			return $html;
		}
	}

	Qi_Blocks_Comments_Template_Block::get_instance();
}
