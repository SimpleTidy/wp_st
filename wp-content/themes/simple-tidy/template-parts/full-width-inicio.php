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
					<?php // get_template_part( 'content', 'page' ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->
		<div id="cont-2" class="site-content">

			<div class="mos" style=" background-image: url(<?php bloginfo( 'url' ); ?>/wp-content/themes/tarful-child/images/mos-px.png?>">
				<div id="area_principal" class="site-content">
					<div id="phrase-principal" class="site-content">
						<h1 class="tittle font-tit"><?php the_content();?></h1>
						<div id="princ-buttons" class="site-content">
							
						</div>
					</div>
				</div>
			</div>
		</div><!-- #cont-2 -->
		<div id="cont-3" class="site-content">
			<h1>Hola estoy en el home</h1>


		</div><!-- #cont-3 -->


	</div>
<div style="clear:both;"></div>
<?php get_footer(); ?>
