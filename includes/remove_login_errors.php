<?php
function login_error_override()
{
    return 'The username and password is incorrect.';
}

add_filter('login_errors', 'login_error_override');
?>
