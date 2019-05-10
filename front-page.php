<?php
/**
 * The front page template file.
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Dosth App
 */
 
 get_header();
 ?>	
<?php while( have_posts() ): ?>
    <?php the_post(); ?>
    <div class="actual-content above-the-fold">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
    <section id="watch-dosth-in-action">
        <h2><?php echo get_post_meta(get_the_ID(), 'second_section_headline', true ); ?></h2>
        <div class="section-content">
            <?php echo get_post_meta(get_the_ID(), 'section_two_content', true ); ?>
        </div>
    </section>
    <section id="section-three">
        <h2><?php echo get_post_meta(get_the_ID(), 'section_three_title', true ); ?></h2>
        <div class="section-content">
            <?php echo get_post_meta(get_the_ID(), 'section_three_content', true ); ?>
        </div>
    </section>
    <section id="app-feature-one">
        <img src="<?php the_field('feature_one_image'); ?>" />
        <div class="section-content">
            <?php echo get_post_meta(get_the_ID(), 'app_feature_one_content', true ); ?>
        </div>
    </section>
    <section id="app-feature-two">
        <img src="<?php the_field('app_feature_two_image'); ?>" />
        <div class="section-content">
            <?php the_field('app_feature_two_content'); ?>
        </div>
    </section>
    <?php 
        $blog_posts_query = new WP_Query(
            array(
                'post_type' => 'post',
                "posts_per_page" => 3
            )   
        );
    ?>
    <?php if( $blog_posts_query->have_posts() ): ?>
        <section class="blog-posts">
            <h2><?php _e( 'Latest Articles', 'nd_dosth' ); ?></h2>
            <?php while( $blog_posts_query->have_posts() ): ?>
                <?php $blog_posts_query->the_post(); ?>
                <?php get_template_part( 'parts/blog', 'index' ); ?>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </section>
    <?php endif;  ?>
    <!-- end of custom query loop -->
<?php endwhile; ?> 
<?php get_template_part( 'parts/reviews', 'slider' ); ?>
<?php get_footer(); ?>