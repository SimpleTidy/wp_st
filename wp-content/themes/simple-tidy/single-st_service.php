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
	



?>
 <h1>
 	<?php 
 	$check = check_pay_for_service($id);
 	echo $check;
 	if(!$check){
 		?>
 		No hay pago
 		<?php
 	}else{
 		var_dump($check);
 	}
 	?>

 </h1><br>
<h1><?php var_dump($meta); echo $client->user_login;?> </h1>
<div class="head-detail">
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
	 				<?php if ($meta["estado"][0] == "Abierto" ) {?>
		 					<?php if (current_user_can('client_role') ) {
		 							$check = check_pay_for_service($id);
		 							if (!$check) {
		 								?>
		 								<div class="proced-page btn-options" >pagar servicio</div>
		 								<?php
		 							}?>
								
								<div class="erase-page btn-options" on-click="">eliminar servicio</div>
							<?php } ?>

							<?php if (current_user_can('administrator') ) {

								$check = check_pay_for_service($id);
		 							if (!$check) {
		 								?>
		 								<div class="proced-page btn-options" >pagar servicio</div>
		 								<?php
		 							}?>
									
								<div class="erase-page btn-options" onclick="">eliminar servicio</div>
							<?php } ?>
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
	 			
	 		</div>
	 	</div>

	 	<?php $check = check_pay_for_service($id); if (!$check) {?>
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
					<input type="text" class="col-md-12" placeholder="Fecha" value="" name="dateTrans"></input>
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
