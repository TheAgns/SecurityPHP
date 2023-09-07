<?php
require_once 'src/core/init.php';
class Signup
{
    protected $_db;
    protected function __construct()
    {
        $this->_db = DB::getInstance();
    }

    protected function insertUser($username, $pwd, $email)
    {
        $this->_db = DB::getInstance();
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        $fields = [
            "username" => $username,
            "password" => $hashedPwd,
            "email" => $email
        ];
        if (!$this->_db->insert('users', $fields)) {
            throw new Exception('Sorry, there was a problem creating your account');
        }
        $fields = null;
    }

    protected function checkUser($username)
    {
        $results = $this->_db->get('users', array('username', '=', $username));
        if ($results->count()) {
            return $results->first();
        }
        // Redirect to error page
        header("location: ../../index.php");
        exit();
    }
}