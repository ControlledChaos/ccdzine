<?php
/**
 * Developer tools settings fields
 *
 * @package    CCDzine
 * @subpackage Classes
 * @category   Settings
 * @since      1.0.0
 */

namespace CCDzine\Classes\Settings;

class Settings_Fields_Developer extends Settings_Fields {

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
				'id'       => 'direction_switch',
				'title'    => __( 'Direction Switcher', 'ccdzine' ),
				'callback' => [ $this, 'direction_switch_callback' ],
				'page'     => 'developer-tools',
				'section'  => 'ccd-options-developer',
				'type'     => 'checkbox',
				'args'     => [
					'description' => __( 'Easily switch backend and frontend screens between left-to-right and right-to-left orientations.', 'ccdzine' ),
					'class'       => 'admin-field'
				]
			],
			[
				'id'       => 'customizer_reset',
				'title'    => __( 'Customizer Reset', 'ccdzine' ),
				'callback' => [ $this, 'customizer_reset_callback' ],
				'page'     => 'developer-tools',
				'section'  => 'ccd-options-developer',
				'type'     => 'checkbox',
				'args'     => [
					'description' => __( 'Enable the ability to reset customizations to the active theme.', 'ccdzine' ),
					'class'       => 'admin-field'
				]
			],
			[
				'id'       => 'disable_site_health',
				'title'    => __( 'Disable Site Health', 'ccdzine' ),
				'callback' => [ $this, 'disable_site_health_callback' ],
				'page'     => 'developer-tools',
				'section'  => 'ccd-options-developer',
				'type'     => 'checkbox',
				'args'     => [
					'description' => __( 'Disable WordPress\' site health feature.', 'ccdzine' ),
					'class'       => 'admin-field'
				]
			],
			[
				'id'       => 'disable_floc',
				'title'    => __( 'Disable FloC', 'ccdzine' ),
				'callback' => [ $this, 'disable_floc_callback' ],
				'page'     => 'developer-tools',
				'section'  => 'ccd-options-developer',
				'type'     => 'checkbox',
				'args'     => [
					'description' => __( 'Disable Google\'s next-generation tracking technology.', 'ccdzine' ),
					'class'       => 'admin-field'
				]
			]
		];

		parent :: __construct(
			$fields
		);
	}

	/**
	 * Direction Switcher field order
	 *
	 * @since  1.0.0
	 * @access public
	 * @return integer Returns the placement of the field in the fields array.
	 */
	public function direction_switch_order() {
		return 0;
	}

	/**
	 * Customizer Reset field order
	 *
	 * @since  1.0.0
	 * @access public
	 * @return integer Returns the placement of the field in the fields array.
	 */
	public function customizer_reset_order() {
		return 1;
	}

	/**
	 * Disable site health
	 *
	 * @since  1.0.0
	 * @access public
	 * @return integer Returns the placement of the field in the fields array.
	 */
	public function disable_site_health_order() {
		return 2;
	}

	/**
	 * Disable FloC field order
	 *
	 * @since  1.0.0
	 * @access public
	 * @return integer Returns the placement of the field in the fields array.
	 */
	public function disable_floc_order() {
		return 3;
	}

	/**
	 * Sanitize Direction Switcher field
	 *
	 * @since  1.0.0
	 * @access public
	 * @return boolean
	 */
	public function direction_switch_sanitize() {

		$option = get_option( 'direction_switch', false );
		if ( true == $option ) {
			$option = true;
		} else {
			$option = false;
		}
		return apply_filters( 'ccd_direction_switch', $option );
	}

	/**
	 * Sanitize Customizer Reset field
	 *
	 * @since  1.0.0
	 * @access public
	 * @return boolean
	 */
	public function customizer_reset_sanitize() {

		$option = get_option( 'customizer_reset', false );
		if ( true == $option ) {
			$option = true;
		} else {
			$option = false;
		}
		return apply_filters( 'ccd_customizer_reset', $option );
	}

	/**
	 * Sanitize Disable Site Health field
	 *
	 * @since  1.0.0
	 * @access public
	 * @return boolean
	 */
	public function disable_site_health_sanitize() {

		$option = get_option( 'disable_site_health', false );
		if ( true == $option ) {
			$option = true;
		} else {
			$option = false;
		}
		return apply_filters( 'ccd_disable_site_health', $option );
	}

	/**
	 * Sanitize Disable FloC field
	 *
	 * @since  1.0.0
	 * @access public
	 * @return boolean
	 */
	public function disable_floc_sanitize() {

		$option = get_option( 'disable_floc', true );
		if ( true == $option ) {
			$option = true;
		} else {
			$option = false;
		}
		return apply_filters( 'ccd_disable_floc', $option );
	}

	/**
	 * Direction Switcher field callback
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function direction_switch_callback() {

		$fields   = $this->settings_fields;
		$order    = $this->direction_switch_order();
		$field_id = $fields[$order]['id'];
		$option   = $this->direction_switch_sanitize();

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
			__( 'Adds a button in the user toolbar.', 'ccdzine' )
		);

		echo $html;
	}

	/**
	 * Customizer Reset field callback
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function customizer_reset_callback() {

		$fields   = $this->settings_fields;
		$order    = $this->customizer_reset_order();
		$field_id = $fields[$order]['id'];
		$option   = $this->customizer_reset_sanitize();

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
			__( 'Adds a button in the Customizer panel header.', 'ccdzine' )
		);

		echo $html;
	}

	/**
	 * Disable Site Health field callback
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function disable_site_health_callback() {

		$fields   = $this->settings_fields;
		$order    = $this->disable_site_health_order();
		$field_id = $fields[$order]['id'];
		$option   = $this->disable_site_health_sanitize();

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
			__( 'Removes the dashboard widget and the menu entry, disables site health notifications.', 'ccdzine' )
		);

		echo $html;
	}

	/**
	 * Disable FloC field callback
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function disable_floc_callback() {

		$fields   = $this->settings_fields;
		$order    = $this->disable_floc_order();
		$field_id = $fields[$order]['id'];
		$option   = $this->disable_floc_sanitize();

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
			__( 'Adds an http header to disable FLoC.', 'ccdzine' )
		);

		echo $html;
	}
}
