<?php
/**
 * ACF content for sample post type archive
 *
 * @package    CCDzine
 * @subpackage Views
 * @category   Front
 * @since      1.0.0
 */

printf(
	'<p>%s%s</p>',
	__( 'ACF content for archived post #', 'ccdzine' ),
	get_the_ID()
);
