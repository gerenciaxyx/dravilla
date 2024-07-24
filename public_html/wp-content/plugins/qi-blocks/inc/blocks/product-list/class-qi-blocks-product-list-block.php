<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Qi_Blocks_Product_List_Block' ) ) {
	class Qi_Blocks_Product_List_Block extends Qi_Blocks_Blocks {
		private static $instance;

		public function __construct() {
			// Set block data.
			$this->set_block_name( 'product-list' );
			$this->set_block_title( esc_html__( 'Product List', 'qi-blocks' ) );
			$this->set_block_subcategory( esc_html__( 'WooCommerce', 'qi-blocks' ) );
			$this->set_block_demo_url( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/product-list/' );
			$this->set_block_documentation( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#product_list' );

			// Set block 3rd party scripts.
			$this->set_block_3rd_party_scripts(
				array(
					'isotope'    => array(
						'block_name' => 'product-list',
						'url'        => 'core',
					),
					'packery'    => array(
						'block_name' => 'product-list',
						'url'        => 'core',
					),
				)
			);

			$this->set_block_options(
				array(
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
							'ajaxItemsLoading' => array(
								'type' => 'boolean',
								'default' => false,
							),
							'queriedProductsData' => array(
								'type' => 'array',
								'default' => array(
								),
							),
							'maxNumPages' => array(
								'type' => 'number',
								'default' => 0,
							),
							'columnClasses' => array(
								'type' => 'string',
								'default' => '',
							),
							'masonryClasses' => array(
								'type' => 'string',
								'default' => '',
							),
							'behavior' => array(
								'type' => 'string',
								'default' => 'columns',
							),
							'imagesProportion' => array(
								'type' => 'string',
								'default' => 'full',
							),
							'customImageWidth' => array(
								'type' => 'string',
								'default' => '',
							),
							'customImageHeight' => array(
								'type' => 'string',
								'default' => '',
							),
							'enablePagination' => array(
								'type' => 'string',
								'default' => 'no',
							),
							'enableZigzag' => array(
								'type' => 'string',
								'default' => 'no',
							),
							'itemLayout' => array(
								'type' => 'string',
								'default' => 'info-below-hover-inset',
							),
							'titleTag' => array(
								'type' => 'string',
								'default' => 'h5',
							),
							'showCategory' => array(
								'type' => 'string',
								'default' => '',
							),
							'showRating' => array(
								'type' => 'string',
								'default' => '',
							),
							'showMark' => array(
								'type' => 'string',
								'default' => '',
							),
							'infoBelowSwapAlignment' => array(
								'type' => 'string',
								'default' => 'center',
							),
							'buttonLayout' => array(
								'type' => 'string',
								'default' => 'filled',
							),
							'buttonType' => array(
								'type' => 'string',
								'default' => 'standard',
							),
							'buttonUnderline' => array(
								'type' => 'string',
								'default' => 'no',
							),
							'buttonUnderlineColor' => array(
								'type' => 'string',
								'default' => '',
							),
							'buttonUnderlineHoverColor' => array(
								'type' => 'string',
								'default' => '',
							),
							'buttonUnderlineDraw' => array(
								'type' => 'string',
								'default' => 'no',
							),
							'buttonUnderlineAlignment' => array(
								'type' => 'string',
								'default' => 'left',
							),
							'buttonSize' => array(
								'type' => 'string',
								'default' => '',
							),
							'buttonIconPosition' => array(
								'type' => 'string',
								'default' => 'right',
							),
							'buttonInnerBorderColor' => array(
								'type' => 'string',
								'default' => '',
							),
							'buttonInnerBorderHoverColor' => array(
								'type' => 'string',
								'default' => '',
							),
							'buttonInnerBorderHoverType' => array(
								'type' => 'string',
								'default' => '',
							),
							'buttonIconEnableSideBorder' => array(
								'type' => 'string',
								'default' => 'no',
							),
							'buttonIconSideBorderColor' => array(
								'type' => 'string',
								'default' => '',
							),
							'buttonIconSideBorderHoverColor' => array(
								'type' => 'string',
								'default' => '',
							),
							'buttonRevealHover' => array(
								'type' => 'string',
								'default' => '',
							),
							'buttonIconBackgroundHoverReveal' => array(
								'type' => 'string',
								'default' => '',
							),
							'buttonIconBackgroundColor' => array(
								'type' => 'string',
								'default' => '',
							),
							'buttonIconBackgroundHoverColor' => array(
								'type' => 'string',
								'default' => '',
							),
							'buttonIconHoverMove' => array(
								'type' => 'string',
								'default' => 'move-horizontal-short',
							),
							'buttonColor' => array(
								'type' => 'string',
								'default' => '',
							),
							'buttonHoverColor' => array(
								'type' => 'string',
								'default' => '',
							),
							'buttonBorderColor' => array(
								'type' => 'string',
								'default' => '',
							),
							'buttonBorderHoverColor' => array(
								'type' => 'string',
								'default' => '',
							),
							'buttonHoverBackgroundColor' => array(
								'type' => 'string',
								'default' => '',
							),
							'buttonBackgroundColor' => array(
								'type' => 'string',
								'default' => '',
							),
							'imageHover' => array(
								'type' => 'string',
								'default' => 'zoom',
							),
							'imageZoomOrigin' => array(
								'type' => 'string',
								'default' => '',
							),
							'overlayColor' => array(
								'type' => 'string',
								'default' => '',
							),
							'overlayHoverColor' => array(
								'type' => 'string',
								'default' => '',
							),
							'saleMarkColor' => array(
								'type' => 'string',
								'default' => '',
							),
							'saleMarkBackgroundColor' => array(
								'type' => 'string',
								'default' => '',
							),
							'soldMarkColor' => array(
								'type' => 'string',
								'default' => '',
							),
							'soldMarkBackgroundColor' => array(
								'type' => 'string',
								'default' => '',
							),
							'titleColor' => array(
								'type' => 'string',
								'default' => '',
							),
							'titleHoverColor' => array(
								'type' => 'string',
								'default' => '',
							),
							'contentBackgroundColor' => array(
								'type' => 'string',
								'default' => '',
							),
							'imageHoverBackgroundColor' => array(
								'type' => 'string',
								'default' => '',
							),
							'categoryColor' => array(
								'type' => 'string',
								'default' => '',
							),
							'categoryHoverColor' => array(
								'type' => 'string',
								'default' => '',
							),
							'priceColor' => array(
								'type' => 'string',
								'default' => '',
							),
							'oldPriceColor' => array(
								'type' => 'string',
								'default' => '',
							),
							'ratingColor' => array(
								'type' => 'string',
								'default' => '',
							),
							'paginationColor' => array(
								'type' => 'string',
								'default' => '',
							),
							'paginationBackgroundColor' => array(
								'type' => 'string',
								'default' => '',
							),
							'paginationHoverColor' => array(
								'type' => 'string',
								'default' => '',
							),
							'paginationHoverBackgroundColor' => array(
								'type' => 'string',
								'default' => '',
							),
							'infoOnImageContentPosition' => array(
								'type' => 'string',
								'default' => 'center',
							),
							'postsPerPage' => array(
								'type' => 'number',
								'default' => 9,
							),
							'orderBy' => array(
								'type' => 'string',
								'default' => 'date',
							),
							'order' => array(
								'type' => 'string',
								'default' => 'desc',
							),
							'additionalParams' => array(
								'type' => 'string',
								'default' => '',
							),
							'postIds' => array(
								'type' => 'string',
								'default' => '',
							),
							'tax' => array(
								'type' => 'string',
								'default' => 'product_cat',
							),
							'taxSlug' => array(
								'type' => 'string',
								'default' => '',
							),
							'taxIn' => array(
								'type' => 'string',
								'default' => '',
							),
							'authorSlug' => array(
								'type' => 'string',
								'default' => '',
							),
							'filterBy' => array(
								'type' => 'string',
								'default' => '',
							),
							'columns' => array(
								'type' => 'number',
								'default' => 3,
							),
							'columnsResponsive' => array(
								'type' => 'string',
								'default' => 'predefined',
							),
							'columns1440' => array(
								'type' => 'number',
								'default' => '',
							),
							'columns1366' => array(
								'type' => 'number',
								'default' => '',
							),
							'columns1024' => array(
								'type' => 'number',
								'default' => '',
							),
							'columns768' => array(
								'type' => 'number',
								'default' => '',
							),
							'columns680' => array(
								'type' => 'number',
								'default' => '',
							),
							'columns480' => array(
								'type' => 'number',
								'default' => '',
							),
							'spaceBetweenItems' => array(
								'type' => 'number',
								'default' => 30,
							),
							'spaceBetweenItemsUnit' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'spaceBetweenItemsDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'spaceBetweenItemsTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'spaceBetweenItemsMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'spaceBetweenItemsUnitTablet' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'spaceBetweenItemsUnitMobile' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'spaceBetweenItemsDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'spaceBetweenItemsDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'zigzagAmount' => array(
								'type' => 'number',
								'default' => '',
							),
							'zigzagAmountUnit' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'zigzagAmountDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'zigzagAmountTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'zigzagAmountMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'zigzagAmountUnitTablet' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'zigzagAmountUnitMobile' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'zigzagAmountDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'zigzagAmountDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonIcon' => array(
								'type' => 'object',
								'default' => array(
									'html' => '',
								),
							),
							'buttonIconColor' => array(
								'type' => 'string',
								'default' => '',
							),
							'buttonIconFontSize' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonIconFontSizeUnit' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'buttonIconFontSizeDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonIconFontSizeTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonIconFontSizeMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonIconFontSizeUnitTablet' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'buttonIconFontSizeUnitMobile' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'buttonIconFontSizeDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonIconFontSizeDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'iconMarginTop' => array(
								'type' => 'number',
								'default' => '',
							),
							'iconMarginTopTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'iconMarginTopMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'iconMarginTopDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'iconMarginTopDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'iconMarginTopDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'iconMarginRight' => array(
								'type' => 'number',
								'default' => '',
							),
							'iconMarginRightTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'iconMarginRightMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'iconMarginRightDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'iconMarginRightDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'iconMarginRightDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'iconMarginBottom' => array(
								'type' => 'number',
								'default' => '',
							),
							'iconMarginBottomTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'iconMarginBottomMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'iconMarginBottomDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'iconMarginBottomDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'iconMarginBottomDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'iconMarginLeft' => array(
								'type' => 'number',
								'default' => '',
							),
							'iconMarginLeftTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'iconMarginLeftMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'iconMarginLeftDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'iconMarginLeftDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'iconMarginLeftDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'iconMarginUnit' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'iconMarginUnitTablet' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'iconMarginUnitMobile' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'imageBorderRadiusTop' => array(
								'type' => 'number',
								'default' => '',
							),
							'imageBorderRadiusTopTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'imageBorderRadiusTopMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'imageBorderRadiusTopDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'imageBorderRadiusTopDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'imageBorderRadiusTopDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'imageBorderRadiusRight' => array(
								'type' => 'number',
								'default' => '',
							),
							'imageBorderRadiusRightTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'imageBorderRadiusRightMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'imageBorderRadiusRightDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'imageBorderRadiusRightDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'imageBorderRadiusRightDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'imageBorderRadiusBottom' => array(
								'type' => 'number',
								'default' => '',
							),
							'imageBorderRadiusBottomTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'imageBorderRadiusBottomMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'imageBorderRadiusBottomDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'imageBorderRadiusBottomDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'imageBorderRadiusBottomDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'imageBorderRadiusLeft' => array(
								'type' => 'number',
								'default' => '',
							),
							'imageBorderRadiusLeftTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'imageBorderRadiusLeftMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'imageBorderRadiusLeftDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'imageBorderRadiusLeftDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'imageBorderRadiusLeftDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'imageBorderRadiusUnit' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'imageBorderRadiusUnitTablet' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'imageBorderRadiusUnitMobile' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'markBorderRadiusTop' => array(
								'type' => 'number',
								'default' => '',
							),
							'markBorderRadiusTopTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'markBorderRadiusTopMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'markBorderRadiusTopDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'markBorderRadiusTopDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'markBorderRadiusTopDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'markBorderRadiusRight' => array(
								'type' => 'number',
								'default' => '',
							),
							'markBorderRadiusRightTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'markBorderRadiusRightMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'markBorderRadiusRightDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'markBorderRadiusRightDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'markBorderRadiusRightDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'markBorderRadiusBottom' => array(
								'type' => 'number',
								'default' => '',
							),
							'markBorderRadiusBottomTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'markBorderRadiusBottomMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'markBorderRadiusBottomDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'markBorderRadiusBottomDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'markBorderRadiusBottomDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'markBorderRadiusLeft' => array(
								'type' => 'number',
								'default' => '',
							),
							'markBorderRadiusLeftTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'markBorderRadiusLeftMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'markBorderRadiusLeftDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'markBorderRadiusLeftDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'markBorderRadiusLeftDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'markBorderRadiusUnit' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'markBorderRadiusUnitTablet' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'markBorderRadiusUnitMobile' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'markPaddingTop' => array(
								'type' => 'number',
								'default' => '',
							),
							'markPaddingTopTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'markPaddingTopMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'markPaddingTopDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'markPaddingTopDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'markPaddingTopDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'markPaddingRight' => array(
								'type' => 'number',
								'default' => '',
							),
							'markPaddingRightTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'markPaddingRightMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'markPaddingRightDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'markPaddingRightDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'markPaddingRightDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'markPaddingBottom' => array(
								'type' => 'number',
								'default' => '',
							),
							'markPaddingBottomTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'markPaddingBottomMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'markPaddingBottomDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'markPaddingBottomDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'markPaddingBottomDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'markPaddingLeft' => array(
								'type' => 'number',
								'default' => '',
							),
							'markPaddingLeftTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'markPaddingLeftMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'markPaddingLeftDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'markPaddingLeftDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'markPaddingLeftDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'markPaddingUnit' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'markPaddingUnitTablet' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'markPaddingUnitMobile' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'markTop' => array(
								'type' => 'number',
								'default' => '',
							),
							'markTopTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'markTopMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'markTopDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'markTopDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'markTopDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'markRight' => array(
								'type' => 'number',
								'default' => '',
							),
							'markRightTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'markRightMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'markRightDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'markRightDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'markRightDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'markBottom' => array(
								'type' => 'number',
								'default' => '',
							),
							'markBottomTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'markBottomMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'markBottomDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'markBottomDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'markBottomDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'markLeft' => array(
								'type' => 'number',
								'default' => '',
							),
							'markLeftTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'markLeftMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'markLeftDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'markLeftDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'markLeftDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'markUnit' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'markUnitTablet' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'markUnitMobile' => array(
								'type' => 'string',
								'default' => 'px',
							),
						),
						qi_blocks_get_block_option_typography_attributes( 'mark' ),
						qi_blocks_get_block_option_typography_attributes( 'title' ),
						array(
							'contentPaddingTop' => array(
								'type' => 'number',
								'default' => '',
							),
							'contentPaddingTopTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'contentPaddingTopMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'contentPaddingTopDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'contentPaddingTopDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'contentPaddingTopDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'contentPaddingRight' => array(
								'type' => 'number',
								'default' => '',
							),
							'contentPaddingRightTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'contentPaddingRightMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'contentPaddingRightDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'contentPaddingRightDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'contentPaddingRightDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'contentPaddingBottom' => array(
								'type' => 'number',
								'default' => '',
							),
							'contentPaddingBottomTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'contentPaddingBottomMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'contentPaddingBottomDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'contentPaddingBottomDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'contentPaddingBottomDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'contentPaddingLeft' => array(
								'type' => 'number',
								'default' => '',
							),
							'contentPaddingLeftTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'contentPaddingLeftMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'contentPaddingLeftDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'contentPaddingLeftDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'contentPaddingLeftDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'contentPaddingUnit' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'contentPaddingUnitTablet' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'contentPaddingUnitMobile' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'itemPaddingTop' => array(
								'type' => 'number',
								'default' => '',
							),
							'itemPaddingTopTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'itemPaddingTopMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'itemPaddingTopDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'itemPaddingTopDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'itemPaddingTopDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'itemPaddingRight' => array(
								'type' => 'number',
								'default' => '',
							),
							'itemPaddingRightTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'itemPaddingRightMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'itemPaddingRightDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'itemPaddingRightDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'itemPaddingRightDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'itemPaddingBottom' => array(
								'type' => 'number',
								'default' => '',
							),
							'itemPaddingBottomTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'itemPaddingBottomMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'itemPaddingBottomDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'itemPaddingBottomDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'itemPaddingBottomDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'itemPaddingLeft' => array(
								'type' => 'number',
								'default' => '',
							),
							'itemPaddingLeftTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'itemPaddingLeftMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'itemPaddingLeftDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'itemPaddingLeftDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'itemPaddingLeftDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'itemPaddingUnit' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'itemPaddingUnitTablet' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'itemPaddingUnitMobile' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'swapHolderMarginTop' => array(
								'type' => 'number',
								'default' => '',
							),
							'swapHolderMarginTopUnit' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'swapHolderMarginTopDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'swapHolderMarginTopTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'swapHolderMarginTopMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'swapHolderMarginTopUnitTablet' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'swapHolderMarginTopUnitMobile' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'swapHolderMarginTopDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'swapHolderMarginTopDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'categoryMarginTop' => array(
								'type' => 'number',
								'default' => '',
							),
							'categoryMarginTopUnit' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'categoryMarginTopDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'categoryMarginTopTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'categoryMarginTopMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'categoryMarginTopUnitTablet' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'categoryMarginTopUnitMobile' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'categoryMarginTopDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'categoryMarginTopDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'ratingMarginTop' => array(
								'type' => 'number',
								'default' => '',
							),
							'ratingMarginTopUnit' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'ratingMarginTopDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'ratingMarginTopTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'ratingMarginTopMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'ratingMarginTopUnitTablet' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'ratingMarginTopUnitMobile' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'ratingMarginTopDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'ratingMarginTopDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
						),
						qi_blocks_get_block_option_typography_attributes( 'category' ),
						qi_blocks_get_block_option_typography_attributes( 'price' ),
						array(
							'currencyFontSize' => array(
								'type' => 'number',
								'default' => '',
							),
							'currencyFontSizeUnit' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'currencyFontSizeDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'currencyFontSizeTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'currencyFontSizeMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'currencyFontSizeUnitTablet' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'currencyFontSizeUnitMobile' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'currencyFontSizeDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'currencyFontSizeDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'currencyTopOffset' => array(
								'type' => 'number',
								'default' => '',
							),
							'currencyTopOffsetUnit' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'currencyTopOffsetDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'currencyTopOffsetTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'currencyTopOffsetMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'currencyTopOffsetUnitTablet' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'currencyTopOffsetUnitMobile' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'currencyTopOffsetDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'currencyTopOffsetDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'ratingIconsSize' => array(
								'type' => 'number',
								'default' => '',
							),
							'ratingIconsSizeUnit' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'ratingIconsSizeDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'ratingIconsSizeTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'ratingIconsSizeMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'ratingIconsSizeUnitTablet' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'ratingIconsSizeUnitMobile' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'ratingIconsSizeDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'ratingIconsSizeDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
						),
						qi_blocks_get_block_option_typography_attributes( 'pagination' ),
						array(
							'paginationArrowPrevIcon' => array(
								'type' => 'object',
								'default' => array(
									'html' => '',
								),
							),
							'paginationArrowNextIcon' => array(
								'type' => 'object',
								'default' => array(
									'html' => '',
								),
							),
							'paginationArrowsSize' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationArrowsSizeUnit' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'paginationArrowsSizeDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationArrowsSizeTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationArrowsSizeMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationArrowsSizeUnitTablet' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'paginationArrowsSizeUnitMobile' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'paginationArrowsSizeDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationArrowsSizeDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationBorderRadiusTop' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationBorderRadiusTopTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationBorderRadiusTopMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationBorderRadiusTopDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationBorderRadiusTopDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationBorderRadiusTopDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationBorderRadiusRight' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationBorderRadiusRightTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationBorderRadiusRightMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationBorderRadiusRightDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationBorderRadiusRightDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationBorderRadiusRightDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationBorderRadiusBottom' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationBorderRadiusBottomTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationBorderRadiusBottomMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationBorderRadiusBottomDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationBorderRadiusBottomDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationBorderRadiusBottomDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationBorderRadiusLeft' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationBorderRadiusLeftTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationBorderRadiusLeftMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationBorderRadiusLeftDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationBorderRadiusLeftDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationBorderRadiusLeftDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationBorderRadiusUnit' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'paginationBorderRadiusUnitTablet' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'paginationBorderRadiusUnitMobile' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'paginationWidth' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationWidthUnit' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'paginationWidthDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationWidthTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationWidthMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationWidthUnitTablet' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'paginationWidthUnitMobile' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'paginationWidthDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationWidthDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationHeight' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationHeightUnit' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'paginationHeightDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationHeightTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationHeightMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationHeightUnitTablet' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'paginationHeightUnitMobile' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'paginationHeightDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationHeightDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationSpacing' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationSpacingUnit' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'paginationSpacingDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationSpacingTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationSpacingMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationSpacingUnitTablet' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'paginationSpacingUnitMobile' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'paginationSpacingDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationSpacingDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationMarginTop' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationMarginTopUnit' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'paginationMarginTopDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationMarginTopTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationMarginTopMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationMarginTopUnitTablet' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'paginationMarginTopUnitMobile' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'paginationMarginTopDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'paginationMarginTopDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
						),
						qi_blocks_get_block_option_typography_attributes( 'buttonText' ),
						array(
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
							'buttonBorderWidthTopDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonBorderWidthTopDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonBorderWidthTopDecimalMobile' => array(
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
							'buttonBorderWidthRightDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonBorderWidthRightDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonBorderWidthRightDecimalMobile' => array(
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
							'buttonBorderWidthBottomDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonBorderWidthBottomDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonBorderWidthBottomDecimalMobile' => array(
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
							'buttonBorderWidthLeftDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonBorderWidthLeftDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonBorderWidthLeftDecimalMobile' => array(
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
							'buttonUnderlineWidth' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonUnderlineWidthUnit' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'buttonUnderlineWidthDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonUnderlineWidthTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonUnderlineWidthMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonUnderlineWidthUnitTablet' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'buttonUnderlineWidthUnitMobile' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'buttonUnderlineWidthDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonUnderlineWidthDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonUnderlineHoverWidth' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonUnderlineHoverWidthUnit' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'buttonUnderlineHoverWidthDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonUnderlineHoverWidthTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonUnderlineHoverWidthMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonUnderlineHoverWidthUnitTablet' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'buttonUnderlineHoverWidthUnitMobile' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'buttonUnderlineHoverWidthDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonUnderlineHoverWidthDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonUnderlineOffset' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonUnderlineOffsetUnit' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'buttonUnderlineOffsetTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonUnderlineOffsetMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonUnderlineOffsetUnitTablet' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'buttonUnderlineOffsetUnitMobile' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'buttonUnderlineThickness' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonUnderlineThicknessUnit' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'buttonUnderlineThicknessDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonUnderlineThicknessTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonUnderlineThicknessMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonUnderlineThicknessUnitTablet' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'buttonUnderlineThicknessUnitMobile' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'buttonUnderlineThicknessDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonUnderlineThicknessDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonIconSideBorderHeight' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonIconSideBorderHeightUnit' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'buttonIconSideBorderHeightTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonIconSideBorderHeightMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonIconSideBorderHeightUnitTablet' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'buttonIconSideBorderHeightUnitMobile' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'buttonIconStrokeWidth'                 => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonIconStrokeWidthUnit'             => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'buttonIconSideBorderWidth' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonIconSideBorderWidthUnit' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'buttonIconSideBorderWidthTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonIconSideBorderWidthMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonIconSideBorderWidthUnitTablet' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'buttonIconSideBorderWidthUnitMobile' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'buttonInnerBorderOffset' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonInnerBorderOffsetUnit' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'buttonInnerBorderOffsetDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonInnerBorderOffsetTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonInnerBorderOffsetMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonInnerBorderOffsetUnitTablet' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'buttonInnerBorderOffsetUnitMobile' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'buttonInnerBorderOffsetDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonInnerBorderOffsetDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonInnerBorderWidth' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonInnerBorderWidthUnit' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'buttonInnerBorderWidthTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonInnerBorderWidthMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonInnerBorderWidthUnitTablet' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'buttonInnerBorderWidthUnitMobile' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'titleMarginTop' => array(
								'type' => 'number',
								'default' => '',
							),
							'titleMarginTopUnit' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'titleMarginTopDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'titleMarginTopTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'titleMarginTopMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'titleMarginTopUnitTablet' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'titleMarginTopUnitMobile' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'titleMarginTopDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'titleMarginTopDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'priceMarginTop' => array(
								'type' => 'number',
								'default' => '',
							),
							'priceMarginTopUnit' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'priceMarginTopDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'priceMarginTopTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'priceMarginTopMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'priceMarginTopUnitTablet' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'priceMarginTopUnitMobile' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'priceMarginTopDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'priceMarginTopDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonMarginTop' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonMarginTopUnit' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'buttonMarginTopDecimal' => array(
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
							'buttonMarginTopUnitTablet' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'buttonMarginTopUnitMobile' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'buttonMarginTopDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'buttonMarginTopDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'infoBelowHoverInsetImageOverlayInnerOffset' => array(
								'type' => 'number',
								'default' => '',
							),
							'infoBelowHoverInsetImageOverlayInnerOffsetUnit' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'infoBelowHoverInsetImageOverlayInnerOffsetDecimal' => array(
								'type' => 'number',
								'default' => '',
							),
							'infoBelowHoverInsetImageOverlayInnerOffsetTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'infoBelowHoverInsetImageOverlayInnerOffsetMobile' => array(
								'type' => 'number',
								'default' => '',
							),
							'infoBelowHoverInsetImageOverlayInnerOffsetUnitTablet' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'infoBelowHoverInsetImageOverlayInnerOffsetUnitMobile' => array(
								'type' => 'string',
								'default' => 'px',
							),
							'infoBelowHoverInsetImageOverlayInnerOffsetDecimalTablet' => array(
								'type' => 'number',
								'default' => '',
							),
							'infoBelowHoverInsetImageOverlayInnerOffsetDecimalMobile' => array(
								'type' => 'number',
								'default' => '',
							),
						)
					),
				)
			);

			parent::__construct();
		}

		/**
		 * Module class instance
		 *
		 * @return Qi_Blocks_Product_List_Block
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function register_block() {
			if ( qi_blocks_is_installed( 'woocommerce' ) ) {
				parent::register_block();
			}
		}

		public function dynamic_render_callback( $attributes ) {
			$attributes['post_type']             = 'product';
			$attributes['additional_query_args'] = qi_blocks_get_additional_product_query_args( $attributes );
			$attributes['query_result']          = new WP_Query( qi_blocks_get_query_params( $attributes ) );
			$attributes['holder_classes']        = qi_blocks_get_product_list_holder_classes( $attributes );
			$attributes['layout']                = $attributes['itemLayout'];
			$attributes['masonry_classes']       = $attributes['masonryClasses'];
			$attributes['item_classes']          = 'qodef-e qodef-gutenberg-column';

			return qi_blocks_get_template_part( 'blocks/product-list', 'templates/content', '', $attributes );
		}
	}

	Qi_Blocks_Product_List_Block::get_instance();
}
