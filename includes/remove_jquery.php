<?php
// Remove jQuery Migrate Script from header and Load jQuery from Google API
function stop_loading_wp_embed_and_jquery() {
    if (!is_admin()) {
        wp_deregister_script('wp-embed');
    }
}
add_action('init', 'stop_loading_wp_embed_and_jquery');
?>
