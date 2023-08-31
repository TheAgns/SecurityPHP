<?php

require_once '../classes/DB.php';
class UserHandler extends DB
{
    public function getUserByid($userID) {
        $sql = "SELECT `id`, `username` FROM `users` WHERE id = :userID";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->execute();
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user;
    } 

}