<?php
/**
 * The template for displaying all static pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Dosth
 */

get_header();
?>

<?php while( have_posts() ): ?>
    <?php the_post(); ?>
    <div class="content-container">
        <h1 class="page-title"><?php the_title(); ?></h1>
        <div class="container">
            <div class="row">
                <div class="col-sm-8 actual-content">
                    <?php the_content(); ?>
                </div>
                <div class="col-sm-4">
                    <div class="featured-image">
                        <?php if ( has_post_thumbnail() ) :
                            $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' ); ?>
                            <img src="<?php echo $featured_image[0]; ?>" alt="" />
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endwhile; ?> 
<?php get_footer(); ?>