<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MaterialWP
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118327197-1"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());
	gtag('config', 'UA-118327197-1');
</script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="masthead" class="site-header" role="banner">
	    <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-secondary">
	    	<div class="container">
					<div class="navbar-brand mb-0">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="site-icon">
									<img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/QESST-logo-only-white.png' ?>" alt="QESST Logo" />
							</a>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="site-title">
								<?php bloginfo('name'); ?>
							</a>
					</div>
					<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
						<i class="fas fa-bars"></i>
					</button>
		   		<div class="collapse navbar-collapse justify-content-end" id="navbarNav">
	            <?php
	            $args = array(
	              'theme_location' => 'primary',
	              'depth'      => 2,
	              'container'  => false,
	              'menu_class'     => 'navbar-nav',
	              'walker'     => new Bootstrap_Walker_Nav_Menu()
	              );
	            if (has_nav_menu('primary')) {
	              wp_nav_menu($args);
	            }
	            ?>
	          </div>

	        </div>
		</nav>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
