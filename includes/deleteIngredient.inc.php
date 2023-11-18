<?php

require_once("helper.func.php");

require_once("../classes/Database.class.php");
require_once('../classes/Validator.class.php');
require_once("../classes/Recipe.class.php");
require_once("../classes/Ingredient.class.php");
require_once("../classes/IngredientDelete.class.php");
require_once("../classes/Notification.class.php");

session_start();

$controler = new IngredientDelete;

$controler->grabInputs();
$recipeId = $controler->getRecipeId();

$controler->deleteIngredient();
header("Location: ../editRecipe.php?$recipeId");
