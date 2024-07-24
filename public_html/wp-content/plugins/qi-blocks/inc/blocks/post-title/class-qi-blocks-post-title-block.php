<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Qi_Blocks_Post_Title_Block' ) ) {
	class Qi_Blocks_Post_Title_Block extends Qi_Blocks_Blocks {
		private static $instance;

		public function __construct() {
			// Set block data.
			$this->set_block_name( 'post-title' );
			$this->set_block_title( esc_html__( 'Post Title', 'qi-blocks' ) );
			$this->set_block_subcategory( esc_html__( 'Content', 'qi-blocks' ) );
			$this->set_block_demo_url( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/post-title/#post-title' );
			$this->set_block_documentation( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#post_title' );

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
						'isLink'                         => array(
							'type'    => 'boolean',
							'default' => false,
						),
						'titleTag'                       => array(
							'type'    => 'string',
							'default' => 'h2',
						),
						'titleColor'                     => array(
							'type'    => 'string',
							'default' => '',
						),
						'titleHoverColor'                => array(
							'type'    => 'string',
							'default' => '',
						),
						'titleHorizontalAlignment'       => array(
							'type'    => 'string',
							'default' => '',
						),
						'titleHorizontalAlignmentTablet' => array(
							'type'    => 'string',
							'default' => '',
						),
						'titleHorizontalAlignmentMobile' => array(
							'type'    => 'string',
							'default' => '',
						),
					),
					qi_blocks_get_block_option_typography_attributes( 'title' )
				),
			);

			$this->set_block_options( $block_options );

			parent::__construct();
		}

		/**
		 * Module class instance
		 *
		 * @return Qi_Blocks_Post_Title_Block
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

			$post_ID    = $block->context['postId'];
			$post_title = get_the_title( $post_ID );
			$title_tag  = isset( $attributes['titleTag'] ) && ! empty( $attributes['titleTag'] ) ? $attributes['titleTag'] : 'h2';

			if ( ! empty( $post_title ) ) {
				$block_classes = qi_blocks_get_block_holder_classes( 'post-title', $attributes );

				$html .= '<div ' . qi_blocks_get_block_container_html_attributes_string( $attributes ) . '>';
				$html .= '<div class="' . implode( ' ', $block_classes ) . '">';

				$html .= '<' . qi_blocks_escape_title_tag( $title_tag ) . ' class="qodef-m-title">';

					if ( isset( $attributes['isLink'] ) && $attributes['isLink'] ) {
						$html .= '<a class="qodef-m-link" href="' . get_the_permalink( $post_ID ) . '">';
					}

					$html .= wp_kses_post( $post_title );

					if ( isset( $attributes['isLink'] ) && $attributes['isLink'] ) {
						$html .= '</a>';
					}

				$html .= '</' . qi_blocks_escape_title_tag( $title_tag ) . '>';

				$html .= '</div>';
				$html .= '</div>';
			}

			return $html;
		}
	}

	Qi_Blocks_Post_Title_Block::get_instance();
}
