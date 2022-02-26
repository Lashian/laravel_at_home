<?php
include_once('vendor/autoload.php');
include_once('app/controllers/LoginController.php');

$loginInstance = new LoginController();
$loginInstance->showLogin();

