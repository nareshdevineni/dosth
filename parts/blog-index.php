<div class="blog-post">
    <?php if( is_front_page() || is_single() ): ?>
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <?php else: ?>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php endif; ?>
    <?php if ( has_post_thumbnail() ) :
        $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'dosth-blog-thumbnail' ); ?>
        <div class="blog-post-thumb">
            <a href="<?php the_permalink(); ?>"><img src="<?php echo $featured_image[0]; ?>" alt="" /></a>
        </div>
    <?php endif; ?>
    <?php the_excerpt(); ?>
    <a class="read-more-link" href="<?php the_permalink(); ?>">
        <?php echo get_option( 'nd_dosth_readmore_text', __( 'Read More', 'nd_dosth' ) ); ?>
    </a>
    <?php $categories = get_the_category(); ?>
    <?php if ( ! empty( $categories ) ) : ?>
        <div class="posted-in">
            <span><?php _e( 'Posted In', 'nd_dosth' ); ?></span>
            <a href="<?php echo get_category_link( $categories[0]->term_id ); ?>"> 
                <?php echo $categories[0]->name; ?>
            </a>
        </div>
    <?php endif; ?>
</div>