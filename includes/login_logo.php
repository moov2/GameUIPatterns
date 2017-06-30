<?php
function custom_login_logo() {
	echo '<style type="text/css">h1 a { background: url('.get_bloginfo('template_directory').'/img/logo.png) !important; width: 179px !important; background-size: cover !important; }</style>';
}
add_action('login_head', 'custom_login_logo');
?>
