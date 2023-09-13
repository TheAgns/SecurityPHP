<?php

class Input
{
    public static function exists($type = 'post')
    {
        switch ($type) {
            case 'post':
                return (!empty($_POST)) ? true : false;
                break;
            case 'get':
                return (!empty($_GET)) ? true : false;
                break;
            default:
                return false;
                break;
        }
    }

    public static function get($item)
    {
        if (isset($_POST[$item])) {
            return $_POST[$item];
        } else if (isset($_GET[$item])) {
            return $_GET[$item];
        }

        return '';
    }

    public static function validateProfile($username, $pwd, $pwdRepeat = null, $email = null)
    {
        $inputFields = null;
        if ($pwdRepeat == null || $email == null) {
            $inputFields = [$username, $pwd];
        } else {
            $inputFields = [$username, $pwd, $pwdRepeat, $email];
        }

        if (self::emptyInput($inputFields) == false) {
            // No input in fields
            return false;
        }
        if (self::invalidUsername($inputFields[0]) == false) {
            // Invalid username
            return false;
        }
        if (sizeof($inputFields) > 2) {
            if (self::pwdMatch($inputFields[1], $inputFields[2]) == false) {
                // Password repeat doesn't match password
                return false;
            }
            if (self::invalidEmail($inputFields[3])) {
                // Invalid Email
                return false;
            }
        }
        return true;
    }

    private static function invalidEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) ? false : true;
    }

    private static function emptyInput($inputFields)
    {
        switch (sizeof($inputFields)) {
            case 4:
                return (empty($inputFields[0]) || empty($inputFields[1]) ||
                    empty($inputFields[2]) || empty($inputFields[3]))
                    ? false : true;
                break;

            case 2:
                return (empty($inputFields[0]) || empty($inputFields[1]))
                    ? false : true;
                break;
            default:
                return false;
        }
    }

    private static function invalidUsername($username)
    {
        return (!preg_match("/^[a-zA-Z0-9]*$/", $username)) ? false : true;
    }

    private static function pwdMatch($pwd, $pwdRepeat)
    {
        return ($pwd !== $pwdRepeat) ? false : true;
    }

}