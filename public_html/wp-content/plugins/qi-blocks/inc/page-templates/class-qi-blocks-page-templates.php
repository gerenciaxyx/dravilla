<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( ! class_exists( 'Qi_Blocks_Page_Templates' ) ) {
	/**
	 * Rest API class with configuration
	 */
	class Qi_Blocks_Page_Templates {
		private static $instance;

		public function __construct() {
			// Register page template.
			add_filter( 'theme_page_templates', array( $this, 'add_page_template_to_dropdown' ) );

			// Insert FSE custom page template.
			add_action( 'admin_init', array( $this, 'add_full_site_custom_page_template' ) );

			// Include page template.
			add_filter( 'template_include', array( $this, 'include_page_template' ), 30 );

			// Add a filter to the save post to inject out template into the page cache.
			add_filter( 'wp_insert_post_data', array( $this, 'register_project_templates' ) );
		}

		/**
		 * Module class instance
		 *
		 * @return Qi_Blocks_Page_Templates
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function add_page_template_to_dropdown( $templates ) {

			if ( empty( qi_blocks_is_installed( 'full_site_editing' ) ) ) {
				$templates['qi-blocks-full-width.php'] = esc_attr__( 'Qi Blocks Full Width', 'qi-blocks' );
			}

			return $templates;
		}

		public function add_full_site_custom_page_template() {
			$current_theme      = function_exists( 'wp_get_theme' ) ? wp_get_theme() : '';
			$current_theme_slug = ! empty( $current_theme ) ? $current_theme->get_stylesheet() : '';

			if ( ! empty( $current_theme_slug ) && ! empty( qi_blocks_is_installed( 'full_site_editing' ) ) ) {
				$custom_templates_flag    = get_option( 'qi_blocks_custom_templates_flag', array() );
				$is_custom_template_added = false;

				if ( ! is_array( $custom_templates_flag ) ) {
					$custom_templates_flag = array();
				}

				if ( ! empty( $custom_templates_flag ) ) {

					if ( isset( $custom_templates_flag[ $current_theme_slug ] ) ) {
						$is_custom_template_added = (bool) $custom_templates_flag[ $current_theme_slug ];
					}
				}

				if ( empty( $is_custom_template_added ) ) {
					global $wpdb;
					// Check is template already created to prevent double creation.
					$check_database_flag    = false;
					$check_database_flag_id = $wpdb->get_row("SELECT ID FROM {$wpdb->prefix}posts WHERE post_name = 'wp-custom-template-qi-blocks-full-width'");

					if ( is_object( $check_database_flag_id ) && ! is_wp_error( $check_database_flag_id ) ) {
						$check_database_flag_content = get_the_content( null, false, $check_database_flag_id->ID );

						if ( strpos( $check_database_flag_content, $current_theme_slug ) !== false ) {
							$check_database_flag = true;
						}
					}

					$params                   = array();
					$params['post_status']    = 'publish';
					$params['post_type']      = 'wp_template';
					$params['comment_status'] = 'closed';
					$params['post_title']     = esc_attr__( 'Qi Blocks Full Width', 'qi-blocks' );
					$params['post_content']   = '<!-- wp:template-part {"slug":"header","theme":"' . $current_theme_slug . '"} /--><!-- wp:post-content {"layout":{"inherit":true}} /--><!-- wp:template-part {"slug":"footer","theme":"' . $current_theme_slug . '"} /-->';
					$params['post_excerpt']   = esc_attr__( 'Custom full width page template created by Qi Blocks team', 'qi-blocks' );
					$params['post_name']      = 'wp-custom-template-qi-blocks-full-width';

					$wp_theme_term = get_term_by( 'slug', $current_theme_slug, 'wp_theme' );

					if ( ! is_object( $wp_theme_term ) ) {
						wp_create_term( $current_theme_slug, 'wp_theme' );
						$wp_theme_term = get_term_by( 'slug', $current_theme_slug, 'wp_theme' );
					}

					$updated_templates_flag = array_merge( $custom_templates_flag, array( $current_theme_slug => true ) );

					if ( empty( $check_database_flag ) ) {

						if ( is_object( $wp_theme_term ) ) {
							$custom_template_id = wp_insert_post( $params );

							if ( ! is_wp_error( $custom_template_id ) ) {
								wp_set_object_terms( $custom_template_id, $wp_theme_term->term_id, 'wp_theme' );

								update_option( 'qi_blocks_custom_templates_flag', $updated_templates_flag );
							}
						}
					} else {
						update_option( 'qi_blocks_custom_templates_flag', $updated_templates_flag );
					}
				}
			}
		}

		public function include_page_template( $template ) {
			// Get global post.
			global $post;

			// Return template if post is empty.
			if ( ! $post ) {
				return $template;
			}

			// Return default template if we don't have a custom one defined.
			$page_template_meta = get_post_meta( $post->ID, '_wp_page_template', true );

			if ( empty( $page_template_meta ) ) {
				return $template;
			}

			$file = QI_BLOCKS_INC_PATH . '/page-templates/templates/' . $page_template_meta;

			// Just to be safe, we check if the file exist first.
			if ( file_exists( $file ) ) {
				return $file;
			}

			// Return template.
			return $template;
		}

		public function register_project_templates( $atts ) {
			// Create the key used for the themes cache.
			$cache_key = 'page_templates-' . md5( get_theme_root() . '/' . get_stylesheet() );

			// Retrieve the cache list.
			// If it doesn't exist, or it's empty prepare an array.
			$templates = wp_get_theme()->get_page_templates();
			if ( empty( $templates ) ) {
				$templates = array();
			}

			// New cache, therefore remove the old one.
			wp_cache_delete( $cache_key, 'themes' );

			// Add our template to the list of templates.
			$templates = array_merge(
				$templates,
				array(
					'qi-blocks-full-width.php' => esc_attr__( 'Qi Blocks Full Width', 'qi-blocks' ),
				)
			);

			// Add the modified cache to allow WordPress to pick it up for listing available templates.
			wp_cache_add( $cache_key, $templates, 'themes', 1800 );

			return $atts;
		}
	}

	Qi_Blocks_Page_Templates::get_instance();
}
