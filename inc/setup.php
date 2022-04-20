<?php
/**
 * Theme Setup.
 */
if ( ! function_exists( 'radya_theme_support' ) ) {
    function radya_theme_support() {

        // Add support for post thumbnails.
        add_theme_support( 'post-thumbnails' );

        // Add support for responsive embedded content.
        add_theme_support( 'responsive-embeds' );

        // Add support for block styles.
        add_theme_support( 'wp-block-styles' );

        // Add support for editor styles.
        add_theme_support( 'editor-styles' );
    }
    add_action( 'after_setup_theme', 'radya_theme_support' );

    // Disable Block Directory: https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/filters/editor-filters.md#block-directory
    remove_action( 'enqueue_block_editor_assets', 'wp_enqueue_editor_block_directory_assets' );
    remove_action( 'enqueue_block_editor_assets', 'gutenberg_enqueue_block_editor_assets_block_directory' );
}
