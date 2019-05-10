<?php
/**
 * Registers options with the Theme Customizer
 *
 * @param      object    $wp_customize    The WordPress Theme Customizer
 * @package    Dosth
 */

add_action( 'customize_register', 'nd_dosth_customize_register' );
function nd_dosth_customize_register( $wp_customize ) {
    // All the Customize Options you create goes here
    

    // Move Homepage Settings section underneath the "Site Identity" section
    $wp_customize->get_section('title_tagline')->priority = 1;
    $wp_customize->get_section('static_front_page')->priority = 2;
    $wp_customize->get_section('static_front_page')->title = __( 'Home page preferences', 'nd_dosth' );

    //Enable Live Preview for Default Settings
    $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';

    /* Retina Logo */
    $wp_customize->add_setting( 'tbe_retina_logo', array(
        'type'                  => 'theme_mod',
        'capability'            => 'edit_theme_options',
        //'sanitize_callback'     => 'tbe_sanitize_image_callback',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'tbe_retina_logo', array(
            'label' 		   => __('Logo Retina Version','the-basics-of-everything'),
            'section' 		 => 'title_tagline',
            'settings'     => 'tbe_retina_logo',
    ) ) );

    // Theme Options Panel
    $wp_customize->add_panel( 'nd_dosth_theme_options', 
        array(
            //'priority'         => 100,
            'title'            => __( 'Theme Options', 'nd_dosth' ),
            'description'      => __( 'Theme Modifications like color scheme, theme texts and layout preferences can be done here', 'nd_dosth' ),
        ) 
    );

    // Text Options Section
    $wp_customize->add_section( 'nd_dosth_text_options', 
        array(
            'title'         => __( 'Text Options', 'nd_dosth' ),
            'priority'      => 1,
            'panel'         => 'nd_dosth_theme_options'
        ) 
    );

    // Setting for Copyright text.
    $wp_customize->add_setting( 'nd_dosth_copyright_text',
        array(
            'default'           => __( 'All rights reserved ', 'nd_dosth' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        )
    );

    // Control for Copyright text
    $wp_customize->add_control( 'nd_dosth_copyright_text', 
        array(
            'type'        => 'text',
            'priority'    => 10,
            'section'     => 'nd_dosth_text_options',
            'label'       => 'Copyright text',
            'description' => 'Text put here will be outputted in the footer',
        ) 
    );

    // Setting for Read More text.
    $wp_customize->add_setting( 'nd_dosth_readmore_text',
        array(
            'type'              => 'option',
            'default'           => __( 'Read More ', 'nd_dosth' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        )
    );

    // Control for Read More text
    $wp_customize->add_control( 'nd_dosth_readmore_text', 
        array(
            'type'        => 'text',
            'priority'    => 10,
            'section'     => 'nd_dosth_text_options',
            'label'       => 'Read More text',
            'description' => 'Text put here will be as the text for Read More link in the archives',
            'active_callback' => 'nd_dosth_hide_readmore_on_condition'
        ) 
    );

    // Setting to Show/Hide Read More Link.
    $wp_customize->add_setting( 'nd_dosth_show_readmore',
        array(
            'type'              => 'option',
            'default'           => true,
            'sanitize_callback' => 'nd_dosth_sanitize_checkbox',
            'transport'         => 'postMessage',
        )
    );

    // Control to Show/Hide Read More Link.
    $wp_customize->add_control( 'nd_dosth_show_readmore', 
        array(
            'type'        => 'checkbox',
            'section'     => 'nd_dosth_text_options',
            'label'       => 'Show Read More Link',
            'description' => 'Turn off this checkbox to hide Read More Link on Post archives',
        ) 
    );

    /**
     * Checkbox sanitization callback example.
     *
     * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
     * as a boolean value, either true or false.
     *
     * @param bool $checked Whether the checkbox is checked.
     * @return bool Whether the checkbox is checked.
     */
    function nd_dosth_sanitize_checkbox( $checked ) {
        // Boolean check.
        return ( ( isset( $checked ) && true == $checked ) ? true : false );
    }
    
    /**
     * Show "Read More Text" Control only if a condition is met.
     *
     * @param WP_Customize_Manager object
     * @return bool
     */
    function nd_dosth_hide_readmore_on_condition( $control ) {
        $setting = $control->manager->get_setting( 'nd_dosth_show_readmore' );
        if( ( true == $setting->value() ) and ( is_archive() || is_front_page() || is_home() ) ){
            return true;
        } else{
            return false;
        }
    }

    // Color Options Section
    $wp_customize->add_section( 'nd_dosth_color_options', 
        array(
            'title'         => __( 'Color Options', 'nd_dosth' ),
            'panel'         => 'nd_dosth_theme_options'
        ) 
    );

    // Add a new setting for primary color.
    $wp_customize->add_setting( 'nd_dosth_color_primary',
        array(
            'default'              => 'fdb813',
            'type'                 => 'option',
            'sanitize_callback'    => 'sanitize_hex_color_no_hash',
            'sanitize_js_callback' => 'maybe_hash_hex_color',
            'transport'            => 'postMessage',
        )
    );
    // Add a control for primary color.
    $wp_customize->add_control( new WP_Customize_Color_Control(
            $wp_customize,
            'nd_dosth_color_primary',
            array(
                'label'    		=> esc_html__( 'Primary Color', 'nd_dosth' ),
                'section'  		=> 'nd_dosth_color_options',
                'settings' 		=> 'nd_dosth_color_primary',
            )
        )
    );

    // Add a new setting for Secondary color.
    $wp_customize->add_setting( 'nd_dosth_color_secondary',
        array(
            'default'              => '1a3794',
            'type'                 => 'option',
            'sanitize_callback'    => 'sanitize_hex_color_no_hash',
            'sanitize_js_callback' => 'maybe_hash_hex_color',
            'transport'            => 'postMessage',
        )
    );
    // Add a control for Secondary color.
    $wp_customize->add_control( new WP_Customize_Color_Control(
            $wp_customize,
            'nd_dosth_color_secondary',
            array(
                'label'    		=> esc_html__( 'Secondary Color', 'nd_dosth' ),
                'section'  		=> 'nd_dosth_color_options',
                'settings' 		=> 'nd_dosth_color_secondary',
            )
        )
    );
}

/**
 * Register customize panel controls scripts.
 */
function nd_dosth_customize_controls_register_scripts() {
	wp_enqueue_script(
		'nd-dosth-customize-active-callbacks',
		get_stylesheet_directory_uri() . '/assets/js/customize-active-callback.js',
		array(),
		'',
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'nd_dosth_customize_controls_register_scripts', 0 );

/**
 * Registers the Theme Customizer Preview with WordPress.
 */
function nd_dosth_customize_live_preview() {
	wp_enqueue_script(
		'nd-dosth-customize-js',
		get_stylesheet_directory_uri() . '/assets/js/customize.js',
		array( 'jquery', 'customize-preview' ),
		'',
		true
	);
}
add_action( 'customize_preview_init', 'nd_dosth_customize_live_preview' );

/**
 * Generate Internal CSS from the values Customize Panel Settings
 */
function nd_dosth_customization_css(){

    $style = '';

    //Get Options from the Customize Panel
    $show_read_more_link    = get_option( 'nd_dosth_show_readmore' );
    $primary_color_code     = get_option( 'nd_dosth_color_primary', 'fdb100' );
    $secondary_color_code   = get_option( 'nd_dosth_color_secondary', '1a3794' );


    // Hide ".read-more-link" element if the "Show Read More Link" Control is turned Off
    if( false == $show_read_more_link ){
        $style .= ".read-more-link{display:none}";
    }

    // Primary Color as Background Color
    $style .= '#site-footer .es_button input,
    .slick-dots li.slick-active,
    .menu-button a,
    .page-template-default .content-container .page-title,
    .pagination .nav-links a, .pagination .nav-links .current,
    #commentform input[type="submit"]
                { background-color: #'. $primary_color_code .'; }';

    // Primary Color as Text Color
    $style .= '#announcement .announcement-title,
    .nd-dosth-reviews blockquote p,
    .search-results .page-title,
    .menu li:hover > a, .menu li a:focus,
    .current-menu-item a,
    #blog-sidebar .widget .current-cat a,
    .previous-article
                { color:#'. $primary_color_code .'; }';  
    
    // Secondary Color as Background Color
    $style .= '#announcement{ background-color:#'. $secondary_color_code .'; }';  
    
    // Secondary Color as Text Color
    $style .= '.blog .page-title, .archive .page-title,
    .blog-posts .blog-post h2 a:hover, 
    .blog-posts .blog-post h3 a:hover,
    .read-more-link, .posted-in a,
    .widget-title,
    .single .article-info a,
    .comment-reply-link,
    .next-article,
    .single .related-articles h2,
    .search-results .search-query
                { color:#'. $secondary_color_code .'; }';  
                

    // Remove unnecessary spacing from the styles
    $style = str_replace( array( "\r", "\n", "\t" ), '', $style );

    // Put the final style output together.
	$style = "\n" . '<style type="text/css" id="customization-css">' . trim( $style ) . '</style>' . "\n";

    // Echo it
    echo $style;

}
add_action( 'wp_head', 'nd_dosth_customization_css' );