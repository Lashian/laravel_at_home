<?php
include_once "../models/UserModel.php";

class UserController
{
    public function getUserRole($user_id): string
    {
        $userModelInstance = new UserModel();
        return $userModelInstance->getUserRoleById($user_id);
    }

    public function sendUserIdByUserName($username){
        $sendUserIdInstance = new UserModel();
        return $sendUserIdInstance->getUserIdByUserName($username);
    }
}