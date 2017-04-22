<?php
/**
 * Template Name: Add Paquete
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
<!-- <div class="loader">
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
 </div> -->
 <div class="titleProcessService">
		<div class="titleProcess">Agrega un nuevo paquete a la plataforma</div>
</div>

	<form id="formServer" method="post" class="form_server" enctype="multipart/form-data" onsubmit="return save_package()">
		<?php 
			$response = save_package();
			if (!empty($response)) {
				# code...
			
				if ($response['error']) {?>
						<div class="alert alert-danger alert-dismissible" role="alert" style="display: block;">
		  					<strong class="bodymsg"><?php echo $response['msg']; ?></strong> 
						</div>
				<?php }else{
						if (!$response['error']) {
							
						?>
						<div class="alert alert-success alert-dismissible" role="alert">
		  					<strong class="bodymsg"><?php echo $response['msg']; ?></strong> 
						</div>
						<script type="text/javascript">
							window.location.href = window.location.href;
						</script>
						
				<?php 

						}
				} 
				unset($response);
			} ?>
		
		<div class="input-field col s12">
			<input type="text" class="validate" value="" name="name_package"></input>
			<label for="name">Nombre del paquete</label>
		</div>
		<div class="input-field col s12">
			<textarea id="description_package" class="materialize-textarea" name="description_package"></textarea>
          	<label for="textarea1">Descripcion del paquete</label>
		</div>
		
        <div class="input-field col s12" style="display: table;width: 100%;">
			<input type="text" class="validate" value="" name="apos_package"></input>
			<label for="name">Aposentos</label>
		</div>
		<div class="input-field col s12">
			<input type="text" class="validate" value="" name="area_package"></input>
			<label for="name">Area de Limpieza (m²)</label>
		</div>
		<div class="input-field col s12">
			<input type="text" class="validate" value="" name="duracion_package"></input>
			<label for="name">Duración (H)</label>
		</div>
		<div class="input-field col s12">
			<input type="text" class="validate" value="" name="precio_package"></input>
			<label for="name">Precio del paquete</label>
		</div>
		<div class="input-field col s12 col-md-12 products">

	     <?php
            
	            $args = array(
					'post_type' => 'st_products',
					'order' => 'ASC'
				);
				$products = get_posts($args);
				if (!empty($products)) {
					foreach ($products as $product) {
						setup_postdata($product);
						//var_dump($prfx_stored_meta);
						?>
						<p class="col-md-4 col-xs-12">
					      <input type="checkbox" id="<?php echo $product->ID; ?>" name="meta_box_checkbox[]" value="<?php echo $product->ID; ?>"/>
					      <label for="<?php echo $product->ID; ?>"><?php echo $product->post_title; ?></label>
					    </p>
						

						<?php
						
						# code...
					}
				}

			
               /* $checkbox_value = get_post_meta($object->ID, "meta-box-checkbox", true);

                if($checkbox_value == "")
                {
                    ?>
                        <input name="meta-box-checkbox" type="checkbox" value="true">
                    <?php
                }
                else if($checkbox_value == "true")
                {
                    ?>  
                        <input name="meta-box-checkbox" type="checkbox" value="true" checked>
                    <?php
                }*/
          ?>
        </div>
		<div class="file-field input-field col s12 photo-area">
	      <div class="btn">
	        <span>Subir</span>
	        <input type="file" name="my_image_upload" id="my_image_upload"  multiple="false" >
	        <?php wp_nonce_field( 'my_image_upload', 'my_image_upload_nonce' ); ?>
	      </div>
	      <div class="file-path-wrapper">
	        <input class="file-path validate" type="text">
	      </div>
	    </div>

		<input type="hidden" value="new_post" name="action"></input>
		
		<div class="b-container">
			<input type="submit" name="submit-package" id="submit-package" class="waves-effect waves-light btn" value="Agregar paquete">
		</div>
		
		<!-- <input type="submit" value="Agregar Servidor" name="save_u"></input> -->
	</form>

<script type="text/javascript">
	var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
</script>
<?php get_footer(); ?>