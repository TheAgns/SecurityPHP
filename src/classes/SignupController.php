<?php

class SignupController extends Signup
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

    private function signupUser()
    {
        if ($this->emptyInput() == false) {
            // Redirect to error page
            header("location: ../../index.php?error=emptyinput");
            exit();
        }
        if ($this->invalidId() == false) {
            // Redirect to error page
            header("location: ../../index.php?error=username");
            exit();
        }

        $this->insertUser();
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

    private function invalidId()
    {
        $result = null;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->id)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function pwdMatch()
    {
        $result = null;
        if ($this->pwd !== $this->pwdRepeat) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function idTakenCheck()
    {
        $result = null;
        if (!$this->checkUser($this->id)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}