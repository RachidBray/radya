<?php
/**
 * Enqueue frontend assets.
 */
if ( ! function_exists( 'radya_frontend_assets' ) ) {
    function radya_frontend_assets() {
        $theme_version = wp_get_theme()->get( 'Version' );

        // 1. Styles.
        wp_enqueue_style( 'style', get_stylesheet_uri(), array(), $theme_version );
        wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.css', array(), $theme_version, 'all' ); // main.scss: Compiled custom styles.

        if ( is_rtl() ) {
            wp_enqueue_style( 'rtl', get_template_directory_uri() . '/assets/css/main.rtl.css', array(), $theme_version, 'all' );
        }

        // 2. Scripts.
        wp_enqueue_script( 'mainjs', get_template_directory_uri() . '/assets/js/main.js', array(), $theme_version, true );
    }
    add_action( 'wp_enqueue_scripts', 'radya_frontend_assets' );
}

/**
 * Enqueue editor assets.
 */
if ( ! function_exists( 'radya_editor_assets' ) ) {
    function radya_editor_assets() {
        add_editor_style( 'assets/css/editor.css' );
    }

    add_action( 'admin_init', 'radya_editor_assets' );
}