<?php
/**
 * Radya functions and definitions
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Radya's includes directory.
$radya_inc_dir = 'inc';

// Array of files to include.
$radya_includes = array(
	'/setup.php',                           // Theme setup and custom theme supports.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/patterns.php',                  		// Block Patterns
);

// Include files.
foreach ( $radya_includes as $file ) {
	require_once get_theme_file_path( $radya_inc_dir . $file );
}
