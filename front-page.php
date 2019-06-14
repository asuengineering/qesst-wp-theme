<?php
/**
 * The template for displaying the front page of the website. 
 *
 * The front page takes advantage of content from several different places within the website.
 * From top to bottom, they are:
 *  - A theme options page to change the background image and typed messages across the top of the screen.
 *  - A widget area to change the "cards" that occur under the typed messages.
 *  - A widget area to add or reformat the image/text full width content that occurs under the card layouts.
 *  - An expression of the latest posts from the blog. Includes the ability to make a post "sticky" to keep it in place.
 * 
 * Here we go. :-)
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

$background_image = '';
if (!empty(carbon_get_theme_option('homeoption_typed_background'))) {
    $background_image = "background-image:url('" . carbon_get_theme_option('homeoption_typed_background') . "');";
};

$background_color = '';
if (!empty(carbon_get_theme_option('homeoption_typed_bgcolor'))) {
    $background_color = 'background-color:' . carbon_get_theme_option('homeoption_typed_bgcolor') . ';';
};

$background = '';
if ((!empty($background_image)) || (!empty($background_color)) ) {
    $background = 'style="' . $background_image . ' ' . $background_color . '"';
}

$typed_static = '';
if (!empty(carbon_get_theme_option('homeoption_typed_static'))) {
    $typed_static = carbon_get_theme_option('homeoption_typed_static');
};

$typed_dynamic = '';
$messages = carbon_get_theme_option('homeoption_typed_messages');
foreach ( $messages  as $message ) {
    $typed_dynamic .= $message['homeoption_message'] . '<br>';
}

?>

<div class="home-hero" style="<?php echo $background_image . ' ' . $background_color; ?>">

	<div class="container">
        
        <?php echo '<h1 class="typed">' . $typed_static . '<span class="ti-hero-slugs">' . $typed_dynamic . '</span></h1>'; ?>
            
        <?php get_template_part( 'sidebar-templates/sidebar', 'homecards' ); ?>

    </div><!-- end .container -->
</div><!-- end .home-hero -->
    
<?php get_template_part( 'sidebar-templates/sidebar', 'homecontent' ); ?>

    <!-- <div class="row no-gutters">
        <div class="col-sm-6">
            <div class="padding-extra">
                <h2 class="typed-normal">Electricity is the lifeblood of modern society.</h2>
                <p>Powering everything from cities to pacemakers, our electricity generating system faces challenges. These include harmful environmental impacts, threats to national security, resource supply problems, difficulties in powering autonomous applications, and over a quarter of the world’s population without access to electricity. These all indicate the need for a new electricity generation system.</p>
            </div>
        </div>
        <div class="col-sm-6">
            <img src="/wp-content/uploads/2015/01/Monument-Valley.jpg" alt="QESST Scholars and faculty install a solar PV system in Monument Valley, Navajo Tribal Park" />
        </div>
    </div>
    
    <div class="row no-gutters">
        <div class="col-sm-6">
            <img src="/wp-content/uploads/2017/01/DSC_0056.jpg" alt="QESST student that attended Solar Cell 101 places a cell to be screen-printed. This machine automatically applies the top fingers and buss bars." title="SolarCell101 Bussbar Printing" />
        </div>
        <div class="col-sm-6">
            <div class="padding-extra">
                <h2 class="typed-normal">Addressing the challenges one at a time.</h2>
                <p>QEEST addresses these challenges by supporting a system of photovoltaic science and innovation—a system that breaks away from the waste and inefficiencies of unsustainable fossil fuels and generates power using our favorite sustainable and unlimited resource: the Sun.</p>
            </div>
        </div>
    </div>

    <div class="row no-gutters">
        <div class="col-sm-6">
            <div class="padding-extra">
                <h2 class="typed-normal">We're kind of a big deal.</h2>
                <p>The Quantum Energy and Sustainable Solar Technologies (QESST) lab is an Engineering Research Center. QESST is an Engineering Research Center (ERC) sponsored by the National Science Foundation (NSF) and the U.S. Department of Energy (DOE) that focuses on advancing photovoltaic science, technology, and education in order to address one of society’s greatest challenges: sustainably transforming electricity generation to meet the growing demand for energy.</p>
            </div>
        </div>
        <div class="col-sm-6">
            <img src="/wp-content/uploads/2018/01/IMG_0129.jpg" alt="Students in the courtyard, preparing a solar expiriment." />
        </div>
    </div> -->

<div class="recent-posts">
    <div class="container">
        <div class="row">
            <div class="col-md-12"><h2 class="recent-news-headline text-center">Recent Posts</h2></div>
        </div>
        <div class="row">
            <?php 
            
            // The Query
            $args = array(
                'posts_per_page'      => 3,
                'post__in'            => get_option( 'sticky_posts' ),
                'ignore_sticky_posts' => 1,
            );
            $the_query = new WP_Query( $args );
            
            // The Loop
            if ( $the_query->have_posts() ) {
                
                while ( $the_query->have_posts() ) : $the_query->the_post();
                    echo '<div class="col-lg-4">' ;
                    get_template_part( 'loop-templates/content', 'home' );
                    echo '</div>' ;

                endwhile; // End of the loop.
            } 
            
            wp_reset_postdata();
            ?>

        </div><!-- end .row -->
    </div><!-- end .container -->
</div><!-- end .recent-posts -->

<?php get_footer(); ?>