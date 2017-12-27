<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package ferry
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class( ); ?> >
<div class="wrapper">
<a style="display:none;" class="skip-link screen-reader-text" href="#content">
<?php esc_html_e( 'Skip to content', 'ferry' ); ?>
</a>
<header class="header-center"> 
  <!--==================== TOP BAR ====================-->
<div class="ferry-head-detail hidden-xs hidden-sm">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-xs-12 col-sm-6">
			<ul class="info-left">
				<?php
				  $ferry_head_info_one = get_theme_mod('ferry_head_info_one','<a><i class="fa fa-clock-o "></i>Open-Hours:10 am to 7pm</a>');
				  $ferry_head_info_two = get_theme_mod('ferry_head_info_two','<a href="mailto:info@themeansar.com" title="Mail Me"><i class="fa fa-envelope"></i> info@themeansar.com</a>');
				?>
				<li><?php echo $ferry_head_info_one; ?></li>
				<li><?php echo $ferry_head_info_two; ?></li>
			</ul>
        </div>
        <div class="col-md-6 col-xs-12">
        	<ul class="info-right">
              <li> <?php if( class_exists('woocommerce')) { ?><a href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php esc_attr_e( 'View your shopping cart','ferry' ); ?>" class="ferry-cart"> <i class="fa fa-shopping-bag"></i><span class="ferry-cart-count"> <span class="ferry-cart-item"><?php echo wp_kses_data( sprintf( _n( '%d item -', '%d item(s) -', WC()->cart->get_cart_contents_count(), 'ferry' ), WC()->cart->get_cart_contents_count() ) ); ?> </span>  </span></a> <?php } ?> </li>
			  <li><a href="#" data-toggle="modal" data-target="#search"><i class="fa fa-search"></i></a></li>
            </ul>
             <?php wp_nav_menu(array(  
              'theme_location'  => 'top',
              'container' => '',
              'menu_class' => 'info-right'
            ) ); ?>
        </div>
      </div>
    </div>
</div>
<div class="clearfix"></div>
	<div class="container">
		<div class="row">
          <div class="logo-center">
            <!-- Logo -->
            <?php
            if(has_custom_logo())
            {
            // Display the Custom Logo
            the_custom_logo();
            }
             else { ?>
            <a class="navbar-brand text-center center-block" href="<?php echo esc_url(home_url( '/' )); ?>"><?php bloginfo('name'); ?>
			<br>
            <span class="site-description"><?php echo  get_bloginfo( 'description', 'display' ); ?></span>   
            </a>      
            <?php } ?>
            <!-- Logo -->
          </div>
		</div>
	</div>
	<div class="ta-main-nav">
		<nav class="navbar navbar-default navbar-static-top navbar-wp">
			<div class="container"> 
			  <!-- navbar-toggle -->
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-wp"> <span class="sr-only"><?php echo 'Toggle Navigation' ; ?></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
			  <!-- /navbar-toggle --> 
			  <!-- Navigation -->
			  
			  <div class="collapse navbar-collapse" id="navbar-wp">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav', 'fallback_cb' => 'ferry_custom_navwalker::fallback' , 'walker' => new ferry_custom_navwalker() ) ); ?>
			  </div>
			  <!-- /Navigation --> 
			</div>
		</nav>
	</div>
</header>
<!-- #masthead --> 