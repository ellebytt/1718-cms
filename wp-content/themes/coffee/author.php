<?php
/**
*Template for displaying Author Archive pages. 
*/

get_header(); ?>
				    <section id="container">
			        <div id="content" role="main">

					<?php if ( have_posts() ) : ?>

					<?php
						/* Queue the first post, that way we know
						 * what author we're dealing with (if that is the case).
						 *
						 * We reset this later so we can run the loop
						 * properly with a call to rewind_posts().
						 */
						the_post();
					?>
                       <header class="page-header">
						<h1 class="page-title author">
						<?php printf( __( 'Author Archives: %s', 'coffee' ), '<span class="vcard">' . get_the_author() . '</span>' ); ?></h1>

					<?php
						/* Since we called the_post() above, we need to
						 * rewind the loop back to the beginning that way
						 * we can run the loop properly, in full.
						 */
						rewind_posts();
						endif;
					?>			
					
				</header>
		 

			<?php if ( have_posts() ) : ?>

				

				<?php /* Start the Loop */ ?>
			
	
					
					<?php while ( have_posts() ) : the_post(); ?>
	
						<?php
							
							get_template_part( 'content', get_post_format() );
						?>

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
	
	
					<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'coffee' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'coffee' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>
         </div><!-- #content -->
        </section><!-- #container -->

     <?php  get_sidebar();  ?>
	<?php get_footer(); ?>

