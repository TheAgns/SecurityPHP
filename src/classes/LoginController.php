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
        $validation = Input::validateProfile($this->username, $this->pwd);

        if ($validation === true) {
            $this->login($this->username, $this->pwd);
            $this->username = null;
            $this->pwd = null;
        } else {
            Redirect::to("/securityphp", $validation);
        }
    }
}