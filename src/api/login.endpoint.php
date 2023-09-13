<?php
require_once 'src/core/init.php';

// Retrieving form data from the signup form
$username = escape(Input::get("username"));
$pwd = escape(Input::get("pwd"));

if (Token::check(Input::get("logintoken"), "login_token") && checkRecaptcha()) {
    // Create LoginController
    $loginController = new LoginController($username, $pwd);
    $loginController->loginUser();
    Redirect::to("/securityphp");
} else {
    Redirect::to("/securityphp/404");
}