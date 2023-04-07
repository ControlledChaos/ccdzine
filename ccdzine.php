<?php
/**
 * CCDzine plugin
 *
 * Site-specific plugin for the Controlled Chaos Design website.
 *
 * @package  CCDzine
 * @category Core
 * @since    1.0.0
 * @link     https://github.com/ControlledChaos/ccdzine
 *
 * Plugin Name:  CCDzine
 * Plugin URI:   https://github.com/ControlledChaos/ccdzine
 * Description:  Site-specific plugin for the Controlled Chaos Design website.
 * Version:      1.0.0
 * Author:       Controlled Chaos Design
 * Author URI:   https://ccdzine.com/
 * Text Domain:  ccdzine
 * Domain Path:  /languages
 * Requires PHP  5.4
 */

namespace CCDzine;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Constant: Plugin base name
 *
 * @since 1.0.0
 * @var   string The base name of this plugin file.
 */
define( 'CCD_BASENAME', plugin_basename( __FILE__ ) );


/**
 * Plugin page link
 *
 * Adds a link to the plugin's action links
 * under the plugin description.
 *
 * Currently links to the top-level sample page.
 * Change URL as needed.
 *
 * @param  array $links Default plugin links on the 'Plugins' admin page.
 * @since  1.0.0
 * @return array Returns an array of links.
 */
function ccd_plugin_page_link( $links ) {

	$url  = apply_filters( 'ccd_plugin_page_page_url', 'index.php?page=manage-website' );
	$html = sprintf(
			'<a href="%s" class="ccd-plugin-page-link">%s</a>',
			esc_url( admin_url( $url ) ),
			__( 'Help', 'ccdzine' )
	);
	$link = [ $html ];

	return array_merge( $link, $links );
}
add_filter( 'plugin_action_links_' . CCD_BASENAME, __NAMESPACE__ . '\ccd_plugin_page_link' );

// Get plugin configuration file.
require plugin_dir_path( __FILE__ ) . 'config.php';

/**
 * Activation & deactivation
 *
 * The activation & deactivation methods run here before the check
 * for PHP version which otherwise disables the functionality of
 * the plugin.
 */
include_once CCD_PATH . 'includes/activate/activate.php';
include_once CCD_PATH . 'includes/activate/deactivate.php';

/**
 * Register the activation & deactivation hooks
 *
 * The namespace of this file must remain escaped by use of the
 * backslash (`\`) prepending the activation hooks and corresponding
 * functions.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
\register_activation_hook( __FILE__, __NAMESPACE__ . '\activate_plugin' );
\register_deactivation_hook( __FILE__, __NAMESPACE__ . '\deactivate_plugin' );

/**
 * Run activation class
 *
 * The code that runs during plugin activation.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function activate_plugin() {

	// Update options.
	Activate\options();
}

/**
 * Run deactivation class
 *
 * The code that runs during plugin deactivation.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function deactivate_plugin() {

	// Update options.
	Deactivate\options();
}

/**
 * Disable plugin for PHP version
 *
 * Stop here if the minimum PHP version is not met.
 * Prevents breaking sites running older PHP versions.
 *
 * A notice is added to the plugin row on the Plugins
 * screen as a more elegant and more informative way
 * of disabling the plugin than putting the PHP minimum
 * in the plugin header, which activates a die() message.
 * However, the Requires PHP tag is included in the
 * plugin header with a minimum of version 5.4
 * because of the namespaces.
 *
 * @since  1.0.0
 * @return void
 */
if ( ! min_php_version() ) {

	// First add a notice to the plugin row.
	Activate\get_row_notice();

	// Stop here.
	return;
}

// Get the plugin initialization file.
require_once CCD_PATH . 'init.php';
