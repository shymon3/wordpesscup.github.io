<?php

/**
 * Colors Settings
 *
 * @package Corporate_Event
 */
add_action( 'customize_register', 'corporate_event_change_colors_panel' );
function corporate_event_change_colors_panel( $wp_customize )
{
    $wp_customize->get_section( 'colors' )->priority = 4;
    $wp_customize->get_section( 'colors' )->title = esc_html__( 'Colors and Fonts', 'corporate-event' );
}

add_action( 'customize_register', 'corporate_event_customize_color_options' );
function corporate_event_customize_color_options( $wp_customize )
{
}

add_action( 'customize_register', 'corporate_event_customize_font_family' );
function corporate_event_customize_font_family( $wp_customize )
{
    $wp_customize->add_setting( 'font_family', array(
        'transport'         => 'postMessage',
        'default'           => 'Montserrat',
        'sanitize_callback' => 'corporate_event_sanitize_google_fonts',
    ) );
    $wp_customize->add_control( 'font_family', array(
        'settings' => 'font_family',
        'label'    => esc_html__( 'Choose Font Family For Your Site', 'corporate-event' ),
        'section'  => 'colors',
        'type'     => 'select',
        'choices'  => corporate_event_google_fonts(),
        'priority' => 100,
    ) );
}

add_action( 'customize_register', 'corporate_event_customize_font_size' );
function corporate_event_customize_font_size( $wp_customize )
{
    $wp_customize->add_setting( 'font_size', array(
        'transport'         => 'postMessage',
        'default'           => '14px',
        'sanitize_callback' => 'corporate_event_sanitize_select',
    ) );
    $wp_customize->add_control( 'font_size', array(
        'settings' => 'font_size',
        'label'    => esc_html__( 'Choose Font Size', 'corporate-event' ),
        'section'  => 'colors',
        'type'     => 'select',
        'default'  => '13px',
        'choices'  => array(
        '13px' => '13px',
        '14px' => '14px',
        '15px' => '15px',
        '16px' => '16px',
        '17px' => '17px',
        '18px' => '18px',
    ),
        'priority' => 101,
    ) );
}

add_action( 'customize_register', 'corporate_event_heading_options' );
function corporate_event_heading_options( $wp_customize )
{
    $wp_customize->add_setting( 'heading_options_text', array(
        'default'           => '',
        'type'              => 'customtext',
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( new Corporate_Event_Custom_Text( $wp_customize, 'heading_options_text', array(
        'label'    => esc_html__( 'Heading Options :', 'corporate-event' ),
        'section'  => 'colors',
        'settings' => 'heading_options_text',
        'priority' => 103,
    ) ) );
}

add_action( 'customize_register', 'corporate_event_heading_font_family' );
function corporate_event_heading_font_family( $wp_customize )
{
    $wp_customize->add_setting( 'heading_font_family', array(
        'transport'         => 'postMessage',
        'sanitize_callback' => 'corporate_event_sanitize_google_fonts',
        'default'           => 'Poppins',
    ) );
    $wp_customize->add_control( 'heading_font_family', array(
        'settings' => 'heading_font_family',
        'label'    => esc_html__( 'Font Family', 'corporate-event' ),
        'section'  => 'colors',
        'type'     => 'select',
        'choices'  => corporate_event_google_fonts(),
        'priority' => 103,
    ) );
}

add_action( 'customize_register', 'corporate_event_heading_font_weight' );
function corporate_event_heading_font_weight( $wp_customize )
{
    $wp_customize->add_setting( 'heading_font_weight', array(
        'default'           => 600,
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( new Corporate_Event_Slider_Control( $wp_customize, 'heading_font_weight', array(
        'section'  => 'colors',
        'settings' => 'heading_font_weight',
        'label'    => esc_html__( 'Font Weight', 'corporate-event' ),
        'priority' => 103,
        'choices'  => array(
        'min'  => 100,
        'max'  => 900,
        'step' => 100,
    ),
    ) ) );
}

add_action( 'customize_register', 'corporate_event_heading_font_style' );
function corporate_event_heading_font_style( $wp_customize )
{
    $default_size = array(
        '1' => 32,
        '2' => 28,
        '3' => 24,
        '4' => 21,
        '5' => 15,
        '6' => 12,
    );
    for ( $i = 1 ;  $i <= 6 ;  $i++ ) {
        $max_size = ( $i == '1' ? '150' : '50' );
        $wp_customize->add_setting( 'corporate_event_heading_' . $i . '_size', array(
            'default'           => $default_size[$i],
            'sanitize_callback' => 'absint',
            'transport'         => 'postMessage',
        ) );
        $wp_customize->add_control( 'corporate_event_heading_' . $i . '_size', array(
            'type'        => 'number',
            'section'     => 'colors',
            'label'       => esc_html__( 'Heading ', 'corporate-event' ) . $i . esc_html__( ' Size', 'corporate-event' ),
            'priority'    => 104,
            'input_attrs' => array(
            'min'  => 10,
            'max'  => $max_size,
            'step' => 1,
        ),
        ) );
    }
}
