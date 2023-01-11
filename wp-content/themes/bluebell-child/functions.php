<?php
/**
 * Theme functions and definitions.
 */
function bluebell_child_enqueue_styles() {

    if ( SCRIPT_DEBUG ) {
        wp_enqueue_style( 'bluebell-style' , get_template_directory_uri() . '/style.css' );
    } else {
        wp_enqueue_style( 'bluebell-minified-style' , get_template_directory_uri() . '/style.css' );
    }

    wp_enqueue_style( 'bluebell-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'bluebell-style' ),
        wp_get_theme()->get('Version')
    );
}

add_action(  'wp_enqueue_scripts', 'bluebell_child_enqueue_styles' );