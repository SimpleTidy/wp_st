<?php
/**
 * Template Name: Login- No header
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
save_users(); 

get_header(); ?>

		<div id="primary" class="site-content">
			<div id="content" role="main" class="contenido-principal">

				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'page' ); ?>
				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->

	<!-- 	<div id="cont-2" class="site-content">

			<div class="mos" style=" background-image: url(<?php bloginfo( 'url' ); ?>/wp-content/themes/tarful-child/images/mos-lo.png?>)">



				<div class="form-login-count">
					<a href="<?php bloginfo( 'url' ); ?>" style="padding: 0px;"><img src="<?php bloginfo( 'url' ); ?>/wp-content/themes/tarful-child/images/logo_lg.png?>"></a>
						<div class="rela-form">
							<div class="registrer hide-form">
								<fieldset class="form-group">

							    <input type="text" class="form-control" id="name" placeholder="nombre completo">

							  </fieldset>
							  <fieldset class="form-group">

							    <input type="email" class="form-control" id="email" placeholder="email">

							  </fieldset>
							  <fieldset class="form-group">

							    <input type="password" class="form-control" id="pasword-crea" placeholder="contraseña">
							  </fieldset>
							   <fieldset class="form-group">

							    <input type="password" class="form-control" id="pasword-crea-re" placeholder="repetir contraseña">
							  </fieldset>
							  <fieldset id="radio" class="form-group">
							  		<label>
								    <input type="radio" name="opciones" id="op1" value="1" checked>
								    <label class="radio">dueño de proyecto</label>
								  </label>
								  <label>
							  		<input type="radio" name="opciones" id="op2" value="2" >
								    <label class="radio">diseñador</label>
								  </label>
							  </fieldset>
							  <fieldset id="errror_m" class="form-group">
							  	<label></label>
							  </fieldset>


							  <button id="savedata" type="submit" class="buttons">crear cuenta</button>
							</div>
							<div class="login">
								<?php
									  $args = array(
					                            'redirect' => home_url().'/mi-cuenta/',
											    'id_username' => 'user',
											    'id_password' => 'pass',
					                            );
					                  wp_login_form($args);

					                  $login  = (isset($_GET['login']) ) ? $_GET['login'] : 0;
					                  if ( $login === "failed" ) {
										    echo '<p class="login-msg"><strong>ERROR:</strong> usuario y/o contraseña errada.</p>';
										} elseif ( $login === "empty" ) {
										    echo '<p class="login-msg"><strong>ERROR:</strong> Usuario y/o Password vacío.</p>';
										}

					                  ?>

					                  <?php

								?>


							</div>

						</div>

				</div>
				<div class="butt-cont cent-cont">
					<div class="as">
							<a  class="buttons-trans bu-log hide-form">login</a>
							<a  class="buttons-trans crea-log">crear cuenta</a>
					</div>
				</div>
			</div>

		</div>#cont-2 --> 


	<div id="formlog">
		<?php
		$login  = (isset($_GET['login']) ) ? $_GET['login'] : 0;
		if ( $login === "failed" ) {
		    echo '<p class="login-msg"><strong>ERROR:</strong> Invalid username and/or password.</p>';
		} elseif ( $login === "empty" ) {
		    echo '<p class="login-msg"><strong>ERROR:</strong> Username and/or Password is empty.</p>';
		} elseif ( $login === "false" ) {
		    echo '<p class="login-msg"><strong>ERROR:</strong> You are logged out.</p>';
		}
		$args = array(
		    'redirect' => home_url(), 
		    'id_username' => 'user',
		    'id_password' => 'pass',
		   ) 
		;?>
		<?php wp_login_form( $args ); ?>
		<a id="reg">No tienes cuenta?. ¡Registrate!</a> 
	</div>
	<div id="formreg">
		
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
			<input type="submit" value="Regístrate" name="save_u" class="btn_reg"></input>
		</form>
		<a id="log">Ya tienes cuenta?. Inicia Sesión</a>
	</div>
		
	</div>
	
<div style="clear:both;"></div>
<?php get_footer(); ?>
