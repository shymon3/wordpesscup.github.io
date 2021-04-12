<?php
/**
 * Pages Settings
 *
 * @package Corporate_Event
 */
add_action( 'customize_register', 'corporate_event_customize_venues_section' );

function corporate_event_customize_venues_section( $wp_customize )
{
    $wp_customize->add_section('corporate_event_venue_sections', array(
        'title' => esc_html__('Venue Section', 'corporate-event'),
        'description' => esc_html__('Venue Section :', 'corporate-event'),
        'panel' => 'one_page_conference_theme_options_panel'
    ));

    $wp_customize->add_setting('venue_display_option', array(
        'sanitize_callback' => 'corporate_event_sanitize_checkbox',
        'default' => true
    ));

    $wp_customize->add_control(new Corporate_Event_Toggle_Control($wp_customize, 'venue_display_option', array(
        'label' => esc_html__('Hide / Show', 'corporate-event'),
        'section' => 'corporate_event_venue_sections',
        'settings' => 'venue_display_option',
        'type' => 'toggle',
    )));

    $wp_customize->add_setting('heading_for_venue', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => 'Venue'
    ));

    $wp_customize->add_control('heading_for_venue', array(
        'label' => esc_html__('Enter Heading for Venue', 'corporate-event'),
        'section' => 'corporate_event_venue_sections',
        'settings' => 'heading_for_venue',
        'type' => 'text',
    ));
    $wp_customize->selective_refresh->add_partial('heading_for_venue', array(
        'selector' => '.venue-layout-main h2', // You can also select a css class
    ));
    $wp_customize->add_setting('venue_name', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('venue_name', array(
        'label' => esc_html__('Event Venue Name', 'corporate-event'),
        'section' => 'corporate_event_venue_sections',
        'settings' => 'venue_name',
        'type' => 'text',
    ));
    $wp_customize->add_setting('venue_location', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'     => '',
    ));

    $wp_customize->add_control('venue_location', array(
        'label' => esc_html__('Enter Venue Location', 'corporate-event'),
        'section' => 'corporate_event_venue_sections',
        'settings' => 'venue_location',
        'type' => 'text',
    ));
    $wp_customize->add_setting('venue_description', array(
        'sanitize_callback' => 'sanitize_textarea_field',
        'default'     => '',
    ));

    $wp_customize->add_control('venue_description', array(
        'label' => esc_html__('Enter Venue Description', 'corporate-event'),
        'section' => 'corporate_event_venue_sections',
        'settings' => 'venue_description',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('venue_location_map', array(
        'sanitize_callback' => 'corporate_event_sanitize_ifram',
        'default'     => '',
    ));

    $wp_customize->add_control('venue_location_map', array(
        'label' => esc_html__('Enter iframe for location', 'corporate-event'),
        'section' => 'corporate_event_venue_sections',
        'settings' => 'venue_location_map',
        'type' => 'textarea',
    ));
    $wp_customize->add_setting( 'event_venue_image', array(
        'sanitize_callback'     =>  'corporate_event_sanitize_image',
        'default'               =>  ''
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'event_venue_image', array(
        'label' => esc_html__( 'Upload a Venue Image', 'corporate-event' ),
        'section'   => 'corporate_event_venue_sections',
        'settings'  => 'event_venue_image'
    ) )); 
      

}