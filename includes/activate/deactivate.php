<?php
/**
 * Plugin deactivation
 *
 * @package    CCDzine
 * @subpackage Includes
 * @category   Activate
 * @since      1.0.0
 */

namespace CCDzine\Deactivate;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Add & update options
 *
 * @since  1.0.0
 * @return self
 */
function options() {
	update_option( 'avatar_default', 'mystery' );
}
