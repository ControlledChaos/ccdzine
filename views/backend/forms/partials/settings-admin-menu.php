<?php
/**
 * Form fields for admin settings menu tab
 *
 * @package    CCDzine
 * @subpackage Views
 * @category   Forms
 * @since      1.0.0
 */

namespace CCDzine\Views\Admin;
use CCDzine\Classes\Admin as Admin;


settings_fields( 'ccd-site-admin-menu' );
do_settings_sections( 'ccd-site-admin-menu' );

