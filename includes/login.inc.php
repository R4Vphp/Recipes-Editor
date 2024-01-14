<?php

require_once("helper.func.php");

require_once("../classes/Database.class.php");
require_once("../classes/SqlQuery.class.php");
require_once('../classes/Validator.class.php');
require_once("../classes/User.class.php");
require_once("../classes/LogInOut.class.php");
require_once("../classes/Notification.class.php");

session_start();

$controler = new LogInOut;

$controler->grabInputs();

if($userId = $controler->handleErrors()){

    $controler->loginAccount($userId);
    header("Location: ../");

}else{

    header("Location: ../login.php");

}