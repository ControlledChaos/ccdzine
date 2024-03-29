<?php
/**
 * Sample plugin
 *
 * Included for demonstration of bundling a plugin in the CCDzine plugin.
 *
 * @package  CCDzine
 * @category Core
 * @since    1.0.0
 *
 * Plugin Name:  Sample Plugin
 * Description:  Included for demonstration of bundling a plugin in the CCDzine plugin.
 * Version:      0.0.1
 * Text Domain:  sample
 */

function ccd_sample_plugin_admin_notice() {

	?>
		<div id="sample-plugin-notice" class="notice notice-error">
			<?php echo sprintf(
				'<p><icon class="dashicons dashicons-warning" style="color: #dc3232;"></icon> %s</p>',
				__( 'The bundled sample plugin is loaded!', 'sample' )
			); ?>
		</div>
	<?php
}
add_action( 'admin_notices', 'ccd_sample_plugin_admin_notice' );
