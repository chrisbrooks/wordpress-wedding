<?php
global $theme_options, $body_class, $body_data, $nav_class, $logo_src_initial;
?><!DOCTYPE html>
<html>
	<head prefix="og: http://ogp.me/ns#">
		<meta charset="utf-8">
		<meta content="IE=edge" http-equiv="X-UA-Compatible">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<link href='http://fonts.googleapis.com/css?family=Oleo+Script:400,700' rel='stylesheet' type='text/css'>
		<link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/images/favicon-57x57.png?v=2">
		<link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/images/favicon-76x76.png?v=2">
		<link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/images/favicon-120x120.png?v=2">
		<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/images/favicon-152x152.png?v=2">
		<link rel="apple-touch-icon-precomposed" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/images/favicon-180x180.png?v=2">
		<link rel="icon" sizes="196x196" href="<?php echo get_template_directory_uri(); ?>/images/favicon-192x192.png?v=2">
		<link rel="icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/images/favicon-57x57.png?v=2">

		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' : '; } ?><?php bloginfo('name'); ?></title>
		<?php wp_head(); ?>

	</head>
	<body>
		<?if(!defined('IGNORE_HEADER')) : ?>
		<?endif; ?>
