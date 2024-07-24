<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Qi_Blocks_Post_Terms_Block' ) ) {
	class Qi_Blocks_Post_Terms_Block extends Qi_Blocks_Blocks {
		private static $instance;

		public function __construct() {
			// Set block data.
			$this->set_block_name( 'post-terms' );
			$this->set_block_title( esc_html__( 'Post Terms', 'qi-blocks' ) );
			$this->set_block_subcategory( esc_html__( 'Content', 'qi-blocks' ) );
			$this->set_block_demo_url( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/post-terms/#post-terms' );
			$this->set_block_documentation( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#post_terms' );

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
						'term' => array(
							'type'    => 'string',
							'default' => 'category',
						),
						'termsLayout' => array(
							'type'    => 'string',
							'default' => 'horizontal',
						),
						'termsSeparator' => array(
							'type'    => 'string',
							'default' => ', ',
						),
						'termColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'termHoverColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'termHoverTextDecoration' => array(
							'type' => 'string',
							'default' => '',
						),
					),
					qi_blocks_get_block_option_typography_attributes( 'term' ),
					array(
						'termSpaceBetweenItems' => array(
							'type' => 'number',
							'default' => '',
						),
						'termSpaceBetweenItemsUnit' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'termSpaceBetweenItemsDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'separatorColor' => array(
							'type' => 'string',
							'default' => '',
						),
					),
					qi_blocks_get_block_option_typography_attributes( 'separator' ),
					array(
						'separatorMarginTop' => array(
							'type' => 'number',
							'default' => '',
						),
						'separatorMarginTopTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'separatorMarginTopMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'separatorMarginTopDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'separatorMarginTopDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'separatorMarginTopDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'separatorMarginRight' => array(
							'type' => 'number',
							'default' => '',
						),
						'separatorMarginRightTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'separatorMarginRightMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'separatorMarginRightDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'separatorMarginRightDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'separatorMarginRightDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'separatorMarginBottom' => array(
							'type' => 'number',
							'default' => '',
						),
						'separatorMarginBottomTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'separatorMarginBottomMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'separatorMarginBottomDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'separatorMarginBottomDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'separatorMarginBottomDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'separatorMarginLeft' => array(
							'type' => 'number',
							'default' => '',
						),
						'separatorMarginLeftTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'separatorMarginLeftMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'separatorMarginLeftDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'separatorMarginLeftDecimalTablet' => array(
							'type' => 'number',
							'default' => '',
						),
						'separatorMarginLeftDecimalMobile' => array(
							'type' => 'number',
							'default' => '',
						),
						'separatorMarginUnit' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'separatorMarginUnitTablet' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'separatorMarginUnitMobile' => array(
							'type' => 'string',
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
		 * @return Qi_Blocks_Post_Terms_Block
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

			if ( ! isset( $attributes['term'] ) && ! is_taxonomy_viewable( $attributes['term'] ) ) {
				return '';
			}

			$post_terms = get_the_terms( $block->context['postId'], $attributes['term'] );

			if ( ! is_wp_error( $post_terms ) && empty( $post_terms ) ) {
				$html = esc_html__( 'Post term items not found.', 'qi-blocks' );
			}

			if ( ! is_wp_error( $post_terms ) && ! empty( $post_terms ) ) {
				$separator = 'horizontal' === $attributes['termsLayout'] && ! empty( $attributes['termsSeparator'] ) ? '<span class="qodef-m-term-separator">' . esc_html( $attributes['termsSeparator'] ) . '</span>' : ' ';

				$block_classes = qi_blocks_get_block_holder_classes( 'post-terms', $attributes );

				if ( ! empty( $attributes['term'] ) ) {
					$block_classes[] = 'qodef-type--' . esc_attr( $attributes['term'] );
				}

				if ( ! empty( $attributes['termsLayout'] ) ) {
					$block_classes[] = 'qodef-layout--' . esc_attr( $attributes['termsLayout'] );
				}

				$html .= '<div ' . qi_blocks_get_block_container_html_attributes_string( $attributes ) . '>';
				$html .= '<div class="' . implode( ' ', $block_classes ) . '">';

				$items = array();
				foreach ( $post_terms as $post_term ) {
					$link = get_term_link( $post_term, $attributes['term'] );

					if ( ! is_wp_error( $link ) ) {
						$items[] = '<a class="qodef-m-term" href="' . esc_url( $link ) . '" rel="tag">' . wp_kses_post( $post_term->name ) . '</a>';
					}
				}
				$html .= implode( $separator, $items );

				$html .= '</div>';
				$html .= '</div>';
			}

			return $html;
		}
	}

	Qi_Blocks_Post_Terms_Block::get_instance();
}
