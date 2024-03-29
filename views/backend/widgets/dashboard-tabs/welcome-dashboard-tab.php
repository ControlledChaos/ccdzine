<?php
/**
 * Welcome dashboard tab
 *
 * @package    CCDzine
 * @subpackage Views
 * @category   Widgets
 * @since      1.0.0
 */

use CCDzine\Users as Users;

// Current user avatar.
$avatar = get_avatar(
	get_current_user_id(),
	64,
	'',
	Users\display_name(),
	[
		'class'         => 'dashboard-panel-avatar alignnone',
		'force_display' => true
		]
);

$get_user_desc = get_user_option( 'description' );
if ( ! empty( $get_user_desc ) || ctype_space( $get_user_desc ) ) {
	$user_desc = wp_trim_words( $get_user_desc, 64, '&hellip;' );
} else {
	$user_desc = __( 'As a user of this website you can include a bio/description which may be displayed to other users or to the public, depending on your user permissions, member plugins, and the active theme.', 'ccdzine' );
}

?>
<div id="welcome" class="tab-content dashboard-panel-content dashboard-welcome-content">

	<?php echo sprintf(
		'<h2>%s %s</h2>',
		__( 'Welcome to', 'ccdzine' ),
		get_bloginfo( 'name' )
	); ?>
	<p class="about-description"><?php _e( 'This dashboard provides quick links and info to help you use this website.', 'ccdzine' ); ?></p>

	<div class="dashboard-panel-column-container">

		<div id="dashboard-get-started" class="dashboard-panel-column">

			<h3><?php _e( 'Your Account', 'ccdzine' ); ?></h3>

			<div class="dashboard-panel-section-intro dashboard-panel-user-greeting">

				<figure>
					<a href="<?php echo admin_url( 'profile.php' ); ?>#avatar-profile-screen" title="<?php _e( 'Your profile avatar', 'ccdzine' ); ?>">
						<?php echo $avatar; ?>
					</a>
					<figcaption class="screen-reader-text"><?php echo Users\display_name(); ?></figcaption>
				</figure>

				<div>
					<?php echo sprintf(
						'<h4>%1s %2s.</h4>',
						__( 'Howdy,', 'ccdzine' ),
						Users\display_name()
					); ?>
					<p class="about-description"><?php _e( 'There are personal options available to you as a registered user of this website.', 'ccdzine' ); ?></p>
					<p class="dashboard-panel-call-to-action"><a class="button button-primary button-hero" href="<?php echo admin_url( 'profile.php' ); ?>"><?php _e( 'Manage Your Profile', 'ccdzine' ); ?></a></p>
					<p class="description"><?php _e( 'Edit your display name, your bio, upload an avatar, & mane your user options.', 'ccdzine' ); ?></p>
				</div>

			</div>
		</div>

		<div id="dashboard-next-steps" class="dashboard-panel-column">

			<h3><?php _e( 'Bio/Description', 'ccdzine' ); ?></h3>

			<?php printf(
				'<p>%s</p>',
				$user_desc
			); ?>
			<p><a href="<?php echo admin_url( 'profile.php' ); ?>#wp-description-wrap"><?php _e( 'Edit Bio', 'ccdzine' ); ?></a></p>
		</div>

		<div id="dashboard-more-actions" class="dashboard-panel-column dashboard-panel-last">

			<h3><?php _e( 'Account Options', 'ccdzine' ); ?></h3>

			<ul class="ds-widget-details-list ds-widget-options-list">
				<li><?php _e( 'User roles:', 'ccdzine' ); ?> <strong><?php echo Users\user_roles(); ?></strong></li>
				<li><?php _e( 'Account email:', 'ccdzine' ); ?> <strong><?php echo Users\email(); ?></strong></li>
				<li><?php _e( 'Your website:', 'ccdzine' ); ?> <strong><?php echo Users\website(); ?></strong></li>
				<li><?php _e( 'Admin color scheme:', 'ccdzine' ); ?> <a href="<?php echo admin_url( 'profile.php' ); ?>#color-picker"><strong><?php echo Users\get_user_color_scheme(); ?></strong></a></li>
				<li><?php _e( 'Frontend toolbar:', 'ccdzine' ); ?> <a href="<?php echo admin_url( 'profile.php' ); ?>#admin_bar_front"><strong><?php echo Users\toolbar(); ?></strong></a></li>
			</ul>
		</div>

	</div>
</div>
