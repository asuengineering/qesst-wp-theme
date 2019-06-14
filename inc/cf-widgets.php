<?php
/**
 * Understrap - Carbon Fields Additions
 *
 * @package understrap
 */

// ===============================================
// Carbon Fields: Super Footer Branded Logo
// ===============================================
use Carbon_Fields\Widget;
use Carbon_Fields\Field;

class FootLeftSocialMedia extends Widget {
    // Register widget function. Must have the same name as the class
    function __construct() {
        $this->setup( 'footleft-social-media', 'QESST Logo + Social Media', 'Displays the logo from the navbar, a small body of text and social media icons.', array(
            Field::make( 'image', 'footleft-image', 'Logo for website')->set_value_type( 'url' ),
            Field::make ( 'text', 'footleft-head', 'Header text under logo')->set_help_text('Automatically wrapped in an H3 tag'),
            Field::make( 'textarea', 'footleft-summary', 'Summary (Accepts HTML)' )->set_help_text('Markup includes opening and closing paragraph tags.'),
            Field::make( 'text', 'sm-facebook', 'Facebook' ),
            Field::make( 'text', 'sm-twitter', 'Twitter' ),
            Field::make( 'text', 'sm-linkedin', 'LinkedIn' ),
            Field::make( 'text', 'sm-youtube', 'YouTube' ),
            Field::make( 'text', 'sm-vimeo', 'Vimeo' ),
            Field::make( 'text', 'sm-instagram', 'Instagram' ),
            Field::make( 'text', 'sm-pinterest', 'Pinterest' ),
            Field::make( 'text', 'sm-github', 'GitHub' ),
            Field::make( 'text', 'sm-rss', 'RSS' ),
            Field::make( 'text', 'sm-wordpress', 'Login URL (WordPress)' ),
        ) );
    }
    // Called when rendering the widget in the front-end
    function front_end( $args, $instance ) {

        if (! empty($instance['footleft-image'])) {

            $logourl = $instance['footleft-image'];

            echo '<div><a class="footer-logo" href="' . get_site_url() . '" title="QESST">';
            echo '<img src="' . $logourl . '" alt="QESST Logo" />';
            echo '</a></div>';
        }

        if (! empty($instance['footleft-head'])) {
            echo '<h4>' . $instance['footleft-head'] . '</h4>';
        }

        if (! empty($instance['footleft-summary'])) {
            echo '<p>' . $instance['footleft-summary'] . '</p>';
        }

        $channel = array(
            'sm-facebook' => 'fab fa-facebook-square', 
            'sm-twitter' => 'fab fa-twitter-square', 
            'sm-linkedin' => 'fab fa-linkedin',
            'sm-youtube' => 'fab fa-youtube-square',
            'sm-vimeo' => 'fab fa-vimeo', 
            'sm-instagram' => 'fab fa-instagram', 
            'sm-pinterest' => 'fab fa-pinterest-square', 
            'sm-github' => 'fab fa-github-square', 
            'sm-rss' => 'fas fa-rss-square', 
            'sm-wordpress' => 'fab fa-wordpress',
        );

        $iconlist = '';

        foreach ($channel as $key => $value) {
            if (! empty($instance[$key])) {
                $iconlist .= '<li><a href="'. $instance[$key] . '" target="_blank"><i class="' . $value . '"></i></a></li>';
            }
        }

        if (!empty($iconlist)) {
            echo '<ul class="social-icons">';
            echo $iconlist;
            echo '</ul>';
        }

    }
}

class HomePageCards extends Widget {
    // Register widget function. Must have the same name as the class
    function __construct() {
        $this->setup( 'homepage-cards', 'QESST Home Page Cards', 'Each widget represents one card. Deploy on the home page card widget area. ', array(
            Field::make( 'image', 'homecard-image', 'Featured image for the card')
                ->set_value_type( 'id'),
            Field::make ( 'text', 'homecard-head', 'Header text for the card'),
            Field::make ( 'textarea', 'homecard-desc', 'Description (body) text for the card')
                ->set_help_text('HTML values permitted in text field.')
                ->set_rows(3),
            Field::make ( 'text', 'homecard-primary-button-label', 'Label for the primary button'),
            Field::make ( 'text', 'homecard-primary-button-url', 'URL for the primary button'),
            Field::make ( 'text', 'homecard-secondary-button-label', 'Label for the secondary button'),
            Field::make ( 'text', 'homecard-secondary-button-url', 'URL for the secondary button'),
            Field::make ( 'radio', 'homecard-image-layout', 'Image on the right or left?')
                ->set_default_value( 'right' )
                ->set_options( array(
                    'right' => 'Right',
                    'left' => 'Left'
                )),
            Field::make ( 'checkbox', 'homecard-newrow', 'Force this card to be on a new row?')
                ->set_option_value( 'yes' )
                ->set_default_value(''),
        ) );
    }
    
    // Called when rendering the widget in the front-end
    function front_end( $args, $instance ) {
        
        // Grab values, load variables.
        $cardimage = '';
        $cardlayout = '';
        $cardhead = '';
        $cardbody = '';
        $cardprimebutton = '';
        $cardsecondbutton = '';
        $cardnewrow = '';

        if (! empty($instance['homecard-image'])) {
            $cardimage = wp_get_attachment_image( $instance['homecard-image'], array('400', '400'), "", array( "class" => "img-responsive" ) );
            $cardimage = '<figure class="card-image">' . $cardimage . '</figure>';

            // Now that we know there IS an image, grab the layout too.
            if ( $instance['homecard-image-layout'] == 'left') {
                $cardlayout = 'image-left';
            } else {
                // Default choice
                $cardlayout = 'image-right';
            }
        } else {
            // There's no image selected.
            $cardlayout = 'image-none';
        }

        if (! empty($instance['homecard-head'])) {
            $cardhead = '<h5 class="card-head">' . $instance['homecard-head'] . '</h5>';
        }

        if (! empty($instance['homecard-desc'])) {
            $cardbody = '<p>' . $instance['homecard-desc'] . '</p>';
        }

        if (! empty($instance['homecard-primary-button-url'])) {
            $cardprimebutton = '<a href="' . $instance['homecard-primary-button-url'] . '" class="btn btn-primary">' . $instance['homecard-primary-button-label'] . '</a>';
        }

        if (! empty($instance['homecard-secondary-button-url'])) {
            $cardsecondbutton = '<a href="' . $instance['homecard-secondary-button-url'] . '" class="btn btn-outline-secondary">' . $instance['homecard-secondary-button-label'] . '</a>';
        }

        if ( $instance['homecard-newrow'] == 'yes') {
            $cardnewrow = '<div class="w-100 mb-5"></div>';
        }

        // Output
        echo $cardnewrow;
        echo '<div class="col-lg">';
        echo '<div class="card herocard-widget p-0 ' . $cardlayout . '">';
        echo $cardimage;
        echo '<div class="card-text">' . $cardhead . $cardbody . $cardprimebutton . $cardsecondbutton . '</div>';
        echo '</div>';
        echo '</div>';

    }
}

class HomePageContent extends Widget {
    // Register widget function. Must have the same name as the class
    function __construct() {
        $this->setup( 'homepage-content-rows', 'QESST Home Page Content Rows', 'Each widget represents one full row, stacked vertically between the hero and the recent posts feature.', array(
            Field::make( 'image', 'homecontent-image', 'Featured image for the row')
                ->set_value_type( 'id'),
            Field::make ( 'text', 'homecontent-head', 'Header text for the text section.')
                ->set_help_text('Will be automatically typed out when presented on the home page.'),
            Field::make ( 'textarea', 'homecontent-desc', 'Description (body) text for the section')
                ->set_help_text('HTML values permitted in text field.')
                ->set_rows(3),
            Field::make ( 'text', 'homecontent-primary-button-label', 'Label for the primary button'),
            Field::make ( 'text', 'homecontent-primary-button-url', 'URL for the primary button'),
            Field::make ( 'text', 'homecontent-secondary-button-label', 'Label for the secondary button'),
            Field::make ( 'text', 'homecontent-secondary-button-url', 'URL for the secondary button'),
            Field::make ( 'radio', 'homecontent-image-layout', 'Image on the right or left?')
                ->set_default_value( 'right' )
                ->set_options( array(
                    'right' => 'Right',
                    'left' => 'Left'
                )),
        ) );
    }
    
    // Called when rendering the widget in the front-end
    function front_end( $args, $instance ) {
        
        // Grab values, load variables.
        $contentimage = '';
        $contentlayout = '';
        $contenthead = '';
        $contentbody = '';
        $contentprimebutton = '';
        $contentsecondbutton = '';

        if (! empty($instance['homecontent-image'])) {
            $contentimage = wp_get_attachment_image( $instance['homecontent-image'], 'full' );

            // Now that we know there IS an image, grab the layout too.
            if ( $instance['homecontent-image-layout'] == 'left') {
                $contentimage = '<div class="col-lg-6">' . $contentimage . '</div>';
            } else {
                // Reverse the image layout on mobile to keep the layout consistent.
                $contentimage = '<div class="col-lg-6 order-lg-last">' . $contentimage . '</div>';
            }
        }

        if (! empty($instance['homecontent-head'])) {
            $contenthead = '<h2 class="typed-normal">' . $instance['homecontent-head'] . '</h2>';
        }

        if (! empty($instance['homecontent-desc'])) {
            $contentbody = '<p>' . $instance['homecontent-desc'] . '</p>';
        }

        if (! empty($instance['homecontent-primary-button-url'])) {
            $contentprimebutton = '<a href="' . $instance['homecontent-primary-button-url'] . '" class="btn btn-primary">' . $instance['homecontent-primary-button-label'] . '</a>';
        }

        if (! empty($instance['homecontent-secondary-button-url'])) {
            $contentsecondbutton = '<a href="' . $instance['homecontent-secondary-button-url'] . '" class="btn btn-outline-secondary">' . $instance['homecontent-secondary-button-label'] . '</a>';
        }

        // Output
        echo $contentimage;
        echo '<div class="col-md-6"><div class="padding-extra">';
        echo $contenthead . $contentbody . '<p>' . $contentprimebutton . $contentsecondbutton . '</p>';
        echo '</div></div>';

    }
}


function qesst_load_theme_widgets() {
    register_widget( 'FootLeftSocialMedia' );
    register_widget( 'HomePageCards' );
    register_widget( 'HomePageContent' );
}

add_action( 'widgets_init', 'qesst_load_theme_widgets' );