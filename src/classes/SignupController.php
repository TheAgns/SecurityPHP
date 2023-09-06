<?php

class SignupController extends Signup
{
    private $username, $pwd, $pwdRepeat, $email;

    public function __construct($username, $pwd, $pwdRepeat, $email)
    {
        $this->$username = $username;
        $this->$pwd = $pwd;
        $this->$pwdRepeat = $pwdRepeat;
        $this->$email = $email;
    }

    public function signupUser()
    {
        if ($this->emptyInput() == false) {
            // Redirect to error page
            header("location: ../../index.php?error=emptyinput");
            exit();
        }
        if ($this->invalidUsername() == false) {
            // Redirect to error page
            header("location: ../../index.php?error=username");
            exit();
        }

        $this->insertUser(array($this->username, $this->pwd, $this->email));
    }

    // Private functions for sanitizing and validating input
    // TODO: move into a valdiation class
    private function emptyInput()
    {
        $result = null;
        if (empty($this->username) || empty($this->pwd) || empty($this->pwdRepeat) || empty($this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidUsername()
    {
        $result = null;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->username)) {
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
        if (!$this->checkUser($this->username)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}