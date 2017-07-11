<?php

/**
 * Load CSS for template-team.php
 */

function animation_styles() {
    if ( is_singular('gameui') )
        wp_enqueue_style( 'animation-stylesheet', get_stylesheet_directory_uri() . '/animate.min.css' );
    }

add_action( 'wp_enqueue_scripts', 'animation_styles', 101 );

?>
