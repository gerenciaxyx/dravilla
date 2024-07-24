<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Qi_Blocks_Post_Date_Block' ) ) {
	class Qi_Blocks_Post_Date_Block extends Qi_Blocks_Blocks {
		private static $instance;

		public function __construct() {
			// Set block data.
			$this->set_block_name( 'post-date' );
			$this->set_block_title( esc_html__( 'Post Date', 'qi-blocks' ) );
			$this->set_block_subcategory( esc_html__( 'Content', 'qi-blocks' ) );
			$this->set_block_demo_url( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/post-dates/#post-dates' );
			$this->set_block_documentation( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#post_date' );

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
						'dateFormat' => array(
							'type' => 'string',
							'default' => '',
						),
						'isLink' => array(
							'type' => 'boolean',
							'default' => false,
						),
						'dateColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'dateHoverColor' => array(
							'type' => 'string',
							'default' => '',
						),
					),
					qi_blocks_get_block_option_typography_attributes( 'date' )
				),
			);

			$this->set_block_options( $block_options );

			parent::__construct();
		}

		/**
		 * Module class instance
		 *
		 * @return Qi_Blocks_Post_Date_Block
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

			$post_ID        = $block->context['postId'];
			$formatted_date = get_the_date( empty( $attributes['dateFormat'] ) ? '' : $attributes['dateFormat'], $post_ID );

			if ( isset( $attributes['isLink'] ) && $attributes['isLink'] ) {
				$formatted_date = sprintf( '<a class="qodef-m-link" href="%1s">%2s</a>', get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ), $formatted_date );
			}

			if ( ! empty( $formatted_date ) ) {
				$block_classes = qi_blocks_get_block_holder_classes( 'post-date', $attributes );

				$html .= '<div ' . qi_blocks_get_block_container_html_attributes_string( $attributes ) . '>';
				$html .= '<div class="' . implode( ' ', $block_classes ) . '">';

				$html .= sprintf(
					'<time class="qodef-m-date" datetime="%1$s">%2$s</time>',
					esc_attr( get_the_date( 'c', $post_ID ) ),
					$formatted_date
				);

				$html .= '</div>';
				$html .= '</div>';
			}

			return $html;
		}
	}

	Qi_Blocks_Post_Date_Block::get_instance();
}
