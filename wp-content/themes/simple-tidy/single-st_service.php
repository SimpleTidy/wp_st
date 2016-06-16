<?php
/**
 * Template Name: Seccion de Proyectos
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

<?php

/*

	Para ver el detalle del diseño se debe validar si el usuario es
	propietario o si el diseñador es el dueño del diseño, sería así:

	if((user_type()==1) || (is_my_design($id_design)))

*/

?>
<?php
	global $id;
	$id = get_the_ID();
	$meta = get_post_meta($id);




?>

<h1><?php echo $id; var_dump($meta);?></h1>	
<div id="map"></div>

<script type="text/javascript">
var map;
function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: -34.397, lng: 150.644},
    zoom: 8
  });
}
</script>

<?php get_footer(); ?>