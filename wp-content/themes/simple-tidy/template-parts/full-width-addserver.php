<?php
/**
 * Template Name: Add Server
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
 <div class="titleProcessService">
		<div class="titleProcess">Agrega un nuevo servidor a la plataforma</div>
</div>

	<form id="formServer" method="post" class="form_server" enctype="multipart/form-data" onsubmit="return save_servers()">
		
		<div class="alert alert-danger alert-dismissible" role="alert">
	  
		  <strong class="bodymsg"></strong> 
		</div>
		<div class="input-field col s12">
			<input type="text" class="validate" value="" name="i_name"></input>
			<label for="name">Nombre y Apellido</label>
		</div>
		<div class="input-field col s12">
			<input type="text" id="user-server" class="validate" value="" name="i_user"></input>
			<label for="user-server">Usuario</label>
		</div>
		<div class="input-field col s12">
			<input type="text" class="validate" value="" name="i_email"></input>
			<label for="email-server">Email</label>
		</div>
		<div class="input-field col s12">
			<input type="password" class="validate" value="" name="i_pass"></input>
			<label for="password-server">Contraseña</label>
		</div>
		<div class="input-field col s12">
			<input type="password" class="validate" value="" name="i_pass2"></input>
			<label for="re-password-server">Repita Contraseña</label>
		</div>
		<div class="file-field input-field">
	      <div class="btn">
	        <span>Subir</span>
	        <input type="file" name="my_image_upload" id="my_image_upload"  multiple="false" >
	        <?php wp_nonce_field( 'my_image_upload', 'my_image_upload_nonce' ); ?>
	      </div>
	      <div class="file-path-wrapper">
	        <input class="file-path validate" type="text">
	      </div>
	    </div>
		<input type="hidden" value="2" name="i_role"></input>
		
		<div class="b-container">
			<input type="submit" id="submit-server" class="waves-effect waves-light btn" value="Agregar Servidor">
		</div>
		
		<!-- <input type="submit" value="Agregar Servidor" name="save_u"></input> -->
	</form>

<script type="text/javascript">
	var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
</script>
<?php get_footer(); ?>