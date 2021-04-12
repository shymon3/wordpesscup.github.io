<?php
/**
 * Header Layout Settings
 */

add_action( 'customize_register', 'corporate_event_theme_header_layout_section' );

function corporate_event_theme_header_layout_section( $wp_customize ) {

    $wp_customize->add_section( 'corporate_event_theme_header_layout_section', array(
        'title'          => esc_html__( 'Header Options', 'corporate-event' ),
        'priority'       => 2,
        'capability'     => 'edit_theme_options',
    ) );

    $wp_customize->add_setting( 'corporate_event_header_sticky_menu_option', array(
      'sanitize_callback'     =>  'corporate_event_sanitize_checkbox',
      'default'               =>  false
    ) );

    $wp_customize->add_control( new Corporate_Event_Toggle_Control( $wp_customize, 'corporate_event_header_sticky_menu_option', array(
      'label' => esc_html__( 'Enable Sticky Menu?','corporate-event' ),
      'section' => 'corporate_event_theme_header_layout_section',
      'settings' => 'corporate_event_header_sticky_menu_option',
      'type'=> 'toggle',
    ) ) );

    $wp_customize->add_setting( 'corporate_event_header_layouts', array(
        'sanitize_callback' => 'corporate_event_sanitize_choices',
        'default'     => 'one',
    ) );

    $wp_customize->add_control( new Corporate_Event_Radio_Image_Control( $wp_customize, 'corporate_event_header_layouts', array(
        'label' => esc_html__( 'Header Layout','corporate-event' ),
        'section' => 'corporate_event_theme_header_layout_section',
        'settings' => 'corporate_event_header_layouts',
        'type'=> 'radio-image',
        'choices'     => array(
            'one'   => get_template_directory_uri() . '/images/header-layouts/header-1.jpg',
            'two'   => get_template_directory_uri() . '/images/header-layouts/header-2.jpg',
            'three'   => get_template_directory_uri() . '/images/header-layouts/header-3.jpg',
            ),
    ) ) );

}