<?php
/**
 * The template for displaying the content.
 * @package ferry
 */
?>
<div class="col-md-6">
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div <?php if ( has_post_thumbnail() ) : ?> class="ferry-blog-post-box" style="background-image: url(<?php the_post_thumbnail_url(); ?>);" <?php else:?> class="ferry-blog-post-box white" <?php endif; ?>>
			<article class="small">
				<span class="ferry-blog-date">
					<i class="fa fa-clock-o"></i>
					<span><?php echo get_the_date('j'); ?></span>
					<span><?php echo get_the_date('M'); ?></span> 
				</span> 
				<h2 class="ferry-blog-title">
					<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"> <?php the_title(); ?></a>
				</h2>
				<?php the_content(); ?>
				<div class="ferry-blog-category"> 
					<?php $cat_list = get_the_category_list();
						if(!empty($cat_list)) { ?>
						<?php the_category(', '); ?>
						<?php } ?>
						<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><?php _e('by','ferry'); ?> <?php the_author(); ?>
						</a> 
				</div>
				<?php wp_link_pages( array( 'before' => '<div class="link">' . __('Pages:', 'ferry' ), 'after' => '</div>' ) ); ?>
			</article>
		</div>
	</div>
</div>