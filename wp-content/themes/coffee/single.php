<?php
/**
* Template for displaying all single posts. 
*/

get_header(); ?>

		<div id="container">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'single' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template( '', true );
				?>

			<?php endwhile; // end of the loop. ?>
			<nav id="nav-below">
			<div class="nav-previous"><?php previous_post_link( '%link', __( '&larr;  Previous Post', 'Previous post link', 'coffee' ) . '' ); ?></div>
				<div class="nav-next"><?php next_post_link( '%link', __( 'Next Post &rarr;', 'Next post link', 'coffee' ) . '' ); ?></div>
			</nav><!-- end nav-below -->
			</div><!-- #content -->
		</div><!-- container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>