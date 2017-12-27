<?php
/**
 * The template for displaying A pages.
 */
 get_header(); ?>
            <section id="container">
	<div id="content" role="main"> 
		<?php the_post(); ?>
		   <header class="page-header">	
		     <h1 class="page-title">

			<?php if ( is_day() ) : ?>
			
			<?php printf( __( 'Daily Archives: %s', 'coffee' ), '<span>' . get_the_date() . '</span>' ); ?>
			<?php elseif ( is_month() ) : ?>
		    <?php printf( __( 'Monthly Archives: %s', 'coffee' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'coffee' ) ) . '</span>' ); ?>
	        <?php elseif ( is_year() ) : ?>
			<?php printf( __( 'Yearly Archives: %s', 'coffee' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'coffee' ) ) . '</span>' ); ?>
						<?php else : ?>
							<?php _e( 'Blog Archives', 'coffee' ); ?>
						<?php endif; ?>
					</h1>
			</header>
   <?php rewind_posts(); ?>
    <?php /* Start the Loop */ ?>

          <?php while (have_posts()) : the_post(); ?>
			
			<?php get_template_part( 'content', get_post_format() );?>

			<?php endwhile; ?>
		
		 <?php /* Display navigation to next/previous pages when applicable */ ?>
    <?php if (  $wp_query->max_num_pages > 1 ) : ?>
    <nav id="nav-below">
      <div class="nav-previous">
        <?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'coffee' ) ); ?>
      </div>
      <div class="nav-next">
        <?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'coffee' ) ); ?>
      </div>
    </nav>
    <!-- end nav-below -->
    <?php endif; ?>
  </div><!-- #content -->
</section><!--#container -->			
<?php get_sidebar(); ?>
<?php get_footer(); ?>