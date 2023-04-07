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

class Settings_Sections_Sample extends Settings_Sections {

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
				'id'       => 'ccd-settings-section-sample',
				'title'    => __( 'Sample Settings Section', 'ccdzine' ),
				'callback' => '',
				'page'     => 'general',
				'args'     => [
					'before_section' => '',
					'after_section'  => '',
					'section_class'  => ''
				]
			]
		];

		parent :: __construct(
			$sections
		);
	}
}
