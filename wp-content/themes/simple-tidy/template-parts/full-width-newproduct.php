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

<form action="" method="POST" class="form_product">
	<h1>Hola</h1>
	<div class="input-field">
      <input id="last_name" type="text" class="validate">
      <label for="last_name">Nombre de producto</label>
    </div>
    <div class="input-field">
      <textarea id="textarea1" class="materialize-textarea"></textarea>
      <label for="textarea1">Descripcion</label>
    </div>
	<!-- 
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
		<div class="back2">Atras</div>
		<div id="submit-service">¡Reserva tu servicio ahora!</div>
	</div> -->
	
</form>
<script type="text/javascript">
var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
</script>