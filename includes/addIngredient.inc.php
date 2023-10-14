<?php

require_once("helper.func.php");

require_once("../classes/Database.class.php");
include_once('../classes/Validator.class.php');
require_once("../classes/Recipe.class.php");
require_once("../classes/Ingredient.class.php");
require_once("../classes/IngredientAdd.class.php");

session_start();

$controler = new IngredientAdd;

$controler->grabInputs();
$recipeId = $controler->getRecipeId();

if($controler->handleErrors()){

    $controler->addIngredient();
    header("Location: ../editRecipe.php?recipe=$recipeId");

}else{

    header("Location: ../editRecipe.php?recipe=$recipeId");

}