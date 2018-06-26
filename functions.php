<?php

function asufse_theme_enqueue_items() {
    wp_enqueue_style( 'materialwp-qesst-googlefonts', '//fonts.googleapis.com/css?family=Montserrat:700|Open+Sans|Material+Icons', array() );
    wp_enqueue_style( 'materialwp-qesst-child-style', get_stylesheet_directory_uri() . '/style.css', array() );
    
    wp_deregister_script('jquery');
    
    wp_register_script( 'fontawesome', get_stylesheet_directory_uri() . '/vendor/fontawesome-pro/svg-with-js/js/fontawesome-all.min.js' , array() , null, false );
    wp_register_script('jquery', "https://code.jquery.com/jquery-1.12.4.min.js", array(), null, false);
    wp_register_script( 'typeit-js', 'https://cdn.jsdelivr.net/npm/typeit@5.6.0/dist/typeit.min.js' , array(), null, false );
    wp_register_script( 'materialwp-qesst-custom-js', get_stylesheet_directory_uri() . '/js/custom.js' , array('jquery') , null, false );

    wp_enqueue_script ('fontawesome');
    wp_enqueue_script ('jquery');
    wp_enqueue_script ('typeit-js');
    wp_enqueue_script ('materialwp-qesst-custom-js');
}
add_action( 'wp_enqueue_scripts', 'asufse_theme_enqueue_items' );

function asufse_theme_deregister_parent_styles() {
    // Deregister the parent CSS files. Higher priority than the enqueue above.
    wp_dequeue_style( 'materialwp-style');
    wp_dequeue_style( 'materialwp-material-icons');
}
    
add_action( 'wp_enqueue_scripts', 'asufse_theme_deregister_parent_styles', 999 );

// Unregister Parent Theme Sidebar (Need better markup)
function asufse_unregister_primary_sidebar(){
	unregister_sidebar( 'sidebar-1' );
}
add_action( 'widgets_init', 'asufse_unregister_primary_sidebar', 11 );

// Register Additional Sidebars
function asufse_additional_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Footer (Left)', 'textdomain' ),
        'id'            => 'footer-left',
        'description'   => __( 'The global footer has three columns. This is the left column.', 'textdomain' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer (Center)', 'textdomain' ),
        'id'            => 'footer-center',
        'description'   => __( 'The global footer has three columns. This is the center column.', 'textdomain' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer (Right)', 'textdomain' ),
        'id'            => 'footer-right',
        'description'   => __( 'The global footer has three columns. This is the right column.', 'textdomain' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Ribbon Pages', 'textdomain' ),
        'id'            => 'ribbon-sidebar',
        'description'   => __( 'Specific widget area for pages that use the ribbon page template.', 'textdomain' ),
        'before_widget' => '<section id="%1$s" class="widget card %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title card-header">',
		'after_title'   => '</h4>',
    ) );

	register_sidebar( array(
		'name'          => esc_html__( 'Posts Sidebar', 'materialwp' ),
		'id'            => 'posts-sidebar',
		'description'   => esc_html__( 'Add your widgets here. They will display on the left side of a standard post.', 'materialwp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}

add_action( 'widgets_init', 'asufse_additional_widgets_init' );

function asufse_add_excerpt_support_for_pages() {
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'asufse_add_excerpt_support_for_pages' );

// Carbon Fields
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'asufse_create_carbon_fields' );
function asufse_create_carbon_fields() {

    Container::make( 'post_meta', 'Ribbon Settings' )
        ->where( 'post_type', '=', 'page' )
        ->add_fields( array (
            Field::make( 'image', 'ribbon-background', 'Ribbon Background Image' )
                ->set_value_type( 'url' ),
            Field::make( 'text', 'ribbon-height', 'Ribbon Height (include units)' ),
            Field::make( 'color', 'ribbon-headline-color', 'Headline Color' )
                ->set_default_value('#222222')
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


add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once( 'vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}

// Author information removed from post meta printing. 
function materialwp_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( '%s', 'post date', 'materialwp' ), $time_string
	);

	echo '<span class="posted-on"><i class="material-icons">access_time</i>' . $posted_on . '</span>'; // WPCS: XSS OK.

	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'materialwp' ) );
		if ( $categories_list && materialwp_categorized_blog() ) {
			printf( '<span class="cat-links"><i class="material-icons">folder</i>' . esc_html__( '%1$s', 'materialwp' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link"><i class="material-icons">comment</i>';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'materialwp' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

}