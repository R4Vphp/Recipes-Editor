<?php

require_once("helper.func.php");

require_once("../classes/Database.class.php");
require_once("../classes/SqlQuery.class.php");
require_once('../classes/Validator.class.php');
require_once('../classes/User.class.php');
require_once("../classes/LogInOut.class.php");
require_once("../classes/Recipe.class.php");
require_once("../classes/Ingredient.class.php");
require_once("../classes/Notification.class.php");

session_start();

LogInOut::logoutAccount();

header("Location: ../login.php");
