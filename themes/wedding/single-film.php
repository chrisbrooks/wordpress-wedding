<?php

wp_enqueue_script('blueimp-gallery');

$film = new film($post);

get_header();

//main image
if($film->isTheatrical()){
	$main_image_info = [
		'name' => 'signature_quad',
		'size' => 'quad-lg',
		'col_class_image' => 'col-xs-12 col-sm-6 col-md-7',
		'col_class_info' => 'col-xs-12 col-sm-6 col-md-5'
	];
} else {
	$main_image_info = [
		'name' => 'signature_packshot',
		'size' => 'packshot-lg',
		'col_class_image' => 'col-xs-12 col-sm-6 col-md-4 col-md-push-1',
		'col_class_info' => 'col-xs-12 col-sm-6 col-md-6 col-md-push-1'
	];
}

$main_image = rwmb_meta( $main_image_info['name'], array('type'=>'image_advanced', 'size'=>$main_image_info['size']), $film->ID );
if(count($main_image)){
	$main_image = current($main_image);
} else {
	$main_image = false;
}

//STILLS
$stills = rwmb_meta( 'signature_stills', array('type'=>'image_advanced', 'size'=>'still-sm'), $film->ID );
if(count($stills)){
	
} else {
	$stills = false;
}
?>

<?php
//TOP SECTION
?>

<div class="film-background-wrapper">
	<div class="film-background" style="background-image: url(<?php echo $main_image['url']; ?>);"></div>
	
	<div class="bg-black highlight-bottom">
		<div class="row">
			<?php if($main_image) : ?>
			<div class="<?php echo $main_image_info['col_class_image'] ;?>">
				<img src="<?php echo $main_image['url']; ?>" width="<?php echo $main_image['width']; ?>" height="<?php echo $main_image['height']; ?>" alt="Quad 1" class="fullwidth">
				<p class="visible-xs">&nbsp;</p>
			</div>
			<div class="<?php echo $main_image_info['col_class_info'] ;?> text-center content-section center-vertical">
			<?php else: ?>
			<div class="col-xs-12 col-sm-10 col-sm-offset-1 text-center content-section center-vertical">
				<p>&nbsp;</p>
			<?php endif; ?>
				<div class="mobile-padding">
					<h1><strong class="text-flare"><?=strtoupper($film->title)?></strong></h1>
					<p><strong><?$film->showSubData()?></strong></p>
					<small><p><?$film->showReleaseDates()?></p></small>
					<div class="row">
						<div class="col-xs-12 col-sm-10 col-sm-push-1">
							<p class="h5"><?=nl2br_clean(strip_tags($film->meta('signature_synopsis')))?></p>
						</div>
					</div>
					<p>&nbsp;</p>
					<p><?php $film->showButtons();?></p>
					<p class="visible-xs">&nbsp;</p>
				</div>
			</div>

		</div>
	</div>

	<?php
	//TRAILER
	if($film->meta('signature_trailer')) : ?>
	<div style="position: relative;">

		<div class="container text-center">
			<div class="section">
				<div class="row">
					<div class="col-xs-12 col-sm-8 col-sm-push-2 col-md-6 col-md-push-3">
						<div class="film-trailer">
							<h1 class="text-thin text-shadow">WATCH THE TRAILER</h1>
							<div class="trailer embed-responsive embed-responsive-16by9">
								<iframe width="640" height="360" src="https://www.youtube.com/embed/<?php echo $film->meta('signature_trailer'); ?>?showinfo=0" frameborder="0" allowfullscreen></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	<?php endif; ?>


	<?php
	//STILLS
	if($stills) : ?>
	<div class="">
		<div class="container">
			<h1 class="text-center text-thin text-shadow text-shadow">GALLERY</h1>
			<div class="row film-stills">
				<?php
				switch(count($stills)){
					case 1:
						$stills_offset = 'position: relative; left: 37.5%;';
						break;
					case 2:
						$stills_offset = 'position: relative; left: 25%;';
						break;

					case 3:
						$stills_offset = 'position: relative; left: 12.5%;';
						break;

					default:
						$stills_offset = '';
						break;
				}
				foreach($stills as $image){?>
					<a href="<?php echo $image['full_url']; ?>" data-gallery class="film-still col-xs-4" style="width: 25%; <?=$stills_offset?>"><img src="<?php echo $image['url']; ?>" alt="<?php echo $film->title . ' Film Still Frame'; ?>"></a>
				<?}?>
			</div>
		</div>
	</div>
	<?php include 'inc/blueimp-gallery.inc'; ?>
	<?php endif; ?>

</div> <!-- /.film-background -->

<?php get_footer(); ?>