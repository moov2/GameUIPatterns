<?php
// Load GameUI styles
function gameui_styles()
{
    wp_register_style('gameui', get_template_directory_uri() . '/style.min.css', array(), '1.0', 'all');
    wp_enqueue_style('gameui'); // Enqueue it!
}
?>
