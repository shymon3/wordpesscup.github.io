<?php
/**
 * Header Layout Settings
 */

add_action( 'customize_register', 'corporate_event_theme_banner_layout_section' );

function corporate_event_theme_banner_layout_section( $wp_customize ) {

    if( class_exists( 'WepPlugin' ) ) :
        $wp_customize->add_section( 'corporate_event_theme_banner_layout_section', array(
            'title'          => esc_html__( 'Banner Layout', 'corporate-event' ),
            'description'    => esc_html__( 'Banner Layout', 'corporate-event' ),
            'panel'          => 'corporate_event_banner_panel',
            'priority'       => 100,
            'capability'     => 'edit_theme_options',
        ) );


        $wp_customize->add_setting( 'corporate_event_banner_layouts', array(
            'sanitize_callback' => 'corporate_event_sanitize_choices',
            'default'     => 'two',
        ) );

        $wp_customize->add_control( new Corporate_Event_Radio_Image_Control( $wp_customize, 'corporate_event_banner_layouts', array(
            'label' => esc_html__( 'Banner Layout','corporate-event' ),
            'section' => 'corporate_event_theme_banner_layout_section',
            'settings' => 'corporate_event_banner_layouts',
            'type'=> 'radio-image',
            'choices'     => array(
                'one'   => get_template_directory_uri() . '/images/banner/banner-1.jpg',
                'two'   => get_template_directory_uri() . '/images/banner/banner-2.jpg',
                'three'   => get_template_directory_uri() . '/images/banner/banner-3.jpg',
                'four'   => get_template_directory_uri() . '/images/banner/banner-4.jpg',
            ),
        ) ) );


    endif;
}