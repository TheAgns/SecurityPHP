<?php

class Hash
{
    public static function make($string, $salt = '')
    {
        return hash('sha256', $string . $salt);
    }

    public static function unique()
    {
        return self::make(uniqid());
    }

    public static function encryptPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public static function isValidPassword($password, $hash)
    {
        return password_verify($password, $hash);
    }
}