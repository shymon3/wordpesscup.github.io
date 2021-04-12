<?php
/**
 * The template for displaying all single posts.
 *
 * @package Corporate_Event
 */

get_header(); ?>

<div class="inside-page content-area content-grid" id="primary">
    <div class="main-content-wrapper" id="main-content">
        <section class="page-section">
            <div class="detail-content">

                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'template-parts/content', 'single' ); ?>
                <?php endwhile; // End of the loop. ?>
                <?php comments_template(); ?>

            </div><!-- /.end of deatil-content -->
        </section> <!-- /.end of section -->
    </div>
    <div class="sidebar-wrapper"><?php get_sidebar(); ?></div>
</div>

<?php get_footer();