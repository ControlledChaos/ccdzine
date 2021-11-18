<?php
/**
 * ACF content for singular sample post type
 *
 * @package    CCDzine
 * @subpackage Views
 * @category   Front
 * @since      1.0.0
 */

printf(
	'<p>%s%s</p>',
	__( 'ACF content for post #', 'ccdzine' ),
	get_the_ID()
);
