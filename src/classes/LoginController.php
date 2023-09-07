<?php
require_once 'src/core/init.php';
class LoginController extends Login
{
    private $username, $pwd;

    public function __construct($username, $pwd)
    {
        $this->username = $username;
        $this->pwd = $pwd;
    }

    public function loginUser()
    {
        /*
        if ($this->emptyInput() == false) {
            // Redirect to error page
            header("location: ../../index.php?error=emptyinput");
            exit();
        }
        */

        $this->login($this->username, $this->pwd);
    }

    // Private functions for sanitizing and validating input
    // TODO: move into a valdiation class
    private function emptyInput()
    {
        $result = null;
        if (empty($this->username) || empty($this->pwd)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

}