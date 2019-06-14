<?php
/**
 * Understrap - Carbon Fields Additions
 *
 * @package understrap
 */

// ===============================================
// Carbon Fields: Metaboxes for basic page design
// ===============================================

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'asufse_create_carbon_fields' );
function asufse_create_carbon_fields() {

    Container::make( 'post_meta', 'Ribbon Settings' )
        ->where( 'post_type', '=', 'page' )
        ->set_context( 'side' )
        ->set_priority( 'low' )
        ->add_fields( array (
            Field::make( 'image', 'ribbon-background', 'Ribbon Background Image' )
                ->set_value_type( 'url' ),
            Field::make( 'text', 'ribbon-height', 'Ribbon Height (include units)' ),
            Field::make( 'color', 'ribbon-headline-color', 'Headline Color' )
                ->set_default_value('#222222'),
            Field::make( 'color', 'ribbon-content-wrapper-color', 'Content Wrapper BG Color' )
                ->set_default_value('#5c6670')
        ));
    
    Container::make( 'post_meta', 'Sidebar Options' )
        ->where( 'post_type', '=', 'page' )
        ->set_context( 'side' )
        ->set_priority( 'low' )
        ->add_fields( array(
            Field::make( 'sidebar', 'qesst_custom_sidebar', 'Select a Sidebar' )
            ->set_excluded_sidebars( array('footer-left', 'footer-center', 'footer-right') ),
        ));
}

// Filter any created sidebar if it is called in the ribbon page template.
add_filter( 'carbon_fields_sidebar_options', 'asufse_ribbon_sidebar_options', 10, 2 );
function asufse_ribbon_sidebar_options( $sidebar_options, $sidebar_id ) {    
    $sidebar_options = array_merge( $sidebar_options, array(
            'before_widget' => '<section id="%1$s" class="widget card %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h4 class="widget-title card-header text-white bg-secondary">',
            'after_title'   => '</h4>',
        )
    );
    return $sidebar_options;
}