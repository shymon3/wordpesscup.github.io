<section class="banner-layout-<?php echo esc_attr( $class ); ?> center" id="banner">
    <div class="item" <?php if( get_header_image() ) { ?> style="background-image: url( '<?php header_image(); ?>' );"<?php } ?>>
        <div class="banner-text-info">
            <div class="container">
                <div class="caption">

                    <?php
                    $event_subtitle = get_theme_mod('event_subtitle');
                    if($event_subtitle){
                    ?>
                        <div class="hero-subtitle"><?php echo $event_subtitle; ?></div>
                    <?php } ?>

                    <?php 
                    $event_title = get_theme_mod( 'event_title', '' );
                    if($event_title){ 
                    ?>
                    <div class="title">
                        <?php echo esc_html( $event_title ); ?>
                    </div>
                    <?php } ?>

                    <p>
                        <?php $event_description = get_theme_mod( 'event_description', '' ); ?>
                        <?php echo esc_html( $event_description ); ?></p>



                        <?php
                        $display_start_date = get_theme_mod( 'hide_show_banner_start_date', true );
                        $display_end_date = get_theme_mod( 'hide_show_banner_end_date', true );
                        $display_start_time = get_theme_mod( 'hide_show_banner_start_time', true );
                        $display_end_time = get_theme_mod( 'hide_show_banner_end_time', true );
                        $start_time = get_theme_mod( 'start_time', '' );
                        $end_time = get_theme_mod( 'end_time', '' );
                        $start_date = get_theme_mod( 'start_date', '' );
                        $end_date = get_theme_mod( 'end_date', '' );
                        ?>


                        <?php if( $venu_show_hide ) : ?>
                            <div class="location">                            
                                <i class="icon-location"></i> <?php echo esc_html( get_theme_mod( 'event_venue', '' ) ); ?>
                            </div>
                        <?php endif; ?>

                        <div class="group-btn">
                        <?php 
                            if(get_theme_mod( 'hide_show_cta_button_1', true )){
                                $cta_button1_for_banner = get_theme_mod('cta_1_button_label');
                                $cta_button1_link = get_theme_mod('cta_1_link');
                                if($cta_button1_for_banner && $cta_button1_link){ 
                        ?>
                            <a href="<?php echo esc_url($cta_button1_link); ?>" class="btn btn-primary cta-1">
                                <?php echo esc_html( get_theme_mod( 'cta_1_button_label', '' ) ); ?>
                            </a>
                        <?php } } ?>
						<?php if(get_theme_mod( 'hide_show_cta_button_2', true )){
                            $cta_button2_for_banner = get_theme_mod('cta_2_button_label');
                            $cta_button2_link = get_theme_mod('cta_2_link');
                            if($cta_button2_for_banner && $cta_button2_link){
                        ?>
                            <a href="<?php echo esc_url($cta_button2_link); ?>" class="btn btn-secondary cta-2">
                                <?php echo esc_html( get_theme_mod( 'cta_2_button_label', '' ) ); ?>
                            </a>
                             <?php } } ?>
                    </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="event-main-information-wrapper">
            <div class="container">
                <div class="event-information-holder">
                    <div class="event-main-information">

                        <?php $social_media_array = get_theme_mod( 'corporate_event_social_media', 'facebook' ); ?>

                        <?php if ( ! empty( $social_media_array ) && is_array( $social_media_array ) ) : ?>

                        <div class="social-icons">
                            <ul class="list-inline">
                                <?php
                                foreach ( $social_media_array as $value ) {
                                    $key_classes = $value['social_media_repeater_class'];
                                    $class = str_replace( " ", "-", strtolower( $key_classes ) );
                                    $i_tag_class = 'icon-' . $class;
                                    ?>
                                    <li class="<?php echo esc_attr( strtolower( $class ) ); ?>">
                                        <a href="<?php echo esc_url( $value['social_media_link'] ); ?>" target="_blank">
                                            <i class="<?php echo esc_attr( $i_tag_class ); ?>"></i>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>

                    <?php endif; ?>
                    <!-- social media -->
                    <!-- date and time -->
                    <?php if( $display_start_date || $display_end_date || $display_start_time || $display_end_time ) : ?>
                        <div class="time-date">

                            <?php if( $display_start_time || $display_end_time ) { ?>
                                <div class="time">
                                    <?php
                                    $time_format = get_option('time_format');
                                    $time_format = ! empty( $time_format ) ? $time_format : 'h:i A';
                                    ?>
                                    <i class="icon-clock"></i>
                                    <?php if( $display_start_time && $start_time ) { ?>
                                        <span class="" aria-hidden="true"></span> <?php echo date(''.$time_format.'', strtotime( $start_time ) ); ?>
                                    <?php } ?>

                                    <?php if( $display_end_time && $end_time ) { ?>
                                        <?php if( $start_time && $display_start_time ) { echo "-"; } ?>
                                        <span class="" aria-hidden="true"></span> <?php echo date(''.$time_format.'', strtotime( $end_time ) ); ?>
                                    <?php } ?>

                                </div>
                            <?php } ?>


                            <?php if( $display_start_date || $display_end_date ) : ?>
                                <div class="date">
                                    <?php
                                    $date_format = get_option('date_format');
                                    $date_format = ! empty( $date_format ) ? $date_format : 'F j, Y';
                                    ?>

                                    <?php if( $display_start_date && $start_date ) { ?>
                                        <i class="icon-calendar"></i> <?php echo date(''.$date_format.'', strtotime( $start_date ) ); ?>
                                    <?php } ?>

                                    <?php if( $display_end_date && $end_date && $end_date != $start_date ) { ?>
                                        <?php if( $start_date && $display_start_date ) { echo "-"; } ?>
                                        <span aria-hidden="true"></span> <?php echo date(''.$date_format.'', strtotime( $end_date ) ); ?>
                                    <?php } ?>
                                </div>
                            <?php endif; ?>



                        </div>
                        <!-- date and time -->
                    <?php endif; ?> 
                </div>


                <?php if( $countdown_show_hide ) : ?>
                    <div class="countdown-timer-block">
                        <div id="clockdiv"></div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<div id="primary"></div>
