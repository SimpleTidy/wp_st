<?php
/**
 * Template Name: Show Services Admin
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
<div class="table-responsive">
  <table class="table table-hover">
	  <thead class="thead-inverse">
		<tr>
		  <th>Usuario</th>
		  <th>Fecha</th>
		  <th>Hora</th>
		  <th>Servidor</th>
		  <th>Paquete</th>
		  <th>Monto</th>
		  <th>Estado</th>
		  <th>Ranking</th>
		</tr>
	  </thead>
	  <tbody>
	    <?php 
			$service_query = new WP_Query( array('post_type' => 'st_service') ); 
			if ( $service_query->have_posts() ) {
				while ( $service_query->have_posts() ) {
					$service_query->the_post();
					$meta = get_post_meta($service_query->post->ID);
					$user_info = get_userdata($meta["user"][0]);
					$server_info = 	get_userdata($meta["server"][0]);
					/*echo $meta["date_service"][0];
					echo $meta["estado"][0];
					echo $meta["hora_inicio"][0];
					echo $meta["hora_fin"][0];
					echo $meta["direccion"][0];
					echo $meta["price"][0];*/
					//echo $user_info->first_name;
					
					//echo $user_info->user_login;
					//var_dump($meta);
					?>
					
					<tr>
				      	
					      <td><div class="profile_pic"><?php echo get_avatar( $user_info->ID );?></div><?php echo $user_info->user_login;?></td>
					      <td><?php echo $meta["date_service"][0]?></td>
					      <td><?php echo $meta["hora_inicio"][0]."-".$meta["hora_fin"][0]?></td>
					      <td><div class="profile_pic"><?php echo get_avatar( $user_info->ID );?></div><?php echo $server_info->user_login;?></td>
					      <td><?php $package =get_post($meta["package"][0]); echo $package->post_title;?></td>
					      <td><?php echo $meta["price"][0]?></td>
					      <td><?php echo$meta["estado"][0]?></td>
					      <td><?php echo $meta["ranking"][0];?></td>
					      <td><a href="<?php echo get_permalink(); ?>" >ver detalles</a></td>
					    
				    </tr>
				  
					<?php
					
				}
			}
		?>
	  </tbody>
  </table>
</div>
 
	
