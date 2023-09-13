<?php
/*
class Cookie {
    public static function exists($name) {
        return (isset($_COOKIE[$name])) ? true : false;
    }

    public static function get($name) {
        return $_COOKIE[$name];
    }

    public static function put($name, $value, $expiry) {
        if(setcookie($name, $value, time() + $expiry, '/')) {
            return true;
        }
        return false;
    }

    public static function delete($name) {
        self::put($name, '', time() -1);
    }
}


//her giver håndtere vi forskellige cookie operationer som at se om de forskellige cookies er der, indstille cookies og slette cookies //disse funktioner kan bruges til at kunne tilgå brugerspecifikke data eller indstillinger gemt som cookies i en PHP-applikation
*/