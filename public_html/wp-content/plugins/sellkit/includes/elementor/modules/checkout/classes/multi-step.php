<?php

namespace Sellkit\Elementor\Modules\Checkout\Classes;

defined( 'ABSPATH' ) || exit;

use \Elementor\Plugin as Elementor;

/**
 * Multistep class.
 * handle multi step mode for checkout widget.
 *
 * @since 1.1.0
 */
class Multi_Step {
	/**
	 * Checkout widget settings.
	 *
	 * @since 1.8.6
	 * @var array
	 */
	public $settings;

	/**
	 * Class construct.
	 *
	 * @param array $settings widget settings.
	 */
	public function __construct( $settings ) {
		// Widget settings.
		$this->settings = $settings;

		/* Step 1 wrap. */
		add_action( 'sellkit-checkout-step-a-begins', [ $this, 'first_step_begin' ], 10 );
		add_action( 'sellkit-checkout-step-a-ends', [ $this, 'first_step_ends' ] );

		/* Step 2 wrap. */
		add_action( 'sellkit-checkout-step-b-begins', [ $this, 'second_step_begin' ] );
		add_action( 'sellkit-checkout-step-b-ends', [ $this, 'second_step_ends' ] );
		// Step 2 preview box.
		if ( 'yes' === $this->settings['show_preview_box'] ) {
			add_action( 'sellkit-checkout-widget-step-two-header', [ $this, 'step_two_preview_box' ] );
		}

		/* Step 3 wrap. */
		add_action( 'sellkit-checkout-step-c-begins', [ $this, 'third_step_begin' ], 5 );
		add_action( 'sellkit-checkout-multistep-third-step-back-btn', [ $this, 'third_step_back_btn' ] );
		add_action( 'sellkit-checkout-step-c-ends', [ $this, 'third_step_ends' ] );
		// Step 3 preview box.
		if ( 'yes' === $this->settings['show_preview_box'] ) {
			add_action( 'sellkit-checkout-widget-step-three-header', [ $this, 'step_three_preview_box' ] );
		}

		// Remove payment method from order review & attach it to step 3.
		remove_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );
		add_action( 'sellkit-checkout-step-c-begins', 'woocommerce_checkout_payment', 20 );

		// Bring billing field before payment methods section.
		remove_action( 'woocommerce_checkout_billing', [ WC()->checkout(), 'checkout_form_billing' ] );
		add_action( 'sellkit-checkout-step-c-begins', [ WC()->checkout(), 'checkout_form_billing' ], 10 );

		// Sidebar order-review wrap.
		add_action( 'sellkit-checkout-multistep-sidebar-begins', [ $this, 'sidebar_starts' ], 10 );
		add_action( 'sellkit-checkout-multistep-sidebar-ends', [ $this, 'sidebar_ends' ] );

		// Attach Breadcrumbs.
		if ( 'yes' === $settings['show_breadcrumb'] ) {
			// We added this custom hook @sellkit-local-hooks class, before form.
			add_action( 'sellkit-checkout-widget-breadcrumb-desktop', [ $this, 'checkout_breadcrumb_desktop' ] );
			add_action( 'sellkit-checkout-widget-breadcrumb-mobile', [ $this, 'checkout_breadcrumb_mobile' ] );
		}
	}

	/**
	 * Inner wrapper begins.
	 * Left columns begins.
	 * First Step Begins.
	 *
	 * @return void
	 * @since 1.1.0
	 */
	public function first_step_begin() {
		echo sprintf(
			'<div class="inner_wrapper" id="sellkit-checkout-multistep-inner-wrap">
			<div class="sellkit-checkout-left-column">
			<div class="sellkit-multistep-checkout sellkit-multistep-checkout-first">'
		);
	}

	/**
	 * First step ends.
	 * close first step wrapper and also adds buttons that link to second step & cart page.
	 *
	 * @return void
	 * @since 1.1.0
	 */
	public function first_step_ends() {
		if ( WC()->cart->needs_shipping() ) : ?>
			<div class="sellkit-multistep-checkout-first-footer">
				<span class="go-to-shipping sellkit-checkout-widget-primary-button">
					<?php
						$text = esc_html__( 'Continue to shipping', 'sellkit' );

						if ( 'yes' !== $this->settings['show_shipping_method'] ) {
							$text = esc_html__( 'Continue to payment', 'sellkit' );
						}

						echo esc_html( $text );
					?>
				</span>
			</div>
		<?php endif; ?>
		</div> <?php /* Closed step 1 wrapper */ ?>
		<?php
	}

	/**
	 * Second step begins.
	 * add a wrapper around second step. also adds header elements to second step.
	 *
	 * @return void
	 * @since 1.1.0
	 */
	public function second_step_begin() {
		?>
		<div class="sellkit-multistep-checkout sellkit-multistep-checkout-second">
		<?php do_action( 'sellkit-checkout-widget-step-two-header' ); ?>
		<?php
	}

	/**
	 * Second step ends.
	 * close second step by closing wrapper. also adds button to first step & third step.
	 *
	 * @return void
	 * @since 1.1.0
	 */
	public function second_step_ends() {
		?>
			<section class="sellkit-multistep-checkout-second-footer">
				<span class="go-to-first sellkit-checkout-widget-return-button">
					<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"/></svg>
					<span><?php echo esc_html__( 'Return to previous step', 'sellkit' ); ?></span>
				</span>
				<span class="go-to-payment sellkit-checkout-widget-primary-button">
					<?php echo esc_html__( 'Continue to Payment', 'sellkit' ); ?>
				</span>
			</section>
		<?php /* Closed step wrapper */ ?>
		</div>
		<?php
	}

	/**
	 * Third step begins.
	 * adds third step wrapper & also header section.
	 *
	 * @return void
	 * @since 1.1.0
	 */
	public function third_step_begin() {
		?>
		<div class="sellkit-multistep-checkout sellkit-multistep-checkout-third">
		<?php do_action( 'sellkit-checkout-widget-step-three-header' ); ?>
		<?php
	}

	/**
	 * Back button for third step.
	 *
	 * @return void
	 * @since 1.1.0
	 */
	public function third_step_back_btn() {
		if ( ! WC()->cart->needs_shipping() ) {
			return;
		}

		?>
			<span class="go-to-second sellkit-checkout-widget-return-button">
				<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"/></svg>
				<span><?php echo esc_html__( 'Return to previous step', 'sellkit' ); ?></span>
			</span>
		<?php
	}

	/**
	 * Third step ends.
	 * Left columns ends.
	 *
	 * @return void
	 * @since 1.1.0
	 */
	public function third_step_ends() {
		?>
			<?php /* Closed step wrapper */ ?>
			</div>
			<?php /* Closed left column */ ?>
			</div>
		<?php
	}

	/**
	 * Right columns starts.
	 * Side bar starts.
	 *
	 * @return void
	 * @since 1.1.0
	 */
	public function sidebar_starts() {
		$class = 'sellkit-multistep-checkout sellkit-multistep-checkout-sidebar';
		// In multi step make sidebar sticky.
		if ( 'yes' === $this->settings['show_sticky_cart_details'] && 'multi-step' === $this->settings['layout-type'] ) {
			$class .= ' sellkit-multistep-checkout-sidebar-sticky';
		}
		?>
		<div class="sellkit-checkout-right-column">
			<div id="sellkit-checkout-widget-sidebar" class="<?php echo esc_attr( $class ); ?>">
				<div class="summary_toggle">
					<span class="icon sellkit-checkout-summary-toggle-shop-icon">
						<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
							<path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/>
						</svg>
					</span>
					<span class="title sellkit-checkout-widget-links"><?php echo esc_html__( 'Hide order summary', 'sellkit' ); ?></span>
					<span class="sellkit-checkout-widget-links sellkit-checkout-summary-toggle-up">
						<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
							<path d="M233.4 105.4c12.5-12.5 32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L256 173.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l192-192z"/>
						</svg>
					</span>
					<span class="sellkit-checkout-widget-links sellkit-checkout-summary-toggle-down">
						<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
							<path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/>
						</svg>
					</span>
					<span class="price"><?php wc_cart_totals_order_total_html(); ?></span>
				</div>
		<?php
	}

	/**
	 * Side bar ends.
	 *
	 * @return void
	 * @since 1.1.0
	 */
	public function sidebar_ends() {
		echo '</div>'; // sidebar!
		do_action( 'sellkit-checkout-widget-breadcrumb-mobile' );
		echo '</div>'; // right column!
		echo '</div>'; // inner wrapper!
	}

	/**
	 * Breadcrumb for desktop mode.
	 *
	 * @return void
	 * @since 1.1.0
	 */
	public function checkout_breadcrumb_desktop() {
		if ( ! WC()->cart->needs_shipping() ) {
			return;
		}

		?>
			<section id="checkout-widget-breadcrumb" class="sellkit-checkout-widget-breadcrumb-desktop sellkit-checkout-widget-breadcrumb">
				<span class="cart blue-line">
					<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" >
						<?php echo esc_html__( 'Cart', 'sellkit' ); ?>
					</a>
				</span>

				<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>
				<span class="information current"><?php echo esc_html__( 'Information', 'sellkit' ); ?></span>

				<?php if ( 'yes' === $this->settings['show_shipping_method'] ) : ?>
				<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>
				<span class="shipping inactive"><?php echo esc_html__( 'Shipping', 'sellkit' ); ?></span>
				<?php endif; ?>

				<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>
				<span class="payment inactive"><?php echo esc_html__( 'Payment', 'sellkit' ); ?></span>
			</section>
		<?php
	}

	/**
	 * Breadcrumb for mobile mode.
	 *
	 * @return void
	 * @since 1.1.0
	 */
	public function checkout_breadcrumb_mobile() {
		if ( ! WC()->cart->needs_shipping() ) {
			return;
		}

		?>
			<section id="checkout-widget-breadcrumb" class="sellkit-checkout-widget-breadcrumb-mobile sellkit-checkout-widget-breadcrumb">

				<span class="cart">
					<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="blue-line" >
						<?php echo esc_html__( 'Cart', 'sellkit' ); ?>
					</a>
				</span>

				<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>
				<span class="information current"><?php echo esc_html__( 'Information', 'sellkit' ); ?></span>

				<?php if ( 'yes' === $this->settings['show_shipping_method'] ) : ?>
				<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>
				<span class="shipping inactive"><?php echo esc_html__( 'Shipping', 'sellkit' ); ?></span>
				<?php endif; ?>

				<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>
				<span class="payment inactive"><?php echo esc_html__( 'Payment', 'sellkit' ); ?></span>
			</section>
		<?php
	}

	/**
	 * Step two preview box.
	 *
	 * @return void
	 * @since 1.1.0
	 */
	public static function step_two_preview_box() {
		?>
			<section class="sellkit-multistep-checkout-second-header multistep-headers sellkit-checkout-widget-divider">
				<div class="info-a" >
					<div>
						<span class="title"><?php echo esc_html__( 'Contact', 'sellkit' ); ?></span>
						<span class="mail email"></span>
					</div>
					<span class="edit edit-email go-to-first sellkit-checkout-widget-links">
						<?php echo esc_html__( 'Change', 'sellkit' ); ?>
					</span>
				</div>
				<hr class="sellkit-checkout-widget-divider">
				<div class="info-b">
					<div>
						<span class="title"><?php echo esc_html__( 'Ship to', 'sellkit' ); ?></span>
						<span class="mail address"></span>
					</div>
					<span class="edit edit-ship go-to-first sellkit-checkout-widget-links">
						<?php echo esc_html__( 'Change', 'sellkit' ); ?>
					</span>
				</div>
			</section>
		<?php
	}

	/**
	 * Step 3 preview box.
	 *
	 * @return void
	 * @since 1.1.0
	 */
	public static function step_three_preview_box() {
		if ( ! WC()->cart->needs_shipping() ) {
			return;
		}

		?>
			<section class="sellkit-multistep-checkout-third-header multistep-headers sellkit-checkout-widget-divider">
				<div class="info-a" >
					<div>
						<span class="title"><?php echo esc_html__( 'Contact', 'sellkit' ); ?></span>
						<span class="mail email"></span>
					</div>
					<span class="edit edit-email go-to-first sellkit-checkout-widget-links">
						<?php echo esc_html__( 'Change', 'sellkit' ); ?>
					</span>
				</div>
				<hr class="sellkit-checkout-widget-divider">
				<div class="info-b">
					<div>
						<span class="title"><?php echo esc_html__( 'Ship to', 'sellkit' ); ?></span>
						<span class="mail address"></span>
					</div>
					<span class="edit edit-ship go-to-first sellkit-checkout-widget-links">
						<?php echo esc_html__( 'Change', 'sellkit' ); ?>
					</span>
				</div>
				<hr class="sellkit-checkout-widget-divider">
				<div class="info-c">
					<div>
						<span class="title"><?php echo esc_html__( 'Method', 'sellkit' ); ?></span>
						<span class="mail method"></span>
					</div>
					<span class="edit edit-method go-to-second-header sellkit-checkout-widget-links">
						<?php echo esc_html__( 'Change', 'sellkit' ); ?>
					</span>
				</div>
			</section>
		<?php
	}
}
