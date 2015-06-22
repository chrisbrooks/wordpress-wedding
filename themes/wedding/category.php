<?php get_header();
global $post;
$post_original = $post;
?>

<div class="container page-content">

	<div class="background-alt background-alt-no-xs section section-padding section-padding-xs-no">
		
		<h3 class="block-header block-header-major"><?php the_title(); ?></h3>

		<div class="static-height static-height-page section-padding-x section-padding section-padding-xs-y-only items-divider">

			<?php get_template_part( 'content' ); ?>

		</div>

	</div>


	<?php
	//reset for second run through
	$post = $post_original;
	?>
	<div class="visible-xs-block">
		<h3 class="block-header block-header-major"><?php the_title(); ?></h3>
		<?php //get_template_part( 'content' ); ?>
	</div>

</div> <!-- /.page-content -->

<?php get_footer(); ?>


<?php 
//////////////////////////////////////
//////////////////////////////////////

return;

//////////////////////////////////////
?>

<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

			<h1><?php _e( 'Categories for ', 'html5blank' ); single_cat_title(); ?></h1>

			<?php get_template_part( 'content', get_post_format() ); ?>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
