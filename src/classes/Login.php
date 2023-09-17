<?php
require_once 'src/core/init.php';
class Login
{
    protected $_db;
    protected function __construct()
    {
        $this->_db = DB::getInstance();
    }

    protected function login($username, $pwd)
    {
        $this->_db = DB::getInstance();
        $sql = "SELECT password FROM users where username = ? OR email = ?;";
        // Password check
        $passwordHashed = $this->_db->query($sql, [$username, $username])->first("password");
        $checkPwd = Hash::isValidPassword($pwd, $passwordHashed);
        if (!$checkPwd) {
            $log = "User failed to log in wrong password or username, username: " . $username;
            logger($log);
            Redirect::to("/securityphp", 'Wrong password or username');
            exit();
        }

        // Login Step
        $sql = "SELECT * FROM users where username = ? OR email = ? AND password = ?;";
        $user = $this->_db->query($sql, [$username, $username, $pwd])->first();
        if ()
        session_regenerate_id();
        Session::put(Config::get('sessions/userid'), $user['id']);
        Session::put(Config::get('sessions/username'), $user['username']);
        Session::put(Config::get('sessions/role'), $user['group']);
        session_regenerate_id();
    }


}