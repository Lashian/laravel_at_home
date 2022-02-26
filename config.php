<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
define('__ROOT__', dirname(dirname(__FILE__)));


//hardcoded paths


include_once "app/controllers/LoginController.php";
include_once "app/controllers/WorksController.php";
include_once "app/controllers/UserController.php";
include_once "app/models/UserModel.php";

if(isset($_POST['login'])){
    $userLoginBlade = htmlspecialchars($_POST['user_login']);
    $userPasswordBlade =  htmlspecialchars($_POST['user_password']);

    $loginControllerInstance = new LoginController();
    $user_id = $loginControllerInstance->loginValidUserAndReturnUserId($userLoginBlade,$userPasswordBlade);
        $userLoginInstance = new UserModel;
        $user_role = $userLoginInstance->getUserRoleById($user_id);
        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_role'] = $user_role;
    $workControllerLoginInstance = new WorksController();
    $workControllerLoginInstance->displayWorksByUserID($user_id);
}
?>