<?php
/**
 * Form fields for admin settings header tab
 *
 * @package    CCDzine
 * @subpackage Views
 * @category   Forms
 * @since      1.0.0
 */

namespace CCDzine\Views\Admin;

?>
<div>
	<?php do_action( 'ccd_before_admin_header_settings' ); ?>
	<table class="form-table">
		<?php
		settings_fields( 'options-admin' );
		do_settings_fields( 'options-admin', 'ccd-settings-section-admin-header' );
		?>
	</table>
	<?php do_action( 'ccd_after_admin_header_settings' ); ?>
</div>
