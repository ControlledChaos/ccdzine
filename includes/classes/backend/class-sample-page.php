<?php
/**
 * Sample menu page class
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

class Sample_Page extends Add_Page {

	/**
	 * Constructor method
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {

		$labels = [
			'page_title'  => __( 'Sample Page', 'ccdzine' ),
			'menu_title'  => __( 'Sample Page', 'ccdzine' ),
			'description' => __( 'Demonstration of adding a page.', 'ccdzine' )
		];

		$options = [
			'capability'    => 'read',
			'menu_slug'     => 'sample-page',
			'icon_url'      => 'dashicons-welcome-learn-more',
			'position'      => 3,
			'tabs_hashtags' => true,
			'add_help'      => true
		];

		parent :: __construct(
			$labels,
			$options,
			$priority
		);
	}

	/**
	 * Tabbed content
	 *
	 * Add content to the tabbed section of the page.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function tabs() {

		$this->add_content_tab( [
			'id'         => 'sample-one',
			'tab'        => __( 'One', 'ccdzine' ),
			'heading'    => __( 'Sample Content One', 'ccdzine' ),
			'content'    => '',
			'callback'   => [ $this, 'sample_tab' ]
		] );

		$this->add_content_tab( [
			'id'         => 'sample-two',
			'tab'        => __( 'Two', 'ccdzine' ),
			'heading'    => __( 'Sample Content Two', 'ccdzine' ),
			'content'    => '',
			'callback'   => [ $this, 'sample_tab' ]
		] );
	}

	/**
	 * Sample tab callback
	 *
	 * @since  1.0.0
	 * @access public
	 * @return mixed Returns the tab content.
	 */
	public function sample_tab() {
		include CCD_PATH . 'views/backend/pages/sample-page-content.php';
	}
}
