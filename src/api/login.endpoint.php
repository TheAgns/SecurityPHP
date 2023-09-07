<?php
require_once 'src/core/init.php';

// Retrieving form data from the signup form
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
}
// Create SignupController
$loginController = new LoginController($username, $pwd);
$loginController->loginUser();
$userView = new UserView();
$userView->showUser(Session::get(Config::get('sessions/username')));

header("location: /securityphp");