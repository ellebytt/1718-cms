<?php
/**
 * The default template part for displaying content.
 *
 * @package Shrake
 * @since 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/BlogPosting" itemprop="blogPost">

	<div class="entry-inside">

		<?php if ( is_single() && has_post_thumbnail() ) : ?>
			<figure class="entry-image">
				<?php the_post_thumbnail( 'shrake-featured', array( 'itemprop' => 'image' ) ); ?>
			</figure>
		<?php endif; ?>

		<header class="entry-header">
			<?php shrake_entry_title(); ?>

			<div class="entry-meta">
				<?php shrake_posted_by(); ?>
				<?php shrake_posted_on(); ?>
			</div>
		</header>

		<div class="entry-content" itemprop="articleBody">
			<?php the_content(); ?>
		</div>

		<?php if ( is_singular( 'post' ) ) : ?>
			<footer class="entry-footer">
				<?php shrake_entry_terms(); ?>
			</footer>
		<?php endif; ?>

	</div>

</article>
