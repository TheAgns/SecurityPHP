<?php

class SignupController
{
    private $id, $pwd, $pwdRepeat, $email, $username;

    public function __construct($id, $pwd, $pwdRepeat, $email, $username)
    {
        $this->$id = $id;
        $this->$pwd = $pwd;
        $this->$pwdRepeat = $pwdRepeat;
        $this->$email = $email;
        $this->$username = $username;
    }

    private function emptyInput()
    {
        $result = null;
        if (empty($this->id) || empty($this->pwd) || empty($this->pwdRepeat) || empty($this->email || empty($this->username))) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}