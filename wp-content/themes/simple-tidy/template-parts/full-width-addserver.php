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
 <h1>Agrega un nuevo servidor a la plataforma</h1>
 <div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong class="bodymsg"></strong> 
</div>
 <form class="form_server">
	
	<form method="post" >
		<input type="text" class="col-md-12" placeholder="Nombre y Apellido" value="" name="i_name"></input>
		<input type="text" class="col-md-12" placeholder="Usuario" value="" name="i_user"></input>
		<input type="text" class="col-md-12" placeholder="Email" value="" name="i_email"></input>
		<input type="text" class="col-md-12" placeholder="Contraseña" value="" name="i_pass"></input>
		<input type="text" class="col-md-12" placeholder="Repita contraseña" value="" name="i_pass2"></input>
		<input type="hidden" value="2" name="i_role"></input>
		<div id="submit-server">Agregar Servidor</div>
		<!-- <input type="submit" value="Agregar Servidor" name="save_u"></input> -->
	</form>
</form>