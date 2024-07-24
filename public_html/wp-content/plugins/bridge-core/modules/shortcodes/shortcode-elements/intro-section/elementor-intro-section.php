<?php

class BridgeCoreElementorIntroSection extends \Elementor\Widget_Base{
	public function get_name() {
		return 'bridge_intro_section';
	}

	public function get_title() {
		return esc_html__('Intro Section', 'bridge-core');
	}

	public function get_icon() {
		return 'bridge-elementor-custom-icon bridge-elementor-intro-section';
	}

	public function get_categories() {
		return [ 'qode' ];
	}

	protected function register_controls(){
		$this->start_controls_section(
			'general',
			[
				'label' => esc_html__( 'General', 'bridge-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'custom_class',
			[
				'label' => esc_html__('Custom Class', 'bridge-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__('Title', 'bridge-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'font_size',
			[
				'label' => esc_html__('Title Font Size (px or em)', 'bridge-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__('Title Color', 'bridge-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
			]
		);

		$this->add_control(
			'subtitle',
			[
				'label' => esc_html__('Tagline', 'bridge-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'tagline_color',
			[
				'label' => esc_html__('Tagline Color', 'bridge-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
			]
		);

		$this->add_control(
			'text',
			[
				'label' => esc_html__('Text', 'bridge-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'text_color',
			[
				'label' => esc_html__('Text Color', 'bridge-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
			]
		);

		$this->add_control(
			'text_aligment',
			[
				'label' => esc_html__('Text Alignment', 'bridge-core'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'left'   => esc_html__( 'Left', 'bridge-core' ),
					'center' => esc_html__( 'Center', 'bridge-core' ),
					'right'  => esc_html__( 'Right', 'bridge-core' )
				],
				'default' => 'center'
			]
		);

		$this->add_control(
			'bg_image',
			[
				'label' => esc_html__('Background Image', 'bridge-core'),
				'type' => \Elementor\Controls_Manager::MEDIA
			]
		);

		$this->end_controls_section();
	}

	protected function render(){
		$params = $this->get_settings_for_display();
		$params['holder_classes']     = $this->get_holder_classes( $params );
		$params['title_styles']       = $this->getTitleStyles( $params );
		$params['text_styles']        = $this->getTextStyles( $params );
		$params['tagline_styles']     = $this->getTaglineStyles( $params );

		if( ! empty( $params['bg_image'] ) ) {
			$params['bg_image'] = $params['bg_image']['id'];
		}

		echo bridge_core_get_shortcode_template_part('templates/intro-section-template', 'intro-section', '', $params);
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

\Elementor\Plugin::instance()->widgets_manager->register( new BridgeCoreElementorIntroSection() );
