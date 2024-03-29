<?php
/**
 * Sample ACF options subpage
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

class Sample_ACF_Suboptions extends Add_Page {

	/**
	 * Constructor method
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {

		$labels = [
			'page_title'  => __( 'Sample ACF Options Subpage', 'ccdzine' ),
			'menu_title'  => __( 'ACF Options', 'ccdzine' ),
			'description' => __( 'Demonstration of adding an ACF options subpage.', 'ccdzine' )
		];

		$options = [
			'acf'           => [
				'acf_page' => true
			],
			'capability'  => 'read',
			'menu_slug'   => 'sample-acf-options-subpage',
			'parent_slug' => 'options-general.php',
			'icon_url'    => 'dashicons-admin-generic',
			'position'    => 35
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
		include_once CCD_PATH . '/includes/fields/acf-sample-suboptions.php';
	}
}
