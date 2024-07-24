<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Qi_Blocks_Tag_Cloud_Block' ) ) {
	class Qi_Blocks_Tag_Cloud_Block extends Qi_Blocks_Blocks {
		private static $instance;

		public function __construct() {
			// Set block data.
			$this->set_block_name( 'tag-cloud' );
			$this->set_block_title( esc_html__( 'Tag Cloud', 'qi-blocks' ) );
			$this->set_block_subcategory( esc_html__( 'Content', 'qi-blocks' ) );
			$this->set_block_demo_url( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/tag-cloud/#tag-cloud' );
			$this->set_block_documentation( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#tag_cloud' );

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
						'taxonomy'                   => array(
							'type'    => 'string',
							'default' => 'post_tag',
						),
						'numberOfTags'               => array(
							'type'    => 'number',
							'default' => 45,
						),
						'showTagCounts'              => array(
							'type'    => 'boolean',
							'default' => false,
						),
						'termsSeparator'                   => array(
							'type'    => 'string',
							'default' => ',',
						),
					),
					qi_blocks_get_block_option_typography_attributes( 'tag' ),
					array(
						'color'                        => array(
							'type'    => 'string',
							'default' => '',
						),
						'hoverColor'                   => array(
							'type'    => 'string',
							'default' => '',
						),
						'hoverTextDecoration'          => array(
							'type'    => 'string',
							'default' => '',
						),
						'tagMarginRight'               => array(
							'type'    => 'number',
							'default' => '',
						),
						'tagMarginRightTablet'         => array(
							'type'    => 'number',
							'default' => '',
						),
						'tagMarginRightMobile'         => array(
							'type'    => 'number',
							'default' => '',
						),
						'tagMarginRightDecimal'        => array(
							'type'    => 'number',
							'default' => '',
						),
						'tagMarginRightDecimalTablet'  => array(
							'type'    => 'number',
							'default' => '',
						),
						'tagMarginRightDecimalMobile'  => array(
							'type'    => 'number',
							'default' => '',
						),
						'tagMarginBottom'              => array(
							'type'    => 'number',
							'default' => '',
						),
						'tagMarginBottomTablet'        => array(
							'type'    => 'number',
							'default' => '',
						),
						'tagMarginBottomMobile'        => array(
							'type'    => 'number',
							'default' => '',
						),
						'tagMarginBottomDecimal'       => array(
							'type'    => 'number',
							'default' => '',
						),
						'tagMarginBottomDecimalTablet' => array(
							'type'    => 'number',
							'default' => '',
						),
						'tagMarginBottomDecimalMobile' => array(
							'type'    => 'number',
							'default' => '',
						),
						'tagMarginUnit'                => array(
							'type'    => 'string',
							'default' => 'px',
						),
						'tagMarginUnitTablet'          => array(
							'type'    => 'string',
							'default' => 'px',
						),
						'tagMarginUnitMobile'          => array(
							'type'    => 'string',
							'default' => 'px',
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
		 * @return Qi_Blocks_Tag_Cloud_Block
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function dynamic_render_callback( $attributes ) {
			$html = '';

			$args = array(
				'taxonomy' => esc_attr( $attributes['taxonomy'] ),
				'number'   => isset( $attributes['numberOfTags'] ) ? intval( $attributes['numberOfTags'] ) : '',
				'orderby'  => 'name',
				'order'    => 'ASC',
			);

			$tags = get_tags( $args );

			$block_classes = qi_blocks_get_block_holder_classes( 'tag-cloud', $attributes );

			$html .= '<div ' . qi_blocks_get_block_container_html_attributes_string( $attributes ) . '>';
			$html .= '<div class="' . implode( ' ', $block_classes ) . '">';

			if ( ! empty( $tags ) ) {
				foreach ( $tags as $tag ) {
					$tag_link = get_tag_link( $tag->term_id );

					$html .= '<a href="' . esc_url( $tag_link ) . '" class="qodef-e-item ' . esc_attr( $tag->slug ) . '">';
					$html .= esc_html( $tag->name );

					if ( $attributes['showTagCounts'] ) {
						$html .= '<span class="qodef-e-item-count">(' . esc_html( $tag->count ) . ')</span>';
					}

					if ( $attributes['termsSeparator'] ) {
						$html .= '<span class="qodef-e-item-separator">' . esc_attr( $attributes['termsSeparator'] ) . '</span>';
					}

					$html .= '</a>';
				}
			} else {
				$html .= '<p class="qodef-m-terms-not-found">'. esc_html__( 'No terms were found for provided query parameters.', 'qi-blocks' ) .'</p>';
			}

			$html .= '</div>';
			$html .= '</div>';

			return $html;
		}
	}

	Qi_Blocks_Tag_Cloud_Block::get_instance();
}
