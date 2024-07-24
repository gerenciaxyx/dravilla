<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Qi_Blocks_Categories_Block' ) ) {
	class Qi_Blocks_Categories_Block extends Qi_Blocks_Blocks {
		private static $instance;

		public function __construct() {
			// Set block data.
			$this->set_block_name( 'categories' );
			$this->set_block_title( esc_html__( 'Categories', 'qi-blocks' ) );
			$this->set_block_subcategory( esc_html__( 'Content', 'qi-blocks' ) );
			$this->set_block_demo_url( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/categories/#categories' );
			$this->set_block_documentation( 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#categories' );

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
						'showPostCounts'                  => array(
							'type'    => 'boolean',
							'default' => false,
						),
						'showEmpty'                       => array(
							'type'    => 'boolean',
							'default' => false,
						),
						'showHierarchy'                   => array(
							'type'    => 'boolean',
							'default' => false,
						),
						'showOnlyTopLevel'                => array(
							'type'    => 'boolean',
							'default' => false,
						),
						'textUnderlineBehavior'                => array(
							'type'    => 'string',
							'default' => '',
						),
						'color'                           => array(
							'type'    => 'string',
							'default' => '',
						),
						'hoverColor'                      => array(
							'type'    => 'string',
							'default' => '',
						),
					),
					qi_blocks_get_block_option_typography_attributes( 'categories' ),
					array(
						'categoriesSpaceBetweenItems' => array(
							'type'    => 'number',
							'default' => '',
						),
						'categoriesSpaceBetweenItemsUnit' => array(
							'type'    => 'string',
							'default' => 'px',
						),
						'categoriesSpaceBetweenItemsDecimal' => array(
							'type'    => 'number',
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
		 * @return Qi_Blocks_Categories_Block
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
				'echo'         => false,
				'hierarchical' => $attributes['showHierarchy'] ?? true,
				'orderby'      => 'name',
				'show_count'   => $attributes['showPostCounts'] ?? 0,
				'title_li'     => '',
				'hide_empty'   => ! $attributes['showEmpty'] ?? 1,
			);

			if ( $attributes['showOnlyTopLevel'] ) {
				$args['parent'] = 0;
			}

			$categories = wp_list_categories( $args );

			$block_classes = qi_blocks_get_block_holder_classes( 'categories', $attributes );

			if ( ! empty( $attributes['textUnderlineBehavior'] ) ) {
				$block_classes[] = 'qodef-text--' . esc_attr( $attributes['textUnderlineBehavior'] );
			}

			$html .= '<div ' . qi_blocks_get_block_container_html_attributes_string( $attributes ) . '>';
			$html .= '<div class="' . implode( ' ', $block_classes ) . '">';

			if ( ! empty( $categories ) ) {
				$html .= '<ul>' . $categories . '</ul>';
			} else {
				$html .= '<p class="qodef-m-terms-not-found">' . esc_html__( 'No terms were found for provided query parameters.', 'qi-blocks' ) . '</p>';
			}

			$html .= '</div>';
			$html .= '</div>';

			return $html;
		}
	}

	Qi_Blocks_Categories_Block::get_instance();
}
