<?php
//* Create a custom Gravatar
add_filter( 'avatar_defaults', 'sp_custom_gravatar' );
function sp_custom_gravatar ($avatar) {
	$custom_avatar = get_stylesheet_directory_uri() . '/img/gravatar.png';
	$avatar[$custom_avatar] = "Custom Gravatar";
	return $avatar;
}
?>
