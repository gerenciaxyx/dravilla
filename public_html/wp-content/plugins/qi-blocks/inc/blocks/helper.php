<?php

if ( ! function_exists( 'qi_blocks_get_the_block_template_html' ) ) {
	/**
	 * Function that returns the markup for the current template.
	 *
	 * @see get_the_block_template_html()
	 *
	 * @return string Block template markup.
	 */
	function qi_blocks_get_the_block_template_html() {
		$content = get_transient( '_qi_blocks_get_the_block_template_html ');

		if ( empty( $content ) ) {
			$content = get_the_block_template_html();

			set_transient( '_qi_blocks_get_the_block_template_html', $content, 5 );
		}

		return $content;
	}
}

if ( ! function_exists( 'qi_blocks_get_premium_blocks_list' ) ) {
	/**
	 * Function that return premium blocks list
	 *
	 * @return array
	 */
	function qi_blocks_get_premium_blocks_list() {
		$block_status = apply_filters( 'qi_blocks_filter_block_status', false );
		$premium_flag = qi_blocks_is_installed( 'premium' ) && $block_status;

		if ( $premium_flag ) {
			return array();
		}

		return array(
			'add-to-cart-button'        => array(
				'type'          => 'premium',
				'title'         => esc_attr__( 'Add to Cart Button', 'qi-blocks' ),
				'subcategory'   => esc_attr__( 'WooCommerce', 'qi-blocks' ),
				'demo'          => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/add-to-cart-button/',
				'documentation' => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#add_to_cart_button',
			),
			'advanced-navigation'       => array(
				'type'          => 'premium',
				'title'         => esc_attr__( 'Advanced Navigation', 'qi-blocks' ),
				'subcategory'   => esc_attr__( 'Showcase/Presentational', 'qi-blocks' ),
				'demo'          => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/advanced-navigation/',
				'documentation' => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#advanced_navigation',
			),
			'animated-text'             => array(
				'type'          => 'premium',
				'title'         => esc_attr__( 'Animated Text', 'qi-blocks' ),
				'subcategory'   => esc_attr__( 'Typography', 'qi-blocks' ),
				'demo'          => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/animated-text/',
				'documentation' => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#animated_text',
			),
			'blockquote'                => array(
				'type'          => 'premium',
				'title'         => esc_attr__( 'Blockquote', 'qi-blocks' ),
				'subcategory'   => esc_attr__( 'Typography', 'qi-blocks' ),
				'demo'          => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/blockquote/',
				'documentation' => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#blockquote',
			),
			'blog-slider'               => array(
				'type'          => 'premium',
				'title'         => esc_attr__( 'Blog Carousel', 'qi-blocks' ),
				'subcategory'   => esc_attr__( 'Business', 'qi-blocks' ),
				'demo'          => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/blog-carousel/',
				'documentation' => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#blog_carousel',
			),
			'business-hours'            => array(
				'type'          => 'premium',
				'title'         => esc_attr__( 'Working Hours', 'qi-blocks' ),
				'subcategory'   => esc_attr__( 'Business', 'qi-blocks' ),
				'demo'          => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/working-hours/',
				'documentation' => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#working_hours',
			),
			'cards-slider'              => array(
				'type'          => 'premium',
				'title'         => esc_attr__( 'Cards Slider', 'qi-blocks' ),
				'subcategory'   => esc_attr__( 'Showcase/Presentational', 'qi-blocks' ),
				'demo'          => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/cards-slider/',
				'documentation' => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#cards_slider',
			),
			'charts'                    => array(
				'type'          => 'premium',
				'title'         => esc_attr__( 'Pie and Donut Charts', 'qi-blocks' ),
				'subcategory'   => esc_attr__( 'Infographics', 'qi-blocks' ),
				'demo'          => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/pie-and-donut-charts/',
				'documentation' => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#pie_and_donut_charts',
			),
			'clients-slider'            => array(
				'type'          => 'premium',
				'title'         => esc_attr__( 'Clients Carousel', 'qi-blocks' ),
				'subcategory'   => esc_attr__( 'Business', 'qi-blocks' ),
				'demo'          => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/clients-carousel/',
				'documentation' => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#clients_carousel',
			),
			'content-menu'              => array(
				'type'          => 'premium',
				'title'         => esc_attr__( 'Content Menu', 'qi-blocks' ),
				'subcategory'   => esc_attr__( 'Showcase/Presentational', 'qi-blocks' ),
				'demo'          => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/content-menu/',
				'documentation' => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#content_menu',
			),
			'data-table'                => array(
				'type'          => 'premium',
				'title'         => esc_attr__( 'Data Table', 'qi-blocks' ),
				'subcategory'   => esc_attr__( 'Business', 'qi-blocks' ),
				'demo'          => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/data-table/',
				'documentation' => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#data_table',
			),
			'device-carousel'           => array(
				'type'          => 'premium',
				'title'         => esc_attr__( 'Device Frame Carousel', 'qi-blocks' ),
				'subcategory'   => esc_attr__( 'Creative', 'qi-blocks' ),
				'demo'          => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/device-frame-carousel/',
				'documentation' => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#device_frame_carousel',
			),
			'device-slider'             => array(
				'type'          => 'premium',
				'title'         => esc_attr__( 'Device Frame Slider', 'qi-blocks' ),
				'subcategory'   => esc_attr__( 'Creative', 'qi-blocks' ),
				'demo'          => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/device-frame-slider/',
				'documentation' => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#device_frame_slider',
			),
			'dropcaps'                  => array(
				'type'          => 'premium',
				'title'         => esc_attr__( 'Drop Caps', 'qi-blocks' ),
				'subcategory'   => esc_attr__( 'Typography', 'qi-blocks' ),
				'demo'          => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/drop-caps/',
				'documentation' => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#drop_caps',
			),
			'dual-image-with-content'   => array(
				'type'          => 'premium',
				'title'         => esc_attr__( 'Dual Image with Content', 'qi-blocks' ),
				'subcategory'   => esc_attr__( 'Showcase/Presentational', 'qi-blocks' ),
				'demo'          => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/dual-image-with-content/',
				'documentation' => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#dual_image_with_content',
			),
			'google-map'                => array(
				'type'          => 'premium',
				'title'         => esc_attr__( 'Google Map', 'qi-blocks' ),
				'subcategory'   => esc_attr__( 'Business', 'qi-blocks' ),
				'demo'          => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/google-map/',
				'documentation' => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#google_map',
			),
			'graphs'                    => array(
				'type'          => 'premium',
				'title'         => esc_attr__( 'Graphs', 'qi-blocks' ),
				'subcategory'   => esc_attr__( 'Infographics', 'qi-blocks' ),
				'demo'          => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/graphs/',
				'documentation' => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#graphs',
			),
			'highlight'                 => array(
				'type'          => 'premium',
				'title'         => esc_attr__( 'Highlighted Text', 'qi-blocks' ),
				'subcategory'   => esc_attr__( 'Typography', 'qi-blocks' ),
				'demo'          => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/highlighted-text/',
				'documentation' => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#highlighted_text',
			),
			'image-hotspots'            => array(
				'type'          => 'premium',
				'title'         => esc_attr__( 'Image Hotspots', 'qi-blocks' ),
				'subcategory'   => esc_attr__( 'Showcase/Presentational', 'qi-blocks' ),
				'demo'          => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/image-hotspots/',
				'documentation' => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#image_hotspots',
			),
			'info-button'               => array(
				'type'          => 'premium',
				'title'         => esc_attr__( 'Info Button', 'qi-blocks' ),
				'subcategory'   => esc_attr__( 'Typography', 'qi-blocks' ),
				'demo'          => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/info-button/',
				'documentation' => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#info_button',
			),
			'interactive-banner'        => array(
				'type'          => 'premium',
				'title'         => esc_attr__( 'Interactive Banners', 'qi-blocks' ),
				'subcategory'   => esc_attr__( 'Business', 'qi-blocks' ),
				'demo'          => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/interactive-banners/',
				'documentation' => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#interactive_banner',
			),
			'interactive-link-showcase' => array(
				'type'          => 'premium',
				'title'         => esc_attr__( 'Interactive Links', 'qi-blocks' ),
				'subcategory'   => esc_attr__( 'Creative', 'qi-blocks' ),
				'demo'          => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/interactive-links/',
				'documentation' => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#interactive_link_showcase',
			),
			'item-showcase'             => array(
				'type'          => 'premium',
				'title'         => esc_attr__( 'Item Showcase', 'qi-blocks' ),
				'subcategory'   => esc_attr__( 'Showcase/Presentational', 'qi-blocks' ),
				'demo'          => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/item-showcase/',
				'documentation' => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#item_showcase',
			),
			'preview-slider'            => array(
				'type'          => 'premium',
				'title'         => esc_attr__( 'Preview Slider', 'qi-blocks' ),
				'subcategory'   => esc_attr__( 'Creative', 'qi-blocks' ),
				'demo'          => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/preview-slider/',
				'documentation' => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#preview_slider',
			),
			'pricing-list'              => array(
				'type'          => 'premium',
				'title'         => esc_attr__( 'Pricing List', 'qi-blocks' ),
				'subcategory'   => esc_attr__( 'Business', 'qi-blocks' ),
				'demo'          => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/pricing-list/',
				'documentation' => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#pricing_list',
			),
			'product-category-list'     => array(
				'type'          => 'premium',
				'title'         => esc_attr__( 'Product Category List', 'qi-blocks' ),
				'subcategory'   => esc_attr__( 'WooCommerce', 'qi-blocks' ),
				'demo'          => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/product-category-list/',
				'documentation' => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#product_category_list',
			),
			'product-slider'            => array(
				'type'          => 'premium',
				'title'         => esc_attr__( 'Product Slider', 'qi-blocks' ),
				'subcategory'   => esc_attr__( 'WooCommerce', 'qi-blocks' ),
				'demo'          => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/product-slider/',
				'documentation' => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#product_slider',
			),
			'rating'                    => array(
				'type'          => 'premium',
				'title'         => esc_attr__( 'Rating', 'qi-blocks' ),
				'subcategory'   => esc_attr__( 'WooCommerce', 'qi-blocks' ),
				'demo'          => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/rating/',
				'documentation' => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#rating',
			),
			'slider-switch'             => array(
				'type'          => 'premium',
				'title'         => esc_attr__( 'Slider Switch', 'qi-blocks' ),
				'subcategory'   => esc_attr__( 'Creative', 'qi-blocks' ),
				'demo'          => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/slider-switch/',
				'documentation' => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#slider_switch',
			),
			'testimonials-slider'       => array(
				'type'          => 'premium',
				'title'         => esc_attr__( 'Testimonials Carousel', 'qi-blocks' ),
				'subcategory'   => esc_attr__( 'Business', 'qi-blocks' ),
				'demo'          => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/testimonials-carousel/',
				'documentation' => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#testimonials_carousel',
			),
			'typeout-text'              => array(
				'type'          => 'premium',
				'title'         => esc_attr__( 'Typeout Text', 'qi-blocks' ),
				'subcategory'   => esc_attr__( 'Typography', 'qi-blocks' ),
				'demo'          => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/typeout-text/',
				'documentation' => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#typeout_text',
			),
			'wp-forms'                  => array(
				'type'          => 'premium',
				'title'         => esc_attr__( 'WPForms', 'qi-blocks' ),
				'subcategory'   => esc_attr__( 'Form Style', 'qi-blocks' ),
				'demo'          => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/wpforms/',
				'documentation' => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#wp_forms',
			),
			'before-after'              => array(
				'type'          => 'premium',
				'title'         => esc_attr__( 'Before/After Comparison Slider', 'qi-blocks' ),
				'subcategory'   => esc_attr__( 'Showcase/Presentational', 'qi-blocks' ),
				'demo'          => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/before-after-comparison-slider/',
				'documentation' => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/#before_after_comparison_slider',
			),
		);
	}
}

if ( ! function_exists( 'qi_blocks_add_additional_options_for_advanced_block_panel' ) ) {
	/**
	 * Function that localize main editor js script with additional blocks feature
	 *
	 * @param array $global
	 *
	 * @return array
	 */
	function qi_blocks_add_additional_options_for_advanced_block_panel( $global ) {
		$global['advancedBlockPanel'] = array(
			'help' => array(
				0 => array(
					'title' => esc_attr__( 'Block Showcase', 'qi-blocks' ),
					'link'  => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/',
				),
				1 => array(
					'title' => esc_attr__( 'Live Demos', 'qi-blocks' ),
					'link'  => 'https://qodeinteractive.com/qi-templates?utm_source=dash&utm_medium=qitemplates&utm_campaign=gopremium',
				),
				2 => array(
					'title' => esc_attr__( 'Documentation', 'qi-blocks' ),
					'link'  => 'https://qodeinteractive.com/qi-blocks-for-gutenberg/documentation/',
				),
				3 => array(
					'title' => esc_attr__( 'Video Tutorial', 'qi-blocks' ),
					'link'  => 'https://www.youtube.com/watch?v=m9beJAnVCnI&list=PLNypD600o6nIILMn287UeeRWsfc8lyiPa',
				),
				4 => array(
					'title' => esc_attr__( 'Help Center', 'qi-blocks' ),
					'link'  => 'https://helpcenter.qodeinteractive.com/',
				),
			),
			'features' => array(
				0 => array(
					'title' => esc_attr__( 'Premium Qi Blocks for Gutenberg', 'qi-blocks' ),
					'link'  => 'https://qodeinteractive.com/pricing/?qi_product=blocks?utm_source=dash&utm_medium=qiblockspro&utm_campaign=gopremium',
					'image' => esc_url( QI_BLOCKS_ADMIN_URL_PATH . '/admin-pages/assets/img/features-qi-blocks-premium.jpg' ),
				),
				1 => array(
					'title' => esc_attr__( 'Qi Templates for Gutenberg', 'qi-blocks' ),
					'link'  => 'https://qodeinteractive.com/qi-templates?utm_source=dash&utm_medium=qitemplates&utm_campaign=gopremium',
					'image' => esc_url( QI_BLOCKS_ADMIN_URL_PATH . '/admin-pages/assets/img/features-qi-templates.jpg' ),
				),
			),
			'blocks' => Qi_Blocks_Blocks_List::get_instance()->get_blocks(),
		);

		return $global;
	}

	add_filter( 'qi_blocks_filter_localize_main_editor_js', 'qi_blocks_add_additional_options_for_advanced_block_panel' );
}
