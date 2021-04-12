<?php
    if( class_exists( 'WepPlugin' ) && get_theme_mod( 'schedule_display_option', true ) ) { ?>
    	<section class="home-section schedule-block" id="schedule">
		    <div class="container">
		        <?php
			        $scheduleHeading = get_theme_mod('heading_for_schedule', 'Schedule');

			        $scheduleContent = get_theme_mod('content_for_schedule');
			        ?>
			        <div class="main-title sub-title">
			            <?php if (!empty($scheduleHeading)) { ?>
			            <h2 class="title title-1"><?php echo esc_html($scheduleHeading); ?></h2>
			            <?php } ?>
			            <?php if (!empty($scheduleContent)) { ?>
			            <span class="sub-title"><?php echo esc_html($scheduleContent);?></span>
			            <?php } ?>
			        </div>
	        
			        <?php $selectScheduleLayout = get_theme_mod('corporate_event_schedule_layout','1'); ?>

			        <?php get_template_part( 'layouts/schedule/schedule-layout', $selectScheduleLayout ); ?>
    		</div>
		</section>
   <?php }