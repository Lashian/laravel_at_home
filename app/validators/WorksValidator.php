<?php

class WorksValidators
{
    public function validatesWorksName($full_name_works)
    {

        if (!preg_match('/^[a-zA-Z\'\-\040]+$/', $full_name_works)) {
            return "Only letters and white space allowed";
        }
        return false;
    }

    public function validatesWorksDescription($description_works)
    {
        if ($description_works < 1) {
            return "Description can't be empty";
        }
        return false;
    }

    public function validatesWorksEmail($email_works)
    {
        if (!filter_var($email_works, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email format";
        }
        return false;
    }

    public function validatesWorksPostalCode($cp_works)
    {
        if (!preg_match('/^[0-9]{5}$/', $cp_works)) {
            return "Only 5 numbers are allowed";
        }
        return false;
    }

    public function validatesWorkPhoneNumber($phone_number){
        if(!preg_match('/[+0-9]/', $phone_number)){
            return "Can only contain numbers and/or the international country number";
        }
        return false;
    }

}