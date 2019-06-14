<?php
/**
 * The sidebar containing the markup for the home page's main content section.
 * 
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! is_active_sidebar( 'homecontent' ) )  {
	return;
} else { 
    echo '<div class="about">';
    dynamic_sidebar( 'homecontent' );
    echo '</div><!-- .about -->';
}
