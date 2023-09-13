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
        if (Input::validateProfile($this->username, $this->pwd) == true) {
            $this->login($this->username, $this->pwd);
        } else {
            Redirect::to("/securityphp/404");
            exit();
        }

    }
}