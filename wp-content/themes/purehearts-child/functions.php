<?php
/**
 * Theme functions and definitions.
 */
function purehearts_child_enqueue_styles() {

    if ( SCRIPT_DEBUG ) {
        wp_enqueue_style( 'purehearts-style' , get_template_directory_uri() . '/style.css' );
    } else {
        wp_enqueue_style( 'purehearts-minified-style' , get_template_directory_uri() . '/style.min.css' );
    }

    wp_enqueue_style( 'purehearts-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'purehearts-style' ),
        wp_get_theme()->get('Version')
    );
}

add_action(  'wp_enqueue_scripts', 'purehearts_child_enqueue_styles' );