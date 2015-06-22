<?php if (have_posts()): while (have_posts()) : the_post(); ?>

<article id="<?php echo $post->post_name; ?>" <?php post_class(); ?>>
	<div class="block-item">
		<div class="media">
			<?if( has_post_thumbnail()) :?>
				<a class="pull-left hidden-xs" href="<?php echo (!defined('SHOW_POST_EXCERPT') ? '#' : get_permalink_within_archive() ) ?>">
					<?php the_post_thumbnail('square-sm'); ?>
				</a>
			<?php endif; ?>
			<div class="media-body">
				<h5><a href="<?php echo (!defined('SHOW_POST_EXCERPT') ? '#' : get_permalink_within_archive() ) ?>"><?php the_title(); ?></a></h5>
				<p class="item-date"><em><?php the_time('d m Y') ?></em></p>
				<?php
				if(!defined('SHOW_POST_EXCERPT')) :
					if( has_post_thumbnail()) echo '<p class="container-escape-xs">'; the_post_thumbnail('banner'); echo '</p>';
				endif;
				?>
				<?php ( !defined('SHOW_POST_EXCERPT') ? the_content() : short_excerpt() ); ?>
			</div>
		</div>
	</div>
</article>

<?php endwhile; ?>
<?php else: ?>
	<p>We're busy with our exciting relaunch, so watch this space.</p>
<?php endif; ?>