<?php

class Signup
{
    private $_db;
    public function __construct()
    {
        $this->_db = DB::getInstance();

    }

    protected function insertUser($fields = array())
    {
        $pwd = $fields[1];
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        $fields[1] = $hashedPwd;
        if (!$this->_db->insert('users', $fields)) {
            throw new Exception('Sorry, there was a problem creating your account');
        }
        $fields = null;
    }

    protected function checkUser($id)
    {
        if (is_numeric($id)) {
            $results = $this->_db->get('users', array('id', '=', $id));
            if ($results->count()) {
                return $results->first();
            }
        }
        // Redirect to error page
        header("location: ../../index.php");
        exit();
    }
}