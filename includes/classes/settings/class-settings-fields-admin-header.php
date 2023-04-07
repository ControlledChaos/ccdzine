<?php
/**
 * Admin header settings fields
 *
 * @package    CCDzine
 * @subpackage Classes
 * @category   Settings
 * @since      1.0.0
 */

namespace CCDzine\Classes\Settings;

use function CCDzine\Core\platform_name;

class Settings_Fields_Admin_Header extends Settings_Fields {

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
				'id'       => 'enable_custom_admin_header',
				'title'    => __( 'Enable Custom Header', 'ccdzine' ),
				'callback' => [ $this, 'enable_custom_admin_header_callback' ],
				'page'     => 'options-admin',
				'section'  => 'ccd-settings-section-admin-header',
				'type'     => 'checkbox',
				'args'     => [
					'description' => sprintf(
						__( 'Check to enable the custom header on admin screens.', 'ccdzine' )
					),
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
	public function enable_custom_admin_header_order() {
		return 0;
	}

	/**
	 * Sanitize Custom Dashboard field
	 *
	 * @since  1.0.0
	 * @access public
	 * @return boolean
	 */
	public function enable_custom_admin_header_sanitize() {

		$option = get_option( 'enable_custom_admin_header' );
		if ( true == $option ) {
			$option = true;
		} else {
			$option = false;
		}
		return apply_filters( 'ccd_enable_custom_admin_header', $option );
	}

	/**
	 * Custom Dashboard field callback
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enable_custom_admin_header_callback() {

		$fields   = $this->settings_fields;
		$order    = $this->enable_custom_admin_header_order();
		$field_id = $fields[$order]['id'];
		$option   = $this->enable_custom_admin_header_sanitize();

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
		$html .= sprintf(
			'<p class="description">%s</p>',
			__( 'Adds the site title, the tagline/description, logo, and registers a navigation menu.', 'ccdzine' )
		);

		echo $html;
	}
}
