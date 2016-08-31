<?php
if (!defined('ABSPATH')) exit('Not allowed to access pages directly.');

require_once(__DIR__ . '/affilicious-theme.php');

$affiliciousTheme = \AffiliciousTheme::getInstance();
$affiliciousTheme->run();

function mytheme_customizer_live_preview()
{
	wp_enqueue_script(
		'mytheme-themecustomizer',			//Give the script an ID
		get_template_directory_uri().'/assets/js/customize.js',//Point to file
		array( 'jquery','customize-preview' ),	//Define dependencies
		time(),						//Define a version (optional)
		true						//Put script in footer?
	);
}
add_action('customize_preview_init', 'mytheme_customizer_live_preview' );
