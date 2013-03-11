<?php 

## CREATE WORK POST TYPE CUSTOM META BOXES

add_action('save_post', 'o_save_work_select');
add_action('add_meta_boxes', 'o_add_work_select_box');

function o_add_work_select_box(){
	add_meta_box('o_work_select', "Work Options", 'o_work_select_meta_box', 'page', 'normal', 'high');
}

function o_work_select_meta_box(){
	wp_nonce_field( plugin_basename(__FILE__), 'myplugin_noncename' );

	$custom_fields = get_post_custom_values('_wp_page_template', $_GET['post']);
	$page_template = $custom_fields[0];
	
	?>
	
	<div style="padding: 0px 20px 0px 20px;">
	
	<?php
	
	if ($page_template == "work.php") {
	
	echo '<h2>Choose the Work you wish to display.</h2>';
	
	$gallery_check = get_post_meta($_GET['post'], 'o_work_select', 23231);
	
	?>
	
	<select name="o_work_select" style="width: 99%;"> 
	 <option value="">Select a Work...</option> 
	 <?php 
	  $categories=  get_categories('taxonomy=work-categories'); 
	  foreach ($categories as $category) {
		$option = '<option value="' . $category->category_nicename . '"';
		if ($category->category_nicename == $gallery_check) $option .= "selected";
		$option .= ">";
		$option .= $category->cat_name;
		$option .= '</option>';
		echo $option;		
	  }
	 ?>
	</select>
    <?php
    } else {

	echo '<h2>Choose from one of the page templates in order to display one.</h2>';

	}
	?>

	</div>
	<?php 
}


function o_save_work_select ($post_id) {

 if ( !wp_verify_nonce( $_POST['myplugin_noncename'], plugin_basename(__FILE__) )) {
    return $post_id;
  }

  if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
    return $post_id;

  if ( 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ) )
      return $post_id;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ) )
      return $post_id;
  }
  
  $p_gallery_select = $_POST['o_work_select'];
    
  $custom_fields = get_post_custom_values('_wp_page_template', $_GET['post']);
  $page_template = $custom_fields[0];
  
  update_post_meta($post_id, 'o_work_select', $p_gallery_select);
  
  return;
    
}

?>