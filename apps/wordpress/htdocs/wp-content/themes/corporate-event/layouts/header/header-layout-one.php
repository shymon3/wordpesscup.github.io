<header id="masthead"  class="site-header  header-layout-<?php echo esc_attr( $class ); ?>">
    <div class="header">
        <div class="container">
            <div class="header-wrapper">
                <div class="site-branding-social">
                    <div class="site-branding">
                        <?php
                        the_custom_logo(); ?>
                        <?php $siteTitleShow = get_theme_mod('corporate_event_site_title', true);
                        
                        if($siteTitleShow){ ?>
                        <div class="site-title">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                        </div>
                        <?php } ?>
                        <?php
                        $siteDescShow = get_theme_mod('corporate_event_tagline', true);
                        if($siteDescShow){
                        $bootstrap_photography_description = get_bloginfo( 'description', 'display' );
                        if ( $bootstrap_photography_description || is_customize_preview() ) :
                            ?>
                            <p class="site-description"><?php echo $bootstrap_photography_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
                        <?php  endif; } ?>
                    </div><!-- .site-branding -->


                    <div class="social-navigation">
                   
                <nav id="site-navigation" class="main-navigation">
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><!-- <?php esc_html_e( 'Primary Menu', 'corporate-event' ); ?> -->
                    <div id="nav-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </button>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'main-menu',
                        'menu_id'        => 'primary-menu',
                    )
                );
                ?>
            </nav><!-- #site-navigation -->
            </div>
            </div>


            
        </div>
    </div>
</div>
</header><!-- #masthead -->



