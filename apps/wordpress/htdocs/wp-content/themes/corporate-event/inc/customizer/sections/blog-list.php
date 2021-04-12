<?php
/**
 * Blog List Settings
 */


add_action( 'customize_register', 'corporate_event_customize_blog_list_option' );

function corporate_event_customize_blog_list_option( $wp_customize ) {

    $wp_customize->add_section( 'corporate_event_blog_list_section', array(
        'title'          => esc_html__( 'Blog Options', 'corporate-event' ),
        'priority'       => 9,
    ) );


    $wp_customize->add_setting( 'hide_show_blog_list_on_home', array(
      'sanitize_callback'     =>  'corporate_event_sanitize_checkbox',
      'default'               =>  true
    ) );

    $wp_customize->add_control( new Corporate_Event_Toggle_Control( $wp_customize, 'hide_show_blog_list_on_home', array(
      'label' => esc_html__( 'Enable Blog on Home?','corporate-event' ),
      'section' => 'corporate_event_blog_list_section',
      'settings' => 'hide_show_blog_list_on_home',
      'type'=> 'toggle',
    ) ) );

    $wp_customize->add_setting( 'blog_post_list_options_title_text', array(
        'sanitize_callback' =>  'wp_kses_post',        
    ) );

    $wp_customize->add_control( new Corporate_Event_Custom_Text( $wp_customize, 'blog_post_list_options_title_text', array(
        'label' =>  esc_html__( 'Blog List Options :', 'corporate-event' ),
        'section'   =>  'corporate_event_blog_list_section',
        'Settings'  =>  'blog_post_list_options_title_text'
    ) ) );

    $wp_customize->selective_refresh->add_partial( 'blog_post_list_options_title_text', array(
        'selector' => '#blog h2', // You can also select a css class
    ) );

    $wp_customize->add_setting( 'blog_post_layout', array(
        'capability'  => 'edit_theme_options',        
        'sanitize_callback' => 'corporate_event_sanitize_choices',
        'default'     => 'sidebar-right',
    ) );

    $wp_customize->add_control( new Corporate_Event_Radio_Buttonset_Control( $wp_customize, 'blog_post_layout', array(
        'label' => esc_html__( 'Layouts :', 'corporate-event' ),
        'section' => 'corporate_event_blog_list_section',
        'settings' => 'blog_post_layout',
        'type'=> 'radio-buttonset',
        'choices'     => array(
            'sidebar-left' => esc_html__( 'Sidebar at left', 'corporate-event' ),
            'no-sidebar'    =>  esc_html__( 'No sidebar', 'corporate-event' ),
            'sidebar-right' => esc_html__( 'Sidebar at right', 'corporate-event' ),            
        ),
    ) ) );


    $wp_customize->add_setting( 'blog_post_view', array(
        'transport'  => 'postMessage',        
        'sanitize_callback' => 'corporate_event_sanitize_choices',
        'default'     => 'grid-view',
    ) );

    $wp_customize->add_control( new Corporate_Event_Radio_Buttonset_Control( $wp_customize, 'blog_post_view', array(
        'label' => esc_html__( 'Post View :', 'corporate-event' ),
        'section' => 'corporate_event_blog_list_section',
        'settings' => 'blog_post_view',
        'type'=> 'radio-buttonset',
        'choices'     => array(
            'grid-view' => esc_html__( 'Grid View', 'corporate-event' ),
            'list-view' => esc_html__( 'List View', 'corporate-event' ),
            'full-width-view' => esc_html__( 'Fullwidth View', 'corporate-event' ),
        ),
    ) ) );


    $wp_customize->add_setting( 'pagination_type', array(
        'sanitize_callback' => 'corporate_event_sanitize_choices',
        'default'     => 'ajax-loadmore',
    ) );

    $wp_customize->add_control( new Corporate_Event_Radio_Buttonset_Control( $wp_customize, 'pagination_type', array(
        'label' => esc_html__( 'Pagination Type :', 'corporate-event' ),
        'section' => 'corporate_event_blog_list_section',
        'settings' => 'pagination_type',
        'type'=> 'radio-buttonset',
        'choices'     => array(
            'ajax-loadmore' => esc_html__( 'Ajax Loadmore', 'corporate-event' ),
            'number-pagination'    =>  esc_html__( 'Number Pagination', 'corporate-event' ),      
        ),
    ) ) );            
    


}