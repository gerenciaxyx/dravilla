<?php
if(class_exists('BridgeQodeWidget')) {
    class BridgeQodePortfolioList extends BridgeQodeWidget 	{
        protected $params;

        public function __construct() {
            parent::__construct(
                'qode_portfolio_list',
                esc_html__('Qode Portfolio List', 'bridge'),
                array('description' => esc_html__('Display Portfolio List', 'bridge'),)
            );

            $this->setParams();
        }

        protected function setParams() {
            $this->params = array(
                array(
                    'name' => 'type',
                    'type' => 'dropdown',
                    'title' => esc_html__('Type', 'bridge'),
                    'options' => [
                        'standard' => esc_html__( 'Standard', 'bridge' ),
                        'standard_no_space' => esc_html__( 'Standard No Space', 'bridge' ),
                        'masonry_with_space' => esc_html__( 'Masonry(Pinterest) with space', 'bridge' ),
                    ]
                ),
                array(
                    'name' => 'hover_type_standard',
                    'type' => 'dropdown',
                    'title' => esc_html__('Hover Type', 'bridge'),
                    'options' => [
                        'default' => esc_html__( 'Default', 'bridge' ),
                        'subtle_vertical_hover' => esc_html__( 'Subtle Vertical', 'bridge' ),
                        'image_subtle_rotate_zoom_hover' => esc_html__( 'Image Subtle Rotate Zoom', 'bridge' ),
                        'image_text_zoom_hover' => esc_html__( 'Image Subtle Rotate Zoom', 'bridge' ),
                        'thin_plus_only' => esc_html__( 'Thin Plus Only', 'bridge' ),
                        'slow_zoom' => esc_html__( 'Slow Zoom', 'bridge' ),
                        'split_up' => esc_html__( 'Split Up', 'bridge' ),
                    ]
                ),
                array(
                    'name' => 'spacing',
                    'type' => 'textfield',
                    "description" => esc_html__('This option only works with "Masonry(Pinterest) with space" type', 'bridge'),
                    'title' => esc_html__('Spacing', 'bridge')
                ),
                array(
                    'name' => 'box_background_color',
                    'type' => 'colorpicker',
                    'title' => esc_html__('Box Background Color', 'bridge'),
                ),
                array(
                    'name'		=> 'columns',
                    'type'		=> 'dropdown',
                    'title'		=> esc_html__('Columns', 'bridge'),
                    'options'	=> [
                        "1" => "1",
                        "2" => "2",
                        "3" => "3",
                        "4" => "4",
                        "5" => "5",
                        "6" => "6",
                    ]
                ),
                array(
                    'name'		=> 'image_size',
                    'type'		=> 'dropdown',
                    'title'		=> esc_html__('Image Proportions', 'bridge'),
                    'options'	=> [
                        '' => esc_html__( 'Original', 'bridge' ),
                        'square' => esc_html__( 'Square', 'bridge' ),
                        'landscape' => esc_html__( 'Landscape', 'bridge' ),
                        'portrait' => esc_html__( 'Portrait', 'bridge' ),
                    ]
                ),
                array(
                    'name'		=> 'order_by',
                    'type'		=> 'dropdown',
                    'title'		=> esc_html__('Order By', 'bridge'),
                    'options'	=> [
                        '' => '',
                        'menu_order' => esc_html__( 'Menu Order', 'bridge' ),
                        'title' => esc_html__( 'Title', 'bridge' ),
                        'date' => esc_html__( 'Date', 'bridge' )
                    ]
                ),
                array(
                    'name'		=> 'order',
                    'type'		=> 'dropdown',
                    'title'		=> esc_html__('Order', 'bridge'),
                    'options'	=> [
                        '' => '',
                        'ASC' => esc_html__( 'ASC', 'bridge' ),
                        'DESC' => esc_html__( 'DESC', 'bridge' ),
                    ]
                ),
                array(
                    'name'		=> 'number',
                    'type'		=> 'textfield',
                    "description" => esc_html__( "Number of portfolios on page (-1 is all)", 'bridge' ),
                    'title'		=> esc_html__('Numbers', 'bridge')
                ),
                array(
                    'name'		=> 'category',
                    'type'		=> 'textfield',
                    "description" => esc_html__( "Category Slug (leave empty for all)", 'bridge' ),
                    'title'		=> esc_html__('Category', 'bridge')
                ),
                array(
                    'name'		=> 'selected_projects',
                    'type'		=> 'textfield',
                    "description" => esc_html__( "Selected Projects (leave empty for all, delimit by comma)", 'bridge' ),
                    'title'		=> esc_html__( "Selected Projects", 'bridge' ),
                ),
                array(
                    'name'		=> 'title_tag',
                    'type'		=> 'dropdown',
                    'title'		=> esc_html__( "Title Tag", 'bridge' ),
                    'options'   => [
                        "h2" => "h2",
                        "h3" => "h3",
                        "h4" => "h4",
                        "h5" => "h5",
                        "h6" => "h6",
                    ]
                ),
                array(
                    'name'		=> 'show_categories',
                    'type'		=> 'dropdown',
                    'title'		=> esc_html__( "Show Categories", 'bridge' ),
                    'options'   => bridge_qode_get_yes_no_select_array(true, true)
                ),
                array(
                    'name'		=> 'text_align',
                    'type'		=> 'dropdown',
                    'title'		=> esc_html__( "Text align", 'bridge' ),
                    'options'   => [
                        '' => '',
                        'left' => esc_html__( 'Left', 'bridge' ),
                        'center' => esc_html__( 'Center', 'bridge' ),
                        'right' => esc_html__( 'Right', 'bridge' ),
                    ]
                ),
            );
        }

        public function widget($args, $instance) {
            extract($args);

            //prepare variables
            $content = '';
            $params = array();

            //is instance empty?
            if (is_array($instance) && count($instance)) {
                //generate shortcode params
                foreach ($instance as $key => $value) {
                    $params[$key] = $value;
                }
            }

            $params['box_border'] = 'no';
            $params['filter'] = 'no';
            $params['show_load_more'] = 'no';
            $params['show_title'] = 'yes';
            $params['portfolio_loading_type'] = 'portfolio_one_by_one';
            $params['portfolio_loading_type_masonry'] = 'portfolio_one_by_one';

            echo '<div class="widget qode_portfolio_list_widget">';

            echo bridge_qode_execute_shortcode('portfolio_list', $params);

            echo '</div>';

        }
    }
}