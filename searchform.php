<?php
/**
 * Template for displaying search forms in Dosth
 *
 * @package Dosth
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label>
        <span class="screen-reader-text"><?php _x( 'Search for:', 'label', 'nd_dosth'); ?></span>
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search Articles', 'placeholder', 'nd_dosth' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
    </label>
    <input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'nd_dosth' ); ?>" />
</form>