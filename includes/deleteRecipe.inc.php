<?php

require_once("helper.func.php");

require_once("../classes/Database.class.php");
include_once('../classes/Validator.class.php');
require_once("../classes/Recipe.class.php");
require_once("../classes/Ingredient.class.php");
require_once("../classes/RecipeDestroyer.class.php");

session_start();

$controler = new RecipeDestroyer;

$controler->grabInputs();

$controler->deleteRecipe();
header("Location: ../");
