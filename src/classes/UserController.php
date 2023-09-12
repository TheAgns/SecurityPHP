<?php

class UserController extends NewUser
{
    // GET /user/{id}
    public function getUser($id)
    {
        $user = $this->getUser($id);
        return $responseData = json_encode($user);
    }
}