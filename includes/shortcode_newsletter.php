<?php
// Newsletter Shortcode
function newsletter_shortcode() {
    ob_start();
	get_template_part( 'partials/newsletter' );
    return ob_get_clean();
}
add_shortcode( 'newsletter', 'newsletter_shortcode' );
?>
