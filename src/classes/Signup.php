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
        $hashedPwd = Hash::encryptPassword($pwd);
        $fields = [
            "username" => $username,
            "password" => $hashedPwd,
            "email" => $email,
            "group" => 2,
        ];
        if (!$this->_db->insert('users', $fields)) {
            throw new Exception('Sorry, there was a problem creating your account');
        }
        $fields = null;
    }

    protected function checkUser($username)
    {
        $this->_db = DB::getInstance();
        $results = $this->_db->get('users', array('username', '=', $username));
        if ($results->count()) {
            return false;
        } else {
            return true;
        }
    }
}