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

use CCDzine\Classes\Settings as Settings;

$settings = new Settings\Settings_Fields_Admin_Menu;

settings_fields( 'options-admin' );

?>
<div>
	<?php do_action( 'ccd_before_admin_menu_settings' ); ?>
	<table class="form-table" role="presentation">
		<tbody>
			<tr class="admin-field">
				<th scope="row"><?php _e( 'Link Positions', 'ccdzine' ); ?></th>
				<td>
					<fieldset>
						<legend class="screen-reader-text"><?php _e( 'Manage Link Position Options', 'ccdzine' ); ?></legend>
						<?php $settings->admin_menu_menus_top_callback(); ?><br />
						<?php $settings->admin_menu_widgets_top_callback(); ?>
					</fieldset>
				</td>
			</tr>
		</tbody>
	</table>
	<?php do_action( 'ccd_after_admin_menu_settings' ); ?>
</div>

