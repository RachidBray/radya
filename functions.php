<?php
/**
 * Listimia functions and definitions
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Listimia's includes directory.
$listimia_inc_dir = 'inc';

// Array of files to include.
$listimia_includes = array(
	'/setup.php',                           // Theme setup and custom theme supports.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/patterns.php',                  		// Block Patterns
);

// Include files.
foreach ( $listimia_includes as $file ) {
	require_once get_theme_file_path( $listimia_inc_dir . $file );
}
