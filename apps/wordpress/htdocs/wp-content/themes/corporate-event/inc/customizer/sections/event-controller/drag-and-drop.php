<?php

/***
 * Drag & Drop Sections
 */
add_action( 'customize_register', 'corporate_event_drag_and_drop_sections' );
function corporate_event_drag_and_drop_sections( $wp_customize )
{
    $wp_customize->add_section( 'corporate_event_sort_homepage_sections', array(
        'title'    => esc_html__( 'Drag & Drop', 'corporate-event' ),
        'panel'    => 'one_page_conference_theme_options_panel',
        'priority' => 1000,
    ) );
    $choices = array(
        'about-us' => esc_html__( 'About Us', 'corporate-event' ),
        'counter'  => esc_html__( 'Counter', 'corporate-event' ),
    );
    $default = array( 'about-us', 'counter' );
    
    if ( class_exists( 'WepPlugin' ) ) {
        $choices['sponsors'] = esc_html__( 'Sponsors', 'corporate-event' );
        $choices['speakers'] = esc_html__( 'Speakers', 'corporate-event' );
        $choices['schedules'] = esc_html__( 'Schedules', 'corporate-event' );
        $choices['venue'] = esc_html__( 'Venue', 'corporate-event' );
        $choices['testimonials'] = esc_html__( 'Testimonials', 'corporate-event' );
        $choices['organizers'] = esc_html__( 'Organizers', 'corporate-event' );
        array_push(
            $default,
            'sponsors',
            'speakers',
            'schedules',
            'venue',
            'testimonials',
            'organizers'
        );
    }
    
    $wp_customize->add_setting( 'corporate_event_sort_homepage', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'corporate_event_sanitize_array',
        'default'           => $default,
    ) );
    $wp_customize->add_control( new Corporate_Event_Control_Sortable( $wp_customize, 'corporate_event_sort_homepage', array(
        'label'    => esc_html__( 'Drag and Drop Sections to rearrange.', 'corporate-event' ),
        'section'  => 'corporate_event_sort_homepage_sections',
        'settings' => 'corporate_event_sort_homepage',
        'type'     => 'sortable',
        'choices'  => $choices,
    ) ) );
}
