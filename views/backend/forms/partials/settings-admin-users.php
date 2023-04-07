<?php
/**
 * Form fields for admin settings users tab
 *
 * @package    CCDzine
 * @subpackage Views
 * @category   Forms
 * @since      1.0.0
 */

namespace CCDzine\Views\Admin;

?>
<div>
	<?php do_action( 'ccd_before_admin_users_settings' ); ?>
	<table class="form-table">
		<?php
		settings_fields( 'options-admin' );
		do_settings_fields( 'options-admin', 'ccd-settings-section-admin-users' );
		?>
	</table>
	<?php do_action( 'ccd_after_admin_users_settings' ); ?>
</div>
