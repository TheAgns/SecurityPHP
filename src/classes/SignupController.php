<?php
require_once 'src/core/init.php';
class SignupController extends Signup
{
    private $username, $pwd, $pwdRepeat, $email;

    public function __construct($username, $pwd, $pwdRepeat, $email)
    {
        $this->username = $username;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
        $this->email = $email;
    }

    public function signupUser()
    {
        if ($this->userExists() == true) {
            Redirect::to("/securityphp", "This username is taken");
            exit();
        }
        $validation = Input::validateProfile($this->username, $this->pwd, $this->pwdRepeat, $this->email);
        if ($validation === true) {
            $this->insertUser($this->username, $this->pwd, $this->email);
        } else {
            Redirect::to("/securityphp", $validation);
            exit();
        }
    }

    private function userExists()
    {
        $result = null;
        if (!$this->checkUser($this->username)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
}