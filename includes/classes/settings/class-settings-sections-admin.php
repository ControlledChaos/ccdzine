<?php
/**
 * Sample settings sections
 *
 * @package    CCDzine
 * @subpackage Classes
 * @category   Settings
 * @since      1.0.0
 */

namespace CCDzine\Classes\Settings;

class Settings_Sections_Admin extends Settings_Sections {

	/**
	 * Constructor method
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {

		$sections = [
			[
				'id'       => 'ccd-settings-section-admin-menu',
				'title'    => __( 'Menu Settings', 'ccdzine' ),
				'callback' => '',
				'page'     => 'options-admin',
				'args'     => [
					'before_section' => '',
					'after_section'  => '',
					'section_class'  => 'settings-section-admin-menu'
				]
			],
			[
				'id'       => 'ccd-settings-section-admin-dashboard',
				'title'    => __( 'Dashboard Settings', 'ccdzine' ),
				'callback' => '',
				'page'     => 'options-admin',
				'args'     => [
					'before_section' => '',
					'after_section'  => '',
					'section_class'  => 'settings-section-admin-dashboard'
				]
			],
			[
				'id'       => 'ccd-settings-section-admin-toolbar',
				'title'    => __( 'Toolbar Settings', 'ccdzine' ),
				'callback' => '',
				'page'     => 'options-admin',
				'args'     => [
					'before_section' => '',
					'after_section'  => '',
					'section_class'  => 'settings-section-admin-toolbar'
				]
			],
			[
				'id'       => 'ccd-settings-section-admin-header',
				'title'    => __( 'Header Settings', 'ccdzine' ),
				'callback' => '',
				'page'     => 'options-admin',
				'args'     => [
					'before_section' => '',
					'after_section'  => '',
					'section_class'  => 'settings-section-admin-header'
				]
			],[
				'id'       => 'ccd-settings-section-admin-header',
				'title'    => __( 'header Settings', 'ccdzine' ),
				'callback' => '',
				'page'     => 'options-admin',
				'args'     => [
					'before_section' => '',
					'after_section'  => '',
					'section_class'  => 'settings-section-admin-header'
				]
			],
			[
				'id'       => 'ccd-settings-section-admin-users',
				'title'    => __( 'User Settings', 'ccdzine' ),
				'callback' => '',
				'page'     => 'options-admin',
				'args'     => [
					'before_section' => '',
					'after_section'  => '',
					'section_class'  => 'settings-section-admin-users'
				]
			]
		];

		parent :: __construct(
			$sections
		);
	}
}
