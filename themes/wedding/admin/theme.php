<?php
//global $theme_options;

?>

<div class="wrap">

	<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Site Options' ) . "</h2>";?>
	
	<?php if ( @$_GET['settings-updated'] ) : ?>
		<div class="updated settings-error" id="setting-error-settings_updated"> 
			<p>
				<strong>Settings saved.</strong>
			</p>
		</div>
	<?php endif; // If the form has just been submitted, this shows the notification ?>

	<form method="post" action="options.php" enctype="multipart/form-data">
		<?php settings_fields('theme_options'); ?>
		<?php do_settings_sections('site_options'); ?>
		<p class="submit">
			<input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" />
		</p>
	</form>

</div>