<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Qi_Blocks_Blog_List_Block' ) ) {
	class Qi_Blocks_Blog_List_Block extends Qi_Blocks_Blocks {
		private static $instance;

		public function __construct() {
			// Set block data.
			$this->set_block_name( 'blog-list' );
			$this->set_block_title( esc_html__( 'Blog List', 'qi-blocks' ) );
			$this->set_block_subcategory( esc_html__( 'Business', 'qi-blocks' ) );
			$this->set_block_demo_url( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/blog-list/' );
			$this->set_block_documentation( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#blog_list' );

			// Set block 3rd party scripts.
			$this->set_block_3rd_party_scripts(
				array(
					'isotope'       => array(
						'block_name' => 'blog-list',
						'url'        => 'core',
					),
					'packery'       => array(
						'block_name' => 'blog-list',
						'url'        => 'core',
					),
					'button-script' => array(
						'block_name' => 'blog-list',
						'url'        => QI_BLOCKS_ASSETS_URL_PATH . '/dist/button-script.js',
					),
				)
			);

			$this->set_block_options(
				array(
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
							'queriedPostsData'                          => array(
								'type'    => 'array',
								'default' => array(),
							),
							'maxNumPages'                               => array(
								'type'    => 'number',
								'default' => 0,
							),
							'behavior'                                  => array(
								'type'    => 'string',
								'default' => 'columns',
							),
							'imagesProportion'                          => array(
								'type'    => 'string',
								'default' => 'full',
							),
							'customImageWidth'                          => array(
								'type'    => 'string',
								'default' => '',
							),
							'customImageHeight'                         => array(
								'type'    => 'string',
								'default' => '',
							),
							'buttonText'                                => array(
								'type'    => 'string',
								'default' => '',
							),
							'enablePagination'                          => array(
								'type'    => 'string',
								'default' => 'no',
							),
							'enableZigzag'                              => array(
								'type'    => 'string',
								'default' => 'no',
							),
							'itemLayout'                                => array(
								'type'    => 'string',
								'default' => 'boxed',
							),
							'titleTag'                                  => array(
								'type'    => 'string',
								'default' => 'h5',
							),
							'showExcerpt'                               => array(
								'type'    => 'string',
								'default' => '',
							),
							'excerptLength'                             => array(
								'type'    => 'string',
								'default' => '',
							),
							'centerContent'                             => array(
								'type'    => 'string',
								'default' => '',
							),
							'showMedia'                                 => array(
								'type'    => 'string',
								'default' => '',
							),
							'showInfoIcons'                             => array(
								'type'    => 'string',
								'default' => '',
							),
							'showDate'                                  => array(
								'type'    => 'string',
								'default' => '',
							),
							'showCategory'                              => array(
								'type'    => 'string',
								'default' => '',
							),
							'showAuthor'                                => array(
								'type'    => 'string',
								'default' => '',
							),
							'showButton'                                => array(
								'type'    => 'string',
								'default' => '',
							),
							'paginationColor'                           => array(
								'type'    => 'string',
								'default' => '',
							),
							'paginationBackgroundColor'                 => array(
								'type'    => 'string',
								'default' => '',
							),
							'paginationHoverColor'                      => array(
								'type'    => 'string',
								'default' => '',
							),
							'paginationBackgroundHoverColor'            => array(
								'type'    => 'string',
								'default' => '',
							),
							'titleColor'                                => array(
								'type'    => 'string',
								'default' => '',
							),
							'titleHoverColor'                           => array(
								'type'    => 'string',
								'default' => '',
							),
							'excerptColor'                              => array(
								'type'    => 'string',
								'default' => '',
							),
							'infoColor'                                 => array(
								'type'    => 'string',
								'default' => '',
							),
							'infoHoverColor'                            => array(
								'type'    => 'string',
								'default' => '',
							),
							'infoIconsColor'                            => array(
								'type'    => 'string',
								'default' => '',
							),
							'titleHoverUnderline'                       => array(
								'type'    => 'string',
								'default' => 'no',
							),
							'imageHover'                                => array(
								'type'    => 'string',
								'default' => 'zoom',
							),
							'imageZoomOrigin'                           => array(
								'type'    => 'string',
								'default' => '',
							),
							'overlayColor'                              => array(
								'type'    => 'string',
								'default' => '',
							),
							'overlayHoverColor'                         => array(
								'type'    => 'string',
								'default' => '',
							),
							'boxedContentBackgroundColor'               => array(
								'type'    => 'string',
								'default' => '',
							),
							'dateColor'                                 => array(
								'type'    => 'string',
								'default' => '',
							),
							'dateHoverColor'                            => array(
								'type'    => 'string',
								'default' => '',
							),
							'dateBackgroundColor'                       => array(
								'type'    => 'string',
								'default' => '',
							),
							'minimalBorderTopColor'                     => array(
								'type'    => 'string',
								'default' => '',
							),
							'minimalBorderTopStyle'                     => array(
								'type'    => 'string',
								'default' => '',
							),
							'sideImageVerticalAlignment'                => array(
								'type'    => 'string',
								'default' => '',
							),
							'standardBottomInfoColor'                   => array(
								'type'    => 'string',
								'default' => '',
							),
							'standardBottomInfoHoverColor'              => array(
								'type'    => 'string',
								'default' => '',
							),
							'reverseColumns'                            => array(
								'type'    => 'boolean',
								'default' => false,
							),
							'buttonLayout'                              => array(
								'type'    => 'string',
								'default' => 'textual',
							),
							'buttonType'                                => array(
								'type'    => 'string',
								'default' => 'standard',
							),
							'buttonUnderline'                           => array(
								'type'    => 'string',
								'default' => 'no',
							),
							'buttonUnderlineColor'                      => array(
								'type'    => 'string',
								'default' => '',
							),
							'buttonUnderlineHoverColor'                 => array(
								'type'    => 'string',
								'default' => '',
							),
							'buttonUnderlineDraw'                       => array(
								'type'    => 'string',
								'default' => 'no',
							),
							'buttonUnderlineAlignment'                  => array(
								'type'    => 'string',
								'default' => 'left',
							),
							'buttonSize'                                => array(
								'type'    => 'string',
								'default' => '',
							),
							'buttonIconPosition'                        => array(
								'type'    => 'string',
								'default' => 'right',
							),
							'buttonInnerBorderColor'                    => array(
								'type'    => 'string',
								'default' => '',
							),
							'buttonInnerBorderHoverColor'               => array(
								'type'    => 'string',
								'default' => '',
							),
							'buttonInnerBorderHoverType'                => array(
								'type'    => 'string',
								'default' => '',
							),
							'buttonIconEnableSideBorder'                => array(
								'type'    => 'string',
								'default' => 'no',
							),
							'buttonIconSideBorderColor'                 => array(
								'type'    => 'string',
								'default' => '',
							),
							'buttonIconSideBorderHoverColor'            => array(
								'type'    => 'string',
								'default' => '',
							),
							'buttonRevealHover'                         => array(
								'type'    => 'string',
								'default' => '',
							),
							'buttonIconBackgroundHoverReveal'           => array(
								'type'    => 'string',
								'default' => '',
							),
							'buttonIconBackgroundColor'                 => array(
								'type'    => 'string',
								'default' => '',
							),
							'buttonIconBackgroundHoverColor'            => array(
								'type'    => 'string',
								'default' => '',
							),
							'buttonIconHoverMove'                       => array(
								'type'    => 'string',
								'default' => 'move-horizontal-short',
							),
							'buttonColor'                               => array(
								'type'    => 'string',
								'default' => '',
							),
							'buttonHoverColor'                          => array(
								'type'    => 'string',
								'default' => '',
							),
							'buttonBorderColor'                         => array(
								'type'    => 'string',
								'default' => '',
							),
							'buttonBorderHoverColor'                    => array(
								'type'    => 'string',
								'default' => '',
							),
							'buttonHoverBackgroundColor'                => array(
								'type'    => 'string',
								'default' => '',
							),
							'buttonBackgroundColor'                     => array(
								'type'    => 'string',
								'default' => '',
							),
							'columns'                                   => array(
								'type'    => 'number',
								'default' => 2,
							),
							'columnsResponsive'                         => array(
								'type'    => 'string',
								'default' => 'predefined',
							),
							'columns1440'                               => array(
								'type'    => 'number',
								'default' => '',
							),
							'columns1366'                               => array(
								'type'    => 'number',
								'default' => '',
							),
							'columns1024'                               => array(
								'type'    => 'number',
								'default' => '',
							),
							'columns768'                                => array(
								'type'    => 'number',
								'default' => '',
							),
							'columns680'                                => array(
								'type'    => 'number',
								'default' => '',
							),
							'columns480'                                => array(
								'type'    => 'number',
								'default' => '',
							),
							'spaceBetweenItems'                         => array(
								'type'    => 'number',
								'default' => 30,
							),
							'spaceBetweenItemsUnit'                     => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'spaceBetweenItemsDecimal'                  => array(
								'type'    => 'number',
								'default' => '',
							),
							'spaceBetweenItemsTablet'                   => array(
								'type'    => 'number',
								'default' => '',
							),
							'spaceBetweenItemsMobile'                   => array(
								'type'    => 'number',
								'default' => '',
							),
							'spaceBetweenItemsUnitTablet'               => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'spaceBetweenItemsUnitMobile'               => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'spaceBetweenItemsDecimalTablet'            => array(
								'type'    => 'number',
								'default' => '',
							),
							'spaceBetweenItemsDecimalMobile'            => array(
								'type'    => 'number',
								'default' => '',
							),
							'zigzagAmount'                              => array(
								'type'    => 'number',
								'default' => '',
							),
							'zigzagAmountUnit'                          => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'zigzagAmountDecimal'                       => array(
								'type'    => 'number',
								'default' => '',
							),
							'zigzagAmountTablet'                        => array(
								'type'    => 'number',
								'default' => '',
							),
							'zigzagAmountMobile'                        => array(
								'type'    => 'number',
								'default' => '',
							),
							'zigzagAmountUnitTablet'                    => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'zigzagAmountUnitMobile'                    => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'zigzagAmountDecimalTablet'                 => array(
								'type'    => 'number',
								'default' => '',
							),
							'zigzagAmountDecimalMobile'                 => array(
								'type'    => 'number',
								'default' => '',
							),
							'inheritGlobalQuery'                        => array(
								'type'    => 'boolean',
								'default' => false,
							),
							'postsPerPage'                              => array(
								'type'    => 'number',
								'default' => 9,
							),
							'orderBy'                                   => array(
								'type'    => 'string',
								'default' => 'date',
							),
							'order'                                     => array(
								'type'    => 'string',
								'default' => 'desc',
							),
							'additionalParams'                          => array(
								'type'    => 'string',
								'default' => '',
							),
							'postIds'                                   => array(
								'type'    => 'string',
								'default' => '',
							),
							'tax'                                       => array(
								'type'    => 'string',
								'default' => 'category',
							),
							'taxSlug'                                   => array(
								'type'    => 'string',
								'default' => '',
							),
							'taxIn'                                     => array(
								'type'    => 'string',
								'default' => '',
							),
							'authorSlug'                                => array(
								'type'    => 'string',
								'default' => '',
							),
						),
						qi_blocks_get_block_option_typography_attributes( 'pagination' ),
						array(
							'paginationArrowPrevIcon'                   => array(
								'type'    => 'object',
								'default' => array(
									'html' => '',
								),
							),
							'paginationArrowNextIcon'                   => array(
								'type'    => 'object',
								'default' => array(
									'html' => '',
								),
							),
							'paginationArrowsSize'                      => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationArrowsSizeUnit'                  => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'paginationArrowsSizeDecimal'               => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationArrowsSizeTablet'                => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationArrowsSizeMobile'                => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationArrowsSizeUnitTablet'            => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'paginationArrowsSizeUnitMobile'            => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'paginationArrowsSizeDecimalTablet'         => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationArrowsSizeDecimalMobile'         => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationBorderRadiusTop'                 => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationBorderRadiusTopTablet'           => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationBorderRadiusTopMobile'           => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationBorderRadiusTopDecimal'          => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationBorderRadiusTopDecimalTablet'    => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationBorderRadiusTopDecimalMobile'    => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationBorderRadiusRight'               => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationBorderRadiusRightTablet'         => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationBorderRadiusRightMobile'         => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationBorderRadiusRightDecimal'        => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationBorderRadiusRightDecimalTablet'  => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationBorderRadiusRightDecimalMobile'  => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationBorderRadiusBottom'              => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationBorderRadiusBottomTablet'        => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationBorderRadiusBottomMobile'        => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationBorderRadiusBottomDecimal'       => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationBorderRadiusBottomDecimalTablet' => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationBorderRadiusBottomDecimalMobile' => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationBorderRadiusLeft'                => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationBorderRadiusLeftTablet'          => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationBorderRadiusLeftMobile'          => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationBorderRadiusLeftDecimal'         => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationBorderRadiusLeftDecimalTablet'   => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationBorderRadiusLeftDecimalMobile'   => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationBorderRadiusUnit'                => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'paginationBorderRadiusUnitTablet'          => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'paginationBorderRadiusUnitMobile'          => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'paginationWidth'                           => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationWidthUnit'                       => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'paginationWidthDecimal'                    => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationWidthTablet'                     => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationWidthMobile'                     => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationWidthUnitTablet'                 => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'paginationWidthUnitMobile'                 => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'paginationWidthDecimalTablet'              => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationWidthDecimalMobile'              => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationHeight'                          => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationHeightUnit'                      => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'paginationHeightDecimal'                   => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationHeightTablet'                    => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationHeightMobile'                    => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationHeightUnitTablet'                => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'paginationHeightUnitMobile'                => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'paginationHeightDecimalTablet'             => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationHeightDecimalMobile'             => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationSpacing'                         => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationSpacingUnit'                     => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'paginationSpacingDecimal'                  => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationSpacingTablet'                   => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationSpacingMobile'                   => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationSpacingUnitTablet'               => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'paginationSpacingUnitMobile'               => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'paginationSpacingDecimalTablet'            => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationSpacingDecimalMobile'            => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationMarginTop'                       => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationMarginTopUnit'                   => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'paginationMarginTopDecimal'                => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationMarginTopTablet'                 => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationMarginTopMobile'                 => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationMarginTopUnitTablet'             => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'paginationMarginTopUnitMobile'             => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'paginationMarginTopDecimalTablet'          => array(
								'type'    => 'number',
								'default' => '',
							),
							'paginationMarginTopDecimalMobile'          => array(
								'type'    => 'number',
								'default' => '',
							),
						),
						qi_blocks_get_block_option_typography_attributes( 'title' ),
						qi_blocks_get_block_option_typography_attributes( 'excerpt' ),
						qi_blocks_get_block_option_typography_attributes( 'info' ),
						array(
							'postInfoMarginBottom'                      => array(
								'type'    => 'number',
								'default' => '',
							),
							'postInfoMarginBottomUnit'                  => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'postInfoMarginBottomDecimal'               => array(
								'type'    => 'number',
								'default' => '',
							),
							'postInfoMarginBottomTablet'                => array(
								'type'    => 'number',
								'default' => '',
							),
							'postInfoMarginBottomMobile'                => array(
								'type'    => 'number',
								'default' => '',
							),
							'postInfoMarginBottomUnitTablet'            => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'postInfoMarginBottomUnitMobile'            => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'postInfoMarginBottomDecimalTablet'         => array(
								'type'    => 'number',
								'default' => '',
							),
							'postInfoMarginBottomDecimalMobile'         => array(
								'type'    => 'number',
								'default' => '',
							),
							'titleMarginBottom'                         => array(
								'type'    => 'number',
								'default' => '',
							),
							'titleMarginBottomUnit'                     => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'titleMarginBottomDecimal'                  => array(
								'type'    => 'number',
								'default' => '',
							),
							'titleMarginBottomTablet'                   => array(
								'type'    => 'number',
								'default' => '',
							),
							'titleMarginBottomMobile'                   => array(
								'type'    => 'number',
								'default' => '',
							),
							'titleMarginBottomUnitTablet'               => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'titleMarginBottomUnitMobile'               => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'titleMarginBottomDecimalTablet'            => array(
								'type'    => 'number',
								'default' => '',
							),
							'titleMarginBottomDecimalMobile'            => array(
								'type'    => 'number',
								'default' => '',
							),
							'textMarginBottom'                          => array(
								'type'    => 'number',
								'default' => '',
							),
							'textMarginBottomUnit'                      => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'textMarginBottomDecimal'                   => array(
								'type'    => 'number',
								'default' => '',
							),
							'textMarginBottomTablet'                    => array(
								'type'    => 'number',
								'default' => '',
							),
							'textMarginBottomMobile'                    => array(
								'type'    => 'number',
								'default' => '',
							),
							'textMarginBottomUnitTablet'                => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'textMarginBottomUnitMobile'                => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'textMarginBottomDecimalTablet'             => array(
								'type'    => 'number',
								'default' => '',
							),
							'textMarginBottomDecimalMobile'             => array(
								'type'    => 'number',
								'default' => '',
							),
							'contentPaddingTop'                         => array(
								'type'    => 'number',
								'default' => '',
							),
							'contentPaddingTopTablet'                   => array(
								'type'    => 'number',
								'default' => '',
							),
							'contentPaddingTopMobile'                   => array(
								'type'    => 'number',
								'default' => '',
							),
							'contentPaddingTopDecimal'                  => array(
								'type'    => 'number',
								'default' => '',
							),
							'contentPaddingTopDecimalTablet'            => array(
								'type'    => 'number',
								'default' => '',
							),
							'contentPaddingTopDecimalMobile'            => array(
								'type'    => 'number',
								'default' => '',
							),
							'contentPaddingRight'                       => array(
								'type'    => 'number',
								'default' => '',
							),
							'contentPaddingRightTablet'                 => array(
								'type'    => 'number',
								'default' => '',
							),
							'contentPaddingRightMobile'                 => array(
								'type'    => 'number',
								'default' => '',
							),
							'contentPaddingRightDecimal'                => array(
								'type'    => 'number',
								'default' => '',
							),
							'contentPaddingRightDecimalTablet'          => array(
								'type'    => 'number',
								'default' => '',
							),
							'contentPaddingRightDecimalMobile'          => array(
								'type'    => 'number',
								'default' => '',
							),
							'contentPaddingBottom'                      => array(
								'type'    => 'number',
								'default' => '',
							),
							'contentPaddingBottomTablet'                => array(
								'type'    => 'number',
								'default' => '',
							),
							'contentPaddingBottomMobile'                => array(
								'type'    => 'number',
								'default' => '',
							),
							'contentPaddingBottomDecimal'               => array(
								'type'    => 'number',
								'default' => '',
							),
							'contentPaddingBottomDecimalTablet'         => array(
								'type'    => 'number',
								'default' => '',
							),
							'contentPaddingBottomDecimalMobile'         => array(
								'type'    => 'number',
								'default' => '',
							),
							'contentPaddingLeft'                        => array(
								'type'    => 'number',
								'default' => '',
							),
							'contentPaddingLeftTablet'                  => array(
								'type'    => 'number',
								'default' => '',
							),
							'contentPaddingLeftMobile'                  => array(
								'type'    => 'number',
								'default' => '',
							),
							'contentPaddingLeftDecimal'                 => array(
								'type'    => 'number',
								'default' => '',
							),
							'contentPaddingLeftDecimalTablet'           => array(
								'type'    => 'number',
								'default' => '',
							),
							'contentPaddingLeftDecimalMobile'           => array(
								'type'    => 'number',
								'default' => '',
							),
							'contentPaddingUnit'                        => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'contentPaddingUnitTablet'                  => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'contentPaddingUnitMobile'                  => array(
								'type'    => 'string',
								'default' => 'px',
							),
						),
						qi_blocks_get_block_option_typography_attributes( 'date' ),
						array(
							'datePaddingTop'                            => array(
								'type'    => 'number',
								'default' => '',
							),
							'datePaddingTopTablet'                      => array(
								'type'    => 'number',
								'default' => '',
							),
							'datePaddingTopMobile'                      => array(
								'type'    => 'number',
								'default' => '',
							),
							'datePaddingTopDecimal'                     => array(
								'type'    => 'number',
								'default' => '',
							),
							'datePaddingTopDecimalTablet'               => array(
								'type'    => 'number',
								'default' => '',
							),
							'datePaddingTopDecimalMobile'               => array(
								'type'    => 'number',
								'default' => '',
							),
							'datePaddingRight'                          => array(
								'type'    => 'number',
								'default' => '',
							),
							'datePaddingRightTablet'                    => array(
								'type'    => 'number',
								'default' => '',
							),
							'datePaddingRightMobile'                    => array(
								'type'    => 'number',
								'default' => '',
							),
							'datePaddingRightDecimal'                   => array(
								'type'    => 'number',
								'default' => '',
							),
							'datePaddingRightDecimalTablet'             => array(
								'type'    => 'number',
								'default' => '',
							),
							'datePaddingRightDecimalMobile'             => array(
								'type'    => 'number',
								'default' => '',
							),
							'datePaddingBottom'                         => array(
								'type'    => 'number',
								'default' => '',
							),
							'datePaddingBottomTablet'                   => array(
								'type'    => 'number',
								'default' => '',
							),
							'datePaddingBottomMobile'                   => array(
								'type'    => 'number',
								'default' => '',
							),
							'datePaddingBottomDecimal'                  => array(
								'type'    => 'number',
								'default' => '',
							),
							'datePaddingBottomDecimalTablet'            => array(
								'type'    => 'number',
								'default' => '',
							),
							'datePaddingBottomDecimalMobile'            => array(
								'type'    => 'number',
								'default' => '',
							),
							'datePaddingLeft'                           => array(
								'type'    => 'number',
								'default' => '',
							),
							'datePaddingLeftTablet'                     => array(
								'type'    => 'number',
								'default' => '',
							),
							'datePaddingLeftMobile'                     => array(
								'type'    => 'number',
								'default' => '',
							),
							'datePaddingLeftDecimal'                    => array(
								'type'    => 'number',
								'default' => '',
							),
							'datePaddingLeftDecimalTablet'              => array(
								'type'    => 'number',
								'default' => '',
							),
							'datePaddingLeftDecimalMobile'              => array(
								'type'    => 'number',
								'default' => '',
							),
							'datePaddingUnit'                           => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'datePaddingUnitTablet'                     => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'datePaddingUnitMobile'                     => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'boxedItemBoxShadowColor'                   => array(
								'type'    => 'string',
								'default' => '',
							),
							'boxedItemBoxShadowHorizontal'              => array(
								'type'    => 'number',
								'default' => '',
							),
							'boxedItemBoxShadowVertical'                => array(
								'type'    => 'number',
								'default' => '',
							),
							'boxedItemBoxShadowBlur'                    => array(
								'type'    => 'number',
								'default' => '',
							),
							'boxedItemBoxShadowSpread'                  => array(
								'type'    => 'number',
								'default' => '',
							),
							'boxedItemBoxShadowPosition'                => array(
								'type'    => 'string',
								'default' => '',
							),
							'dateVerticalOffset'                        => array(
								'type'    => 'number',
								'default' => '',
							),
							'dateVerticalOffsetUnit'                    => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'dateVerticalOffsetDecimal'                 => array(
								'type'    => 'number',
								'default' => '',
							),
							'dateVerticalOffsetTablet'                  => array(
								'type'    => 'number',
								'default' => '',
							),
							'dateVerticalOffsetMobile'                  => array(
								'type'    => 'number',
								'default' => '',
							),
							'dateVerticalOffsetUnitTablet'              => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'dateVerticalOffsetUnitMobile'              => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'dateVerticalOffsetDecimalTablet'           => array(
								'type'    => 'number',
								'default' => '',
							),
							'dateVerticalOffsetDecimalMobile'           => array(
								'type'    => 'number',
								'default' => '',
							),
							'dateBorderRadius'                          => array(
								'type'    => 'number',
								'default' => '',
							),
							'dateBorderRadiusUnit'                      => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'dateBorderRadiusDecimal'                   => array(
								'type'    => 'number',
								'default' => '',
							),
							'dateBorderRadiusTablet'                    => array(
								'type'    => 'number',
								'default' => '',
							),
							'dateBorderRadiusMobile'                    => array(
								'type'    => 'number',
								'default' => '',
							),
							'dateBorderRadiusUnitTablet'                => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'dateBorderRadiusUnitMobile'                => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'dateBorderRadiusDecimalTablet'             => array(
								'type'    => 'number',
								'default' => '',
							),
							'dateBorderRadiusDecimalMobile'             => array(
								'type'    => 'number',
								'default' => '',
							),
							'imageMarginBottom'                         => array(
								'type'    => 'number',
								'default' => '',
							),
							'imageMarginBottomUnit'                     => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'imageMarginBottomDecimal'                  => array(
								'type'    => 'number',
								'default' => '',
							),
							'imageMarginBottomTablet'                   => array(
								'type'    => 'number',
								'default' => '',
							),
							'imageMarginBottomMobile'                   => array(
								'type'    => 'number',
								'default' => '',
							),
							'imageMarginBottomUnitTablet'               => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'imageMarginBottomUnitMobile'               => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'imageMarginBottomDecimalTablet'            => array(
								'type'    => 'number',
								'default' => '',
							),
							'imageMarginBottomDecimalMobile'            => array(
								'type'    => 'number',
								'default' => '',
							),
							'dateHorizontalOffset'                      => array(
								'type'    => 'number',
								'default' => '',
							),
							'dateHorizontalOffsetUnit'                  => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'dateHorizontalOffsetDecimal'               => array(
								'type'    => 'number',
								'default' => '',
							),
							'dateHorizontalOffsetTablet'                => array(
								'type'    => 'number',
								'default' => '',
							),
							'dateHorizontalOffsetMobile'                => array(
								'type'    => 'number',
								'default' => '',
							),
							'dateHorizontalOffsetUnitTablet'            => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'dateHorizontalOffsetUnitMobile'            => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'dateHorizontalOffsetDecimalTablet'         => array(
								'type'    => 'number',
								'default' => '',
							),
							'dateHorizontalOffsetDecimalMobile'         => array(
								'type'    => 'number',
								'default' => '',
							),
							'minimalItemPaddingTop'                     => array(
								'type'    => 'number',
								'default' => '',
							),
							'minimalItemPaddingTopUnit'                 => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'minimalItemPaddingTopDecimal'              => array(
								'type'    => 'number',
								'default' => '',
							),
							'minimalItemPaddingTopTablet'               => array(
								'type'    => 'number',
								'default' => '',
							),
							'minimalItemPaddingTopMobile'               => array(
								'type'    => 'number',
								'default' => '',
							),
							'minimalItemPaddingTopUnitTablet'           => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'minimalItemPaddingTopUnitMobile'           => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'minimalItemPaddingTopDecimalTablet'        => array(
								'type'    => 'number',
								'default' => '',
							),
							'minimalItemPaddingTopDecimalMobile'        => array(
								'type'    => 'number',
								'default' => '',
							),
							'minimalBorderTopThickness'                 => array(
								'type'    => 'number',
								'default' => '',
							),
							'minimalBorderTopThicknessUnit'             => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'minimalBorderTopThicknessDecimal'          => array(
								'type'    => 'number',
								'default' => '',
							),
							'minimalBorderTopThicknessTablet'           => array(
								'type'    => 'number',
								'default' => '',
							),
							'minimalBorderTopThicknessMobile'           => array(
								'type'    => 'number',
								'default' => '',
							),
							'minimalBorderTopThicknessUnitTablet'       => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'minimalBorderTopThicknessUnitMobile'       => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'minimalBorderTopThicknessDecimalTablet'    => array(
								'type'    => 'number',
								'default' => '',
							),
							'minimalBorderTopThicknessDecimalMobile'    => array(
								'type'    => 'number',
								'default' => '',
							),
							'sideImageWidth'                            => array(
								'type'    => 'number',
								'default' => '',
							),
							'sideImageWidthUnit'                        => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'sideImageWidthDecimal'                     => array(
								'type'    => 'number',
								'default' => '',
							),
							'sideImageWidthTablet'                      => array(
								'type'    => 'number',
								'default' => '',
							),
							'sideImageWidthMobile'                      => array(
								'type'    => 'number',
								'default' => '',
							),
							'sideImageWidthUnitTablet'                  => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'sideImageWidthUnitMobile'                  => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'sideImageWidthDecimalTablet'               => array(
								'type'    => 'number',
								'default' => '',
							),
							'sideImageWidthDecimalMobile'               => array(
								'type'    => 'number',
								'default' => '',
							),
						),
						qi_blocks_get_block_option_typography_attributes( 'standardBottomInfo' ),
						qi_blocks_get_block_option_typography_attributes( 'buttonText' ),
						array(
							'buttonIcon'                                => array(
								'type'    => 'object',
								'default' => array(
									'html' => '',
								),
							),
							'buttonIconColor'                           => array(
								'type'    => 'string',
								'default' => '',
							),
							'buttonIconFontSize'                        => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonIconFontSizeUnit'                    => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'buttonIconFontSizeDecimal'                 => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonIconFontSizeTablet'                  => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonIconFontSizeMobile'                  => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonIconFontSizeUnitTablet'              => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'buttonIconFontSizeUnitMobile'              => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'buttonIconFontSizeDecimalTablet'           => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonIconFontSizeDecimalMobile'           => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderWidthTop'                      => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderWidthTopTablet'                => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderWidthTopMobile'                => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderWidthTopDecimal'               => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderWidthTopDecimalTablet'         => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderWidthTopDecimalMobile'         => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderWidthRight'                    => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderWidthRightTablet'              => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderWidthRightMobile'              => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderWidthRightDecimal'             => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderWidthRightDecimalTablet'       => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderWidthRightDecimalMobile'       => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderWidthBottom'                   => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderWidthBottomTablet'             => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderWidthBottomMobile'             => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderWidthBottomDecimal'            => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderWidthBottomDecimalTablet'      => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderWidthBottomDecimalMobile'      => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderWidthLeft'                     => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderWidthLeftTablet'               => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderWidthLeftMobile'               => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderWidthLeftDecimal'              => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderWidthLeftDecimalTablet'        => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderWidthLeftDecimalMobile'        => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderWidthUnit'                     => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'buttonBorderWidthUnitTablet'               => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'buttonBorderWidthUnitMobile'               => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'buttonBorderRadiusTop'                     => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderRadiusTopTablet'               => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderRadiusTopMobile'               => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderRadiusTopDecimal'              => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderRadiusTopDecimalTablet'        => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderRadiusTopDecimalMobile'        => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderRadiusRight'                   => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderRadiusRightTablet'             => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderRadiusRightMobile'             => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderRadiusRightDecimal'            => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderRadiusRightDecimalTablet'      => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderRadiusRightDecimalMobile'      => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderRadiusBottom'                  => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderRadiusBottomTablet'            => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderRadiusBottomMobile'            => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderRadiusBottomDecimal'           => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderRadiusBottomDecimalTablet'     => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderRadiusBottomDecimalMobile'     => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderRadiusLeft'                    => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderRadiusLeftTablet'              => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderRadiusLeftMobile'              => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderRadiusLeftDecimal'             => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderRadiusLeftDecimalTablet'       => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderRadiusLeftDecimalMobile'       => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonBorderRadiusUnit'                    => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'buttonBorderRadiusUnitTablet'              => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'buttonBorderRadiusUnitMobile'              => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'buttonPaddingTop'                          => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonPaddingTopTablet'                    => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonPaddingTopMobile'                    => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonPaddingTopDecimal'                   => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonPaddingTopDecimalTablet'             => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonPaddingTopDecimalMobile'             => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonPaddingRight'                        => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonPaddingRightTablet'                  => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonPaddingRightMobile'                  => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonPaddingRightDecimal'                 => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonPaddingRightDecimalTablet'           => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonPaddingRightDecimalMobile'           => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonPaddingBottom'                       => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonPaddingBottomTablet'                 => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonPaddingBottomMobile'                 => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonPaddingBottomDecimal'                => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonPaddingBottomDecimalTablet'          => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonPaddingBottomDecimalMobile'          => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonPaddingLeft'                         => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonPaddingLeftTablet'                   => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonPaddingLeftMobile'                   => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonPaddingLeftDecimal'                  => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonPaddingLeftDecimalTablet'            => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonPaddingLeftDecimalMobile'            => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonPaddingUnit'                         => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'buttonPaddingUnitTablet'                   => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'buttonPaddingUnitMobile'                   => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'iconMarginTop'                             => array(
								'type'    => 'number',
								'default' => '',
							),
							'iconMarginTopTablet'                       => array(
								'type'    => 'number',
								'default' => '',
							),
							'iconMarginTopMobile'                       => array(
								'type'    => 'number',
								'default' => '',
							),
							'iconMarginTopDecimal'                      => array(
								'type'    => 'number',
								'default' => '',
							),
							'iconMarginTopDecimalTablet'                => array(
								'type'    => 'number',
								'default' => '',
							),
							'iconMarginTopDecimalMobile'                => array(
								'type'    => 'number',
								'default' => '',
							),
							'iconMarginRight'                           => array(
								'type'    => 'number',
								'default' => '',
							),
							'iconMarginRightTablet'                     => array(
								'type'    => 'number',
								'default' => '',
							),
							'iconMarginRightMobile'                     => array(
								'type'    => 'number',
								'default' => '',
							),
							'iconMarginRightDecimal'                    => array(
								'type'    => 'number',
								'default' => '',
							),
							'iconMarginRightDecimalTablet'              => array(
								'type'    => 'number',
								'default' => '',
							),
							'iconMarginRightDecimalMobile'              => array(
								'type'    => 'number',
								'default' => '',
							),
							'iconMarginBottom'                          => array(
								'type'    => 'number',
								'default' => '',
							),
							'iconMarginBottomTablet'                    => array(
								'type'    => 'number',
								'default' => '',
							),
							'iconMarginBottomMobile'                    => array(
								'type'    => 'number',
								'default' => '',
							),
							'iconMarginBottomDecimal'                   => array(
								'type'    => 'number',
								'default' => '',
							),
							'iconMarginBottomDecimalTablet'             => array(
								'type'    => 'number',
								'default' => '',
							),
							'iconMarginBottomDecimalMobile'             => array(
								'type'    => 'number',
								'default' => '',
							),
							'iconMarginLeft'                            => array(
								'type'    => 'number',
								'default' => '',
							),
							'iconMarginLeftTablet'                      => array(
								'type'    => 'number',
								'default' => '',
							),
							'iconMarginLeftMobile'                      => array(
								'type'    => 'number',
								'default' => '',
							),
							'iconMarginLeftDecimal'                     => array(
								'type'    => 'number',
								'default' => '',
							),
							'iconMarginLeftDecimalTablet'               => array(
								'type'    => 'number',
								'default' => '',
							),
							'iconMarginLeftDecimalMobile'               => array(
								'type'    => 'number',
								'default' => '',
							),
							'iconMarginUnit'                            => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'iconMarginUnitTablet'                      => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'iconMarginUnitMobile'                      => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'imageBorderRadiusTop'                      => array(
								'type'    => 'number',
								'default' => '',
							),
							'imageBorderRadiusTopTablet'                => array(
								'type'    => 'number',
								'default' => '',
							),
							'imageBorderRadiusTopMobile'                => array(
								'type'    => 'number',
								'default' => '',
							),
							'imageBorderRadiusTopDecimal'               => array(
								'type'    => 'number',
								'default' => '',
							),
							'imageBorderRadiusTopDecimalTablet'         => array(
								'type'    => 'number',
								'default' => '',
							),
							'imageBorderRadiusTopDecimalMobile'         => array(
								'type'    => 'number',
								'default' => '',
							),
							'imageBorderRadiusRight'                    => array(
								'type'    => 'number',
								'default' => '',
							),
							'imageBorderRadiusRightTablet'              => array(
								'type'    => 'number',
								'default' => '',
							),
							'imageBorderRadiusRightMobile'              => array(
								'type'    => 'number',
								'default' => '',
							),
							'imageBorderRadiusRightDecimal'             => array(
								'type'    => 'number',
								'default' => '',
							),
							'imageBorderRadiusRightDecimalTablet'       => array(
								'type'    => 'number',
								'default' => '',
							),
							'imageBorderRadiusRightDecimalMobile'       => array(
								'type'    => 'number',
								'default' => '',
							),
							'imageBorderRadiusBottom'                   => array(
								'type'    => 'number',
								'default' => '',
							),
							'imageBorderRadiusBottomTablet'             => array(
								'type'    => 'number',
								'default' => '',
							),
							'imageBorderRadiusBottomMobile'             => array(
								'type'    => 'number',
								'default' => '',
							),
							'imageBorderRadiusBottomDecimal'            => array(
								'type'    => 'number',
								'default' => '',
							),
							'imageBorderRadiusBottomDecimalTablet'      => array(
								'type'    => 'number',
								'default' => '',
							),
							'imageBorderRadiusBottomDecimalMobile'      => array(
								'type'    => 'number',
								'default' => '',
							),
							'imageBorderRadiusLeft'                     => array(
								'type'    => 'number',
								'default' => '',
							),
							'imageBorderRadiusLeftTablet'               => array(
								'type'    => 'number',
								'default' => '',
							),
							'imageBorderRadiusLeftMobile'               => array(
								'type'    => 'number',
								'default' => '',
							),
							'imageBorderRadiusLeftDecimal'              => array(
								'type'    => 'number',
								'default' => '',
							),
							'imageBorderRadiusLeftDecimalTablet'        => array(
								'type'    => 'number',
								'default' => '',
							),
							'imageBorderRadiusLeftDecimalMobile'        => array(
								'type'    => 'number',
								'default' => '',
							),
							'imageBorderRadiusUnit'                     => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'imageBorderRadiusUnitTablet'               => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'imageBorderRadiusUnitMobile'               => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'buttonUnderlineWidth'                      => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonUnderlineWidthUnit'                  => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'buttonUnderlineWidthDecimal'               => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonUnderlineWidthTablet'                => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonUnderlineWidthMobile'                => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonUnderlineWidthUnitTablet'            => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'buttonUnderlineWidthUnitMobile'            => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'buttonUnderlineWidthDecimalTablet'         => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonUnderlineWidthDecimalMobile'         => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonUnderlineHoverWidth'                 => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonUnderlineHoverWidthUnit'             => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'buttonUnderlineHoverWidthDecimal'          => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonUnderlineHoverWidthTablet'           => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonUnderlineHoverWidthMobile'           => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonUnderlineHoverWidthUnitTablet'       => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'buttonUnderlineHoverWidthUnitMobile'       => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'buttonUnderlineHoverWidthDecimalTablet'    => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonUnderlineHoverWidthDecimalMobile'    => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonUnderlineThickness'                  => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonUnderlineThicknessUnit'              => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'buttonUnderlineThicknessDecimal'           => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonUnderlineThicknessTablet'            => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonUnderlineThicknessMobile'            => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonUnderlineThicknessUnitTablet'        => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'buttonUnderlineThicknessUnitMobile'        => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'buttonUnderlineThicknessDecimalTablet'     => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonUnderlineThicknessDecimalMobile'     => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonInnerBorderOffset'                   => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonInnerBorderOffsetUnit'               => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'buttonInnerBorderOffsetDecimal'            => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonInnerBorderOffsetTablet'             => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonInnerBorderOffsetMobile'             => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonInnerBorderOffsetUnitTablet'         => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'buttonInnerBorderOffsetUnitMobile'         => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'buttonInnerBorderOffsetDecimalTablet'      => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonInnerBorderOffsetDecimalMobile'      => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonUnderlineOffset'                     => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonUnderlineOffsetUnit'                 => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'buttonUnderlineOffsetTablet'               => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonUnderlineOffsetMobile'               => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonUnderlineOffsetUnitTablet'           => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'buttonUnderlineOffsetUnitMobile'           => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'buttonIconSideBorderHeight'                => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonIconSideBorderHeightUnit'            => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'buttonIconSideBorderHeightTablet'          => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonIconSideBorderHeightMobile'          => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonIconSideBorderHeightUnitTablet'      => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'buttonIconSideBorderHeightUnitMobile'      => array(
								'type'    => 'string',
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
							'buttonIconSideBorderWidth'                 => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonIconSideBorderWidthUnit'             => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'buttonIconSideBorderWidthTablet'           => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonIconSideBorderWidthMobile'           => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonIconSideBorderWidthUnitTablet'       => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'buttonIconSideBorderWidthUnitMobile'       => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'buttonInnerBorderWidth'                    => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonInnerBorderWidthUnit'                => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'buttonInnerBorderWidthTablet'              => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonInnerBorderWidthMobile'              => array(
								'type'    => 'number',
								'default' => '',
							),
							'buttonInnerBorderWidthUnitTablet'          => array(
								'type'    => 'string',
								'default' => 'px',
							),
							'buttonInnerBorderWidthUnitMobile'          => array(
								'type'    => 'string',
								'default' => 'px',
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
		 * @return Qi_Blocks_Blog_List_Block
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function dynamic_render_callback( $attributes ) {
			$inherit_global_query = isset( $attributes['inheritGlobalQuery'] ) && ! empty( $attributes['inheritGlobalQuery'] );

			if ( $inherit_global_query ) {
				global $wp_query;

				$query_result = $wp_query;
			} else {
				$attributes['additional_query_args'] = qi_blocks_get_additional_query_args( $attributes );

				$query_result = new WP_Query( qi_blocks_get_query_params( $attributes ) );
			}

			$attributes['query_result'] = $query_result;

			$attributes['holder_classes']  = qi_blocks_get_blog_list_holder_classes( $attributes );
			$attributes['layout']          = $attributes['itemLayout'];
			$attributes['masonry_classes'] = isset( $attributes['behavior'] ) && 'masonry' === $attributes['behavior'] ? qi_blocks_get_blog_list_masonry_classes( $attributes ) : '';
			$attributes['item_classes']    = 'qodef-blog-item qodef-e qodef-gutenberg-column';

			return qi_blocks_get_template_part( 'blocks/blog-list', 'templates/content', $attributes['behavior'], $attributes );
		}
	}

	Qi_Blocks_Blog_List_Block::get_instance();
}
