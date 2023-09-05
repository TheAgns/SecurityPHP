<?php

class Signup
{
    private $_db;
    public function __construct()
    {
        $this->_db = DB::getInstance();

    }

    protected function checkUser($id, $email)
    {

    }
}