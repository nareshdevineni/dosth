<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dosth
 */

get_header();
?>
<div class="content-container">
<?php if ( is_home() ) : ?>
    <h1 class="page-title"><?php single_post_title(); ?></h1>
<?php elseif( is_search() ): ?>
    <h1 class="page-title"><?php _e( 'Search results for:', 'nd_dosth' ); ?></h1>
	<div class="search-query"><?php echo get_search_query(); ?></div>    
<?php endif; ?>
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