<?php /*Template Name: Dashboard*/ ?>

<?php get_header();?>
	<?php  ?>
	<?php if ( is_user_logged_in() ) : ?>
		
		
		<div class="work-area col-md-12">
			<div class="col-md-2">
				<ul class="main-list">
					<li>Dashboard</li>
					<?php 
					$current_user = wp_get_current_user(); 
					if (current_user_can('server_role') ) {?>

					<li><div class="show_my_job">Ver mis servicios</div></li>
					<?php } ?>
					<?php 

					$current_user = wp_get_current_user();
					if (current_user_can('client_role') ) {?>

					<li><div class="add_service">Solicitar Servicio</div></li>
					<li><div class="show_service_user">Mis servicios</div></li>
					<?php } ?>
					<?php 
					$current_user = wp_get_current_user(); 
					if (current_user_can('administrator') ) {?>
						<li>Admin
							<ul class="second-list">
								<li><div class="show_services">Ver todos los servicios</div></li>
								<li><div class="add_server">Agregar Servidor</div></li>
								<li>Agregar Producto</li>
								<li>Agregar Paquete</li>
							</ul>
						</li>
						
					<?php } ?>
					<li>Mi perfil</li>
					<li><a href="<?php echo wp_logout_url(home_url()); ?>">Logout</a></li>
				</ul>
			</div>
			
			<div class="col-md-10 load-content">
				<!-- ALL PERMISSIONS -->
				<div class="partial_dashboard content-panel init">
					<?php $resp = check_sercivices("08:30:00","10:30:00","2016-05-27",2); echo $resp;?>
						
				</div>
				<!-- END ALL PERMISSIONS-->

				<?php 
					$current_user = wp_get_current_user(); 
					if (current_user_can('administrator') ) {?>
				<!-- ADMIN PERMISSIONS -->
				<div class="partial_server content-panel init"><?php charge_template_server(); ?>
				</div>
				<div class="partial_all_services content-panel init"> <?php charge_template_allservice(); ?>
				</div>
				<!-- END ADMIN PERMISSIONS-->
				<?php } ?>

				<?php if (current_user_can('client_role') ) {?>
				<!-- USER PERMISSIONS -->
				<div class="partial_service content-panel init"><?php charge_template_service(); ?></div>
				<div class="partial_all_services_user content-panel init"> <?php charge_template_allservice_user(); ?>
				</div>
				<!-- END USER PERMISSIONS-->
				<?php } ?>

				<?php $current_user = wp_get_current_user(); 
					if (current_user_can('server_role') ) {?>
				<!-- SERVER PERMISSIONS -->
				<div class="partial_all_services_server content-panel init"> <?php charge_template_allservice_server(); ?>
				</div>
				<!-- END SERVER PERMISSIONS-->
				<?php } ?>

				
				
				
				
				
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