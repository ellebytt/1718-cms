    
<article id="post-<?php the_ID(); ?>"  <?php post_class(); ?> >

    <div class="row">

        <div class="col-sm-12 col-md-6">

            <?php if( has_post_thumbnail() ):
                    $urlImg= wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
                endif; ?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                    <div class="thumbnail-img-homepost" style="background-image: url(<?php echo $urlImg; ?>);">
                    </div> 
                </a>    
                   

        </div>
        <div class="col-sm-12 col-md-6">
            <h2><?php the_title( sprintf('<h2 class="entry-title"><a href="%s">', esc_url(get_permalink()) ), '</a></h2>' ); ?></h2>
            <h5><?php the_date(); ?> by <?php the_author(); ?></h5>
            <p><?php the_excerpt(); ?></p>
        </div>
    </div>

    

</article>