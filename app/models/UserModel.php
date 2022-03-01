<?php


include_once "./connect_db.php";

class UserModel
{

    public function getUserDetails($user_login, $user_password)
    {
        $db = new DatabaseConnection();
        $conn = $db->connect();
        $userCredentialsQuery = 'SELECT * FROM user WHERE user_login = :user_login AND user_password = :user_password';//For future me: this is the brain of the function of GET and CHECK functions
        $userCredentialsStmt = $conn->prepare($userCredentialsQuery);
        $userCredentialsStmt->execute([
            'user_login' => $user_login,
            'user_password' => $user_password
        ]);
        return $userCredentialsStmt->fetch(); //devuelve el resultado encontrado
    }

    public function getUserRoleById(): string
    {
        $db = new DatabaseConnection();
        $conn = $db->connect();
        $userRoleQuery = 'SELECT user_role FROM user WHERE user_id = :user_id';
        $userRoleQueryStmt = $conn->prepare($userRoleQuery);
        $userRoleQueryStmt->execute([
            'user_id' => $_SESSION['user_id']
        ]);
        $userRole = $userRoleQueryStmt->fetchColumn();

        return match ($userRole) {
            "admin" => "admin",
            "worker" => "worker",
            default => "ERROR: Usuario sin rol",
        };
    }

    public function isUserInOurDatabase($user_login)
    {
        $dbCheckUserLoginInstance = new DatabaseConnection();
        $connUserLoginInstance = $dbCheckUserLoginInstance->connect();
        $userNameQuery = 'SELECT user_login FROM user WHERE user_login = :user_login';
        $userNameQueryStmt = $connUserLoginInstance->prepare($userNameQuery);
        $userNameQueryBinds = [
            'user_login' => $user_login
        ];
        $userNameQueryStmt->execute($userNameQueryBinds);
        $userNameResult = $userNameQueryStmt->fetch();

        if ($userNameResult > 0) {
            echo 'Contraseña incorrecta';
        } else {
            echo "Usuario no registrado";
        }
    }

    public function isUserLoginDuplicate($user_login)
    {
        $dbRegistrationInstance = new DatabaseConnection();
        $registrationInstanceConnection = $dbRegistrationInstance->connect();
        $checkForDuplicateQuery = "SELECT * FROM user WHERE user_login = :user_login";
        $checkForDuplicateQueryStmt = $registrationInstanceConnection->prepare($checkForDuplicateQuery);
        $checkForDuplicateQueryStmt->execute(['user_login' => $user_login]);
        return $checkForDuplicateQueryStmt->fetch();
    }

    public function registerUser($user_login, $user_password, $user_name, $user_email)
    {
        $insertDbInstance = new DatabaseConnection();
        $insertDbInstanceConnection = $insertDbInstance->connect();
        $insertNewUserQuery = "INSERT INTO user (user_login, user_password, user_name, user_email) VALUES (:user_login, :user_password, :user_name, :user_email)";
        $insertNewUserStmt = $insertDbInstanceConnection->prepare($insertNewUserQuery);
        $insertNewUserStmtBinds = [
            'user_login' => $user_login,
            'user_password' => $user_password,
            'user_name' => $user_name,
            'user_email' => $user_email
        ];
        $insertNewUserStmt->execute($insertNewUserStmtBinds);
    }

    public function getUserIdByUserName($username){
        $getUserIdByUserNameInstance = new DatabaseConnection();
        $conn = $getUserIdByUserNameInstance->connect();
        $userCredentialsQuery = 'SELECT user_id FROM user WHERE user_login = :user_login';//For future me: this is the brain of the function of GET and CHECK functions
        $userCredentialsStmt = $conn->prepare($userCredentialsQuery);
        $userCredentialsStmt->execute([
            'user_login' => $username
        ]);
        return $userCredentialsStmt->fetch(); //gives back the result found
    }
}