<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category Betterwork
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
 
// Pull all the categories into an array
$categories_arr = array();  
$categories_arr_obj = get_categories('hide_empty=0');
foreach ($categories_arr_obj as $category) {
	$categories_arr[$category->cat_ID] = $category->cat_name;
}  
 
function cmb_sample_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_cmb_';

	$meta_boxes[] = array(
		'id'         => 'tearsheet_metabox',
		'title'      => 'Tearsheet Option',
		'pages'      => array( 'tearsheet', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => 'Year',
				'desc' => __('Enter the year history for Tearsheet items', 'kimhak'),
				'id'   => $prefix . 'tyear',
				'type' => 'text',
			),
			array(
				'name' => 'Upload File',
				'desc' => __('file for this tearsheet item', 'kimhak'),
				'id'   => $prefix . 'tfile',
				'type' => 'file',
			),
			array(
				'name' => 'Country',
				'desc' => __('Enter the country name for this tearsheet item', 'kimhak'),
				'id'   => $prefix . 'tcountry',
				'type' => 'text',
			),
		)
	);
	
	$meta_boxes[] = array(
		'id'         => 'links_metabox',
		'title'      => 'Links Option',
		'pages'      => array( 'links', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => 'URL/Link',
				'desc' => __('Enter the link of the website', 'kimhak'),
				'id'   => $prefix . 'website_url',
				'type' => 'text',
			)
		)
	);
	
	$meta_boxes[] = array(
		'id'         => 'work_info',
		'title'      => 'Work information',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => 'Date and Place',
				'desc' => __('Enter the date or year with place.(e.g: 2012, Phnom Penh)', 'kimhak'),
				'id'   => $prefix . 'work_dateplace',
				'type' => 'text',
			)
		)
	);

	return $meta_boxes;
}
add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'init.php';

}