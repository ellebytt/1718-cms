<div class="col-xs-12 col-sm-12 col-md-4">

        <article id="post-<?php the_ID(); ?>"  <?php post_class(); ?> >
            
            <?php if( has_post_thumbnail() ):
                $urlImg= wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
            endif; ?>
            <div class="thumbnail-img-homepost" style="background-image: url(<?php echo $urlImg; ?>);">

            </div>

            <div class="center">
                <h3><?php the_title(); ?></h3>
                <!--THE EXCERPT ipv the_content-->
                <p><?php the_excerpt(); ?></p>

            </div>
            </article>
</div>
       