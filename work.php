<?php
/**
 * @package WordPress
 * @subpackage Kimhak1981
 */
/**
 * Template Name: Work page
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
    	
        <!--Project-->
        <?php 				
				$work_selected = get_post_meta($post->ID, 'o_work_select', true);
				$work_query = new WP_Query(array( 
						'post_type' => 'work', 
						'tax_query' => array(
							array(
								'taxonomy' => 'work-categories',
								'terms' => array($work_selected),
								'field' => 'slug'
							)
						) ,
						'showposts' => -1
				));
				$img = 0;						
			?>
            
            <!--Project Photos-->
            <div class="project-photo">
                <div id="gallery" class="ad-gallery">
                    <div class="ad-image-wrapper">
                    </div>
                    
                    <div class="ad-nav">
                    <div class="ad-thumbs">
                      <ul class="ad-thumb-list">
                      
                      <?php
					  	while ($work_query->have_posts()) : $work_query->the_post();
		
						$image_id = get_post_thumbnail_id();  
						$image_url = wp_get_attachment_image_src($image_id, 'full');
						$thumb_url = wp_get_attachment_image_src($image_id, 'thumbnail');					  
					  ?>
                        <li>
                          <a href="<?php echo $image_url[0]; ?>">
                            <img src="<?php bloginfo('template_url'); ?>/framework/scripts/timthumb.php?src=<?php echo $image_url[0]; ?>&amp;w=60&amp;h=40&amp;zc=1&amp;q=100" title="<?php the_title(); ?>" class="image<?php echo $img; ?>" width="60" height="40" />
                          </a>
                        </li>
                      <?php 
					  	$img++;
					  	endwhile; 
						// Reset Post Data
						wp_reset_postdata(); 
					  ?>
                                                
                      </ul>
                    </div>
                    </div>
                    <!--/ad-nav-->
                    
                    <div class="ad-controls">
                    	<div class="custom-controls">
                            <span class="show-thumbs"><a class="tooltip" title="Show Thumbnails"><img src="<?php bloginfo('template_url'); ?>/images/view-thumbs.gif" alt="Show Thumbnails" /></a></span>
                            <span class="hide-thumbs"><a class="tooltip" title="Auto Slideshow"><img src="<?php bloginfo('template_url'); ?>/images/hide-thumbs.gif" alt="Hide Thumbnails" /></a></span>
                            <span class="readtext"><a class="tooltip" title="Read text">Read Text</a></span>
                            <span class="facebook"><a class="tooltip" title="Share to Facebook" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" target="blank">
                            	<img src="<?php bloginfo('template_url'); ?>/images/facebook.gif" alt="Share to Facebook" /></a>
                            </span>                            
                            
                        </div>
                    </div>
                    <!--/ad-controls-->
                    
                </div>
                
            </div>
            <!--/Project Photos-->
        
        
        
            <!--Project Description-->
            <div class="scroll-content highliths">            
            <div class="content">
            <h2 class="cufon"><?php the_title(); ?></h2>    
            
            <?php 
				if (have_posts()) : while(have_posts()) : the_post();
			?>
            
            <?php
					the_content(); 
			?>
            
            	<div id="show-project"><a><img src="<?php bloginfo('template_url'); ?>/images/play-icon.png" alt="View Photos of Project" /></a></div>	
			<?php		
					endwhile; 
        		
            	else : ?>
        
                <h2>Not Found</h2>
                <p>Sorry, but you are looking for something that isn't here.</p>
        
            <?php endif; 
				wp_reset_query();
			?>				
    		</div>
            <!--/.content-->
            </div>
            <!--/Project Description-->
            
        <!--/Project-->              
        

		</div>
    	<!--/inner content-->    
    </div>
    <!--/content-->

<?php get_footer(); ?>