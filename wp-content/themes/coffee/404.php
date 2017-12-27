<?php get_header(); ?>

<div id="container">
<div id="content">

	<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Error 404 - Page Not Found', 'coffee' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching will help find a related post.', 'coffee' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->
			</div><!-- #content -->
			</section><!-- #container -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>