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

?>
<div>
	<?php do_action( 'ccd_before_content_settings' ); ?>
	<?php
	settings_fields( 'content-settings' );
	do_settings_sections( 'content-settings' );
	?>
	<?php do_action( 'ccd_after_content_settings' ); ?>
</div>
