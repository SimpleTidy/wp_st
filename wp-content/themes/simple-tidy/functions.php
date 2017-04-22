<?php @ob_start();?>
<?php
/**
 * Simple Tidy functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Simple_Tidy
 */

if ( ! function_exists( 'simple_tidy_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function simple_tidy_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Simple Tidy, use a find and replace
	 * to change 'simple-tidy' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'simple-tidy', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'simple-tidy' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'simple_tidy_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'simple_tidy_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function simple_tidy_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'simple_tidy_content_width', 640 );
}
add_action( 'after_setup_theme', 'simple_tidy_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function simple_tidy_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'simple-tidy' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'simple_tidy_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function simple_tidy_scripts() {
	wp_enqueue_style( 'simple-tidy-style', get_stylesheet_uri() );

	wp_enqueue_script( 'simple-tidy-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'simple-tidy-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'simple_tidy_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/************************FUNCIONES BASICAS DEL BACKEND**********************************************/
function remove_admin_login_header() {
	
		    //show_admin_bar( false );
		    add_filter( 'show_admin_bar', '__return_false' );
		
	
}
add_action( 'init', 'st_post_type_package' );
/*AGREGANDO TAXONOMIAS PARA LOS paquetes*/

add_action( 'init', 'package_taxonomies' );

function package_taxonomies() {
	$label = array(
	'name' => _x( 'Categorías', 'taxonomy general name' ),
	'singular_name' => _x( 'Categoría', 'taxonomy singular name' ),
	'search_items' =>  __( 'Buscar por Categoría' ),
	'all_items' => __( 'Todos los Categorías' ),
	'parent_item' => __( 'Categoría padre' ),
	'parent_item_colon' => __( 'Categoría padre:' ),
	'edit_item' => __( 'Editar Categoría' ),
	'update_item' => __( 'Actualizar Categoría' ),
	'add_new_item' => __( 'Añadir nuevo Categoría' ),
	'new_item_name' => __( 'Nombre del nuevo Categoría' ),
);
	register_taxonomy( 'categoria_paquete', 'st_package', array(
		'hierarchical' => true,
		'labels' => $label,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'categoria_paquete' ),
	));
}


function st_post_type_package() {
	register_post_type( 'st_package',
		array(
			'labels' => array(
			    'name' => _x('Paquetes', 'post type general name'),
			    'singular_name' => _x('Paquetes', 'post type singular name'),
			    'add_new' => _x('Agregar Nuevo', 'Paquetes'),
			    'add_new_item' => __('Agregar nuevo Paquete'),
			    'edit_item' => __('Editar Paquete'),
			    'new_item' => __('Nuevo Paquetes'),
			    'all_items' => __('Todos los Paquetes'),
			    'view_item' => __('Ver Paquetes'),
			    'search_items' => __('Buscar Paquete'),
			    'not_found' =>  __('Ningún paquetes encontrado'),
			    'not_found_in_trash' => __('Ningún paquete en papelera'),
			    'parent_item_colon' => '',
			    'menu_name' => 'Paquete'
			),
		'public' => true,
	    'publicly_queryable' => true,
	    'show_ui' => true,
	    'show_in_menu' => true,
	    'query_var' => true,
	    'rewrite' => false,
	    'capability_type' => 'post',
	    'has_archive' => true,
	    'hierarchical' => false,
	    'menu_position' => 5,
  		'supports' => array( 'title', 'editor','author', 'revisions','thumbnail')

		)
	);
}

// Asociatate custom post type with a permalink

global $wp_rewrite;
$package_structure = 'paquetes/%st_package%/';
$wp_rewrite->add_rewrite_tag("%st_package%", '([^/]+)', "st_package=");
$wp_rewrite->add_permastruct('st_package', $package_structure, false);



// Create custom post type products
add_action( 'init', 'st_post_type_products' );

function st_post_type_products() {
	register_post_type( 'st_products',
		array(
			'labels' => array(
			    'name' => _x('Productos', 'post type general name'),
			    'singular_name' => _x('Productos', 'post type singular name'),
			    'add_new' => _x('Agregar Nuevo', 'Productos'),
			    'add_new_item' => __('Agregar nuevo Producto'),
			    'edit_item' => __('Editar Producto'),
			    'new_item' => __('Nuevo Producto'),
			    'all_items' => __('Todos los Productos'),
			    'view_item' => __('Ver Productos'),
			    'search_items' => __('Buscar Productos'),
			    'not_found' =>  __('Ningún producto encontrado'),
			    'not_found_in_trash' => __('Ningún producto en papelera'),
			    'parent_item_colon' => '',
			    'menu_name' => 'Productos'
			),
		'public' => true,
	    'publicly_queryable' => true,
	    'show_ui' => true,
	    'show_in_menu' => true,
	    'query_var' => true,
	    'rewrite' => false,
	    'capability_type' => 'post',
	    'has_archive' => true,
	    'hierarchical' => false,
	    'menu_position' => 5,
  		'supports' => array( 'title', 'editor','author', 'revisions','thumbnail')

		)
	);
}

// Asociatate custom post type with a permalink

global $wp_rewrite;
$product_structure = 'productos/%st_products%/';
$wp_rewrite->add_rewrite_tag("%st_products%", '([^/]+)', "st_products=");
$wp_rewrite->add_permastruct('st_products', $product_structure, false);


// Create custom post type
add_action( 'init', 'st_post_type_service' );

function st_post_type_service() {
	register_post_type( 'st_service',
		array(
			'labels' => array(
			    'name' => _x('Servicios', 'post type general name'),
			    'singular_name' => _x('Servicio', 'post type singular name'),
			    'add_new' => _x('Agregar Nuevo', 'Servicios'),
			    'add_new_item' => __('Agregar nuevo Servicio'),
			    'edit_item' => __('Editar Servicio'),
			    'new_item' => __('Nuevo Servicio'),
			    'all_items' => __('Todos los Servicios'),
			    'view_item' => __('Ver Servicio'),
			    'search_items' => __('Buscar Servicio'),
			    'not_found' =>  __('Ningún servicio encontrado'),
			    'not_found_in_trash' => __('Ningún servicio en papelera'),
			    'parent_item_colon' => '',
			    'menu_name' => 'Servicios'
			),
		'public' => true,
	    'publicly_queryable' => true,
	    'show_ui' => true,
	    'show_in_menu' => true,
	    'query_var' => true,
	    'rewrite' => false,
	    'capability_type' => 'post',
	    'has_archive' => true,
	    'hierarchical' => false,
	    'menu_position' => 5,
  		'supports' => array( 'title', 'editor','author', 'revisions')

		)
	);
}

// Asociatate custom post type with a permalink

global $wp_rewrite;
$service_structure = 'servicios/%st_service%/';
$wp_rewrite->add_rewrite_tag("%st_service%", '([^/]+)', "st_service=");
$wp_rewrite->add_permastruct('st_service', $service_structure, false);

/*AGREGANDO TAXONOMIAS PARA LOS SERVICIOS*/

add_action( 'init', 'create_service_taxonomies' );

function create_service_taxonomies() {
	$labels = array(
	'name' => _x( 'Categorías', 'taxonomy general name' ),
	'singular_name' => _x( 'Categoría', 'taxonomy singular name' ),
	'search_items' =>  __( 'Buscar por Categoría' ),
	'all_items' => __( 'Todos los Categorías' ),
	'parent_item' => __( 'Categoría padre' ),
	'parent_item_colon' => __( 'Categoría padre:' ),
	'edit_item' => __( 'Editar Categoría' ),
	'update_item' => __( 'Actualizar Categoría' ),
	'add_new_item' => __( 'Añadir nuevo Categoría' ),
	'new_item_name' => __( 'Nombre del nuevo Categoría' ),
);
register_taxonomy( 'categoria', 'st_service', array(
	'hierarchical' => true,
	'labels' => $labels,
	'show_ui' => true,
	'query_var' => true,
	'rewrite' => array( 'slug' => 'categoria' ),
));
}

/*FUNCION PARA ELIMINAR TITULOS Y DESCRIPCION DE POST TYPES*/
function mvandemar_remove_post_type_support() {
    remove_post_type_support( 'st_service', 'title' );
    remove_post_type_support( 'st_service', 'editor' );
}
add_action( 'init', 'mvandemar_remove_post_type_support' );



/*AGREGA ROLES A LOS USUARIOS*/

add_action( 'admin_init', 'st_rols' );

function st_rols(){
	add_role('client_role', 'Cliente', array(
	    'read' => true,
	    'edit_posts' => true,
	    'delete_posts' => false,
	));
	add_role('server_role', 'Servidor', array(
	    'read' => true,
	    'edit_posts' => true,
	    'delete_posts' => false,
	));

}
function mh_load_my_script() {
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js'	);
}
add_action( 'wp_enqueue_scripts', 'mh_load_my_script' );

function save_users(){
	global $wpdb, $current_user;
	if (isset($_POST['save_u'])) {
		if (!empty($_POST['i_name']) && !empty($_POST['i_role']) && !empty($_POST['i_user']) && !empty($_POST['i_email']) && !empty($_POST['i_pass']) && !empty($_POST['i_pass2'])) {
			if ($_POST['i_pass'] == $_POST['i_pass2']) {
				if (!email_exists( $_POST['i_email']) && !username_exists( $_POST['i_user'] )) {
					
					$id_user = wp_create_user( $_POST['i_user'], $_POST['i_pass'], $_POST['i_email'] );
					
					$user = new WP_User($id_user);

					if ($_POST['i_role'] == 1) {
		                $user->add_role( 'client_role' );

		            }
		            if ($_POST['i_role'] == 2) {
		                $user->add_role( 'server_role' );

		            }
					wp_set_current_user($id_user);
					wp_set_auth_cookie( $id_user);
            		$login_page  = home_url();
    				wp_redirect( $login_page."/dashboard/");
				}else{
					?>
						<div class="error" style="color: red;"><p class="login-msg">El usuario o el mail ya existen en nuestra plataforma</p></div>
						<?php
						return;
					}
			}else{

				?>
				<div class="error" style="color: red;"><p class="login-msg">Contraseñas no coinciden</p></div>
				<?php
				return;
			}
			//$login_page  = home_url();
    		//wp_redirect( $login_page );
		}else{
			if (empty($_POST['i_name']) or empty($_POST['i_name']) or empty($_POST['i_user']) or empty($_POST['i_email']) or empty($_POST['i_pass']) or empty($_POST['i_pass2'])) {
				# code...
				?>
				<div class="error" style="color: red;"><p class="login-msg"> Tiene campos vacios</p></div>
				<?php
				return;
			}

			
			
		}
		
		
	}
}
add_action('wp_ajax_save_servers', 'save_servers');
add_action('wp_ajax_nopriv_save_servers', 'save_servers');

function save_servers(){
	if(isset($_POST['submit-server'])) {

	
		global $wpdb, $current_user;
		/*if (isset($_POST['save_u'])) {*/
			if (isset($_POST['my_image_upload_nonce'] ) && wp_verify_nonce( $_POST['my_image_upload_nonce'], 'my_image_upload' ) && !empty($_POST['i_name']) && !empty($_POST['i_role']) && !empty($_POST['i_user']) && !empty($_POST['i_email']) && !empty($_POST['i_pass']) && !empty($_POST['i_pass2'])) {
				if ($_POST['i_pass'] == $_POST['i_pass2']) {
					if (email_exists( $_POST['i_email']) == false && username_exists( $_POST['i_user']  ) == false) {

						
						
						$id_user = wp_create_user( $_POST['i_user'], $_POST['i_pass'], $_POST['i_email'] );
						
						$user = new WP_User($id_user);

						if ($_POST['i_role'] == 1) {
			                $user->add_role( 'client_role' );

			            }
			            if ($_POST['i_role'] == 2) {
			                $user->add_role( 'server_role' );

			            }
			            require_once( ABSPATH . 'wp-admin/includes/image.php' );
						require_once( ABSPATH . 'wp-admin/includes/file.php' );
						require_once( ABSPATH . 'wp-admin/includes/media.php' );
						
						// Let WordPress handle the upload.
						// Remember, 'my_image_upload' is the name of our file input in our form above.
						$attachment_id = media_handle_upload( 'my_image_upload', 0);
						$attachment_url = basename (get_attached_file( $attachment_id ));
						
						$user_id = wp_update_user( array( 'ID' => $id_user, 'first_name' => $_POST['i_name'] ) );
						update_user_meta( $id_user, 'id_foto', $attachment_id );

						if ( is_wp_error( $attachment_id ) ) {
							$resp = array('error' => true,'msg' => "Ocurrio un error subiendo la imagen de perfil al servidor");
							return $resp;
							die();
						} else {
							$resp = array('error' => false,'msg' => "Servidor creado con exito");
							return $resp;
							die();
						}
					}else{
						$resp = array('error' => true,'msg' => "El usuario o el mail ya existen en nuestra plataforma");
						return $resp;
						die();
					}
				}else{
					$resp = array('error' => true,'msg' => "Las contraseñas no coinciden");
					return $resp;
					die();
				}
			}else{
				if (empty($_POST['i_name']) or empty($_POST['i_name']) or empty($_POST['i_user']) or empty($_POST['i_email']) or empty($_POST['i_pass']) or empty($_POST['i_pass2'])) {
					# code...
					$resp = array('error' => true,'msg' => "Tiene campos vacios");
					return $resp;
					die();
				}

				
				
			}
			
			
		/*}*/
	}
}
/*add_action( 'login_form_middle', 'add_lost_password_link' );
function add_lost_password_link() {
    return '<a href="/wp-login.php?action=lostpassword" class="forgot" >olvide contraseña</a>';
}*//**/
function admin_default_page() {
  return home_url("/dashboard/");
}

add_filter('login_redirect', 'admin_default_page');
function login_failed() {
    $login_page  = home_url( '/login/' );
    wp_redirect( $login_page . '?login=failed' );
    ?>
    <div class="error" style="color: red;">Error, datos incorrectos</div>
    <?php
    exit;
}
add_action( 'wp_login_failed', 'login_failed' );

function verify_username_password( $user, $username, $password ) {
    $login_page  = home_url( '/login/' );
    if( $username == "" || $password == "" ) {
        wp_redirect( $login_page . "?login=empty" );
        exit;
    }
}
function logout_page() {
    $login_page  = home_url( '/login/' );
    wp_redirect( $login_page );
    exit;
}
add_action('wp_logout','logout_page');
add_filter( 'authenticate', 'verify_username_password', 1, 3);

/* PROBANDO METABOXES */
function custom_meta_box_markup($post)
{
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");
    $prfx_stored_meta = get_post_meta( $post->ID , 'meta-product');

    ?>

        <div>
        

            
            <?php
            
            $args = array(
				'post_type' => 'st_products'
			);
			$products = get_posts($args);
			if (!empty($products)) {
				foreach ($products as $product) {
				setup_postdata($product);
				//var_dump($prfx_stored_meta);
				?>

				<label for="<?php echo $product->ID; ?>">
				<input type="checkbox" name="meta-box-checkbox[]" id="<?php echo $product->ID; ?>" value="<?php echo $product->ID; ?>" <?php 
				if (!empty($prfx_stored_meta[0])) {
					$products_store =  $prfx_stored_meta[0];
					if (!empty($products_store)) {
						foreach ($products_store as $product_store) {
						if ($product->ID == $product_store) {
							echo "checked";
						}
					}
					}
				}
				
				
				//echo $product->ID; 
				?>>
				<?php echo $product->post_title; ?></label><br>

				<?php
				
				# code...
			}
			}

			
               /* $checkbox_value = get_post_meta($object->ID, "meta-box-checkbox", true);

                if($checkbox_value == "")
                {
                    ?>
                        <input name="meta-box-checkbox" type="checkbox" value="true">
                    <?php
                }
                else if($checkbox_value == "true")
                {
                    ?>  
                        <input name="meta-box-checkbox" type="checkbox" value="true" checked>
                    <?php
                }*/
            ?>
        </div>
    <?php  
}

function add_custom_meta_box()
{
    add_meta_box("demo-meta-box", "Elige los productos para este paquete", "custom_meta_box_markup", "st_package", "normal", "high", null);
}

add_action("add_meta_boxes", "add_custom_meta_box");

function save_custom_meta_box($post_id, $post, $update)
{
    if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
        return $post_id;

    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;

    // Checks for input and saves
    //if (isset($_POST[ 'meta-checkbox' ])) {
    	$products_array = array();
    	$productos = $_POST[ 'meta-box-checkbox' ];
	    for($i=0; $i < count($productos); $i++){
		   echo $productos[$i];
		   if (isset($productos[$i])) {
		   		$products_array[] = $productos[$i];
		   }
		   
		}

		update_post_meta( $post_id, 'meta-product', $products_array );
    //}
    
	/*if( isset( $_POST[ 'meta-checkbox' ] ) ) {
	    update_post_meta( $post_id, 'meta-checkbox', 'yes' );
	} else {
	    update_post_meta( $post_id, 'meta-checkbox', '' );
	}*/
}

add_action("save_post", "save_custom_meta_box", 10, 3);



/*AGREGA LOS META A LOS SERVICIOS, CLIENTE,SERVICIO,PAQUETE*/
function custom_meta_box_package($post)
{
    	$values = get_post_custom( $post->ID );
			$args = array(
				'post_type' => 'st_package'
			);
			$packages = get_posts($args);
			//var_dump( $packages)
			// print_r($values);
			
		?>

		    <p>

		        <select name="box_package" id="box_package">
		        	<?php foreach ($packages as $package): setup_postdata($package);?>
			            <option value="<?php echo $package->ID; ?>" <?php if(!empty($values) && ($values['package'][0] == $package->ID)) echo 'selected' ?>><?php echo ucwords($package->post_title); ?></option>
			        <?php endforeach; ?>
		        </select>
		    </p>
		<?php
}
function custom_meta_box_users($post)
{
    	$values = get_post_custom( $post->ID );
			$args = array(
				'role' => 'client_role',
				'order' => 'ASC'
			);
			$clients = get_users($args);
			// print_r($values);
			
		?>

		    <p>

		        <select name="box_user" id="box_user">
		        	<?php foreach ($clients as $client): ?>
			            <option value="<?php echo $client->ID; ?>" <?php if(!empty($values) && ($values['user'][0] == $client->ID)) echo 'selected' ?>><?php echo ucwords($client->display_name); ?></option>
			        <?php endforeach; ?>
		        </select>
		    </p>
		<?php
}
function custom_meta_box_server($post)
{
    	$values = get_post_custom( $post->ID );
			$args = array(
				'role' => 'server_role',
				'order' => 'ASC'
			);
			$servers = get_users($args);
			// print_r($values);
			
		?>
		    <p>
		        <select name="box_server" id="box_server">
		        	<?php foreach ($servers as $server): ?>
			            <option value="<?php echo $server->ID; ?>" <?php if(!empty($values) && ($values['server'][0] == $server->ID)) echo 'selected' ?>><?php echo ucwords($server->display_name); ?></option>
			        <?php endforeach; ?>
		        </select>
		    </p>
		<?php
}
function custom_meta_box_service($post)
{
    	$values = get_post_custom( $post->ID );
			$args = array(
				'post_type' => 'st_service'
			);
			$services = get_posts($args);
			//var_dump( $services)
			//print_r($values);
			
		?>

		    <p>

		        <select name="box_service" id="box_service">
		        	<?php foreach ($services as $service): setup_postdata($service);?>
			            <option value="<?php echo $service->ID; ?>" 
			            	<?php if(!empty($values) && ($values['service'][0] == $service->ID)) echo 'selected' ?>>
			            		<?php echo ucwords($service->ID); ?>
			            	
			            </option>
			        <?php endforeach; ?>
		        </select>
		    </p>
		<?php
}
function add_custom_meta_box_users()
{
    add_meta_box("demo-meta-box-user", "Elige el usuario que solicita el servicio", "custom_meta_box_users", "st_service", "normal", "high", null);
    
}
function add_custom_meta_box_servers()
{
    
   add_meta_box("demo-meta-box-server", "Elige la persona hará el servicio", "custom_meta_box_server", "st_service", "normal", "high", null);
}
function add_custom_meta_box_package()
{
    
   add_meta_box("demo-meta-box-package", "Elige el paquete para este servicio", "custom_meta_box_package", "st_service", "normal", "high", null);
}
function add_custom_meta_box_services()
{
    add_meta_box("demo-meta-box-service", "Elige el Servicio a pagar", "custom_meta_box_service", "st_page", "normal", "high", null);
    
}
add_action("add_meta_boxes", "add_custom_meta_box_users");
add_action("add_meta_boxes", "add_custom_meta_box_servers");
add_action("add_meta_boxes", "add_custom_meta_box_package");
add_action("add_meta_boxes", "add_custom_meta_box_services");

/*GUARDAMOS LOS METAFIELDS DE LOS POST*/

add_action( 'save_post', 'box_services_save' );
function box_services_save( $post_id ){
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    global $post;
    if ($post->post_type == 'st_service'){

	    if( isset( $_POST['box_server'] ) )
	        update_post_meta( $post_id, 'server', esc_attr( $_POST['box_server'] ) );
	    if( isset( $_POST['box_user'] ) )
	        update_post_meta( $post_id, 'user', esc_attr( $_POST['box_user'] ) );
	    if( isset( $_POST['box_package'] ) )
	        update_post_meta( $post_id, 'package', esc_attr( $_POST['box_package'] ) );

        update_post_meta( $post_id, 'ranking', 0);
    }
    if ($post->post_type == 'st_page'){

	    if( isset( $_POST['box_service'] ) )
	        update_post_meta( $post_id, 'service', esc_attr( $_POST['box_service'] ) );
	  
    }

}

/*CARGA DE PARTIALS EN LA PLATAFORMA*/

add_action( 'admin_enqueue_scripts', 'my_enqueue' );
function my_enqueue($hook) {
    if( 'index.php' != $hook ) {
	// Only applies to dashboard panel
	return;
    }
        
	wp_enqueue_script( 'ajax-script', plugins_url( '/js/script.js', __FILE__ ), array('jquery') );

	// in JavaScript, object properties are accessed as ajax_object.ajax_url, ajax_object.we_value
	wp_localize_script( 'ajax-script', 'ajax_object',
            array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'we_value' => 1234 ) );
}
function charge_template_allservice_server() {
	get_template_part( 'template-parts/full-width','showservicesserver' );
	return;
}
function charge_template_allservice_user() {
	get_template_part( 'template-parts/full-width','showservicesuser' );
	return;
}
function charge_template_allservice() {
	get_template_part( 'template-parts/full-width','showservices' );
	return;
}
function charge_template_server() {
	get_template_part( 'template-parts/full-width','addserver' );
	return;
}
add_action('wp_ajax_charge_template_server', 'charge_template_server');
add_action('wp_ajax_nopriv_charge_template_server', 'charge_template_server');


function charge_template_service() {
	get_template_part( 'template-parts/full-width','addservice' );
	return;
}
add_action('wp_ajax_charge_template_service', 'charge_template_service');
add_action('wp_ajax_nopriv_charge_template_service', 'charge_template_service');

function charge_template_newproduct() {
	get_template_part( 'template-parts/full-width','newproduct' );
	return;
}
add_action('wp_ajax_charge_template_newproduct', 'charge_template_newproduct');
add_action('wp_ajax_nopriv_charge_template_newproduct', 'charge_template_newproduct');

/*FIN CARGA DE PARTIALS EN LA PLATAFORMA*/

function data_service_form(){
	// prepare arguments
	$args  = array(
	// search only for Authors role
	'role' => 'server_role',
	'meta_key' => 'id_foto',
	// order results by display_name
	'orderby' => 'display_name'  );
	$users_query = new WP_User_Query( $args );
	$users = $users_query->get_results();
	return $users;
}
function data_service_form_package(){

	$package_query = new WP_Query(
						array( 
					        'post_type' => 'st_package'
					    ) ); 
	
	return $package_query;
}
function check_sercivices($hi,$he,$date,$server){
	
$init = date( 'H:i:s', strtotime($hi) );
$end = date( 'H:i:s', strtotime($he) );
$args = array(
    'post_type'  => 'st_service',
    'meta_query' => array(
       'relation' => 'AND',
        array(
            'key'     => 'server',
            'value'   => $server
        ),
        array(
            'key'     => 'estado',
            'value'   => 'Abierto'
        )
        ,
        array(
            'key'     => 'date_service',
            'value'   => $date
        )
        ,
        array(
        	'relation' => 'OR',
	       
	        array(
	            'key'     => 'hora_inicio',
	            'value'   => array($init, $end ),
	            'compare'   => 'BETWEEN',
	            'type'   => 'NUMERIC'
	        ),
	        array(
	            'key'     => 'hora_fin',
	            'value'   => array($init, $end ),
	            'compare'   => 'BETWEEN',
	            'type'   => 'NUMERIC'
	        )
 			
        	
           

        )
        
    )
);
$search_query = new WP_Query( $args );

$min_max_values = array();
if ( $search_query->have_posts() ) {

    while( $search_query->have_posts() ) {

        $search_query->the_post();
        array_push( $min_max_values, get_the_ID() );

    }

}
wp_reset_postdata();
$resp = count($min_max_values);
return $resp;
}
function save_sercivices(){
	$client = get_current_user_id();
	$who = $_POST['who'];
	$package = $_POST['package'];

	$date = $_POST['date'];
	$hinit = $_POST['hinit'];
	$hfinal = $_POST['hfinal'];
	$dir = $_POST['dir'];
	$price = $_POST['price'];
	$estado = "Abierto";
	$ranking = 0;

	
	
	
	if ( !empty($who) || !empty($package) || !empty($date) || !empty($hinit) || !empty($hfinal) || !empty($dir) || !empty($price)) {
		$resp = check_sercivices($hinit,$hfinal,$date,$who);

		if ($resp == 1) {
			echo $resp;
			die();
		}
		if ($resp == 0) {
			// Create post object
			$field_data = array(
				'date_service' => $date,
				'estado' => $estado,
				'hora_inicio' => $hinit,
				'hora_fin' => $hfinal,
				'direccion' => $dir,
				'price' => $price,
			);
			$post_data = array(
								'post_type' => 'st_service',
								'post_status' => 'publish'
								);
			$post_id = CFS()->save( $field_data, $post_data );
			update_post_meta( $post_id, 'package', $package );
    		update_post_meta( $post_id, 'user', $client );
    		update_post_meta( $post_id, 'server', $who);
    		update_post_meta( $post_id, 'ranking', $ranking);
			
		}
	}

	
}
add_action('wp_ajax_save_sercivices', 'save_sercivices');
add_action('wp_ajax_nopriv_save_sercivices', 'save_sercivices');

// Create custom post type for page
add_action( 'init', 'st_post_type_page' );

function st_post_type_page() {
	register_post_type( 'st_page',
		array(
			'labels' => array(
			    'name' => _x('Pagos', 'post type general name'),
			    'singular_name' => _x('Pago', 'post type singular name'),
			    'add_new' => _x('Agregar Nuevo', 'Pagos'),
			    'add_new_item' => __('Agregar nuevo Pago'),
			    'edit_item' => __('Editar Pago'),
			    'new_item' => __('Nuevo Pago'),
			    'all_items' => __('Todos los Pagos'),
			    'view_item' => __('Ver Pago'),
			    'search_items' => __('Buscar Pago'),
			    'not_found' =>  __('Ningún servicio encontrado'),
			    'not_found_in_trash' => __('Ningún servicio en papelera'),
			    'parent_item_colon' => '',
			    'menu_name' => 'Pagos'
			),
		'public' => true,
	    'publicly_queryable' => true,
	    'show_ui' => true,
	    'show_in_menu' => true,
	    'query_var' => true,
	    'rewrite' => false,
	    'capability_type' => 'post',
	    'has_archive' => true,
	    'hierarchical' => false,
	    'menu_position' => 5,
  		'supports' => array( 'title', 'editor','author', 'revisions')

		)
	);
}

// Asociatate custom post type with a permalink

global $wp_rewrite;
$page_structure = 'pagos/%st_page%/';
$wp_rewrite->add_rewrite_tag("%st_page%", '([^/]+)', "st_page=");
$wp_rewrite->add_permastruct('st_page', $page_structure, false);

add_action('wp_ajax_save_page', 'save_page');
add_action('wp_ajax_nopriv_save_page', 'save_page');

function save_page(){
	

	$client = get_current_user_id();
	$transaccion = $_POST['transaccion'];
	$nameTrans = $_POST['nameTrans'];

	$lastnameTrans = $_POST['lastnameTrans'];
	$mountTrans = $_POST['mountTrans'];
	$dateTrans = $_POST['dateTrans'];
	$statusTrans = $_POST['statusTrans'];
	$i_service = $_POST['service'];
	
	if (  !empty($transaccion) || !empty($nameTrans) || !empty($lastnameTrans) || !empty($mountTrans) || !empty($dateTrans) || !empty($statusTrans) || !empty($i_service)) {
		
			// Create post object
			$field_data = array(
				'name' => $nameTrans,
				'n_trans' => $transaccion,
				'lastname' => $lastnameTrans,
				'mount_transac' => $mountTrans,
				'date_transac' => $dateTrans,
				'status_mount' => "Por Confirmar"
			);
			$post_data = array(
								'post_type' => 'st_page',
								'post_status' => 'publish'
								);
			$post_id = CFS()->save( $field_data, $post_data );
			update_post_meta( $post_id, 'service', $i_service );
			$resp = array('error' => false, 'content' => "El pago fue registrado con exito",'data' => get_post_meta($post_id));
			echo json_encode($resp);
			die();
			
		
	}else{
		$resp = array('error' => true, 'content' => "No pueden haber campos vacios en los datos del pago");
		echo json_encode($resp);
		die();
	}
}
add_action('wp_ajax_confirm_page', 'confirm_page');
add_action('wp_ajax_nopriv_confirm_page', 'confirm_page');
function confirm_page(){
	$servicio = $_POST['servicio'];
	$pago = $_POST['pago'];

	if (!empty($servicio) && !empty($pago)) {
		update_post_meta($pago, "status_mount", "Confirmado");
		update_post_meta($servicio, "estado", "Aprobado");
		echo "OK";
		die();
	}
}
function check_pay_for_service($value)
{	
	global $post;
	$args = array(
	    'post_type'  => 'st_page',
	    'meta_query' => array(
			array(
				'key'     => 'service',
				'value'   => $value,
				'compare' => '=',
			),
		),
        
    );
    global $wpdb;
    global $wpdb;
	$results = $wpdb->get_results( "select post_id, meta_key from $wpdb->postmeta where meta_value = '".$value."'", ARRAY_A );
	/*$my_query = new WP_Query( array( 'post_type' => 'st_page', 'meta_key' => "service", 'meta_value' => $value ) );
	if( $my_query->have_posts() ) {
	  while( $my_query->have_posts() ) {
	    $my_query->the_post();
	    
			
	    // Do your work...
	  } // end while
	  return $array;
	} // end if
	wp_reset_postdata();*/
	
	if (count($results) == 1) {
		
		$array = array(
		    "exist" => true,
		    "meta" => $results[0]["post_id"]
		);
		return $array;
	}else{
		if (count($results) == 0) {
				$array = array(
			    "exist" => false
			);
			return $array;
		}
		
	}
	

	

}
add_action('wp_ajax_end_service', 'end_service');
add_action('wp_ajax_nopriv_end_service', 'end_service');
function end_service(){
	$servicio = $_POST['servicio'];
	$coment = $_POST['coment'];
	$ranking = $_POST['ranking'];

	if (!empty($servicio) && !empty($coment) && !empty($ranking)) {
		update_post_meta($servicio, "ranking", $ranking);
		update_post_meta($servicio, "estado", "Terminado");
		update_post_meta($servicio, 'comentarioFinal', $coment);
		echo "OK";
		die();
	}
}
function check_data_server($id)
{	
	global $post;
	$args = array(
	    'post_type'  => 'st_service',
	    'meta_query' => array(
	    	'relation'  => 'AND',
			array(
				'key'     => 'server',
				'value'   => $id,
				'compare' => '=',
			),
			array(
				'key'     => 'estado',
				'value'   => "Terminado",
				'compare' => '=',
			),
		),
        
    );
    $query = new WP_Query($args);
    $posts = $query->get_posts();
    $ids = array();
    $totalP = 0;
    global $rankings;
    foreach($posts as $post) {
	    // Do your stuff, e.g.
	    // echo $post->post_name;
	    $idP=$post->ID;
	    $metas = get_post_meta($idP);
	    $rankings = $rankings + $metas["ranking"][0];
	    array_push($ids, $idP);
  
	    
	    
	}
	$totalSer = count($ids);
	if ($totalSer > 0) {
		$totalP = $rankings / $totalSer;
	}else{
		$totalP = 0;
	}
	
    $field_data = array(
		'ranking' => $totalP,
		'servicios' => $totalSer
	);
   	return $field_data;
	

	

}

function data_dashboard_server($id)
{	
	global $post;
	$args = array(
	    'post_type'  => 'st_service',
	    'meta_query' => array(
	    	'relation'  => 'AND',
			array(
				'key'     => 'server',
				'value'   => $id,
				'compare' => '=',
			),
			array(
				'key'     => 'estado',
				'value'   => "Terminado",
				'compare' => '=',
			),
		),
        
    );
    $query = new WP_Query($args);
    $posts = $query->get_posts();
    $ids = array();
    $totalP = 0;
    global $rankings;
    foreach($posts as $post) {
	    // Do your stuff, e.g.
	    // echo $post->post_name;
	    $idP=$post->ID;
	    $metas = get_post_meta($idP);
	    $rankings = $rankings + $metas["ranking"][0];
	    array_push($ids, $idP);
  
	    
	    
	}
	$totalSer = count($ids);
	if ($totalSer > 0) {
		$totalP = $rankings / $totalSer;
	}else{
		$totalP = 0;
	}
	
    $field_data = array(
		'ranking' => $totalP,
		'servicios' => $totalSer
	);
   	return $field_data;
	

	

}
function data_dashboard_client($id)
{	
	global $post;
	$args = array(
	    'post_type'  => 'st_service',
	    'meta_query' => array(
	    	'relation'  => 'AND',
			array(
				'key'     => 'user',
				'value'   => $id,
				'compare' => '=',
			),
			array(
				'key'     => 'estado',
				'value'   => "Terminado",
				'compare' => '=',
			),
		),
        
    );
    $query = new WP_Query($args);
    $posts = $query->get_posts();
    $ids = array();
    $thours = array();
    $totalP = 0;
    global $horas;
    foreach($posts as $post) {
	    // Do your stuff, e.g.
	    // echo $post->post_name;
	    $idP=$post->ID;
	    $metas = get_post_meta($idP);

	    $hi = strtotime($metas["hora_inicio"][0]);
	    $hf = strtotime($metas["hora_fin"][0]);
	
	    $resta = $hf - $hi;
	    $horas = $horas + $resta;
	    array_push($ids, $idP);
  
	    
	    
	}
	$totalSer = count($ids);	
    $field_data = array(
		'ranking' => $horas,
		'servicios' => $totalSer
	);
   	return $field_data;
	

	

}

function data_dashboard_admin()
{	
	global $post;
	$args = array('post_type'  => 'st_service');
    $query = new WP_Query($args);
    $posts = $query->get_posts();
    $ids = array();
    $thours = array();
    $totalP = 0;
    global $horas;
    global $wpdb;
	$user_search = new WP_User_Query( array( 'role' => 'client_role' ) );
	$user_list   = $user_search->get_results();
	$user_count  = $wpdb->num_rows;

	$server_search = new WP_User_Query( array( 'role' => 'server_role' ) );
	$server_list   = $server_search->get_results();
	$server_count  = $wpdb->num_rows;
	$money = 0;


    foreach($posts as $post) {
	    // Do your stuff, e.g.
	    // echo $post->post_name;
	    $idP=$post->ID;
	    $metas = get_post_meta($idP);
	    $money = $money + $metas["price"][0];
	    array_push($ids, $idP);
  
	    
	    
	}
	$totalSer = count($ids);	
    $field_data = array(
		'money' => $money,
		'servicios' => $totalSer,
		'usuarios' => $user_count,
		'servidores' => $server_count

	);
   	return $field_data;
	

	

}


function register_my_menus() {
  register_nav_menus(
    array(
      'private-menu' => __( 'Private Menu' ),
      'private-menu-2' => __( 'Private Menu Secundary' ),
      'private-menu-3' => __( 'Private Menu third' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

function add_login_logout_register_menu( $items, $args ) {
 if ( $args->theme_location != 'primary' ) {
 	return $items;
 }
 
 if ( is_user_logged_in() ) {
 	if ( current_user_can('client_role') ) {
	 	$items .= '<li><a href="/st/add-servicio/">' . __( 'Solicitar Servicio' ) . '</a></li>';
	 	$items .= '<li><a href="/st/user-list-services/">' . __( 'Mis Servicios' ) . '</a></li>';
	} 
	if ( current_user_can('administrator') ) {
	 	$items .= '<li><a href="/st/admin-list-services/">' . __( 'Ver Servicios' ) . '</a></li>';
	 	$items .= '<li><a href="/st/add-server/">' . __( 'Agregar Servidor' ) . '</a></li>';
	 	$items .= '<li><a href="/st/agregar-producto/">' . __( 'Agregar Producto' ) . '</a></li>';
	 	$items .= '<li><a href="/st/agregar-paquete/">' . __( 'Agregar Paquete' ) . '</a></li>';
	}
	if ( current_user_can('server_role') ) {
	 	$items .= '<li><a href="/st/server-list-services/">' . __( 'Mis Servicios' ) . '</a></li>';
	}  
 	$items .= '<li><a href="' . wp_logout_url() . '">' . __( 'Cerrar Sesión' ) . '</a></li>';
 	
 } 
 
 return $items;
}
 
add_filter( 'wp_nav_menu_items', 'add_login_logout_register_menu', 7, 2 );

function my_enqueue1() {

    wp_enqueue_script( 'ajax-script', get_template_directory_uri() . '/js/script.js', array('jquery') );

    wp_localize_script( 'ajax-script', 'my_ajax_object',
            array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'my_enqueue1' );

function save_product(){
	if(isset($_POST['submit-product'])) {
		if( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) &&  $_POST['action'] == "new_post") {

		    // Do some minor form validation to make sure there is content
		    if (!empty($_POST['title'])) {
		        $title =  $_POST['title'];
		    } else {
		        $resp = array('error' => true,'msg' => "Por favor,introduce el nombre del producto");
				return $resp;
				$_POST = array();
				die();
		    }
		    if (!empty($_POST['description'])) {
		        $description = $_POST['description'];
		    } else {
		        $resp = array('error' => true,'msg' => "Por favor,introduce la descripcion del producto");
				return $resp;
				$_POST = array();
				die();
		    }
		    // Add the content of the form to $post as an array
		    $new_post = array(
		        'post_title'    => $title,
		        'post_content'  => $description,
		        'post_status'   => 'publish',           // Choose: publish, preview, future, draft, etc.
		        'post_type' => 'st_products'  //'post',page' or use a custom post type if you want to
		    );
		    //save the new post
		    $pid = wp_insert_post($new_post); 
		    /*$resp = array('error' => false,'msg' => "Se ha agregado el producto a la plataforma");
			return $resp;
			die();*/
		    /* if (isset ($pid)) {
		        $resp = array('error' => false,'msg' => "Se ha agregado el producto a la plataforma");
				return $resp;
				die();
		    } else {
		        $resp = array('error' => true,'msg' => "Error en el servidor, intente luego");
				return $resp;
				die();
		    }*/
		    //insert taxonomies
		}else{
			$resp = array('error' => true,'msg' => "Ocurrio un error en servidor, intenta luego");
			return $resp;
			$_POST = array();
			die();
		}

	}
	/**/
		
	

	
}

function save_package(){
	if(isset($_POST['submit-package'])) {
		if (isset($_POST['my_image_upload_nonce'] ) && wp_verify_nonce( $_POST['my_image_upload_nonce'], 'my_image_upload' )){
			if( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) &&  $_POST['action'] == "new_post") {

			    // Do some minor form validation to make sure there is content

			    
					
			    if (!empty($_POST['name_package'])) {
			        $name_package =  $_POST['name_package'];
			    } else {
			        $resp = array('error' => true,'msg' => "Por favor,introduce el nombre del paquete");
					return $resp;
					die();
			    }
			    if (!empty($_POST['description_package'])) {
			        $description_package = $_POST['description_package'];
			    } else {
			        $resp = array('error' => true,'msg' => "Por favor,introduce la descripcion del paquete");
					return $resp;
					die();
			    }
			    if (!empty($_POST['apos_package'])) {
			        $apos_package = $_POST['apos_package'];
			    } else {
			        $resp = array('error' => true,'msg' => "Por favor,introduce la cantidad de aposentos para este paquete");
					return $resp;
					die();
			    }
			    if (!empty($_POST['area_package'])) {
			        $area_package = $_POST['area_package'];
			    } else {
			        $resp = array('error' => true,'msg' => "Por favor,introduce el area en metros cuadrados que cubre este paquete");
					return $resp;
					die();
			    }
			    if (!empty($_POST['duracion_package'])) {
			        $duracion_package = $_POST['duracion_package'];
			    } else {
			        $resp = array('error' => true,'msg' => "Por favor,introduce la duracion servicio para el paquete");
					return $resp;
					die();
			    }
			    if (!empty($_POST['precio_package'])) {
			        $precio_package = floatval($_POST['precio_package']);

			    } else {
			        $resp = array('error' => true,'msg' => "Por favor,introduce el precio del paquete");
					return $resp;
					die();
			    }
			    $products_array = array();
			    if (!empty($_POST['meta_box_checkbox'])){
			    	$products_form = count($_POST['meta_box_checkbox']);
				    if ( $products_form > 0 && isset($_POST['meta_box_checkbox'])) {
				        $productos = $_POST[ 'meta_box_checkbox' ];
					    for($i=0; $i < count($productos); $i++){
						   if (isset($productos[$i])) {
						   		$products_array[] = $productos[$i];
						   }
						   
						}
				    } else {
				        $resp = array('error' => true,'msg' => "Por favor,selecciona al menos un producto para este paquete");
						return $resp;
						die();
				    }
				    

			    }else{
			    	$resp = array('error' => true,'msg' => "Por favor,selecciona al menos un producto para este paquete");
					return $resp;
					$_POST = array();
					die();
			    }

			    if (isset($_POST['my_image_upload_nonce']) || !empty($_POST['my_image_upload_nonce'])) {
			    	if (isset($_POST['my_image_upload_nonce'] ) && wp_verify_nonce( $_POST['my_image_upload_nonce'], 'my_image_upload' )) {
			    		
			    		if ($_FILES['my_image_upload']['size'] =! 0 && $_FILES['my_image_upload']['error'] == 0) {
			    			
			    			require_once( ABSPATH . 'wp-admin/includes/image.php' );
							require_once( ABSPATH . 'wp-admin/includes/file.php' );
							require_once( ABSPATH . 'wp-admin/includes/media.php' );
							
							// Let WordPress handle the upload.
							// Remember, 'my_image_upload' is the name of our file input in our form above.
							$attachment_id = media_handle_upload( 'my_image_upload', 0);
							$attachment_url = basename (get_attached_file( $attachment_id ));
							$field_data = array(
								'area_clean' => $apos_package,
								'aposentos' => $area_package,
								'duracion' => $duracion_package,
								'price' => $precio_package
							);
							$post_data = array(
								'post_title'    => $name_package,
						        'post_content'  => $description_package,
						        'post_status'   => 'publish', 
								'post_type' => 'st_package'
								);
							$post_id = CFS()->save( $field_data, $post_data );
							update_post_meta( $post_id, 'meta-product', $products_array );
							set_post_thumbnail( $post_id, $attachment_id );
							$resp = array('error' => false,'msg' => "Paquete subido con exito");
							return $resp;
							die();
			    		}else{
			    			$resp = array('error' => true,'msg' => "Por favor,agrega una imagen para el paquete");
							return $resp;
							die();
			    		}

			    		
			    	}else{
				    	$resp = array('error' => true,'msg' => "Por favor,agrega una imagen para el paquete");
						return $resp;
						die();
				    }
			    	
				    // Add the content of the form to $post as an array
			    }else{
			    	$resp = array('error' => true,'msg' => "Por favor,agrega una imagen para el paquete");
					return $resp;
					die();
			    }
			    
				
			    

			}else{
				$resp = array('error' => true,'msg' => "Ocurrio un error en servidor, intenta luego");
				return $resp;
				$_POST = array();
				die();
			}
		}else{
			$resp = array('error' => true,'msg' => "Por favor, introduzca una imagen para el paquete");
			return $resp;
			$_POST = array();
			die();
		}
	}
	/**/
		
	

	
}