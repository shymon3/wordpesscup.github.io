<?php
/**
 * Event Information Settings
 */

add_action( 'customize_register', 'corporate_event_customize_register_event_information' );

function corporate_event_customize_register_event_information( $wp_customize ) {
	$wp_customize->add_section( 'corporate_event_event_information_sections', array(
	    'title'          => esc_html__( 'Event Information', 'corporate-event' ),
	    'panel'          => 'corporate_event_banner_panel',
        'priority'      => 1
	) );


    $wp_customize->add_setting( 'banner_display_in_homepage', array(
        'sanitize_callback'     =>  'corporate_event_sanitize_checkbox',
        'default'               =>  true
    ) );

    $wp_customize->add_control( new Corporate_Event_Toggle_Control( $wp_customize, 'banner_display_in_homepage', array(
        'label' => esc_html__( 'Enable Banner in Home','corporate-event' ),
        'section' => 'corporate_event_event_information_sections',
        'settings' => 'banner_display_in_homepage',
        'type'=> 'toggle',
    ) ) );

    $wp_customize->add_setting( 'banner_display_in_otherpage', array(
        'sanitize_callback'     =>  'corporate_event_sanitize_checkbox',
        'default'               =>  true
    ) );

    $wp_customize->add_control( new Corporate_Event_Toggle_Control( $wp_customize, 'banner_display_in_otherpage', array(
        'label' => esc_html__( 'Enable Banner in other pages','corporate-event' ),
        'section' => 'corporate_event_event_information_sections',
        'settings' => 'banner_display_in_otherpage',
        'type'=> 'toggle',
    ) ) );



    $wp_customize->add_setting( 'hide_show_banner_countdown_timer', array(
        'sanitize_callback'     =>  'corporate_event_sanitize_checkbox',
        'default'               =>  true
    ) );

    $wp_customize->add_control( new Corporate_Event_Toggle_Control( $wp_customize, 'hide_show_banner_countdown_timer', array(
        'label' => esc_html__( 'Enable Countdown Timer?','corporate-event' ),
        'section' => 'corporate_event_event_information_sections',
        'settings' => 'hide_show_banner_countdown_timer',
        'type'=> 'toggle',
    ) ) );

    $wp_customize->selective_refresh->add_partial('hide_show_banner_countdown_timer', array(
        'selector' => '#banner .caption', // You can also select a css class
    ));

    $wp_customize->add_setting( 'hide_show_banner_start_date', array(
        'sanitize_callback'     =>  'corporate_event_sanitize_checkbox',
        'default'               =>  true
    ) );

    $wp_customize->add_control( new Corporate_Event_Toggle_Control( $wp_customize, 'hide_show_banner_start_date', array(
        'label' => esc_html__( 'Show Start Date?','corporate-event' ),
        'section' => 'corporate_event_event_information_sections',
        'settings' => 'hide_show_banner_start_date',
        'type'=> 'toggle',
    ) ) );


    $wp_customize->add_setting( 'hide_show_banner_end_date', array(
        'sanitize_callback'     =>  'corporate_event_sanitize_checkbox',
        'default'               =>  true
    ) );

    $wp_customize->add_control( new Corporate_Event_Toggle_Control( $wp_customize, 'hide_show_banner_end_date', array(
        'label' => esc_html__( 'Show End Date?','corporate-event' ),
        'section' => 'corporate_event_event_information_sections',
        'settings' => 'hide_show_banner_end_date',
        'type'=> 'toggle',
    ) ) );


    $wp_customize->add_setting( 'hide_show_banner_start_time', array(
        'sanitize_callback'     =>  'corporate_event_sanitize_checkbox',
        'default'               =>  true
    ) );

    $wp_customize->add_control( new Corporate_Event_Toggle_Control( $wp_customize, 'hide_show_banner_start_time', array(
        'label' => esc_html__( 'Show Start Time?','corporate-event' ),
        'section' => 'corporate_event_event_information_sections',
        'settings' => 'hide_show_banner_start_time',
        'type'=> 'toggle',
    ) ) );


    $wp_customize->add_setting( 'hide_show_banner_end_time', array(
        'sanitize_callback'     =>  'corporate_event_sanitize_checkbox',
        'default'               =>  true
    ) );

    $wp_customize->add_control( new Corporate_Event_Toggle_Control( $wp_customize, 'hide_show_banner_end_time', array(
        'label' => esc_html__( 'Show End Time?','corporate-event' ),
        'section' => 'corporate_event_event_information_sections',
        'settings' => 'hide_show_banner_end_time',
        'type'=> 'toggle',
    ) ) );


    $wp_customize->add_setting( 'hide_show_banner_venue', array(
        'sanitize_callback'     =>  'corporate_event_sanitize_checkbox',
        'default'               =>  true
    ) );

    $wp_customize->add_control( new Corporate_Event_Toggle_Control( $wp_customize, 'hide_show_banner_venue', array(
        'label' => esc_html__( 'Show Venue?','corporate-event' ),
        'section' => 'corporate_event_event_information_sections',
        'settings' => 'hide_show_banner_venue',
        'type'=> 'toggle',
    ) ) );


    $wp_customize->add_setting( 'event_title_font_size', array(
        'default'           => 70,
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage',
    ) );

    $wp_customize->add_control( new Corporate_Event_Slider_Control( $wp_customize, 'event_title_font_size', array(
        'section' => 'corporate_event_event_information_sections',
        'settings' => 'event_title_font_size',
        'label'   => esc_html__( 'Font Size', 'corporate-event' ),
        'choices'     => array(
            'min'  => 20,
            'max'  => 80,
            'step' => 1,
        ),
    ) ) );


    $wp_customize->add_setting( 'banner_overlay_color', array(
        'default'     => '#16093a',            
        'sanitize_callback' => 'corporate_event_sanitize_hex_color'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'banner_overlay_color', array(
        'label'      => esc_html__( 'Overlay Color', 'corporate-event' ),
        'section'    => 'corporate_event_event_information_sections',
        'settings'   => 'banner_overlay_color',
    ) ) );


    $wp_customize->add_setting( 'banner_overlay_color_opacity', array(
        'default'           => 0.8,
        'sanitize_callback' => 'corporate_event_sanitize_number_range'
    ) );

    $wp_customize->add_control( new Corporate_Event_Slider_Control( $wp_customize, 'banner_overlay_color_opacity', array(
        'section' => 'corporate_event_event_information_sections',
        'settings' => 'banner_overlay_color_opacity',
        'label'   => esc_html__( 'Overlay Color Opacity', 'corporate-event' ),
        'choices'     => array(
            'min'   => 0,
            'max'   => 1,
            'step'  => 0.1,
        )
    ) ) );


	$wp_customize->add_setting( 'event_title', array(
        'transport'         => 'postMessage',
        'sanitize_callback'     =>  'sanitize_text_field',
        'default'               =>  ''
    ) );

    $wp_customize->add_control( 'event_title', array(
        'label' => esc_html__( 'Event Title', 'corporate-event' ),
        'section' => 'corporate_event_event_information_sections',
        'settings' => 'event_title',
        'type'=> 'text',
    ) );

    $wp_customize->add_setting( 'event_subtitle', array(
        'transport'         => 'postMessage',
        'sanitize_callback'     =>  'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'event_subtitle', array(
        'label' => esc_html__( 'Event Sub Title', 'corporate-event' ),
        'section' => 'corporate_event_event_information_sections',
        'settings' => 'event_subtitle',
        'type'=> 'text',
    ) );

    $wp_customize->add_setting( 'event_description', array(
        'transport'         => 'postMessage',
        'sanitize_callback'     =>  'wp_kses_post',
        'default'           => ''
    ) );

    $wp_customize->add_control( 'event_description', array(
        'label' => esc_html__( 'Event Description', 'corporate-event' ),
        'section' => 'corporate_event_event_information_sections',
        'settings' => 'event_description',
        'type'=> 'textarea',
    ) );


    $wp_customize->add_setting( 'start_date', array(
        'sanitize_callback'     =>  'corporate_event_date_time_sanitization',
        'default' => ''
    ) );

    $wp_customize->add_control( 'start_date', array(
        'label' => esc_html__( 'Start Date', 'corporate-event' ),
        'section' => 'corporate_event_event_information_sections',
        'settings' => 'start_date',
        'type'=> 'date',
		'input_attrs' => array(
			'placeholder' => __( 'mm/dd/yyyy', 'corporate-event' ),
		),
    ) );

    $wp_customize->add_setting( 'end_date', array(
        'sanitize_callback'     =>  'corporate_event_date_time_sanitization',
        'default'               => ''
    ) );

    $wp_customize->add_control( 'end_date', array(
        'label' => esc_html__( 'End Date', 'corporate-event' ),
        'section' => 'corporate_event_event_information_sections',
        'settings' => 'end_date',
        'type'=> 'date',
		'input_attrs' => array(
			'placeholder' => __( 'mm/dd/yyyy', 'corporate-event' ),
		),
    ) );

    $wp_customize->add_setting( 'start_time', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => ''
    ) );

    $wp_customize->add_control( 'start_time', array(
        'label' => esc_html__( 'Start Time', 'corporate-event' ),
        'section' => 'corporate_event_event_information_sections',
        'settings' => 'start_time',
        'type'=> 'time',
    ) );

    $wp_customize->add_setting( 'end_time', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => ''
    ) );


    $wp_customize->add_control( 'end_time', array(
        'label' => esc_html__( 'End Time', 'corporate-event' ),
        'section' => 'corporate_event_event_information_sections',
        'settings' => 'end_time',
        'type'=> 'time',
    ) );

    $wp_customize->add_setting( 'event_venue', array(
        'transport'         => 'postMessage',
        'sanitize_callback'     =>  'sanitize_text_field',
        'default'           => ''
    ) );

    $wp_customize->add_control( 'event_venue', array(
        'label' => esc_html__( 'Event Venue', 'corporate-event' ),
        'section' => 'corporate_event_event_information_sections',
        'settings' => 'event_venue',
        'type'=> 'text',
    ) );

    $wp_customize->add_setting( 'hide_show_cta_button_1', array(
        'sanitize_callback'     =>  'corporate_event_sanitize_checkbox',
        'default'               =>  true
    ) );

    $wp_customize->add_control( new Corporate_Event_Toggle_Control( $wp_customize, 'hide_show_cta_button_1', array(
        'label' => esc_html__( 'Enable CTA 1 Button','corporate-event' ),
        'section' => 'corporate_event_event_information_sections',
        'settings' => 'hide_show_cta_button_1',
        'type'=> 'toggle',
    ) ) );

    $wp_customize->add_setting( 'cta_1_button_label', array(
        'transport'         => 'postMessage',
        'sanitize_callback'     =>  'sanitize_text_field',
        'default'           => ''
    ) );

    $wp_customize->add_control( 'cta_1_button_label', array(
        'label' => esc_html__( 'CTA 1 Button Label', 'corporate-event' ),
        'section' => 'corporate_event_event_information_sections',
        'settings' => 'cta_1_button_label',
        'type'=> 'text',
        'active_callback' => function(){
            return get_theme_mod( 'hide_show_cta_button_1', true );
        },
    ) );

    $wp_customize->add_setting( 'cta_1_link', array(
        'sanitize_callback'     => 'esc_url_raw',
        'default'               => ''
    ) );

    $wp_customize->add_control( 'cta_1_link', array(
        'label' => esc_html__( 'CTA 1 Link', 'corporate-event' ),
        'section' => 'corporate_event_event_information_sections',
        'settings' => 'cta_1_link',
        'type'=> 'url',
        'active_callback' => function(){
            return get_theme_mod( 'hide_show_cta_button_1', true );
        },
    ) );

    $wp_customize->add_setting( 'hide_show_cta_button_2', array(
        'sanitize_callback'     =>  'corporate_event_sanitize_checkbox',
        'default'               =>  true
    ) );

    $wp_customize->add_control( new Corporate_Event_Toggle_Control( $wp_customize, 'hide_show_cta_button_2', array(
        'label' => esc_html__( 'Enable CTA 2 Button','corporate-event' ),
        'section' => 'corporate_event_event_information_sections',
        'settings' => 'hide_show_cta_button_2',
        'type'=> 'toggle',
    ) ) );

    $wp_customize->add_setting( 'cta_2_button_label', array(
        'transport'         => 'postMessage',
        'sanitize_callback'     =>  'sanitize_text_field',
        'default'           => ''
    ) );

    $wp_customize->add_control( 'cta_2_button_label', array(
        'label' => esc_html__( 'CTA 2 Button Label', 'corporate-event' ),
        'section' => 'corporate_event_event_information_sections',
        'settings' => 'cta_2_button_label',
        'type'=> 'text',
        'active_callback' => function(){
            return get_theme_mod( 'hide_show_cta_button_2', false );
        },
    ) );

    $wp_customize->add_setting( 'cta_2_link', array(
        'sanitize_callback'     =>  'esc_url_raw',
        'default'               => ''
    ) );

    $wp_customize->add_control( 'cta_2_link', array(
        'label' => esc_html__( 'CTA 2 Link', 'corporate-event' ),
        'section' => 'corporate_event_event_information_sections',
        'settings' => 'cta_2_link',
        'type'=> 'url',
        'active_callback' => function(){
            return get_theme_mod( 'hide_show_cta_button_2', false );
        },
    ) );
    

}