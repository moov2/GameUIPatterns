<?php
add_action('template_redirect', 'author_template_redirect');
function author_template_redirect() {
    if (is_author()) {
        wp_redirect( home_url() ); exit;
    }
}
?>
