<?php 
get_header(); ?>

<div class="container">
	<div class="row">

			<div class="col-xs-12 col-sm-12">

				<?php 
					if ( have_posts() ): ?>

					<h2> <?php the_archive_title();?> </h2>
				
			</div>
	</div>
	<div class="row">
		
				
			<?php while ( have_posts() ) : the_post(); ?>
		
					
					<?php get_template_part( 'content', 'archive' ); ?>
	
				<?php endwhile;

			endif; 
			?>

	</div>
</div>


<?php get_footer(); ?>