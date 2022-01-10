<?php
/**
 * Custom Template parts.
 */
function radya_custom_template_part_area( $areas ) {
    array_push(
        $areas,
        array(
            'area'        => 'query',
            'label'       => esc_html__( 'Query', 'radya' ),
            'description' => esc_html__( 'Custom query area', 'radya' ),
            'icon'        => 'layout',
            'area_tag'    => 'div',
        )
    );
    return $areas;
}
add_filter( 'default_wp_template_part_areas', 'radya_custom_template_part_area' );
