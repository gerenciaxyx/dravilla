<?php

namespace Sellkit\Global_Checkout;

defined( 'ABSPATH' ) || exit;

use Elementor\Plugin as Elementor;
use Sellkit\Funnel\Steps\Checkout as CheckoutStep;

/**
 * Checkout.
 *
 * @SuppressWarnings(PHPMD.NPathComplexity)
 * @SuppressWarnings(PHPMD.CyclomaticComplexity)
 * @SuppressWarnings(PHPMD.UnusedPrivateMethod)
 * @since 1.7.4
 */
class Checkout {
	const SELLKIT_GLOBAL_CHECKOUT_OPTION                 = 'sellkit_global_checkout_id';
	const SELLKIT_GLOBAL_CHECKOUT_HEADER_FOOTER_TEMPLATE = 'sellkit_global_checkout_header_footer_templates';

	/**
	 * Construct.
	 *
	 * @since 1.7.4
	 */
	public function __construct() {
		add_action( 'wp', [ $this, 'init_sellkit_global_checkout' ] );
		add_action( 'wp_ajax_handle_sellkit_global_checkout_ajax_requests', [ $this, 'handle_ajax_requests' ] );
	}

	/**
	 * Init sellkit global checkout.
	 *
	 * @since 1.7.4
	 */
	public function init_sellkit_global_checkout() {
		$global_checkout_id = get_option( self::SELLKIT_GLOBAL_CHECKOUT_OPTION, 0 );

		if (
			0 === $global_checkout_id ||
			'publish' !== get_post_status( (int) $global_checkout_id ) ||
			! is_checkout() ||
			! defined( 'ELEMENTOR_VERSION' )
		) {
			return;
		}

		$steps             = get_post_meta( $global_checkout_id, 'nodes', true );
		$checkout_id       = 0;
		$bump_data         = [];
		$optimization_data = '';
		$funnel_id         = 0;

		if ( ! is_array( $steps ) ) {
			return;
		}

		foreach ( $steps as $step ) {
			$step['type'] = (array) $step['type'];

			if ( 'checkout' === $step['type']['key'] ) {
				$checkout_id       = $step['page_id'];
				$bump_data         = ! empty( $step['bump'] ) ? $step['bump'] : [];
				$optimization_data = ! empty( $step['data']['optimization'] ) ? $step['data']['optimization'] : '';
				$funnel_id         = isset( $step['funnel_id'] ) ? $step['funnel_id'] : 0;
			}
		}

		$checkout_steps = get_post_meta( $checkout_id, 'step_data', true );

		if ( empty( $funnel_id ) && ! empty( $checkout_steps ) ) {
			$funnel_id = isset( $checkout_steps['funnel_id'] ) ? $checkout_steps['funnel_id'] : 0;
		}

		if ( 0 === $checkout_id ) {
			return;
		}

		// Remove previous content.
		remove_all_filters( 'the_content' );

		// Set the page content.
		add_filter( 'the_content', function() use ( $checkout_id ) {
			ob_Start();
			echo Elementor::instance()->frontend->get_builder_content_for_display( (int) $checkout_id, true );
			return ob_get_clean();
		}, 5 );

		// Set sellkit canvas templates as the page template.
		add_action( 'template_redirect', function() {
			sellkit()->load_files( [
				'templates/canvas'
			] );

			exit;
		} );

		add_filter( 'sellkit_global_checkout_activated', function() {
			return true;
		} );

		add_action( 'sellkit_checkout_required_hidden_fields', function() use ( $checkout_id ) {
			?>
				<input type="hidden" name="sellkit_current_page_id" value="<?php echo esc_attr( $checkout_id ); ?>" >
				<input type="hidden" name="sellkit_global_checkout_id" value="<?php echo esc_attr( $checkout_id ); ?>" >
			<?php
		} );

		if ( ! empty( $bump_data ) ) {
			$bump_data = $this->get_valid_bumps( $bump_data );

			set_query_var( 'bump_data', $bump_data );
		}

		if ( ! empty( $optimization_data ) && CheckoutStep::apply_coupon_validation( $optimization_data ) ) {
			foreach ( $optimization_data['auto_apply_coupons'] as $auto_apply_coupon ) {
				wc()->cart->add_discount( get_the_title( $auto_apply_coupon['value'] ) );
			}

			wc_clear_notices();
		}

		$header_footer_templates = get_post_meta( intval( $funnel_id ), self::SELLKIT_GLOBAL_CHECKOUT_HEADER_FOOTER_TEMPLATE, true );

		if ( empty( $header_footer_templates ) || ! is_array( $header_footer_templates ) ) {
			$header_footer_templates = maybe_unserialize( $header_footer_templates );
		}

		if ( empty( $header_footer_templates ) || ! is_array( $header_footer_templates ) ) {
			$header_footer_templates = [];
		}

		add_filter( 'sellkit_global_checkout_header_applied_id', function( $default ) use ( $header_footer_templates ) {
			if (
				array_key_exists( 'header', $header_footer_templates ) &&
				array_key_exists( 'value', $header_footer_templates['header'] )
			) {
				return $header_footer_templates['header']['value'];
			}

			return $default;
		} );

		add_filter( 'sellkit_global_checkout_footer_applied_id', function( $default ) use ( $header_footer_templates ) {
			if (
				array_key_exists( 'footer', $header_footer_templates ) &&
				array_key_exists( 'value', $header_footer_templates['footer'] )
			) {
				return $header_footer_templates['footer']['value'];
			}

			return $default;
		} );
	}

	/**
	 * Handle ajax requests.
	 *
	 * @since 1.8.9
	 */
	public function handle_ajax_requests() {
		check_ajax_referer( 'sellkit', 'nonce' );

		if ( ! current_user_can( 'manage_options' ) ) {
			wp_send_json_error( 'You do not have access to this section.', 'sellkit' );
		}

		$action = filter_var( $_REQUEST['sub_action'], FILTER_SANITIZE_FULL_SPECIAL_CHARS ); // phpcs:ignore

		call_user_func( [ $this, $action ] );
	}

	/**
	 * Get header & footer design templates for Global checkout.
	 *
	 * @since 1.8.9
	 */
	private function get_design_templates() {
		$type   = filter_input( INPUT_GET, 'template_type', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$search = filter_input( INPUT_GET, 'input_value', FILTER_SANITIZE_FULL_SPECIAL_CHARS );

		$args = [
			'post_type'      => 'elementor_library',
			'post_status'    => [ 'private', 'publish' ],
			's'              => $search,
			'posts_per_page' => -1,
			'meta_query'     => [ //phpcs:ignore
				[
					'key'   => '_elementor_template_type',
					'value' => $type,
				],
			],
		];

		$posts = new \WP_Query( $args );

		$values = [
			[
				'label' => esc_html__( 'Default', 'sellkit' ),
				'value' => 'default',
			]
		];

		if ( $posts->post_count > 0 ) {
			foreach ( $posts->posts as $post ) {
				$values[] = [
					'label' => $post->post_title,
					'value' => $post->ID,
				];
			}

			wp_send_json_success( $values );
		}

		wp_send_json_success( $values );
	}

	/**
	 * Save selected header/footer template id ofr the global checkout.
	 *
	 * @since 1.8.9
	 */
	private function save_selected_template_id() {
		$funnel_id     = filter_input( INPUT_POST, 'funnel', FILTER_SANITIZE_NUMBER_INT );
		$template_id   = filter_input( INPUT_POST, 'template_id', FILTER_DEFAULT, FILTER_FORCE_ARRAY );
		$template_type = filter_input( INPUT_POST, 'template', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$data          = get_post_meta( $funnel_id, self::SELLKIT_GLOBAL_CHECKOUT_HEADER_FOOTER_TEMPLATE, true );

		if ( empty( $data ) || ! is_array( $data ) ) {
			$data = [];
		}

		if ( isset( $data[ $template_type ] ) ) {
			unset( $data[ $template_type ] );
		}

		$data[ $template_type ] = [
			'label' => ( empty( $template_id['label'] ) ) ? esc_html__( 'Search...', 'sellkit' ) : $template_id['label'],
			'value' => ( empty( $template_id['value'] ) ) ? 0 : $template_id['value'],
		];

		update_post_meta( $funnel_id, self::SELLKIT_GLOBAL_CHECKOUT_HEADER_FOOTER_TEMPLATE, $data );

		wp_send_json_success( $data );
	}

	/**
	 * Get selected header/footer id.
	 *
	 * @since 1.8.9
	 */
	private function get_selected_template_id() {
		$funnel_id = filter_input( INPUT_POST, 'funnel', FILTER_SANITIZE_NUMBER_INT );
		$data      = get_post_meta( $funnel_id, self::SELLKIT_GLOBAL_CHECKOUT_HEADER_FOOTER_TEMPLATE, true );
		$template  = filter_input( INPUT_POST, 'template', FILTER_SANITIZE_FULL_SPECIAL_CHARS );

		if ( empty( $data ) ) {
			$data = [
				'header' => [
					'label' => esc_html__( 'Search...', 'sellkit' ),
					'value' => 0,
				],
				'footer' => [
					'label' => esc_html__( 'Search...', 'sellkit' ),
					'value' => 0,
				],
			];
		}

		if ( ! is_array( $data ) ) {
			$data = maybe_unserialize( $data );
		}

		wp_send_json_success( $data );
	}

	/**
	 * Create new Elementor template.
	 *
	 * @since 1.8.9
	 */
	private function create_new_template() {
		$template   = filter_input( INPUT_POST, 'template', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$post_title = filter_input( INPUT_POST, 'post_title', FILTER_SANITIZE_FULL_SPECIAL_CHARS );

		$args = [
			'post_type'   => 'elementor_library',
			'post_title'  => $post_title,
			'post_status' => 'publish',
			'meta_input'  => [
				'_elementor_template_type' => $template,
				'_elementor_edit_mode'     => 'builder',
				'jx-layout-type'           => $template,
				'_wp_page_template'        => 'full-width.php',
			],
		];

		$id = wp_insert_post( $args );

		if ( intval( $id ) > 0 ) {
			$editor_url = Elementor::$instance->documents->get( $id )->get_edit_url();

			wp_send_json_success( [
				'label' => $post_title,
				'value' => $id,
				'url'   => $editor_url,
			] );
		}

		wp_send_json_error();
	}

	/**
	 * Checks all bumps and return data.
	 *
	 * @since 1.8.1
	 * @param array $bump_data Bump data.
	 * @return array
	 */
	public function get_valid_bumps( $bump_data ) {
		$valid_bumps = [];

		foreach ( $bump_data as $bump ) {
			$conditions = ! empty( $bump['data']['conditions'] ) ? $bump['data']['conditions'] : '';

			if ( ! empty( $conditions ) && empty( sellkit_conditions_validation( $conditions ) ) ) {
				continue;
			}

			$valid_bumps[] = $bump;
		}

		return $valid_bumps;
	}
}

new Checkout();
