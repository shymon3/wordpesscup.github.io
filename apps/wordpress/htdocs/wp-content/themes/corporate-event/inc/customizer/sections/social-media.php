<?php
/**
 * Social Media Sections

 */
add_action( 'customize_register', 'corporate_event_social_media_sections' );

function corporate_event_social_media_sections( $wp_customize ) {

    $wp_customize->add_section( 'corporate_event_social_media_sections', array(
        'title'          => esc_html__( 'Social Media', 'corporate-event' ),
        'priority'       => 8,
    ) );
    
    
    $wp_customize->add_setting( new Corporate_Event_Repeater_Setting( $wp_customize, 'corporate_event_social_media', array(
        'sanitize_callback' => array( 'Corporate_Event_Repeater_Setting', 'sanitize_repeater_setting' ),
    ) ) );

    $wp_customize->add_control( new Corporate_Event_Control_Repeater( $wp_customize, 'corporate_event_social_media', array(
        'section' => 'corporate_event_social_media_sections',
        'settings'    => 'corporate_event_social_media',
        'label'   => esc_html__( 'Social Media', 'corporate-event' ),
        'row_label' => array(
            'type'  => 'field',
            'value' => esc_html__( 'Social Media', 'corporate-event' ),
            'field' => 'social_media_repeater_class',
        ), 
        'fields' => array(
            'social_media_repeater_class' => array(
                'type'        => 'select',
                'label'       => esc_html__( 'Select Social Media', 'corporate-event' ),
                'default'     => 'facebook',
                'choices'   => corporate_event_social_media()
            ),
            'social_media_link' => array(
                'type'      => 'url',
                'label'     => esc_html__( 'Social Media Links', 'corporate-event' ),
            ),          
        ),
                               
    ) ) );

    $wp_customize->selective_refresh->add_partial( 'corporate_event_social_media', array(
        'selector'        => '.social-icons',
        'render_callback' => '',
    ) );

}