<?php get_header(); ?>

<div class="container">
<div class="row">

		<div class="col-sm-12 col-md-9 blog_overview">

        <?php 
			if ( have_posts() ) : while ( have_posts() ) : the_post();
	  
				// POST FORMAT: Verwijzing naar content.php
				get_template_part( 'content', 'blog' );
  
			endwhile; ?>
		
		<!-- Pagina navigation -->
		<div class="">
			<div class="col-xs-6 text-left posts_link">
				<h4><?php next_posts_link('< Older posts'); ?></h4>
			</div>
			<div class="col-xs-6 text-right posts_link">
				<h4><?php previous_posts_link('Newer posts >'); ?></h4>
			</div>
		</div>

		<? endif; 
		?>

		</div>
		

		<div class="col-sm-12 col-md-3 ">
			<?php get_sidebar(); ?>
		</div>



        
</div>
</div>



<?php get_footer(); ?>