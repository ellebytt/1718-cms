<?php
/**
 * Template Name: Homepage 
 *
 * This is the template that displays homepage template
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 *
 * @package InstaBlog
 */

get_header(); ?>

<?php
	$args = array('post_type' => 'post', 'posts_per_page' => 2);
	$myposts = get_posts($args);
	$count = 0;

	if( empty ( $myposts ) ){
		esc_html_e('You have no posts', 'instablog');
	} else {

		$larger_post_id = get_theme_mod('home_page_post_display_setting_large');
		
		$small_post_id = get_theme_mod( 'home_page_post_display_setting_small' );

		if(!empty($larger_post_id) && !empty($small_post_id)){ ?>

			<div class="large-3 medium-3 column full-height middle-home-section">
				<div class="small-featured-image">
					<?php
					$categories = get_the_category( absint( $small_post_id ) );
					if(! empty($categories)){ ?>
						<span class="category-text turn-text"><?php the_category(', ','',$small_post_id); ?></span>
					<?php }
					$thumb_small_id = get_post_thumbnail_id( absint( $small_post_id ) );
					$thumb_small_url_array = wp_get_attachment_image_src( absint( $thumb_small_id ), 'instablog_home_img_small', true);
					?>
					<a href="<?php echo esc_url( get_the_permalink( absint( $small_post_id ) ) ); ?>"><img src="<?php echo esc_url( $thumb_small_url_array[0] );?>"/></a>
				</div>
			</div>

			<?php
			$thumb_id = get_post_thumbnail_id( absint( $larger_post_id ) );
			$thumb_url_array = wp_get_attachment_image_src( absint( $thumb_id ), 'full', true);
			$thumb_url = $thumb_url_array[0];
			?>
			<div class="large-6 medium-6 column full-height">
					<div class="large-featured-image" style="background-image:url('<?php echo esc_url($thumb_url); ?>'); background-repeat: no-repeat;" data-equalizer-watch>
						<h2><a href="<?php echo get_the_permalink( absint( $larger_post_id ) ); ?>"><?php echo get_the_title( absint( $larger_post_id ) ); ?></a></h2>
						<?php
						$categories = get_the_category( absint( $larger_post_id ) );
						if(! empty($categories)){ ?>
							<span class="category-text turn-text"><?php the_category(', ','',absint( $larger_post_id ) ); ?></span>
						<?php }
						?>
						<span class="instablog_post_date_inner"><?php echo get_the_date( 'd' ); ?></span>
					</div>
			</div>
		<?php }

		else {
			$insta_args = array('posts_per_page' => 2);
			$insta_qery = new WP_Query($insta_args);
			if ( $insta_qery -> have_posts() ) : while ( $insta_qery -> have_posts() ) : 
				$insta_qery -> the_post();
					if ( has_post_thumbnail() ) {
						if ($count == 0) { ?>
							<div class="large-3 medium-3 column full-height">
								<div class="small-featured-image">
									<?php
									$categories = get_the_category();
									if(! empty($categories)){ ?>
										<span class="category-text turn-text"><?php the_category(', '); ?></span>
									<?php }
									$thumb_small_id = get_post_thumbnail_id();
									$thumb_small_url_array = wp_get_attachment_image_src( absint( $thumb_small_id ), 'instablog_home_img_small', true);
									?>
									<a href="<?php echo esc_url( get_the_permalink() ); ?>"><img src="<?php echo esc_url( $thumb_small_url_array[0] );?>"/></a>
								</div>
							</div>
						<?php
					} elseif($count == 1) {
						$thumb_id = get_post_thumbnail_id();
						$thumb_url_array = wp_get_attachment_image_src( absint( $thumb_id ), 'full', true);
						$thumb_url = $thumb_url_array[0];
						?>
						<div class="large-6 medium-6 column full-height">
							<div class="large-featured-image" style="background-image:url('<?php echo esc_url( $thumb_url ); ?>'); background-repeat: no-repeat;" data-equalizer-watch>
								<h2><a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php the_title(); ?></a></h2>
								<?php
								$categories = get_the_category();
								if(! empty($categories)){ ?>
									<span class="category-text turn-text"><?php the_category(', '); ?></span>
								<?php }
								?>
								<span class="instablog_post_date_inner"><?php echo get_the_date( 'd' ); ?></span>
							</div>
						</div>
						<?php
						}
					}
					$count++ ;
				endwhile;
			endif;
			wp_reset_postdata();
		}
	}
?>
<?php
get_footer();
