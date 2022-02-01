<?php
/**
 * Plugin configuration
 *
 * The constants defined here do not override any default behavior
 * or default user interfaces. However, the corresponding behavior
 * can be overridden in the system config file (e.g. `wp-config`,
 * `app-config` ).
 *
 * The reason for using constants in the config file rather than
 * in a settings file is to prevent site administrators wrongly
 * or incorrectly configuring the site built by developers.
 *
 * @package    CCDzine
 * @subpackage Configuration
 * @category   Core
 * @since      1.0.0
 */

namespace CCDzine;

// Alias namespaces.
use CCDzine\Classes as Classes;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Constant: Plugin version
 *
 * Keeping the version at 1.0.0 as this is a starter plugin but
 * you may want to start counting as you develop for your use case.
 *
 * Remember to find and replace the `@version x.x.x` in docblocks.
 *
 * @since 1.0.0
 * @var   string The latest plugin version.
 */
define( 'CCD_VERSION', '1.0.0' );

/**
 * Plugin name
 *
 * @since 1.0.0
 * @var   string The name of the plugin.
 */
if ( ! defined( 'CCD_NAME' ) ) {
	define( 'CCD_NAME', __( 'Controlled Chaos Design', 'ccdzine' ) );
}

/**
 * Constant: Plugin folder path
 *
 * @since 1.0.0
 * @var   string The filesystem directory path (with trailing slash)
 *               for the plugin __FILE__ passed in.
 */
define( 'CCD_PATH', plugin_dir_path( __FILE__ ) );

/**
 * Constant: Plugin folder URL
 *
 * @since 1.0.0
 * @var   string The URL directory path (with trailing slash)
 *               for the plugin __FILE__ passed in.
 */
define( 'CCD_URL', plugin_dir_url( __FILE__ ) );

/**
 * PHP version check
 *
 * Stop here if the minimum PHP version is not met.
 * The following array definitions wi break sites
 * running older PHP versions.
 *
 * @since  1.0.0
 * @return void
 */
if ( ! Classes\php()->version() ) {
	return;
}

/**
 * Constant: Plugin configuration.
 *
 * @since 1.0.0
 * @var   array Plugin identification, support, settings.
 */
if ( ! defined( 'CCD_CONFIG' ) ) {

	define( 'CCD_CONFIG', [

		/**
		 * Plugin version
		 *
		 * @since 1.0.0
		 * @var   string The latest plugin version.
		 */
		'version' => CCD_VERSION,

		/**
		 * Required PHP version
		 *
		 * @since 1.0.0
		 * @var   string The minimum required PHP version.
		 */
		'php_version' => Classes\php()->minimum(),

		/**
		 * Plugin name
		 *
		 * Remember to replace in the plugin header.
		 *
		 * @since 1.0.0
		 * @var   string The name of the plugin.
		 */
		'name' => CCD_NAME,

		/**
		 * Developer name
		 *
		 * @since 1.0.0
		 * @var   string The name of the developer/agency.
		 */
		'dev_name' => __( 'Controlled Chaos', 'ccdzine' ),

		/**
		 * Developer URL
		 *
		 * @since 1.0.0
		 * @var   string The URL of the developer/agency.
		 */
		'dev_url' => esc_url( 'https://ccdzine.com/' ),

		/**
		 * Developer email
		 *
		 * @since 1.0.0
		 * @var   string The URL of the developer/agency.
		 */
		'dev_email' => sanitize_email( 'greg@ccdzine.com' ),

		/**
		 * Plugin URL
		 *
		 * @since 1.0.0
		 * @var   string The URL of the plugin.
		 */
		'plugin_url' => esc_url( 'https://github.com/ControlledChaos/ccdzine' ),

		/**
		 * Allow custom dashboard
		 *
		 * @since 1.0.0
		 * @var   boolean Whether to allow custom dashboard.
		 */
		'dashboard' => true,

		/**
		 * Universal slug
		 *
		 * This URL slug is used for various plugin admin & settings pages.
		 *
		 * The prefix will change in your search & replace in renaming the plugin.
		 * Change the second part of the define(), here as 'ccdzine',
		 * to your preferred page slug.
		 *
		 * @since 1.0.0
		 * @var   string The URL slug of the admin pages.
		 */
		'admin_slug' => 'ccdzine',

		/**
		 * Allow Site Health
		 *
		 * @since 1.0.0
		 * @var   boolean Whether to allow the Site Health feature.
		 */
		'site_health' => false,

		/**
		 * Allow block widgets
		 *
		 * @since 1.0.0
		 * @var   boolean Whether to allow block widgets.
		 */
		'block_widgets' => true,

		/**
		 * Allow links manager
		 *
		 * @since 1.0.0
		 * @var   boolean Whether to allow the links manager feature.
		 */
		'links_manager' => false,

		/**
		 * Allow Customizer
		 *
		 * @since 1.0.0
		 * @var   boolean Whether to allow the Customizer.
		 */
		'customizer' => true,

		/**
		 * User admin color picker
		 *
		 * @since 1.0.0
		 * @var   boolean Whether to allow admin color pickers.
		 */
		'color_picker' => true
	] );
}

/**
 * Developer name
 *
 * @since 1.0.0
 * @var   string The name of the developer/agency.
 */
if ( ! defined( 'CCD_DEV_NAME' ) ) {
	define( 'CCD_DEV_NAME', CCD_CONFIG['dev_name'] );
}

/**
 * Developer URL
 *
 * @since 1.0.0
 * @var   string The URL of the developer/agency.
 */
if ( ! defined( 'CCD_DEV_URL' ) ) {
	define( 'CCD_DEV_URL', CCD_CONFIG['dev_url'] );
}

/**
 * Developer email
 *
 * @since 1.0.0
 * @var   string The URL of the developer/agency.
 */
if ( ! defined( 'CCD_DEV_EMAIL' ) ) {
	define( 'CCD_DEV_EMAIL', CCD_CONFIG['dev_email'] );
}

/**
 * Plugin URL
 *
 * @since 1.0.0
 * @var   string The URL of the plugin.
 */
if ( ! defined( 'CCD_PLUGIN_URL' ) ) {
	define( 'CCD_PLUGIN_URL', CCD_CONFIG['plugin_url'] );
}

/**
 * Allow custom dashboard
 *
 * @since 1.0.0
 * @var   boolean Whether to allow the custom dashboard.
 */
if ( ! defined( 'CCD_USE_CUSTOM_DASHBOARD' ) ) {
	define( 'CCD_USE_CUSTOM_DASHBOARD', CCD_CONFIG['dashboard'] );
}

/**
 * Allow Site Health
 *
 * @since 1.0.0
 * @var   boolean Whether to allow the Site Health feature.
 */
if ( ! defined( 'CCD_ALLOW_SITE_HEALTH' ) ) {
	define( 'CCD_ALLOW_SITE_HEALTH', CCD_CONFIG['site_health'] );
}

/**
 * Allow block widgets
 *
 * @since 1.0.0
 * @var   boolean Whether to allow block widgets.
 */
if ( ! defined( 'CCD_ALLOW_BLOCK_WIDGETS' ) ) {
	define( 'CCD_ALLOW_BLOCK_WIDGETS', CCD_CONFIG['block_widgets'] );
}

/**
 * Allow links manager
 *
 * @since 1.0.0
 * @var   boolean Whether to allow the links manager feature.
 */
if ( ! defined( 'CCD_ALLOW_LINKS_MANAGER' ) ) {
	define( 'CCD_ALLOW_LINKS_MANAGER', CCD_CONFIG['links_manager'] );
}

/**
 * Allow Customizer
 *
 * @since 1.0.0
 * @var   boolean Whether to allow the Customizer.
 */
if ( ! defined( 'CCD_ALLOW_CUSTOMIZER' ) ) {
	define( 'CCD_ALLOW_CUSTOMIZER', CCD_CONFIG['customizer'] );
}

/**
 * User admin color picker
 *
 * @since 1.0.0
 * @var   boolean Whether to allow admin color pickers.
 */
if ( ! defined( 'CCD_ALLOW_ADMIN_COLOR_PICKER' ) ) {
	define( 'CCD_ALLOW_ADMIN_COLOR_PICKER', CCD_CONFIG['color_picker'] );
}
