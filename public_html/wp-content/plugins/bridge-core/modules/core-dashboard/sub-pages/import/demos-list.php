<?php
if(!function_exists('bridge_core_demos_list')) {

	function bridge_core_demos_list() {

		$demos = array(
			'bridge' => array(
				'title' => esc_html__('Original', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export.zip'),
					'pairs' => array( 13 => 1),
					'slider_in_content' => false
				),
				'required-plugins' => array('js_composer', 'woocommerce', 'sellkit', 'LayerSlider'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				),
				'related_demos' => array(
					'bridgedb300' => esc_html__('Elementor', 'bridge-core'),
					'bridgedb500' => esc_html__('Gutenberg', 'bridge-core'),
				)
			),
            'bridgedb300' => array(
                'title' => esc_html__('Original', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(
                    'sliders' => array('LayerSlider_Export.zip'),
                    'pairs' => array( 13 => 1),
                    'slider_in_content' => false
                ),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'woocommerce', 'sellkit', 'LayerSlider'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core')
                ),
	            'should_render' => false
            ),
			'bridgedb500' => array(
                'title' => esc_html__('Original', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(
	                'sliders' => array('LayerSlider_Export.zip'),
	                'pairs' => array( 13 => 1),
	                'slider_in_content' => false
                ),
                'required-plugins' => array( 'qi-blocks', 'woocommerce', 'sellkit', 'LayerSlider' ),
                'categories' => array(
                    'gutenberg'	=> esc_html__('Gutenberg', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core')
                ),
                'should_render' => false
            ),
			'bridge3' => array(
				'title' => esc_html__('Business', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge3.zip'),
					'pairs' => array(14 => 1, 13 => 2),
					'slider_in_content' => false
				),
				'required-plugins' => array('js_composer', 'LayerSlider'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				),
                'related_demos' => array(
					'bridgedb482' => esc_html__('Elementor', 'bridge-core')
                )
			),
			'bridge4' => array(
				'title' => esc_html__('Agency', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridge5' => array(
				'title' => esc_html__('Estate', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge5.zip'),
					'pairs' => array(15 => 1, 13 => 2),
					'slider_in_content' => false
				),
				'required-plugins' => array('js_composer', 'LayerSlider'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				),
                'related_demos' => array(
					'bridgedb485' => esc_html__('Elementor', 'bridge-core')
                )
			),
			'bridge6' => array(
				'title' => esc_html__('Light', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge6.zip'),
					'pairs' => array(15 => 1, 13 => 2),
					'slider_in_content' => false
				),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				),
                'related_demos' => array(
					'bridgedb484' => esc_html__('Elementor', 'bridge-core')
                )
			),
			'bridge7' => array(
				'title' => esc_html__('Urban', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge7.zip'),
					'pairs' => array(13 => 1),
					'slider_in_content' => false
				),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridge8' => array(
				'title' => esc_html__('Fashion', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge8.zip'),
					'pairs' => array(13 => 1),
					'slider_in_content' => false
				),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridge9' => array(
				'title' => esc_html__('Cafe', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge9.zip'),
					'pairs' => array(14 => 1, 13 => 2),
					'slider_in_content' => false
				),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge10' => array(
				'title' => esc_html__('One Page', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				),
                'related_demos' => array(
					'bridgedb483' => esc_html__('Elementor', 'bridge-core')
                )
			),
			'bridge11' => array(
				'title' => esc_html__('Modern', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge11.zip'),
					'pairs' => array(13 => 1),
					'slider_in_content' => false
				),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge12' => array(
				'title' => esc_html__('University', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge12.zip'),
					'pairs' => array(13 => 1),
					'slider_in_content' => false
				),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge13' => array(
				'title' => esc_html__('Winery', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge13.zip'),
					'pairs' => array(16 => 1, 15 => 2, 13 => 3),
					'slider_in_content' => true
				),
				'required-plugins' => array('js_composer', 'woocommerce', 'sellkit'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge14' => array(
				'title' => esc_html__('Restaurant', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge15' => array(
				'title' => esc_html__('Advertising Agency', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core'),
				)
			),
			'bridge16' => array(
				'title' => esc_html__('Portfolio Masonry', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridge17' => array(
				'title' => esc_html__('Vintage', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridge18' => array(
				'title' => esc_html__('Creative Business', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				),
                'related_demos' => array(
					'bridgedb486' => esc_html__('Elementor', 'bridge-core')
                )
			),
			'bridge19' => array(
				'title' => esc_html__('Catalog', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge20' => array(
				'title' => esc_html__('Portfolio', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridge21' => array(
				'title' => esc_html__('Minimalist', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge22' => array(
				'title' => esc_html__('Dark Parallax', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridge23' => array(
				'title' => esc_html__('Air', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge24' => array(
				'title' => esc_html__('Avenue', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridge25' => array(
				'title' => esc_html__('Portfolio Pinterest', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridge26' => array(
				'title' => esc_html__('Health', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge27' => array(
				'title' => esc_html__('Flat', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge27.zip'),
					'pairs' => array(14 => 1),
					'slider_in_content' => false
				),
				'required-plugins' => array('js_composer', 'contact-form-7', 'LayerSlider'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridge28' => array(
				'title' => esc_html__('Wireframe', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce', 'sellkit'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'other'		=> esc_html__('Other', 'bridge-core')
				)
			),
			'bridge29' => array(
				'title' => esc_html__('Denim', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridge30' => array(
				'title' => esc_html__('Mist', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridge31' => array(
				'title' => esc_html__('Architecture', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridge32' => array(
				'title' => esc_html__('Small Brand', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge32.zip'),
					'pairs' => array(14 => 1, 13 => 2),
					'slider_in_content' => false
				),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge33' => array(
				'title' => esc_html__('Creative', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge33.zip'),
					'pairs' => array(14 => 1, 13 => 2),
					'slider_in_content' => false
				),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridge34' => array(
				'title' => esc_html__('Parallax', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridge35' => array(
				'title' => esc_html__('Minimal', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridge36' => array(
				'title' => esc_html__('Simple Blog', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'blog'		=> esc_html__('Blog', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')

				)
			),
			'bridge37' => array(
				'title' => esc_html__('Pinterest Blog', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'blog'		=> esc_html__('Blog', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridge38' => array(
				'title' => esc_html__('Studio', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge38.zip'),
					'pairs' => array(15 => 1, 14 => 2),
					'slider_in_content' => false
				),
				'required-plugins' => array('js_composer', 'contact-form-7', 'LayerSlider'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridge39' => array(
				'title' => esc_html__('Contemporary Art', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge39.zip'),
					'pairs' => array(14 => 1, 13 => 2),
					'slider_in_content' => false
				),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core'),
				)
			),
			'bridge40' => array(
				'title' => esc_html__('Chocolaterie', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge40.zip'),
					'pairs' => array(14 => 1, 13 => 2),
					'slider_in_content' => false
				),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridge41' => array(
				'title' => esc_html__('Branding', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridge42' => array(
				'title' => esc_html__('Collection', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridge43' => array(
				'title' => esc_html__('Creative Vintage', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge44' => array(
				'title' => esc_html__('Coming Soon Simple', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridge45' => array(
				'title' => esc_html__('Coming Soon Creative', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridge46' => array(
				'title' => esc_html__('Lawyer', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge47' => array(
				'title' => esc_html__('Health Blog', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'blog'	=> esc_html__('Blog', 'bridge-core')
				)
			),
			'bridge48' => array(
				'title' => esc_html__('Photography Split Screen', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridge49' => array(
				'title' => esc_html__('Agency One Page', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridge50' => array(
				'title' => esc_html__('Fashion Shop', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge50.zip'),
					'pairs' => array(15 => 1, 14 => 2, 13 => 3),
					'slider_in_content' => true
				),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce', 'sellkit'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'shop'	=> esc_html__('shop', 'bridge-core')
				)
			),
			'bridge51' => array(
				'title' => esc_html__('Company', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge52' => array(
				'title' => esc_html__('Wellness', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge53' => array(
				'title' => esc_html__('Case Study', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridge54' => array(
				'title' => esc_html__('Design Studio', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridge55' => array(
				'title' => esc_html__('Digital Agency', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge56' => array(
				'title' => esc_html__('Organic', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge57' => array(
				'title' => esc_html__('Jazz', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridge58' => array(
				'title' => esc_html__('Wedding', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'other'	=> esc_html__('Other', 'bridge-core')
				)
			),
			'bridge59' => array(
				'title' => esc_html__('Jeans', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'shop'	=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridge60' => array(
				'title' => esc_html__('Innovation', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridge61' => array(
				'title' => esc_html__('Travel Blog', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'blog'	=> esc_html__('Blog', 'bridge-core')
				)
			),
			'bridge62' => array(
				'title' => esc_html__('Passepartout', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridge63' => array(
				'title' => esc_html__('Graphic Studio', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridge64' => array(
				'title' => esc_html__('Cupcake', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridge65' => array(
				'title' => esc_html__('Sunglasses Shop', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce', 'sellkit'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'shop'	=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridge66' => array(
				'title' => esc_html__('Kids', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge67' => array(
				'title' => esc_html__('Animals', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge68' => array(
				'title' => esc_html__('Photo Studio', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge68.zip'),
					'pairs' => array(14 => 1, 13 => 2),
					'slider_in_content' => true
				),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridge69' => array(
				'title' => esc_html__('Urban Fashion', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge70' => array(
				'title' => esc_html__('Marine', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce', 'sellkit'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridge71' => array(
				'title' => esc_html__('Interior Design', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'woocommerce', 'sellkit'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridge72' => array(
				'title' => esc_html__('Bar &amp; Grill', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge72.zip'),
					'pairs' => array(14 => 1),
					'slider_in_content' => false
				),
				'required-plugins' => array('js_composer', 'contact-form-7', 'LayerSlider'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge73' => array(
				'title' => esc_html__('Brewery', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge73.zip'),
					'pairs' => array(13 => 1),
					'slider_in_content' => true
				),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce', 'sellkit', 'LayerSlider'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
                    'shop'      => esc_html__('Brewery', 'bridge-core')
				)
			),
			'bridge74' => array(
				'title' => esc_html__('Corporate', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge75' => array(
				'title' => esc_html__('Office', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge76' => array(
				'title' => esc_html__('Paper', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridge77' => array(
				'title' => esc_html__('Simple Photography', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core'),
				)
			),
			'bridge78' => array(
				'title' => esc_html__('Furniture', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge79' => array(
				'title' => esc_html__('Skin Care', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge79.zip'),
					'pairs' => array(14 => 1),
					'slider_in_content' => false
				),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce', 'sellkit', 'LayerSlider'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'shop'	=> esc_html__('Shop', 'bridge-core'),
				)
			),
			'bridge80' => array(
				'title' => esc_html__('Rustic', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridge81' => array(
				'title' => esc_html__('Cargo', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge82' => array(
				'title' => esc_html__('Creative Photography', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core'),
                    'business'  => esc_html__('Business', 'bridge-core'),
				)
			),
			'bridge83' => array(
				'title' => esc_html__('Construction', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridge84' => array(
				'title' => esc_html__('Campaign', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge85' => array(
				'title' => esc_html__('Dim Sum', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge85.zip'),
					'pairs' => array(14 => 1),
					'slider_in_content' => true
				),
				'required-plugins' => array('js_composer', 'contact-form-7', 'LayerSlider'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge86' => array(
				'title' => esc_html__('Flat Company', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge87' => array(
				'title' => esc_html__('Photography Portfolio', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridge88' => array(
				'title' => esc_html__('Charity', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge89' => array(
				'title' => esc_html__('Handmade', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce', 'sellkit'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'shop'	=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridge90' => array(
				'title' => esc_html__('Telecom', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge91' => array(
				'title' => esc_html__('Black-And-White', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
				)
			),
			'bridge92' => array(
				'title' => esc_html__('Pets', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge92.zip'),
					'pairs' => array(14 => 1),
					'slider_in_content' => true
				),
				'required-plugins' => array('js_composer', 'contact-form-7', 'LayerSlider'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge93' => array(
				'title' => esc_html__('Designer Personal', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge93.zip'),
					'pairs' => array(14 => 1),
					'slider_in_content' => true
				),
				'required-plugins' => array('js_composer', 'contact-form-7', 'LayerSlider'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridge94' => array(
				'title' => esc_html__('Modern Business', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge95' => array(
				'title' => esc_html__('Contemporary Company', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge95.zip'),
					'pairs' => array(14 => 1),
					'slider_in_content' => true
				),
				'required-plugins' => array('js_composer', 'contact-form-7', 'LayerSlider'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge96' => array(
				'title' => esc_html__('Communication', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge96.zip'),
					'pairs' => array(14 => 1),
					'slider_in_content' => true
				),
				'required-plugins' => array('js_composer', 'contact-form-7', 'LayerSlider'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge97' => array(
				'title' => esc_html__('Blog Slider', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge97.zip'),
					'pairs' => array(14 => 1),
					'slider_in_content' => false
				),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'blog'	=> esc_html__('Blog', 'bridge-core')
				)
			),
			'bridge98' => array(
				'title' => esc_html__('Fashion Photography', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridge99' => array(
				'title' => esc_html__('Urban Shop', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge99.zip'),
					'pairs' => array(14 => 1),
					'slider_in_content' => true
				),
				'required-plugins' => array('js_composer', 'woocommerce', 'sellkit'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'shop'	=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridge100' => array(
				'title' => esc_html__('CV', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridge101' => array(
				'title' => esc_html__('Standard', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'other'		=> esc_html__('Other', 'bridge-core')
				)
			),
			'bridge102' => array(
				'title' => esc_html__('Split Screen', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'other'	=> esc_html__('Other', 'bridge-core')
				)
			),
			'bridge103' => array(
				'title' => esc_html__('Left Menu Initially Hidden', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'other'		=> esc_html__('Other', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core'),
				)
			),
			'bridge104' => array(
				'title' => esc_html__('Left Menu With Image', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'other'		=> esc_html__('Other', 'bridge-core')
				)
			),
			'bridge105' => array(
				'title' => esc_html__('Vertical Menu', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'other'		=> esc_html__('Other', 'bridge-core')
				)
			),
			'bridge106' => array(
				'title' => esc_html__('Blog with Slider', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'blog'		=> esc_html__('Blog', 'bridge-core'),
					'other'		=> esc_html__('Other', 'bridge-core')
				)
			),
			'bridge107' => array(
				'title' => esc_html__('Masonry Gallery', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'other'		=> esc_html__('Other', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core'),
				)
			),
			'bridge108' => array(
				'title' => esc_html__('Short Slider', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'other'		=> esc_html__('Other', 'bridge-core')
				)
			),
			'bridge109' => array(
				'title' => esc_html__('Angled Sections', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'other'		=> esc_html__('Other', 'bridge-core')
				)
			),
			'bridge110' => array(
				'title' => esc_html__('Grid', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge110.zip'),
					'pairs' => array(14 => 1),
					'slider_in_content' => true
				),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce', 'sellkit'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'other'		=> esc_html__('Other', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridge111' => array(
				'title' => esc_html__('Elegant Slider', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'blog'		=> esc_html__('Blog', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'other'		=> esc_html__('Other', 'bridge-core')
				)
			),
			'bridge112' => array(
				'title' => esc_html__('Full Screen Sections', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'other'		=> esc_html__('Other', 'bridge-core')
				)
			),
			'bridge113' => array(
				'title' => esc_html__('Shop Grid', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge113.zip'),
					'pairs' => array(14 => 1),
					'slider_in_content' => false
				),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce', 'sellkit'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'other'		=> esc_html__('Other', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridge114' => array(
				'title' => esc_html__('Shop Wide', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce', 'sellkit'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'other'		=> esc_html__('Other', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridge115' => array(
				'title' => esc_html__('One Page Site', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core'),
					'other'		=> esc_html__('Other', 'bridge-core')
				)
			),
			'bridge116' => array(
				'title' => esc_html__('Dark Border', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'other'		=> esc_html__('Other', 'bridge-core')
				)
			),
			'bridge117' => array(
				'title' => esc_html__('Portfolio with Left Menu', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'other'		=> esc_html__('Other', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridge118' => array(
				'title' => esc_html__('Portfolio Pinterest Style', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'other'		=> esc_html__('Other', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridge119' => array(
				'title' => esc_html__('Shop with Left Menu', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce', 'sellkit'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'other'		=> esc_html__('Other', 'bridge-core'),
					'shop'	=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridge120' => array(
				'title' => esc_html__('Photo Slider', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'other'		=> esc_html__('Other', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridge121' => array(
				'title' => esc_html__('Blog in Grid', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'blog'		=> esc_html__('Blog', 'bridge-core'),
					'other'		=> esc_html__('Other', 'bridge-core')
				)
			),
			'bridge122' => array(
				'title' => esc_html__('Blog Pinterest Style', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'blog'		=> esc_html__('Blog', 'bridge-core'),
					'other'		=> esc_html__('Other', 'bridge-core')
				)
			),
			'bridge123' => array(
				'title' => esc_html__('Video Slider', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridge124' => array(
				'title' => esc_html__('Blog Loop', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'blog'		=> esc_html__('Blog', 'bridge-core'),
					'other'		=> esc_html__('Other', 'bridge-core')
				)
			),
			'bridgedb1' => array(
				'title' => esc_html__('App Showcase', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridgedb2' => array(
				'title' => esc_html__('Creative Agency', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb3' => array(
				'title' => esc_html__('Construction Company', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				),
				'related_demos' => array(
					'bridgedb440' => esc_html__('Elementor', 'bridge-core')
				)
			),
			'bridgedb4' => array(
				'title' => esc_html__('Modern Restaurant', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb5' => array(
				'title' => esc_html__('Wedding Announcement', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb6' => array(
				'title' => esc_html__('Online Agency', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				),
                'related_demos' => array(
					'bridgedb451' => esc_html__('Elementor', 'bridge-core')
                )
			),
			'bridgedb7' => array(
				'title' => esc_html__('Rock Band', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb8' => array(
				'title' => esc_html__('Craftsman', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb9' => array(
				'title' => esc_html__('Corporation', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb10' => array(
				'title' => esc_html__('Modern Photography', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb11' => array(
				'title' => esc_html__('Illustrator Portfolio', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb12' => array(
				'title' => esc_html__('Urban Store', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce', 'sellkit'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'shop'	=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb13' => array(
				'title' => esc_html__('Vibrant Portfolio', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb14' => array(
				'title' => esc_html__('Photography Tiles', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb15' => array(
				'title' => esc_html__('Freelance Designer', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb16' => array(
				'title' => esc_html__('Clothing Store', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce', 'sellkit'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				),
                'related_demos' => array(
					'bridgedb480' => esc_html__('Elementor', 'bridge-core')
                )
			),
			'bridgedb17' => array(
				'title' => esc_html__('Urban Studio', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb18' => array(
				'title' => esc_html__('Masonry Shop', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce', 'sellkit'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb19' => array(
				'title' => esc_html__('Fullscreen Shop', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce', 'sellkit'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb20' => array(
				'title' => esc_html__('Photographer', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb21' => array(
				'title' => esc_html__('Designer Portfolio', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb22' => array(
				'title' => esc_html__('Tech Showcase', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'business'  => esc_html__('Business', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridgedb23' => array(
				'title' => esc_html__('Metro Blog', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'blog'	=> esc_html__('Blog', 'bridge-core')
				)
			),
			'bridgedb24' => array(
				'title' => esc_html__('Nature Blog', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'blog'	=> esc_html__('Blog', 'bridge-core')
				)
			),
			'bridgedb25' => array(
				'title' => esc_html__('Modern Blog', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'blog'	=> esc_html__('Blog', 'bridge-core')
				)
			),
			'bridgedb26' => array(
				'title' => esc_html__('Creative Blog', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'blog'	=> esc_html__('Blog', 'bridge-core')
				)
			),
			'bridgedb27' => array(
				'title' => esc_html__('Minimal Blog', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'blog'	=> esc_html__('Blog', 'bridge-core')
				)
			),
			'bridgedb28' => array(
				'title' => esc_html__('Fashion Blog', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'blog'	=> esc_html__('Blog', 'bridge-core')
				)
			),
			'bridgedb29' => array(
				'title' => esc_html__('Lifestyle Blog', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'blog'	=> esc_html__('Blog', 'bridge-core')
				)
			),
			'bridgedb30' => array(
				'title' => esc_html__('Chequered Blog', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'blog'	=> esc_html__('Blog', 'bridge-core')
				)
			),
			'bridgedb31' => array(
				'title' => esc_html__('Headlines Blog', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'blog'	=> esc_html__('Blog', 'bridge-core')
				)
			),
			'bridgedb32' => array(
				'title' => esc_html__('Tech Blog', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'blog'	=> esc_html__('Blog', 'bridge-core')
				)
			),
			'bridgedb33' => array(
				'title' => esc_html__('Photography Parallax', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb34' => array(
				'title' => esc_html__('Bauhaus', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb35' => array(
				'title' => esc_html__('Illustrator', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb36' => array(
				'title' => esc_html__('Maintenance Mode', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridgedb37' => array(
				'title' => esc_html__('Agency Minimal', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb38' => array(
				'title' => esc_html__('Conference', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridgedb39' => array(
				'title' => esc_html__('3D Artist', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb40' => array(
				'title' => esc_html__('Developer', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-instagram-widget', 'qode-twitter-feed'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridgedb41' => array(
				'title' => esc_html__('Web Agency', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
				)
			),
			'bridgedb42' => array(
				'title' => esc_html__('UX/UI Design', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridgedb43' => array(
				'title' => esc_html__('Digital', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb44' => array(
				'title' => esc_html__('Product Showcase', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'woocommerce', 'sellkit'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb45' => array(
				'title' => esc_html__('Sportswear', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce', 'sellkit', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb46' => array(
				'title' => esc_html__('Interior Decoration', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce', 'sellkit'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb47' => array(
				'title' => esc_html__('Boutique', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce', 'sellkit', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb48' => array(
				'title' => esc_html__('Summer Shop', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce', 'sellkit', 'qode-instagram-widget', 'qode-twitter-feed'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb49' => array(
				'title' => esc_html__('Furniture Shop', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce', 'sellkit'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core'),
                    'portfolio' => esc_html__('Portfolio', 'bridge-core'),
				)
			),
			'bridgedb50' => array(
				'title' => esc_html__('Leather Shop', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce', 'sellkit', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb51' => array(
				'title' => esc_html__('Minimal Shop', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce', 'sellkit'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb52' => array(
				'title' => esc_html__('Tiled Shop', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce', 'sellkit'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb53' => array(
				'title' => esc_html__('Digital Startup', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb54' => array(
				'title' => esc_html__('Skater', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce', 'sellkit', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'shop'	=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb55' => array(
				'title' => esc_html__('Bicycle Brand', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridgedb56' => array(
				'title' => esc_html__('Fashion Agency', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridgedb57' => array(
				'title' => esc_html__('Biker Club', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridgedb58' => array(
				'title' => esc_html__('Artist Portfolio', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce', 'sellkit', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core'),
					'shop'	    => esc_html__('Shop', 'bridge-core'),
				)
			),
			'bridgedb59' => array(
				'title' => esc_html__('Hipster Agency', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb60' => array(
				'title' => esc_html__('Barber', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridgedb61' => array(
				'title' => esc_html__('Photo Gallery', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb62' => array(
				'title' => esc_html__('Skate Shop', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce', 'sellkit', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb63' => array(
				'title' => esc_html__('Outdoors', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				),
                'related_demos' => array(
					'bridgedb479' => esc_html__('Elementor', 'bridge-core')
                )
			),
			'bridgedb64' => array(
				'title' => esc_html__('Jazz Bar', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridgedb65' => array(
				'title' => esc_html__('Hosting', 'bridge-core'),
				'rev-sliders' => array('home_slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridgedb66' => array(
				'title' => esc_html__('Architect Studio', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				),
                'related_demos' => array(
					'bridgedb471' => esc_html__('Elementor', 'bridge-core')
                )
			),
			'bridgedb67' => array(
				'title' => esc_html__('Child Care', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridgedb68' => array(
				'title' => esc_html__('Startup', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				),
                'related_demos' => array(
					'bridgedb476' => esc_html__('Elementor', 'bridge-core')
                )
			),
			'bridgedb69' => array(
				'title' => esc_html__('Resume', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb70' => array(
				'title' => esc_html__('Law Firm', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb71' => array(
				'title' => esc_html__('Organic Market', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				),
                'related_demos' => array(
					'bridgedb463' => esc_html__('Elementor', 'bridge-core')
                )
			),
			'bridgedb72' => array(
				'title' => esc_html__('Watch Store', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce', 'sellkit'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb73' => array(
				'title' => esc_html__('Travel Agency', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb74' => array(
				'title' => esc_html__('Consulting', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb75' => array(
				'title' => esc_html__('Yoga Studio', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb76' => array(
				'title' => esc_html__('Spa Center', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb77' => array(
				'title' => esc_html__('Modern Furniture', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce', 'sellkit'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb78' => array(
				'title' => esc_html__('Church', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget', 'qode-twitter-feed', 'timetable'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb79' => array(
				'title' => esc_html__('Life Coach', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7' . 'revslider', 'qode-twitter-feed'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				),
                'related_demos' => array(
					'bridgedb477' => esc_html__('Elementor', 'bridge-core')
                )
			),
			'bridgedb80' => array(
				'title' => esc_html__('Ultragym', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-twitter-feed', 'timetable'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb81' => array(
				'title' => esc_html__('Mosque', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-twitter-feed', 'timetable'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb82' => array(
				'title' => esc_html__('Pet Sanctuary', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb83' => array(
				'title' => esc_html__('Car Dealership', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				),
                'related_demos' => array(
					'bridgedb468' => esc_html__('Elementor', 'bridge-core')
                )
			),
			'bridgedb84' => array(
				'title' => esc_html__('Business Consultant', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				),
                'related_demos' => array(
					'bridgedb454' => esc_html__('Elementor', 'bridge-core')
                )
			),
			'bridgedb85' => array(
				'title' => esc_html__('University II', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-twitter-feed', 'timetable'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb86' => array(
				'title' => esc_html__('Dentist', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				),
                'related_demos' => array(
					'bridgedb473' => esc_html__('Elementor', 'bridge-core')
                )
			),
			'bridgedb87' => array(
				'title' => esc_html__('Transport', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				),
                'related_demos' => array(
					'bridgedb461' => esc_html__('Elementor', 'bridge-core')
                )
			),
			'bridgedb88' => array(
				'title' => esc_html__('Football', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-twitter-feed'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb89' => array(
				'title' => esc_html__('Vacation Rental', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				),
                'related_demos' => array(
					'bridgedb475' => esc_html__('Elementor', 'bridge-core')
                )
			),
			'bridgedb90' => array(
				'title' => esc_html__('UI Design Company', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridgedb91' => array(
				'title' => esc_html__('City Listing', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-instagram-widget', 'qode-membership', 'qode-listing', 'woocommerce', 'sellkit', 'wp-job-manager', 'wp-job-manager-locations'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'special'	=> esc_html__('Special', 'bridge-core')
				),
                'related_demos' => array(
					'bridgedb474' => esc_html__('Elementor', 'bridge-core')
                )
			),
			'bridgedb92' => array(
				'title' => esc_html__('Music Magazine', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-instagram-widget', 'qode-twitter-feed', 'qode-news'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'blog'		=> esc_html__('Blog', 'bridge-core'),
					'special'	=> esc_html__('Special', 'bridge-core')
				),
				'related_demos' => array(
					'bridgedb443' => esc_html__('Elementor', 'bridge-core')
				)
			),
			'bridgedb93' => array(
				'title' => esc_html__('Restaurant and Bar', 'bridge-core'),
				'rev-sliders' => array('main-slider-n.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-restaurant'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
                    'special'   => esc_html__('Special', 'bridge-core')
				),
                'related_demos' => array(
					'bridgedb455' => esc_html__('Elementor', 'bridge-core')
                )
			),
			'bridgedb94' => array(
				'title' => esc_html__('Business Report', 'bridge-core'),
				'rev-sliders' => array('annual-home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb95' => array(
				'title' => esc_html__('Business Conference', 'bridge-core'),
				'rev-sliders' => array('main-home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb96' => array(
				'title' => esc_html__('Global Business', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb97' => array(
				'title' => esc_html__('Financial Business', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb98' => array(
				'title' => esc_html__('Construction Showcase', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb99' => array(
				'title' => esc_html__('Attorney', 'bridge-core'),
				'rev-sliders' => array('mainhome.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb100' => array(
				'title' => esc_html__('Clean Energy', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb101' => array(
				'title' => esc_html__('Startup Summit', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb102' => array(
				'title' => esc_html__('App Launch', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb103' => array(
				'title' => esc_html__('App Presentation', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridgedb104' => array(
				'title' => esc_html__('Winter Sports', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb105' => array(
				'title' => esc_html__('Smoothie Bar', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb106' => array(
				'title' => esc_html__('Yoga Center', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget', 'qode-twitter-feed', 'timetable'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb107' => array(
				'title' => esc_html__('Beer Showcase', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridgedb108' => array(
				'title' => esc_html__('Plumber', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb109' => array(
				'title' => esc_html__('Hair Salon', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb110' => array(
				'title' => esc_html__('Freelancer', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				),
                'related_demos' => array(
					'bridgedb481' => esc_html__('Elementor', 'bridge-core')
                )
			),
			'bridgedb111' => array(
				'title' => esc_html__('Bakery', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb112' => array(
				'title' => esc_html__('Running Club', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb113' => array(
				'title' => esc_html__('Beauty Center', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget', 'qode-twitter-feed'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb114' => array(
				'title' => esc_html__('SEO Company', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget', 'qode-twitter-feed'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb115' => array(
				'title' => esc_html__('Babysitter', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				),
                'related_demos' => array(
					'bridgedb466' => esc_html__('Elementor', 'bridge-core')
                )
			),
			'bridgedb116' => array(
				'title' => esc_html__('Wedding Planner', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb117' => array(
				'title' => esc_html__('Florist', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'woocommerce', 'sellkit'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb118' => array(
				'title' => esc_html__('Designer Expo', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb119' => array(
				'title' => esc_html__('Music Festival', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb120' => array(
				'title' => esc_html__('Moving Company', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				),
                'related_demos' => array(
					'bridgedb470' => esc_html__('Elementor', 'bridge-core')
                )
			),
			'bridgedb121' => array(
				'title' => esc_html__('Burger Place', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb122' => array(
				'title' => esc_html__('Urban Dance', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
				)
			),
			'bridgedb123' => array(
				'title' => esc_html__('Vineyard', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb124' => array(
				'title' => esc_html__('Technology', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb125' => array(
				'title' => esc_html__('Pole Dance', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'timetable'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb126' => array(
				'title' => esc_html__('Nightclub', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb127' => array(
				'title' => esc_html__('Running', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb128' => array(
				'title' => esc_html__('Orchestra', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb129' => array(
				'title' => esc_html__('Factory', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				),
				'related_demos' => array(
					'bridgedb441' => esc_html__('Elementor', 'bridge-core')
				)
			),
			'bridgedb130' => array(
				'title' => esc_html__('Writer', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb131' => array(
				'title' => esc_html__('Museum', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
				)
			),
			'bridgedb132' => array(
				'title' => esc_html__('Art Gallery', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'blog'		=> esc_html__('Blog', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb133' => array(
				'title' => esc_html__('Medical', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget', 'qode-twitter-feed'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				),
				'related_demos' => array(
					'bridgedb444' => esc_html__('Elementor', 'bridge-core')
				)
			),
			'bridgedb134' => array(
				'title' => esc_html__('Recording Studio', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb135' => array(
				'title' => esc_html__('Mountain Biking', 'bridge-core'),
				'rev-sliders' => array('home-1.zip', 'home-content.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb136' => array(
				'title' => esc_html__('Agriculture', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget', 'qode-twitter-feed'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'other'		=> esc_html__('Other', 'bridge-core')
				)
			),
			'bridgedb137' => array(
				'title' => esc_html__('Coworking Space', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb138' => array(
				'title' => esc_html__('Bar', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb139' => array(
				'title' => esc_html__('Startup Company', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb140' => array(
				'title' => esc_html__('Frozen Yogurt', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb141' => array(
				'title' => esc_html__('Video Production', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridgedb142' => array(
				'title' => esc_html__('Soap', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'woocommerce', 'sellkit'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb143' => array(
				'title' => esc_html__('Movie', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb144' => array(
				'title' => esc_html__('Optician', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'woocommerce', 'sellkit'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'shop'	=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb145' => array(
				'title' => esc_html__('Italian Restaurant', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-restaurant'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
                    'special'   => esc_html__('Special', 'bridge-core')
				)
			),
			'bridgedb146' => array(
				'title' => esc_html__('Temple', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb147' => array(
				'title' => esc_html__('Wedding Invitation', 'bridge-core'),
				'rev-sliders' => array('home.zip', 'home-bottom.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb148' => array(
				'title' => esc_html__('Hi-Fi', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb149' => array(
				'title' => esc_html__('Tea', 'bridge-core'),
				'rev-sliders' => array('home.zip', 'home-content.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'woocommerce', 'sellkit'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'shop'	=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb150' => array(
				'title' => esc_html__('Renewable Energy', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb151' => array(
				'title' => esc_html__('Laboratory', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb152' => array(
				'title' => esc_html__('Business Consulting', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb153' => array(
				'title' => esc_html__('Fitness', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'timetable', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb154' => array(
				'title' => esc_html__('Interior Decor', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				),
                'related_demos' => array(
					'bridgedb446' => esc_html__('Elementor', 'bridge-core')
                )
			),
			'bridgedb155' => array(
				'title' => esc_html__('Pottery', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'woocommerce', 'sellkit'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				),
				'related_demos' => array(
					'bridgedb442' => esc_html__('Elementor', 'bridge-core')
				)
			),
			'bridgedb156' => array(
				'title' => esc_html__('Gardening', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				),
                'related_demos' => array(
					'bridgedb458' => esc_html__('Elementor', 'bridge-core')
                )
			),
			'bridgedb157' => array(
				'title' => esc_html__('Human Resources', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb158' => array(
				'title' => esc_html__('Wedding Invitation Card', 'bridge-core'),
				'rev-sliders' => array('invitation.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridgedb159' => array(
				'title' => esc_html__('Candidate', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb160' => array(
				'title' => esc_html__('Wildlife', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget', 'qode-twitter-feed'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb161' => array(
				'title' => esc_html__('NGO', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb162' => array(
				'title' => esc_html__('Explorer', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget', 'qode-twitter-feed'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'blog'	=> esc_html__('Blog', 'bridge-core')
				),
                'related_demos' => array(
					'bridgedb460' => esc_html__('Elementor', 'bridge-core')
                )
			),
			'bridgedb163' => array(
				'title' => esc_html__('Psychotherapy', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				),
                'related_demos' => array(
					'bridgedb448' => esc_html__('Elementor', 'bridge-core')
                )
			),
			'bridgedb164' => array(
				'title' => esc_html__('Recipes', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'blog'	=> esc_html__('Blog', 'bridge-core')
				)
			),
			'bridgedb165' => array(
				'title' => esc_html__('Nutritionist', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget', 'qode-twitter-feed'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb166' => array(
				'title' => esc_html__('Bike Rental', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb167' => array(
				'title' => esc_html__('Dental Clinic', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb168' => array(
				'title' => esc_html__('IT conference', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb169' => array(
				'title' => esc_html__('3D Modeling', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb170' => array(
				'title' => esc_html__('Horse Riding', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb171' => array(
				'title' => esc_html__('Barber Shop', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb172' => array(
				'title' => esc_html__('Loan Company', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb173' => array(
				'title' => esc_html__('Architectural Firm', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				),
                'related_demos' => array(
					'bridgedb469' => esc_html__('Elementor', 'bridge-core')
                )
			),
			'bridgedb174' => array(
				'title' => esc_html__('Web Design Studio', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget', 'qode-twitter-feed'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				),
                'related_demos' => array(
					'bridgedb464' => esc_html__('Elementor', 'bridge-core')
                )
			),
			'bridgedb175' => array(
				'title' => esc_html__('Law Office', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				),
                'related_demos' => array(
					'bridgedb445' => esc_html__('Elementor', 'bridge-core')
                )
			),
			'bridgedb176' => array(
				'title' => esc_html__('Software Development', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb177' => array(
				'title' => esc_html__('Gym', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget', 'timetable'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb178' => array(
				'title' => esc_html__('Makeup Artist', 'bridge-core'),
				'rev-sliders' => array('home1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget', 'qode-twitter-feed'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				),
                'related_demos' => array(
					'bridgedb472' => esc_html__('Elementor', 'bridge-core')
                )
			),
			'bridgedb179' => array(
				'title' => esc_html__('Gaming', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb180' => array(
				'title' => esc_html__('Photographer Portfolio', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb181' => array(
				'title' => esc_html__('Golf', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb182' => array(
				'title' => esc_html__('Laundry Service', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb183' => array(
				'title' => esc_html__('Tiles', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'woocommerce', 'sellkit'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				),
                'related_demos' => array(
					'bridgedb456' => esc_html__('Elementor', 'bridge-core')
                )
			),
			'bridgedb184' => array(
				'title' => esc_html__('Handicraft', 'bridge-core'),
				'rev-sliders' => array('home.zip', 'home-content'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb185' => array(
				'title' => esc_html__('Casino', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb186' => array(
				'title' => esc_html__('Airline', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb187' => array(
				'title' => esc_html__('Craft Beer Bar', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget', 'qode-twitter-feed'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb188' => array(
				'title' => esc_html__('Film Director', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb189' => array(
				'title' => esc_html__('Tech Support', 'bridge-core'),
				'rev-sliders' => array('home1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb190' => array(
				'title' => esc_html__('Kindergarten', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb191' => array(
				'title' => esc_html__('Tailor', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget', 'qode-twitter-feed'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb192' => array(
				'title' => esc_html__('Sushi Bar', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-restaurant'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
                    'special'   => esc_html__('Special', 'bridge-core')
				)
			),
			'bridgedb193' => array(
				'title' => esc_html__('Jewelry Store', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-instagram-widget', 'woocommerce', 'sellkit'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'shop'	=> esc_html__('Shop', 'bridge-core')
				),
                'related_demos' => array(
					'bridgedb459' => esc_html__('Elementor', 'bridge-core')
                )
			),
			'bridgedb194' => array(
				'title' => esc_html__('Web Hosting', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb195' => array(
				'title' => esc_html__('University III', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb196' => array(
				'title' => esc_html__('Tattoo Studio', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb197' => array(
				'title' => esc_html__('vCard', 'bridge-core'),
				'rev-sliders' => array('resume.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb198' => array(
				'title' => esc_html__('Wristwatch Shop', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'woocommerce', 'sellkit'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				),
                'related_demos' => array(
					'bridgedb465' => esc_html__('Elementor', 'bridge-core')
                )
			),
			'bridgedb199' => array(
				'title' => esc_html__('Gift Shop', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'woocommerce', 'sellkit'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb200' => array(
				'title' => esc_html__('Language School', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb201' => array(
				'title' => esc_html__('Floristry', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb202' => array(
				'title' => esc_html__('Bicycle Shop', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'woocommerce', 'sellkit', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb203' => array(
				'title' => esc_html__('Asian Cuisine', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb204' => array(
				'title' => esc_html__('Jazz Club', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb205' => array(
				'title' => esc_html__('Animal Shelter', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb206' => array(
				'title' => esc_html__('Musician', 'bridge-core'),
				'rev-sliders' => array('home1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb207' => array(
				'title' => esc_html__('Ecology', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb208' => array(
				'title' => esc_html__('Interactive Agency', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb209' => array(
				'title' => esc_html__('Creative Studio', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridgedb210' => array(
				'title' => esc_html__('Pizza Parlor', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget', 'qode-restaurant'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
                    'special'   => esc_html__('Special', 'bridge-core')
				)
			),
			'bridgedb211' => array(
				'title' => esc_html__('Freelancer Portfolio', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb212' => array(
				'title' => esc_html__('Environmental Organization', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				),
                'related_demos' => array(
					'bridgedb478' => esc_html__('Elementor', 'bridge-core')
                )
			),
			'bridgedb213' => array(
				'title' => esc_html__('Kids Fashion', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce', 'sellkit', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'shop'	=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb214' => array(
				'title' => esc_html__('Fashion Store', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'woocommerce', 'sellkit'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'shop'	=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb215' => array(
				'title' => esc_html__('Boxing Gym', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'timetable'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb216' => array(
				'title' => esc_html__('Urban Wear', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'woocommerce', 'sellkit', 'yith-woocommerce-wishlist', 'yith-woocommerce-quick-view'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core'),
				)
			),
			'bridgedb217' => array(
				'title' => esc_html__('Alternative Band', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-music', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'special'	=> esc_html__('Special', 'bridge-core')
				)
			),
			'bridgedb218' => array(
				'title' => esc_html__('Dron Studio', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'woocommerce', 'sellkit'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'shop'	=> esc_html__('Shop', 'bridge-core'),
				)
			),
			'bridgedb219' => array(
				'title' => esc_html__('Digital Studio', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				),
                'related_demos' => array(
					'bridgedb462' => esc_html__('Elementor', 'bridge-core')
                )
			),
			'bridgedb220' => array(
				'title' => esc_html__('Matcha', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'woocommerce', 'sellkit'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb221' => array(
				'title' => esc_html__('New Album Release', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-music', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'special'	=> esc_html__('Special', 'bridge-core')
				)
			),
			'bridgedb222' => array(
				'title' => esc_html__('Fast Food', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb223' => array(
				'title' => esc_html__('Pet Shop', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'woocommerce', 'sellkit'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb224' => array(
				'title' => esc_html__('Travel', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-tours', 'qode-instagram-widget', 'qode-membership', 'qode-twitter-feed'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'special'	=> esc_html__('Special', 'bridge-core')
				),
                'related_demos' => array(
					'bridgedb450' => esc_html__('Elementor', 'bridge-core')
                )
			),
			'bridgedb225' => array(
				'title' => esc_html__('Cryptocurrency', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb226' => array(
				'title' => esc_html__('Pop Music Magazine', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-news', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'blog'		=> esc_html__('Blog', 'bridge-core'),
					'special'	=> esc_html__('Special', 'bridge-core'),
                    'creative'  => esc_html__('creative', 'bridge-core')
				)
			),
			'bridgedb227' => array(
				'title' => esc_html__('Smartphone Store', 'bridge-core'),
				'rev-sliders' => array('home1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'woocommerce', 'sellkit'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb228' => array(
				'title' => esc_html__('Water Plant', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb229' => array(
				'title' => esc_html__('Spa & Wellness', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb230' => array(
				'title' => esc_html__('Nail Salon', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb231' => array(
				'title' => esc_html__('Educational Center', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'woocommerce', 'sellkit', 'qode-lms', 'qode-woocommerce-checkout-integration'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'special'	=> esc_html__('Special', 'bridge-core')
				),
                'related_demos' => array(
					'bridgedb452' => esc_html__('Elementor', 'bridge-core')
                )
			),
			'bridgedb232' => array(
				'title' => esc_html__('Trendy Blog', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'blog'	=> esc_html__('Blog', 'bridge-core')
				)
			),
			'bridgedb233' => array(
				'title' => esc_html__('Creative Office', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb234' => array(
				'title' => esc_html__('Backpacks', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb235' => array(
				'title' => esc_html__('Mountain Climbing', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb236' => array(
				'title' => esc_html__('Developer Portfolio', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb237' => array(
				'title' => esc_html__('Jewelry', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'woocommerce', 'sellkit', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'shop'	=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb238' => array(
				'title' => esc_html__('Designer Presentation', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				),
                'related_demos' => array(
					'bridgedb467' => esc_html__('Elementor', 'bridge-core')
                )
			),
			'bridgedb239' => array(
				'title' => esc_html__('Beachwear Store', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'woocommerce', 'sellkit'),
				'categories' => array(
					'shop'	=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb240' => array(
				'title' => esc_html__('Exotic Travels', 'bridge-core'),
				'rev-sliders' => array('home.zip', 'section1.zip', 'video.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				),
                'related_demos' => array(
					'bridgedb457' => esc_html__('Elementor', 'bridge-core')
                )
			),
			'bridgedb241' => array(
				'title' => esc_html__('TV Set Showcase', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb242' => array(
				'title' => esc_html__('Delivery', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				),
                'related_demos' => array(
					'bridgedb453' => esc_html__('Elementor', 'bridge-core')
                )
			),
			'bridgedb243' => array(
				'title' => esc_html__('Photo App', 'bridge-core'),
				'rev-sliders' => array('slider1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb244' => array(
				'title' => esc_html__('Climbing Club', 'bridge-core'),
				'rev-sliders' => array('home1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb245' => array(
				'title' => esc_html__('Organic Food Store', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'woocommerce', 'sellkit'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				),
                'related_demos' => array(
					'bridgedb449' => esc_html__('Elementor', 'bridge-core')
                )
			),
			'bridgedb246' => array(
				'title' => esc_html__('Fitness Tracker', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb247' => array(
				'title' => esc_html__('Catering', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb248' => array(
				'title' => esc_html__('Chocolate', 'bridge-core'),
				'rev-sliders' => array('home1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb249' => array(
				'title' => esc_html__('Book Landing', 'bridge-core'),
				'rev-sliders' => array('home1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				),
                'related_demos' => array(
					'bridgedb447' => esc_html__('Elementor', 'bridge-core')
                )
			),
			'bridgedb250' => array(
				'title' => esc_html__('Nurse Home', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb251' => array(
				'title' => esc_html__('Virtual Reality', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
				)
			),
			'bridgedb252' => array(
				'title' => esc_html__('Music Band', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
				)
			),
            'bridgedb253' => array(
                'title' => esc_html__('Real Estate', 'bridge-core'),
                'rev-sliders' => array('slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('js_composer', 'contact-form-7', 'revslider', 'qode-real-estate', 'woocommerce', 'sellkit', 'qode-woocommerce-checkout-integration', 'qode-membership'),
                'categories' => array(
	                'wpbakery'  => esc_html__('WPBakery', 'bridge-core'),
                    'business'  => esc_html__('Business', 'bridge-core'),
                    'special' => esc_html__('Special', 'bridge-core')
                )
            ),
			'bridgedb254' => array(
				'title' => esc_html__('SEO Agency', 'bridge-core'),
				'rev-sliders' => array('content-slider-1.zip','content-slider-2.zip', 'home-slider-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'one-page'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
			'bridgedb255' => array(
				'title' => esc_html__('Consulting Company', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'revslider', 'contact-form-7', 'qode-twitter-feed'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
			'bridgedb256' => array(
				'title' => esc_html__('Shared Workspace', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
			'bridgedb257' => array(
				'title' => esc_html__('Architect', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb258' => array(
				'title' => esc_html__('Jewelry Showcase', 'bridge-core'),
				'rev-sliders' => array('contact-us.zip', 'slider-1.zip', 'slider-1-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'revslider', 'contact-form-7', 'woocommerce', 'sellkit'),
				'categories' => array(
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb259' => array(
				'title' => esc_html__('Design Agency', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
			'bridgedb260' => array(
				'title' => esc_html__('Fundraising', 'bridge-core'),
				'rev-sliders' => array('slider-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
			'bridgedb261' => array(
				'title' => esc_html__('Speech Therapist', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'other'		=> esc_html__('Other', 'bridge-core')
				)
			),
			'bridgedb262' => array(
				'title' => esc_html__('Catering Service', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
			'bridgedb263' => array(
				'title' => esc_html__('Accounting', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
			'bridgedb264' => array(
				'title' => esc_html__('Personal Resume', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb265' => array(
				'title' => esc_html__('Landscape Architecture', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
			'bridgedb266' => array(
				'title' => esc_html__('Astrology', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'business'  => esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb267' => array(
				'title' => esc_html__('Décor Store', 'bridge-core'),
				'rev-sliders' => array('slider-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'revslider', 'contact-form-7', 'woocommerce', 'sellkit', 'qode-instagram-widget'),
				'categories' => array(
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb268' => array(
				'title' => esc_html__('Farmers’ Market', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'revslider', 'contact-form-7', 'woocommerce', 'sellkit', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb269' => array(
				'title' => esc_html__('Cocktail Bar', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'revslider', 'contact-form-7', 'qode-restaurant', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'special'   => esc_html__('Special', 'bridge-core')

				)
			),
			'bridgedb270' => array(
				'title' => esc_html__('Cinema', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
			'bridgedb271' => array(
				'title' => esc_html__('Wedding Photography', 'bridge-core'),
				'rev-sliders' => array('slider-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb272' => array(
				'title' => esc_html__('Fine Dining Restaurant', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'revslider', 'contact-form-7', 'qode-instagram-widget', 'qode-restaurant'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'special'   => esc_html__('Special', 'bridge-core')
				)
			),
			'bridgedb273' => array(
				'title' => esc_html__('Dairy Farm', 'bridge-core'),
				'rev-sliders' => array('home-slider-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'revslider', 'contact-form-7', 'woocommerce', 'sellkit', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb274' => array(
				'title' => esc_html__('Split Screen Portfolio', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb275' => array(
				'title' => esc_html__('Cosmetic Surgery', 'bridge-core'),
				'rev-sliders' => array('slider-1.zip', 'slider-2.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
			'bridgedb276' => array(
				'title' => esc_html__('Minimal Portfolio', 'bridge-core'),
				'rev-sliders' => array('services.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'revslider', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb277' => array(
				'title' => esc_html__('Travel Blogger', 'bridge-core'),
				'rev-sliders' => array('slider-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'blog'		=> esc_html__('Blog', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
			'bridgedb278' => array(
				'title' => esc_html__('Portfolio Compact', 'bridge-core'),
				'rev-sliders' => array('home-slider-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'revslider', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb279' => array(
				'title' => esc_html__('App Landing', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
			'bridgedb280' => array(
				'title' => esc_html__('Property Showcase', 'bridge-core'),
				'rev-sliders' => array('content-slider-1.zip', 'home-slider-1.zip', 'single.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
			'bridgedb281' => array(
				'title' => esc_html__('Ceramic Store', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'revslider', 'contact-form-7', 'woocommerce', 'sellkit', 'qode-instagram-widget'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb282' => array(
				'title' => esc_html__('Ridesharing Company', 'bridge-core'),
				'rev-sliders' => array('slider-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'elementor', 'revslider'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core'),
                    'creative'  => esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb283' => array(
				'title' => esc_html__('Personal Blog', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'revslider', 'contact-form-7'),
				'categories' => array(
					'blog'		=> esc_html__('Blog', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
			'bridgedb284' => array(
				'title' => esc_html__('Hospital', 'bridge-core'),
				'rev-sliders' => array('slider-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
			'bridgedb285' => array(
				'title' => esc_html__('Home Décor', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'woocommerce', 'sellkit'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb286' => array(
				'title' => esc_html__('Medical Marijuana', 'bridge-core'),
				'rev-sliders' => array('home-slider-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'revslider', 'contact-form-7', 'woocommerce', 'sellkit', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb287' => array(
				'title' => esc_html__('Esports', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb288' => array(
				'title' => esc_html__('Tattoo Parlor', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'woocommerce', 'sellkit', 'qode-instagram-widget'),
				'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'shop'	    => esc_html__('Shop', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb289' => array(
				'title' => esc_html__('Solar Panels', 'bridge-core'),
				'rev-sliders' => array('home-rev-3.zip', 'slider-1.zip', 'home-rev-2.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider', 'woocommerce', 'sellkit'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'shop'	=> esc_html__('Shop', 'bridge-core'),
				)
			),
            'bridgedb290' => array(
				'title' => esc_html__('Running Crew', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb291' => array(
				'title' => esc_html__('Coming Soon Landing', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7'),
				'categories' => array(
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'one-page'	=> esc_html__('One Page', 'bridge-core'),
				)
			),
            'bridgedb292' => array(
				'title' => esc_html__('Camping', 'bridge-core'),
				'rev-sliders' => array('slider-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
				)
			),
            'bridgedb293' => array(
				'title' => esc_html__('Interactive Portfolio', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core'),
				)
			),
            'bridgedb294' => array(
				'title' => esc_html__('Gelateria', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'woocommerce', 'sellkit'),
				'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'shop'	=> esc_html__('Shop', 'bridge-core'),
				)
			),
            'bridgedb295' => array(
				'title' => esc_html__('Photo Portfolio', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7'),
				'categories' => array(
                    'portfolio'	=> esc_html__('Portfolio', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb296' => array(
				'title' => esc_html__('Environmental NGO', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider', 'qode-instagram-widget'),
				'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb297' => array(
				'title' => esc_html__('Theater', 'bridge-core'),
				'rev-sliders' => array('slider-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
				'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb298' => array(
				'title' => esc_html__('Brutalist Portfolio', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
				'categories' => array(
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
            'bridgedb299' => array(
				'title' => esc_html__('Lingerie Shop', 'bridge-core'),
				'rev-sliders' => array('slider-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'woocommerce', 'sellkit', 'contact-form-7', 'revslider', 'qode-instagram-widget'),
				'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'shop'	=> esc_html__('Shop', 'bridge-core')
				)
			),
            'bridgedb301' => array(
				'title' => esc_html__('Web Studio', 'bridge-core'),
				'rev-sliders' => array('slider-1.zip'),
                'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
				'categories' => array(
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'one-page'	=> esc_html__('One Page', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
            'bridgedb302' => array(
                'title' => esc_html__('Beauty Store', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'woocommerce', 'sellkit', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'shop'	=> esc_html__('Shop', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb303' => array(
                'title' => esc_html__('Furniture Brand', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'woocommerce', 'sellkit', 'contact-form-7', 'qode-instagram-widget', 'yith-woocommerce-wishlist', 'yith-woocommerce-quick-view'),
                'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'shop'	=> esc_html__('Shop', 'bridge-core'),
                )
            ),
            'bridgedb304' => array(
                'title' => esc_html__('Creative Portfolio', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7'),
                'categories' => array(
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'portfolio'	=> esc_html__('Portfolio', 'bridge-core'),
                )
            ),
            'bridgedb305' => array(
                'title' => esc_html__('Agency Showcase', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'qode-instagram-widget'),
                'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                )
            ),
            'bridgedb306' => array(
                'title' => esc_html__('Festival', 'bridge-core'),
                'rev-sliders' => array('slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                )
            ),
            'bridgedb307' => array(
                'title' => esc_html__('Art Shop', 'bridge-core'),
                'rev-sliders' => array('home.zip', 'about.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider', 'woocommerce', 'sellkit'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'shop'	=> esc_html__('Shop', 'bridge-core'),
                )
            ),
            'bridgedb308' => array(
                'title' => esc_html__('Art Portfolio', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7'),
                'categories' => array(
                    'portfolio'	=> esc_html__('Portfolio', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                )
            ),
            'bridgedb309' => array(
                'title' => esc_html__('Blogger', 'bridge-core'),
                'rev-sliders' => array('home.zip', 'home-2.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'blog'	=> esc_html__('Blog', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
                )
            ),
            'bridgedb310' => array(
                'title' => esc_html__('Political Candidate', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider', 'qode-instagram-widget', 'qode-twitter-feed'),
                'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb311' => array(
                'title' => esc_html__('Artist Minimal', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7'),
                'categories' => array(
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'portfolio'	=> esc_html__('Portfolio', 'bridge-core'),
                )
            ),
            'bridgedb312' => array(
                'title' => esc_html__('Coffee Shop', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'woocommerce', 'sellkit'),
                'categories' => array(
                    'shop'	=> esc_html__('Shop', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
                )
            ),
            'bridgedb313' => array(
                'title' => esc_html__('Tobacco Shop', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'woocommerce', 'sellkit', 'revslider'),
                'categories' => array(
                    'shop'	=> esc_html__('Shop', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb314' => array(
                'title' => esc_html__('Music School', 'bridge-core'),
                'rev-sliders' => array('home.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider', 'qode-instagram-widget'),
                'categories' => array(
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core'),
                )
            ),
            'bridgedb315' => array(
                'title' => esc_html__('Book Store', 'bridge-core'),
                'rev-sliders' => array('home.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'woocommerce', 'sellkit', 'revslider', 'qode-instagram-widget'),
                'categories' => array(
                    'shop'	=> esc_html__('Shop', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
                )
            ),
            'bridgedb316' => array(
                'title' => esc_html__('Honey', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'woocommerce', 'sellkit', 'revslider'),
                'categories' => array(
                    'shop'	=> esc_html__('Shop', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core'),
                )
            ),
            'bridgedb317' => array(
                'title' => esc_html__('Transport Services', 'bridge-core'),
                'rev-sliders' => array('home.zip', 'slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core'),
                )
            ),
            'bridgedb318' => array(
                'title' => esc_html__('Manicure', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'qode-instagram-widget'),
                'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb319' => array(
                'title' => esc_html__('Design Conference', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider', 'timetable'),
                'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb320' => array(
                'title' => esc_html__('Moving Services', 'bridge-core'),
                'rev-sliders' => array('home.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb321' => array(
                'title' => esc_html__('Yoga and Pilates', 'bridge-core'),
                'rev-sliders' => array('1-slider.zip', '2-home-top.zip', '3-bottom-section.zip', '4-home-half-slider.zip', ),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb322' => array(
                'title' => esc_html__('Electric Scooter Rental', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb323' => array(
                'title' => esc_html__('Illustration Portfolio', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7'),
                'categories' => array(
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'portfolio'	=> esc_html__('Portfolio', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb324' => array(
                'title' => esc_html__('Liquor Showcase', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb325' => array(
                'title' => esc_html__('Music Artist', 'bridge-core'),
                'rev-sliders' => array('home.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider', 'qode-music', 'woocommerce', 'sellkit'),
                'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'special'	=> esc_html__('Special', 'bridge-core'),
                )
            ),
            'bridgedb326' => array(
                'title' => esc_html__('Pasta', 'bridge-core'),
                'rev-sliders' => array('home-slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider', 'qode-restaurant'),
                'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'special'   => esc_html__('Special', 'bridge-core')
                )
            ),
            'bridgedb327' => array(
                'title' => esc_html__('Ballet', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb328' => array(
                'title' => esc_html__('Modeling Agency', 'bridge-core'),
                'rev-sliders' => array('home.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb329' => array(
                'title' => esc_html__('Food Delivery', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider', 'qode-instagram-widget'),
                'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb330' => array(
                'title' => esc_html__('Music Group', 'bridge-core'),
                'rev-sliders' => array('slider-1.zip', 'home.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider', 'qode-music'),
                'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'special'	=> esc_html__('Special', 'bridge-core'),
                )
            ),
            'bridgedb331' => array(
                'title' => esc_html__('Architecture Showcase', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'qode-instagram-widget'),
                'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                )
            ),
            'bridgedb332' => array(
                'title' => esc_html__('Wedding Blog', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'qode-instagram-widget'),
                'categories' => array(
                    'blog'	    => esc_html__('Blog', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb333' => array(
                'title' => esc_html__('Cabin Rental', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'business'  => esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb334' => array(
                'title' => esc_html__('Consumer Electronics Store', 'bridge-core'),
                'rev-sliders' => array('home-slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider', 'woocommerce', 'sellkit', 'yith-woocommerce-wishlist', 'yith-woocommerce-quick-view'),
                'categories' => array(
                    'shop'	    => esc_html__('Shop', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb335' => array(
                'title' => esc_html__('SaaS', 'bridge-core'),
                'rev-sliders' => array('slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'business' => esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'one-page'	=> esc_html__('One Page', 'bridge-core'),
                )
            ),
            'bridgedb336' => array(
                'title' => esc_html__('Author Blog', 'bridge-core'),
                'rev-sliders' => array('home-slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider', 'woocommerce', 'sellkit'),
                'categories' => array(
                    'blog' => esc_html__('Blog', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'shop'	=> esc_html__('Shop', 'bridge-core'),
                )
            ),
            'bridgedb337' => array(
                'title' => esc_html__('Fashion Retail', 'bridge-core'),
                'rev-sliders' => array('slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider', 'woocommerce', 'sellkit', 'qode-instagram-widget'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'shop'	=> esc_html__('Shop', 'bridge-core'),
                )
            ),
            'bridgedb338' => array(
                'title' => esc_html__('App Demonstration', 'bridge-core'),
                'rev-sliders' => array('slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('revslider'),
                'categories' => array(
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'one-page'	=> esc_html__('One Page', 'bridge-core'),
                )
            ),
            'bridgedb339' => array(
                'title' => esc_html__('Construction Firm', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider', 'qode-instagram-widget', 'qode-twitter-feed'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core'),
                )
            ),
            'bridgedb340' => array(
                'title' => esc_html__('Agency Creative', 'bridge-core'),
                'rev-sliders' => array('1-home-slider.zip', '2-home-slider.zip', '3-home-slider.zip', '4-about-slider.zip', '5-portfolio-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'creative' => esc_html__('Creative', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core'),
                )
            ),
            'bridgedb341' => array(
                'title' => esc_html__('Food Truck', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'woocommerce', 'sellkit', 'qode-instagram-widget', 'qode-twitter-feed', 'qode-restaurant'),
                'categories' => array(
                    'shop'	=> esc_html__('Shop', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'special'   => esc_html__('Special', 'bridge-core')
                )
            ),
            'bridgedb342' => array(
                'title' => esc_html__('Oil Industry', 'bridge-core'),
                'rev-sliders' => array('home-slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core'),
                )
            ),
            'bridgedb343' => array(
                'title' => esc_html__('Gaming Parallax', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core'),
                )
            ),
            'bridgedb344' => array(
                'title' => esc_html__('Paintball', 'bridge-core'),
                'rev-sliders' => array('home-slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core'),
                )
            ),
            'bridgedb345' => array(
                'title' => esc_html__('Chiropractic', 'bridge-core'),
                'rev-sliders' => array('1-home-slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core'),
                )
            ),
            'bridgedb346' => array(
                'title' => esc_html__('Skiing', 'bridge-core'),
                'rev-sliders' => array('1-home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider', 'qode-instagram-widget'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core'),
                )
            ),
            'bridgedb347' => array(
                'title' => esc_html__('Tea House', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider', 'woocommerce', 'sellkit', 'qode-restaurant'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'shop'	=> esc_html__('Shop', 'bridge-core'),
                    'special'   => esc_html__('Special', 'bridge-core')
                )
            ),
            'bridgedb348' => array(
                'title' => esc_html__('Team Building', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core'),
                )
            ),
            'bridgedb349' => array(
                'title' => esc_html__('Antique Store', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'woocommerce', 'sellkit', 'revslider', 'qode-instagram-widget'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'shop'	=> esc_html__('Shop', 'bridge-core'),
                )
            ),
            'bridgedb350' => array(
                'title' => esc_html__('Creative Agency Dark', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core'),
                )
            ),
            'bridgedb351' => array(
                'title' => esc_html__('Portfolio Animated', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'portfolio'	=> esc_html__('Portfolio', 'bridge-core'),
                )
            ),
            'bridgedb352' => array(
                'title' => esc_html__('Handcrafted', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'blog'	=> esc_html__('Blog', 'bridge-core'),
                )
            ),
            'bridgedb353' => array(
                'title' => esc_html__('Artist', 'bridge-core'),
                'rev-sliders' => array('home-slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'one-page'	=> esc_html__('One Page', 'bridge-core'),
                    'portfolio'	=> esc_html__('Portfolio', 'bridge-core'),
                )
            ),
            'bridgedb354' => array(
                'title' => esc_html__('Guitar Making', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider', 'qode-instagram-widget'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core'),
                )
            ),
            'bridgedb355' => array(
                'title' => esc_html__('Portfolio Alternating', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'portfolio'	=> esc_html__('Portfolio', 'bridge-core'),
                )
            ),
            'bridgedb356' => array(
                'title' => esc_html__('Art Museum', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider', 'woocommerce', 'sellkit', 'qode-instagram-widget'),
                'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core')
                )
            ),
            'bridgedb357' => array(
                'title' => esc_html__('Portfolio Gallery', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7'),
                'categories' => array(
                    'portfolio'	=> esc_html__('Portfolio', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core')
                )
            ),
            'bridgedb358' => array(
                'title' => esc_html__('Wedding Invite', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
                )
            ),
            'bridgedb359' => array(
                'title' => esc_html__('Blog Illustrated', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7'),
                'categories' => array(
                    'blog'	=> esc_html__('Blog', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core')
                )
            ),
            'bridgedb360' => array(
                'title' => esc_html__('Cosmetics', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider', 'woocommerce', 'sellkit', 'yith-woocommerce-wishlist', 'yith-woocommerce-quick-view' ),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'shop'	=> esc_html__('Shop', 'bridge-core')
                )
            ),
            'bridgedb361' => array(
                'title' => esc_html__('Ice Hockey', 'bridge-core'),
                'rev-sliders' => array('01-home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider', 'qode-instagram-widget', 'qode-twitter-feed'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core')
                )
            ),
            'bridgedb362' => array(
                'title' => esc_html__('Lookbook', 'bridge-core'),
                'rev-sliders' => array('slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core')
                )
            ),
            'bridgedb363' => array(
                'title' => esc_html__('Gym Dark', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider', 'qode-instagram-widget', 'timetable'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core')
                )
            ),
            'bridgedb364' => array(
                'title' => esc_html__('Urban Clothing Store', 'bridge-core'),
                'rev-sliders' => array('slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider', 'woocommerce', 'sellkit', 'yith-woocommerce-wishlist', 'yith-woocommerce-quick-view'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'shop'	=> esc_html__('Shop', 'bridge-core')
                )
            ),
            'bridgedb365' => array(
                'title' => esc_html__('Creative Magazine', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'qode-news', 'qode-instagram-widget', 'qode-twitter-feed'),
                'categories' => array(
                    'blog'	=> esc_html__('Blog', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'special'	=> esc_html__('Special', 'bridge-core')
                )
            ),
            'bridgedb366' => array(
                'title' => esc_html__('Interior Design Blog', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'qode-instagram-widget'),
                'categories' => array(
                    'blog'	=> esc_html__('Blog', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb367' => array(
                'title' => esc_html__('Studio Creative', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7'),
                'categories' => array(
                    'portfolio'	=> esc_html__('Portfolio', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb368' => array(
                'title' => esc_html__('Cake Shop', 'bridge-core'),
                'rev-sliders' => array('slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'woocommerce', 'sellkit', 'revslider'),
                'categories' => array(
                    'business'	=> esc_html__('Businness', 'bridge-core'),
                    'shop'	=> esc_html__('Shop', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb369' => array(
                'title' => esc_html__('Education', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'woocommerce', 'sellkit', 'revslider', 'qode-lms', 'qode-woocommerce-checkout-integration'),
                'categories' => array(
                    'special'	=> esc_html__('Special', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb370' => array(
                'title' => esc_html__('Pianist', 'bridge-core'),
                'rev-sliders' => array('slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb371' => array(
                'title' => esc_html__('Coming Soon Circular', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor'),
                'categories' => array(
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'one-page'	=> esc_html__('One Page', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb372' => array(
                'title' => esc_html__('Shoe Store', 'bridge-core'),
                'rev-sliders' => array('slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider', 'woocommerce', 'sellkit'),
                'categories' => array(
                    'shop'	=> esc_html__('Shop', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb373' => array(
                'title' => esc_html__('Pharmacy', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider', 'woocommerce', 'sellkit'),
                'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'shop'	=> esc_html__('Shop', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb374' => array(
                'title' => esc_html__('Massage Parlor', 'bridge-core'),
                'rev-sliders' => array('slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider', 'qode-instagram-widget'),
                'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb375' => array(
                'title' => esc_html__('Green Energy', 'bridge-core'),
                'rev-sliders' => array('home-slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
			'bridgedb376' => array(
				'title' => esc_html__('Travel Tours', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider', 'qode-tours', 'qode-instagram-widget', 'qode-twitter-feed'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'special'	=> esc_html__('Special', 'bridge-core')
				)
			),
			'bridgedb377' => array(
				'title' => esc_html__('Consultant', 'bridge-core'),
				'rev-sliders' => array('slider-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
				)
			),
			'bridgedb378' => array(
				'title' => esc_html__('Aromatherapy', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
				)
			),
			'bridgedb379' => array(
				'title' => esc_html__('Hairdresser', 'bridge-core'),
				'rev-sliders' => array('slider-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
				)
			),
            'bridgedb380' => array(
				'title' => esc_html__('Artisan Bag Shop', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider', 'woocommerce', 'sellkit'),
				'categories' => array(
					'shop'	=> esc_html__('Shop', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
				)
			),
            'bridgedb381' => array(
				'title' => esc_html__('Curriculum Vitae', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb382' => array(
				'title' => esc_html__('Author', 'bridge-core'),
				'rev-sliders' => array('slider-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb383' => array(
				'title' => esc_html__('Rattan Furniture', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider', 'woocommerce', 'sellkit'),
				'categories' => array(
					'shop'	=> esc_html__('Shop', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb384' => array(
				'title' => esc_html__('Listing', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'qode-membership', 'qode-listing', 'woocommerce', 'sellkit', 'wp-job-manager', 'wp-job-manager-locations'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'special'	=> esc_html__('Special', 'bridge-core')
				)
			),
            'bridgedb385' => array(
				'title' => esc_html__('Fashion Portfolio', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
            'bridgedb386' => array(
				'title' => esc_html__('Portfolio Illustration', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
            'bridgedb387' => array(
				'title' => esc_html__('Package Design Portfolio', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
            'bridgedb388' => array(
				'title' => esc_html__('Singer-songwriter', 'bridge-core'),
				'rev-sliders' => array('slider-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb389' => array(
				'title' => esc_html__('Hotel', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb390' => array(
				'title' => esc_html__('Coffeehouse', 'bridge-core'),
				'rev-sliders' => array('slider-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb391' => array(
				'title' => esc_html__('Coming Soon Ceramics', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb392' => array(
				'title' => esc_html__('Portfolio Dark', 'bridge-core'),
				'rev-sliders' => array('slider-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb393' => array(
				'title' => esc_html__('Lingerie Store', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider', 'woocommerce', 'sellkit'),
				'categories' => array(
					'shop'  	=> esc_html__('Shop', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb394' => array(
				'title' => esc_html__('Business Light', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7'),
				'categories' => array(
					'business'  => esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb395' => array(
				'title' => esc_html__('Jewelry Shop', 'bridge-core'),
				'rev-sliders' => array('slider-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'woocommerce', 'sellkit', 'revslider'),
				'categories' => array(
					'shop'      => esc_html__('Shop', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb396' => array(
				'title' => esc_html__('Bridal Shop', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'woocommerce', 'sellkit', 'revslider'),
				'categories' => array(
					'shop'      => esc_html__('Shop', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb397' => array(
				'title' => esc_html__('Interactive Links Portfolio', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'woocommerce', 'sellkit'),
				'categories' => array(
					'creative'  => esc_html__('Creative', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
            'bridgedb398' => array(
				'title' => esc_html__('Perfume Store', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'woocommerce', 'sellkit', 'revslider'),
				'categories' => array(
					'shop'      => esc_html__('Shop', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb399' => array(
				'title' => esc_html__('Fashion Showcase', 'bridge-core'),
				'rev-sliders' => array('slider-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
				'categories' => array(
					'creative'  => esc_html__('Creative', 'bridge-core'),
					'shop'      => esc_html__('Shop', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb400' => array(
				'title' => esc_html__('Agency Pink', 'bridge-core'),
				'rev-sliders' => array('slider-1.zip', 'slider-2.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
				'categories' => array(
					'creative'  => esc_html__('Creative', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb401' => array(
				'title' => esc_html__('Music', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'qode-music'),
				'categories' => array(
					'special'  => esc_html__('Special', 'bridge-core'),
					'shop'      => esc_html__('Shop', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb402' => array(
				'title' => esc_html__('Graphic Design Portfolio', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7'),
				'categories' => array(
					'creative'  => esc_html__('Creative', 'bridge-core'),
					'portfolio' => esc_html__('Portfolio', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb403' => array(
				'title' => esc_html__('Agency Parallax', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7'),
                'categories' => array(
                    'creative'  => esc_html__('Creative', 'bridge-core'),
                    'portfolio' => esc_html__('Portfolio', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
                )
			),
            'bridgedb404' => array(
				'title' => esc_html__('Print Design', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7'),
                'categories' => array(
                    'creative'  => esc_html__('Creative', 'bridge-core'),
                    'portfolio' => esc_html__('Portfolio', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
                )
			),
            'bridgedb405' => array(
				'title' => esc_html__('Food & Dining Magazine', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'qode-news'),
                'categories' => array(
                    'blog'  => esc_html__('Blog', 'bridge-core'),
                    'special' => esc_html__('Special', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
                )
			),
            'bridgedb406' => array(
				'title' => esc_html__('Horizontal Portfolio', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7'),
                'categories' => array(
                    'creative'  => esc_html__('Creative', 'bridge-core'),
                    'portfolio' => esc_html__('Portfolio', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
                )
			),
            'bridgedb407' => array(
				'title' => esc_html__('Portfolio Spread', 'bridge-core'),
				'rev-sliders' => array('slider-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'creative'  => esc_html__('Creative', 'bridge-core'),
                    'portfolio' => esc_html__('Portfolio', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
                )
			),
            'bridgedb408' => array(
				'title' => esc_html__('Portfolio Vertical Slider', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7'),
                'categories' => array(
                    'creative'  => esc_html__('Creative', 'bridge-core'),
                    'portfolio' => esc_html__('Portfolio', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
                )
			),
            'bridgedb409' => array(
				'title' => esc_html__('Portfolio Horizontal Slider', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7'),
                'categories' => array(
                    'creative'  => esc_html__('Creative', 'bridge-core'),
                    'portfolio' => esc_html__('Portfolio', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
                )
			),
            'bridgedb410' => array(
				'title' => esc_html__('Sale Announcement', 'bridge-core'),
				'rev-sliders' => array('slider-1.zip', '01-home-slider.zip', '02-home-slider.zip', '03-home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'revslider'),
                'categories' => array(
                    'shop'  => esc_html__('Shop', 'bridge-core'),
                    'one-page' => esc_html__('One Page', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
                )
			),
            'bridgedb411' => array(
				'title' => esc_html__('Fashion II', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'qode-instagram-widget'),
                'categories' => array(
                    'blog'  => esc_html__('Blog', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
                )
			),
			'bridgedb412' => array(
				'title' => esc_html__('Fashion Photographer', 'bridge-core'),
				'rev-sliders' => array('slider-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
				'categories' => array(
					'creative'  => esc_html__('Creative', 'bridge-core'),
					'portfolio' => esc_html__('Portfolio', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
			'bridgedb413' => array(
				'title' => esc_html__('Fashion Blogger', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'blog'  => esc_html__('Blog', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb414' => array(
                'title' => esc_html__('Fashion & Lifestyle Blog', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7'),
                'categories' => array(
                    'blog'  => esc_html__('Blog', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
                )
            ),
            'bridgedb415' => array(
                'title' => esc_html__('Fashion Model Agency', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7'),
                'categories' => array(
                    'business'  => esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'portfolio'  => esc_html__('Portfolio', 'bridge-core')
                )
            ),
            'bridgedb416' => array(
                'title' => esc_html__('Novelist', 'bridge-core'),
                'rev-sliders' => array('slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'creative'  => esc_html__('Creative', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'one-page'  => esc_html__('One Page', 'bridge-core')
                )
            ),
			'bridgedb417' => array(
                'title' => esc_html__('Dental Office', 'bridge-core'),
                'rev-sliders' => array('slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
	                'business'  => esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
                )
            ),
			'bridgedb418' => array(
                'title' => esc_html__('Wedding Coordinator', 'bridge-core'),
                'rev-sliders' => array('slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
	                'business'  => esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
                )
            ),
			'bridgedb419' => array(
                'title' => esc_html__('Law Practice', 'bridge-core'),
                'rev-sliders' => array('slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
	                'business'  => esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
                )
            ),
			'bridgedb420' => array(
                'title' => esc_html__('Food Blog', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'qode-news', 'qode-instagram-widget'),
                'categories' => array(
	                'blog'  => esc_html__('Blog', 'bridge-core'),
	                'special'  => esc_html__('Special', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
                )
            ),
			'bridgedb421' => array(
                'title' => esc_html__('Product Presentation', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7'),
                'categories' => array(
	                'business'  => esc_html__('Business', 'bridge-core'),
	                'shop'  => esc_html__('Shop', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
                )
            ),
			'bridgedb422' => array(
                'title' => esc_html__('Bike Brand', 'bridge-core'),
                'rev-sliders' => array('slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
	                'business'  => esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
                )
            ),
			'bridgedb423' => array(
                'title' => esc_html__('Smartwatch Presentation', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7'),
                'categories' => array(
	                'business'  => esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
                )
            ),
			'bridgedb424' => array(
                'title' => esc_html__('Cleaning Services', 'bridge-core'),
                'rev-sliders' => array('slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
	                'business'  => esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
                )
            ),
			'bridgedb425' => array(
                'title' => esc_html__('Web Design Agency', 'bridge-core'),
                'rev-sliders' => array(
					'1-home-slider.zip',
					'2-home-slider.zip',
					'3-home-slider.zip',
					'4-about-slider.zip',
					'5-about-slider-2.zip',
					'6-about-slider-3.zip',
					'8-about-slider-5.zip',
					'9-portfolio-slider.zip',
					'9-portfolio-slider-1.zip',
	                '10-contact-slider-1.zip',
					'11-contact-slider-2.zip',
	                '7-about-slider-4.zip',
                ),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider', 'qode-instagram-widget', 'qode-twitter-feed'),
                'categories' => array(
	                'creative'  => esc_html__('Creative', 'bridge-core'),
	                'business'  => esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
                )
            ),
			'bridgedb426' => array(
                'title' => esc_html__('Climate Conference', 'bridge-core'),
                'rev-sliders' => array(
					'01-home-slider.zip',
	                '02-home-slider.zip'
                ),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
	                'creative'  => esc_html__('Creative', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
                )
            ),
			'bridgedb427' => array(
                'title' => esc_html__('Cooking Blog', 'bridge-core'),
                'rev-sliders' => array(
					'slider-1.zip'
                ),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider', 'qode-instagram-widget'),
                'categories' => array(
	                'blog'  => esc_html__('Blog', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
                )
            ),
			'bridgedb428' => array(
                'title' => esc_html__('Backpack Presentation', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'woocommerce', 'sellkit'),
                'categories' => array(
	                'shop'  => esc_html__('Shop', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
                )
            ),
			'bridgedb429' => array(
                'title' => esc_html__('Music Presentation', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'qode-music'),
                'categories' => array(
	                'creative'  => esc_html__('Creative', 'bridge-core'),
	                'special'  => esc_html__('Special', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
                )
            ),
			'bridgedb430' => array(
                'title' => esc_html__('Wedding Reception', 'bridge-core'),
                'rev-sliders' => array(
                	'slider-1.zip'
                ),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
	                'business'  => esc_html__('Business', 'bridge-core'),
	                'one-page'	=> esc_html__('One Page', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
                )
            ),
            'bridgedb431' => array(
                'title' => esc_html__('Transport Firm', 'bridge-core'),
                'rev-sliders' => array(
                    'slider-1.zip'
                ),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'business'  => esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
                )
            ),
			'bridgedb432' => array(
                'title' => esc_html__('Web Agency Showcase', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7'),
                'categories' => array(
                    'business'  => esc_html__('Business', 'bridge-core'),
                    'creative'  => esc_html__('Creative', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
                )
            ),
			'bridgedb433' => array(
                'title' => esc_html__('Cloud Storage', 'bridge-core'),
                'rev-sliders' => array( 'slider-1.zip' ),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'business'  => esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
                )
            ),
			'bridgedb434' => array(
                'title' => esc_html__('App Showcase Split', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7'),
                'categories' => array(
                    'business'  => esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'one-page'	=> esc_html__('One Page', 'bridge-core'),
                )
            ),
			'bridgedb435' => array(
                'title' => esc_html__('Alternating Portfolio', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7'),
                'categories' => array(
                    'crative'   => esc_html__('Creative', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'portfolio'	=> esc_html__('Portfolio', 'bridge-core'),
                )
            ),
			'bridgedb436' => array(
                'title' => esc_html__('Design Portfolio', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7'),
                'categories' => array(
                    'crative'   => esc_html__('Creative', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'portfolio'	=> esc_html__('Portfolio', 'bridge-core'),
                )
            ),
			'bridgedb437' => array(
                'title' => esc_html__('Real Estate Agency', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'qode-real-estate'),
                'categories' => array(
                    'business'   => esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'special'	=> esc_html__('Special', 'bridge-core'),
                )
            ),
            'bridgedb438' => array(
                'title' => esc_html__('Wedding Ceremony', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7'),
                'categories' => array(
                    'business'   => esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb439' => array(
                'title' => esc_html__('Consulting Firm', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor'),
                'categories' => array(
                    'business'   => esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
			'bridgedb440' => array(
                'title' => esc_html__('Construction Company', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'business'   => esc_html__('Business', 'bridge-core'),
                ),
				'should_render' => false
            ),
			'bridgedb441' => array(
                'title' => esc_html__('Factory', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'qi-addons-for-elementor'),
                'categories' => array(
	                'elementor'  => esc_html__('Elementor', 'bridge-core'),
	                'business'	=> esc_html__('Business', 'bridge-core')
                ),
				'should_render' => false
            ),
			'bridgedb442' => array(
                'title' => esc_html__('Pottery', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'woocommerce', 'sellkit', 'qi-addons-for-elementor'),
                'categories' => array(
	                'elementor'  => esc_html__('Elementor', 'bridge-core'),
	                'business'	 => esc_html__('Business', 'bridge-core'),
	                'creative'	 => esc_html__('Creative', 'bridge-core')
                ),
				'should_render' => false
            ),
			'bridgedb443' => array(
                'title' => esc_html__('Music Magazine', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'qode-instagram-widget', 'qode-twitter-feed', 'qode-news', 'qi-addons-for-elementor'),
                'categories' => array(
	                'elementor' => esc_html__('Elementor', 'bridge-core'),
	                'blog'		=> esc_html__('Blog', 'bridge-core'),
	                'special'	=> esc_html__('Special', 'bridge-core')
                ),
				'should_render' => false
            ),
			'bridgedb444' => array(
				'title' => esc_html__('Medical', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'qode-instagram-widget', 'qode-twitter-feed', 'qi-addons-for-elementor'),
				'categories' => array(
					'elementor' => esc_html__('Elementor', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core')
				),
				'should_render' => false
            ),
            'bridgedb445' => array(
                'title' => esc_html__('Law Office', 'bridge-core'),
                'rev-sliders' => array('home.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'qi-addons-for-elementor'),
                'categories' => array(
                    'elementor' => esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core')
                ),
                'should_render' => false
            ),
            'bridgedb446' => array(
                'title' => esc_html__('Interior Decor', 'bridge-core'),
                'rev-sliders' => array('home.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'qi-addons-for-elementor'),
                'categories' => array(
                    'elementor'  => esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core')
                ),
                'should_render' => false
            ),
            'bridgedb447' => array(
                'title' => esc_html__('Book Landing', 'bridge-core'),
                'rev-sliders' => array('home1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'qi-addons-for-elementor'),
                'categories' => array(
                    'elementor'  => esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core')
                ),
                'should_render' => false
            ),
            'bridgedb448' => array(
                'title' => esc_html__('Psychotherapy', 'bridge-core'),
                'rev-sliders' => array('home.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'qi-addons-for-elementor'),
                'categories' => array(
                    'elementor'  => esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core')
                ),
                'should_render' => false
            ),
            'bridgedb449' => array(
                'title' => esc_html__('Organic Food Store', 'bridge-core'),
                'rev-sliders' => array('home.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'woocommerce', 'sellkit', 'qi-addons-for-elementor'),
                'categories' => array(
                    'elementor'  => esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'shop'		=> esc_html__('Shop', 'bridge-core')
                ),
                'should_render' => false
            ),
            'bridgedb450' => array(
                'title' => esc_html__('Travel', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'qode-tours', 'qode-instagram-widget', 'qode-membership', 'qode-twitter-feed', 'qi-addons-for-elementor'),
                'categories' => array(
                    'elementor'  => esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'special'	=> esc_html__('Special', 'bridge-core')
                ),
                'should_render' => false
            ),
            'bridgedb451' => array(
                'title' => esc_html__('Online Agency', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'qi-addons-for-elementor'),
                'categories' => array(
                    'elementor'  => esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core')
                ),
                'should_render' => false
            ),
            'bridgedb452' => array(
                'title' => esc_html__('Educational Center', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'woocommerce', 'sellkit', 'qode-lms', 'qode-woocommerce-checkout-integration', 'qi-addons-for-elementor'),
                'categories' => array(
                    'elementor'  => esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'special'	=> esc_html__('Special', 'bridge-core')
                ),
                'should_render' => false
            ),
            'bridgedb453' => array(
                'title' => esc_html__('Delivery', 'bridge-core'),
                'rev-sliders' => array('home.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'qi-addons-for-elementor'),
                'categories' => array(
                    'elementor'  => esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core')
                ),
                'should_render' => false
            ),
            'bridgedb454' => array(
                'title' => esc_html__('Business Consultant', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'qi-addons-for-elementor'),
                'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core')
                ),
                'should_render' => false
            ),
            'bridgedb455' => array(
                'title' => esc_html__('Restaurant and Bar', 'bridge-core'),
                'rev-sliders' => array('main-slider-n.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'qode-restaurant', 'qi-addons-for-elementor'),
                'categories' => array(
                    'elementor'  => esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'special'   => esc_html__('Special', 'bridge-core')
                ),
                'should_render' => false
            ),
            'bridgedb456' => array(
                'title' => esc_html__('Tiles', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'woocommerce', 'sellkit', 'qi-addons-for-elementor'),
                'categories' => array(
                    'elementor'  => esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core')
                ),
                'should_render' => false
            ),
            'bridgedb457' => array(
                'title' => esc_html__('Exotic Travels', 'bridge-core'),
                'rev-sliders' => array('home.zip', 'section1.zip', 'video.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'qode-instagram-widget', 'qi-addons-for-elementor'),
                'categories' => array(
                    'elementor'  => esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core')
                ),
                'should_render' => false
            ),
            'bridgedb458' => array(
                'title' => esc_html__('Gardening', 'bridge-core'),
                'rev-sliders' => array('home.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'qi-addons-for-elementor'),
                'categories' => array(
                    'elementor'  => esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core')
                ),
                'should_render' => false
            ),
            'bridgedb459' => array(
                'title' => esc_html__('Jewelry Store', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'qode-instagram-widget', 'woocommerce', 'sellkit', 'qi-addons-for-elementor'),
                'categories' => array(
                    'elementor'  => esc_html__('Elementor', 'bridge-core'),
                    'shop'	=> esc_html__('Shop', 'bridge-core')
                ),
                'should_render' => false
            ),
            'bridgedb460' => array(
                'title' => esc_html__('Explorer', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'qode-instagram-widget', 'qode-twitter-feed', 'qi-addons-for-elementor'),
                'categories' => array(
                    'elementor'  => esc_html__('Elementor', 'bridge-core'),
                    'blog'	=> esc_html__('Blog', 'bridge-core')
                ),
                'should_render' => false
            ),
            'bridgedb461' => array(
                'title' => esc_html__('Transport', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'qi-addons-for-elementor'),
                'categories' => array(
                    'elementor'  => esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core')
                ),
                'should_render' => false
            ),
            'bridgedb462' => array(
                'title' => esc_html__('Digital Studio', 'bridge-core'),
                'rev-sliders' => array('home.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'qi-addons-for-elementor'),
                'categories' => array(
                    'elementor'  => esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core')
                ),
                'should_render' => false
            ),
            'bridgedb463' => array(
                'title' => esc_html__('Organic Market', 'bridge-core'),
                'rev-sliders' => array('home.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'qi-addons-for-elementor'),
                'categories' => array(
                    'elementor'  => esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'one-page'	=> esc_html__('One Page', 'bridge-core')
                ),
                'should_render' => false
            ),
            'bridgedb464' => array(
                'title' => esc_html__('Web Design Studio', 'bridge-core'),
                'rev-sliders' => array('home.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'qode-instagram-widget', 'qode-twitter-feed', 'qi-addons-for-elementor'),
                'categories' => array(
                    'elementor'  => esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core')
                ),
                'should_render' => false
            ),
            'bridgedb465' => array(
                'title' => esc_html__('Wristwatch Shop', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'woocommerce', 'sellkit', 'qi-addons-for-elementor'),
                'categories' => array(
                    'elementor'  => esc_html__('Elementor', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'shop'		=> esc_html__('Shop', 'bridge-core')
                ),
                'should_render' => false
            ),
            'bridgedb466' => array(
                'title' => esc_html__('Babysitter', 'bridge-core'),
                'rev-sliders' => array('home.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'qi-addons-for-elementor'),
                'categories' => array(
                    'elementor'  => esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core')
                ),
                'should_render' => false
            ),
            'bridgedb467' => array(
                'title' => esc_html__('Designer Presentation', 'bridge-core'),
                'rev-sliders' => array('home.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'qode-instagram-widget', 'qi-addons-for-elementor'),
                'categories' => array(
                    'elementor'  => esc_html__('Elementor', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core')
                ),
                'should_render' => false
            ),
            'bridgedb468' => array(
                'title' => esc_html__('Car Dealership', 'bridge-core'),
                'rev-sliders' => array('slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'qi-addons-for-elementor'),
                'categories' => array(
                    'elementor'  => esc_html__('Elementor', 'bridge-core'),
                    'business'	 => esc_html__('Business', 'bridge-core')
                ),
                'should_render' => false
            ),
            'bridgedb469' => array(
                'title' => esc_html__('Architectural Firm', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'qi-addons-for-elementor'),
                'categories' => array(
                    'elementor'  => esc_html__('Elementor', 'bridge-core'),
                    'business'	 => esc_html__('Business', 'bridge-core'),
                    'creative'	 => esc_html__('Creative', 'bridge-core')
                ),
                'should_render' => false
            ),
            'bridgedb470' => array(
                'title' => esc_html__('Moving Company', 'bridge-core'),
                'rev-sliders' => array('home.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'qode-instagram-widget', 'qi-addons-for-elementor'),
                'categories' => array(
                    'elementor'  => esc_html__('Elementor', 'bridge-core'),
                    'business'	 => esc_html__('Business', 'bridge-core')
                ),
                'should_render' => false
            ),
            'bridgedb471' => array(
                'title' => esc_html__('Architect Studio', 'bridge-core'),
                'rev-sliders' => array('slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'qi-addons-for-elementor'),
                'categories' => array(
                    'elementor'  => esc_html__('Elementor', 'bridge-core'),
                    'business'	 => esc_html__('Business', 'bridge-core'),
                    'portfolio'	 => esc_html__('Portfolio', 'bridge-core')
                ),
                'should_render' => false
            ),
            'bridgedb472' => array(
                'title' => esc_html__('Makeup Artist', 'bridge-core'),
                'rev-sliders' => array('home11.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'qode-instagram-widget', 'qode-twitter-feed', 'qi-addons-for-elementor'),
                'categories' => array(
                    'elementor'  => esc_html__('Elementor', 'bridge-core'),
                    'business'	 => esc_html__('Business', 'bridge-core')
                ),
                'should_render' => false
            ),
            'bridgedb473' => array(
                'title' => esc_html__('Dentist', 'bridge-core'),
                'rev-sliders' => array('home-01.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'qi-addons-for-elementor'),
                'categories' => array(
                    'elementor'  => esc_html__('Elementor', 'bridge-core'),
                    'business'	 => esc_html__('Business', 'bridge-core')
                ),
                'should_render' => false
            ),
            'bridgedb474' => array(
                'title' => esc_html__('City Listing', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'qode-instagram-widget', 'qode-membership', 'qode-listing', 'woocommerce', 'sellkit', 'wp-job-manager', 'wp-job-manager-locations', 'qi-addons-for-elementor'),
                'categories' => array(
                    'elementor'  => esc_html__('Elementor', 'bridge-core'),
                    'business'	 => esc_html__('Business', 'bridge-core'),
                    'special'	 => esc_html__('Special', 'bridge-core')
                ),
                'should_render' => false
            ),
            'bridgedb475' => array(
                'title' => esc_html__('Vacation Rental', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'qi-addons-for-elementor'),
                'categories' => array(
                    'elementor'  => esc_html__('Elementor', 'bridge-core'),
                    'business'	 => esc_html__('Business', 'bridge-core'),
                    'one-page'	 => esc_html__('One Page', 'bridge-core')
                ),
                'should_render' => false
            ),
            'bridgedb476' => array(
                'title' => esc_html__('Startup', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'qi-addons-for-elementor'),
                'categories' => array(
                    'elementor'  => esc_html__('Elementor', 'bridge-core'),
                    'creative'	 => esc_html__('Creative', 'bridge-core'),
                    'portfolio'	 => esc_html__('Portfolio', 'bridge-core')
                ),
                'should_render' => false
            ),
            'bridgedb477' => array(
                'title' => esc_html__('Life Coach', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7' . 'revslider', 'qode-twitter-feed', 'qi-addons-for-elementor'),
                'categories' => array(
                    'elementor'  => esc_html__('Elementor', 'bridge-core'),
                    'business'	 => esc_html__('Business', 'bridge-core')
                ),
                'should_render' => false
            ),
            'bridgedb478' => array(
                'title' => esc_html__('Environmental Organization', 'bridge-core'),
                'rev-sliders' => array('home.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'qi-addons-for-elementor'),
                'categories' => array(
                    'elementor'  => esc_html__('Elementor', 'bridge-core'),
                    'business'	 => esc_html__('Business', 'bridge-core')
                ),
                'should_render' => false
            ),
            'bridgedb479' => array(
                'title' => esc_html__('Outdoors', 'bridge-core'),
                'rev-sliders' => array('slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'qode-instagram-widget', 'qi-addons-for-elementor'),
                'categories' => array(
                    'elementor'  => esc_html__('Elementor', 'bridge-core'),
                    'creative'	 => esc_html__('Creative', 'bridge-core'),
                    'one-page'	 => esc_html__('One Page', 'bridge-core')
                ),
                'should_render' => false
            ),
            'bridgedb480' => array(
                'title' => esc_html__('Clothing Store', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'woocommerce', 'sellkit', 'qi-addons-for-elementor'),
                'categories' => array(
                    'elementor'  => esc_html__('Elementor', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'shop'		=> esc_html__('Shop', 'bridge-core')
                ),
                'should_render' => false
            ),
            'bridgedb481' => array(
                'title' => esc_html__('Freelancer', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'qi-addons-for-elementor'),
                'categories' => array(
                    'elementor'  => esc_html__('Elementor', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
                ),
                'should_render' => false
            ),
            'bridgedb482' => array(
                'title' => esc_html__('Business', 'bridge-core'),
                'rev-sliders' => array('home.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'qi-addons-for-elementor'),
                'categories' => array(
                    'elementor'  => esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core')
                ),
                'should_render' => false
            ),
            'bridgedb483' => array(
                'title' => esc_html__('One Page', 'bridge-core'),
                'rev-sliders' => array('home.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'qi-addons-for-elementor'),
                'categories' => array(
                    'elementor'  => esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'one-page'	=> esc_html__('One Page', 'bridge-core')
                ),
                'should_render' => false
            ),
            'bridgedb484' => array(
                'title' => esc_html__('Light', 'bridge-core'),
                'rev-sliders' => array('slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'qi-addons-for-elementor'),
                'categories' => array(
                    'elementor'  => esc_html__('Elementor', 'bridge-core'),
                    'business'	 => esc_html__('Business', 'bridge-core')
                ),
                'should_render' => false
            ),
            'bridgedb485' => array(
                'title' => esc_html__('Estate', 'bridge-core'),
                'rev-sliders' => array('home-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'revslider', 'qi-addons-for-elementor'),
                'categories' => array(
                    'elementor'  => esc_html__('Elementor', 'bridge-core'),
                    'business'	 => esc_html__('Business', 'bridge-core')
                ),
                'should_render' => false
            ),
            'bridgedb486' => array(
                'title' => esc_html__('Creative Business', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'qi-addons-for-elementor'),
                'categories' => array(
                    'elementor'  => esc_html__('Elementor', 'bridge-core'),
                    'business'	 => esc_html__('Business', 'bridge-core'),
                    'creative'	 => esc_html__('Creative', 'bridge-core')
                ),
                'should_render' => false
            ),
            'bridgedb490' => array(
                'title' => esc_html__('Outdoor Recreation', 'bridge-core'),
                'rev-sliders' => array(
                    'slider-1.zip'
                ),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'business'   => esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
			'bridgedb491' => array(
                'title' => esc_html__('Nail Bar', 'bridge-core'),
                'rev-sliders' => array(
                    'slider-1.zip'
                ),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'qi-addons-for-elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'business'   => esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
			'bridgelanding' => array(
				'title' => esc_html__('Bridge Landing', 'bridge-core'),
				'rev-sliders' => array('elements-rev-slider.zip', 'equation-slider.zip', 'features.zip', 'features-design.zip', 'features-shop.zip', 'landing-342.zip', 'landing-test-sale.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'woocommerce', 'sellkit', 'LayerSlider', 'qode-instagram-widget', 'qode-twitter-feed', 'yith-woocommerce-wishlist', 'yith-woocommerce-quick-view')
			)
		);

		return $demos;
	}
}
