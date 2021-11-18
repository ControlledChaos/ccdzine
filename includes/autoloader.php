<?php
/**
 * Register plugin classes
 *
 * The autoloader registers plugin classes for later use.
 *
 * @package    CCDzine
 * @subpackage Includes
 * @category   Classes
 * @since      1.0.0
 */

namespace CCDzine;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Class files
 *
 * Defines the class directories and file prefixes.
 *
 * @since 1.0.0
 * @var   array Defines an array of class file paths.
 */
define( 'CCD_CLASS', [
	'core'     => CCD_PATH . 'includes/classes/core/class-',
	'settings' => CCD_PATH . 'includes/classes/settings/class-',
	'tools'    => CCD_PATH . 'includes/classes/tools/class-',
	'media'    => CCD_PATH . 'includes/classes/media/class-',
	'users'    => CCD_PATH . 'includes/classes/users/class-',
	'vendor'   => CCD_PATH . 'includes/classes/vendor/class-',
	'admin'    => CCD_PATH . 'includes/classes/backend/class-',
	'front'    => CCD_PATH . 'includes/classes/frontend/class-',
	'widgets'  => CCD_PATH . 'includes/classes/widgets/class-',
	'general'  => CCD_PATH . 'includes/classes/class-',
] );

/**
 * Classes namespace
 *
 * @since 1.0.0
 * @var   string Defines the namespace of class files.
 */
define( 'CCD_CLASS_NS', __NAMESPACE__ . '\Classes' );

/**
 * Array of classes to register
 *
 * When you add new classes to your version of this plugin you may
 * add them to the following array rather than requiring the file
 * elsewhere. Be sure to include the precise namespace.
 *
 * SAMPLES: Uncomment sample classes to load them.
 *
 * @since 1.0.0
 * @var   array Defines an array of class files to register.
 */
define( 'CCD_CLASSES', [

	// Core classes.
	CCD_CLASS_NS . '\Core\Editor_Options'       => CCD_CLASS['core'] . 'editor-options.php',
	CCD_CLASS_NS . '\Core\Type_Tax'             => CCD_CLASS['core'] . 'type-tax.php',
	CCD_CLASS_NS . '\Core\Register_Type'        => CCD_CLASS['core'] . 'register-type.php',
	CCD_CLASS_NS . '\Core\Register_Sample_Type' => CCD_CLASS['core'] . 'register-sample-type.php',
	CCD_CLASS_NS . '\Core\Register_Admin'       => CCD_CLASS['core'] . 'register-admin.php',
	CCD_CLASS_NS . '\Core\Register_Site_Help'   => CCD_CLASS['core'] . 'register-site-help.php',
	CCD_CLASS_NS . '\Core\Register_Tax'         => CCD_CLASS['core'] . 'register-tax.php',
	CCD_CLASS_NS . '\Core\Register_Sample_Tax'  => CCD_CLASS['core'] . 'register-sample-tax.php',
	CCD_CLASS_NS . '\Core\Types_Taxes_Order'    => CCD_CLASS['core'] . 'types-taxes-order.php',
	CCD_CLASS_NS . '\Core\Taxonomy_Templates'   => CCD_CLASS['core'] . 'taxonomy-templates.php',
	CCD_CLASS_NS . '\Core\Remove_Blog'          => CCD_CLASS['core'] . 'remove-blog.php',
	CCD_CLASS_NS . '\Core\Remove_Customizer'    => CCD_CLASS['core'] . 'remove-customizer.php',

	// Settings classes.
	CCD_CLASS_NS . '\Settings\Settings' => CCD_CLASS['settings'] . 'settings.php',

	// Tools classes.
	CCD_CLASS_NS . '\Tools\Tools'            => CCD_CLASS['tools'] . 'tools.php',
	CCD_CLASS_NS . '\Tools\Disable_FloC'     => CCD_CLASS['tools'] . 'disable-google-floc.php',
	CCD_CLASS_NS . '\Tools\RTL_Test'         => CCD_CLASS['tools'] . 'rtl-test.php',
	CCD_CLASS_NS . '\Tools\Customizer_Reset' => CCD_CLASS['tools'] . 'customizer-reset.php',

	// Media classes.
	CCD_CLASS_NS . '\Media\Media'               => CCD_CLASS['media'] . 'media.php',
	CCD_CLASS_NS . '\Media\Register_Media_Type' => CCD_CLASS['media'] . 'register-media-type.php',

	// Users classes.
	CCD_CLASS_NS . '\Users\Users'           => CCD_CLASS['users'] . 'users.php',
	CCD_CLASS_NS . '\Users\User_Roles_Caps' => CCD_CLASS['users'] . 'user-roles-caps.php',
	CCD_CLASS_NS . '\Users\User_Toolbar'    => CCD_CLASS['users'] . 'user-toolbar.php',
	CCD_CLASS_NS . '\Users\User_Avatars'    => CCD_CLASS['users'] . 'user-avatars.php',
	CCD_CLASS_NS . '\Users\User_Options'    => CCD_CLASS['users'] . 'user-options.php',
	CCD_CLASS_NS . '\Users\User_Colors'     => CCD_CLASS['users'] . 'user-colors.php',

	// Vendor classes.
	CCD_CLASS_NS . '\Vendor\Plugin'        => CCD_CLASS['vendor'] . 'plugin.php',
	CCD_CLASS_NS . '\Vendor\Plugin_Sample' => CCD_CLASS['vendor'] . 'plugin-sample.php',
	CCD_CLASS_NS . '\Vendor\Plugin_ACF'    => CCD_CLASS['vendor'] . 'plugin-acf.php',
	CCD_CLASS_NS . '\Vendor\Plugin_ACFE'   => CCD_CLASS['vendor'] . 'plugin-acfe.php',
	CCD_CLASS_NS . '\Vendor\ACF_Columns'   => CCD_CLASS['vendor'] . 'acf-columns.php',
	CCD_CLASS_NS . '\Vendor\Add_ACF_Options'    => CCD_CLASS['vendor'] . 'add-acf-options.php',
	CCD_CLASS_NS . '\Vendor\Add_ACF_Suboptions' => CCD_CLASS['vendor'] . 'add-acf-suboptions.php',
	CCD_CLASS_NS . '\Vendor\ACF_Manage_Site'    => CCD_CLASS['vendor'] . 'acf-manage-site.php',
	CCD_CLASS_NS . '\Vendor\Sample_ACF_Options'    => CCD_CLASS['vendor'] . 'sample-acf-options.php',
	CCD_CLASS_NS . '\Vendor\Sample_ACF_Suboptions' => CCD_CLASS['vendor'] . 'sample-acf-suboptions.php',

	// Backend/admin classes,
	CCD_CLASS_NS . '\Admin\Admin'                   => CCD_CLASS['admin'] . 'admin.php',
	CCD_CLASS_NS . '\Admin\Add_Page'                => CCD_CLASS['admin'] . 'add-page.php',
	CCD_CLASS_NS . '\Admin\Add_Subpage'             => CCD_CLASS['admin'] . 'add-subpage.php',
	CCD_CLASS_NS . '\Admin\Admin_Settings_Page'     => CCD_CLASS['admin'] . 'admin-settings-page.php',
	CCD_CLASS_NS . '\Admin\Add_Settings_Page'       => CCD_CLASS['admin'] . 'add-settings-page.php',
	CCD_CLASS_NS . '\Admin\Admin_ACF_Settings_Page' => CCD_CLASS['admin'] . 'admin-acf-settings-page.php',
	CCD_CLASS_NS . '\Admin\Content_Settings'        => CCD_CLASS['admin'] . 'content-settings.php',
	CCD_CLASS_NS . '\Admin\Manage_Website_Page'     => CCD_CLASS['admin'] . 'manage-website-page.php',
	CCD_CLASS_NS . '\Admin\User_Colors'             => CCD_CLASS['admin'] . 'user-colors.php',
	CCD_CLASS_NS . '\Admin\Dashboard'               => CCD_CLASS['admin'] . 'dashboard.php',
	CCD_CLASS_NS . '\Admin\Posts_List_Table'        => CCD_CLASS['admin'] . 'posts-list-table.php',
	CCD_CLASS_NS . '\Admin\Post_Edit'               => CCD_CLASS['admin'] . 'post-edit.php',

	// Frontend classes.
	CCD_CLASS_NS . '\Front\Frontend'         => CCD_CLASS['front'] . 'frontend.php',
	CCD_CLASS_NS . '\Front\Title_Filter'     => CCD_CLASS['front'] . 'title-filter.php',
	CCD_CLASS_NS . '\Front\Content_Filter'   => CCD_CLASS['front'] . 'content-filter.php',
	CCD_CLASS_NS . '\Front\Template_Filters' => CCD_CLASS['front'] . 'template-filters.php',
	CCD_CLASS_NS . '\Front\Content_Sample'   => CCD_CLASS['front'] . 'content-sample.php',
	CCD_CLASS_NS . '\Front\Meta\Meta_Data'   => CCD_CLASS['front'] . 'meta-data.php',
	CCD_CLASS_NS . '\Front\Meta\Meta_Tags'   => CCD_CLASS['front'] . 'meta-tags.php',

	// Widget classes.
	CCD_CLASS_NS . '\Widgets\Add_Widget'    => CCD_CLASS['widgets'] . 'add-widget.php',
	CCD_CLASS_NS . '\Widgets\Sample_Widget' => CCD_CLASS['widgets'] . 'sample-widget.php'


	// General/miscellaneous classes.

] );

/**
 * Autoload class files
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
spl_autoload_register(
	function ( string $class ) {
		if ( isset( CCD_CLASSES[ $class ] ) ) {
			require CCD_CLASSES[ $class ];
		}
	}
);
