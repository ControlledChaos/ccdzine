<?php
/**
 * Content settings intro tab
 *
 * @package    CCDzine
 * @subpackage Views
 * @category   Forms
 * @since      1.0.0
 */

namespace CCDzine\Views\Admin\Content_Settings_Intro;

function content_settings_intro( $content = '' ) {

	// If ACF and ACF Extended are active.
	if ( current_user_can( 'develop' ) && ( class_exists( 'acf' ) && class_exists( 'acfe' ) ) ) {

		$content = sprintf(
			'<p>%s</p>',
			__( 'You are seeing this content because you have the user role of Developer, because Advanced Custom Fields and Advanced Custom Fields: Extended are both active.', 'ccdzine' )
		);

	} elseif ( current_user_can( 'develop' ) && class_exists( 'acf' ) ) {

		$content = sprintf(
			'<p>%s</p>',
			__( 'You are seeing this content because you have the user role of Developer, and because Advanced Custom Fields is active.', 'ccdzine' )
		);

	} elseif ( current_user_can( 'manage_options' ) ) {

		$content = sprintf(
			'<p>%s</p>',
			__( 'You are seeing this content because you have the user role of Administrator.', 'ccdzine' )
		);

	} else {

		$content = sprintf(
			'<p>%s</p>',
			__( 'This is the default content for this intro, available to the lowest user capacity of this page.', 'ccdzine' )
		);
	}

	echo apply_filters( 'ccd_content_settings_intro_text', $content );
}
add_action( 'ccd_content_settings_intro', __NAMESPACE__ . '\content_settings_intro' );

?>
<div>
	<?php do_action( 'ccd_before_content_settings_intro' ); ?>
	<p class="description"><?php _e( 'Change this intro as needed for your project.', 'ccdzine' ); ?></p>
	<?php do_action( 'ccd_content_settings_intro' ); ?>
	<?php do_action( 'ccd_after_content_settings_intro' ); ?>
</div>
