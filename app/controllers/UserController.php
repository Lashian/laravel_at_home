<?php
include_once "../models/UserModel.php";

class UserController
{
    public function getUserRole(): string
    {
        $userModelInstance = new UserModel();
        return $userModelInstance->getUserRoleById();
    }

    public function sendUserIdByUserName($username){
        $sendUserIdInstance = new UserModel();
        return $sendUserIdInstance->getUserIdByUserName($username);
    }
}