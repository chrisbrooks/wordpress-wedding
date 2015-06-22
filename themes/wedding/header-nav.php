<nav class="navbar navbar-fixed-top navbar-signature">

	<div class="container">
		<div class="navbar-header">
			<button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="/" class="nav-logo-mobile"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.jpg" alt="Signature Entertainment" id="logo"></a>
		</div>
		<div class="collapse navbar-collapse" id="navbar">
			<ul class="nav navbar-nav">
				<li class="nav-side"><a href="#"></a></li>
				<li class="nav-link text-right<?=(is_page('in-cinemas') ? ' active' : '')?>"><a href="/in-cinemas/"><span class="nav-highlight">In Cinemas</span></a></li>
				<li class="nav-link text-right<?=(is_page('at-home') ? ' active' : '')?>"><a href="/at-home/"><span class="nav-highlight">At Home</span></a></li>
				<li class="nav-logo"><a href="/"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.jpg" alt="Signature Entertainment" id="logo"></a></li>
				<li class="nav-link text-left<?=(is_post_type_archive('film') ? ' active' : '')?>"><a href="/film-library/"><span class="nav-highlight">Film Library</span></a></li>
				<li class="nav-link text-left<?=(is_page('about') ? ' active' : '')?>"><a href="/about/"><span class="nav-highlight">About</span></a></li>
				<li class="nav-side nav-search"><a href="#" class="page-search-trigger"><span class="hidden-md hidden-sm">Search &nbsp;</span><i class="fa fa-search"></i></a></li>
			</ul>
			<!-- <div class="under-construction">New site launching soon</div> -->
		</div><!--/.nav-collapse -->
	</div>

	<div id="page-search">
		<div class="container">
			<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
				<input type="text" id="page-search-input" name="s" value="" placeholder="START TYPING TO SEARCH">
				<button type="submit" id="page-search-submit"><i class="fa fa-search"></i></button>

			</form>
		</div>
	</div>
</nav>