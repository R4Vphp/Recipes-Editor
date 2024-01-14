<?php

require_once("helper.func.php");

require_once("../classes/Database.class.php");
require_once("../classes/SqlQuery.class.php");
require_once('../classes/Validator.class.php');
require_once('../classes/User.class.php');
require_once("../classes/Registration.class.php");
require_once("../classes/Notification.class.php");

session_start();

$controler = new Registration;

$controler->grabInputs();

if($controler->handleErrors()){

    $controler->createAccount();
    header("Location: ../login.php");

}else{

    header("Location: ../register.php");

}