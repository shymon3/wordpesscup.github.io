<?php if( class_exists('WepPlugin') && get_theme_mod( 'testimonial_display_option', true ) ) { ?>    
    <div class="testimonials-wrapper spacer">
        <div class="container">
            <?php $testimonialHeading = get_theme_mod( 'heading_for_testimonial' ); ?>

        <?php if($testimonialHeading) { ?>
            <h2 class="title title-1"><?php echo esc_html($testimonialHeading); ?></h2>
        <?php } ?>

        <?php                
            $selecTestimonialLayout = get_theme_mod('corporate_event_testimonial_layouts','1');

            if (class_exists('WepTestimonialAddonPlugin')) {
                if ($selecTestimonialLayout == '1') {
                    do_action('WEP_testimonial_add_layouts');
                } else {
                    do_action('WEP_testimonial_addon_customize_layouts');
                }
            } else {
                do_action('WEP_testimonial_add_layouts');
            }
        ?>
        </div>
    </div>
<?php }