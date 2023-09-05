<?php

class UserView extends NewUser
{
    public function showUser($id)
    {
        $results = $this->getUser($id);
        echo "Username: " . $results['username'];
    }
}