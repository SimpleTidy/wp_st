<?php /*Template Name: Dashboard*/ 

?>

<?php get_header();?>
	<?php if ( is_user_logged_in() ) : ?>
		<?php 
			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post(); 
					//
					// Post Content here
					//
				} // end while
			} // end if
		?>
		<!-- <div class="back-screnn"></div>
		<div class="col-md-2 menu-total">
			<ul class="main-list">
				<li><a href="<?php bloginfo('url');?>/dashboard/"> Dashboard</a></li>
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
					<li>
						<ul class="second-list">
							<li><div class="show_services">Ver todos los servicios</div></li>
							<li><div class="add_server">Agregar Servidor</div></li>
							<li><div class="add_product">Agregar Producto</div></li>
							<li>Agregar Paquete</li>
						</ul>
					</li>
					
				<?php } ?>
				<li>Mi perfil</li>
				<li><a href="<?php echo wp_logout_url(home_url()); ?>">Logout</a></li>
			</ul>
		</div> -->
		<div class="work-area">

			<!-- <div class="col-md-12 menu-icon"><i class="fa fa-bars fa-2x clickefect" aria-hidden="true"></i></div>
			 -->
			<div class="col-md-12 load-content">
				<!-- ALL PERMISSIONS -->
				<div class="partial_dashboard content-panel init">
					<?php 
					$current_user = wp_get_current_user();
					$pave = data_dashboard_server($current_user->ID);
					
					if (current_user_can('server_role') ) {?>
						<div class="rigth-dash">
							<div class="ranking-datas panel paneldash">
							<div class="info">
								<?php
									echo $pave["ranking"];
								?>
								</div>
							<div class="info letter">ranking obtenido</div>
							</div>
							<div class="service-datas panel paneldash">
								<div class="info">
								<?php
									echo $pave["servicios"];
								?>
								</div>
								<div class="info letter">Servicios realizados</div>
							</div>
						</div>
						<div class="lastService-datas panel">
							

							<table class="table table-hover">
							  <thead class="thead-inverse">
								<tr>
								  <th>Usuario</th>
								  <th>Fecha</th>
								  <th>Hora</th>
								  <th>Estado</th>
								</tr>
								<tr >
								  <h4>ultimos 3 servicios</h4> 
								</tr>
							  </thead>
								<tbody>
									<?php
										$service_query = new WP_Query( 
											array(
													'post_type' => 'st_service',
													'posts_per_page' => 3,
													'meta_key' => 'server',
												    'meta_value'   => $current_user->ID
													      
												)  
											); 
										if ( $service_query->have_posts() ) {
											while ( $service_query->have_posts() ) {
												$service_query->the_post();
												$meta = get_post_meta($service_query->post->ID);
												$user_info = get_userdata($meta["user"][0]);
												$server_info = 	get_userdata($meta["server"][0]);
												
												?>
												<tr>
										      		<?php 
										      			$user_foto = get_user_meta( $user_info->ID, 'id_foto');
										      		?>
										      		
											      <td><div class="profile_pic"><img alt="" src="<?php echo wp_get_attachment_url( $user_foto[0] );?>" class="avatar avatar-96 photo" height="96" width="96"></div><?php echo $user_info->user_login;?></td>
											      <td><?php echo $meta["date_service"][0]?></td>
											      <td><?php echo $meta["hora_inicio"][0]."-".$meta["hora_fin"][0]?></td>
											      <td><?php echo$meta["estado"][0]?></td>
											      <td><a href="<?php echo get_permalink(); ?>" class="waves-effect waves-light btn">ver detalles</a></td>
											    </tr>
												<?php
												
											}
										}
									?>
								</tbody>
  							</table>


						</div>
					<?php } ?>
					<?php 
					$current_user = wp_get_current_user();
					$pave = data_dashboard_client($current_user->ID);
					$user_foto = get_user_meta( $current_user->ID, 'id_foto');
					if (current_user_can('client_role') ) {?>

						<div class="rigth-dash">
							<div class="ranking-datas panel paneldash">
							<div class="info">
								<?php
									echo date("H:i",$pave["ranking"]);
								?>
								</div>
							<div class="info letter">horas de servicio</div>
							</div>
							<div class="service-datas panel paneldash">
								<div class="info">
								<?php
									echo $pave["servicios"];
								?>
								</div>
								<div class="info letter">Servicios en la plataforma</div>
							</div>
						</div>
						<div class="lastService-datas panel">
							

							<table class="table table-hover">
							  <thead class="thead-inverse">
								<tr>
								  <th>Servidor</th>
								  <th>Fecha</th>
								  <th>Hora</th>
								  <th>Estado</th>
								</tr>
								<tr >
								  <h4>ultimos 3 servicios</h4> 
								</tr>
							  </thead>
								<tbody>
									<?php
										$service_query = new WP_Query( 
											array(
													'post_type' => 'st_service',
													'posts_per_page' => 3,
													'meta_key' => 'user',
												    'meta_value'   => $current_user->ID
													      
												)  
											); 
										if ( $service_query->have_posts() ) {
											while ( $service_query->have_posts() ) {
												$service_query->the_post();
												$meta = get_post_meta($service_query->post->ID);
												$server_info = get_userdata($meta["user"][0]);
												$server_info = 	get_userdata($meta["server"][0]);
												
												?>
												<tr>
										      		<?php 
										      			$server_foto = get_user_meta( $server_info->ID, 'id_foto');
										      		?>
											      <td><div class="profile_pic"><img alt="" src="<?php echo wp_get_attachment_url( $server_foto[0] );?>" class="avatar avatar-96 photo" height="96" width="96"></div><?php echo $server_info->user_login;?></td>
											      <td><?php echo $meta["date_service"][0]?></td>
											      <td><?php echo "I: ".date("H:i a",strtotime($meta["hora_inicio"][0]))."</br>"."F: ".date("H:i a",strtotime($meta["hora_fin"][0]))?></td>
											      <td><?php echo$meta["estado"][0]?></td>
											      <td><a href="<?php echo get_permalink(); ?>" class="waves-effect waves-light btn">ver detalles</a></td>
											    </tr>
												<?php
												
											}
										}
									?>
								</tbody>
  							</table>


						</div>

					<?php } ?>
					<?php 
					$current_user = wp_get_current_user();
					$pave = data_dashboard_admin();
					if (current_user_can('administrator') ) {?>
						<div class="rigth-dash">
							<div class="ranking-datas panel paneldash">
							<div class="info">
								<?php
									echo $pave["money"]."$";
								?>
								</div>
							<div class="info letter">Dinero total</div>
							</div>
							<div class="service-datas panel paneldash">
								<div class="info">
								<?php
									echo $pave["servicios"];
								?>
								</div>
								<div class="info letter">Total de servicios</div>
							</div>
						</div>
						<div class="rigth-dash">
							<div class="ranking-datas panel paneldash">
							<div class="info">
								<?php
									echo $pave["usuarios"];
								?>
								</div>
							<div class="info letter">Clientes</div>
							</div>
							<div class="service-datas panel paneldash">
								<div class="info">
								<?php
									echo $pave["servidores"];
								?>
								</div>
								<div class="info letter">Servidores</div>
							</div>
						</div>
					<?php } ?>
					
						
				</div>
				<!-- END ALL PERMISSIONS-->

				

				
				
				
				
				
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