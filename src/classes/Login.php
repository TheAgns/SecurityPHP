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
        $passwordHashed = $this->_db->query($sql, [$username, $username])->first("password");
        $checkPwd = password_verify($pwd, $passwordHashed);
        if (!$checkPwd) {
            echo "WRONG PASSWORD OR USERNAME";
        }

        // Login Step
        $sql = "SELECT * FROM users where username = ? OR email = ? AND password = ?;";
        $user = $this->_db->query($sql, [$username, $username, $pwd])->first();
        if (!isset($_SESSION)) {
            session_start();
        }
        Session::put(Config::get('sessions/userid'), $user['id']);
        Session::put(Config::get('sessions/username'), $user['username']);

    }
}