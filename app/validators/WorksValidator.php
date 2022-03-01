<?php

class WorksValidators
{
    public function validatesWorksName($full_name_works)
    {
        if (!preg_match('/^[a-zA-Z\'\-\040]+$/', $full_name_works)) {
            return "El nombre debe de tener solo letras y espacios";
        }
        return false;
    }

    public function validatesWorksDescription($description_works)
    {
        if ($description_works < 1) {
            return "Descripcion no puede estar vacio";
        }
        return false;
    }

    public function validatesWorksEmail($email_works)
    {
        if (!filter_var($email_works, FILTER_VALIDATE_EMAIL)) {
            return "Formato de email invalido";
        }
        return false;
    }

    public function validatesWorksPostalCode($cp_works)
    {
        if (!preg_match('/^[0-9]{5}$/', $cp_works)) {
            return "Cp debe de tener 5 numeros";
        }
        return false;
    }

    public function validatesWorkPhoneNumber($phone_number){
        if(!preg_match("/^[\+0-9\-\(\)\s]*$/", $phone_number)){
            return "Telefono solo puede tener numeros y/o prefijo internacional";
        }
        return false;
    }

    public function validatesDateDue($date_due_works){
        $date_now = date("Y-m-d");

        if (!($date_due_works > $date_now)){
           return 'La fecha del trabajo debe de encontrarse en el futuro';
        }
        return false;
    }

}