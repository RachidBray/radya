<?php
/**
 * Block Patterns
 */
 
/*	-----------------------------------------------------------------------------------------------
	Register theme specific block patterns.
--------------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'radya_register_block_patterns' ) ) : 
	function radya_register_block_patterns() {

		if ( ! ( function_exists( 'register_block_pattern_category' ) && function_exists( 'register_block_pattern' ) ) ) return;

		// The block pattern categories.
		$radya_block_pattern_categories = apply_filters( 'radya_block_pattern_categories', array(
			'radya' => array(
				'label'			=> esc_html__( 'radya', 'radya' ),
			),
		) );

		// Sort the block pattern categories alphabetically based on the label value, to ensure alphabetized order when the strings are localized.
		uasort( $radya_block_pattern_categories, function( $a, $b ) { 
			return strcmp( $a["label"], $b["label"] ); }
		);

		// Register block pattern categories.
		foreach ( $radya_block_pattern_categories as $slug => $settings ) {
			register_block_pattern_category( $slug, $settings );
		}

		// The block patterns included in Listimia.
		$radya_block_patterns = apply_filters( 'radya_block_patterns', array(
			'radya/example-pattern' => array(
				'title'         => esc_html__( 'Block pattern description goes here', 'radya' ),
				'categories'    => array( 'radya' ),
				'content'       => radya_get_block_pattern_path( 'example-pattern' ),
			),
		) );

		// Register block patterns.
		foreach ( $radya_block_patterns as $slug => $settings ) {
			register_block_pattern( $slug, $settings );
		}
	
	}
	add_action( 'init', 'radya_register_block_patterns' );
endif;


/*	-----------------------------------------------------------------------------------------------
	Returns block pattern path.
--------------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'radya_get_block_pattern_path' ) ) : 
	function radya_get_block_pattern_path( $pattern_name ) {

		$path = 'inc/patterns/' . $pattern_name . '.php';

		if ( ! locate_template( $path ) ) return;

		ob_start();
		include( locate_template( $path ) );
		return ob_get_clean();

	}
endif;