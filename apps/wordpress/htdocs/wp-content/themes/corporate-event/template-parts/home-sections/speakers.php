<?php if( class_exists('WepPlugin') && get_theme_mod( 'speaker_display_option', true ) ) { ?>
	<div class="speakers-wrapper spacer">
	    <div class="container">
		    <h2 class="title title-1"><?php echo esc_html( get_theme_mod( 'heading_for_speaker' ) ); ?></h2>		
		    <?php do_action('WEP_speaker_add_layouts'); ?>		    
		</div>
	</div>
<?php } ?>