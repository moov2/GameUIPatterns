<?php

// Unlimited loop of GameUI post types Shortcode
function unlimited_gameui_paged_shortcode() {
    ob_start();
	get_template_part( 'partials/gameui-unlimited' );
    return ob_get_clean();
}
add_shortcode( 'unlimited-gameui', 'unlimited_gameui_paged_shortcode' );

?>
