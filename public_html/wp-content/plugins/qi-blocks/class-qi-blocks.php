<?php
/*
Plugin Name: Qi Blocks
Description: A collection of blocks for the Gutenberg block editor, developed by Qode Interactive.
Author: Qode Interactive
Author URI: https://qodeinteractive.com/
Plugin URI: https://qodeinteractive.com/qi-blocks-for-gutenberg/
Version: 1.3.1
Requires at least: 5.8
Requires PHP: 7.2
Text Domain: qi-blocks
*/

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( ! class_exists( 'Qi_Blocks' ) ) {
	class Qi_Blocks {
		private static $instance;

		public function __construct() {
			// Set the main plugins constants.
			define( 'QI_BLOCKS_PLUGIN_BASE_FILE', plugin_basename( __FILE__ ) );
			define( 'QI_BLOCKS_PLUGIN_LANGUAGES_PATH', plugin_dir_path( __FILE__ ) . '/languages/' );

			// Include required files.
			require_once __DIR__ . '/constants.php';

			// Check if Gutenberg editor exists.
			if ( class_exists( 'WP_Block_Type' ) ) {
				require_once QI_BLOCKS_ABS_PATH . '/helpers/helper.php';

				// Make plugin available for translation.
				add_action( 'plugins_loaded', array( $this, 'load_plugin_text_domain' ) );

				// Add plugin's body classes.
				add_filter( 'body_class', array( $this, 'add_body_classes' ) );

				// Allow SVG MIME Type in Media Upload.
				add_filter( 'upload_mimes', array( $this, 'allow_svg_media_files' ) );
				add_filter( 'wp_handle_upload_prefilter', array( $this, 'handle_svg_wp_media_upload' ) );
				add_filter( 'wp_check_filetype_and_ext', array( $this, 'check_svg_upload' ), 10, 4 );

				// Enqueue plugin's assets.
				add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) );
				add_action( 'wp_enqueue_scripts', array( $this, 'localize_js_scripts' ) );

				// Register plugin's editor assets.
				add_action( 'init', array( $this, 'register_editor_assets' ) );

				// Enqueue plugin's editor assets.
				add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_editor_assets' ) );
				add_action( 'enqueue_block_editor_assets', array( $this, 'localize_editor_js_scripts' ) );

				// Set plugin's blocks style dependency.
				add_filter( 'qi_blocks_filter_block_style_dependency', array( $this, 'set_block_style_dependency' ) );

				// Include plugin's modules.
				$this->include_modules();
			}
		}

		/**
		 * Instance of module class
		 *
		 * @return Qi_Blocks
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function load_plugin_text_domain() {
			// Make plugin available for translation.
			load_plugin_textdomain( 'qi-blocks', false, QI_BLOCKS_REL_PATH . '/languages' );
		}

		public function add_body_classes( $classes ) {
			$classes[] = 'qi-blocks-' . QI_BLOCKS_VERSION;

			if ( wp_is_mobile() ) {
				$classes[] = 'qodef-gutenberg--touch';
			} else {
				$classes[] = 'qodef-gutenberg--no-touch';
			}

			return $classes;
		}

		public function allow_svg_media_files( $mimes ) {
			$mimes['svg']  = 'image/svg+xml';
			$mimes['svgz'] = 'image/svg+xml';

			return $mimes;
		}

		/*
		 * @param array $file {
			 *     Reference to a single element from `$_FILES`.
			 *
			 *     @type string $name     The original name of the file on the client machine.
			 *     @type string $type     The mime type of the file, if the browser provided this information.
			 *     @type string $tmp_name The temporary filename of the file in which the uploaded file was stored on the server.
			 *     @type int    $size     The size, in bytes, of the uploaded file.
			 *     @type int    $error    The error code associated with this file upload.
			 * }
		 */
		public function handle_svg_wp_media_upload( $file ) {

			if ( ! empty( $file ) && isset( $file['type'] ) && 'image/svg+xml' === $file['type'] ) {
				// Load the svg file.
				$get_svg_content = @file_get_contents( $file['tmp_name'] );

				if ( ! empty( $get_svg_content ) ) {

					if ( class_exists( 'enshrined\svgSanitize\Sanitizer' ) ) {
						// Create a new sanitizer instance.
						$sanitizer = new enshrined\svgSanitize\Sanitizer();

						// Pass it to the sanitizer and get it back clean.
						$clean_svg_content = $sanitizer->sanitize( $get_svg_content );

						if ( empty( $clean_svg_content ) ) {
							$clean_svg_content = '';
						}

						// Update clean SVG/XML data.
						@file_put_contents( $file['tmp_name'], $clean_svg_content );
					}
				} else {
					$file['error'] = esc_html__( 'Please upload a valid SVG file.', 'qi-blocks' );
				}
			}

			return $file;
		}

		public function check_svg_upload( $checked, $file, $filename, $mimes ) {

			if ( ! $checked['type'] ) {

				$check_filetype  = wp_check_filetype( $filename, $mimes );
				$ext             = $check_filetype['ext'];
				$type            = $check_filetype['type'];
				$proper_filename = $filename;

				if ( $type && 0 === strpos( $type, 'image/' ) && 'svg' !== $ext ) {
					$ext  = false;
					$type = false;
				}

				$checked = compact( 'ext', 'type', 'proper_filename' );
			}

			return $checked;
		}

		public function enqueue_assets() {

			// Enqueue plugin's 3rd party scripts.
			$this->enqueue_3rd_party_assets();

			// Enqueue CSS grid styles.
			wp_enqueue_style( 'qi-blocks-grid', QI_BLOCKS_ASSETS_URL_PATH . '/dist/grid.css', array(), QI_BLOCKS_VERSION );

			// Enqueue CSS styles.
			wp_enqueue_style( 'qi-blocks-main', QI_BLOCKS_ASSETS_URL_PATH . '/dist/main.css', array(), QI_BLOCKS_VERSION );

			// Enqueue JS scripts.
			wp_enqueue_script( 'qi-blocks-main', QI_BLOCKS_ASSETS_URL_PATH . '/dist/main.js', array( 'jquery' ), QI_BLOCKS_VERSION, true );
		}

		public function register_editor_assets() {

			// Enqueue plugin's 3rd party scripts.
			$this->enqueue_3rd_party_assets();

			// Register CSS grid styles.
			wp_register_style( 'qi-blocks-grid-editor', QI_BLOCKS_ASSETS_URL_PATH . '/dist/grid-editor.css', array( 'qi-blocks-main' ), QI_BLOCKS_VERSION );

			// Register CSS styles.
			wp_register_style( 'qi-blocks-main', QI_BLOCKS_ASSETS_URL_PATH . '/dist/main.css', array(), QI_BLOCKS_VERSION );
			wp_register_style( 'qi-blocks-main-editor', QI_BLOCKS_ASSETS_URL_PATH . '/dist/main-editor.css', array( 'qi-blocks-main' ), QI_BLOCKS_VERSION );
		}

		public function enqueue_editor_assets() {

			// Enqueue CSS grid styles.
			wp_enqueue_style( 'qi-blocks-grid-editor' );

			// Enqueue CSS styles.
			wp_enqueue_style( 'qi-blocks-main' );
			wp_enqueue_style( 'qi-blocks-main-editor' );

			// Enqueue JS scripts.
			$script_dependency = apply_filters(
				'qi_blocks_filter_main_editor_dependencies',
				array(
					'wp-blocks',
					'wp-element',
					'wp-block-editor',
					'wp-plugins',
					'wp-i18n',
					'wp-api-fetch',
					'wp-api',
					'wp-data',
					'wp-html-entities',
					'wp-date',
					'wp-autop',
				)
			);

			wp_enqueue_script( 'qi-blocks-main-editor', QI_BLOCKS_ASSETS_URL_PATH . '/dist/main-editor.js', $script_dependency, QI_BLOCKS_VERSION, true );

			// Enqueue localization data for our blocks.
			if ( function_exists( 'wp_set_script_translations' ) ) {
				wp_set_script_translations( 'qi-blocks-main-editor', 'qi-blocks' );
			}
		}

		public function enqueue_3rd_party_assets() {

			// Hook to include additional 3rd party scripts.
			do_action( 'qi_blocks_action_additional_3rd_party_scripts' );

			// Register and enqueue animate styles.
			wp_register_style( 'animate', QI_BLOCKS_ASSETS_URL_PATH . '/css/plugins/animate/animate.min.css', array(), '4.1.1' );
			wp_enqueue_style( 'animate' );

			// Register lightbox scripts.
			wp_register_script( 'fslightbox', QI_BLOCKS_ASSETS_URL_PATH . '/js/plugins/fslightbox/fslightbox.min.js', array( 'jquery' ), '3.4.1', true );
		}

		public function set_block_style_dependency( $style_dependency ) {
			$style_dependency[] = 'animate';
			$style_dependency[] = 'qi-blocks-main';

			if ( is_admin() ) {
				$style_dependency[] = 'qi-blocks-main-editor';
				$style_dependency[] = 'qi-blocks-grid-editor';
			}

			return $style_dependency;
		}

		public function localize_js_scripts() {
			$global = apply_filters(
				'qi_blocks_filter_localize_main_js',
				array(
					'arrowLeftIcon'  => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 34.2 32.3" xml:space="preserve" style="stroke-width: 2;"><line x1="0.5" y1="16" x2="33.5" y2="16"/><line x1="0.3" y1="16.5" x2="16.2" y2="0.7"/><line x1="0" y1="15.4" x2="16.2" y2="31.6"/></svg>',
					'arrowRightIcon' => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 34.2 32.3" xml:space="preserve" style="stroke-width: 2;"><line x1="0" y1="16" x2="33" y2="16"/><line x1="17.3" y1="0.7" x2="33.2" y2="16.5"/><line x1="17.3" y1="31.6" x2="33.5" y2="15.4"/></svg>',
					'closeIcon'      => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 9.1 9.1" xml:space="preserve"><g><path d="M8.5,0L9,0.6L5.1,4.5L9,8.5L8.5,9L4.5,5.1L0.6,9L0,8.5L4,4.5L0,0.6L0.6,0L4.5,4L8.5,0z"/></g></svg>',
				)
			);

			wp_localize_script(
				'qi-blocks-main',
				'qiBlocks',
				array(
					'vars' => $global,
				)
			);
		}

		public function localize_editor_js_scripts() {
			$global = apply_filters(
				'qi_blocks_filter_localize_main_editor_js',
				array(
					'siteURL'                 => esc_url( get_home_url( '/' ) ),
					'dateFormat'              => esc_attr( get_option( 'date_format' ) ),
					'defaultTitleLabel'       => esc_html__( 'Example Title Text', 'qi-blocks' ),
					'defaultSubtitleLabel'    => esc_html__( 'Example Subtitle Text', 'qi-blocks' ),
					'defaultContentLabel'     => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent et eros eu felis.', 'qi-blocks' ),
					'defaultContentLong'      => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris tempus nisl vitae magna pulvinar laoreet. Nullam erat ipsum, mattis nec mollis ac, accumsan a enim. Nunc at euismod arcu. Aliquam ullamcorper eros justo, vel mollis neque facilisis vel. Proin augue tortor, condimentum id sapien a, tempus venenatis massa. Aliquam egestas eget diam sed sagittis. Vivamus consectetur purus vel felis molestie sollicitudin. Vivamus sit amet enim nisl. Cras vitae varius metus, a hendrerit ex. Sed in mi dolor. Proin pretium nibh non volutpat efficitur.', 'qi-blocks' ),
					'defaultImage'            => esc_url( QI_BLOCKS_ASSETS_URL_PATH . '/img/placeholder.png' ),
					'defaultThumbnail'        => esc_url( QI_BLOCKS_ASSETS_URL_PATH . '/img/placeholder-150x150.png' ),
					'defaultImagePlaceholder' => esc_html__( 'Placeholder Image', 'qi-blocks' ),
					'defaultFontSize'         => 16,
					'defaultLineHeight'       => 26,
					'defaultIcon'             => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="15" x="0px" y="0px" viewBox="0 0 16.2 15.2" xml:space="preserve"><g><g><path d="M16.1,5.8l-5,3.5l1.9,5.7l-4.9-3.6l-4.9,3.6l1.9-5.7l-5-3.5h6.1l1.9-5.7L10,5.8H16.1z"/></g></g></svg>',
					'quoteIcon'               => '<svg class="qodef-e-quote-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 190.5 148" xml:space="preserve"><g><path d="M37.7,146.3L2.1,124.6C19.3,100,28.2,74.1,28.8,46.7V2.3H90v38.8c0,19.3-5,38.8-15.1,58.4C64.9,119,52.5,134.6,37.7,146.3z M133.7,146.3l-35.6-21.7c17.2-24.5,26.2-50.5,26.8-77.9V2.3h61.2v38.8c0,19.3-5,38.8-15.1,58.4C160.9,119,148.5,134.6,133.7,146.3z"/></g></svg>',
					'arrowLeftIcon'           => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 34.2 32.3" xml:space="preserve" style="stroke-width: 2;"><line x1="0.5" y1="16" x2="33.5" y2="16"/><line x1="0.3" y1="16.5" x2="16.2" y2="0.7"/><line x1="0" y1="15.4" x2="16.2" y2="31.6"/></svg>',
					'arrowRightIcon'          => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 34.2 32.3" xml:space="preserve" style="stroke-width: 2;"><line x1="0" y1="16" x2="33" y2="16"/><line x1="17.3" y1="0.7" x2="33.2" y2="16.5"/><line x1="17.3" y1="31.6" x2="33.5" y2="15.4"/></svg>',
					'closeIcon'               => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 9.1 9.1" xml:space="preserve"><g><path d="M8.5,0L9,0.6L5.1,4.5L9,8.5L8.5,9L4.5,5.1L0.6,9L0,8.5L4,4.5L0,0.6L0.6,0L4.5,4L8.5,0z"/></g></svg>',
					'searchIcon'              => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="18.7px" height="19px" viewBox="0 0 18.7 19" xml:space="preserve"><g><path d="M11.1,15.2c-4.2,0-7.6-3.4-7.6-7.6S6.9,0,11.1,0s7.6,3.4,7.6,7.6S15.3,15.2,11.1,15.2z M11.1,1.4c-3.4,0-6.2,2.8-6.2,6.2s2.8,6.2,6.2,6.2s6.2-2.8,6.2-6.2S14.5,1.4,11.1,1.4z"/></g><g><rect x="-0.7" y="14.8" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -9.9871 6.9931)" width="8.3" height="1.4"/></g></svg>',
					'menuIcon'                => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="13" x="0px" y="0px" viewBox="0 0 21.3 13.7" xml:space="preserve" aria-hidden="true"><rect x="10.1" y="-9.1" transform="matrix(-1.836970e-16 1 -1 -1.836970e-16 11.5 -9.75)" width="1" height="20"/><rect x="10.1" y="-3.1" transform="matrix(-1.836970e-16 1 -1 -1.836970e-16 17.5 -3.75)" width="1" height="20"/><rect x="10.1" y="2.9" transform="matrix(-1.836970e-16 1 -1 -1.836970e-16 23.5 2.25)" width="1" height="20"/></svg>',
					'categoryIcon'            => '<svg class="qodef-e-info-item-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 16.1 14.9" xml:space="preserve"><path d="M14.6,0.3c0.3,0,0.6,0.1,0.9,0.3s0.4,0.5,0.4,0.9v10.6c0,0.3-0.1,0.6-0.4,0.9s-0.5,0.4-0.9,0.4H9.3c-0.6,0-0.9,0.2-0.9,0.7v0.5H8H7.8v-0.5c0-0.5-0.3-0.7-0.9-0.7H1.5c-0.3,0-0.6-0.1-0.9-0.4c-0.2-0.2-0.4-0.5-0.4-0.9V1.5c0-0.3,0.1-0.6,0.4-0.9c0.2-0.2,0.5-0.3,0.9-0.3h5.6c0.4,0,0.7,0.1,1,0.4c0.2-0.3,0.6-0.4,1-0.4H14.6z M7.8,13.2V1.7c0-0.2-0.1-0.4-0.3-0.5C7.3,1,7,0.9,6.8,0.9H1.5c-0.4,0-0.6,0.2-0.6,0.6v10.6c0,0.2,0.1,0.3,0.2,0.5s0.3,0.2,0.4,0.2h5.3C7.3,12.8,7.6,12.9,7.8,13.2zM15.2,12.1V1.5c0-0.4-0.2-0.6-0.6-0.6h-1.2v4.9l-1.8-1.2L9.8,5.7V0.9H9.3C9,0.9,8.8,1,8.6,1.2C8.4,1.3,8.3,1.5,8.3,1.7v11.5c0.1-0.3,0.4-0.4,0.9-0.4h5.3c0.2,0,0.3-0.1,0.4-0.2S15.2,12.3,15.2,12.1z M10.4,0.9v3.7l0.9-0.5l0.3-0.2l0.3,0.2l0.9,0.5V0.9H10.4z"/></svg>',
					'authorIcon'              => '<svg class="qodef-e-info-item-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 15.9 15.9" xml:space="preserve"><path d="M2.5,2.5C4,1,5.8,0.2,7.9,0.2c2.1,0,3.9,0.8,5.5,2.3c1.5,1.5,2.3,3.3,2.3,5.5c0,2.1-0.8,3.9-2.3,5.5c-1.5,1.5-3.3,2.3-5.5,2.3c-2.1,0-3.9-0.8-5.5-2.3C1,11.9,0.2,10,0.2,7.9C0.2,5.8,1,4,2.5,2.5z M12.9,2.9c-1.4-1.4-3.1-2.1-5-2.1c-2,0-3.6,0.7-5,2.1C1.5,4.3,0.9,6,0.9,7.9c0,1.7,0.6,3.2,1.7,4.5c1-0.4,2.1-0.8,3.3-1.2c0.1,0,0.1-0.2,0.1-0.4c0-0.4,0-0.7-0.1-0.9C5.7,9.7,5.6,9.3,5.5,8.8C5.3,8.5,5.1,8.1,5,7.6c-0.1-0.4-0.1-0.7,0-1V6.5c0.1-0.2,0-0.7-0.1-1.4C4.8,4.5,5,3.8,5.5,3.2c0.5-0.6,1.2-1,2.2-1h0.7c1,0,1.7,0.4,2.2,1c0.5,0.6,0.7,1.3,0.6,1.9c-0.1,0.7-0.2,1.2-0.1,1.4c0,0,0,0,0,0.1c0.1,0.2,0.1,0.6,0,1c-0.1,0.5-0.3,0.9-0.5,1.2c-0.1,0.5-0.2,0.9-0.3,1.2c-0.1,0.3-0.2,0.6-0.2,0.9c0,0.2,0,0.4,0.1,0.4c1.2,0.4,2.4,0.8,3.5,1.2c1.1-1.3,1.7-2.8,1.7-4.5C15,6,14.3,4.3,12.9,2.9z"/></svg>',
					'dateIcon'                => '<svg class="qodef-e-info-item-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 14.6 14.6" xml:space="preserve"><path d="M10.9,1.3V0.2h-0.6v1.2H4.3V0.2H3.7v1.2H0.2v13.1h14.3V1.3H10.9z M10.9,1.9v1.2h-0.6V1.9H10.9z M4.3,1.9v1.2H3.7V1.9H4.3z M13.8,13.8H0.8V4.9h13.1V13.8z"/></svg>',
				)
			);

			wp_localize_script(
				'qi-blocks-main-editor',
				'qiBlocksEditor',
				array(
					'vars' => $global,
				)
			);
		}

		public function include_modules() {
			// Hook to include additional element before modules inclusion.
			do_action( 'qi_blocks_action_before_include_modules' );

			foreach ( glob( QI_BLOCKS_INC_PATH . '/*/include.php' ) as $module ) {
				include_once $module;
			}

			// Hook to include additional element after modules inclusion.
			do_action( 'qi_blocks_action_after_include_modules' );
		}
	}

	Qi_Blocks::get_instance();
}

if ( ! function_exists( 'qi_blocks_activation_trigger' ) ) {
	/**
	 * Function that trigger hooks on plugin activation
	 */
	function qi_blocks_activation_trigger() {
		set_transient( QI_BLOCKS_ACTIVATED_TRANSIENT, 1 );

		// Hook to add additional code on plugin activation.
		do_action( 'qi_blocks_action_on_activation' );
	}

	register_activation_hook( __FILE__, 'qi_blocks_activation_trigger' );
}

if ( ! function_exists( 'qi_blocks_deactivation_trigger' ) ) {
	/**
	 * Function that trigger hooks on plugin deactivation
	 */
	function qi_blocks_deactivation_trigger() {

		// Hook to add additional code on plugin deactivation.
		do_action( 'qi_blocks_action_on_deactivation' );
	}

	register_deactivation_hook( __FILE__, 'qi_blocks_deactivation_trigger' );
}
