<?php

/**************************************************************
 *          All theme Paths 
 ***************************************************************/
	
	//theme Directory and URI
	define('O2_DIR', get_template_directory());
	define('O2_URI', get_template_directory_uri());
	
	// Framework
	define('O2_FW', O2_DIR . '/framework');
	//post types
	define('O2_TYPE', O2_FW . '/posttype');
	
		//assest
		define('O2_JS', O2_URI . '/js');
		define('O2_CSS', O2_URI . '/css');
		define('O2_IMG', O2_URI . '/images');
		define('O2_ADMIN', O2_FW . '/admin');
		define('O2_CUSTOMPOST', O2_FW . '/custom-post');
		define('O2_META', O2_FW . '/metaboxes');
		
	define('OPTIONS_FRAMEWORK_URL', O2_URI . '/framework/admin/');
	define('OPTIONS_FRAMEWORK_DIRECTORY', O2_ADMIN);
		
	
	//Admin Option
    require (O2_ADMIN . '/options-framework.php');	
	
	//Add CPT	
	include (O2_TYPE . '/custom-post-type.php');
	
	//Add metabox
	include ( O2_META . '/theme-metaboxes.php');	
	include ( O2_META . '/work-metabox.php');	


// Custom logo login
function my_custom_login_logo() {
    echo '<style type="text/css">
        .login h1 a { background-image:url('.get_bloginfo('template_directory').'/images/custom-login-logo.png) !important; height:70px !important; background-size: 310px 70px !important; }
    </style>';
}

add_action('login_head', 'my_custom_login_logo');

//  Remove error message login
add_filter('login_errors', create_function('$a', "return null;"));


//  Remove wordpress link on admin login logo
function remove_link_on_admin_login_info() {
     return  get_bloginfo('url');
}
  
add_filter('login_headerurl', 'remove_link_on_admin_login_info');

//	Remove logo and other items in Admin menu bar
function remove_admin_bar_links() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('comments');
	$wp_admin_bar->remove_menu('wp-logo');
}
add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );

//  Remove wordpress version generation
function remove_version_info() {
     return '';
}
add_filter('the_generator', 'remove_version_info');


//  Set favicons for backend code
function adminfavicon() {
echo '<link rel="icon" type="image/x-icon" href="'.get_bloginfo('template_directory').'/images/admin-favicon.png" />';
}
add_action( 'admin_head', 'adminfavicon' );

// Menu functions with support for WordPress 3.0 menus
if ( function_exists('wp_nav_menu') ) {
    add_theme_support( 'nav-menus' );
    register_nav_menus( array(
	'primary' => __( 'Primary Navigation', 'Kimhak' ),
    ) );
}

function o2_doctitle() {
		$site_name = get_bloginfo('name');
	    $separator = '|';
	        	
	    if ( is_single() ) {
	      $content = single_post_title('', FALSE);
	    }
	    elseif ( is_home() || is_front_page() ) { 
	      $content = get_bloginfo('description');
	    }
	    elseif ( is_page() ) { 
	      $content = single_post_title('', FALSE); 
	    }
	    elseif ( is_search() ) { 
	      $content = __('Search Results for:', 'mom'); 
	      $content .= ' ' . esc_html(stripslashes(get_search_query()));
	    }
	    elseif ( is_category() ) {
	      $content = __('Category Archives:', 'mom');
	      $content .= ' ' . single_cat_title("", false);;
	    }
	    elseif ( is_tag() ) { 
	      $content = __('Tag Archives:', 'mom');
	      $content .= ' ' . o2_tag_query();
	    }
	    elseif ( is_404() ) { 
	      $content = __('Not Found', 'mom'); 
	    }
	    else { 
	      $content = get_bloginfo('description');
	    }
	
	    if (get_query_var('paged')) {
	      $content .= ' ' .$separator. ' ';
	      $content .= 'Page';
	      $content .= ' ';
	      $content .= get_query_var('paged');
	    }
	
	    if($content) {
	      if ( is_home() || is_front_page() ) {
	          $elements = array(
	            'site_name' => $site_name,
	            'separator' => $separator,
	            'content' => $content
	          );
	      }
	      else {
	          $elements = array(
	            'content' => $content
	          );
	      }  
	    } else {
	      $elements = array(
	        'site_name' => $site_name
	      );
	    }
	
	    // Filters should return an array
	    $elements = apply_filters('o2_doctitle', $elements);
		
	    // But if they don't, it won't try to implode
	    if(is_array($elements)) {
	      $doctitle = implode(' ', $elements);
	    }
	    else {
	      $doctitle = $elements;
	    }
	    
	    $doctitle = "\t" . "<title>" . $doctitle . "</title>" . "\n\n";
	    
	    echo $doctitle;
	} // end o2_doctitle

// Creates the content-type section
function o2_create_contenttype() {
    $content  = "\t";
    $content .= "<meta http-equiv=\"Content-Type\" content=\"";
    $content .= get_bloginfo('html_type'); 
    $content .= "; charset=";
    $content .= get_bloginfo('charset');
    $content .= "\" />";
    $content .= "\n\n";
    echo apply_filters('o2_create_contenttype', $content);
} // end o2_create_contenttype

// The master switch for SEO functions
function o2_seo() {
		$content = TRUE;
		return apply_filters('o2_seo', $content);
}

// Creates the canonical URL
function o2_canonical_url() {
		if (o2_seo()) {
    		if ( is_singular() ) {
        		$canonical_url = "\t";
        		$canonical_url .= '<link rel="canonical" href="' . get_permalink() . '" />';
        		$canonical_url .= "\n\n";        
        		echo apply_filters('o2_canonical_url', $canonical_url);
				}
    }
} // end o2_canonical_url


// switch use of o2_the_excerpt() - default: ON
function o2_use_excerpt() {
    $display = TRUE;
    $display = apply_filters('o2_use_excerpt', $display);
    return $display;
} // end o2_use_excerpt


// switch use of o2_the_excerpt() - default: OFF
function o2_use_autoexcerpt() {
    $display = FALSE;
    $display = apply_filters('o2_use_autoexcerpt', $display);
    return $display;
} // end o2_use_autoexcerpt

function o2_the_excerpt($deprecated = '') {
	global $post;
	$output = '';
	$output = strip_tags($post->post_excerpt);
	$output = str_replace('"', '\'', $output);
	if ( post_password_required($post) ) {
		$output = __('There is no excerpt because this is a protected post.');
		return $output;
	}

	return $output;
	
}

// Creates the meta-tag description
function o2_create_description() {
		$content = '';
		if (o2_seo()) {
    		if (is_single() || is_page() ) {
      		  if ( have_posts() ) {
          		  while ( have_posts() ) {
            		    the_post();
										if (o2_the_excerpt() == "") {
                    		if (o2_use_autoexcerpt()) {
                        		$content ="\t";
														$content .= "<meta name=\"description\" content=\"";
                        		$content .= o2_excerpt_rss();
                        		$content .= "\" />";
                        		$content .= "\n\n";
                    		}
                		} else {
                    		if (o2_use_excerpt()) {
                        		$content ="\t";
                        		$content .= "<meta name=\"description\" content=\"";
                        		$content .= o2_the_excerpt();
                        		$content .= "\" />";
                        		$content .= "\n\n";
                    		}
                		}
            		}
        		}
    		} elseif ( is_home() || is_front_page() ) {
        		$content ="\t";
        		$content .= "<meta name=\"description\" content=\"";
        		$content .= get_bloginfo('description');
        		$content .= "\" />";
        		$content .= "\n\n";
    		}
    		echo apply_filters ('o2_create_description', $content);
		}
} // end o2_create_description


// meta-tag description is switchable using a filter
function o2_show_description() {
    $display = TRUE;
    $display = apply_filters('o2_show_description', $display);
    if ($display) {
        o2_create_description();
    }
} // end o2_show_description


// create meta-tag robots
function o2_create_robots() {
        global $paged;
		if (o2_seo()) {
    		$content = "\t";
    		if((is_home() && ($paged < 2 )) || is_front_page() || is_single() || is_page() || is_attachment()) {
				$content .= "<meta name=\"robots\" content=\"index,follow\" />";
    		} elseif (is_search()) {
        		$content .= "<meta name=\"robots\" content=\"noindex,nofollow\" />";
    		} else {	
        		$content .= "<meta name=\"robots\" content=\"noindex,follow\" />";
    		}
    		$content .= "\n\n";
    		if (get_option('blog_public')) {
    				echo apply_filters('o2_create_robots', $content);
    		}
		}
} // end o2_create_robots


// meta-tag robots is switchable using a filter
function o2_show_robots() {
    $display = TRUE;
    $display = apply_filters('o2_show_robots', $display);
    if ($display) {
        o2_create_robots();
    }
} // end o2_show_robots

// creates link to style.css
function o2_create_stylesheet() {
    $content = "\t";
    $content .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"";
    $content .= get_bloginfo('stylesheet_url');
    $content .= "\" />";
    $content .= "\n\n";
    echo apply_filters('o2_create_stylesheet', $content);
}

// Capture the output of "the_author_posts_link()" function into a local variable and return it.
// This function must be used within 'The Loop'
if ( !function_exists('betterwork_get_the_author_page_link') ) {
    function betterwork_get_the_author_page_link() {
        ob_start();
        the_author_posts_link();
        $the_author_link = ob_get_contents();
        ob_end_clean();
        return $the_author_link;
    }
}

if ( function_exists('add_theme_support') ) {
    add_theme_support( 'automatic-feed-links' );
} elseif ( function_exists('automatic_feed_links') ) {
    automatic_feed_links();
}

// Add support for post featured image.  To add this feature to other post types, add those new types to the array, e.g. array( 'post', 'page', 'movies' )
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails', array( 'page', 'slideshow', 'work' ));
	add_image_size( 'medium', 650, 443 );
}

## Enable widgets
if ( function_exists('register_sidebar') ) {

register_sidebar(array('name'=>'Left Sidebar',
	'before_widget' => "<div class='sidebarwidget'>",
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3 >',
));
}


?>