<?php
/**
 * @package WordPress
 * @subpackage Kimhak1981
 */
/**
 * Template Name: Tearsheet page
 */
?>

<?php get_header(); ?>

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
                
        <?php if (have_posts()) : while(have_posts()) : the_post(); ?>
	
    		<!--Tear Sheet-->
	        <h2 class="cufon"><?php the_title(); ?></h2>
		
		<?php		the_content(); 
				
			endwhile; 
        		
           	else :	?>
            
            <h2>Not Found</h2>
                <p>Sorry, but you are looking for something that isn't here.</p>
                
        <?php endif; 
				wp_reset_query();
			?>  
        
        
        <?php 				
			query_posts("posts_per_page=50&post_type=tearsheet&tearsheet-categories=tearsheet");							
		?>          
		<table>
        
	        <?php			
				if (have_posts()) : while(have_posts()) : the_post();
				
				$o_tearsheet_item_url =	get_post_meta($post->ID, '_cmb_tfile', true); 
	        ?>	
        	<tr>
            	<td class="year"><?php echo get_post_meta($post->ID, '_cmb_tyear', true); ?></td>
                <td class="company">
					<?php if($o_tearsheet_item_url !=='') { ?> 
					<a href="<?php echo $o_tearsheet_item_url; ?>"><?php the_title(); ?></a>
                    <?php } else { 
						the_title();
					} ?>
                    
                </td>
                <td class="country"><?php echo get_post_meta($post->ID, '_cmb_country', true); ?></td>
            </tr>
            <?php endwhile; endif; wp_reset_query(); ?>
            
        </table>
        <!--Tear Sheet--> 
        
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