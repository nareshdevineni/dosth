<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dosth
 */

get_header();
?>
<div class="content-container">
    <h1 class="page-title"><?php the_archive_title(); ?></h1>    
    <div class="container">
        <div class="row">
            <div class="blog-posts col-md-8">
            <?php if ( have_posts() ): ?>
                <?php while( have_posts() ): ?>
                    <?php the_post(); ?>
                    <?php get_template_part( 'parts/blog', 'index' ); ?>
                <?php endwhile; ?>
                <?php the_posts_pagination(); ?>
            <?php else: ?>
                <p><?php _e( 'No Blog Posts found', 'nd_dosth' ); ?></p>
            <?php endif; ?>
            </div>
            <div id="blog-sidebar" class="col-md-4">
                <?php get_sidebar(); ?>                  
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>