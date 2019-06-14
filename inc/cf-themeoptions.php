<?php
/**
 * Understrap - Carbon Fields Additions
 *
 * @package understrap
 */

// ===============================================
// Carbon Fields: Theme Options Panel for Home Page Elements
// ===============================================

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'asufse_create_carbon_theme_options' );
function asufse_create_carbon_theme_options() {

    Container::make( 'theme_options', __( 'QESST Home Page Settings' ) )
        ->set_page_menu_title( 'Home Page Options' )
        ->set_page_parent('options-general.php' ) // reference to a top level container
        ->add_fields( array(

            Field::make( 'image', 'homeoption_typed_background', 'Background image for typed feature')
                ->set_width(50)
                ->set_value_type( 'url' )
                ->set_help_text('The top of the home page features large background image behind the typed messages and quick-reference cards. You can change that image here.'),
            
            Field::make( 'color', 'homeoption_typed_bgcolor', 'Background color for typed feature')
                ->set_width(50)
                ->set_help_text('If no background image is selected, you may instead choose a solid color as the background of the section.'),

            Field::make( 'text', 'homeoption_typed_static', 'Static fragment for type-ahead feature.')
                ->set_help_text('This sentence fragment will remain static on the home page display.'),
            
            Field::make( 'complex', 'homeoption_typed_messages', __( 'Dynamic fragments for type-ahead feature.' ) )
                ->set_help_text('Add text fragments here to have them dynamically typed on the home page. Messages take the form of {static text} {dynamic text}.')
                ->set_layout( 'tabbed-vertical' )
                ->add_fields( array(
                    Field::make( 'text', 'homeoption_message', __( 'Typed Message' ) ),
                ) )
        ) );
}