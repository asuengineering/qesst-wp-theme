<?php
/**
 * Template part for displaying recent posts on the home page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

?>

<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article <?php post_class('card'); ?> id="post-<?php the_ID(); ?>">

    <?php if ( has_post_thumbnail() ) : ?>
        <div class="card-img-top post-thumbnail">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <?php the_post_thumbnail('full', array()); ?>
            </a>
        </div><!--  .post-thumbnail -->
    <?php endif; ?>

    <div class="card-body p-0">

        <header class="entry-header p-3">

            <?php the_title( '<h5 class="card-title entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' ); ?>

        </header><!-- .entry-header -->

        <div class="entry-content card-text px-3">

            <?php the_excerpt(); ?>

        </div><!-- .entry-content -->

    <footer class="entry-footer entry-meta card-footer">

        <?php understrap_posted_on(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->

