<?php
/**
 * The template for displaying archive pages
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package MaterialWP
 */


get_header(); ?>
    <?php if ( have_posts() ) : ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <?php 
                the_archive_title( '<h1 class="category-header">', '</h1>' );
                ?>
            </div>
        </div><!-- end .row -->
    </div>
    <div class="container bg-white p-3 pt-5">
        <div class="row">
            <div class="col-md-3">
                <aside id="secondary" class="sidebar" role="complementary">
                    <?php dynamic_sidebar( 'posts-sidebar' ); ?>
                </aside><!-- #secondary -->
            </div><!-- end .col -->
            <div class="col-md-8 pl-5">
                <div id="primary">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class( ''); ?>>

                            <div class="entry-title">
                                <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
                            </div><!-- .entry-title -->


                            <div class="entry-content">
                                <?php
                                the_excerpt(); 
                                wp_link_pages( array(
                                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'materialwp' ),
                                    'after'  => '</div>',
                                ) );
                                echo '<hr>';
                                ?>
                            </div><!-- .entry-content -->

                            
                            <footer class="entry-footer d-flex">
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
                    <?php endwhile; ?>
                </div><!-- #primary -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- container  -->
    <div class="container">
        <div class="row">
            <div class="col">
                <?php the_posts_navigation();?>
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- container  -->

<?php 

    else :

        get_template_part( 'template-parts/content', 'none' );

    endif;

    get_footer();
?>