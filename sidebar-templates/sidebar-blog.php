<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! is_active_sidebar( 'left-sidebar' ) )  {
	return;
} else { 
    echo '<div class="order-last order-lg-first col-lg-3 widget-area" id="left-sidebar" role="complementary">';
    
    if ((! is_archive()) && ( has_post_thumbnail() )) {
        echo '<aside id="featured-image">';
        the_post_thumbnail('large');
        echo '</aside>';
    } elseif (! is_archive())  {
        echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) 
            . '/images/thumbnail-default.jpg" />';
    } else {
        // do nothing
    }

    dynamic_sidebar( 'left-sidebar' );
    echo '</div><!-- #left-sidebar -->';
}
