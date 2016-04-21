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
// Create custom post type
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
  		'supports' => array( 'title', 'editor','author', 'revisions')

		)
	);
}

// Asociatate custom post type with a permalink

global $wp_rewrite;
$project_structure = 'productos/%st_service%/';
$wp_rewrite->add_rewrite_tag("%st_products%", '([^/]+)', "st_products=");
$wp_rewrite->add_permastruct('st_products', $project_structure, false);


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
$project_structure = 'servicios/%st_service%/';
$wp_rewrite->add_rewrite_tag("%st_service%", '([^/]+)', "st_service=");
$wp_rewrite->add_permastruct('st_service', $project_structure, false);

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
				if (email_exists( $_POST['i_email']) == false && username_exists( $_POST['i_user']  ) == false) {
					
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
						<div class="error" style="color: red;">El usuario o el mail ya existen en nuestra plataforma</div>
						<?php
						return;
					}
			}else{

				?>
				<div class="error" style="color: red;">Contraseñas no coinciden</div>
				<?php
				return;
			}
			//$login_page  = home_url();
    		//wp_redirect( $login_page );
		}else{
			if (empty($_POST['i_name']) or empty($_POST['i_name']) or empty($_POST['i_user']) or empty($_POST['i_email']) or empty($_POST['i_pass']) or empty($_POST['i_pass2'])) {
				# code...
				?>
				<div class="error" style="color: red;">Tiene campos vacios</div>
				<?php
				return;
			}

			
			
		}
		
		
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