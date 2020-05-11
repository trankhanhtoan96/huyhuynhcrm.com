<?php

function alia_enqueue_styles() {

    $parent_style = 'alia-parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );

    wp_enqueue_style( 'alia-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );

    if ( is_rtl() ) {
    	wp_style_add_data( $parent_style, 'rtl', 'replace' );
    }

}
add_action( 'wp_enqueue_scripts', 'alia_enqueue_styles' );
?>