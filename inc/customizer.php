<?php
/**
 * WP Bootstrap Starter Theme Customizer
 *
 * @package AV_Bootstrap_Optimized
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function themeslug_sanitize_checkbox( $checked ) {
    // Boolean check.
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

function wp_bootstrap_starter_customize_register( $wp_customize ) {



    //Theme Option
    $wp_customize->add_setting( 'theme_option_setting', array(
        'default'   => 'default',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );







    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

    // Add control for logo uploader
    $wp_customize->add_setting( 'wp_bootstrap_starter_logo', array(
        //'default' => __( '', 'wp-bootstrap-starter' ),
        'sanitize_callback' => 'esc_url',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wp_bootstrap_starter_logo', array(
        'label'    => __( 'Upload Logo (replaces text)', 'wp-bootstrap-starter' ),
        'section'  => 'title_tagline',
        'settings' => 'wp_bootstrap_starter_logo',
    ) ) );

}
add_action( 'customize_register', 'wp_bootstrap_starter_customize_register' );




/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function wp_bootstrap_starter_customize_preview_js() {
    wp_enqueue_script( 'wp_bootstrap_starter_customizer', get_template_directory_uri() . '/inc/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'wp_bootstrap_starter_customize_preview_js' );
