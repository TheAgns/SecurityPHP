<?php

require_once("src/core/init.php");

function checkRecaptcha()
{
    if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
        // Google secret API
        $secretAPIkey = Config::get("api/api_key");

        // reCAPTCHA response
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secretAPIkey . '&response=' . $_POST['g-recaptcha-response']);

        // Decode JSON and check for fail
        $response = json_decode($verifyResponse);
        if (!($response->success)) {
            Redirect::to("/securityphp", "reCaptcha failed, please try again.");
        } else {
            return true;
        }
    } else {
        Redirect::to("/securityphp", "Please fill in reCaptcha");
    }
}