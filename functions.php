<?php 

/********************************
 Include scripts
********************************/
function theme_styles() {

    wp_enqueue_style( 'bootstrap-grid_css', get_template_directory_uri() . '/css/bootstrap-grid.css' );
    wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/css/bootstrap.css' );
    wp_enqueue_style( 'typography_css', get_template_directory_uri() . '/css/typography.css', false,'0.5','all'  );
    wp_enqueue_style( 'fonts_css', get_template_directory_uri() . '/css/fonts.css' );
    wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css', false,'0.0.4','all' );

}

add_action( 'wp_enqueue_scripts', 'theme_styles');

/********************************
 Activate menu's
********************************/

function theme_setup() {
    add_theme_support( 'menus' );

    // Om gepersonaliseerde menu's te maken? 
    register_nav_menu('primary', 'Primary Header Navigation');
    register_nav_menu('secondary', 'Footer Navigation');
}

add_action('init', 'theme_setup');


/********************************
 Theme support
********************************/

add_theme_support( 'custom-background' );

// Header afbeelding croppen WERKT NIET 
$args = array(
    'flex-width'    => true,
    'width'         => '100%',
    'flex-height'   => true,
    'height'        => 200,
    'default-image' => get_template_directory_uri() . '/img/Header-2.jpg',
);
add_theme_support( 'custom-header', $args );

// Om foto toe te voegen aan blogpost WERKT NIET
add_theme_support( 'post-thumbnails' );

// Post formats (ze staan allemaal op default maar is om eens te kijken)
add_theme_support( 'post-formats', array('aside', 'image') );


/********************************
 Sidebar function
********************************/

function register_sidebar_locations() {
    /* Register the 'primary' sidebar. */
    register_sidebar(
        array(
            'name'          => 'Primary Sidebar',
            'id'            => 'sidebar-1',
            'description'   => 'Standard Sidebar',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        )
    );
    /* Repeat register_sidebar() code for additional sidebars. */
    register_sidebar(
        array(
            'name'          => 'Footer Sidebar',
            'id'            => 'sidebar-2',
            'description'   => 'Footer Sidebar',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
}
add_action( 'widgets_init', 'register_sidebar_locations' );


?>