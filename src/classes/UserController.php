<?php

class UserController extends NewUser
{
    // GET /user/{id}
    public function getUser($id)
    {
        $user = $this->getUser($id);
        return $responseData = json_encode($user);
    }

    // POST /user/register
    public function registerUser($fields = array())
    {
        $newUser = new NewUser();
        $newUser->insertUser($fields);
    }
}