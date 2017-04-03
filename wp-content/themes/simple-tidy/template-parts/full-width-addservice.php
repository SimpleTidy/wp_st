<?php
/**
 * Template Name: Add Service New
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
 get_header(); 
 ?>

 <div class="loader">
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
 <div class="error-cont">Contenedor de errores</div>

<form action="" method="POST" class="form_service">
	<div class="titleProcessService">
		<div class="titleProcess">Arma tu servicio</div>
	</div>
	<div class="stepsContainer">
		<div class="InnerSteps">
			<div class="stepOne stepService"><i>1</i> Elige el servidor</div>
			<div class="stepTwo stepService"><i>2</i> Selecciona el paquete</div>
			<div class="stepThree stepService"><i>3</i> ¿Dónde y cúando?</div>
		</div>
		
	</div>
	<div class="one">
		<h1>¡Haz click en el servidor que quieres elegir!</h1>
		<div class="panel panelSteps">
			<?php
				
				// var_dump(data_service_form());
				$users = data_service_form();
				//var_dump($users[0]);
				
				foreach ($users as $user) {

					 ?>
					<label class="frame col-md-3" for="<?php echo $user->ID ?>" >
				 	<div class="card">
					    <div class="card-image waves-effect waves-block waves-light">
					      <?php echo get_avatar( $user->ID );?>
					    </div>
					    <div class="card-content" style="padding-left: 0px !important; padding-top: 0px !important;">
					      <span class="card-title activator grey-text text-darken-4" style="text-align: left;"><?php echo $user->display_name;?><i class="material-icons right">more_vert</i></span>
					      <p></p>
					    </div>
					    <div class="card-reveal">
					      <span class="card-title grey-text text-darken-4"><?php echo $user->display_name;?> <i class="material-icons right">close</i></span>
					      <p>Here is some more information about this product that is only revealed once clicked on.</p>
					    </div>
				  	</div>
					
						     
			        	<input type="radio" style="visibility: hidden;" name="who" class="who" value="<?php echo $user->ID ?>" id="<?php echo $user->ID ?>" >
			        	
			        </label>
					 <?php
					 
				}
			?>	
			<div class="next2 waves-effect waves-light btn" >Siguiente</div>	
		</div>
		
		
	</div>
	<div class="two">
		<h1>¡Elige tu paquete!</h1>
		<div class="panel panelSteps">

			<?php
			// var_dump(data_service_form());
			$packages = data_service_form_package();
			//var_dump($packages);
			if ( $packages->have_posts() ) {
				while ( $packages->have_posts() ) {
					$packages->the_post();
				?>

				<label class="frame_package col-md-12 package" for="<?php echo $packages->post->ID ?>" >
				
				<?php
					global $durat;
					global $price;
					$meta = get_post_meta($packages->post->ID);
					//var_dump( $meta);
					$price = $meta["price"][0];
					$durat = $meta["duracion"][0];
					?>
					<img class="col-md-3" src="<?php echo  wp_get_attachment_thumb_url( $meta["_thumbnail_id"][0] );?>" >
						<div class="content-package col-md-9">
							<div><?php the_title() ?></div>
							<div><?php the_content() ?></div>      
				        	<input type="radio" class="package_aj" id="<?php echo $packages->post->ID ?>" style="visibility: hidden;" name="package" value="<?php echo $packages->post->ID ?>" >
				        	<div>Precio: <?php echo $meta["price"][0]; ?></div> 
				        	
				        	
				        	<div>Aposentos: <?php echo $meta["aposentos"][0]; ?></div> 
				        	<div>Area de limpieza: <?php echo $meta["area_clean"][0]; ?> m²</div> 
				        	<div>Duracion: <?php echo $meta["duracion"][0]; ?> Horas</div>  
			        	</div>
			        	<input type="hidden" class="end_service" value="<?php echo $meta["duracion"][0]; ?>">
			        	<input type="hidden" class="price_service" value="<?php echo $meta["price"][0]; ?>">

		        	
					<?php
					
				?>
				</label>
				<?php
				}
			} else {
				// no posts found
			}
				
		?>	
			<div class="back1 waves-effect waves-light btn teal darken-4" style="margin: 10px;">Atras</div>
			<div class="next3 waves-effect waves-light btn" style="margin: 10px;">Siguiente</div>
		</div>
	</div>
	<div class="three">
		<h1>¿Donde y cuando?</h1>
		<div class="panel panelSteps">
			<div class="input-field col s6">
	          <input id="direccio" type="text" name="dir" placeholder="Escribe aqui la direccion">
	          <!-- <label for="first_name">Direccion del servicio</label> -->

	        </div>
	        <input type="hidden" class="sum_final_h">
	        <input type="hidden" class="price">
			<input type="date" class="datepicker dateservice" name="date"/>
			<input type="text" name="hour_init" id="hour_init" value="" class="timepicker" />
			<input type="hidden" name="hour_init_real" id="hour_init_real" value=""/>
			<div id="root-picker-outlet">
			<input type="text" name="hour_final" id="hour_final" value="" disabled />
			<input type="hidden" name="hour_final_real" id="hour_final_real" value=""/>
			</div>
			<input type="hidden" name="submited" value="1" />
			<div class="back2 waves-effect waves-light btn teal darken-4" style="margin: 10px;">Atras</div>
			<div id="submit-service" class="waves-effect waves-light btn" style="margin: 10px;">¡Reserva tu servicio ahora!</div>
		</div>
		
	</div>
	
</form>
<div style="clear:both;"></div>

<script type="text/javascript">
	var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
</script>
<?php get_footer();?>