<?php /*Template Name: Dashboard*/ ?>

<?php get_header(); ?>
	<?php //while ( have_posts() ) : the_post(); ?>
	<?php if ( is_user_logged_in() ) : ?>
		<h1>Hola</h1>

		<ul>
			<li>Solicitar Servicio</li>
			<?php 
			$current_user = wp_get_current_user();
			if (current_user_can('administrator') ) {?>
				<li>Agregar Servidor</li>
			<?php } ?>
			<li>Buscar Servidores</li>
		</ul>
		<a href="<?php echo wp_logout_url(home_url()); ?>">Logout</a>
	<?php else: ?>
		<script type="text/javascript">
			window.location="<?php echo esc_url( get_permalink(12) ); ?>";
		</script>
	<?php endif; ?>
	<?php //endwhile; ?>

<?php get_footer(); ?>