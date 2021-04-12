<?php

if( get_theme_mod( 'cta_with_image_display_option', true ) ) :
   
    $title = get_theme_mod( 'cta_with_image_title' );
    $image = get_theme_mod( 'cta_with_image_image' );
    $text = get_theme_mod( 'cta_with_image_text' );
    $button_label = get_theme_mod( 'cta_with_image_button_label' );
    $link = get_theme_mod( 'cta_with_image_link' );

?>


	<div class="cta-image-wrapper spacer">
		<div class="container">
			<div class="cta-image">	
				<div class="cta-image-content">
					<h3 class="title title-1"><?php echo esc_html( $title ); ?></h3>
					<p><?php echo wp_kses_post( $text ); ?></p>
					<?php if($button_label && $link){ ?>
					<a class="btn btn-secondary" href="<?php echo esc_url( $link ); ?>" target="_blank"><?php echo esc_html( $button_label ); ?></a>
					<?php } ?>
				</div>
				<div class="cta-image-text">
					<?php if( $image ) { ?>
						<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $title ); ?>">
					<?php } ?>
				</div>
			</div>
		</div>
	</div>

<?php endif;