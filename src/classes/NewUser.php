<?php
/*
class NewUser
{
    private $_db;
    public function __construct()
    {
        $this->_db = DB::getInstance();

    }
    protected function getUser($username)
    {
        try {
        // $sql = "SELECT * FROM users WHERE user_id = ?";
        $results = $this->_db->get('users', array('username', '=', $username));
        if ($results->count()) {
            return $results->first();
        }
        } catch (Exception $e) {
            throw new Exception("An error occurred: " . $e->getMessage());
        }
    }
}
*/