<?php
/**
 * Initialize plugin functionality
 *
 * @package    CCDzine
 * @subpackage Init
 * @category   Core
 * @since      1.0.0
 */

namespace CCDzine;

// Alias namespaces.
use
CCDzine\Classes\Autoload as Autoload,
CCDzine\Classes\Core     as Core_Class,
CCDzine\Classes\Settings as Settings_Class,
CCDzine\Classes\Tools    as Tools_Class,
CCDzine\Classes\Media    as Media_Class,
CCDzine\Classes\Users    as Users_Class,
CCDzine\Classes\Admin    as Backend_Class,
CCDzine\Classes\Front    as Frontend_Class,
CCDzine\Classes\Widgets  as Widgets_Class,
CCDzine\Classes\Vendor   as Vendor_Class;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Initialization function
 *
 * Loads PHP classes and text domain.
 * Executes various setup functions.
 * Instantiates various classes.
 * Adds settings link in the plugin row.
 *
 * @since  1.0.0
 * @return void
 */
function init() {

	// Standard plugin installation.
	load_plugin_textdomain(
		'ccdzine',
		false,
		dirname( CCD_BASENAME ) . '/languages'
	);

	// If this plugin is in the must-use plugins directory.
	load_muplugin_textdomain(
		'ccdzine',
		dirname( CCD_BASENAME ) . '/languages'
	);

	// Autoload classes.
	require_once CCD_PATH . 'includes/classes/autoload.php';
	Autoload\classes();

	// Load required files.
	foreach ( glob( CCD_PATH . 'includes/core/*.php' ) as $filename ) {
		require $filename;
	}
	foreach ( glob( CCD_PATH . 'includes/settings/*.php' ) as $filename ) {
		require $filename;
	}
	foreach ( glob( CCD_PATH . 'includes/post-types/*.php' ) as $filename ) {
		require $filename;
	}
	foreach ( glob( CCD_PATH . 'includes/media/*.php' ) as $filename ) {
		require $filename;
	}
	foreach ( glob( CCD_PATH . 'includes/backend/*.php' ) as $filename ) {
		require $filename;
	}
	foreach ( glob( CCD_PATH . 'includes/frontend/*.php' ) as $filename ) {
		require $filename;
	}
	foreach ( glob( CCD_PATH . 'includes/users/*.php' ) as $filename ) {
		require $filename;
	}
	foreach ( glob( CCD_PATH . 'includes/tools/*.php' ) as $filename ) {
		require $filename;
	}

	// Get compatibility functions.
	require CCD_PATH . 'includes/vendor/compatibility.php';

	// Instantiate settings classes.
	Settings\setup();

	// Instantiate core classes.
	new Core_Class\Register_Admin;
	if ( get_option( 'remove_blog' ) ) {
		new Core_Class\Remove_Blog;
	}

	// If the Customizer is disabled in the system config file.
	if ( ( defined( 'CCD_ALLOW_CUSTOMIZER' ) && false == CCD_ALLOW_CUSTOMIZER ) && ! current_user_can( 'develop' ) ) {
		new Core_Class\Remove_Customizer;
	}

	/**
	 * Editor options for WordPress
	 *
	 * Not run for ClassicPress and the default antibrand system.
	 * The `Core\is_classicpress()` function checks for ClassicPress.
	 *
	 * Not run if the Classic Editor plugin is active.
	 */
	if ( ! Core\is_classicpress() ) {
		if ( ! is_plugin_active( 'classic-editor/classic-editor.php' ) ) {
			new Core_Class\Editor_Options;
		}
	}

	// Tools.
	Tools\setup();

	// Media.
	Media\setup();

	// Advanced Custom Fields.
	$ccd_acf = new Vendor_Class\Plugin_ACF;
	$ccd_acf->include();

	// Advanced Custom Fields: Extended.
	$ccd_acfe = new Vendor_Class\Plugin_ACFE;
	$ccd_acfe->include();

	// Users.
	Users\setup();
	User_Roles\setup();
	if ( ! is_plugin_active( 'user-avatars/user-avatars.php' ) ) {
		if ( get_option( 'enable_user_avatars', true ) ) {
			new Users_Class\User_Avatars;
		}
	}

	// Customizer/front end.
	Front_Page_Post_Type\setup();

	// Front end.
	if ( ! is_admin() ) {
		Front\setup();
		Meta_Tags\setup();
	}

	// Disable Site Health notifications.
	if ( get_option( 'disable_site_health', false ) ) {
		add_filter( 'wp_fatal_error_handler_enabled', '__return_false' );
	}
	if ( defined( 'CCD_DISABLE_SITE_HEALTH' ) && CCD_DISABLE_SITE_HEALTH ) {
		add_filter( 'wp_fatal_error_handler_enabled', '__return_false' );
	}

	// Disable block widgets.
	if ( get_option( 'disable_block_widgets', true ) ) {
		add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
		add_filter( 'use_widgets_block_editor', '__return_false' );
	}
	if ( defined( 'CCD_DISABLE_BLOCK_WIDGETS' ) && CCD_DISABLE_BLOCK_WIDGETS ) {
		add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
		add_filter( 'use_widgets_block_editor', '__return_false' );
	}

	// Allow link manager.
	if ( get_option( 'enable_link_manager', false ) ) {
		add_filter( 'pre_option_link_manager_enabled', '__return_true' );
	}

	// Remove the Draconian capital P filters.
	remove_filter( 'the_title', 'capital_P_dangit', 11 );
	remove_filter( 'the_content', 'capital_P_dangit', 11 );
	remove_filter( 'comment_text', 'capital_P_dangit', 31 );

	// System email from text.
	add_filter( 'wp_mail_from_name', function( $name ) {
		return apply_filters( 'ccd_mail_from_name', get_bloginfo( 'name' ) );
	} );

	// Disable WordPress administration email verification prompt.
	add_filter( 'admin_email_check_interval', '__return_false' );
}
add_action( 'plugins_loaded', __NAMESPACE__ . '\init' );

/**
 * Admin initialization function
 *
 * @since  1.0.0
 * @global $pagenow Get the current admin screen.
 * @global $typenow Get the current post type screen.
 * @return void
 */
function admin_init() {

	if ( ! is_admin() ) {
		return;
	}

	// Access global variables.
	global $pagenow, $typenow;

	Admin\setup();
	Admin_Footer\setup();
}
add_action( 'plugins_loaded', __NAMESPACE__ . '\admin_init' );
