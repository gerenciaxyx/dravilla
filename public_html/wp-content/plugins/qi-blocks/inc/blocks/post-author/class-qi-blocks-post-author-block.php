<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Qi_Blocks_Post_Author_Block' ) ) {
	class Qi_Blocks_Post_Author_Block extends Qi_Blocks_Blocks {
		private static $instance;

		public function __construct() {
			// Set block data.
			$this->set_block_name( 'post-author' );
			$this->set_block_title( esc_html__( 'Post Author', 'qi-blocks' ) );
			$this->set_block_subcategory( esc_html__( 'Content', 'qi-blocks' ) );
			$this->set_block_demo_url( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/post-author/#post-author' );
			$this->set_block_documentation( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#post_author' );

			$block_options = array(
				'render_callback' => array( $this, 'dynamic_render_callback' ),
				'uses_context'    => array(
					'postType',
					'postId',
					'queryId',
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
						'showAvatar' => array(
							'type' => 'boolean',
							'default' => false,
						),
						'avatarSize' => array(
							'type' => 'number',
							'default' => 48,
						),
						'byLine' => array(
							'type' => 'string',
							'default' => '',
						),
						'authorColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'authorHoverColor' => array(
							'type' => 'string',
							'default' => '',
						),
					),
					qi_blocks_get_block_option_typography_attributes( 'author' ),
					qi_blocks_get_block_option_typography_attributes( 'authorByLine' ),
					array(
						'authorByLineColor' => array(
							'type' => 'string',
							'default' => '',
						),
						'authorByLineMarginRight' => array(
							'type' => 'number',
							'default' => '',
						),
						'authorByLineMarginRightUnit' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'authorByLineMarginRightDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'avatarMarginRight' => array(
							'type' => 'number',
							'default' => '',
						),
						'avatarMarginRightUnit' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'avatarMarginRightDecimal' => array(
							'type' => 'number',
							'default' => '',
						),
						'avatarBorderRadius' => array(
							'type' => 'number',
							'default' => '',
						),
						'avatarBorderRadiusUnit' => array(
							'type' => 'string',
							'default' => 'px',
						),
						'avatarBorderRadiusDecimal' => array(
							'type' => 'number',
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
		 * @return Qi_Blocks_Post_Author_Block
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

			$post_ID   = $block->context['postId'];
			$author_id = get_post_field( 'post_author', $post_ID );

			if ( ! empty( $author_id ) ) {
				$block_classes = qi_blocks_get_block_holder_classes( 'post-author', $attributes );
				$avatar        = get_avatar( $author_id, $attributes['avatarSize'] || 48 );

				$html .= '<div ' . qi_blocks_get_block_container_html_attributes_string( $attributes ) . '>';
				$html .= '<div class="' . implode( ' ', $block_classes ) . '">';

				if ( ! empty( $attributes['showAvatar'] ) ) {
					$html .= '<div class="qodef-m-avatar">' . $avatar . '</div>';
				}

				$html .= '<div class="qodef-m-author">';
					if ( ! empty( $attributes['byLine'] ) ) {
						$html .= '<div class="qodef-m-author-by-line">' . esc_html( $attributes['byLine'] ) . '</div>';
					}
					$html .= '<p class="qodef-m-author-name">' . get_the_author_meta( 'display_name', $author_id ) . '</p>';
				$html .= '</div>';

				$html .= '</div>';
				$html .= '</div>';
			}

			return $html;
		}
	}

	Qi_Blocks_Post_Author_Block::get_instance();
}
