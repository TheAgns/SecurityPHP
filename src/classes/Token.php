<?php

class Token
{
    public static function generate($tokenType)
    {
        return Session::put(Config::get('sessions/' . $tokenType), md5(uniqid()));
    }

    public static function check($token, $tokenType)
    {
        $tokenName = Config::get('sessions/' . $tokenType);

        if (Session::exists($tokenName) && $token === Session::get($tokenName)) {
            Session::delete($tokenName);
            return true;
        }

        return false;
    }
}