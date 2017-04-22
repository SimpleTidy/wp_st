<?php
/**
 * Template Name: Add Product
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
		<div class="titleProcess">Agrega un nuevo producto a la plataforma</div>
</div>

	<form id="formServer" method="post" class="form_server" enctype="multipart/form-data" onsubmit="return save_product()">
		<?php 
			$response = save_product();
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
							location.reload();
						</script>
				<?php 

						}
				} 
				unset($response);
			} ?>
		
		<div class="input-field col s12">
			<input type="text" class="validate" value="" name="title" id="title"></input>
			<label for="name">Nombre del producto</label>
		</div>
		<div class="input-field col s12">
			<textarea id="description" class="materialize-textarea" name="description"></textarea>
          	<label for="textarea1">Descripcion del producto</label>
		</div>
		<input type="hidden" name="action" value="new_post"></input>
		
		<div class="b-container">
			<input type="submit" name="submit-product" id="submit-product" class="waves-effect waves-light btn" value="Agregar producto">
		</div>
		
		<!-- <input type="submit" value="Agregar Servidor" name="save_u"></input> -->
	</form>

<script type="text/javascript">
	var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
</script>
<?php get_footer(); ?>