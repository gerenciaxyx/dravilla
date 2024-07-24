<?php

namespace Hostinger\Admin;

use Hostinger\Helper;
use Hostinger\WpHelper\Utils;

defined( 'ABSPATH' ) || exit;

class Hooks {
    /**
     * @var Helper
     */
	private Helper $helper;

    /**
     * @var Utils
     */
    private Utils $utils;

	public function __construct() {
		$this->helper = new Helper();
        $this->utils = new Utils();
		add_action( 'admin_footer', array( $this, 'rate_plugin' ) );
		add_action( 'admin_init', array( $this, 'message_about_plugin_split' ) );
	}

    /**
     * @return void
     */
	public function rate_plugin(): void {
        if ( !$this->utils->isThisPage('wp-admin/admin.php?page=' . Menu::MENU_SLUG) ) {
            return;
        }

        require_once HOSTINGER_ABSPATH . 'includes/Admin/Views/Partials/RateUs.php';
	}

	public function message_about_plugin_split(): void {
		$plugin_split_notice_hidden = get_transient( 'hts_plugin_split_notice_hidden' );
		if ( $plugin_split_notice_hidden === false & version_compare( HOSTINGER_VERSION, '3.0.0', '>=' ) ) {
			if ( !$this->utils->isPluginActive( 'hostinger-easy-onboarding' ) ) {
				add_action( 'admin_notices', array( $this, 'custom_admin_notice' ) );
			}
		}
	}

	public function custom_admin_notice() {
		?>
		<div id="hostinger-plugin-split-notice" class="hts-plugin-split notice is-dismissible">
			<h2><?php echo esc_html__('Hostinger plugin updates', 'hostinger'); ?></h2>
			<p><?php echo esc_html__('We have split certain settings into Hostinger tools to easily manage some key preferences of your website. “Get started” and “Learning” sections are now part of the main Hostinger Easy Onboarding plugin.', 'hostinger'); ?></p>
			<button id="plugin-split-close" type="button" class="plugin-split-close notice-dismiss"><?php echo esc_html__('Got it', 'hostinger'); ?></button>
		</div>
		<?php
		wp_nonce_field( 'hts_close_plugin_split', 'hts_close_plugin_split_nonce', true );
	}

}
