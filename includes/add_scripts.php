<?php
// Scripts minify
wp_register_script('gameui-js', get_template_directory_uri() . '/scripts/main.js', array(), '1.0.0');
// Enqueue Scripts
wp_enqueue_script('gameui-js', get_template_directory_uri() . '/scripts/main.js', '', '', true);
?>
