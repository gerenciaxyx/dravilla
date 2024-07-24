<?php
/**
 * Plugin Name: Hostinger Easy Onboarding
 * Plugin URI: https://hostinger.com
 * Description: Hostinger Easy Onboarding WordPress plugin.
 * Version: 2.0.0
 * Requires at least: 5.5
 * Requires PHP: 8.0
 * Author: Hostinger
 * License: GPL v3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Author URI: https://www.hostinger.com
 * Text Domain: hostinger-easy-onboarding
 * Domain Path: /languages
 *
 * @package Hostinger Easy Onboarding
 */

use Hostinger\EasyOnboarding\EasyOnboarding;
use Hostinger\EasyOnboarding\Activator;
use Hostinger\EasyOnboarding\Deactivator;
use Hostinger\WpMenuManager\Manager;
use Hostinger\Surveys\Loader;
use Hostinger\Amplitude\AmplitudeLoader;

defined( 'ABSPATH' ) || exit;

if ( ! defined( 'HOSTINGER_EASY_ONBOARDING_VERSION' ) ) {
	define( 'HOSTINGER_EASY_ONBOARDING_VERSION', '2.0.0' );
}

if ( ! defined( 'HOSTINGER_EASY_ONBOARDING_ABSPATH' ) ) {
	define( 'HOSTINGER_EASY_ONBOARDING_ABSPATH', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'HOSTINGER_EASY_ONBOARDING_PLUGIN_FILE' ) ) {
	define( 'HOSTINGER_EASY_ONBOARDING_PLUGIN_FILE', __FILE__ );
}

if ( ! defined( 'HOSTINGER_EASY_ONBOARDING_PLUGIN_URL' ) ) {
	define( 'HOSTINGER_EASY_ONBOARDING_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}

if ( ! defined( 'HOSTINGER_EASY_ONBOARDING_ASSETS_URL' ) ) {
	define( 'HOSTINGER_EASY_ONBOARDING_ASSETS_URL', plugin_dir_url( __FILE__ ) . 'assets' );
}

if ( ! defined( 'HOSTINGER_EASY_ONBOARDING_WP_CONFIG_PATH' ) ) {
	define( 'HOSTINGER_EASY_ONBOARDING_WP_CONFIG_PATH', ABSPATH . '.private/config.json' );
}

if ( ! defined( 'HOSTINGER_EASY_ONBOARDING_WP_TOKEN' ) ) {
	$hostinger_dir_parts        = explode( '/', __DIR__ );
	$hostinger_server_root_path = '/' . $hostinger_dir_parts[1] . '/' . $hostinger_dir_parts[2];
	define( 'HOSTINGER_EASY_ONBOARDING_WP_TOKEN', $hostinger_server_root_path . '/.api_token' );
}

if ( ! defined( 'HOSTINGER_EASY_ONBOARDING_REST_URI' ) ) {
	define( 'HOSTINGER_EASY_ONBOARDING_REST_URI', 'https://rest-hosting.hostinger.com' );
}

if ( ! defined( 'HOSTINGER_EASY_ONBOARDING_REST_API_BASE' ) ) {
    define( 'HOSTINGER_EASY_ONBOARDING_REST_API_BASE', 'hostinger-easy-onboarding/v1' );
}

if ( ! defined( 'HOSTINGER_EASY_ONBOARDING_MINIMUM_PHP_VERSION' ) ) {
    define( 'HOSTINGER_EASY_ONBOARDING_MINIMUM_PHP_VERSION', '8.0' );
}

if ( ! version_compare( phpversion(), HOSTINGER_EASY_ONBOARDING_MINIMUM_PHP_VERSION, '>=' ) ) {

    add_action( 'admin_notices', function() {
        ?>
        <div class="notice notice-error is-dismissible hts-theme-settings">
            <p>
                <?php /* translators: %s php version */ ?>
                <strong><?php echo __( 'Attention:', 'hostinger-easy-onboarding' ); ?></strong> <?php echo sprintf( __( 'The Hostinger Easy Onboarding plugin requires minimum PHP version of <b>%s</b>. ', 'hostinger-easy-onboarding' ), HOSTINGER_EASY_ONBOARDING_MINIMUM_PHP_VERSION ); ?>
            </p>
            <p>
                <?php /* translators: %s php version */ ?>
                <?php echo sprintf( __( 'You are running <b>%s</b> PHP version.', 'hostinger-easy-onboarding' ), phpversion() ); ?>
            </p>
        </div>
        <?php
    }
    );

    return;
}

$vendor_file = __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

if ( file_exists( $vendor_file ) ) {
	require_once $vendor_file;
}

/**
 * Plugin activation hook.
 */
function hostinger_easy_onboarding_activate(): void {
	Activator::activate();
}

/**
 * Plugin deactivation hook.
 */
function hostinger_easy_onboarding_deactivate(): void {
	Deactivator::deactivate();
}

if ( ! function_exists( 'hostinger_load_menus' ) ) {
	function hostinger_load_menus(): void {
		$manager = Manager::getInstance();
		$manager->boot();
	}
}
if ( ! function_exists( 'hostinger_add_surveys' ) ) {
	function hostinger_add_surveys(): void {
		$surveys = Loader::getInstance();
		$surveys->boot();
	}
}

if ( ! function_exists( 'hostinger_load_amplitude' ) ) {
	function hostinger_load_amplitude(): void {
		$amplitude = AmplitudeLoader::getInstance();
		$amplitude->boot();
	}
}

if ( ! has_action( 'plugins_loaded', 'hostinger_load_menus' ) ) {
	add_action( 'plugins_loaded', 'hostinger_load_menus' );
}
if ( ! has_action( 'plugins_loaded', 'hostinger_add_surveys' ) ) {
	add_action( 'plugins_loaded', 'hostinger_add_surveys' );
}

if ( ! has_action( 'plugins_loaded', 'hostinger_load_amplitude' ) ) {
	add_action( 'plugins_loaded', 'hostinger_load_amplitude' );
}

register_activation_hook( __FILE__, 'hostinger_easy_onboarding_activate' );
register_deactivation_hook( __FILE__, 'hostinger_easy_onboarding_deactivate' );


$hostingerEasyOnboarding = new EasyOnboarding();
$hostingerEasyOnboarding->run();
