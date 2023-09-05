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
        throw new Exception('Sorry, there was a problem retrieving the user');
    }
}