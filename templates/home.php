<?php
/**
 * Template Name: Home
 *
 * @package materialwp
 */

get_header(); ?>

<div class="home-hero">
	<div class="container">
		
        <h1 class="typed">QESST <span class="ti-hero-slugs"></span></h1>
        
        <div class="teaser-boxes">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card-body p-3">
                                    <h5>Prepare for the annual site visit</h5>
                                    <p class="card-text">The 2018 Site Visit is from May 8 to May 10. Help us prepare by submitting an RSVP today if you are attending.</p>
                                    <a href="https://goo.gl/forms/pMfnHyRMG9lecukN2" class="btn btn-secondary active">RSVP Today</a>
                                    <a href="/site-visit" class="btn btn-outline-secondary">Read More</a>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <img src="/wp-content/uploads/2018/03/Nelson-site-visit-cropped-3.jpg" title="QESST Site Visit Photo from 2011" alt="A group of three people talk about the 2011 Site Visit." />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card-body p-3">
                                    <h5>Engineering Research Center</h5>
                                    <p class="card-text">QESST was established in 2011 as an NSF-DOE funded Engineering Research Center.<br><br></p>
                                    <a href="/wp-content/uploads/2013/03/ERC_brochure_reader.pdf" class="btn btn-outline-secondary">Download the Brochure</a>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <img src="/wp-content/uploads/2018/03/brochure-cover-composite.jpg" alt="Composite image of multiple QESST brochure covers."/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- end .container -->
</div><!-- end .home-hero -->

<div class="about">
    <div class="row no-gutters">
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
    </div>
</div><!-- .end content -->

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
                    echo '<div class="col">' ;
                    get_template_part( 'template-parts/content', 'home' );
                    echo '</div>' ;

                endwhile; // End of the loop.
            } 
            
            wp_reset_postdata();
            ?>

        </div><!-- end .row -->
    </div><!-- end .container -->
</div><!-- end .recent-posts -->

<?php get_footer(); ?>