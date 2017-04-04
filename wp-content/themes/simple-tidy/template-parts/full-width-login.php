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
			<img src="<?php bloginfo('template_url');?>/images/st-logo.png" class="img-logo-login">
			<?php
			$login  = (isset($_GET['login']) ) ? $_GET['login'] : 0;
			if ( $login === "failed" ) {
			    echo '<p class="login-msg"><strong>ERROR:</strong> Usurio o contraseña incorrecta.</p>';
			} elseif ( $login === "empty ") {
			    echo '<p class="login-msg"><strong>ERROR:</strong> Usurio o contraseña vacios.</p>';
			} elseif ( $login === "false") {
			    echo '<p class="login-msg"><strong>ERROR:</strong> Has cerrado sesión.</p>';
			}
			$args = array(
			    'redirect' => home_url(), 
			    'id_username' => 'user',
			    'id_password' => 'pass',
			   ) 
			;?>
			<?php wp_login_form( $args ); ?>
			<div>No tienes cuenta?. <a href="<?php bloginfo('url');?>/register/">Regístrate</a></div>
		</div>
		
			
	</div>
	
<div style="clear:both;"></div>
<?php get_footer(); ?>
