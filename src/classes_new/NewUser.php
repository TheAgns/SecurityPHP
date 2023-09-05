<?php

class NewUser
{
    private $_db;
    public function __construct()
    {
        $this->_db = DB::getInstance();

    }
    protected function getUser($id = null)
    {
        // $sql = "SELECT * FROM users WHERE user_id = ?";
        if (is_numeric($id)) {
            $results = $this->_db->get('users', array('id', '=', $id));
            if ($results->count()) {
                return $results->first();
            }
        }
        echo "There was an error retrieving the user";
    }

    public function insertUser($fields = array())
    {
        $this->_db->insert('users', $fields);

    }
}