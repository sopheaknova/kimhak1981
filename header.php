<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">
<head>

	<meta name="google-site-verification" content="RDMDOGWGPYDIh5pL_iMCFTCLE_GgADVfSv1DIRWoNbs" />
        <title><?php bloginfo('name'); if(!is_home() || !is_front_page()) wp_title(' | '); ?></title>
	
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<?php
    //show description
    o2_show_description();
    //Stylesheet
    o2_create_stylesheet();
    ?>
    
    <!-- Favicons --> 
	<link href="<?php bloginfo('template_url'); ?>/favicon.ico" rel="shortcut icon" type="image/png" />
	<link href="<?php bloginfo('template_url'); ?>/favicon.png" rel="icon" type="image/png" />    

<!-- feeds, pingback -->
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> RSS Feed" href="<?php bloginfo( 'rss2_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    
	<style type="text/css">
    	body{font-size: <?php echo of_get_option('font_size_select'); ?>px;}
    </style>
    
    <!-- jQuery with plugins -->
	<script src="<?php echo O2_JS; ?>/jquery-1.4.2.min.js" type="text/javascript"></script>
    <script src="<?php echo O2_JS; ?>/jquery-ui.min.js"></script>
    <script src="<?php echo O2_JS; ?>/jquery.pngfix.js" type="text/javascript" charset="utf-8"></script>
    
    <!-- cufon -->
    <script src="<?php bloginfo('template_url'); ?>/font/cufon-yui.js" type="text/javascript"></script>      
    <script src="<?php bloginfo('template_url'); ?>/font/vegur.cufonfonts.js" type="text/javascript"></script>
    
	<script src="<?php echo O2_JS; ?>/custom.js" type="text/javascript"></script>
    	
    <?php if(is_front_page()) { ?>            
    <script src="<?php echo O2_JS; ?>/jquery.cycle.pack.js" type="text/javascript"></script>
    <script src="<?php echo O2_JS; ?>/home.js" type="text/javascript"></script>
	<script type="text/javascript">
    
    /***************************************************
	     WELCOME PAGE
	***************************************************/
	jQuery(document).ready(function($){
		
		$('#logo-cover').fadeIn('slow').animate({"opacity": 1}, 3000);
		
		// Carousel slider
		$('.carousel ul').cycle({
			prev: '.previous',
			next: '.next',
			timeout: <?php echo of_get_option('slideshow_home'); ?>,
			pause: 1
		});
		
	});	
    
    </script>
    <?php } ?>

    <?php if(is_page_template('work.php')) {	?>
    <!-- Start of Facebook Meta Tags -->
    <?php
	global $wp_query;
	$thePostID = $wp_query->post->ID;
	if( has_post_thumbnail( $thePostID )){
		$thumb_id = get_post_thumbnail_id( $thePostID );
		$image = wp_get_attachment_image_src( $thumb_id );
		$share_fb = '';
		$share_fb .= '<meta property="og:title" content="'.get_the_title($thePostID).'" />';
		$share_fb .= '<meta property="og:type" content="article" />';
		$share_fb .= '<meta property="og:url" content="'.get_permalink($thePostID).'" />';
		$share_fb .= '<meta property="og:image" content="'.$image[0].'" />';		
    	$share_fb .= '<meta property="og:site_name" content="KIM HAK"/>';
    	//$share_fb .= '<meta property="og:description" content="With the 1.6 update finally added jQuery effects to the dropdown menu widget. This version also brought many other features like, auto-recognizing dropdown.css in theme folder, specifiying an external theme URL, options for removing link..." />';
		echo $share_fb;
	} ?>
    <!-- End of Facebook Meta Tags -->
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.tipsy.js" type="text/javascript"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.ad-gallery.js" type="text/javascript"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.easing.1.3.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/jquery.mousewheel.min.js" type="text/javascript"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.mCustomScrollbar.js"></script>
    
    <script type="text/javascript">
    
    /***************************************************
	     WORK PAGE
	***************************************************/
	jQuery(document).ready(function($){
	
		//Project Gallery
		var galleries = $('.ad-gallery').adGallery({
			
			loader_image: '<?php bloginfo('template_url'); ?>/images/loader.gif',
			description_wrapper: $('#descriptions'),
			animation_speed: <?php echo of_get_option('animation_effect') ;?>,
			slideshow: {
				autostart: true,
	    		speed: <?php echo of_get_option('animation_speed') ;?>
    		}
			
		});
		
		galleries[0].settings.effect = 'fade';
		
		
		//Funciton Project Page
		$('.scroll-content').hide();
		//$('.project-photo').hide();
		$('#nav-sidebar,#contact-widget').css({visibility: "visible"});
					
		$('.ad-slideshow-start').hide();
		//$('p.ad-image-description').hide();
		$('.ad-nav').hide();
		$('.hide-thumbs').hide();
		
		$('#show-project a').click(function(){
			$('.scroll-content').hide();
			$('.project-photo').fadeIn();
			$('.ad-slideshow-countdown').hide();
		});
		
		$('.ad-slideshow-stop, .ad-prev, .ad-next, .ad-thumbs li a').click(function(){
			$('.ad-slideshow-stop').hide();
			$('.ad-slideshow-start').show();								   
		});
		
		$('.ad-slideshow-start').click(function(){
			$(this).hide();
			$('.ad-slideshow-stop').show();
		});
		
		$('.readtext').click(function(){
			$('.project-photo').fadeOut();
			$('.scroll-content').fadeIn('slow');
		});
		
		$('.ad-image-wrapper').hover(
			function () {				
				$('.ad-image-wrapper p.ad-image-description').show();
			}, 
			function () {				
				$('.ad-image-wrapper p.ad-image-description').hide();
			}				 
		);
		
		$('.show-thumbs').click(function(){
			$('.ad-nav').fadeIn();	
			$(this).hide();
			$('.hide-thumbs').show();
		});
		
		$('.hide-thumbs').click(function(){
			$('.ad-nav').fadeOut();	
			$(this).hide();
			$('.show-thumbs').show();
		});
		
		
		//Give tool tips to every a.tooltip
		$('a.tooltip').tipsy({gravity: 's'}); // n | s | e | w
		
	});	
	
    </script>
    <?php } ?>
    
    <?php if((is_page_template('biography.php')) || (is_page_template('tearsheet.php')) || (is_page_template('all-works.php')) ) {	?>
    <!-- Static page -->
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.easing.1.3.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/jquery.mousewheel.min.js" type="text/javascript"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.mCustomScrollbar.js"></script>
    
    <script type="text/javascript">
    jQuery(document).ready(function($){
		
		$('#nav-sidebar,#contact-widget').css({visibility: "visible"});
	
	});
	
    // Custom Scroll Contents
	$(window).load(function() {
	mCustomScrollbars();
	});
	
	function mCustomScrollbars(){
		/* 
		malihu custom scrollbar function parameters: 
		1) scroll type (values: "vertical" or "horizontal")
		2) scroll easing amount (0 for no easing) 
		3) scroll easing type 
		4) extra bottom scrolling space for vertical scroll type only (minimum value: 1)
		5) scrollbar height/width adjustment (values: "auto" or "fixed")
		6) mouse-wheel support (values: "yes" or "no")
		7) scrolling via buttons support (values: "yes" or "no")
		8) buttons scrolling speed (values: 1-20, 1 being the slowest)
		*/
		$(".scroll-content").mCustomScrollbar("vertical",1000,"easeOutCirc",1.05,"auto","yes","no",0); 
	}
	
	/* function to fix the -10000 pixel limit of jquery.animate */
	$.fx.prototype.cur = function(){
		if ( this.elem[this.prop] != null && (!this.elem.style || this.elem.style[this.prop] == null) ) {
		  return this.elem[ this.prop ];
		}
		var r = parseFloat( jQuery.css( this.elem, this.prop ) );
		return typeof r == 'undefined' ? 0 : r;
	}
	
	/* function to load new content dynamically */
	function LoadNewContent(id,file){
		$("#"+id+" .customScrollBox .content").load(file,function(){
			mCustomScrollbars();
		});
	}
	
    </script>
    
    <?php } ?>


<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>    
    
</head>

<body>
<div id="center-wrap">
<!--wrap-->
<div id="wrap">
	