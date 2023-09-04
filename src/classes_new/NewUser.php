<?php

class NewUser
{
    private $_db;
    public function __construct()
    {
        $this->_db = DB::getInstance();

    }
    public function getUser($id = null)
    {
        // $sql = "SELECT * FROM users WHERE user_id = ?";
        if (is_numeric($id)) {
            $result = $this->_db->get('users', array('id', '=', $id));
            if ($result->count()) {
                return $result->first();
            }
        }
        echo "There was an error retrieving the user";
    }
}