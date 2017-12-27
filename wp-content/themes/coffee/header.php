<?php
/**
* The Header for our theme.
*/

?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php // Add definition for the 'rel' attribute in HTML4 browsers ?>	
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php // Call HTML5 shim if the browser is older than IE9 ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed">
<?php do_action( 'before' ); ?>

	<header id="site-header" class="group" role="banner">
		
		<div id="header-image" style="background: url(<?php header_image(); ?>) no-repeat scroll top; background-size: 1040px auto;">
		
		<h1 id="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2></div>

			    <div id="holder">
	            <nav id="navmenu" class="group" role="navigation">
				<h1 class="assistive-text"><?php _e( 'Main menu', 'coffee' ); ?></h1>
				<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'coffee' ); ?>"><?php _e( 'Skip to content', 'coffee' ); ?></a></div>
				<?php 
					wp_nav_menu( array( 'theme_location' => 'header_menu') );
					?>
			</nav><!-- #navmenu -->
			</div><!-- #holder -->

	</header><!-- #site-header -->


	<div id="main" class="wrapper">