<?php
/**
 * Content dashboard tab
 *
 * @package    CCDzine
 * @subpackage Views
 * @category   Widgets
 * @since      1.0.0
 */

 use CCDzine\Users as Users;

use function CCDzine\Admin\Dashboard\post_types_list;
use function CCDzine\Admin\Dashboard\taxonomies_list;

$images = get_posts( [
	'post_type'      => 'attachment',
	'post_parent'    => null,
	'post_mime_type' => 'image',
	'post_status'    => null,
	'numberposts'    => 1,
	'order'          => 'DESC'
] );

?>
<div id="content" class="tab-content dashboard-panel-content dashboard-content-content" style="display: none;">

	<h2><?php _e( 'Manage Website Content', 'ccdzine' ); ?></h2>
	<p class="description"><?php _e( 'Manage blog posts and static pages, upload images, add helpful widgets&hellip;', 'ccdzine' ); ?></p>

	<div class="dashboard-panel-column-container">

		<div class="dashboard-panel-column">

			<h3><?php _e( 'Media Library', 'ccdzine' ); ?></h3>

			<div class="dashboard-panel-section-intro dashboard-panel-content-greeting">
				<?php if ( $images ) : ?>
					<?php foreach ( $images as $image ) :
					$thumb = wp_get_attachment_image_src( $image->ID, 'thumbnail' );
					$src   = $thumb[0];
					?>
						<figure>
							<a href="<?php echo esc_attr( admin_url( 'upload.php' ) ); ?>"><img class="avatar" src="<?php echo esc_attr( $src ); ?>" alt="<?php echo esc_attr( apply_filters( 'the_title', $image->post_title ) ); ?>" width="64" height="64"></a>
							<figcaption class="screen-reader-text"><?php echo apply_filters( 'the_title', $image->post_title ); ?></figcaption>
						</figure>
					<?php endforeach; ?>
				<?php endif; ?>
				<div>
					<h4><?php _e( 'Images & Video', 'ccdzine' ); ?></h4>
					<p class="about-description"><?php _e( 'Manage the site library of visual media as well as audio files & documents.', 'ccdzine' ); ?></p>

					<p class="dashboard-panel-call-to-action"><a class="button button-primary button-hero load-customize hide-if-no-customize" href="<?php echo esc_url( admin_url( 'upload.php' ) ); ?>"><?php _e( 'Manage Media Library' ); ?></a></p>
					<p class="description"><?php _e( 'Add media files to the site library.', 'ccdzine' ); ?></p>
				</div>
			</div>
		</div>

		<div class="dashboard-panel-column">

			<h3><?php _e( 'Content Summary', 'ccdzine' ); ?></h3>

			<div id="dashboard_right_now" style="padding: 1rem 0;">
				<?php post_types_list(); ?>
				<hr />
				<?php taxonomies_list(); ?>
			</div>
		</div>

		<div class="dashboard-panel-column dashboard-panel-last">

			<h3><?php _e( 'Manage Content', 'ccdzine' ); ?></h3>

			<form role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" target="_blank" rel="nofollow noreferrer noopener">
				<?php $content_id = 'site-' . get_current_blog_id() . '-dashboard-search-content'; ?>
				<p class="ccd-dashboard-search-fields">
					<label class="screen-reader-text" for="<?php echo $content_id; ?>" aria-label="<?php _e( 'Search Content', 'ccdzine' ); ?>"><?php _e( 'Search Content', 'ccdzine' ); ?></label>

					<input type="search" name="s" id="<?php echo $content_id; ?>" aria-labelledby="<?php _e( 'Search Content', 'ccdzine' ); ?>" value="<?php echo get_search_query(); ?>" autocomplete="off" placeholder="<?php _e( 'Search Content', 'ccdzine' ); ?>" aria-placeholder="<?php _e( 'Enter content search terms', 'ccdzine' ); ?>" />
					<?php submit_button( __( 'Submit', 'ccdzine' ), '', false, false, [ 'id' => 'submit-' . $content_id ] ); ?>
				</p>
			</form>

			<ul>
				<li><?php printf( '<a href="%s" class="welcome-icon welcome-content-settings">' . __( 'Website Content', 'ccdzine' ) . '</a>', admin_url( 'admin.php?page=content-settings' ) ); ?></li>

				<?php if ( current_user_can( 'switch_themes' ) && current_theme_supports( 'menus' ) ) : ?>
				<li><?php printf( '<a href="%s" class="welcome-icon welcome-menus">' . __( 'Manage menus', 'ccdzine' ) . '</a>', admin_url( 'nav-menus.php' ) ); ?></li>
			<?php endif; ?>

			<?php if ( current_user_can( 'switch_themes' ) && current_theme_supports( 'widgets' ) ) : ?>
				<li><?php printf( '<a href="%s" class="welcome-icon welcome-widgets">' . __( 'Manage widgets', 'ccdzine' ) . '</a>', admin_url( 'widgets.php' ) ); ?></li>
			<?php endif; ?>

			<?php if ( current_user_can( 'edit_posts' ) ) : ?>
				<li><?php printf( '<a href="%s" class="welcome-icon welcome-comments">' . __( 'Manage Comments', 'ccdzine' ) . '</a>', admin_url( 'edit-comments.php' ) ); ?></li>
			<?php endif; ?>
			</ul>
		</div>
	</div>
</div>
