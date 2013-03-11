<!--sidebar-->
<div id="nav-sidebar">
    <h1><a href="<?php echo bloginfo('url'); ?>" title="<?php bloginfo('name'); ?> - <?php bloginfo( 'description' ); ?>"><img src="<?php echo O2_IMG; ?>/logo.png" alt="<?php bloginfo('name'); ?>" /><span><?php bloginfo('name'); ?></span></a></h1>
    <?php 
    
    ## DISPLAY WP3 MENU
    wp_nav_menu(array('theme_location' => 'primary', 'container_id' => 'accordion'));
        
    ?>
</div>
<!--/sidebar-->

<!--contact-->
<div id="contact-widget">
    <h4 class="cufon">Contact</h4>
    <span class="cufon"><?php echo of_get_option('phone_num'); ?></span>
    <span class="cufon"><a href="mailto:<?php echo of_get_option('email_address'); ?>"><?php echo of_get_option('email_address'); ?></a></span>
    <span class="location cufon"><?php echo of_get_option('living_area'); ?></span>
    <span class="copyright"><?php echo of_get_option('footer_text'); ?></span>
</div><!--/contact-->