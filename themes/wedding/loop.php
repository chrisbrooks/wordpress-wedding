<?php 

//if (function_exists('relevanssi_didyoumean')) { relevanssi_didyoumean(get_search_query(), "<p>Did you mean: ", "</p>", 2);}


//for SEARCH results, films are displayed separately from other results
$results = [
	'theatrical' => [],
	'home' => [],
	'other' => []
];
?>

<?php if (have_posts()): while (have_posts()) : the_post(); 

	if(is_search()) :
		
		// if(get_post_type() == 'film'){
		// 	$film = new film($post->ID);
		// 	if($film->isTheatrical()){
		// 		$results['theatrical'][] = $film;
		// 	} else {
		// 		$results['home'][] = $film;
		// 	}
		// } else {
			$results['other'][] = $post;
		// }

	else:
	?>


	<!-- article -->
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="row">
			<div class="col-xs-2">
				<a href="<?php echo $url; ?>" title="<?php the_title(); ?>">
					<?php
					if($image){
						echo $image;
					} else {
						the_post_thumbnail('square-sm'); 
					}
					?>
				</a>
			</div>
			<div class="col-xs-10 text-compact">
				<p>
					<strong>
						<a href="<?php echo $url; ?>" title="<?php the_title(); ?>"><?php the_title(); echo " {$title}"; ?></a>
					</strong>
				</p>
				<?php html5wp_excerpt('html5wp_index'); ?>
			</div>
		</div>

		<p>&nbsp;</p>

	</article>
	<!-- /article -->

	<?endif;?>

<?php endwhile; ?>

<?php if(is_search()) :

	//DISPLAY SEARCH RESULTS

	if(count($results['theatrical'])) :
		//theatrical
		?>
		<h3>In Cinemas</h3>
		<div class="row row-filmgrid">
			<?php foreach($results['theatrical'] as $film) :
				$image = rwmb_meta( 'signature_quad', array('type'=>'image_advanced', 'size'=>'quad-sm'), $film->ID);
				$image = @current($image);
				?>
				<div class="col-xs-6 col-sm-4 grid-item">
					<a href="<?php echo get_permalink($film->ID); ?>" class="has-overlay">
						<div class="overlay">
							<span><span><h3><?php echo strtoupper($film->post_title); ?></h3><p><br><button class="btn btn-outline btn-xs">MORE INFO</button></p></span></span>
						</div>
						<img src="<?php echo $image['url'] ?>" alt="<?php echo $film->post_title; ?> Film">
					</a>
				</div>
			<?php endforeach; ?>
		</div>
		<?php
	endif;
	
	if(count($results['home'])) :
		//films
		?>
		<h3>To Own</h3>
		<div class="row row-filmgrid">
			<?php foreach($results['home'] as $post) :
				$image = rwmb_meta( 'signature_packshot', array('type'=>'image_advanced', 'size'=>'packshot-xs'), $post->ID);
				$image = @current($image);
				?>
				<div class="col-xs-6 col-sm-3 col-md-five grid-item">
					<a href="<?php echo get_permalink($post->ID); ?>" class="has-overlay size-packshot reveal">
						<div class="overlay">
							<span><span>
								<h3><?php echo strtoupper($post->post_title); ?></h3>
								<p><br><button class="btn btn-outline btn-xs">MORE INFO</button></p>
							</span></span>
						</div>
						<img src="<?php echo @$image['url'] ?>" width="247" height="350" alt="<?php $post->post_title; ?> Film">
					</a>
				</div>
			<?php endforeach; ?>
		</div>
		<?php
	endif;

	if(count($results['other'])) :
		?>
		<h3>Other Results</h3>
		<?php foreach($results['home'] as $post) : ?>
			<p><a href="<?php echo get_permalink($post->ID); ?>"><?php $post->post_title; ?></a></p>
		<?php endforeach;
	endif;

endif; ?>

<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, there were no matching results.', 'html5blank' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>
