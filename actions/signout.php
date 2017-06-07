
<?php
session_start();
// Unset all of the session variables.
$_SESSION = array();

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]
    );
}

session_destroy();

//destroy cookies
unset($_COOKIE['id']);
setcookie('id', '', time() - 3600, '/');
unset($_COOKIE['name']);
setcookie('name', '', time() - 3600, '/');
unset($_COOKIE['surname']);
setcookie('surname', '', time() - 3600, '/');
unset($_COOKIE['password']);
setcookie('password', '', time() - 3600, '/');
unset($_COOKIE['email']);
setcookie('email', '', time() - 3600, '/');
unset($_COOKIE['pic_profile']);
setcookie('pic_profile', '', time() - 3600, '/');
unset($_COOKIE['pic_cover']);
setcookie('pic_cover', '', time() - 3600, '/');
unset($_COOKIE['private']);
setcookie('private', '', time() - 3600, '/');

header('Location: http://www.samaritan.com.br/index');
