<?php
// Twelve Posts post types Shortcode
function twelve_posts_shortcode() {
    ob_start();
	get_template_part( 'partials/posts-twelve' );
    return ob_get_clean();
}
add_shortcode( 'twelve-posts', 'twelve_posts_shortcode' );
?>
