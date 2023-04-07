<?php
/**
 * Admin dashboard settings fields
 *
 * @package    CCDzine
 * @subpackage Classes
 * @category   Settings
 * @since      1.0.0
 */

namespace CCDzine\Classes\Settings;

use function CCDzine\Core\platform_name;

class Settings_Fields_Admin_Dashboard extends Settings_Fields {

	/**
	 * Constructor method
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {

		$fields = [
			[
				'id'       => 'enable_custom_dashboard',
				'title'    => __( 'Custom Dashboard', 'ccdzine' ),
				'page'     => 'options-admin',
				'section'  => 'ccd-settings-section-admin-dashboard',
				'type'     => 'checkbox',
				'args'     => [
					'description' => __( 'Check to replace the default dashboard with a custom dashboard for this website.', 'ccdzine' ),
					'class'       => 'admin-field'
				]
			]
		];

		parent :: __construct(
			$fields
		);
	}

	/**
	 * Custom Dashboard field order
	 *
	 * @since  1.0.0
	 * @access public
	 * @return integer Returns the placement of the field in the fields array.
	 */
	public function enable_custom_dashboard_order() {
		return 0;
	}

	/**
	 * Sanitize Custom Dashboard field
	 *
	 * @since  1.0.0
	 * @access public
	 * @return boolean
	 */
	public function enable_custom_dashboard_sanitize() {

		$option = get_option( 'enable_custom_dashboard', false );
		if ( true == $option ) {
			$option = true;
		} else {
			$option = false;
		}
		return apply_filters( 'ccd_enable_custom_dashboard', $option );
	}

	/**
	 * Custom Dashboard field callback
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enable_custom_dashboard_callback() {

		$fields   = $this->settings_fields;
		$order    = $this->enable_custom_dashboard_order();
		$field_id = $fields[$order]['id'];
		$option   = $this->enable_custom_dashboard_sanitize();

		$html = sprintf(
			'<fieldset><legend class="screen-reader-text">%s</legend>',
			$fields[$order]['title']
		);
		$html .= sprintf(
			'<label for="%s">',
			$field_id
		);
		$html .= sprintf(
			'<input type="checkbox" id="%s" name="%s" value="1" %s /> %s',
			$field_id,
			$field_id,
			checked( 1, $option, false ),
			$fields[$order]['args']['description']
		);
		$html .= '</label></fieldset>';

		echo $html;
	}
}
