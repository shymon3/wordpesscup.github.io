<?php

if( get_theme_mod( 'cta_with_video_display_option', true ) ) :
   
    $title = get_theme_mod( 'cta_with_video_title' );

    $video_type = get_theme_mod( 'cta_with_video_select_video_type', 'external_source' );
    if( $video_type == 'external_source' ) {
    	$video_url = get_theme_mod( 'cta_with_video_external_url_video' );

        $video_source = corporate_event_check_video_source( $video_url );
        if( $video_source == 'youtube' ) {
            $video = corporate_event_get_youtube_embedded_url( $video_url );
        }
        if( $video_source == 'vimeo' ) {
            $video = corporate_event_get_vimeo_embedded_url( $video_url );
        }
    }
    else {
    	$video_id = get_theme_mod( 'cta_with_video_video' );
    	$video = wp_get_attachment_url( $video_id );
    }

    $text = get_theme_mod( 'cta_with_video_text' );
    $button_label = get_theme_mod( 'cta_with_video_button_label' );
    $link = get_theme_mod( 'cta_with_video_link' );

?>



    <div class="cta-video-wrapper spacer">
        <div class="container">
            <div class="cta-video">
                <div class="cta-video-content">
                    <?php if( $video_type == 'external_source' && $video_url ) { ?>
                        <iframe width="100%" height="315" src="<?php echo esc_url( $video ); ?>"></iframe>
                    <?php } else if( $video_type == 'upload' && $video_id ) { ?>
                        <video width="100%" height="315" controls>
                            <source src="<?php echo esc_url( $video ); ?>" type="video/mp4">
                            <source src="<?php echo esc_url( $video ); ?>" type="video/ogg">
                        </video>
                    <?php } ?>
                </div>
                <div class="cta-video-text">
                    <h3 class="title title-1"><?php echo esc_html( $title ); ?></h3>
                    <p><?php echo wp_kses_post( $text ); ?></p>
                    <?php if($button_label && $link){ ?>
                    <a class="btn btn-secondary" href="<?php echo esc_url( $link ); ?>" target="_blank"><?php echo esc_html( $button_label ); ?></a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    
<?php endif;