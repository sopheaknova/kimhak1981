<?php get_header(); ?>

    <?php get_sidebar(); ?>
    
    <!--cover-->
    <div id="logo-cover">
        <a title="Enter to <?php bloginfo('name'); ?>"><img src="<?php echo O2_IMG; ?>/logo.png" alt="<?php bloginfo('name'); ?>" /></a>
    </div>
    <!--/cover-->

	<!--content-->
    <div id="content">
    	
        <!-- Carousel -->
        <div class="carousel">
			<a class="previous" href="#">&lt;</a>
			<ul>
				<?php 
				query_posts("post_type=slideshow&order=DESC&posts_per_page=5");
				
				if (have_posts()) : while (have_posts()) : the_post();
				?>	
                
                <li>
			    	<?php the_post_thumbnail('full'); ?>
                </li>
                
				<?php 
				endwhile; endif; 
		
				wp_reset_query();
				?>                
            </ul>
            <a class="next" href="#">&gt;</a>
        </div>
        <!-- /Carousel -->            
        
    </div>
    <!--/content-->

<?php get_footer(); ?>