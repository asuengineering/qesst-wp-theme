<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MaterialWP
 */

?>

	</div><!-- #content -->
    
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<div class="row">
                <?php 
                    if (is_active_sidebar('footer-left')) {
                        echo '<div class="col mx-3">';
                        dynamic_sidebar('footer-left');
                        echo '</div>';
                    }
                ?>
                <?php 
                    if (is_active_sidebar('footer-center')) {
                        echo '<div class="col mx-3">';
                        dynamic_sidebar('footer-center');
                        echo '</div>';
                    }
                ?>
                <?php 
                    if (is_active_sidebar('footer-right')) {
                        echo '<div class="col mx-3">';
                        dynamic_sidebar('footer-right');
                        echo '</div>';
                    }
                ?>
            </div>
                    
		</div><!--  .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
