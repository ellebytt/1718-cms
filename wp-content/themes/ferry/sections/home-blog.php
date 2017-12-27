<?php  $ferry_news_enable = get_theme_mod('ferry_news_enable');
       $disable_news_meta = get_theme_mod('disable_news_meta',false);	  
	if($ferry_news_enable){
	$ferry_total_posts = get_option('posts_per_page'); /* number of latest posts to show */
	if( !empty($ferry_total_posts) && ($ferry_total_posts > 0) ):
    $news_background = get_theme_mod('news_background','');
    $news_section_color = get_theme_mod('news_section_color',''); ?>
<!--==================== BLOG SECTION ====================-->
<?php if($news_background != '') { ?>
<section id="blog" class="ferry-blog-section" style="background-image:url('<?php echo esc_url($news_background);?>');">
<?php } else { ?>
<section id="blog" class="ferry-blog-section">
<?php } ?>
	<div class="overlay" style="background-color:<?php echo esc_html($news_section_color);?>">
    	<div class="container">
      		<div class="row">
        		<div class="col-md-12 wow fadeInDown animated padding-bottom-50 text-center">
          			<div class="ferry-heading">
            			<?php $ferry_news_title = esc_attr(get_theme_mod('ferry_news_title')); if( !empty($ferry_news_title) ): echo '<h3 class="ferry-heading-inner">'.$ferry_news_title.'</h3>'; endif; ?>
          			</div>
          			<?php $ferry_news_subtitle = esc_attr(get_theme_mod('ferry_news_subtitle')); 
          			if( !empty($ferry_news_subtitle) ): echo '<p class="heading">'.$ferry_news_subtitle.'</p>'; endif; ?>
        		</div>
      		</div>
      		<div class="clear"></div>
			<div class="row">
	       		<?php $ferry_latest_loop = new WP_Query( array( 'post_type' => 'post', 'order' => 'DESC','ignore_sticky_posts' => true ) ); if ( $ferry_latest_loop->have_posts() ) :
					while ( $ferry_latest_loop->have_posts() ) : $ferry_latest_loop->the_post();?>

				<div class="col-md-4">
			        <div <?php if ( has_post_thumbnail() ) : ?> class="ferry-blog-post-box" style="background-image: url(<?php the_post_thumbnail_url(); ?>);" <?php else:?> class="ferry-blog-post-box white" <?php endif; ?>>
			        	<article class="small">
				            <?php if($disable_news_meta!=true) { ?>
							<span class="ferry-blog-date">
				          		<i class="fa fa-clock-o"></i>
				          		<span><?php echo get_the_date('j'); ?></span>
				          		<span><?php echo get_the_date('M'); ?></span> 
				          	</span>
							<?php } ?>							
				            <h2 class="ferry-blog-title"><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
							  <?php the_title(); ?>
							  </a>
							</h2>
				            <?php the_excerpt(); ?>
							<?php if($disable_news_meta!=true) { ?>
				            <div class="ferry-blog-category"> 
						  		<?php $cat_list = get_the_category_list();
						  		if(!empty($cat_list)) { ?>
						  		<?php the_category(', '); ?>
					   			<?php } ?>
					  			<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><?php _e('by','ferry'); ?>
								<?php the_author(); ?>
					  			</a> 
							</div>
							<?php } ?>
			          	</article>
			        </div>
				</div>
			<?php  endwhile; endif;	wp_reset_postdata(); ?>
	    	</div>
  		</div>
	</div> 
</section>
<?php endif; }?>