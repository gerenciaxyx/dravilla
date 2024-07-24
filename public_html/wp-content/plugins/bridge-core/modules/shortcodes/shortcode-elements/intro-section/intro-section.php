<?php
namespace Bridge\Shortcodes\IntroSection;

use Bridge\Shortcodes\Lib\ShortcodeInterface;

class IntroSection implements ShortcodeInterface {

	private $base;

	function __construct() {
		$this->base = 'qode_intro_section';
		add_action('bridge_qode_action_vc_map', array($this, 'vcMap'));
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		vc_map(array(
				'name' => esc_html__('Intro Section', 'bridge-core'),
				'base' => $this->base,
				'icon' => 'icon-wpb-intro-section extended-custom-icon-qode',
				'category' => esc_html__('by QODE', 'bridge-core'),
				'params' => array(
					array(
						'type'	=> 'textfield',
						'heading'	=> esc_html__('Custom Class', 'bridge-core'),
						'param_name'	=> 'custom_class'
					),
					array(
						'type'	=> 'textfield',
						'heading'	=> esc_html__('Title', 'bridge-core'),
						'param_name'	=> 'title'
					),
					array(
						'type'	=> 'textfield',
						'heading'	=> esc_html__('Title Font Size (px or em)', 'bridge-core'),
						'param_name'	=> 'font_size'
					),
					array(
						'type'	=> 'colorpicker',
						'heading'	=> esc_html__('Title Color', 'bridge-core'),
						'param_name'	=> 'title_color'
					),

					array(
						'type'	=> 'textfield',
						'heading'	=> esc_html__('Tagline', 'bridge-core'),
						'param_name'	=> 'subtitle'
					),
					array(
						'type'	=> 'colorpicker',
						'heading'	=> esc_html__('Tagline Color', 'bridge-core'),
						'param_name'	=> 'tagline_color'
					),
					array(
						'type'	=> 'textfield',
						'heading'	=> esc_html__('Text', 'bridge-core'),
						'param_name'	=> 'text'
					),
					array(
						'type'	=> 'colorpicker',
						'heading'	=> esc_html__('Text Color', 'bridge-core'),
						'param_name'	=> 'text_color'
					),
					array(
						'type'	=> 'dropdown',
						'heading'	=> esc_html__('Text Alignment', 'bridge-core'),
						'param_name'	=> 'text_aligment',
						'value' => array(
							esc_html__( 'Left', 'bridge-core' ) => 'left',
							esc_html__( 'Center', 'bridge-core' ) => 'center',
							esc_html__( 'Right', 'bridge-core' ) => 'right',
						)
					),
					array(
						'type'	=> 'attach_image',
						'heading'	=> esc_html__('Background Image', 'bridge-core'),
						'param_name'	=> 'bg_image'
					)
				)
			)
		);
	}

	public function render($atts, $content = null) {

		$args = array(
			'custom_class'	=> '',
			'title'	=> '',
			'font_size'	=> '',
			'title_color' => '',
			'subtitle' => '',
			'tagline_color'	=> '',
			'text' => '',
			'text_color' => '',
			'text_aligment' => 'center',
			'bg_image' => ''
		);

		$params = shortcode_atts($args, $atts);

		$params['holder_classes']     = $this->get_holder_classes( $params );
		$params['title_styles']       = $this->getTitleStyles( $params );
		$params['text_styles']        = $this->getTextStyles( $params );
		$params['tagline_styles']     = $this->getTaglineStyles( $params );

		extract($params);

		$html = bridge_core_get_shortcode_template_part('templates/intro-section-template', 'intro-section', '', $params);

		return $html;
	}

	private function get_holder_classes( $atts ) {
		$holder_classes[] = 'qode-intro-section';
		$holder_classes[] = ! empty( $atts['text_aligment'] ) ? 'qode-alignment--' . $atts['text_aligment'] : '';

		return implode( ' ', $holder_classes );
	}

	private function getTitleStyles($atts) {
		$title_styles = array();

		if ( ! empty ( $atts['font_size'] ) ) {
			$title_styles[] = 'font-size:' . $atts['font_size'];
		}

		if ( ! empty ( $atts['title_color'] ) ) {
			$title_styles[] = 'color:' . $atts['title_color'];
		}

		return $title_styles;
	}

	private function get_title_data_attrs( $atts ) {
		$data = array();

		if ( ! empty( $atts['title_color'] ) ) {
			$data['data-color'] = $atts['title_color'];
		} else {
			$data['data-color'] = '#fff';
		}

		if ( ! empty( $atts['title_color_after_scroll'] ) ) {
			$data['data-color-after-scroll'] = $atts['title_color_after_scroll'];
		} else {
			$data['data-color-after-scroll'] = '#504e4e';
		}

		return $data;
	}

	private function getTextStyles($atts) {
		$styles = array();

		if (!empty($atts['text_color'])) {
			$styles[] = 'color: ' . $atts['text_color'];
		}

		return $styles;
	}

	private function get_text_data_attrs( $atts ) {
		$data = array();

		if ( ! empty( $atts['text_color'] ) ) {
			$data['data-color'] = $atts['text_color'];
		} else {
			$data['data-color'] = '#fff';
		}

		if ( ! empty( $atts['text_color_after_scroll'] ) ) {
			$data['data-color-after-scroll'] = $atts['text_color_after_scroll'];
		} else {
			$data['data-color-after-scroll'] = '#717171';
		}

		return $data;
	}

	private function getTaglineStyles($atts) {
		$styles = array();

		if (!empty($atts['tagline_color'])) {
			$styles[] = 'color: ' . $atts['tagline_color'];
		}

		return $styles;
	}

	private function get_tagline_data_attrs( $atts ) {
		$data = array();

		if ( ! empty( $atts['tagline_color'] ) ) {
			$data['data-color'] = $atts['text_color'];
		} else {
			$data['data-color'] = '#fff';
		}

		if ( ! empty( $atts['tagline_color_after_scroll'] ) ) {
			$data['data-color-after-scroll'] = $atts['tagline_color_after_scroll'];
		} else {
			$data['data-color-after-scroll'] = '#717171';
		}

		return $data;
	}
}
