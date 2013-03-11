<?php
/**
 * @package WordPress
 * @subpackage Kimhak1981
 */
/**
 * Template Name: Biography page
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
		  $categories=  get_categories('taxonomy=biography-categories&order=DESC&orderby=ID'); 
		  foreach ($categories as $category) {
		  	$bio_category = $category->category_nicename;
			$option = $category->cat_name;
			$has_cat_child = 5; // child_of=5 - for online

            if ($category->parent < 1) { 
                if ($category->cat_ID != $has_cat_child) {
			     echo '<h3 class="cufon">' . $option . '</h3>';
			     
			     query_posts("posts_per_page=50&post_type=biography&biography-categories=$bio_category");
                
		?>	
			
            <table>            
        	<?php    
			if (have_posts()) : while(have_posts()) : the_post();
			?>	
			<tr>
            	<td class="type"><?php the_title(); ?></td>
                <td><?php the_content(); ?></td>
            </tr>
        	<?php		endwhile; endif; wp_reset_query(); ?>
		 	</table>

		 <?php
                } else {
                    echo '<h3 class="cufon">' . $option . '</h3>';
                    $exhibitions = get_categories('taxonomy=biography-categories&order=DESC&child_of='.$has_cat_child); 
                    foreach ($exhibitions as $exhibition) {
                        $exhibition_cat = $exhibition->category_nicename;
                        $exhibition_name = $exhibition->cat_name;

                        echo '<h5 class="cufon">' . $exhibition_name . '</h5>';

                        query_posts("posts_per_page=50&post_type=biography&biography-categories=$exhibition_cat");
                    
         ?>
            <table>            
            <?php    
            if (have_posts()) : while(have_posts()) : the_post();
            ?>  
            <tr>
                <td class="type"><?php the_title(); ?></td>
                <td><?php the_content(); ?></td>
            </tr>
            <?php       endwhile; endif; wp_reset_query(); ?>
            </table>    
         <?php   
                    }        
                }
            }
          }
         ?>   
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