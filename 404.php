<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package Dosth
 */

get_header();
?>
<div class="content-container">
    <h1 class="page-title"><?php _e( 'OOPS! You took a wrong turn :(', "nd_dosth" ); ?></h1>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="big-404-page">
                    <?php _e( '404', "nd_dosth" ); ?>
                </div>
                <p><?php _e( "But that's totally ok, Can't blame yourself.", 'nd_dosth' ); ?></p>
                <p><?php _e( "Anyway, the page you are looking for doesn't exist any more or might never existed.", 'nd_dosth' ); ?></p>
                <div class="menu-button">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                        <?php _e( 'Go Home', 'nd_dosth' ); ?>
                    </a>
                </div>
                <div class="or"><?php _e( 'or', 'nd_dosth' ); ?></div>
                <?php get_search_form(); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>