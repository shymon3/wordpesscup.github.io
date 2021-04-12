<?php
/**
 * Header Layout Settings
 */

add_action( 'customize_register', 'corporate_event_theme_banner_position_section' );

function corporate_event_theme_banner_position_section( $wp_customize ) {

    if( class_exists( 'WepPlugin' ) ) :
        $wp_customize->add_section( 'corporate_event_theme_banner_option_section', array(
            'title'          => esc_html__( 'Banner Position', 'corporate-event' ),
            'description'    => esc_html__( 'Banner Position', 'corporate-event' ),
            'panel'          => 'corporate_event_banner_panel',
            'priority'       => 2,
            'capability'     => 'edit_theme_options',
        ) );

        $wp_customize->add_setting( 'banner_position', array(
            'capability'  => 'edit_theme_options',
            'sanitize_callback' => 'corporate_event_sanitize_choices',
            'default'     => 'center',
        ) );

        $wp_customize->add_control( new Corporate_Event_Radio_Buttonset_Control( $wp_customize, 'banner_position', array(
            'label' => esc_html__( 'Banner Position :', 'corporate-event' ),
            'section' => 'corporate_event_theme_banner_option_section',
            'settings' => 'banner_position',
            'type'=> 'radio-buttonset',
            'choices'     => array(
                'left' => esc_html__( 'Left', 'corporate-event' ),
                'center'    =>  esc_html__( 'Center', 'corporate-event' ),
                'right' => esc_html__( 'Right', 'corporate-event' ),
            ),
        ) ) );

    endif;
}