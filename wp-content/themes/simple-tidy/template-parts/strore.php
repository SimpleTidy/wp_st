<?php 
					$current_user = wp_get_current_user(); 
					if (current_user_can('administrator') ) {?>
					<!-- ADMIN PERMISSIONS -->
					<div class="partial_server content-panel init panel"><?php charge_template_server(); ?>
					</div>
					<div class="partial_all_services content-panel init panel"> <?php charge_template_allservice(); ?>
					</div>
					<div class="partial_new_product content-panel init panel"> <?php charge_template_newproduct(); ?>
					</div>
					<!-- END ADMIN PERMISSIONS-->
					<?php } ?>

				<?php if (current_user_can('client_role') ) {?>
				<!-- USER PERMISSIONS -->
				<div class="partial_service content-panel init panel"><?php charge_template_service(); ?></div>
				<div class="partial_all_services_user content-panel init panel"> <?php charge_template_allservice_user(); ?>
				</div>
				<!-- END USER PERMISSIONS-->
				<?php } ?>

				<?php $current_user = wp_get_current_user(); 
					if (current_user_can('server_role') ) {?>
				<!-- SERVER PERMISSIONS -->
				<div class="partial_all_services_server content-panel init panel"> <?php charge_template_allservice_server(); ?>
				</div>
				<!-- END SERVER PERMISSIONS-->
				<?php } ?>