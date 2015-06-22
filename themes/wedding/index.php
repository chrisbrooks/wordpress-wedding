<?php get_header(); return; ?>

	<div class="container page-content">

		<?php
		$banners = get_posts(
			array(
				'post_type' => 'homepage_banner',
				'posts_per_page' => -1
			)
		);

		$slides = array();
		$i = 0;
		foreach ( $banners as $post ) : setup_postdata( $post );
			$image = rwmb_meta('theme_image', array('type'=>'image_advanced','size'=>'banner'));
			$image = current($image);
			$image = $image['url'];

			$image_mobile = rwmb_meta('theme_image', array('type'=>'image_advanced','size'=>'banner-mobile'));
			$image_mobile = current($image_mobile);
			$image_mobile = $image_mobile['url'];
			
			$slides[$i] = array(
				'banner'		=> $image,
				'banner-mobile'	=> $image_mobile,
			);
			$i++;
		endforeach; 
		wp_reset_postdata();
		?>

		<style>
		<?php foreach($slides as $i => $slide) : ?>
			#carousel-banner #slide<?=$i?> .banner {
				background-image: url("<?=$slide['banner']?>")
			}
			@media screen and (max-width:767px){
				#carousel-banner #slide<?=$i?> .banner {
					background-image: url("<?=$slide['banner-mobile']?>")
				}
			}
		<?php endforeach; ?>
		</style>

		<div id="carousel-banner" class="carousel carousel-xs-showall" data-ride="carousel">

			<!-- Indicators -->
			<ol class="carousel-indicators">
				<?php
				$i=0;
				foreach ( $banners as $post ) : ?>
					<li data-target="#carousel-banner" data-slide-to="<?php echo $i;?>" class="<?php if($i==0) echo 'active'; ?>"></li>
					<?php $i++; ?>
				<?php endforeach; ?>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner">

				<?php
				$i=0;
				foreach ( $banners as $post ) : setup_postdata( $post );

					?>
					<div class="item text-center<?php if($i==0) echo ' active'; ?>" id="slide<?php echo $i;?>">
						<div class="banner bg-cover container-escape-xs"></div>
						<div class="banner-content banner-content-<?php echo rwmb_meta( 'theme_class' ); ?>">
							<h3 class="block-header"><?php the_title(); ?></h3>
							<?php echo rwmb_meta( 'theme_content' ); ?>
						</div>
					</div>
					<?php $i++; ?>
				<?php
				endforeach;
				wp_reset_postdata();
				?>
			</div>

		</div> <!-- /.carousel -->

		<p>&nbsp;</p>

		<div class="row row-pd">

			<div class="col-xs-12 col-sm-6 col-sm-push-6">
				<h3 class="block-header">Our natural healing ingredients</h3>
				<p class="text-center">Since 1800, Pommade Divine’s unique formula has combined the natural restorative and nourishing properties of 5 key essential oils. Learn more about our unique natural blend of ingredients help to give you healthy, nourished skin.</p>
				<p><img src="http://placehold.it/450x230"></p>
			</div>

			<div class="col-xs-12 col-sm-6 col-sm-pull-6">
				<h3 class="block-header">Everyone loves Pommade Divine</h3>
				<p><em>From celebrities to beauty experts and most importantly, our customers – Pommade Divine is loved by a growing number of loyal fans. Follow us on twitter to get the latest news.</em></p>
				<div class="row">
					<div class="col-xs-12 col-sm-10 col-sm-push-1">

						<?php
						$posts = get_posts(
							array(
								'post_type' => 'post',
								'posts_per_page' => 10
							)
						);

						define('SHOW_POST_EXCERPT', true);
						foreach ( $posts as $post ) : setup_postdata( $post );
							get_template_part( 'content' );
						endforeach; 
						wp_reset_postdata();
						?>


					</div>
				</div>
			</div>

		</div>

	</div> <!-- /.page-content -->

<?php get_footer(); ?>


<?php return; ?>
<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

			<h1><?php _e( 'Latest Posts', 'html5blank' ); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
