<?php 
    $reviews_query = new WP_Query(
        array(
            'post_type' => 'dosth_reviews',
            "posts_per_page" => 4,
            'order_by' => 'menu_order'
        )   
    );
?>
<!-- reviews custom query loop -->
<?php if( $reviews_query->have_posts() ): ?>
    <section class="reviews-container make-it-slick">
        <h2><?php _e( 'What People Are Saying', 'nd_dosth' ); ?></h2>
        <div class="nd-dosth-reviews">
            <?php while( $reviews_query->have_posts() ): ?>
                <?php $reviews_query->the_post(); ?>
                <div class="review">
                    <blockquote>
                        <?php the_content(); ?>
                        <footer>
                            <cite><?php the_title(); ?></cite>
                            <span class="review-from">
                                <?php $terms = get_the_terms( get_the_ID() , 'dosth_review_source' ); ?>
                                <?php printf( __( 'From %s', 'nd_dosth' ), $terms[0]->name ); ?>
                            </span>
                        </footer>
                    </blockquote>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </section>
<?php endif;  ?>
<!-- end of reviews custom query loop -->