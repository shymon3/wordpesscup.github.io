
<?php
    $selected = get_option("timezone_setting") ? get_option("timezone_setting") : "Asia/Kathmandu";

    if( isset( $_POST['timezone_string'] ) )
        $selected = $_POST['timezone_string'];

    get_template_part( 'template-parts/timezone', 'form', array( 'selected' => $selected ) );
?>
<section class="schedule-layout-2">
    <?php
       if(!empty(get_option('session_date'))){
        $scheduleDate = get_option('session_date') ;   
    } else{
        $scheduleDate[] = '';
    }
    if(!empty(get_option('session_time_start'))){
        $scheduleStart = get_option('session_time_start');  
    } else{
        $scheduleStart[] = '';
    }
    if(!empty(get_option('session_time_end'))){
        $scheduleEnds = get_option('session_time_end') ;
    } else{
        $scheduleEnds[] = '';
    }
    if(!empty(get_option('selectSession'))){
        $scheduleSession = get_option('selectSession') ;
    } else{
        $scheduleSession[] = '';
    }
    if(!empty(get_option('selectRoom'))){
        $roomSession = get_option('selectRoom');
    } else{
        $roomSession[] = '';
    }
   
    $results = array_map(null,$scheduleDate,$scheduleStart,$scheduleEnds,$scheduleSession,$roomSession);
    $time_zone = $_SESSION['timezone_submit'] ? $_SESSION['timezone_submit'] :  $selected; 
    $timezone_setting = get_option("timezone_setting")?get_option("timezone_setting"):"Asia/Kathmandu"; 
    foreach($results as $result){
        $eventStartDate=date_create("$result[0] $result[1]",timezone_open("$timezone_setting"));
        date_timezone_set($eventStartDate,timezone_open("$time_zone"));
        $finalDates[] = date_format($eventStartDate,"Y-m-d");
        $finalStarts[] = date_format($eventStartDate,"H:i");
        $finalStartDate[] = date_format($eventStartDate,"Y-m-d H:i");
        
        $eventEndDate=date_create("$result[0] $result[2]",timezone_open("$timezone_setting"));
        date_timezone_set($eventEndDate,timezone_open("$time_zone"));
        $finalEnd[] = date_format($eventEndDate,"H:i");
        $finalEndDate[] = date_format($eventEndDate,"Y-m-d H:i");
    }
   
    for ($i = 0; $i < count($finalDates); $i++) {
        $dates[] = strtotime($finalDates[$i]);
    }
    for ($i = 0; $i < count($finalStartDate); $i++) {
        $time[] = strtotime($finalStarts[$i]);
    }
    for ($i = 0; $i < count($finalEndDate); $i++) {
        $end_time[] = strtotime($finalEnd[$i]);
    }
    $results = array_map(null,$dates,$time,$end_time,$scheduleSession,$roomSession,$finalEndDate);

        uasort( $results, function($a, $b) {
            $date1 = strtotime($a[0]); 
            $date2 = strtotime($b[0]);

            $time1 = $a[1];
            $time2 = $b[1];

            $end_time_1 = strtotime($a[2]); 
            $end_time_2 = strtotime($b[2]);

            $retval = $date1 <=> $date2;
            if ( $retval == 0 ) {
                $retval = $time1 <=> $time2;
                if ( $retval == 0 ) {                        
                    $retval = $end_time_1 <=> $end_time_2;                        
                }
            }
            return $retval;
        } );
    ?>
    <?php if (!empty($dates[0])) { ?>
    <div class="row">
        <div class="col-lg-2 col-md-3">
            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                <?php
                $event_date_format = get_option('eventbanner_date_format');
                $finalDateFormat = !empty($event_date_format) ? $event_date_format : 'F j, Y';
                
                sort( $dates );

                $i = 1;
                foreach (array_unique($dates) as $date) {
                    $class = $i == '1' ? 'active' : '';
                    $event_date = date('Y-m-d', $date ); 
                    ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $class;?>" data-toggle="pill" href="#tab-<?php echo $event_date; ?>" data-title="<?php echo $event_date; ?>"role="tab" aria-controls="pills-day1" aria-selected="true">
                            <span class="day">Day <?php echo $i; ?></span>
                            <?php echo date($finalDateFormat, $date );  ?>
                        </a>
                    </li>
                    <?php
                    $i++;
                }
                ?>
            </ul>
        </div>

        <div class="col-lg-10 col-md-9">
            <div class="tab-content" id="pills-tabContent">
                <?php
                $i = 0;
                $date = array();
                foreach (array_unique($dates) as $date){
                    $class = $i == '0' ? 'show active in' : '';
                    $event_date = date('Y-m-d', $date ); 

                    ?>
                    <div class="tab-pane fade <?php echo $class; ?>" id="tab-<?php echo $event_date; ?>" role="tabpanel" aria-labelledby="pills-day3-tab">
                        <ul class="nav nav-pills mb-3" id="pills-tab-1" role="tablist">
                            <?php
                            $args = [
                                'post_type' => 'room',
                                'post_per_page'=> '-1',
                                'order'=>'ASC'
                            ];
                            query_posts($args);
                            $count = 1;
                            while ( have_posts() ) : the_post();
                                $subclass = $count == '1' ? 'active in' : '';
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link <?php echo $subclass; ?>" data-toggle="pill" href="#room-<?php echo $date; ?>-<?php echo get_the_ID(); ?>" role="tab" aria-controls="pills-home" aria-selected="true"><?php the_title(); ?></a>
                                </li>
                                <?php
                                $count++;
                            endwhile;
                            wp_reset_query();
                            flush();
                            ?>
                        </ul>

                        <div class="tab-content-1" id="pills-tabContent">
                            <?php
                            $args = [
                                'post_type' => 'room',
                                'post_per_page'=> '-1',
                                'order'=>'ASC'
                            ];
                            query_posts($args);
                            $count = 1;
                            while ( have_posts() ) : the_post();
                                $id = get_the_ID();
                                $post = get_post($id); 
                                $roomSlug = $post->post_name;
                                $subclass = $count == '1' ? 'show active in' : '';
                                ?>
                                <div class="tab-pane fade <?php echo $subclass; ?>" id="room-<?php echo $date; ?>-<?php echo $id; ?>" role="tabpanel" aria-labelledby="pills-day1-tab">
                                    <div class="schedule-holder">
                                        <?php
                                        $j = 0;      
                                        foreach ($results as $result){  
                                           if(in_array($date,$result) && in_array($roomSlug,$result)){

                                                //session
                                                $sessionSlug = $result[3];
                                                $sessionImage[] = "";

                                                if( $sessionSlug ) {
                               
                                                    $sessionposts = get_page_by_path($sessionSlug, '', 'session');
                                                    $sessionID = $sessionposts->ID;
                                                    $sessionTitle = $sessionposts->post_title;
                                                    $sessionContent = get_the_excerpt( $sessionID );
                                                    $sessionImage = wp_get_attachment_image_src(get_post_thumbnail_id($sessionID), 'full', false);
                                                }

                                                //room
                                                $roomSlug = $result[4];
                                                $roomposts = get_page_by_path($roomSlug, '', 'room');
        
                                                if ($roomposts){
                                                    $roomTitle = $roomposts->post_title;
                                                    $roomID = $roomposts->ID;
                                                } else{
                                                    $roomTitle = '';
                                                    $roomID = '';    
                                                }
                                                $event_time_format = get_option('eventbanner_time_format');
                                                $finaTimeFormat  = !empty($event_time_format) ? $event_time_format : 'g:i a';

                                        
                                                $event_startdate = date('Y-m-d', $result[0]);
                                                $today = date("Y-m-d");
                                                $event_start_time = strtotime( date( 'H:i:s', $result[1] ) );
                                                $event_end_time = strtotime( date( 'H:i:s', strtotime( $result[2] ) ) );
                                                $now = strtotime( date( ' H:i:s', current_time( 'timestamp', 0 ) ) );

                                                ?>

                                                <div class="session-block">
                                                    <div class="time-img">
                                                        <span class="time">
                                                            <span class="icon-clock"></span>
                                                            <?php 
                                                                echo esc_html(date(''.$finaTimeFormat.'', $result[1])); ?> - <?php echo date(''.$finaTimeFormat.'',$result[2]);
                                                            ?>
                                                        </span>

                                                        <?php if(isset( $sessionImage[0] )) { ?>
                                                            <div class="img-holder" style="background-image: url(<?php echo $sessionImage[0]; ?>);">
                                                                <img src="" alt="">
                                                            </div>
                                                        <?php } ?>
                                                    </div>

                                                    <div class="session-content-wrapper">
                                                        <div class="title-link">
                                                            <h4 class="title"><a href="<?php the_permalink($sessionID); ?>"><?php echo esc_html($sessionTitle);?></a></h4>
                                                            
                                                            <div id="live_nw<?php echo $j; ?>" class="live-color"></div>
                                                            <div id="totalCount" hidden><?php echo count($results); ?></div>
                                                            <div id="event_startdate<?php echo $j; ?>" hidden><?php echo $event_startdate; ?></div>
                                                            <div id="event_enddate<?php echo $j; ?>" hidden><?php echo $result[5]; ?></div>
                                                            <div id="event_enddate<?php echo $j; ?>" hidden><?php echo $event_date; ?> <?php echo date('H:i', $event_end_time); ?></div>


                                                            <div id="starting<?php echo $j; ?>" hidden><?php echo date('H:i', $event_start_time); ?></div>
                                                            <div id="ending<?php echo $j; ?>" hidden><?php echo date('H:i', $event_end_time); ?></div>
                                                            <div id="time_zone" hidden><?php echo $time_zone; ?></div>
                                                           
                                                        </div>
                                                        <div class="session-detail-content collapse show" id="multiCollapseExample1">
                                                            <p><?php echo esc_html($sessionContent); ?></p>

                                                            <div class="session-speakers">
                                                                <?php
                                                                $custom = get_post_custom($sessionID);
                                                                $speakers_serializeD = $custom['speakers'][0];
                                                                if(is_serialized($speakers_serializeD)){
                                                                    $speakers = unserialize($custom["speakers"][0]);
                                                                }else{
                                                                    $speakers = $custom["speakers"];
                                                                }

                                                                if ( array_filter( $speakers ) ){


                                                                    foreach ($speakers as $speaker){
                                                            
                                                                       if ( $speakerPost ){
                                                                            $speakerCustom = get_post_custom($speakerPost->ID);
                                                                            $speakerTitle = $speakerPost->post_title;
                                                                            $speakerPosition = "";
                                                                            $speakerCompany = "";
                                                                            if( array_key_exists('position', $speakerCustom ) ) {
                                                                                $speakerPosition = $speakerCustom['position'][0];
                                                                            }
                                                                            if( array_key_exists('company', $speakerCustom ) ) {
                                                                                $speakerCompany = $speakerCustom['company'][0];
                                                                            }
                                                                            $speakerImage = wp_get_attachment_image_src(get_post_thumbnail_id($speakerPost->ID));
                                                                        
                                                                        ?>
                                                                            <div class="speakers">
                                                                                <?php if(  !empty($speakerImage )  ) { ?>
                                                                                <div class="img-holder">
                                                                                    <a href="<?php echo esc_url( get_the_permalink( $speakerPost->ID ) ) ?>">
                                                                                        <img src="<?php echo esc_url($speakerImage[0]); ?>" alt="<?php echo esc_html($speakerTitle); ?>">
                                                                                    </a>
                                                                                </div>
                                                                            <?php } ?>
                                                                                <div class="text">
                                                                                    <span class="name"> <strong>
                                                                                        <a href="<?php echo esc_url( get_the_permalink( $speakerPost->ID ) ) ?>"><?php echo esc_html($speakerTitle); ?></a></strong></span>
                                                                                    <span class="prof-comp">
                                                                                        <?php
                                                                                            if( $speakerPosition ) {
                                                                                                echo esc_html($speakerPosition);
                                                                                            }          
                                                                                            if( $speakerCompany ) {
                                                                                                if ( $speakerPosition ) {
                                                                                                    echo esc_html(' / ');
                                                                                                }
                                                                                                echo esc_html( $speakerCompany );
                                                                                            }
                                                                                        ?>
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        <?php } } } 
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>

                                            <?php } $j++; }?>
                                    </div>
                                </div>
                                <?php
                                $count++;
                            endwhile;
                            wp_reset_query();
                            flush();
                            ?>
                        </div>
                    </div>
                    <?php
                    $i++;
                }
                ?>

            </div>

            <?php } else {
                esc_html_e('No Schedule Saved');
                }
            ?>
            <!-- Bootstrap Accordion -->
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true"></div>
            <!-- /Bootstrap Accordion -->
        </div>
    </div>


</section>

