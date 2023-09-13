<?php

class Redirect
{
    public static function to($location = null, $message = null)
    {
        if ($message !== null) {
            echo $message;
        }
        if ($location) {
            if (is_numeric($location)) {
                switch ($location) {
                    case 404:
                        header('HTTP/1.0 404 Not Found');
                        include 'src/errors/404.php';
                        break;
                }
            }
            header('Location: ' . $location);
            exit();
        }
    }
}