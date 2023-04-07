<?php
/**
 * Add Manage Website page
 *
 * @package    CCDzine
 * @subpackage Classes
 * @category   Admin
 * @since      1.0.0
 */

namespace CCDzine\Classes\Admin;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

class Manage_Website_Page extends Add_Page {

	/**
	 * Constructor method
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {

		if ( current_user_can( 'edit_others_posts' ) ) {
			$page_title  = __( 'Help Managing This Website', 'ccdzine' );
			$menu_title  = __( 'Manage Website', 'ccdzine' );
			$description = __( 'This page provides you with help managing this website.' );
		} else {
			$page_title  = __( 'Help Using This Website', 'ccdzine' );
			$menu_title  = __( 'Website Help', 'ccdzine' );
			$description = __( 'This page provides you with help using this website.' );
		}

		$labels = [
			'page_title'  => $page_title,
			'menu_title'  => $menu_title,
			'description' => $description
		];

		$options = [
			'acf' => [
				'acf_page'   => true,
				'capability' => 'hide_publish_metabox', // Dummy capability.
			],
			'capability'  => 'read',
			'menu_slug'   => 'manage-website',
			'parent_slug' => 'index.php',
			'icon_url'    => 'dashicons-welcome-learn-more',
			'position'    => 1
		];

		parent :: __construct(
			$labels,
			$options,
			$priority
		);
	}

	/**
	 * Callback function
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function content_callback() {
		include_once CCD_PATH . 'views/backend/pages/manage-website.php';
	}

	/**
	 * Page content
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function page_content() {

		if ( current_user_can( 'develop' ) ) {
			$page_message = sprintf(
				'<h2 style="padding: 0;">%s</h2>',
				__( 'Developer Notice', 'ccdzine' )
			);
			$page_message .= sprintf(
				'<p>%s</p>',
				__( 'This Advanced Custom Fields message field is added via the <code>ACF_Manage_Site</code> class. It is provided as demonstration of adding a field group from the <code>acf_field_groups()</code> method.', 'ccdzine' )
			);
		} elseif ( current_user_can( 'manage_options' ) ) {
			$page_message = sprintf(
				'<h2 style="padding: 0;">%s</h2>',
				__( 'Administrator Notice', 'ccdzine' )
			);
			$page_message .= sprintf(
				'<p>%s</p>',
				__( 'This is a sample page to demonstrate adding a page. Have your website developer add to this page or remove it.', 'ccdzine' )
			);
		} else {
			$page_message = sprintf(
				'<h2 style="padding: 0;">%s</h2>',
				__( 'Nothing to See', 'ccdzine' )
			);
			$page_message .= sprintf(
				'<p>%s</p>',
				__( 'Sorry, this is a sample page to demonstrate adding a page.', 'ccdzine' )
			);
		}
		return $page_message;
	}

	/**
	 * Field groups
	 *
	 * Register field groups for this options page.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function acf_field_groups() {

		if ( function_exists( 'acf_add_local_field_group' ) ) :

			acf_add_local_field_group( [
				'key'    => 'group_6408c44b12845',
				'title'  => __( 'Manage Website', 'ccdzine' ),
				'fields' => [
					[
						'key'               => 'field_6408c48bfd582',
						'label'             => null,
						'name'              => '',
						'aria-label'        => '',
						'type'              => 'message',
						'instructions'      => __( '', 'ccdzine' ),
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'message'   => $this->page_content(),
						'new_lines' => false,
						'esc_html'  => 0,
					],
				],
				'location' => [
					[
						[
							'param'    => 'options_page',
							'operator' => '==',
							'value'    => 'manage-website',
						],
					],
				],
				'menu_order'            => 0,
				'position'              => 'acf_after_title',
				'style'                 => 'seamless',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen'        => '',
				'active'                => true,
				'description'           => __( '', 'ccdzine' ),
				'show_in_rest'          => 0,
				'acfe_display_title'    => '',
				'acfe_autosync'         => [
					0 => 'json',
				],
				'acfe_form' => 0,
				'acfe_meta' => '',
				'acfe_note' => '',
			] );

		endif;
	}
}
