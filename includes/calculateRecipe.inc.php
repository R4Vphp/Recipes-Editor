<?php

require_once("helper.func.php");

require_once("../classes/Database.class.php");
require_once('../classes/Validator.class.php');
require_once("../classes/Recipe.class.php");
require_once("../classes/Ingredient.class.php");
require_once("../classes/RecipeCalculator.class.php");
require_once("../classes/Notification.class.php");

session_start();

$controler = new RecipeCalculator;

$controler->grabInputs();
$recipeId = $controler->getRecipeId();

if($controler->handleErrors()){

    $controler->setMultiplierOnRecipe();

}

header("Location: ../showRecipe.php?$recipeId");