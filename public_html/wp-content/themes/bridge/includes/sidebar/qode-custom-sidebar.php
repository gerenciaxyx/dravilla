<?php
/**
 * Qode Sidebar
 * Class for adding custom widget area and choose them on single pages/posts/portfolios
 *
 */

if( ! class_exists('BridgeQodeSidebar') ){

	class BridgeQodeSidebar{

		var $sidebars  = array();
		var $stored    = "";

		// load needed stuff on widget page
		function __construct(){
			$this->stored	= 'qode_sidebars';
			$this->title = esc_html__('Custom Widget Area','bridge');

			add_action('load-widgets.php', array(&$this, 'load_assets') , 5 );
			add_action('widgets_init', array(&$this, 'register_custom_sidebars') , 1000 );
			add_action('wp_ajax_qode_ajax_delete_custom_sidebar', array(&$this, 'delete_sidebar_area') , 1000 );

			// Migrate old custom sidebars to new
			add_action( 'after_setup_theme', array( $this, 'migrate_custom_sidebars' ) );
		}

		//load css, js and add hooks to the widget page
		function load_assets(){
			add_action('admin_print_scripts', array(&$this, 'template_add_widget_field') );
			add_action('load-widgets.php', array(&$this, 'add_sidebar_area'), 100);

			wp_enqueue_script('bridge-qode-sidebar', QODE_ROOT . '/js/admin/qode-sidebar.js');
			wp_enqueue_style( 'bridge-qode-sidebar', QODE_ROOT . '/css/admin/qode-sidebar.css');
		}

		//widget form template
		function template_add_widget_field(){
			$nonce =  wp_create_nonce ('qode-delete-sidebar');
			$nonce = '<input type="hidden" name="qode-delete-sidebar" value="'.$nonce.'" />';

			echo "\n<script type='text/html' id='qode-add-widget'>";
			echo "\n  <form class='qode-add-widget wp-block' method='POST' data-type='core/widget-area'>";
			echo "\n  <h3>". $this->title ."</h3>";
			echo "\n    <span class='input_wrap'><input type='text' value='' placeholder = '".esc_html__('Enter Name of the new Widget Area', 'bridge')."' name='qode-add-widget' /></span>";
			echo "\n    <input class='button' type='submit' value='".esc_html__('Add Widget Area', 'bridge')."' />";
			echo "\n    ".$nonce;
			echo "\n  </form>";
			echo "\n</script>\n";
		}

		//add sidebar area to the db
		function add_sidebar_area(){
			if(!empty($_POST['qode-add-widget'])){
				$this->sidebars = get_option($this->stored);
				$name = $this->get_name(sanitize_text_field($_POST['qode-add-widget']));

				if(empty($this->sidebars)){
					$this->sidebars = array($name);
				}
				else{
					$this->sidebars = array_merge($this->sidebars, array($name));
				}

				update_option($this->stored, $this->sidebars);
				wp_redirect( admin_url('widgets.php') );
				die();
			}
		}

		//delete sidebar area from the db
		function delete_sidebar_area(){
			check_ajax_referer('qode-delete-sidebar');

			if(!empty($_POST['name'])){
				$name = stripslashes($_POST['name']);
				$this->sidebars = get_option($this->stored);

				if(($key = array_search($name, $this->sidebars)) !== false){
					unset($this->sidebars[$key]);
					update_option($this->stored, $this->sidebars);
					echo "sidebar-deleted";
				}
			}

			die();
		}


		//checks the user submitted name and makes sure that there are no colitions
		function get_name($name){
			if(empty($GLOBALS['wp_registered_sidebars'])) return $name;

			$taken = array();
			foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ){
				$taken[] = $sidebar['name'];
			}

			if(empty($this->sidebars)) $this->sidebars = array();
			$taken = array_merge($taken, $this->sidebars);

			if(in_array($name, $taken)){
				$counter  = substr($name, -1);
				$new_name = "";

				if(!is_numeric($counter)){
					$new_name = $name . " 1";
				}
				else{
					$new_name = substr($name, 0, -1) . ((int) $counter + 1);
				}

				$name = $this->get_name($new_name);
			}

			return $name;
		}



		//register custom sidebar areas
		function register_custom_sidebars(){

			if(empty($this->sidebars)) $this->sidebars = get_option($this->stored);

			$args = array(
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h5>',
				'after_title'   => '</h5>'
			);

			$args = apply_filters('bridge_qode_filter_custom_widget_args', $args);

			if(is_array($this->sidebars)){
				foreach ($this->sidebars as $sidebar){
					$args['name']  = $sidebar;
					$args['id']    = sanitize_text_field( $sidebar );
					$args['class'] = 'qode-custom';
					register_sidebar($args);
				}
			}
		}

		function migrate_custom_sidebars() {
			$migration_done = get_option( 'qode_custom_sidebars_migrated' );

			if( ! $migration_done ) {
				$custom_sidebars = get_option( 'qode_sidebars' );
				$sidebar_widgets = get_option( 'sidebars_widgets' );

				if( is_array( $custom_sidebars ) && count( $custom_sidebars ) > 0 ) {
					foreach ( $custom_sidebars as $custom_sidebar ) {
						$old_key = 'qode-custom-sidebar-' . $custom_sidebar;;
						$key = $custom_sidebar;

						if ( array_key_exists( $old_key, $sidebar_widgets ) ) {
							$sidebar_widgets[ $key ] = $sidebar_widgets[ $old_key ];
							unset( $sidebar_widgets[ $old_key ] );
						}
					}
				}

				if( update_option( 'sidebars_widgets', $sidebar_widgets ) ) {
					$migration_done = true;
					update_option( 'qode_custom_sidebars_migrated', $migration_done );
				}
			}
		}

	}
}

?>
