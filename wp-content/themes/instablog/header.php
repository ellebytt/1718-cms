<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package InstaBlog
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

<div class="off-canvas-wrap" data-offcanvas>

<section class="container medium-uncollapse large-collapse full-column-height redline"> <!-- start container full-colum height -->
	<div class="column-row redline"> <!-- start colum row -->

		<div class="main_sidebar_toggle_wrap">
			<?php do_action('instablog_main_sidebar_toogle'); ?>
		</div>		

		<div id="masthead" class="site-header large-3 medium-3 column red-line full-height redline" role="banner">
			<a class="skip-link screen-reader-text sidebar-toggle" href="javascript:void(0);"></a>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<div class="site_title_desc_wrap">
					<div class="instablog_custom_logo"><?php instablog_the_custom_logo(); ?></div>
					<h1 class="site-title home"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

					<?php
					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
					<?php
					endif; ?>
				</div>
				<a href="javascript:void(0);" class="c-sidebar_labelmobile -menu js-label-menu">
                	<span class="instablog_menu_txt"><?php esc_html_e('Menu','instablog'); ?></span><span class="c-sidebar_menubar"></span>
                </a>

                 <div class="menu_social_wrap show-for-medium-up hide-medium-InstaBlog">
					<?php if ( has_nav_menu( 'header-menu' ) ) : ?>
						<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'menu_id' => 'primary-menu', 'depth' => '2') ); ?>
					<?php else : ?>
					
					<ul id="primary-menu-list">
						<?php wp_list_pages( 'title_li=&depth=1' ); ?>
					</ul>
					<?php endif; ?>
				</div>


                <div class="menu_social_wrap_responsive">
					<?php if ( has_nav_menu( 'header-menu' ) ) : ?>
					
						<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'menu_id' => 'primary-menu', 'depth' => '2') ); ?>
					
					<?php else : ?>
					
					<ul id="primary-menu-list">
						<?php wp_list_pages( 'title_li=&depth=1' ); ?>
					</ul>
					
					<?php endif; ?>
					<p><?php $instablog_header_txt = get_theme_mod('homepage_text');
						
						echo wp_kses( $instablog_header_txt, array(
                                'p' => array(),
                                'a' => array(
                                        'href' => array(),
                                        'class' => array()
                                    )
                            ) );
                            
					?></p>
					<?php do_action('instablog_bottom_social_links'); ?>

				</div>

			</nav><!-- #site-navigation -->
			

			<div class="description-block large-10 column show-for-medium-up hide-medium-InstaBlog">
				<p><?php $instablog_header_txt = get_theme_mod('homepage_text');
						
						echo wp_kses( $instablog_header_txt, array(
                                'p' => array(),
                                'a' => array(
                                        'href' => array(),
                                        'class' => array()
                                    )
                            ) );
                            
					?></p>
				<?php do_action('instablog_bottom_social_links'); ?>

				<div class="instablog_footer_text">
					<?php
						if(get_theme_mod('show_footer_text') != 1){
							printf( __( 'InstaBlog %1$s by %2$s','instablog'), '<a href="'.esc_url("https://www.shapedpixels.com/themes/InstaBlog").'">Theme</a>', '<a href="'.esc_url("https://www.shapedpixels.com").'">Shaped Pixels</a>') ;
						}

					?>
				</div>
				
			</div>
			
		</div><!-- #masthead -->

