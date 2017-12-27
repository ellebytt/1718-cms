<?php get_header(); ?>

<div class="container">
<div class="row">

    <div class="col-xs-12 col-md-8 offset-md-2 ">   

        <?php 
        
        if( have_posts() ):

            while ( have_posts() ): the_post(); ?>

            <article id="post-<?php the_ID(); ?>"  <?php post_class(); ?>>      
        
                <div class="center">
                <h2><?php the_title(); ?></h2>
                <h5> by <?php the_author(); ?> - <?php the_date(); ?> - <?php the_category() ?></h5>
                </div>
                
                <div class="thumbnail-img">
                    <?php the_post_thumbnail(medium_large); ?>
                </div>

                <p><?php the_content(); ?></p>

                <!-- Pagina navigation -->
                <div class="row ">
                    <div class="col-xs-6 col-md-6 text-left posts_link">
                        <h4><?php previous_post_link(); ?></h4>
                    </div>
                    <div class="col-xs-6 col-md-6 text-right posts_link">
                        <h4><?php next_post_link(); ?></h4>
                    </div>
                </div>

                

                <!--Comments activeren-->
                
            </article>
        
    </div>

        <div class="col-xs-12 col-md-8 offset-md-2 "> 

        <hr>
            <div class="comments">
                <?php if(comments_open() ){ comments_template(); } ?>
            </div>
        </div>

        <?php endwhile;

        
        endif;
        
        ?>
    
    

</div>
</div>


<?php get_footer(); ?>