<?php
// Twelve GameUI post types Shortcode
function twelve_gameui_shortcode() {
    ob_start();
	get_template_part( 'partials/gameui-twelve' );
    return ob_get_clean();
}
add_shortcode( 'twelve-gameui', 'twelve_gameui_shortcode' );
?>
