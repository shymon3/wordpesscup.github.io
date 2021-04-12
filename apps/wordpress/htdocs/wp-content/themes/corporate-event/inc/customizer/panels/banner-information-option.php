<?php
/**
 * Event Information Panel
 */

add_action( 'customize_register', 'corporate_event_customize_register_banner_panel' );

function corporate_event_customize_register_banner_panel( $wp_customize ) {
    $wp_customize->add_panel( 'corporate_event_banner_panel', array(
        'priority'    => 6,
        'title'       => esc_html__( 'Banner Information', 'corporate-event' ),
    ) );
}