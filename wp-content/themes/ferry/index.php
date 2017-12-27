<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package ferry
 */

get_header();
get_template_part('index','banner');
 ?>
<main id="content">
  <div class="container">
    <div class="row">
      <div class="<?php echo ( !is_active_sidebar( 'sidebar_primary' ) ? '12' :'9' ); ?> col-md-9 col-sm-8">
        <div class="row">
		<?php
		$args = array(
		'ignore_sticky_posts' => 1);
		$the_query = new WP_Query( $args );
		if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
		get_template_part('content',''); 
		endwhile; endif;
		?>
          <div class="col-md-12 text-center">
			 <?php
			//Previous / next page navigation
			the_posts_pagination( array(
			'prev_text'          => '<i class="fa fa-long-arrow-left"></i>',
			'next_text'          => '<i class="fa fa-long-arrow-right"></i>',
			'screen_reader_text' => ' ',
			) );
			?>
          </div>
        </div>
      </div>
	  <aside class="col-md-3 col-sm-4">
        <?php get_sidebar(); ?>
      </aside>
    </div>
  </div>
</main>
<?php
get_sidebar();
get_footer();
?>