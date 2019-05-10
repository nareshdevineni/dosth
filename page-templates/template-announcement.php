<?php
/**
* Template Name: Announcement
*/
?>
<?php get_header('with-no-nav'); ?>
<?php while( have_posts() ): ?>
    <?php the_post(); ?>
    <div id="announcement">
        <h1 class="page-title"><?php _e( 'Announcement', 'dosth' ); ?></h1>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 actual-content">
                    <h2 class="announcement-title"><?php the_title(); ?></h2>
                    <?php the_content(); ?>
                </div>
                <div class="col-sm-12 featured-image">
                    <?php if ( has_post_thumbnail() ) :
                        $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' ); ?>
                        <img src="<?php echo $featured_image[0]; ?>" alt="" />
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endwhile; ?> 
<?php get_footer(); ?>