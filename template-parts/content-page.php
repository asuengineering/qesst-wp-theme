<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package MaterialWP
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="col">
		<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<div class="breadcrumbs p-3">','</div>'); } ?>

		<header class="entry-header p-3">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
	</div>
	
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="post-thumbnail">
		    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		        <?php the_post_thumbnail('full'); ?>
		    </a>
		</div><!--  .post-thumbnail -->
	<?php endif; ?>

	<div class="col">

		<div class="entry-content p-3">
			<?php
				the_content();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'materialwp' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<?php if ( get_edit_post_link() ) : ?>
			<footer class="entry-footer p-3">
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
			</footer><!-- .entry-footer -->
		<?php endif; ?>
	</div><!--  .col -->
</article><!-- #post-## -->
