<?php

require_once('./config.php');
use Jenssegers\Blade\Blade;
require_once(__ROOT__.'/PHP_plain_project_done/vendor/autoload.php');
include_once "./app/models/UserModel.php";


class LoginController
{

    public function showLogin(){
        $loginInstance = new Blade();
        echo $loginInstance->make('login');
    }

    public function loginValidUserAndReturnUserId($userLogin, $userPassword)
    {
        if ((preg_match('/^[a-zA-Z0-9]{5,}$/', $userLogin))
            && $userPassword > 7) {

            $user_login = htmlspecialchars($userLogin);
            $user_password = htmlspecialchars($userPassword);

            $userObject = new UserModel();
            $userDetails = $userObject->getUserDetails($user_login, $user_password);

            if (!empty($userDetails)) {
                return $userDetails['user_id'];
            } else {
                $userCheckInstance = new UserModel();
                $userCheckInstance->isUserInOurDatabase($user_login);
            }
        } else {
            if (isset($_POST)) {
                echo "Fallo en el log in.";
            }
        }
    }
}