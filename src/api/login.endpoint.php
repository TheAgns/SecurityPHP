<?php
require_once 'src/core/init.php';



if (Token::check(Input::get("logintoken"), "login_token") && checkRecaptcha()) {
    // Retrieving form data from the login form
    $username = escape(Input::get("username"));
    $pwd = escape(Input::get("pwd"));

    // Create LoginController
    $loginController = new LoginController($username, $pwd);
    $loginController->loginUser();
    Redirect::to("/securityphp");
} else {
    Redirect::to("/securityphp/404");
}