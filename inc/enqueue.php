<?php
/**
 * Enqueue frontend assets.
 */
if ( ! function_exists( 'radya_load_scripts' ) ) {
    function radya_load_scripts() {
        $theme_version = wp_get_theme()->get( 'Version' );

        // 1. Styles.
        wp_enqueue_style( 'style', get_stylesheet_uri(), array(), $theme_version );
        wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.css', array(), $theme_version, 'all' ); // main.scss: Compiled custom styles.

        if ( is_rtl() ) {
            wp_enqueue_style( 'rtl', get_template_directory_uri() . '/assets/css/rtl.css', array(), $theme_version, 'all' );
        }

        // 2. Scripts.
        wp_enqueue_script( 'mainjs', get_template_directory_uri() . '/assets/js/main.js', array(), $theme_version, true );
    }
    add_action( 'wp_enqueue_scripts', 'radya_load_scripts' );
}

