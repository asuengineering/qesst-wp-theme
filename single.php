<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package MaterialWP
 */

get_header(); ?>

    <?php while ( have_posts() ) : the_post(); ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <?php 
                $category = get_the_category(); 
                echo '<h1 class="category-header">' . $category[0]->cat_name . '</h1>';
                ?>
            </div>
        </div><!-- end .row -->
    </div>
    <div class="container bg-white p-3 pt-5">
        <div class="row">
            <div class="col-md-3">
                <aside id="secondary" class="sidebar" role="complementary">
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail('small'); ?>
                    </div>
                    <?php dynamic_sidebar( 'posts-sidebar' ); ?>
                </aside><!-- #secondary -->
            </div><!-- end .col -->
            <div class="col-md-8 pl-5">
                <div id="primary">
                    <article id="post-<?php the_ID(); ?>" <?php post_class( ''); ?>>

                        <div class="entry-title">
                            <h2><?php the_title(); ?></h2>
                        </div><!-- .entry-title -->


                        <div class="entry-content">
                            <?php
                            the_content(); 
                            wp_link_pages( array(
                                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'materialwp' ),
                                'after'  => '</div>',
                            ) );
                            echo '<hr>';
                            ?>
                        </div><!-- .entry-content -->

                        
                        <footer class="entry-footer d-flex">
                            <?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<div class="breadcrumbs mr-auto">','</div>'); } ?>
                            <?php materialwp_posted_on(); ?>
                            <?php if ( get_edit_post_link() ) : ?>
                            <?php
                                edit_post_link(
                                    sprintf(
                                        /* translators: %s: Name of current post */
                                        esc_html__( 'Edit %s', 'materialwp' ),
                                        the_title( '<span class="screen-reader-text">"', '"</span>', false )
                                    ),
                                    '<span class="edit-link">',
                                    '</span>'
                                );
                            endif;
                            ?>
                        </footer><!-- .entry-footer -->
                    
                    </article>
                </div><!-- #primary -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- container  -->

<?php endwhile; ?>
<?php get_footer(); ?>