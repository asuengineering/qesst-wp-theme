<?php
/**
 * Template Name: Ribbon Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package MaterialWP
 */

get_header(); ?>

    <?php while ( have_posts() ) : the_post(); ?>

    <?php get_template_part( 'template-parts/ribbon'); ?>

    <div class="container bg-white">
        <div class="row">
            <div id="primary" class="content-area-full col p-5">
                <main id="main" class="site-main" role="main">

                        <?php // From Template Part, Page ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class( ''); ?>>
                            <div class="d-flex flex-row justify-content-between">
                                <div class="col-sm-8">
                                    
                                    <?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<div class="breadcrumbs">','</div>'); } ?>
                                        
                                    <div class="entry-content">
                                        <?php
                                        the_content();

                                        wp_link_pages( array(
                                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'materialwp' ),
                                            'after'  => '</div>',
                                        ) );
                                    ?>
                                    </div>
                                    <!-- .entry-content -->

                                    <?php if ( get_edit_post_link() ) : ?>
                                    <footer class="entry-footer">
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
                                        ?>
                                    </footer>
                                    <!-- .entry-footer -->
                                    <?php endif; ?>
                                
                                </div>
                                <!--  .col -->
                                <aside id="secondary" class="widget-area col-sm-3" role="complementary">
                                    <?php get_template_part( 'template-parts/sidebar-ribbon'); ?>
                                </aside>
                                <!-- #secondary -->
                             </div>

            <?php if ( has_post_thumbnail() ) : ?>
            <div class="post-thumbnail">
                <?php the_post_thumbnail('full'); ?>
            </div>
            <!--  .post-thumbnail -->
            <?php endif; ?>

            </article>
            <!-- #post-## -->

            </main>
            <!-- #main -->
        </div>
        <!-- #primary -->
    </div>
    <!-- row -->
    </div>
    <!-- container -->

    <?php endwhile; // End of the loop ?>

    <?php
get_footer();
