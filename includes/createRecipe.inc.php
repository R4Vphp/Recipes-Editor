<?php

require_once("helper.func.php");

require_once("../classes/Database.class.php");
require_once("../classes/SqlQuery.class.php");
require_once('../classes/Validator.class.php');
require_once("../classes/Recipe.class.php");
require_once("../classes/Ingredient.class.php");
require_once("../classes/RecipeCreator.class.php");
require_once("../classes/Notification.class.php");

session_start();

$controler = new RecipeCreator;

$controler->grabInputs();

if($controler->handleErrors()){

    $newRecipeId = $controler->uploadRecipe();
    header("Location: ../editRecipe.php?$newRecipeId");

}else{

    header("Location: ../createRecipe.php");

}