<?php
require_once 'src/core/init.php';

// Retrieving form data from the signup form
$username = escape(Input::get("username"));
$pwd = escape(Input::get("pwd"));

// Create SignupController
$loginController = new LoginController($username, $pwd);
$loginController->loginUser();
Redirect::to("/securityphp");