<?php

use Sellkit\Global_Checkout\Checkout;

defined( 'ABSPATH' ) || die();

/**
 * Class Funnel_Homepage.
 * Handle funnel steps as home page.
 *
 * @since 1.9.6
 */
class Funnel_Homepage {

	/**
	 * Valid funnel types.
	 *
	 * @since 1.9.6
	 * @var array
	 * @access private
	 */
	private const VALID_TYPES = [ 'sales-page', 'checkout' ];

	/**
	 * First step as a homepage.
	 *
	 * @since 1.9.6
	 * @var int
	 */
	public static $first_step;

	/**
	 * Funnel_Homepage constructor.
	 *
	 * @since 1.9.6
	 */
	public function __construct() {
		add_action( 'pre_get_posts', [ $this, 'pre_get_posts' ] );

		if ( is_admin() ) {
			add_filter( 'wp_dropdown_pages', [ $this, 'wp_dropdown_pages' ], 10, 1 );
		}
	}

	/**
	 * Set the post type to sellkit_step if the page_id is a step.
	 *
	 * @param \WP_Query $query The WP_Query object.
	 * @since 1.9.6
	 * @return void
	 */
	public function pre_get_posts( $query ) {
		if ( $query->is_main_query() && ! ( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) {

			$post_type = $query->get( 'post_type' );

			$page_id = (int) $query->get( 'page_id' );

			if ( empty( $post_type ) && ! empty( $page_id ) ) {
				$post_type_from_id = get_post_type( $page_id );
				$status            = self::check_funnel_step_status( $page_id, $post_type_from_id );

				if ( $status ) {
					$query->set( 'post_type', $post_type_from_id );

					if ( intval( $page_id ) === intval( get_option( 'page_on_front', 0 ) ) ) {
						new Sellkit_Funnel( $page_id );
						self::$first_step = $page_id;
					}
				}
			}
		}
	}

	/**
	 * Add funnel steps to the dropdown list.
	 *
	 * @param string $output The HTML output.
	 * @since 1.9.6
	 * @return string
	 * @SuppressWarnings(PHPMD.NPathComplexity)
	 */
	public function wp_dropdown_pages( $output ) {
		if ( ! $this->is_homepage_for_frontend( $output ) ) {
			return $output;
		}

		$args = [
			'post_type'      => 'sellkit_step',
			'post_status'    => 'publish',
			'posts_per_page' => 100,
		];

		$query = new \WP_Query( $args );

		if ( ! $query->have_posts() ) {
			return $output;
		}

		$front_page_id      = get_option( 'page_on_front', 0 );
		$global_checkout_id = get_option( Checkout::SELLKIT_GLOBAL_CHECKOUT_OPTION, 0 );

		$steps = get_posts( $args );

		$custom_options = '';

		foreach ( $steps as $step ) {
			$step_data = [];

			if ( isset( $step->ID ) ) {
				$step_data = get_post_meta( $step->ID, 'step_data', true );
			}

			if ( isset( $step_data['funnel_id'] ) && intval( $global_checkout_id ) === intval( $step_data['funnel_id'] ) ) {
				continue;
			}

			if ( ! in_array( $step_data['type']['key'], self::VALID_TYPES, true ) ) {
				continue;
			}

			$funnel_id = isset( $step_data['funnel_id'] ) ? $step_data['funnel_id'] : 0;

			if ( ! empty( $funnel_id ) && 'publish' !== get_post_status( $funnel_id ) ) {
				continue;
			}

			if ( 'publish' !== $step_data['status'] ) {
				continue;
			}

			$selected = selected( $front_page_id, $step->ID, false );

			$title = sprintf(
				'%1$s (%2$s)',
				$step->post_title,
				esc_html__( 'Sellkit', 'sellkit' )
			);

			$custom_options .= sprintf(
				'<option value="%1$s" %2$s>%3$s</option>',
				esc_attr( $step->ID ),
				esc_attr( $selected ),
				esc_html( $title )
			);
		}

		$custom_options .= '</select>';

		$output = str_replace( '</select>', $custom_options, $output );

		return $output;
	}

	/**
	 * Check if the current page is the homepage for frontend.
	 *
	 * @param string $output The HTML output.
	 * @since 1.9.6
	 * @return bool
	 */
	private function is_homepage_for_frontend( $output ) {
		global $pagenow;

		if ( ( 'options-reading.php' === $pagenow || 'customize.php' === $pagenow ) && preg_match( '#page_on_front#', $output ) ) {
			return true;
		}

		return false;
	}

	/**
	 * Check funnel step status.
	 *
	 * @param int    $step_id The step ID.
	 * @param string $post_type The post type.
	 * @since 1.9.6
	 * @return bool
	 */
	public static function check_funnel_step_status( $step_id, $post_type ) {
		if ( 'sellkit_step' !== $post_type ) {
			return false;
		}

		$step_data = get_post_meta( $step_id, 'step_data', true );

		if ( empty( $step_data ) ) {
			return false;
		}

		$funnel_status = get_post_status( $step_data['funnel_id'] );

		if ( 'publish' !== $step_data['status'] || 'publish' !== $funnel_status ) {
			return false;
		}

		return true;
	}
}

new Funnel_Homepage();
