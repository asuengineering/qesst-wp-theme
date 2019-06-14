<?php
/**
 * The sidebar containing the markup for the home page's hero card section.
 * 
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! is_active_sidebar( 'homecards' ) )  {
	return;
} else { 
    echo '<div class="row widget-area" id="homecards" role="complementary">';
    dynamic_sidebar( 'homecards' );
    echo '</div><!-- #homecards, .row -->';
}
