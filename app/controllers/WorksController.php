<?php
use Jenssegers\Blade\Blade;
include_once "./app/models/WorkModel.php";
include_once "UserController.php";
include_once "./app/controllers/WorksController.php";

class WorksController
{

    public function displayWorksByUserID()
    {
         $showUserWorksInstance = new WorkModel();
         $userWorks = $showUserWorksInstance->getAllWorks();

         $userControllerInstance = new UserController();
         $userRole = array('user_role'=>$userControllerInstance->getUserRole());

         $showRegistrationFormBladeObject = new Blade();
         echo $showRegistrationFormBladeObject->make('works', $userRole)->with('userWorks',$userWorks);
    }

    public function modifyWorkById($work_id, $updatedWorkData){
        $modifyWorkInstance = new WorkModel();
        $modifyWorkInstance->updateWorkById($work_id, $updatedWorkData);
    }

    public function eraseWorkById($work_id){
        $eraseWorkInstance = new WorkModel();
        $eraseWorkInstance->deleteWorkById($work_id);
    }

    public function getWorkDataToErase($work_id): array
    {
        $dataToErase = new WorkModel() ;
        return $dataToErase->getWorkById($work_id);
    }

    public function sendWorkData ($workDataArray) {
        $workDataInstance = new WorkModel();
        $workDataInstance->uploadWorkToDatabase($workDataArray);

    }


    public function isWorkEditedByWorker($work_id): bool
    {
        $workEditInstance = new WorkModel();
        $isWorkEdited = $workEditInstance->getWorkerNotesColumn($work_id);

        if (!empty($isWorkEdited)) {
            return true;
        } else {
            return false;
        }
    }
}