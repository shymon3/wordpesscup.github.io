<?php
    if( get_theme_mod( 'timezone_display_option', true ) ) {
?>
<div class="select-timezone">
        <?php  
            if(isset($_POST['timezone_submit'])) {
                corporate_event_add_to_session($_POST);
            }
            if ( $args['selected'] ) {
                $selected = $args['selected'];
            }
        ?>
            <form action="#schedule" method="post">         
                    <?php echo corporate_event_select_timezone($selected); ?>
                <input type="submit" name="timezone_submit" value="Change Time"/>
            </form>
</div>
    <?php } else { 
        $_SESSION['timezone_submit'] = array();
        $selected = get_option("timezone_setting")?get_option("timezone_setting"):"Asia/Kathmandu";
       }   ?>