<?php 

/* 
    Template Name: Contact Page
*/

get_header(); ?>

<div class="container">
    <div class="row">

        <?php 
			if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <div class="col-sm-12 col-md-4">

                <h1><?php the_title(); ?></h1>

            </div>
            
            <div class="col-sm-12 col-md-8 ">

                <p><?php the_content(); ?></p>
            
            </div>
        
        <?php endwhile; 
        endif; 
		?>


            
    </div>
</div>

<?php get_footer(); ?>