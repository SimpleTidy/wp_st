<?php
/**
 * Template Name: Add Service
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
 ?>
<form action="" method="POST" class="form_service">
	<div class="one">
		<h1>¡Haz click en el servidor que quieres elegir!</h1>
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
			      <span class="card-title grey-text text-darken-4"><?php echo $user->display_name;?><i class="material-icons right">close</i></span>
			      <p>Here is some more information about this product that is only revealed once clicked on.</p>
			    </div>
		  	</div>
			
				     
	        	<input type="radio" style="visibility: hidden;" name="who" value="<?php echo $user->ID ?>" id="<?php echo $user->ID ?>" >
	        	
	        </label>
			 <?php
			 
		}
		?>
		<div class="next2 col-md-12">Siguiente</div>	
	</div>
	<div class="two">
		<h1>¡Elige tu paquete!</h1>
		<?php
		// var_dump(data_service_form());
		$packages = data_service_form_package();
		//var_dump($packages);
		if ( $packages->have_posts() ) {
			while ( $packages->have_posts() ) {
				$packages->the_post();
			?>

			<label class="frame col-md-12 package" for="<?php echo $packages->post->ID ?>" >
			
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
		        	<input type="radio" id="<?php echo $packages->post->ID ?>" style="visibility: hidden;" name="package" value="<?php echo $packages->post->ID ?>" >
		        	<div>Precio: <?php echo $meta["price"][0]; ?></div> 
		        	<div>Aposentos: <?php echo $meta["aposentos"][0]; ?></div> 
		        	<div>Area de limpieza: <?php echo $meta["area_clean"][0]; ?> m²</div> 
		        	<div><?php echo $meta["duracion"][0]; ?></div>  
	        	</div>

	        	
				<?php
				
			?>
			</label>
			<?php
			}
		} else {
			// no posts found
		}
		
		?>	
		<div class="back1">Atras</div>
		<div class="next3">Siguiente</div>
	</div>
	<div class="three">
		<h1>¿Donde y cuando?</h1>
		<div class="input-field col s6">
          <input id="dir" type="text" >
          <label for="first_name">Direccion del servicio</label>
        </div>
		<input type="date" class="datepicker" name="date">
		<input type="text" name="hour_init" value="" />
		<input type="text" name="hour_final" value="<?php echo $durat ?>" />
		<input type="hidden" name="submited" value="1" />
		<div class="back2">Atras</div>
		<input type="submit" name="submit" value="reserva tu servicio ahora"></input>
	</div>
	
</form>