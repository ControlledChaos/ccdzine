<?php
/**
 * Sample ACF options page
 *
 * Copy this file and rename it to reflect
 * its new class name. Add to the autoloader
 * and instantiate where appropriate.
 *
 * @package    CCDzine
 * @subpackage Classes
 * @category   Admin
 * @since      1.0.0
 */

namespace CCDzine\Classes\Admin;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

class Sample_ACF_Options extends Add_Page {

	/**
	 * Constructor method
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {

		$labels = [
			'page_title'  => __( 'Sample ACF Options Page', 'ccdzine' ),
			'menu_title'  => __( 'ACF Options', 'ccdzine' ),
			'description' => __( 'Demonstration of adding an ACF options page.', 'ccdzine' )
		];

		$options = [
			'acf'           => [
				'acf_page' => true
			],
			'menu_slug' => 'sample-acf-options-page',
			'icon_url'  => 'dashicons-admin-generic',
			'position'  => 76
		];

		parent :: __construct(
			$labels,
			$options,
			$priority
		);
	}

	/**
	 * Field groups
	 *
	 * Register field groups for this options page.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function acf_field_groups() {
		include_once CCD_PATH . '/includes/fields/acf-sample-options.php';
	}
}
