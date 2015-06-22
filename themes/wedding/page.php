<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section class="bg-white">
			<div class="container page-content">

				<?php if (have_posts()): while (have_posts()) : the_post(); ?>

					<!-- article -->
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<p>&nbsp;</p>
						<h1 class="h-oversize"><?php the_title(); ?></h1>
						<p>&nbsp;</p>

						<?php the_content(); ?>

						<?php //comments_template( '', true ); // Remove if you don't want comments ?>

						<br class="clearfix">

						<?php edit_post_link(); ?>

					</article>
					<!-- /article -->

				<?php endwhile; ?>

				<?php else: ?>

					<!-- article -->
					<article>

						<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

					</article>
					<!-- /article -->

				<?php endif; ?>

			</div>
		</section>
		<!-- /section -->
	</main>

<?php //get_sidebar(); ?>

<?php get_footer(); ?>
