<?php
/**
 * Custom dashboard panel output
 *
 * @package    CCDzine
 * @subpackage Views
 * @category   Widgets
 * @since      1.0.0
 */

/**
 * Panel tabs
 *
 * The customize panel is only available
 * to user who can customize themes.
 */
if ( current_user_can( 'customize' ) ) {
	$customize = sprintf(
        '<li class="content-tab"><a href="%1s"><span class="dashicons dashicons-art"></span> %2s</a></li>',
		'#customize',
       __( 'Customize', 'ccdzine' )
	);
} else {
	$customize = null;
}

$content = sprintf(
	'<li class="content-tab"><a href="%1s"><span class="dashicons dashicons-edit-page"></span> %2s</a></li>',
	'#content',
   __( 'Content', 'ccdzine' )
);

$tabs = apply_filters( 'ccd_dashboard_panel_tabs', [

    // Welcome tab, initially active.
    sprintf(
        '<li class="content-tab active"><a href="%1s"><span class="dashicons dashicons-welcome-learn-more"></span> %2s</a></li>',
        '#welcome',
        __( 'Welcome', 'ccdzine' )
	),
	$content,
	$customize
] );

?>
<div id="dashboard-panel" class="dashboard-panel">
	<div class="admin-tabs" data-tabbed="tabbed" data-tabdeeplinking="false">

		<ul class="admin-tabs-list hide-if-no-js">
			<?php echo implode( $tabs ); ?>
		</ul>
		<?php

		// Welcome tab.
		include_once( CCD_PATH . 'views/backend/widgets/dashboard-tabs/welcome-dashboard-tab' . $acf->suffix() . '.php' );

		// Customize tab.
		if ( current_user_can( 'customize' ) ) {
			include_once( CCD_PATH . 'views/backend/widgets/dashboard-tabs/customize-dashboard-tab' . $acf->suffix() . '.php' );
		}

		// Content tab.
		include_once( CCD_PATH . 'views/backend/widgets/dashboard-tabs/content-dashboard-tab' . $acf->suffix() . '.php' );
		?>
	</div>
</div>
