<?php

$selectedRecipe = $_SESSION["RecipeList"][$_GET[0]];
$recipeMultiplier = $_SESSION["RecipeMultiplier"] ?? 1;
if(!is_object($selectedRecipe)){
    header("Location: ./");
}

?>
<div class='panel'>
    <h2>Recipe calculator: <?= $selectedRecipe->getName(); ?> X<?= $recipeMultiplier ?></h2>
<div class='content'>
<ul>
<?php $selectedRecipe->printIngredients($recipeMultiplier); ?>

<h4>Calculate:</h4>
<li>
<form action='includes/calculateRecipe.inc.php' method='post'>
<input type="hidden" name="recipeId" value="<?= $selectedRecipe->getId();?>" />

<table>
    <tr><td><label for="multiplier">Multiplier:</label></td><td><input type="number" step="0.5" id="multiplier" name="multiplier" autocomplete="off" value="<?= $recipeMultiplier ?>" autofocus /></td></tr>
    <tr><td colspan=2><button class="button" type="submit" ><div class="icon"><img src='style/calc_icon.svg' height='20px'></div>Calculate</button></td></tr>
</table>

</form>

</li>
</ul>
</div>
</div>