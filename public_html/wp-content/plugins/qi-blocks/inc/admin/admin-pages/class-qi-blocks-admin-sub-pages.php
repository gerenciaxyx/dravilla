<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

abstract class Qi_Blocks_Admin_Sub_Pages {
	private $base;
	private $menu_slag;
	private $title;
	private $position;
	private $atts = array();

	public function __construct() {
		$this->add_sub_page();
	}

	abstract public function add_sub_page();

	public function get_base() {
		return $this->base;
	}

	public function set_base( $base ) {
		$this->base = $base;
	}

	public function get_menu_slug() {
		return $this->menu_slag;
	}

	public function set_menu_slug( $menu_slag ) {
		$this->menu_slag = $menu_slag;
	}

	public function get_title() {
		return $this->title;
	}

	public function set_title( $title ) {
		$this->title = $title;
	}

	public function get_position() {
		return $this->position;
	}

	public function set_position( $position ) {
		$this->position = $position;
	}

	public function get_atts() {
		return $this->atts;
	}

	public function set_atts( $atts ) {
		$this->atts = $atts;
	}

	public function render() {
		$args                = $this->get_atts();
		$args['this_object'] = $this;

		qi_blocks_template_part( 'admin/admin-pages', 'templates/holder', '', $args );
	}

	public function get_header() {
		Qi_Blocks_Admin_General_Page::get_instance()->get_header( $this );
	}

	public function get_footer() {
		Qi_Blocks_Admin_General_Page::get_instance()->get_footer();
	}

	public function get_sidebar() {
		Qi_Blocks_Admin_General_Page::get_instance()->get_sidebar();
	}

	public function get_content() {
		qi_blocks_template_part( 'admin/admin-pages/sub-pages/' . $this->get_base(), 'templates/' . $this->get_base(), '', $this->get_atts() );
	}
}
