<?php

/*------------------------------------*\
	Custom Theme Settings
\*------------------------------------*/


//settings API
function register_theme_options() {
	register_setting( 'theme_options', 'theme_options', 'validate_settings' );

	add_settings_section('global_settings', 'Site Settings', 'section_global', 'site_options');
	add_settings_section('social_settings', 'Social Media', 'section_social', 'site_options');
	function section_global() {}
	function section_social() {
		echo '<p>If provided, a link will be shown in the site header.</p>';
	}

	//add_settings_field('contact_email', 'Contact Email Address', 'contact_email_setting', 'site_options', 'global_settings');

	add_settings_field('footer_text', 'Footer Text', 'footer_text_setting', 'site_options', 'global_settings');

	add_settings_field('twitter', 'Twitter Page URL', 'twitter_setting', 'site_options', 'social_settings');
	add_settings_field('facebook', 'Facebook Page URL', 'facebook_setting', 'site_options', 'social_settings');
	// add_settings_field('pinterest', 'Pinterest Page URL', 'pinterest_setting', 'site_options', 'social_settings');
	add_settings_field('instagram', 'Instagram Page URL', 'instagram_setting', 'site_options', 'social_settings');
	add_settings_field('google_plus', 'Google Plus Page URL', 'google_plus_setting', 'site_options', 'social_settings');
}
add_action( 'admin_init', 'register_theme_options' );

//defaults
$theme_defaults = array(
	'contact_email' => 'info@wedding.com',
	'twitter_handle' => 'wedding'
);

//fields
$theme_options = get_option('theme_options',$theme_defaults);

function contact_email_setting(){
	global $theme_options;
	?><input name='theme_options[contact_email]' type='text' value='<?=$theme_options['contact_email'];?>' /><?
}

function footer_text_setting(){
	global $theme_options;
	?><textarea cols="60" rows="4" name="theme_options[footer_text]"><?=$theme_options['footer_text'];?></textarea><?
}


function twitter_handle_setting(){
	global $theme_options;
	?><input name='theme_options[twitter_handle]' type='text' value='<?=$theme_options['twitter_handle'];?>' placeholder="pommadedivine" /><?
}

function twitter_setting(){
	global $theme_options;
	?><input name='theme_options[twitter]' type='text' value='<?=$theme_options['twitter'];?>' placeholder="http://www..." /><?
}
function facebook_setting(){
	global $theme_options;
	?><input name='theme_options[facebook]' type='text' value='<?=$theme_options['facebook'];?>' placeholder="http://www..." /><?
}
function pinterest_setting(){
	global $theme_options;
	?><input name='theme_options[pinterest]' type='text' value='<?=$theme_options['pinterest'];?>' placeholder="http://www..." /><?
}
function google_plus_setting(){
	global $theme_options;
	?><input name='theme_options[google_plus]' type='text' value='<?=$theme_options['google_plus'];?>' placeholder="http://www..." /><?
}
function instagram_setting(){
	global $theme_options;
	?><input name='theme_options[instagram]' type='text' value='<?=$theme_options['instagram'];?>' placeholder="http://www..." /><?
}

function validate_settings($input) {

	//email
	//$input['contact_email'] = trim($input['contact_email']);
	$input['footer_text'] = trim($input['footer_text']);

	//social
	$input['twitter_handle'] = ($input['twitter_handle']);
	$input['twitter'] = esc_url_raw($input['twitter']);
	$input['facebook'] = esc_url_raw($input['facebook']);
	// $input['pinterest'] = esc_url_raw($input['pinterest']);
	$input['google_plus'] = esc_url_raw($input['google_plus']);
	$input['instagram'] = esc_url_raw($input['instagram']);

	return $input;
}

//admin section / page
add_action( 'admin_menu', 'theme_admin_menu' );
function theme_admin_menu() {
	add_menu_page( 'Site Options', 'Site Options', 'manage_options', 'site_options', 'site_options_menu_page', 'dashicons-admin-settings', 81 );
}
function site_options_menu_page(){
	include 'theme.php';
}

?>