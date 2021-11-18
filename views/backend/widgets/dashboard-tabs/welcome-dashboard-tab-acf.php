<?php
/**
 * ACF welcome dashboard tab
 *
 * @package    CCDzine
 * @subpackage Views
 * @category   Widgets
 * @since      1.0.0
 */

// Current user avatar.
$avatar = get_avatar(
	get_current_user_id(),
	64,
	'',
	$user->display_name(),
	[
		'class'         => 'dashboard-panel-avatar alignnone',
		'force_display' => true
		]
);

?>
<div id="welcome" class="dashboard-panel-content dashboard-welcome-content">

	<?php echo sprintf(
		'<h2>%s %s</h2>',
		__( 'Welcome to', 'ccdzine' ),
		get_bloginfo( 'name' )
	); ?>
	<p class="about-description"><?php _e( 'We\'ve assembled some links to get you started.', 'ccdzine' ); ?></p>

	<div class="dashboard-panel-column-container">

		<div id="dashboard-get-started" class="dashboard-panel-column">

			<h3><?php _e( 'Your Account', 'ccdzine' ); ?></h3>

			<div class="dashboard-panel-section-intro dashboard-panel-user-greeting">

				<figure>
					<a href="<?php echo admin_url( 'profile.php' ); ?>#avatar-profile-screen" title="<?php _e( 'Your profile avatar', 'ccdzine' ); ?>">
						<?php echo $avatar; ?>
					</a>
					<figcaption class="screen-reader-text"><?php echo $user->display_name(); ?></figcaption>
				</figure>

				<div>
					<?php echo sprintf(
						'<h4>%1s %2s.</h4>',
						__( 'Howdy,', 'ccdzine' ),
						$user->display_name()
					); ?>
					<p class="about-description"><?php _e( 'This site may display your profile in posts that you author. And there are personal options available for using this site, such as editor preferences and color schemes.', 'ccdzine' ); ?></p>
					<p class="dashboard-panel-call-to-action"><a class="button button-primary button-hero" href="<?php echo admin_url( 'profile.php' ); ?>"><?php _e( 'Manage Your Profile', 'ccdzine' ); ?></a></p>
					<p class="description"><?php _e( 'Edit your display name & bio.', 'ccdzine' ); ?></p>
				</div>

			</div>
		</div>

		<div id="dashboard-next-steps" class="dashboard-panel-column">

			<h3><?php _e( 'Bio/Description', 'ccdzine' ); ?></h3>

			<p><?php echo wp_trim_words( get_user_option( 'description' ), 64, '&hellip;' ); ?></p>
			<p><a href="<?php echo admin_url( 'profile.php' ); ?>#wp-description-wrap"><?php _e( 'Edit', 'ccdzine' ); ?></a></p>
		</div>

		<div id="dashboard-more-actions" class="dashboard-panel-column dashboard-panel-last">

			<h3><?php _e( 'Account Options', 'ccdzine' ); ?></h3>

			<ul class="ds-widget-details-list ds-widget-options-list">
				<li><?php _e( 'User roles:', 'ccdzine' ); ?> <strong><?php echo $user->user_roles(); ?></strong></li>
				<li><?php _e( 'Account email:', 'ccdzine' ); ?> <strong><?php echo $user->email(); ?></strong></li>
				<li><?php _e( 'Your website:', 'ccdzine' ); ?> <strong><?php echo $user->website(); ?></strong></li>
				<li><?php _e( 'Admin color scheme:', 'ccdzine' ); ?> <a href="<?php echo admin_url( 'profile.php' ); ?>#color-picker"><strong><?php echo $colors->get_user_color_scheme(); ?></strong></a></li>
				<li><?php _e( 'Frontend toolbar:', 'ccdzine' ); ?> <a href="<?php echo admin_url( 'profile.php' ); ?>#admin_bar_front"><strong><?php echo $user->toolbar(); ?></strong></a></li>
			</ul>
		</div>

	</div>
</div>
