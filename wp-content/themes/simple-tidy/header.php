<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Simple_Tidy
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="stylesheet" type="text/css" href="<?php get_stylesheet_uri(); ?>">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/css/bootstrap/css/bootstrap.min.css">
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/css/materialize.css">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/css/materialize.min.css">
<link rel="stylesheet" href=".<?php bloginfo('template_url');?>/css/default.time.css">

<?php wp_head(); ?>
</head>
<?php if ( ! current_user_can( 'administrator' ) ) { remove_admin_login_header(); ?>
	<style type="text/css" media="screen">
	html { margin-top: 0px !important; }
	* html body { margin-top: 0px !important; }
	@media screen and ( max-width: 782px ) {
		html { margin-top: 46px !important; }
		* html body { margin-top: 46px !important; }
	}
	</style>
	<?php } ?>
<body <?php body_class(); ?>>
<div id="page" class="site">
	
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'simple-tidy' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'simple-tidy' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
