<?php
if ( ! function_exists( 'add_action' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}

class BridgeCoreImport {
	/**
	 * @var instance of current class
	 */
	private static $instance;

	/**
	 * Name of folder where revolution slider will stored
	 * @var string
	 */
	private $revSliderFolder;
	private $layerSliderFolder;
	/**
	 *
	 * URL where are import files
	 * @var string
	 */
	private $importURI;

	/**
	 * @return BridgeCoreImport
	 */
    public static function get_instance() {
        if ( ! isset( self::$instance ) && ! ( self::$instance instanceof self ) ) {
            self::$instance = new self();
        }

        return self::$instance;
    }

	public $message = array();
	public $data    = array();
	public $status;
	public $attachments = false;
	public $imported_posts = array();

	function __construct() {
		$this->revSliderFolder		= 'qodef-rev-sliders';
		$this->layerSliderFolder	= 'qodef-layer-sliders';

		add_action('admin_init', array(&$this, 'set_import_url'));
		add_action('wp_ajax_import_action', array(&$this, 'import_action'));
		add_action('wp_ajax_populate_single_pages', array(&$this, 'populate_single_pages'));
		add_action('wp_ajax_demo_import_popup', array(&$this, 'demo_import_popup'));
		add_action('wp_ajax_plugins_to_install', array(&$this, 'plugins_to_install'));
		add_action('wp_ajax_install_plugin_per_demo', array(&$this, 'install_plugin_per_demo'));

	}

	public  function set_status($status){
			$this->status = $status;
	}

	public  function get_status(){
		return $this->status;
	}

	public  function set_message($message){
		$this->message = $message;
	}

	public  function get_message(){
		return $this->message;
	}

	public  function set_data($key, $value){
		$this->data[$key] = $value;
	}

	public  function get_data(){
		return $this->data;
	}

	public function set_import_url() {
		$params = BridgeCoreDashboard::get_instance()->get_import_params();

		if(is_array($params) && isset($params['url'])) {
			$this->importURI = 'http://export.qodethemes.com/';
		}
	}

	public function import_action() {

			if (isset($_POST) || !empty($_POST) || isset($_POST['options']['demo'])) {

				if ( wp_verify_nonce( $_POST['options']['nonce'], 'qodef_cd_import_nonce' ) ) {
					$demo = trailingslashit($_POST['options']['demo']);

					switch ($_POST['options']['action']):
						case 'widgets':
							$this->import_widgets($demo);
							break;
						case 'options':
							$this->import_options($demo);
							break;
						case 'settings-page':
							$this->import_settings_pages($demo);
							break;
						case 'menu-settings':
							$this->import_menu_settings($demo);
							break;
						case 'rev-slider':

							$demos = bridge_core_demos_list();
							$demo_folder = str_replace('/', '', $demo);
							$rev_sliders = $demos[$demo_folder]['rev-sliders'];

							if (bridge_core_is_installed('revolution-slider') && !empty($rev_sliders)) {
								$this->rev_slider_import($demo);
							} else {
								$this->set_status('success');
								$this->set_data('type', 'options');
								$this->set_message(esc_html__('Revolution Slider isn\'t installed', 'bridge-core'));
							}
							break;
						case 'layer-slider':

							$demos = bridge_core_demos_list();
							$demo_folder = str_replace('/', '', $demo);
							$layer_sliders = $demos[$demo_folder]['layer-sliders']['sliders'];

							if (bridge_core_is_installed('layer-slider') && !empty($layer_sliders)) {
								$this->layer_slider_import($demo);
							} else {
								$this->set_status('success');
								$this->set_data('type', 'options');
								$this->set_message(esc_html__('Layer Slider isn\'t installed', 'bridge-core'));
							}
							break;
						case 'content':
							
							if($xml = 'bridge_content_01.xml'){
								if (!BridgeCoreDashboard::get_instance()->check_purchase_code($_POST['options']['demo'])) {
									bridge_core_ajax_status('error', esc_html__('Please don\'t try to hack me. Purchase code registered is not valid', 'bridge-core'));
									exit;
								}
							}
							
							$xml = isset($_POST['options']['xml']) ? $_POST['options']['xml'] : '';
							$attachments = (isset($_POST['options']['images']) && $_POST['options']['images'] == 1) ? true : false;
							$post_id = isset($_POST['options']['post_id']) ? $_POST['options']['post_id'] : '';
							$this->import_content($demo, $xml, $attachments, $post_id);
							break;
					endswitch;

			}



			bridge_core_ajax_status($this->get_status(), $this->get_message(), $this->get_data());
		}
		wp_die();
	}

	public function unserialized_content( $file ) {

		$file_content = $this->file_content( $file );

		if ( $file_content ) {
			$unserialized_content = unserialize( base64_decode( $file_content ) );

			return $unserialized_content;
		}

		return false;
	}

	function file_content( $path ) {
		$url      = $this->importURI . $path;
		$response = wp_remote_get( $url );

		if ( is_wp_error( $response ) ) {
			$this->message[] = $response->get_error_message() . ' ' . $path;
			return false;
		}

		$response_key = wp_remote_retrieve_response_code( $response );
		if ( 200 !== intval( $response_key ) ) {
			$this->set_message($response["response"]['message'] . ' ' . esc_html__('Please contact support', 'bridge-core'));
			$this->set_status('error');
			return false;
		}

		$body  = wp_remote_retrieve_body( $response );


		return $body;
	}

	public function import_widgets($demo) {
		$widgets         = $demo . 'widgets.txt';
		$custom_sidebars = $demo . 'custom_sidebars.txt';

		$cs_result = $this->import_custom_sidebars( $custom_sidebars );

		$widgets_content = $this->unserialized_content($widgets);

		if($widgets_content) {
			foreach ((array)$widgets_content['widgets'] as $bridge_widget_id => $bridge_widget_data) {
				update_option('widget_' . $bridge_widget_id, $bridge_widget_data);
			}
			$ws = $this->import_sidebars_widgets($widgets);
			if($ws) {
				$this->set_message(esc_html__('Widgets are set for proper sidebar', 'bridge-core'));
				$this->set_data('type', 'options');
				$this->set_status('success');
			}
		}
	}

	public function import_sidebars_widgets( $file ) {
		$bridge_sidebars = get_option( "sidebars_widgets" );
		unset( $bridge_sidebars['array_version'] );
		$data = $this->unserialized_content( $file );

		if ( $data && is_array( $data['sidebars'] ) ) {
			$bridge_sidebars = array_merge( (array) $bridge_sidebars, (array) $data['sidebars'] );
			unset( $bridge_sidebars['wp_inactive_widgets'] );
			$bridge_sidebars                  = array_merge( array( 'wp_inactive_widgets' => array() ), $bridge_sidebars );
			$bridge_sidebars['array_version'] = 2;
			wp_set_sidebars_widgets( $bridge_sidebars );
			return true;
		} else {
			return false;
		}
	}

	public function import_custom_sidebars( $file ) {
		$options = $this->unserialized_content( $file );

		if($options) {
			$results = update_option('qode_sidebars', $options);

			if ($results) {
				return $results;
			} else {
				return false;
			}
		}
	}

	public function import_options( $file ) {

		$options_file = $file . 'options.txt';

		$options       = $this->unserialized_content( $options_file );
		$current_options = get_option(BRIDGE_CORE_OPTIONS_NAME);
		if($options){
			if($current_options != $options) {
				$result = update_option(BRIDGE_CORE_OPTIONS_NAME, $options);
				if ($result) {
					$this->update_options_after_import($file);
					$this->set_status('success');
					$this->set_data('type', 'options');
					$this->set_message(esc_html__('Options imported successfully', 'bridge-core'));
					$this->update_options_after_import($file);
				} else {
					$this->set_status('error');
					$this->set_message(esc_html__('Problem occurred during options import', 'bridge-core'));
				}
			} else {
				$this->set_status('success');
				$this->set_data('type', 'options');
				$this->set_message(esc_html__('Options are already imported', 'bridge-core'));
			}
		}
	}

	public function import_elementor_options( $file ) {

		$options_file = $file . 'elementor_options.txt';
		$options       = $this->unserialized_content( $options_file );

		if(is_array($options) && count($options) > 0){
			update_option('_elementor_general_settings', $options);
			foreach ($options as $options_key => $option){
				update_option('elementor_' . $options_key, $option);
			}

			return array(
				'status' => 'imported'
			);
		} else {
			return array(
				'status' => 'empty'
			);
		}
	}

	public function import_qi_blocks_options( $file ) {
		$options_file = $file . 'qi_blocks_options.txt';
		$options       = $this->unserialized_content( $options_file );

		if(is_array($options) && count($options) > 0){
			$new_ids       = get_transient( '_bridge_core_imported_posts' );
			$options_posts = ! empty( $options['posts'] ) ? $options['posts'] : '';

			//First update array indices ( if imported post ids are different from exported ones )
			if ( ! empty( $options_posts ) && is_array( $new_ids ) && count( $new_ids ) > 0 ) {
				foreach ( $new_ids as $old_post_id => $new_post_id ) {
					if ( $old_post_id !== $new_post_id ) {
						$options_posts = $this->change_array_indices( $options_posts, $old_post_id, $new_post_id );
					}
				}
			}

			//Then update options entries
			update_option('qi_blocks_global_styles', $options);

			return array(
				'status' => 'imported'
			);
		} else {
			return array(
				'status' => 'empty'
			);
		}
	}

	function change_array_indices( $array, $old_key, $new_key ) {
		if ( ! array_key_exists( $old_key, $array ) ) {
			return $array;
		}

		$keys = array_keys( $array );
		$keys[ array_search( $old_key, $keys ) ] = $new_key;

		return array_combine( $keys, $array );
	}

    public function import_settings_pages( $file ) {

        $settings_file = $file . 'settingpages.txt';

        $fields = array(
            'show_on_front'		=> get_option( 'show_on_front' ),
            'page_on_front'		=> get_option( 'page_on_front' ),
            'page_for_posts'	=> get_option( 'page_for_posts' )
        );

        $pages = $this->unserialized_content( $settings_file );

        $new_ids = get_transient( '_bridge_core_imported_posts' );
        $fields_status = true;

        if($pages) {
            if( $pages['show_on_front'] != $fields['show_on_front']) {
                $fields_status = update_option('show_on_front', $pages['show_on_front']);
            }
            if(is_array($new_ids) && count($new_ids) > 0) {
                if ($pages['page_on_front'] != 0 && ($new_ids[$pages['page_on_front']] != $fields['page_on_front'])) {
                    $fields_status = update_option('page_on_front', $new_ids[$pages['page_on_front']]);
                }
                if ($pages['page_for_posts'] != 0 && ($new_ids[$pages['page_for_posts']] != $fields['page_for_posts'])) {
                    $fields_status = update_option('page_for_posts', $new_ids[$pages['page_for_posts']]);
                }
            } else {
                if ($pages['page_on_front'] != 0 && ($pages['page_on_front'] != $fields['page_on_front'])) {
                    $fields_status = update_option('page_on_front', $pages['page_on_front']);
                }
                if ($pages['page_for_posts'] != 0 && ($pages['page_for_posts'] != $fields['page_for_posts'])) {
                    $fields_status = update_option('page_for_posts', $pages['page_for_posts']);
                }
            }

            if (!$fields_status) {
                $this->set_status('error');
                $this->set_message(esc_html__('Problem occurred during settings pages import', 'wilmer-core'));
            } else {
                $this->set_status('success');
                $this->set_data('type', 'options');
                $this->set_message(esc_html__('Settings pages imported successfully', 'wilmer-core'));
            }
        } else {
            $this->set_status('error');
            $this->set_message(esc_html__('File doesn\'t exist', 'wilmer-core'));
        }
    }

	public function import_menu_settings( $file ) {
		global $wpdb;

		$menus_file = $file . 'menus.txt';

		$menus_data = $this->unserialized_content( $menus_file );

		if($menus_data !== false) {
			$menu_array = array();
			$terms_table = $wpdb->prefix . "terms";

			foreach ($menus_data as $registered_menu => $menu_slug) {
				$term_rows = $wpdb->get_results($wpdb->prepare("SELECT * FROM {$terms_table} where slug=%s", $menu_slug), ARRAY_A);

				if (isset($term_rows[0]['term_id'])) {
					$term_id_by_slug = $term_rows[0]['term_id'];
				} else {
					$term_id_by_slug = null;
				}

				$menu_array[$registered_menu] = $term_id_by_slug;
			}

			set_theme_mod('nav_menu_locations', array_map('absint', $menu_array));

			$this->set_status('success');
			$this->set_data('type', 'options');
			$this->set_message( esc_html__( 'Menus set for proper locations', 'bridge-core' ) );
		} else {
			$this->set_status('error');
			$this->set_message( esc_html__( 'Problem during menus location set', 'bridge-core' ) );
		}
	}


	public function import_content( $file, $xml, $attachments, $post_id) {
		ob_start();
		require_once( BRIDGE_CORE_MODULES_PATH . '/core-dashboard/sub-pages/import/wordpress-importer.php' );



		if(bridge_core_is_installed('woocommerce')) {
			add_filter('wp_import_posts', array($this, 'proccess_wc_attributes'));
		}


		if(!empty($post_id)){

			add_filter('wp_import_posts', function ($posts) use ($post_id) {

				$single_page = array();
				foreach ($posts as $post) {
					if($post['post_type'] == 'page' && $post['post_id'] == $post_id){
						$single_page[] = $post;
						break;
					}
				}

				return $single_page;
			}, 10, 2);


		}

		$bridge_import = new WP_Import();
		set_time_limit( 0 );

		$bridge_import->fetch_attachments = $attachments;
		$returned_value                  = $bridge_import->import( $file . $xml );


		if ( is_wp_error( $returned_value ) ) {
			$this->set_status('error');
			$this->set_data('type', 'content');
			$this->set_data('xml', $xml);
			$this->set_message( esc_html__( 'An error occurred during content import', 'bridge-core' ) );
		} else {
			$this->set_status('success');
			$this->set_data('type', 'content');
			$this->set_data('posts', $this->imported_posts);
			$this->set_message( esc_html__( 'File imported successfully', 'bridge-core' ) . ' ' . $xml );

		}

		if($xml == 'bridge_content_10.xml') {
			$this->update_meta_fields_after_import($file);

			if( bridge_core_is_installed( 'qi-blocks' ) ) {
				$status = $this->import_qi_blocks_options($file);
				if(is_array($status) && isset($status['status']) && $status['status']) {
					/*** Hook if user has installed Qi Blocks but import WP Bakery or Elementor demo ***/
					$this->set_status('success');
					$this->set_message(esc_html__('File imported successfully', 'bridge-core') . ' ' . $xml);
				}
			}

			if(bridge_core_is_installed('elementor')) {
				$status = $this->import_elementor_options($file);
				if(is_array($status) && isset($status['status']) && $status['status']) {
					/*** Hook if user has installed Elementor but import WP Bakery ***/
					$this->set_status('success');
					$this->set_message(esc_html__('File imported successfully', 'bridge-core') . ' ' . $xml);
				}
			}
		}
		ob_get_clean();

	}

	public function create_rev_slider_files( $folder ) {


		$demos = bridge_core_demos_list();
		$demo_folder = str_replace('/', '', $folder);
		$rev_list = $demos[$demo_folder]['rev-sliders'];
		$dir_name = $this->revSliderFolder;

		$upload     = wp_upload_dir();
		$upload_dir = $upload['basedir'];
		$upload_dir = $upload_dir . '/' . $dir_name;
		if ( ! is_dir( $upload_dir ) ) {
			mkdir( $upload_dir, 0700 );
		}
		mkdir( $upload_dir . '/' . $folder, 0700 );
		foreach ( $rev_list as $rev_slider ) {

			$file_data = file_get_contents( $this->importURI . $folder . '/revslider/' . $rev_slider );

			if($file_data) {
				file_put_contents(
					WP_CONTENT_DIR . '/uploads/' . $dir_name . '/' . $folder . '/' . $rev_slider,
					$file_data);
			} else {
				return false;
			}
		}

		return true;
	}

	public function rev_slider_import( $folder ) {
		$files_created = $this->create_rev_slider_files( $folder );

		if($files_created) {
			$demos = bridge_core_demos_list();
			$demo_folder = str_replace('/', '', $folder);
			$rev_sliders = $demos[$demo_folder]['rev-sliders'];
			
			
			$dir_name = $this->revSliderFolder;
			$absolute_path = __FILE__;
			$path_to_file = explode('wp-content', $absolute_path);
			$path_to_wp = $path_to_file[0];

			require_once($path_to_wp . '/wp-load.php');
			require_once($path_to_wp . '/wp-includes/functions.php');
			require_once($path_to_wp . '/wp-admin/includes/file.php');


			$rev_slider_instance = new RevSlider();

			foreach ($rev_sliders as $rev_slider) {
				$nf = WP_CONTENT_DIR . '/uploads/' . $dir_name . '/' . $folder . $rev_slider;
				$rev_results = $rev_slider_instance->importSliderFromPost(true, true, $nf);

				if (!$rev_results['success']) {
					$this->set_status('error');
					$this->set_message(esc_html__('Error while importing rev sliders', 'bridge-core'));
					exit;
				}
			}
			$this->set_status('success');
			$this->set_data('type', 'options');
			$this->set_message(esc_html__('Rev sliders imported successfully', 'bridge-core'));
		}else {
			$this->set_status('error');
			$this->set_data('type', 'options');
			$this->set_message(esc_html__('Files don\'t exist', 'bridge-core'));
		}
	}

	public function create_layer_slider_files($folder) {
		$demos = bridge_core_demos_list();
		$demo_folder = str_replace('/', '', $folder);
		$layer_list = $demos[$demo_folder]['layer-sliders']['sliders'];
		$dir_name = $this->layerSliderFolder;
	
		$upload = wp_upload_dir();
		$upload_dir = $upload['basedir'];
		$upload_dir = $upload_dir . '/' . $dir_name;
		if (!is_dir($upload_dir)) {
			mkdir($upload_dir, 0700);
		}

		mkdir($upload_dir . '/' . $folder, 0700);

		foreach ($layer_list as $layer_slider) {
			$file_data = file_get_contents($this->importURI . '/' . $folder . '/layerslider/' . $layer_slider);

			if($file_data) {
				file_put_contents(
					WP_CONTENT_DIR . '/uploads/' . $dir_name . '/' . $folder . '/' . $layer_slider,
					$file_data);
			} else {
				return false;
			}
			
		}
	}

	public function layer_slider_import($folder) {
		$this->create_layer_slider_files($folder);

		$demos = bridge_core_demos_list();
		$demo_folder = str_replace('/', '', $folder);
		$layer_sliders = $demos[$demo_folder]['layer-sliders']['sliders'];

		if(is_array($layer_sliders) && count($layer_sliders) > 0){

			$dir_name = $this->layerSliderFolder;

			include LS_ROOT_PATH . '/classes/class.ls.importutil.php';

			foreach ($layer_sliders as $layer_slider) {
				$nf = WP_CONTENT_DIR . '/uploads/' . $dir_name . '/' . $folder . '/' . $layer_slider;
				$import = new LS_ImportUtil($nf);
			}
			$this->set_status('success');
			$this->set_data('type', 'options');
			$this->set_message(esc_html__('Layer sliders imported successfully', 'bridge-core'));

			$this->update_layer_slider_fields_after_import($folder);
		}
	}

	function update_meta_fields_after_import( $folder ) {
		global $wpdb;

		$url       = esc_url( home_url( '/' ) );
		$demo_urls = $this->import_get_demo_urls( $folder );

		foreach ( $demo_urls as $demo_url ) {
			if ($demo_url !== '') {
				$sql_query = "SELECT meta_id, meta_value FROM {$wpdb->postmeta} WHERE meta_value LIKE '" . esc_url($demo_url) . "%';";
				$meta_values = $wpdb->get_results($sql_query);

				if (!empty($meta_values)) {
					foreach ($meta_values as $meta_value) {
						$new_value = $this->recalc_serialized_lengths(str_replace($demo_url, $url, $meta_value->meta_value));

						$wpdb->update($wpdb->postmeta, array('meta_value' => $new_value), array('meta_id' => $meta_value->meta_id));
					}
				}

				if (bridge_core_is_installed('elementor')) {
					\Elementor\Utils::replace_urls($demo_url, $url);
				}
			}
		}
	}

	function update_layer_slider_fields_after_import( $folder ) {
		global $wpdb;

		if(bridge_core_is_installed('layer-slider')) {

			$demos = bridge_core_demos_list();
			$demo_folder = str_replace('/', '', $folder);
			$layer_list     = $demos[$demo_folder]['layer-sliders']['sliders'];
			$layer_pairs    = $demos[$demo_folder]['layer-sliders']['pairs'];
			$slider_in_content = $demos[$demo_folder]['layer-sliders']['slider_in_content'];

			if(is_array($layer_pairs) && is_array($layer_list) && count($layer_list) > 0 && count($layer_pairs) > 0) {

				foreach ($layer_pairs as $layer_pair => $value){
					$slider_meta_values = $wpdb->get_results("SELECT * FROM $wpdb->postmeta WHERE meta_key = 'qode_revolution-slider' AND meta_value = '[layerslider id=\"". $layer_pair ."\"]'");

					foreach($slider_meta_values as $slider_meta_value) {

						$new_value = $this->recalc_serialized_lengths(str_replace($layer_pair, $value, $slider_meta_value->meta_value));

						$wpdb->update(
							$wpdb->postmeta,
							array(
								'meta_value' => $new_value,
							),
							array('meta_id' => $slider_meta_value->meta_id)
						);

					}

					if($slider_in_content){
						$slider_content_values = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_content LIKE '%[layerslider_vc id=\"". $layer_pair ."\"]%'");

						foreach($slider_content_values as $slider_content_value) {

							$search_value = '[layerslider_vc id="' . $layer_pair .'"]';
							$replace_value = '[layerslider_vc id="' . $value .'"]';

							$new_value = str_replace($search_value, $replace_value, $slider_content_value->post_content);

							$wpdb->update(
								$wpdb->posts,
								array(
									'post_content' => $new_value,
								),
								array('ID' => $slider_content_value->ID)
							);

						}

					}

				}
			}
		}

	}

	function update_options_after_import( $folder ) {
		$url       = esc_url( home_url( '/' ) );
		$demo_urls = $this->import_get_demo_urls( $folder );

		foreach ( $demo_urls as $demo_url ) {
			$global_options    = get_option( BRIDGE_CORE_OPTIONS_NAME );
			$results = array_filter($global_options, function($value) use(&$demo_url) {
				if( is_string( $value ) ) {
					return strpos( $value, $demo_url ) !== false;
				} else{
					return false;
				}
			});

			foreach ( $results as $key => $value ){
				if( is_string( $value ) ){
					$results[$key] = str_replace( $demo_url, $url, $value );
				}
			}

			$new_global_values = array();

			if( is_array( $results ) && count( $results ) ){
				$new_global_values = array_replace ( $global_options , $results );
			} else{
				$new_global_values = $global_options;
			}

			update_option( BRIDGE_CORE_OPTIONS_NAME, $new_global_values );
		}
	}

	function import_get_demo_urls( $folder ) {
		$demo_urls  = array();

		if(strpos($folder, 'db')){

			//remove db from folder
			$folder_new = str_replace('db','',$folder);
			$folder_new = str_replace('/','',$folder_new);
			$demo_urls[] = 'http://' . $folder_new . '.qodeinteractive.com/';
			$demo_urls[] = 'https://' . $folder_new . '.qodeinteractive.com/';
		} else {
			$folder_new = str_replace('/','',$folder);
			$demo_urls[] = 'http://demo.qodeinteractive.com/' . $folder_new . '/';
			$demo_urls[] = 'https://demo.qodeinteractive.com/' . $folder_new . '/';
		}

		return $demo_urls;
	}

	function recalc_serialized_lengths( $sObject ) {
		$ret = preg_replace_callback( '!s:(\d+):"(.*?)";!', array( $this, 'recalc_serialized_lengths_callback' ), $sObject );

		return $ret;
	}

	function recalc_serialized_lengths_callback( $matches ) {
		return "s:" . strlen( $matches[2] ) . ":\"$matches[2]\";";
	}

	function replace_image_with_placeholder( $post ) {
		if ( isset( $post['post_type'] ) && 'attachment' == $post['post_type'] ) {
			$post['attachment_url'] = $post['guid'] = $this->get_noimage_url( $post['attachment_url'] );
		}

		return $post;
	}

	function get_noimage_url( $origin_img_url ) {
		switch ( pathinfo( $origin_img_url, PATHINFO_EXTENSION ) ) {
			case 'jpg':
			case 'jpeg':
				$ext = 'jpg';
				break;
			case 'png':
				$ext = 'png';
				break;
			case 'gif':
			default:
				$ext = 'gif';
				break;
		}
		$noimage_fname = 'noimage.' . $ext;

		return MASTERDS_CORE_ASSETS_URL_PATH . '/img/' . $noimage_fname;
	}

	function proccess_wc_attributes( $posts ) {

			foreach ($posts as $post) {
				if ('product' === $post['post_type'] && !empty($post['terms'])) {
					foreach ($post['terms'] as $term) {
						if (strstr($term['domain'], 'pa_')) {
							if (!taxonomy_exists($term['domain'])) {
								$attribute_name = wc_attribute_taxonomy_slug($term['domain']);

								// Create the taxonomy.
								if (!in_array($attribute_name, wc_get_attribute_taxonomies(), true)) {
									wc_create_attribute(
										array(
											'name' => $attribute_name,
											'slug' => $attribute_name,
											'type' => 'select',
											'order_by' => 'menu_order',
											'has_archives' => false,
										)
									);
								}

								// Register the taxonomy now so that the import works!
								register_taxonomy(
									$term['domain'],
									apply_filters('woocommerce_taxonomy_objects_' . $term['domain'], array('product')),
									apply_filters(
										'woocommerce_taxonomy_args_' . $term['domain'],
										array(
											'hierarchical' => true,
											'show_ui' => false,
											'query_var' => true,
											'rewrite' => false,
										)
									)
								);
							}
						}
					}
				}
			}
			return $posts;
	}

	public function populate_single_pages() {

		if ( isset( $_POST ) && !empty( $_POST ) && !empty($_POST['options']['demo']) ) {
			if ( wp_verify_nonce( $_POST['options']['nonce'], 'qodef_cd_import_nonce' ) ) {
				$demo = trailingslashit($_POST['options']['demo']);
				$pages_file = $demo . 'pages.txt';
				$pages = $this->unserialized_content( $pages_file );

				$html = bridge_core_get_module_template_part('sub-pages/import/templates/pages-list', 'core-dashboard', '', array('pages' => $pages));

				if($pages){
					bridge_core_ajax_status( 'success', '', $html);
				} else {
					bridge_core_ajax_status( 'error', esc_html__( 'Pages don\'t exist', 'bridge-core' ), '');
				}
			}
		}

		wp_die();
	}


	public function is_ready_to_import() {
		$info = BridgeCoreSystemInfoPage::get_instance()->get_system_info();
		if($info['php_memory_limit']['pass'] && $info['php_post_max_size']['pass'] && $info['php_time_limit']['pass'] && $info['php_max_input_vars']['pass'] && $info['max_upload_size']['pass']){
			return true;
		}

		return false;
	}

	function demo_import_popup(){
		$demo_id = $_POST['demoId'];
		$original_demo_id = $_POST['originalDemoId'];
		$params = array(
			'demo_id' => $demo_id,
			'original_demo_id' => $original_demo_id,
		);

		$html = '';

		if( ! empty( $demo_id ) ){

			$html .= bridge_core_get_module_template_part('sub-pages/import/templates/import-item', 'core-dashboard', '', $params);
		}

		echo $html;

		die();
	}


	function plugins_to_install(){
		global $default_plugins_array_to_install;
		$response = array();

		$additional_plugins_to_install = $_POST['reqiredPlugins'];
		update_option("qode_required_plugins", array_unique(array_merge($additional_plugins_to_install,$default_plugins_array_to_install)));

		$response['link'] = $_POST['link'];
		echo json_encode($response);

		die();
	}

	function required_plugins_per_demo($demo){

		//if theme is installed
		if( bridge_core_is_installed('theme') ) {
			$plugins = array();
			$html = '';


			$demos = bridge_core_demos_list();
			$plugins = bridge_qode_plugins_list($demos[$demo]['required-plugins']);

			$tgmpa = $GLOBALS['tgmpa'];

			if (!empty($plugins)) {
				$required_demo_plugins = array();

				$html .= "<p class='qode-demo-plugins-install-main-title'>" . esc_html__('Following plugins should be installed and activated before demo import:', 'bridge-core') . "</p>";
				foreach ($plugins as $key => $value) {

					$tgmpa->register(array('slug' => $key, 'name' => $value));

					$is_plugin_active = $tgmpa->is_plugin_active($key);
					$is_plugin_installed = $tgmpa->is_plugin_installed($key);

					if (!$is_plugin_active) {
						if($is_plugin_installed) {
							$status = "<a class='qodef-install-plugin-link' href='#' data-plugin-action='activate' data-plugin-slug='". $key ."'>" . esc_html__('Activate', 'bridge-core') . "</a>";
						} else {
							$status = "<a class='qodef-install-plugin-link' href='#' data-plugin-action='install' data-plugin-slug='". $key ."'>" . esc_html__('Install', 'bridge-core') . "</a>";
						}

					} else {
						$status = "<span class='qode-demo-plugin-installed'>" . esc_html__('Activated', 'bridge-core') . "</span>";
					}

					$html .= "<p>" . $value . " - " . $status . "<span class='spinner'></span></p>";

					array_push($required_demo_plugins, $key);
				}
				$html .= "<span style='visibility:hidden;' data-required-demo-plugins='" . json_encode($required_demo_plugins) . "' class='qode-required-demo-plugins-list'></span>";
			}

			return $html;
		}

	}
	function install_plugin_per_demo(){

		global $default_plugins_array_to_install;

//		$additional_plugins_to_install = $_POST['requiredPlugins'];
//		update_option("qode_required_plugins", array_unique(array_merge($additional_plugins_to_install,$default_plugins_array_to_install)));

		if(isset($_POST)){

			$download_url = '';
			$plugins		= bridge_qode_plugins_list();
			$install_action	= $_POST['pluginAction'];
			$plugin_slug	= $_POST['pluginSlug'];
			$tgmpa			= $GLOBALS['tgmpa'];

			foreach ($plugins as $key => $plugin) {

				if($plugin_slug == $plugin['slug']){

					$source = empty( $plugin['source'] ) ? 'repo' : $plugin['source'];

					if ( 'repo' === $source || preg_match( $tgmpa::WP_REPO_REGEX, $source ) ) {
						$source_type = 'repo';
					} elseif ( preg_match( $tgmpa::IS_URL_REGEX, $source ) ) {
						$source_type =  'external';
					} else {
						$source_type =  'bundled';
					}

					switch ( $source_type ) {
						case 'repo':
							$download_url = $this->get_api_plugin_download_url( $plugin_slug );
							break;
						case 'external':
							$download_url = $plugin['source'];
							break;
						case 'bundled':
							$download_url = $plugin['source'];
							break;
					}
					break;
				}
			}

			if($install_action === 'install'){
				ob_start();
				include_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
				wp_cache_flush();

				$skin     = new WP_Ajax_Upgrader_Skin();
				$upgrader = new Plugin_Upgrader( $skin );
				$install_result = $upgrader->install( $download_url );

				if( ! is_wp_error( $install_result ) &&  $install_result){
					bridge_qode_ajax_status('success', esc_html__('Activate', 'bridge-core'), array());
				}

			} else {

				$html = "<span class='qode-demo-plugin-installed'>" . esc_html__('Activated', 'bridge-core') . "</span>";


				if ( ! function_exists( 'get_plugins' ) ) {
					require_once ABSPATH . 'wp-admin/includes/plugin.php';
				}

				$plugins =  get_plugins();
				$plugins_keys = array_keys( $plugins );

				foreach ( $plugins_keys as $key ) {
					if ( preg_match( '|^' . $plugin_slug . '/|', $key ) ) {
						$plugin_path =  $key;
					}
				}

				$activate = activate_plugin( $plugin_path, '', false, true );

				if($activate == null){
					bridge_qode_ajax_status('success', esc_html__('Activated', 'bridge-core'), array('html'=> $html));
				}

			}
			wp_die();

		}

	}
	function get_api_plugin_download_url( $slug ) {

		$download_url  = '';

		if ( ! function_exists( 'plugins_api' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
		}

		$api = plugins_api( 'plugin_information', array( 'slug' => $slug ) );

		if ( false !== $api && isset( $api->download_link ) ) {
			$download_url = $api->download_link;
		}

		return $download_url;
	}

}
BridgeCoreImport::get_instance();
