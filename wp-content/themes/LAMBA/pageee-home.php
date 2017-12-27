<?php get_header(); ?>

<div class="row">

        <div class="col-xs-12 ">   

            <?php 
                // Query post
                $lastBlog = new WP_Query('type=post&posts_per_page=3');

                if ( $lastBlog->have_posts() ) : while ( $lastBlog->have_posts() ) : $lastBlog->the_post();
                
                    get_template_part( 'content', get_post_format() );
            
                endwhile; endif; 

                // BELANGRIJK
                wp_reset_postdata();
                
            ?>
        
        </div>

        <div class="col-xs-12 ">   

            <?php 
                // Query post, print other 2 posts and not the first one
                $lastBlog = new WP_Query('type=post&posts_per_page=2&offset=1');

                if ( $lastBlog->have_posts() ) : while ( $lastBlog->have_posts() ) : $lastBlog->the_post();
                
                    // 
                    get_template_part( 'content', get_post_format() );
            
                endwhile; endif; 

                wp_reset_postdata();
                
            ?>
        
        </div>

		<div class="col-xs-12 col-sm-8 background__lightgreen">

        <?php 
			if ( have_posts() ) : while ( have_posts() ) : the_post();
	  
				// POST FORMAT: Verwijzing naar content.php
				get_template_part( 'content', get_post_format() );
  
			endwhile; endif; 
			?>

        </div>
		<div class="col-xs-12 col-sm-4">
			<?php get_sidebar(); ?>
		</div>

        
</div>



<?php get_footer(); ?>