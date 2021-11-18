<?php
/**
 * Content settings sample tab
 *
 * @package    CCDzine
 * @subpackage Views
 * @category   Forms
 * @since      1.0.0
 */

namespace CCDzine\Views\Admin;
use CCDzine\Classes\Admin as Admin;

// Instance of the Manage_Website_Page class.
$page = new Admin\Content_Settings;

?>
<div>
	<p><?php _e( 'Sample tab content.', 'ccdzine' ); ?></p>
</div>
