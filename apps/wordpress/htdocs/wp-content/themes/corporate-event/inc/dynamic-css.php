<?php
function corporate_event_dynamic_css() {

        wp_enqueue_style(
            'corporate-event-dynamic-css', get_template_directory_uri() . '/css/dynamic.css'
        );

        $header_bg_color = esc_attr( get_theme_mod( 'header_bg_color', '#ffffff' ) );
        $primary_color = esc_attr( get_theme_mod( 'primary_color', '#e96695' ) );
        $secondary_color = esc_attr( get_theme_mod( 'secondary_color', '#1dd1b1' ) );
        $text_color = get_theme_mod( 'text_color', '#757575' );
        $accent_color = get_theme_mod( 'accent_color', '#5278AD' );
        $light_color = get_theme_mod( 'light_color', '#EFF3FC ' );
        $dark_color = get_theme_mod( 'dark_color', '#111111 ' );
        $grey_color = get_theme_mod( 'grey_color', '#606060 ' );
        $header_text_color = '#'.get_header_textcolor();
        //$header_text_color = get_theme_mod( 'header_text_color', '#0E1872 ' );
        $header_height = absint( get_theme_mod( 'header_height', 15 ) );

        $banner_overlay_color = esc_attr( get_theme_mod( 'banner_overlay_color', '#16093a' ) );
        $banner_overlay_color_opacity = get_theme_mod( 'banner_overlay_color_opacity', 0.8 );

        // $font_color = esc_attr( get_theme_mod( 'font_color', '#333' ) );
        // $menu_font_color = esc_attr( get_theme_mod( 'menu_font_color', '#aaa' ) );
        // $menu_background_color = esc_attr( get_theme_mod( 'menu_background_color', '#fff' ) );
        // $heading_title_color = esc_attr( get_theme_mod( 'heading_title_color', '#2173ce' ) );
        // $heading_link_color = esc_attr( get_theme_mod( 'heading_link_color', '#ce106d' ) );
        // $button_color = esc_attr( get_theme_mod( 'button_color', '#2173ce' ) );
        // $footer_background_color = esc_attr( get_theme_mod( 'footer_background_color', '#ececec' ) );

        $font_family = esc_attr( get_theme_mod( 'font_family', 'Roboto' ) );
        $font_size = esc_attr( get_theme_mod( 'font_size', '16px' ) );

        $logo_font_size = absint( get_theme_mod( 'logo_size', 30 ) );
        $logo_size = absint( $logo_font_size * 6 );
        $site_color = esc_attr( get_theme_mod( 'site_color', '#4169e1' ) );
        $site_identity_font_family = esc_attr( get_theme_mod( 'site_identity_font_family', 'Montserrat' ) );

        $heading_font_family = esc_attr( get_theme_mod( 'heading_font_family', 'Poppins' ) );
        $heading_font_weight = esc_attr( get_theme_mod( 'heading_font_weight', 600 ) );

        $event_title_font_size = get_theme_mod( 'event_title_font_size', 70 );

        $default_size = array(
                '1' =>  32,
                '2' =>  28,
                '3' =>  24,
                '4' =>  21,
                '5' =>  15,
                '6' =>  12,
        );

        for( $i = 1; $i <= 6 ; $i++ ) {
            $heading[$i] = absint( get_theme_mod( 'corporate_event_heading_' . $i . '_size', absint( $default_size[$i] ) ) );
        }

        



        $dynamic_css = "


                :root {
                        --header-background: $header_bg_color;
                        --primary-color: $primary_color;
                        --secondary-color: $secondary_color;
                        --text-color: $text_color;
                        --accent-color: $accent_color;
                        --light-color: $light_color;
                        --dark-color: $dark_color;
                        --grey-color: $grey_color;
                        --header-text-color: $header_text_color;

                        --font-family: $heading_font_family;
                }


                body{ font: normal $font_size"." $font_family; line-height: 1.5; }

                header .custom-logo-link img{ width: {$logo_size}"."px; }

                .header{padding: {$header_height}" . "px 0;}

                /*Site Title*/
                header .site-title a{ font-size: $logo_font_size"."px; font-family: $site_identity_font_family; color: $site_color; }

                /* Banner Colors */
                section[class*=banner-layout-] .item:before { background: {$banner_overlay_color}; opacity: {$banner_overlay_color_opacity};}
                
                 
                
                h1{ font: $heading_font_weight {$heading[1]}"."px $heading_font_family }
                h2{ font: $heading_font_weight {$heading[2]}"."px $heading_font_family }
                h3{ font: $heading_font_weight {$heading[3]}"."px $heading_font_family }
                h4{ font: $heading_font_weight {$heading[4]}"."px $heading_font_family }
                h5{ font: $heading_font_weight {$heading[5]}"."px $heading_font_family }
                h6{ font: $heading_font_weight {$heading[6]}"."px $heading_font_family }
                .speaker-title{font: $heading_font_weight {$heading[4]}"."px $heading_font_family}

                #banner .caption .title{
                        font-size: $event_title_font_size"."px;
                        font-family: $heading_font_family;
                }
                
                .btn,#clockdiv,
                .wep-counter-wrapper .wep-counter,
                section[class*=banner-layout-] .event-information-holder,
                section[class*=banner-layout-] .caption .hero-subtitle,
                section[class*=banner-layout-] .caption .location{ 
                    font-family: $heading_font_family; 
                }




                /* media */
                        @media (min-width: 320px) and (max-width: 1199px){
        
                        }

                        
                        @media (min-width: 320px) and (max-width: 767px){
                                [class*=schedule-layout-] .tab-content .nav-pills .nav-link.active{
                                        background: $primary_color;
                                }
                                [class*=schedule-layout-] .tab-content .tabContent-toggler{
                                        background: $secondary_color;
                                }
                        }                        

                /* end media */

               
        ";
        wp_add_inline_style( 'corporate-event-dynamic-css', $dynamic_css );
}
add_action( 'wp_enqueue_scripts', 'corporate_event_dynamic_css' ,'99');