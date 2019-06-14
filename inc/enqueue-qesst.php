<?php
/**
 * Understrap enqueue scripts
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'understrap_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function understrap_scripts() {
		// Get the theme data.
		$the_theme     = wp_get_theme();
		$theme_version = $the_theme->get( 'Version' );

		$css_version = $theme_version . '.' . filemtime( get_template_directory() . '/css/theme.css' );
        wp_enqueue_style( 'understrap-styles', get_template_directory_uri() . '/css/theme.css', array(), $css_version );
        wp_enqueue_style( 'qesst-googlefonts', '//fonts.googleapis.com/css?family=Montserrat:300,400,500,700,900|Open+Sans:400,700', array() );

		wp_enqueue_script( 'jquery' );

		$js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/theme.min.js' );
        wp_enqueue_script( 'understrap-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $js_version, true );
        wp_enqueue_script( 'font-awesome-five', get_template_directory_uri() . '/vendor/font-awesome/js/all.min.js', array(), '5.8.1', true );
		wp_enqueue_script( 'typeit-js', 'https://cdn.jsdelivr.net/npm/typeit@6.0.3/dist/typeit.min.js' , array('jquery'), null, false );
		wp_enqueue_script( 'typeit-custom', get_template_directory_uri() . '/js/custom.js' , array(), null, false );

        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
} // endif function_exists( 'understrap_scripts' ).

add_action( 'wp_enqueue_scripts', 'understrap_scripts' );
