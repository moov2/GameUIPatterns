<?php
add_action( 'parse_request', 'dmk_redirect_to_login_if_not_logged_in', 1 );
/**
 * Redirects a user to the login page if not logged in.
 *
 * @author Daan Kortenbach
 */
function dmk_redirect_to_login_if_not_logged_in() {
        is_user_logged_in() || auth_redirect();
}

add_filter( 'login_url', 'dmk_strip_loggedout', 1, 1 );
/**
 * Strips '?loggedout=true' from redirect url after login.
 *
 * @author Daan Kortenbach
 *
 * @param  string $login_url
 * @return string $login_url
*/

function dmk_strip_loggedout( $login_url ) {
        return str_replace( '%3Floggedout%3Dtrue', '', $login_url );
}
?>
