<?php
// Latest blog Shortcode
function latest_blog_post_shortcode() {
    ob_start();
	get_template_part( 'partials/latest-blog-post' );
    return ob_get_clean();
}
add_shortcode( 'latest-blog-post', 'latest_blog_post_shortcode' );
?>
