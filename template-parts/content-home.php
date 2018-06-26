<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package MaterialWP
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>

	<?php if ( has_post_thumbnail() ) : ?>
		<div class="card-img-top post-thumbnail">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <?php the_post_thumbnail('full', array()); ?>
            </a>
		</div><!--  .post-thumbnail -->
		<?php else : ?>
		<div class="card-img-top post-thumbnail">
		    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		        <img src="<?php echo get_stylesheet_directory_uri() . '/img/QESST-featured-image-default.png'; ?>" alt="QESST Featured Image Placeholder" />
		    </a>
		</div><!--  .post-thumbnail -->
	<?php endif; ?>

	<div class="card-body p-3">
		<header class="entry-header">
			<?php 
                the_title( '<h5 class="card-title entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' );
            ?>
		</header><!-- .entry-header -->

		<div class="entry-content card-text">
			<?php the_excerpt(); ?>
		</div><!-- .entry-content -->

        <footer class="entry-footer entry-meta card-footer">
			<?php materialwp_posted_on(); ?>
        </footer>

	</div><!--  .card-body -->
</article><!-- #post-## -->
