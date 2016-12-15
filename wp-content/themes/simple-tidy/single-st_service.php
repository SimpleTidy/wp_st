<?php
/**
 * Template Name: Seccion de Proyectos
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

<?php

/* 

	Para ver el detalle del diseño se debe validar si el usuario es
	propietario o si el diseñador es el dueño del diseño, sería así:

	if((user_type()==1) || (is_my_design($id_design)))

*/

?>
<?php
	global $id;
	$id = get_the_ID();
	$meta = get_post_meta($id);
	$date = new DateTime($meta["date_service"][0]);
	$package = get_post_meta($meta["package"][0]);
	$client = get_userdata( $meta["user"][0] );
	$server = get_userdata( $meta["server"][0] );

	 
	$date_service = new DateTime($meta["date_service"][0]);
	$hoy = new DateTime();
	$check = check_pay_for_service($id);


?>
 

<div class="head-detail">
	<a href="<?php bloginfo('url');?>/dashboard/"> atras</a>
	<h1>
		Servicio-<?php echo $id;?> 
		<span class="click_appear">
			<img src="<?php bloginfo('template_url');?>/images/calendar.png">
			<h4><?php echo date_format($date, 'l, d F Y'); ?></h4>
		</span>
	</h1>
</div>
<iframe width="60%" height="300" class="map_detail" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCuLZom0QnvAg0z9ETXhMpdWYiWzSuTkmA&q=<?php echo $meta["direccion"][0]; ?>"></iframe>	
<div class="content-detail">
	<div class="panels-content-detail">
	 	<div class="info-service panel">
	 		<div class="header-info">
	 			Informacion del servicio
	 			<img src="<?php bloginfo('template_url');?>/images/laptop.png" class="header-info-img">
	 		</div>
	 		<hr class="member_details_divider">
	 		<div class="content-detail-print">
	 			<section class="data-detail">
	 				<section class="col-md-5 user_profile_detail">
	 				
							<?php echo get_avatar( $client->ID ) ?>
							<div class="name-detail-service">
								<?php echo $client->user_login;?> 
							</div>
						
	 				</section>
	 				<section class="col-md-7 service_detail">
	 					<div class="data-service-ind">
	 						<span class="tittle-detail-section"><img src="<?php bloginfo('template_url');?>/images/hri.png" class="icon-detail">Hora inicio: </span>
	 						<?php
	 						$hri = new DateTime($meta["hora_inicio"][0]);
							echo $hri->format('H:i a'); 
	 						
	 						?>
	 					</div>
						<div class="data-service-ind">
							<span class="tittle-detail-section"><img src="<?php bloginfo('template_url');?>/images/hrf.png" class="icon-detail">Hora fin: </span>
								<?php
									$hrf = new DateTime($meta["hora_fin"][0]);
									echo $hrf->format('H:i a');
								?>
						</div>	
						<div class="data-service-ind">
							<span class="tittle-detail-section"><img src="<?php bloginfo('template_url');?>/images/dir.png" class="icon-detail">Direccion: </span>
								<?php echo $meta["direccion"][0]?>
						</div>
						<div class="data-service-ind">
							<span class="tittle-detail-section"><img src="<?php bloginfo('template_url');?>/images/stado.png" class="icon-detail">Condicion: </span>
								<?php echo $meta["estado"][0]?>
						</div>	
	 				</section>
	 				<section class="col-md-12 service_options">
	 				<?php 
	 					if ($meta["estado"][0] == "Abierto" ) {?>
		 					<?php if (current_user_can('client_role') ) {
		 							$check = check_pay_for_service($id);
		 							if (!$check["exist"] && $hoy < $date_service) {
		 								?>
		 								<div class="proced-page btn-options" >pagar servicio</div>
		 								<?php
		 							}
		 							
										?>
										
								
									<div class="erase-page btn-options" on-click="">eliminar servicio</div>
							<?php } ?>

							<?php if (current_user_can('administrator') ) {

								$check = check_pay_for_service($id);
		 							if ($check["exist"]) {?>
		 								<div id="confirmPage">
		 									
											<input type="hidden" value="<?php echo $check["meta"]?>" name="id_page">
											<input type="hidden" value="<?php echo $id?>" name="id_service">
											<div class="proced-page btn-options" id="ReachPageBtn">rechazar pago</div>
											<div class="proced-page btn-options" id="confirmPageBtn">admitir pago</div>
		 								</div>
		 								
		 								<?php
		 							}?>
		 							<?php if ($meta["estado"][0] == "Abierto") {?>
		 								<div class="erase-page btn-options" onclick="">eliminar servicio</div>
		 								
		 								<?php
		 							}?>
									
								
							<?php } ?>
						<?php } ?>
						<?php if ($meta["estado"][0] == "Aprobado" && current_user_can('client_role') &&  $hoy > $date_service) {?>
							<div class="rating-service btn-options" id="RtingServiceEnd">calificar Servicio</div>
						<?php } ?>
						<?php if ($meta["estado"][0] == "Terminado" && $hoy > $date_service) {?>
							<span class="title_end">Comentario final:</span><p><?php echo $meta["comentarioFinal"][0];?></p>
							<span class="title_end">calificacion:</span>
							<?php 
								if ($meta["ranking"][0] == 1) {
									?>
									<i class="fa fa-star" aria-hidden="true"></i>
									<?php
								}
								if ($meta["ranking"][0] == 2) {
									?>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<?php
								}
								if ($meta["ranking"][0] == 3) {
									?>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<?php
								}
								if ($meta["ranking"][0] == 4) {
									?>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<?php
								}
								if ($meta["ranking"][0] == 5) {
									?>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<?php
								}
							?>
						<?php } ?>
	 				</section>

	 			</section>
	 		</div>
	 	</div>
	 	<div class="info-server panel">
	 		<div class="header-info-server">
	 			Informacion del servidor
	 			<img src="<?php bloginfo('template_url');?>/images/sponge.png" class="header-info-img">
	 		</div>
	 		<hr class="member_details_divider">
	 		<div class="content-detail-print">
	 			<?php echo get_avatar( $server->ID ) ?>
				<div class="name-detail-service">
					<?php echo $server->user_login;?> 
					<?php $imprime = check_data_server($server->ID);?>
					<div class="div-info">
						<div class="div-half ranking-haf">
							<?php	echo $imprime["ranking"];?> 
							<div>puntuacion en servicios</div>
						</div>
						<div class="div-half servicios-haf">
							<?php echo $imprime["servicios"];?> 
							<div>servicios realizados</div>
						</div>
					</div>
						

				</div>
	 		</div>
	 	</div>

	 	<?php if ($meta["estado"][0] == "Aprobado" && current_user_can('client_role') &&  $hoy > $date_service) {?>
			<div class="info-rating-page col-md-12 panel" style="display: none;">
		 		<div class="header-info">
		 			calificar Servicio
		 			<i class="fa fa-star" aria-hidden="true"></i>
		 		</div>
		 		<hr class="member_details_divider">
		 		<div class="loader loader_pay">
				 <div class="preloader-wrapper big active">
				    <div class="spinner-layer spinner-blue-only">
				      <div class="circle-clipper left">
				        <div class="circle"></div>
				      </div><div class="gap-patch">
				        <div class="circle"></div>
				      </div><div class="circle-clipper right">
				        <div class="circle"></div>
				      </div>
				    </div>
				 </div>
				</div>
		 		<div id="formRating">
			
					
					<span class="rating">
				        <input type="radio" class="rating-input" id="rating-input-1-5" name="rating-input-1" value="5">
				        <label for="rating-input-1-5" class="rating-star"></label>
				        <input type="radio" class="rating-input" id="rating-input-1-4" name="rating-input-1" value="4">
				        <label for="rating-input-1-4" class="rating-star"></label>
				        <input type="radio" class="rating-input" id="rating-input-1-3" name="rating-input-1" value="3">
				        <label for="rating-input-1-3" class="rating-star"></label>
				        <input type="radio" class="rating-input" id="rating-input-1-2" name="rating-input-1" value="2">
				        <label for="rating-input-1-2" class="rating-star"></label>
				        <input type="radio" class="rating-input" id="rating-input-1-1" name="rating-input-1" value="1">
				        <label for="rating-input-1-1" class="rating-star"></label>
					</span>
					<textarea id="textarea1" class="materialize-textarea" placeholder="Deja un comentario final sobre tu servicio" value="" name="transaccion" ></textarea>
			          
					<input type="hidden" value="<?php echo $id?>" name="id_service"></input>
					
			        
					<div class="error_cont">
						<p></p>
					</div>
					<div id="SubmitEnd" class="read-page btn-options">Calificar</div>
					<div class="out-rating btn-options" onclick="hidePageOption()">salir</div>
					
				
					
				</div>
		 	</div>			
		<?php } ?>

		<?php if (!$check["exist"]) {?>
			<div class="info-service-page col-md-12 panel" style="display: none;">
		 		<div class="header-info">
		 			Pagar Servicio
		 			<img src="<?php bloginfo('template_url');?>/images/laptop.png" class="header-info-img">
		 		</div>
		 		<hr class="member_details_divider">
		 		<div class="loader loader_pay">
				 <div class="preloader-wrapper big active">
				    <div class="spinner-layer spinner-blue-only">
				      <div class="circle-clipper left">
				        <div class="circle"></div>
				      </div><div class="gap-patch">
				        <div class="circle"></div>
				      </div><div class="circle-clipper right">
				        <div class="circle"></div>
				      </div>
				    </div>
				 </div>
				</div>
		 		<div id="formPage">
			
					
					<input type="text" class="col-md-12" placeholder="N° transaccion" value="" name="transaccion"></input>
					<input type="text" class="col-md-12" placeholder="Nombre" value="" name="nameTrans"></input>
					<input type="text" class="col-md-12" placeholder="Apellido" value="" name="lastnameTrans"></input>
					<input type="text" class="col-md-12" placeholder="Monto" value="" name="mountTrans"></input>
					<input type="text" class="datepicker col-md-12" placeholder="Fecha" value="" name="dateTrans"></input>
					<input type="hidden" class="col-md-12" value="Por Confirmar" name="statusTrans"></input>
					<input type="hidden" value="<?php echo $id?>" name="id_service"></input>
					<div class="error_cont">
						<p></p>
					</div>
					<div id="SubmitPage" class="read-page btn-options">pagar</div>
					<div class="out-page btn-options" onclick="hidePageOption()">salir</div>
					
				
					
				</div>
		 	</div>			
		<?php } ?>
	 	
		
	</div>
	
</div>




<?php get_footer(); ?>
<script type="text/javascript">
var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
</script>
