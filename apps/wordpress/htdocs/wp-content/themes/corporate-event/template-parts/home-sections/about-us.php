<?php
    if( get_theme_mod( 'about_us_display_option', true ) ) :
       
        $selectaboutLayout = get_theme_mod('corporate_event_about_us_layout','1');
        
        get_template_part( 'layouts/about-us/about-us-layout', $selectaboutLayout );

    endif;
?>