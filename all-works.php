<?php
/**
 * @package WordPress
 * @subpackage Kimhak1981
 */
/**
 * Template Name: All Work page
 */
?>

<?php get_header(); ?>

<!--page loader-->
<div id="pageloader"></div>
<!--/page loader-->

<!--wrap-->
<div id="wrap">

	<?php get_sidebar(); ?>
    
    <!--content-->
    <div id="content">
    	<div class="inner-content">

        <div id="mcs3_container" class="scroll-content highliths">  
            <!--customScrollBox-->
            <div class="customScrollBox">
                <div class="container">
                    <div class="content">
    	
        <div class="all-works">
          <ul>
            <?php
              
              $pages = get_pages(array('child_of' => $post->ID, 'sort_column' => 'post_date', 'sort_order' => 'desc')); // page->id online: 1399
              foreach ( $pages as $page ) { 
                $image_id = get_post_thumbnail_id($page->ID);  
                $image_url = wp_get_attachment_image_src($image_id, 'full');   
            ?>
                <li>
                    <a href="<?php echo get_page_link( $page->ID ); ?>">
                    <img src="<?php bloginfo('template_url'); ?>/framework/scripts/timthumb.php?src=<?php echo $image_url[0]; ?>&amp;w=176&amp;h=120&amp;zc=1&amp;q=100" title="<?php echo $page->post_title; ?>" />
                    </a>
                    <a href="<?php echo get_page_link( $page->ID ); ?>"><span><?php echo $page->post_title; ?></span><span class="info"><?php echo get_post_meta($page->ID, '_cmb_work_dateplace', true); ?></span></a>
                </li>
             <?php 
                }
             ?>         
          </ul>
          <div class="clear"></div>
        </div>
        <!--/all-works-->

                </div>
                </div>
                <div class="dragger_container">
                    <div class="dragger"></div>
                </div>
            </div>
            <!--/customScrollBox-->     
             
        </div>
        <!--/mcs3_container-->

		</div>
    	<!--/inner content-->    
    </div>
    <!--/content-->

<?php get_footer(); ?>