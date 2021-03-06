<?php
/**
 * Twitter card meta tags
 *
 * @link https://developer.twitter.com/en/docs/tweets/optimize-with-cards/overview/markup.html
 *
 * @package    CCDzine
 * @subpackage Views
 * @category   Front
 * @since      1.0.0
 */

// Alias namespaces.
use CCDzine\Classes\Front\Meta as Meta;

?>
<!-- Twitter Card meta -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:domain" content="<?php echo esc_attr( esc_url( home_url() ) ); ?>" />
<meta name="twitter:site" content="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" />
<meta name="twitter:url" content="<?php echo esc_attr( esc_url( Meta\data()->url() ) ); ?>" />
<meta name="twitter:title" content="<?php echo esc_attr( Meta\data()->title() ); ?>" />
<meta name="twitter:description" content="404 <?php echo esc_attr( Meta\data()->description() ); ?>" />
<meta name="twitter:image:src" content="<?php echo esc_attr( Meta\data()->image() ); ?>" />
<?php echo "\r"; ?>
