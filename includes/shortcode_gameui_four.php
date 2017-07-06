<?php
// Twelve GameUI post types Shortcode
function four_gameui_shortcode() {
    ob_start();
	get_template_part( 'partials/gameui-four' );
    return ob_get_clean();
}
add_shortcode( 'four-gameui', 'four_gameui_shortcode' );
?>
