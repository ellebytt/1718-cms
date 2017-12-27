<?php
/**
 * ferry functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ferry
 */


	$ferry_theme_path = get_template_directory() . '/inc/ansar/';

	require( $ferry_theme_path . '/ferry-custom-navwalker.php' );
	require( $ferry_theme_path . '/font/font.php');

	/*-----------------------------------------------------------------------------------*/
	/*	Enqueue scripts and styles.
	/*-----------------------------------------------------------------------------------*/
	require( $ferry_theme_path .'/enqueue.php');
	/* ----------------------------------------------------------------------------------- */
	/* Customizer */
	/* ----------------------------------------------------------------------------------- */
	
	require( $ferry_theme_path . '/customize/ta_customize_copyright.php');
	require( $ferry_theme_path . '/customize/ta_customize_homepage.php');
	require( $ferry_theme_path . '/customize/ta_customize_pro.php');
	require( $ferry_theme_path . '/customize/ta_customize_top_header.php');
	
	

if ( ! function_exists( 'ferry_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ferry_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on ferry, use a find and replace
	 * to change 'ferry' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'ferry', get_template_directory() . '/languages' );

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
		'primary' => __( 'Primary menu', 'ferry' ),
		'top' => __( 'Top Right Menu', 'ferry' ),
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

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo');
	function ferry_the_custom_logo() {
	
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}

	}

	add_filter('get_custom_logo','ferry_logo_class');


	function ferry_logo_class($html)
	{
	$html = str_replace('custom-logo-link', 'navbar-brand', $html);
	return $html;
	}

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'ferry_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

    // Set up the woocommerce feature.
    add_theme_support( 'woocommerce');

}
endif;
add_action( 'after_setup_theme', 'ferry_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ferry_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ferry_content_width', 640 );
}
add_action( 'after_setup_theme', 'ferry_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ferry_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ferry' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="ferry-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area', 'ferry' ),
		'id'            => 'footer_widget_area',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="col-md-3 col-sm-6 rotateInDownLeft animated ferry-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
	) );
}
add_action( 'widgets_init', 'ferry_widgets_init' );

function ferry_enqueue_customizer_controls_styles() {
  wp_register_style( 'ferry-customizer-controls', get_template_directory_uri() . '/css/customizer-controls.css', NULL, NULL, 'all' );
  wp_enqueue_style( 'ferry-customizer-controls');
  }
add_action( 'customize_controls_print_styles', 'ferry_enqueue_customizer_controls_styles' );


/* Implement the Custom Header feature. */


/* Custom template tags for this theme. */
require get_template_directory() . '/inc/ansar/template-tags.php';

// custom header
		
		
		register_default_headers( array(
			'mypic' => array(
			'url'   => get_template_directory_uri() . '/images/page-header-bg.jpg',
			'thumbnail_url' => get_template_directory_uri() . '/images/breadcrumb/background.jpg',
			'description'   => _x( 'headerPic', 'header image description', 'ferry' )),
		));
		
//Read more Button on slider & Post
function ferry_read_more() {
	
	global $post;
	
	$readbtnurl = '<a class="btn btn-tislider-two" href="' . get_permalink() . '">'.__( 'Read More' , 'ferry' ).'</a>';
	
    return $readbtnurl;
}
add_filter( 'the_content_more_link', 'ferry_read_more' );

/* Calling in the admin area for the Welcome Page */
if ( is_admin() ) {
	require get_template_directory() . '/inc/ansar/themeinfo/themeinfo-detail.php';
}	