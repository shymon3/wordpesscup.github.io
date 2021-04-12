<?php
if( ! function_exists( 'Corporate_Event_register_custom_controls' ) ) :
/**
 * Register Custom Controls
*/
function Corporate_Event_register_custom_controls( $wp_customize ) {
    
    // Load our custom control.
    require_once get_template_directory() . '/inc/custom-controls/radiobtn/class-radio-buttonset-control.php';
    require_once get_template_directory() . '/inc/custom-controls/radioimg/class-radio-image-control.php';
    require_once get_template_directory() . '/inc/custom-controls/select/class-select-control.php';
    require_once get_template_directory() . '/inc/custom-controls/slider/class-slider-control.php';
    require_once get_template_directory() . '/inc/custom-controls/toggle/class-toggle-control.php';
    require_once get_template_directory() . '/inc/custom-controls/repeater/class-repeater-setting.php';
    require_once get_template_directory() . '/inc/custom-controls/repeater/class-control-repeater.php';
    require_once get_template_directory() . '/inc/custom-controls/sortable/class-sortable-control.php';

    require_once get_template_directory() . '/inc/custom-controls/notes.php';
            
    // Register the control type.
    $wp_customize->register_control_type( 'Corporate_Event_Radio_Buttonset_Control' );
    $wp_customize->register_control_type( 'Corporate_Event_Radio_Image_Control' );
    $wp_customize->register_control_type( 'Corporate_Event_Select_Control' );
    $wp_customize->register_control_type( 'Corporate_Event_Slider_Control' );
    $wp_customize->register_control_type( 'Corporate_Event_Toggle_Control' );    
    $wp_customize->register_control_type( 'Corporate_Event_Control_Sortable' );
}

add_action( 'customize_register', 'Corporate_Event_register_custom_controls' );

endif;