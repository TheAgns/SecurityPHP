<?php

class Redirect
{
    public static function to($location = null, $message = null)
    {
        if ($message !== null) {
            $_SESSION["errormessage"] = $message;
        }
        if ($location) {
            header('Location: ' . $location);
            exit();
        }
    }
}