<?php

$subnav = '
		<nav>
			<ul class="list-inline header-nav header-subnav">
				<li class="active">Search Results</li>
			</ul>
		</nav>
	';
?>
<?php get_header(); ?>

<div class="container page-content">

	<main role="main">
		<!-- section -->
		<section>

			<h1><?php echo sprintf( __( '%s Search Results for ', 'html5blank' ), $wp_query->found_posts ); echo '<em>' . get_search_query() . '</em>'; ?></h1>
			<p>&nbsp;</p>

			<?php get_template_part('loop'); ?>

			<?php //get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
	</main>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
