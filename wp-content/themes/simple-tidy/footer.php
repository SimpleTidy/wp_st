<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Simple_Tidy
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'simple-tidy' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'simple-tidy' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'simple-tidy' ), 'simple-tidy', '<a href="http://underscores.me/" rel="designer">Underscores.me</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/css/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/materialize.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/picker.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/picker.date.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/legacy.js"></script>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/script.js"></script>
</body>
</html>
