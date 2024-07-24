<?php

namespace Hostinger\EasyOnboarding\Admin;

use Hostinger\EasyOnboarding\Helper;
use Hostinger\WpHelper\Utils;

defined( 'ABSPATH' ) || exit;

class Hooks {

	private Helper $helper;

    private const DAY_IN_SECONDS = 86400;

	public function __construct() {
		$this->helper = new Helper();
		add_action( 'admin_footer', array( $this, 'rate_plugin' ) );
		add_action( 'admin_init', array( $this, 'hide_astra_builder_selection_screen' ) );
        add_action( 'admin_init', array( $this, 'hide_monsterinsight_metabox' ) );
        add_action( 'admin_init', array( $this, 'hide_monsterinsight_notice' ) );
		add_action( 'admin_notices', array( $this, 'omnisend_discount_notice' ) );
		add_filter( 'woocommerce_prevent_automatic_wizard_redirect', function() { return true; }, 999 );

        add_filter( 'woocommerce_enable_setup_wizard', function() { return false; }, 999 );
	}

    public function hide_monsterinsight_notice(): void {
        if ( is_plugin_active( 'googleanalytics/googleanalytics.php' ) ) {
            define( 'MONSTERINSIGHTS_DISABLE_TRACKING', true );
        }
    }

	public function rate_plugin(): void {
		$promotional_banner_hidden = get_transient( 'hts_hide_promotional_banner_transient' );
		$two_hours_in_seconds      = 7200;

		if ( $promotional_banner_hidden && time() > $promotional_banner_hidden + $two_hours_in_seconds ) {
			require_once HOSTINGER_EASY_ONBOARDING_ABSPATH . 'includes/Admin/Views/Partials/RateUs.php';
		}
	}

	public function omnisend_discount_notice(): void {
		$omnisend_notice_hidden = get_transient( 'hts_omnisend_notice_hidden' );

		if ( $omnisend_notice_hidden === false && ( $this->helper->is_this_page( '/wp-admin/admin.php?page=omnisend' ) ) && ( Helper::is_plugin_active( 'class-omnisend-core-bootstrap' ) || Helper::is_plugin_active( 'omnisend-woocommerce' ) ) ) : ?>
			<div class="notice notice-info hts-admin-notice hts-omnisend">
				<p><?php echo wp_kses( __( 'Use the special discount code <b>ONLYHOSTINGER30</b> to get 30% off on Omnisend for 6 months when you upgrade.', 'hostinger-easy-onboarding' ), array( 'b' => array() ) ); ?></p>
				<div>
					<a class="button button-primary"
					   href="https://your.omnisend.com/LXqyZ0"
					   target="_blank"><?= esc_html__( 'Get Discount', 'hostinger-easy-onboarding' ); ?></a>
					<button type="button" class="notice-dismiss"></button>
				</div>
			</div>
		<?php endif;
		wp_nonce_field( 'hts_close_omnisend', 'hts_close_omnisend_nonce', true );
	}

	public function hide_astra_builder_selection_screen(): void {
		add_filter( 'st_enable_block_page_builder', '__return_true' );
	}

    public function hide_monsterinsight_metabox(): void {
        $helper = new Utils();
        $user_id      = get_current_user_id();

        $transient_key = 'metaboxhidden_product_' . $user_id;
        $hide_metabox = get_transient( $transient_key );

        if ( $hide_metabox ) {
            return;
        }

        $hide_metabox = get_user_meta($user_id, 'metaboxhidden_product', true);

        if ( ! $helper->isPluginActive( 'googleanalytics' ) ) {
            return;
        }

        if ( ! is_array( $hide_metabox ) ) {
            $hide_metabox = array();
        }

        if ( $helper->isThisPage( 'post-new.php?post_type=product' ) ) {
            if ( ! in_array( 'monsterinsights-metabox', $hide_metabox ) ) {
                array_push( $hide_metabox, 'monsterinsights-metabox' );
            }

            update_user_meta( $user_id, 'metaboxhidden_product', $hide_metabox );
            set_transient( $transient_key, 'hidden', self::DAY_IN_SECONDS );
        }
    }
}
