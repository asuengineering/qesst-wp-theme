<?php
/**
 * Sidebars that present themselves as cards for use with full width ribbon pages.
 */


$sidebar_id = carbon_get_the_post_meta('qesst_custom_sidebar');

if ( is_active_sidebar( $sidebar_id ) ) { 
	dynamic_sidebar( $sidebar_id );
}




