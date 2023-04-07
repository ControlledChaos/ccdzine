<?php
/**
 * Form fields for developer user settings tab
 *
 * @package    CCDzine
 * @subpackage Views
 * @category   Forms
 * @since      1.0.0
 */

namespace CCDzine\Views\Admin;

?>
<div>
	<?php do_action( 'ccd_before_dev_user_tools_settings' ); ?>
	<table class="form-table">
		<?php
		settings_fields( 'developer-tools' );
		do_settings_fields( 'developer-tools', 'ccd-options-developer-users' );
		?>
	</table>
	<?php do_action( 'ccd_after_dev_user_tools_settings' ); ?>
</div>
