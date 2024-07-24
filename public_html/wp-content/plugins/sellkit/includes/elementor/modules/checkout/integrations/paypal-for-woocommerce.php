<?php

namespace Sellkit\Elementor\Modules\Checkout\Integrations;

defined( 'ABSPATH' ) || die();

use Sellkit\Elementor\Modules\Checkout\Integrations\Integration;

/**
 * Integration class to integrate paypal for WooCommerce gateway with sellkit checkout widget.
 *
 * @since 1.1.0
 */
class Paypal_For_Woocommerce extends Integration {
	/**
	 * Integrated gateway instance.
	 *
	 * @var \AngellEYE_PayPal_PPCP_Smart_Button
	 * @since 1.8.9
	 */
	public $parent;

	/**
	 * Check requirement to enable gateway in sellkit checkout widget.
	 *
	 * @return bool
	 * @since 1.1.0
	 */
	protected function requirements() {
		// Plugin is not installed.
		if ( ! class_exists( 'AngellEYE_PayPal_PPCP_Smart_Button' ) ) {
			return false;
		}

		$this->parent = \AngellEYE_PayPal_PPCP_Smart_Button::instance();

		// Gateway is not active.
		if ( 'no' === $this->parent->enabled ) {
			return false;
		}

		return true;
	}

	/**
	 * Content of express checkout methods.
	 *
	 * @return void
	 * @since 1.1.0
	 */
	public function content() {
		$this->parent->display_paypal_button_top_checkout_page();
	}

	/**
	 * Angelleye button wrapper
	 *
	 * @since 1.8.9
	 */
	public function customized_buttons() {
		ob_start();
		?>
			<div class="wc_ppcp_express_checkout_gateways angelleye-integrated-by-sellkit">
				<div class="angelleye_ppcp-gateway express_payment_method_ppcp">
					<div class="angelleye_ppcp-button-container angelleye_ppcp_<?php echo esc_attr( $this->parent->style_layout ); ?>_<?php echo esc_attr( $this->parent->style_size ); ?>">
						<div id="angelleye_ppcp_checkout_top"></div>
						<div id="angelleye_ppcp_checkout_top_apple_pay"></div>
					</div>
				</div>
			</div>
		<?php
		return ob_get_clean();
	}

	/**
	 * Hooks to integrate current gateway with sellkit checkout widget.
	 *
	 * @return void
	 * @since 1.1.0
	 */
	public function hooks() {
		add_filter( 'angelleye_ppcp_checkout_top_html', [ $this, 'customized_buttons' ], 10, 1 );
		remove_action( 'woocommerce_checkout_before_customer_details', [ $this->parent, 'display_paypal_button_top_checkout_page' ], 1 );
	}
}
