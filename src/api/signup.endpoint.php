<?php
require_once 'src/core/init.php';

// Retrieving form data from the signup form
$username = escape(Input::get("username"));
$pwd = escape(Input::get("pwd"));
$pwdRepeat = escape(Input::get("pwdRepeat"));
$email = escape(Input::get("email"));

if (Token::check(Input::get("signuptoken"), "signup_token")) {
    // Create SignupController
    $signupController = new SignupController($username, $pwd, $pwdRepeat, $email);
    $signupController->signupUser();

    $loginController = new LoginController($username, $pwd);
    $loginController->loginUser();
    Redirect::to("/securityphp");
} else {
    Redirect::to("/securityphp/404");
}