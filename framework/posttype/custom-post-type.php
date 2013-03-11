<?php

/* Register Custom Post Type for Slideshow */
add_action('init', 'slideshow_post_type_init');

function slideshow_post_type_init() {
  $labels = array(
    'name' => __('Slideshow', 'post type general name','kimhak'),
    'singular_name' => __('slideshow', 'post type singular name','kimhak'),
    'add_new' => __('Add New', 'slideshow','kimhak'),
    'add_new_item' => __('Add New slideshow','kimhak'),
    'edit_item' => __('Edit slideshow','kimhak'),
    'new_item' => __('New slideshow','kimhak'),
    'view_item' => __('View slideshow','kimhak'),
    'search_items' => __('Search slideshow','kimhak'),
    'not_found' =>  __('No slideshow found','kimhak'),
    'not_found_in_trash' => __('No slideshow found in Trash','kimhak'), 
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'rewrite' => true,
    'query_var' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'show_in_nav_menus' => false,
    'menu_position' => 111,
	'menu_icon' => get_template_directory_uri() . '/images/slideshow.png',
    'rewrite' => array(
      'slug' => 'slideshow_item',
      'with_front' => FALSE,
    ),
    'supports' => array(
      'title',
	  'thumbnail'
    )
  );
  register_post_type('slideshow',$args);
}

/* Register Custom Post Type for Work */
add_action('init', 'work_post_type_init');

function work_post_type_init() {
  $labels = array(
    'name' => __('Work', 'post type general name','kimhak'),
    'singular_name' => __('work', 'post type singular name','kimhak'),
    'add_new' => __('Add New', 'work','kimhak'),
    'add_new_item' => __('Add New work','kimhak'),
    'edit_item' => __('Edit work','kimhak'),
    'new_item' => __('New work','kimhak'),
    'view_item' => __('View work','kimhak'),
    'search_items' => __('Search work','kimhak'),
    'not_found' =>  __('No work found','kimhak'),
    'not_found_in_trash' => __('No work found in Trash','kimhak'), 
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'rewrite' => true,
    'query_var' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'show_in_nav_menus' => false,
    'menu_position' => 112,
	'menu_icon' => get_template_directory_uri() . '/images/work.png',
    'rewrite' => array(
      'slug' => 'work_item',
      'with_front' => FALSE,
    ),
    'supports' => array(
      'title',
	  //'editor',
	  'thumbnail'
    )
  );

  register_post_type('work',$args);
  
  $w_labels = array(
    'name' => _x( 'Work type', 'taxonomy general name' ),
    'singular_name' => _x( 'Work type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Work type' ),
    'popular_items' => __( 'Popular Work type' ),
    'all_items' => __( 'All Work type' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Work type' ), 
    'update_item' => __( 'Update Work type' ),
    'add_new_item' => __( 'Add New Work type' ),
    'new_item_name' => __( 'New Work type Name' ),
    'separate_items_with_commas' => __( 'Separate Work type with commas' ),
    'add_or_remove_items' => __( 'Add or remove Work type' ),
    'choose_from_most_used' => __( 'Choose from the most used Work type' ),
    'menu_name' => __( 'Work type' ),
);
  
  register_taxonomy("work-categories", array("work"), array("hierarchical" => true, "label" => "Work type", "singular_label" => "Work Category", "labels" => $w_labels, 'query_var' => true, "rewrite" => true, "show_in_nav_menus" => true));
}


/* Register Custom Post Type for Biography */
add_action('init', 'bio_post_type_init');

function bio_post_type_init() {
  $labels = array(
    'name' => __('Biography', 'post type general name','kimhak'),
    'singular_name' => __('Biography', 'post type singular name','kimhak'),
    'add_new' => __('Add New', 'Biography','kimhak'),
    'add_new_item' => __('Add New Biography','kimhak'),
    'edit_item' => __('Edit Biography','kimhak'),
    'new_item' => __('New Biography','kimhak'),
    'view_item' => __('View Biography','kimhak'),
    'search_items' => __('Search Biography','kimhak'),
    'not_found' =>  __('No Biography found','kimhak'),
    'not_found_in_trash' => __('No Biography found in Trash','kimhak'), 
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'rewrite' => true,
    'query_var' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'show_in_nav_menus' => false,
    'menu_position' => 113,
	'menu_icon' => get_template_directory_uri() . '/images/bio.png',
    'rewrite' => array(
      'slug' => 'biography_item',
      'with_front' => FALSE,
    ),
    'supports' => array(
      'title',
	  'editor',
	  'thumbnail'
    )
  );

  register_post_type('biography',$args);
  
  $w_labels = array(
    'name' => _x( 'Biography type', 'taxonomy general name' ),
    'singular_name' => _x( 'Biography type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Biography type' ),
    'popular_items' => __( 'Popular Biography type' ),
    'all_items' => __( 'All Biography type' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Biography type' ), 
    'update_item' => __( 'Update Biography type' ),
    'add_new_item' => __( 'Add New Biography type' ),
    'new_item_name' => __( 'New Biography type Name' ),
    'separate_items_with_commas' => __( 'Separate Biography type with commas' ),
    'add_or_remove_items' => __( 'Add or remove Biography type' ),
    'choose_from_most_used' => __( 'Choose from the most used Biography type' ),
    'menu_name' => __( 'Biography type' ),
);
  
  register_taxonomy("biography-categories", array("biography"), array("hierarchical" => true, "label" => "Biography type", "singular_label" => "Biography Category", "labels" => $w_labels, 'query_var' => true, "rewrite" => true, "show_in_nav_menus" => true));
}


/* Register Custom Post Type for tearsheet */
add_action('init', 'tearsheet_post_type_init');

function tearsheet_post_type_init() {
  $labels = array(
    'name' => __('Tearsheet', 'post type general name','kimhak'),
    'singular_name' => __('tearsheet', 'post type singular name','kimhak'),
    'add_new' => __('Add New', 'tearsheet','kimhak'),
    'add_new_item' => __('Add New tearsheet','kimhak'),
    'edit_item' => __('Edit tearsheet','kimhak'),
    'new_item' => __('New tearsheet','kimhak'),
    'view_item' => __('View tearsheet','kimhak'),
    'search_items' => __('Search tearsheet','kimhak'),
    'not_found' =>  __('No tearsheet found','kimhak'),
    'not_found_in_trash' => __('No tearsheet found in Trash','kimhak'), 
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'rewrite' => true,
    'query_var' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'show_in_nav_menus' => false,
    'menu_position' => 114,
	'menu_icon' => get_template_directory_uri() . '/images/tearsheet.png',
    'rewrite' => array(
      'slug' => 'tearsheet_item',
      'with_front' => FALSE,
    ),
    'supports' => array(
      'title',
	  //'editor',
	  'thumbnail'
    )
  );
  register_post_type('tearsheet',$args);
  
  $t_labels = array(
    'name' => _x( 'Tearsheet', 'taxonomy general name' ),
    'singular_name' => _x( 'Tearsheet', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Tearsheet' ),
    'popular_items' => __( 'Popular Tearsheet' ),
    'all_items' => __( 'All Tearsheet' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Tearsheet' ), 
    'update_item' => __( 'Update Tearsheet' ),
    'add_new_item' => __( 'Add New Tearsheet' ),
    'new_item_name' => __( 'New Tearsheet Name' ),
    'separate_items_with_commas' => __( 'Separate tearsheet with commas' ),
    'add_or_remove_items' => __( 'Add or remove tearsheet' ),
    'choose_from_most_used' => __( 'Choose from the most used tearsheet' ),
    'menu_name' => __( 'Tearsheet' ),
);
  
  register_taxonomy("tearsheet-categories", array("tearsheet"), array("hierarchical" => true, "label" => "Tearsheet", "singular_label" => "Tearsheet Category", "labels" => $t_labels, 'query_var' => true, "rewrite" => true, "show_in_nav_menus" => true));
}

/* Register Custom Post Type for Links */
add_action('init', 'links_post_type_init');

function links_post_type_init() {
  $labels = array(
    'name' => __('Links', 'post type general name','kimhak'),
    'singular_name' => __('links', 'post type singular name','kimhak'),
    'add_new' => __('Add New', 'links','kimhak'),
    'add_new_item' => __('Add New links','kimhak'),
    'edit_item' => __('Edit links','kimhak'),
    'new_item' => __('New links','kimhak'),
    'view_item' => __('View links','kimhak'),
    'search_items' => __('Search links','kimhak'),
    'not_found' =>  __('No links found','kimhak'),
    'not_found_in_trash' => __('No links found in Trash','kimhak'), 
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'rewrite' => true,
    'query_var' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'show_in_nav_menus' => false,
    'menu_position' => 110,
	'menu_icon' => get_template_directory_uri() . '/images/link.png',
    'rewrite' => array(
      'slug' => 'links_item',
      'with_front' => FALSE,
    ),
    'supports' => array(
      'title'
    )
  );
  register_post_type('links',$args);
}

/* Register Column for Custom Post Type for Slideshow */
add_filter("manage_edit-slideshow_columns", "slideshow_edit_columns");
add_action("manage_posts_custom_column",  "slideshow_custom_columns");


function slideshow_edit_columns($columns){
		$columns = array(
			"cb" => "<input type=\"checkbox\" />",
			"title" => "Title",
			"image" => "Image",
		);
		
		return $columns;
}

function slideshow_custom_columns($column){
		global $post;
		switch ($column)
		{
			case "image":
				the_post_thumbnail(array(100,100));
				break;	
		}
}

/* Register Column for Custom Post Type for Links */
add_filter("manage_edit-links_columns", "links_edit_columns");
add_action("manage_posts_custom_column",  "links_custom_columns");


function links_edit_columns($columns){
		$columns = array(
			"cb" => "<input type=\"checkbox\" />",
			"title" => "Title",
			"link" => "Link",
		);
		
		return $columns;
}

function links_custom_columns($column){
		global $post;
		switch ($column)
		{
			case "link":
				$custom = get_post_custom('_cmb_url_slideshow');
				echo $custom["_cmb_website_url"][0];
				break;
		}
}

/* Register Column for Custom Post Type for Work */
add_filter("manage_edit-work_columns", "work_edit_columns");
add_action("manage_posts_custom_column",  "work_custom_columns");


function work_edit_columns($columns){
		$columns = array(
			"cb" => "<input type=\"checkbox\" />",
			"title" => "Title",
			"work-image" => "Image",
			"work-category" => "Category",
		);
		
		return $columns;
}

function work_custom_columns($column){
		global $post;
		switch ($column)
		{
			case "work-image":
				the_post_thumbnail(array(100,100));
				break;	
				
			case "work-category":
				echo get_the_term_list($post->ID, 'work-categories', '', ', ','');
				break;	
		}
}

/* Register Column for Custom Post Type for Biography */
add_filter("manage_edit-biography_columns", "bio_edit_columns");
add_action("manage_posts_custom_column",  "bio_custom_columns");

function bio_edit_columns($columns){

		$newcolumns = array(
			"cb" => "<input type=\"checkbox\" />",
			"title" => "Title",
			"biography-categories" => "Categories"
		);
		
		$columns= array_merge($newcolumns, $columns);

		return $columns;
}

function bio_custom_columns($column){
		global $post;
		switch ($column)
		{
			case "description":
				#the_excerpt();
				break;
			case "biography-categories":
				echo get_the_term_list($post->ID, 'biography-categories', '', ', ','');
				break;
		}
}

?>