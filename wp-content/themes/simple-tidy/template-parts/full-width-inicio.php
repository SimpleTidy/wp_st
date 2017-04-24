<?php
/**
 * Template Name: Inicio
 *
 * Description: Twenty Twelve loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<?php //get_project(248); ?>

<style type="text/css">
header#masthead {
	*display: none;
}

</style>
		<div id="primary" class="site-content">
			<div id="content" role="main" class="contenido-principal">

				<?php while ( have_posts() ) : the_post(); ?>
					

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->
		
		<div id="cont-3" class="site-content">
			<div class="back_home">
				<img src="<?php bloginfo('template_url');?>/images/st-logo.png" class="img-logo-register">
			</div>
			

		</div><!-- #cont-3 -->


	</div>
<div style="clear:both;"></div>
<?php get_footer(); ?>
