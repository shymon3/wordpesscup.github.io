<?php

/**
 * Added Corporate Evente Page.
*/
/**
 * Add a new page under Appearance
 */
function corporate_event_menu()
{
    add_theme_page(
        __( 'Get Started', 'corporate-event' ),
        __( 'Get Started', 'corporate-event' ),
        'edit_theme_options',
        'corporate-event-get-started',
        'corporate_event_page'
    );
}

add_action( 'admin_menu', 'corporate_event_menu' );
/**
 * Enqueue styles for the help page.
 */
function corporate_event_admin_scripts( $hook )
{
    if ( 'appearance_page_corporate-event-get-started' !== $hook ) {
        return;
    }
    wp_enqueue_style(
        'corporate-event-admin-style',
        get_template_directory_uri() . '/inc/about/about.css',
        array(),
        ''
    );
}

add_action( 'admin_enqueue_scripts', 'corporate_event_admin_scripts' );
/**
 * Add the theme page
 */
function corporate_event_page()
{
    ?>
	<div class="das-wrap">
		<div class="corporate-event-panel">
			<div class="corporate-event-logo">
				<img class="ts-logo" width="250" src="<?php 
    echo  esc_url( get_template_directory_uri() . '/inc/about/images/wpeventpartners.png' ) ;
    ?>" alt="Logo">
			</div>
			<?php 
    ?>
				<a href="https://wpeventpartners.com/layouts/corporate-events-pro/" target="_blank" class="btn btn-success pull-right"><?php 
    esc_html_e( 'Upgrade to Pro $49.99', 'corporate-event' );
    ?></a>
			<?php 
    ?>
			<p>
			<?php 
    esc_html_e( 'Corporate Event is a free WordPress theme for events, conferences, conclaves, and meetups. This theme is based on the Event and Conference Management WordPress theme, WPEventPartners. If you are the organizer of the conference and looking to build a Corporate Event website then this is the best theme for you.', 'corporate-event' );
    ?></p>
			<a class="btn btn-primary" href="<?php 
    echo  esc_url( admin_url( '/customize.php?' ) ) ;
    ?>"><?php 
    esc_html_e( 'Theme Options - Click Here', 'corporate-event' );
    ?></a>
		</div>

		<div class="corporate-event-panel">
			<div class="corporate-event-panel-content">
				<div class="theme-title">
					<h3><?php 
    esc_html_e( 'Once you install all recommended plugins, you can import demo template.', 'corporate-event' );
    ?></h3>
				</div>
				<a class="btn btn-secondary" href="<?php 
    echo  esc_url( admin_url( '/themes.php?page=advanced-import' ) ) ;
    ?>"><?php 
    esc_html_e( 'View Demo Templates', 'corporate-event' );
    ?></a>
			</div>
		</div>
		<div class="corporate-event-panel">
			<div class="corporate-event-panel-content">
				<div class="theme-title">
					<h4><?php 
    esc_html_e( 'If you like the theme, please leave a review or Contact us for technical support.', 'corporate-event' );
    ?></h4>
				</div>
				<a href="https://wordpress.org/support/theme/corporate-event/reviews/#new-post" target="_blank" class="btn btn-secondary"><?php 
    esc_html_e( 'Rate this theme', 'corporate-event' );
    ?></a> <a href="https://wpeventpartners.com/support/" target="_blank" class="btn btn-secondary"><?php 
    esc_html_e( 'Contact Us', 'corporate-event' );
    ?></a>
			</div>
		</div>
	</div>
	<?php 
}
