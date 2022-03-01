<?php
error_reporting(E_ERROR | E_PARSE);
include_once "../../connect_db.php";
include_once "UserModel.php";
include_once "../validators/WorksValidator.php";
include_once "../controllers/WorksController.php";

class WorkModel
{
    public function uploadWorkToDatabase($workData)
    {
        $newWork = new DatabaseConnection();
        $newWorkInstanceConn = $newWork->connect();
        $newWorkQuery = "INSERT INTO tareas (
                    full_name_works, 
                    phonenumber_works, 
                    description_works, 
                    email_works,
                    address_works,
                    county_works,
                    town_works,
                    cp_works,
                    status_works,
                    date_of_creation_works,
                    worker_name_works, 
                    admin_notes_works,
                    date_due_works,
                    user_id) 
                    VALUES (
                    :full_name_works, 
                    :phonenumber_works, 
                    :description_works, 
                    :email_works,
                    :address_works,
                    :county,
                    :town_works,
                    :cp_works,
                    :status_works,
                     NOW(),
                    :worker_name_works, 
                    :admin_notes_works,
                    :date_due_works,
                    :user_id    
                    )";
        $insertNewWorkStmt = $newWorkInstanceConn->prepare($newWorkQuery);
        $instanceWorksValidator = new WorksValidators;
        $workNameError = $instanceWorksValidator->validatesWorksName($workData['full_name']);
        $workPhoneNumberError = $instanceWorksValidator->validatesWorkPhoneNumber($workData['phone_number']);
        $workDescriptionError = $instanceWorksValidator->validatesWorksDescription($workData['description']);
        $workEmailError = $instanceWorksValidator->validatesWorksEmail($workData['email']);
        $workCpError = $instanceWorksValidator->validatesWorksPostalCode($workData['cp']);

        $insertNewWorkStmtBinds = [
            'full_name_works' => $workData['full_name'],
            'phonenumber_works' => $workData['phone_number'],
            'description_works' => $workData['description'],
            'email_works' => $workData['email'],
            'address_works' => $workData['address'],
            'county' => $workData['county'],
            'town_works' => $workData['town'],
            'cp_works' => $workData['cp'],
            'status_works' => $workData['status'],
            'worker_name_works' => $workData['worker_name'],
            'admin_notes_works' => $workData['admin_notes_works'],
            'date_due_works' => $workData['date_due_works'],
            'user_id' => $_SESSION['user_id']
        ];

        if ($workNameError === false && $workPhoneNumberError === false && $workDescriptionError === false && $workEmailError === false && $workCpError === false) {
            $insertNewWorkStmt->execute($insertNewWorkStmtBinds);
        } else {
            echo $workNameError . "<br>";
            echo $workPhoneNumberError . "<br>";
            echo $workDescriptionError . "<br>";
            echo $workEmailError . "<br>";
            echo $workCpError . "<br>";
        }

    }

    //Revisar tras blade
    public function getUsersWorks(): array
    {
        $worksList = new DatabaseConnection();
        $usersWorksConnection = $worksList->connect();
        $getUsersWorksQuery = "SELECT * FROM tareas WHERE user_id = :user_id";
        $getUsersWorksQueryStmt = $usersWorksConnection->prepare($getUsersWorksQuery);
        $getUsersWorksQueryBinds = ['user_id' => $_SESSION['user_id']];
        $getUsersWorksQueryStmt->execute($getUsersWorksQueryBinds);

        return $getUsersWorksQueryStmt->fetchAll();
    }

    public function getWorkById($work_id): array
    {
        $worksDataInstance = new DatabaseConnection();
        $worksByIdConnection = $worksDataInstance->connect();
        $worksByIdQuery = "SELECT * FROM tareas WHERE works_id = :works_id";
        $worksByIdQueryStmt = $worksByIdConnection->prepare($worksByIdQuery);
        $worksByIdQueryBinds = ['works_id' => $work_id];
        $worksByIdQueryStmt->execute($worksByIdQueryBinds);

        return $worksByIdQueryStmt->fetch();
    }

    public function deleteWorkById($work_id)
    {
        $deleteWorkInstance = new DatabaseConnection();
        $deleteWorkConnection = $deleteWorkInstance->connect();
        $deleteWorkByIdQuery = "DELETE FROM tareas WHERE works_id = :works_id";
        $deleteWorkByIdQueryBind = ['works_id' => $work_id];
        $deleteWorkByIdStmt = $deleteWorkConnection->prepare($deleteWorkByIdQuery);
        $deleteWorkByIdStmt->execute($deleteWorkByIdQueryBind);
        header("Location: http://localhost/PHP_plain_project_done/app/middleware/RoutingMiddleware.php?request=worksList&user_id=" . $_SESSION['user_id']);
    }

    public function updateWorkById($work_id, $updatedWorkData)
    {
        $modifyWorkInstance = new DatabaseConnection();
        $modifyWorkConnection = $modifyWorkInstance->connect();

        $userRoleInstance = new UserModel();
        $userRole = $userRoleInstance->getUserRoleById();

        if ($userRole == "admin") {
            $modifyWorkByIdQuery = "
        UPDATE tareas
        SET 
        full_name_works= :full_name_works,
        phonenumber_works = :phonenumber_works,
        description_works = :description_works,
        email_works = :email_works,
        address_works = :address_works,
        county_works = :county_works,
        date_due_works = :date_due_works,
        town_works = :town_works,
        cp_works = :cp_works,
        status_works = :status_works,
        worker_name_works = :worker_name_works,
        admin_notes_works = :admin_notes_works
        WHERE works_id = :works_id";

            $instanceWorksValidator = new WorksValidators;
            $workNameError = $instanceWorksValidator->validatesWorksName($updatedWorkData['full_name']);
            $workPhoneNumberError = $instanceWorksValidator->validatesWorkPhoneNumber($updatedWorkData['phone_number']);
            $workDescriptionError = $instanceWorksValidator->validatesWorksDescription($updatedWorkData['description']);
            $workEmailError = $instanceWorksValidator->validatesWorksEmail($updatedWorkData['email']);
            $workCpError = $instanceWorksValidator->validatesWorksPostalCode($updatedWorkData['cp']);
            $dateDueWork = $instanceWorksValidator->validatesDateDue($updatedWorkData['date_due_works']);
            $noValidationForWorker = false;

            $modifyWorkByIdQueryBind = [
                'full_name_works' => htmlspecialchars($updatedWorkData['full_name']),
                'phonenumber_works' => htmlspecialchars($updatedWorkData['phone_number']),
                'description_works' => htmlspecialchars($updatedWorkData['description']),
                'email_works' => htmlspecialchars($updatedWorkData['email']),
                'address_works' => htmlspecialchars($updatedWorkData['address']),
                'county_works' => htmlspecialchars($updatedWorkData['county']),
                'date_due_works' => htmlspecialchars($updatedWorkData['date_due_works']),
                'town_works' => htmlspecialchars($updatedWorkData['town']),
                'cp_works' => htmlspecialchars($updatedWorkData['cp']),
                'status_works' => htmlspecialchars($updatedWorkData['status']),
                'worker_name_works' => htmlspecialchars($updatedWorkData['worker_name']),
                'admin_notes_works' => htmlspecialchars($updatedWorkData['admin_notes_works']),
                'works_id' => htmlspecialchars($work_id)
            ];
        } else {
            $noValidationForWorker = true;
            $modifyWorkByIdQuery = "
        UPDATE tareas
        SET 
        status_works = :status_works,
        worker_notes_works = :worker_notes_works
        WHERE works_id = :works_id";

            $modifyWorkByIdQueryBind = [
                'status_works' => htmlspecialchars($updatedWorkData['status']),
                'worker_notes_works' => htmlspecialchars($updatedWorkData['worker_notes_works']),
                'works_id' => htmlspecialchars($work_id)
            ];
        }

        $modifyWorkByIdStmt = $modifyWorkConnection->prepare($modifyWorkByIdQuery);
        if (($workNameError === false && $workPhoneNumberError === false && $workDescriptionError === false && $workEmailError === false && $workCpError === false && $dateDueWork == false) || $noValidationForWorker) {
            $modifyWorkByIdStmt->execute($modifyWorkByIdQueryBind);
            return true;
        } else {
            echo $workNameError . "<br>";
            echo $workPhoneNumberError . "<br>";
            echo $workDescriptionError . "<br>";
            echo $workEmailError . "<br>";
            echo $workCpError . "<br>";
            echo $dateDueWork . "<br>";

            return false;
        }

    }

    public function getWorkerNotesColumn($work_id)
    {
        $workEditInstance = new DatabaseConnection();
        $workEditConnection = $workEditInstance->connect();
        $workEditQuery = "SELECT worker_notes_works FROM tareas WHERE works_id = :works_id";
        $workEditStmt = $workEditConnection->prepare($workEditQuery);
        $workEditBinds = ['works_id' => $work_id];
        $workEditStmt->execute($workEditBinds);
        return $workEditStmt->fetchColumn();
    }

    public function getAllWorks()
    {
        $worksQueryInstance = new DatabaseConnection();
        $worksQueryConnection = $worksQueryInstance->connect();
        $allWorksQuery = "SELECT * FROM tareas";
        return $worksQueryConnection->query($allWorksQuery);
    }
}