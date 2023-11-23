<?php

require_once("helper.func.php");

require_once("../classes/Database.class.php");
require_once("../classes/SqlQuery.class.php");
require_once('../classes/Validator.class.php');
require_once("../classes/Recipe.class.php");
require_once("../classes/Ingredient.class.php");
require_once("../classes/RecipeRename.class.php");
require_once("../classes/Notification.class.php");

session_start();

$controler = new RecipeRename;

$controler->grabInputs();
$recipeId = $controler->getRecipeId();

if($controler->handleErrors()){

    $controler->changeName();
    header("Location: ../editRecipe.php?$recipeId");

}else{

    header("Location: ../renameRecipe.php?$recipeId");   

}