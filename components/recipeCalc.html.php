<?php

$selectedRecipe = $_SESSION["RecipeList"][$_GET["recipe"]];
$recipeMultiplier = $_SESSION["RecipeMultiplier"] ?? 1;
if(!is_object($selectedRecipe)){
    header("Location: ./");
}

?>
<div class='panel'>
<h2>Recipe calculator: <?= $selectedRecipe->getName(); ?> <sub>x</sub><?= $recipeMultiplier ?></h2>
<div class='content'>
<ul>
<?php $selectedRecipe->printIngredients($recipeMultiplier); ?>

<h4>Calculate:</h4>
<li>
<form action='includes/calculateRecipe.inc.php' method='post'>
<input type="hidden" name="recipeId" value="<?= $selectedRecipe->getId();?>" />

<table>
    <tr><td><label for="multiplier">Multiplier:</label></td><td><input type="number" step="0.5" id="multiplier" name="multiplier" autocomplete="off" value="<?= $recipeMultiplier ?>" autofocus /></td></tr>
    <tr><td colspan=2><button class="button" type="submit" >Submit</button></td></tr>
</table>

</form>

</li>
</ul>
</div>
</div>