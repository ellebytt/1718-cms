<html>
    <head>
        <!-- Hier staan je eigen links en meta tags -->
        <meta charset="<?php bloginfo('charset') ?>">
        <meta name="description" content="<?php bloginfo('description') ?>">

        <title><?php bloginfo('name') ?></title>
        <!-- Stylesheets -->

        <?php wp_head(); ?>
    </head>

    <!-- Om gepersonaliseerde klassen toe te voegen aanbepaalde pagina's-->
    <?php 
        if( is_front_page() ):
            $awesome_classes = array('awesome-class', 'my-class');
        else:
            $awesome_classes = array('no-awesome-class');
        endif;
    ?>

<!--Geeft klasses aan de <body> tag die verschillend zijn voor de pagina's-->
<body <?php body_class( $awesome_classes ); ?>>


	<!--start-header-->
	<div id="navigation">
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-toggleable-md navbar-expand-md navbar-inverse navbar-light bg-faded">

                    <a href="<?php echo get_bloginfo( 'wpurl' );?>" class="navbar-brand text-primary" id="logo"><?php echo get_bloginfo( 'name' ); ?></a>

                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                            
                        <?php
                            wp_nav_menu(array(
                                'theme_location' => 'primary',
                                'container' => false,
                                'menu_class' => 'navbar-nav'
                            )
                        );

                        ?>
                            
                    </div>
                        
                </nav>
            </div>
        </div>
    </div>

    
    <?php 
        if( is_front_page() ): ?>

        
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        
                        <div class="row">
                            <?php if( get_header_image() ): ?>
                    
                            <div class="header-img row align-items-center" style="background-image: url(<?php header_image(); ?>);">
                                <div class="col header__title">
                                    <h1 class="more-padding "><?php echo get_bloginfo( 'description' ); ?>
                                    </h1>
                                </div>
                            </div> 

                            <?php endif; ?>
                        </div>
                
                    </div>
                </div>
            </div>

            

        <?php else: ?>

                <div class="home_padding">

                </div>
                        
                        
        <?php endif;
    ?>


  


                
                