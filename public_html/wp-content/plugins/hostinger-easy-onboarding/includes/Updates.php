<?php
namespace Hostinger\EasyOnboarding;

use Hostinger\EasyOnboarding\Config;
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Updates {
	private Config $config_handler;
	private const DEFAULT_PLUGIN_UPDATE_URI = 'https://hostinger-wp-updates.com?action=get_metadata&slug=hostinger-easy-onboarding';

	public function __construct() {
		$this->config_handler = new Config();
		$this->updates();
	}

	private function get_plugin_update_uri( string $default = self::DEFAULT_PLUGIN_UPDATE_URI ): string {
		return $this->config_handler->get_config_value( 'easy_onboarding_plugin_update_uri', $default );
	}

	public function updates(): void {
		$plugin_updater_uri = $this->get_plugin_update_uri();

		if ( class_exists( PucFactory::class ) ) {
			$hts_update_checker = PucFactory::buildUpdateChecker(
				$plugin_updater_uri,
				HOSTINGER_EASY_ONBOARDING_ABSPATH . 'hostinger-easy-onboarding.php',
				'hostinger-easy-onboarding'
			);
		}
	}

}
