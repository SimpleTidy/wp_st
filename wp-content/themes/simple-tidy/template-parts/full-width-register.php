<?php
/**
 * Template Name: Register- No header
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
get_header();?>

	<div class="content-reg">
		<img src="<?php bloginfo('template_url');?>/images/st-logo.png" class="img-logo-register">
			
		<div id="formreg">
			<?php save_users();?>
			<form method="post" action="" onsubmit="return save_users()">
				<div class="input-field col s12">
		          <input type="text" class="validate" value="" name="i_name"></input>
				  <label for="last_name">Nombre</label>
		        </div>
		        <div class="input-field col s12">
		          <input type="text" class="validate" value="" name="i_user"></input>
				  <label for="last_name">Usuario</label>
		        </div>
		        <div class="input-field col s12">
		          <input type="text" class="validate" value="" name="i_email"></input>
				  <label for="last_name">Correo</label>
		        </div>
		        <div class="input-field col s12">
		          <input type="password" class="validate" value="" name="i_pass"></input>
				  <label for="last_name">Contraseña</label>
		        </div>
		        <div class="input-field col s12">
		          <input type="password" class="validate" value="" name="i_pass2"></input>
				  <label for="last_name">Repita contraseña</label>
		        </div>
				
				
				
				<input type="hidden" value="1" name="i_role"></input>
				<div class="b-container">
					<input type="submit" value="Regístrate" name="save_u" class="waves-effect waves-light btn"></input>
				</div>
				
			</form>
			<div>Ya tienes cuenta?. <a href="<?php bloginfo('url');?>/login/">Inicia Sesión</a></div>
		</div>
	</div>
	
		
	</div>
	
<div style="clear:both;"></div>
<?php get_footer();?>
