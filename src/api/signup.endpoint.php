<?php
require_once 'src/core/init.php';

// Retrieving form data from the signup form
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdRepeat"];
    $email = $_POST["email"];
}

// Create SignupController
$signupController = new SignupController($username, $pwd, $pwdRepeat, $email);
$signupController->signupUser();

// Return to front page
header("location: ../../index.php?error=none");