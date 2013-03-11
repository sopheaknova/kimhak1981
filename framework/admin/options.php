<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_theme_data(STYLESHEETPATH . '/style.css');
	$themename = $themename['Name'];
	$themename = preg_replace("/\W/", "", strtolower($themename) );
	
	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
	
	// echo $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

function optionsframework_options() {
	
	$yesno = array('no' => 'No', 'yes' =>'Yes' );
	$float = array('left' => 'left', 'right' =>'right');
	
	$body_font = array( 0 => 'select font size', 10 => 10, 11 => 11, 12 => 12, 13 => 13, 14 => 14, 15 => 15, 16 => 16);

	// If using image radio buttons, define a directory path
	$imagepath =  get_stylesheet_directory_uri() . '/framework/admin/images/';
	$srcpath =  get_stylesheet_directory_uri() . '/framework/src/';
		
	$options = array();

// General Setting 
		$options[] = array( "name" => __('Homepage', 'kimhak'),
						"type" => "heading",
						"slug" => "home"
						);
	
	$options[] = array( "name" => __('Set default Font Size', 'betterwork'),
						"id" => "font_size_select",
						"desc" => __('Please select font size for body text in website.', 'kimhak'),
						"type" => "select",
						"options" => $body_font
						);
						
	$options[] = array( "name" => __('Welcome Message', 'kimhak'),
				"id" => "slideshow_home",
				"std" => __('6000', 'kimhak'),
				"type" => "text",
				);					

// End General

// Work 
	$options[] = array( "name" => __('Work', 'kimhak'),
						"type" => "heading",
						"slug" => "feature"
						);
	
	$options[] = array( "name" => __('Animation Effect of Photo Slideshow', 'kimhak'),
				"id" => "animation_effect",
				"desc" => __('Which ever effect is used to switch images, how long should it take? (e.g: 1200)', 'kimhak'),
				"std" => __('1200', 'kimhak'),
				"type" => "text",
				);	
						
	$options[] = array( "name" => __('Animaiton Speed', 'kimhak'),
				"id" => "animation_speed",
				"desc" => __('During times for showing picture (e.g. 8000 = 8 sec.)', 'kimhak'),
				"std" => __('8000', 'kimhak'),
				"type" => "text",
				);

// End Work

// Contact 
	$options[] = array( "name" => __('Contact', 'kimhak'),
						"type" => "heading",
						"slug" => "contact"
						);
	
	$options[] = array( "name" => __('Phone Number', 'kimhak'),
				"id" => "phone_num",
				"desc" => __('Enter phone number (e.g. + 855 (12) 55 65 39) ', 'kimhak'),
				"std" => __('+ 855 (12) 55 65 39', 'kimhak'),
				"type" => "text",
				);	
						
	$options[] = array( "name" => __('Email Address', 'kimhak'),
				"id" => "email_address",
				"desc" => __('Enter email address', 'kimhak'),
				"std" => __('kim_hak1981@yahoo.com', 'kimhak'),
				"type" => "text",
				);
				
	$options[] = array( "name" => __('Location', 'kimhak'),
				"id" => "living_area",
				"desc" => __('Enter living area (e.g. Phnom Penh, Cambodia)', 'kimhak'),
				"std" => __('Phnom Penh - CAMBODIA', 'kimhak'),
				"type" => "text",
				);

// End Contact

// Work 
	$options[] = array( "name" => __('Footer', 'kimhak'),
						"type" => "heading",
						"slug" => "footer"
						);
	
	$options[] = array( "name" => __('Footer text (HTML)', 'kimhak'),
				"id" => "footer_text",
				"desc" => __('The footer text. ', 'kimhak'),
				"std" => __('Copyright © 2011 Kim Hak, All Rights Reserved. ', 'kimhak'),
				"type" => "text",
				);	
				
// End Work




	return $options;
}