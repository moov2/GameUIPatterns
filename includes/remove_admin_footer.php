<?php
// Remove Wordpress in footer of admin dashboard
function wpse_edit_footer() {
    add_filter( 'admin_footer_text', 'wpse_edit_text', 11 );
}

function wpse_edit_text($content) {
    return "";
}

add_action( 'admin_init', 'wpse_edit_footer' );
?>
