<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package photopress
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'photopress' ); ?></a>

	<header id="masthead" class="site-header padded15" role="banner">
	<div class="grid">
		<div class="site-branding col-4-12">
	<h1 class="site-title">
			<?php

                $output = null;

                if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
                    $output .= get_custom_logo();
                } else {
                    $output .= '<a href="'. esc_url( trailingslashit( home_url() ) ).'" title="'.esc_attr( get_bloginfo( 'name' ) ).'" rel="home">';
                    $output .= get_bloginfo( 'name' );
                    $output .= '</a>';
                }

                echo $output; ?>
                
            </h1>
            <?php

            $description = get_bloginfo( 'description', 'display' );
            if ( ( function_exists( 'the_custom_logo' ) && ! has_custom_logo() ) && $description || is_customize_preview() ) : ?>
                <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
            <?php endif; ?>
		</div><!-- .site-branding -->


	<div class="col-8-12 push-right">
		<?php
		 wp_nav_menu(array(
        'container_id' => 'cssmenu',
        'theme_location' => 'primary',
        'fallback_cb'       => 'Photopress_Menu_Walker::fallback',
        'walker' => new Photopress_Menu_Walker()
    	));	?>
    	
	</div>
	</div>
	<?php 
    if ( is_front_page() ) {
        do_action('draft-welcome-text'); 
        if ( true == get_theme_mod( 'sm-header-switch', true ) ) : do_action('social-media'); else: endif;
    }?>
	</header><!-- #masthead -->

	<div id="content" class="site-content grid">
