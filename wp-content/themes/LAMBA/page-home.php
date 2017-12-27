<?php 

/* 
    Template Name: Home Page
*/

get_header(); ?>

<div class="container">
	<div class="row">

			<div class="col-xs-12 col-sm-12">

				<?php 
					if ( have_posts() ) : while ( have_posts() ) : the_post();
			
						// POST FORMAT: Verwijzing naar content.php
						get_template_part( 'content', 'get_post_format()' );
		
					endwhile; ?>
					<? endif; ?>

			</div>
	</div>
</div>

<div class="container background__lightgreen">
	<h2>Recente blogberichten</h2> <br>
	<div class="row ">   
	

				<?php 
					// Query post, laatste 3 posts tonen
					$lastBlog = new WP_Query('type=post&posts_per_page=3');

					if ( $lastBlog->have_posts() ) : while ( $lastBlog->have_posts() ) : $lastBlog->the_post();
					
						get_template_part( 'content', 'lastposts' );
				
					endwhile; endif; 

					// BELANGRIJK
					wp_reset_postdata();
					
				?>
			
	</div>
</div>





<?php get_footer(); ?>