<?php
/**
 * Output of the Manage Website page
 *
 * @package    CCDzine
 * @subpackage Views
 * @category   Admin
 * @since      1.0.0
 */

use CCDzine\Classes\Admin as Admin;

// Instance of the Manage_Website_Page class.
$page = new Admin\Manage_Website_Page;

?>
<div class="wrap manage-website">

	<?php
	printf(
		'<h1>%s</h1>',
		__( $page->heading(), 'ccdzine' )
	);

	printf(
		'<p class="description">%s</p>',
		__( $page->description(), 'ccdzine' )
	);
	?>

	<hr />

	<!-- Further development of this page is forthcoming. -->

</div>
