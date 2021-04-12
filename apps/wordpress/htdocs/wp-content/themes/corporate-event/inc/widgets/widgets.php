<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */


function corporate_event_widgets_init() {
    
    for($i = 1; $i<4; $i++){
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Widget', 'corporate-event' ) . " " . $i,
				'id'            => 'footer-'.$i.'',
				'description'   => esc_html__( 'Add widgets here.', 'corporate-event' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
			)
		);
	}

    register_sidebar( array(
        'name'          => esc_html__( 'Right Sidebar', 'corporate-event' ),
        'id'            => 'sidebar-1',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => '</h5>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Left Sidebar', 'corporate-event' ),
        'id'            => 'left-sidebar',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => '</h5>',
    ) );

}
add_action( 'widgets_init', 'corporate_event_widgets_init' );