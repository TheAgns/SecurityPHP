<?php

class UserView extends NewUser
{
    public function showUser($username)
    {
        $results = $this->getUser($username);
        echo "Username: " . $results['username'];
    }
}