<?php /*Template Name: Dashboard*/ ?>

<?php get_header();?>
	<?php //while ( have_posts() ) : the_post(); ?>
	<?php if ( is_user_logged_in() ) : ?>
		<h1>Hola</h1>
		
		<div class="work-area col-md-12">
			<div class="col-md-2">
				<ul class="main-list">
					<li>Dashboard</li>
					<li><div class="add_service">Solicitar Servicio</div></li>
					<?php 
					$current_user = wp_get_current_user();
					if (current_user_can('administrator') ) {?>
						<li>Configuracion
							<ul class="second-list">
								<li><div class="add_server">Agregar Servidor</div></li>
								<li>Agregar Producto</li>
								<li>Agregar Paquete</li>
							</ul>
						</li>
						
					<?php } ?>
					<li>Buscar Servidores</li>
					<li><a href="<?php echo wp_logout_url(home_url()); ?>">Logout</a></li>
				</ul>
			</div>
			
			<div class="col-md-10 load-content">
				<div class="partial_dashboard content-panel init">Hola Dashboard</div>
				<div class="partial_service content-panel init"><?php charge_template_service(); ?></div>
				<div class="partial_server content-panel init"><?php charge_template_server(); ?></div>
				
			</div>
		</div>
		
	<?php else: ?>
		<script type="text/javascript">
			window.location="<?php echo esc_url( get_permalink(12) ); ?>";
		</script>
	<?php endif; ?>
	<?php //endwhile; ?>

<?php get_footer(); ?>
<script type="text/javascript">
var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
</script>