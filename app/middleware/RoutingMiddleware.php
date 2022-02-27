<?php
session_start();
include_once "../../vendor/autoload.php";
include_once "../models/WorkModel.php";
include_once "../models/UserModel.php";
include_once "../controllers/WorksController.php";

use Jenssegers\Blade\Blade;

//////////////////////////WEB.PHP AT HOME//////////////////////////////////
///
//  THE ROUTING OF THIS PROJECT IS DONE BY A MIDDLEWARE (BASICALLY LARAVEL'S WEB.PHP AT HOME),
//  THIS TAKES AWAY THE ROUTING FUNCTIONALITY FROM THE CONTROLLER
//  IN ORDER TO UNDERSTAND WHAT A MIDDLEWARE IS AND HOW IT WORKS IN PRACTICE
//  AS WELL AS IT ALLOWS US AN EASIER TRANSITION BETWEEN VIEWS WITHOUT PRE-ESTABLISHED ROUTING
//  THE REASON WHY THIS WAS A NECESSARY IMPLEMENTATION WAS BECAUSE THE 3RD PARTY BLADE LIBRARY DOESN'T COME WITH MOST OF THE OTHER LARAVEL FUNCTIONS
//  WE ARE SPECIFICALLY MISSING THE return view() FUNCTIONALITY. THIS IS SUPPOSED TO REPLACE THAT
///
/////////////////////////END OF MIDDLEWARE DESCRIPTION///////////////


$request = htmlspecialchars($_GET['request']);

//GET ROUTING AT HOME//
switch ($request) {
    case 'edit':
        if (isset($_GET['work_id'])) {
            $worksId = htmlspecialchars($_GET['work_id']);
        }

        if (!empty($worksId)) {
            $workInstance = new WorkModel();
            $singleRowOfWorkData = $workInstance->getWorkById($worksId);

            if (session_status() === PHP_SESSION_ACTIVE) {
                $userLoginInstance = new UserModel;
                $user_role = $userLoginInstance->getUserRoleById();
                $_SESSION['user_role'] = $user_role;
            }

            $modifyWorksInstance = new Blade();
            echo $modifyWorksInstance->make('modify')->with('singleRowOfWorkData', $singleRowOfWorkData);
        }
        break;
    case 'worksList':
        if (isset($_GET['user_id'])) {
            $userId = htmlspecialchars($_GET['user_id']);
        }

        $worksControllerInstance = new WorksController();
        $worksControllerInstance->displayWorksByUserID();
        break;
    case 'delete':
        if (isset($_GET['work_id'])) {
            $worksId = htmlspecialchars($_GET['work_id']);
        }

        if (!empty($worksId)) {
            $singleRowOfWorkDataForDeleteViewInstance = new WorksController();
            $singleRowOfWorkDataForDeleteView = $singleRowOfWorkDataForDeleteViewInstance->getWorkDataToErase($worksId);
            $eraseWorkInstance = new Blade();
            echo $eraseWorkInstance->make('delete')->with('deleteViewData', $singleRowOfWorkDataForDeleteView);
        }
        break;
    case 'newWork':
        $registerWorkViewInstance = new Blade();
        echo $registerWorkViewInstance->make('register_work');
        break;
    default:
        if (!isset($_POST)) {
            header("Location: http://localhost/PHP_plain_project_done/index.php");
            exit;
        }
}

if (isset($_POST['newWork'])) {
    $postRequest = 'newWork';
} elseif (isset($_POST['deleteWork'])) {
    $postRequest = 'deleteWork';
} elseif (isset($_POST['modifyWork'])) {
    $postRequest = 'modifyWork';
}

//POST ROUTING AT HOME//
switch ($postRequest) {
    case 'newWork':
        $_POST['user_id'] = htmlspecialchars($_GET['user_id']);
        $uploadWorkToDatabaseInstance = new WorksController();
        $success = $uploadWorkToDatabaseInstance->sendWorkData($_POST);
        if ($success) {
            header("Location: http://localhost/PHP_plain_project_done/app/middleware/RoutingMiddleware.php?request=worksList&user_id=" . $_SESSION['user_id']);
        }
        break;
    case 'deleteWork':
        $eraseWorkInstance = new WorksController();
        $eraseWorkInstance->eraseWorkById($_POST['work_id']);
        header("Location: http://localhost/PHP_plain_project_done/app/middleware/RoutingMiddleware.php?request=worksList&user_id=" . $_SESSION['user_id']);
        break;
    case 'modifyWork':
        $updateWorkInstance = new WorksController();
        $success = $updateWorkInstance->modifyWorkById($_POST['work_id'], $_POST);
        if ($success) {
            header("Location: http://localhost/PHP_plain_project_done/app/middleware/RoutingMiddleware.php?request=worksList&user_id=" . $_SESSION['user_id']);
        }
        break;
    default:
        break;
}





