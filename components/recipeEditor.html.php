<?php

$selectedRecipe = $_SESSION["RecipeList"][$_GET["recipe"]];
if(!is_object($selectedRecipe)){
    header("Location: ./");
}

?>
<div class='panel'>
<h2>Recipe editor: <?= $selectedRecipe->getName(); ?></h2>
<div class='content'>
<ul>
<?php $selectedRecipe->printIngredients(); ?>

<h4>Add something here:</h4>
<li>
<form action='includes/addIngredient.inc.php' method='post'>
<input type="hidden" name="recipeId" value="<?= $selectedRecipe->getId();?>" />

<table>
    <tr><td><label for="ingrName">Name:</label></td><td><input type="text" id="ingrName" name="ingrName" autocomplete="off" autofocus /></td></tr>
    <tr><td><label for="ingrAmount">Amount:</label></td><td><input type="number" step="0.01" id="ingrAmount" name="ingrAmount" autocomplete="off" /></td></tr>
    <tr><td><label for="ingrUnit">Unit:</label></td><td><input type="text" id="ingrUnit" name="ingrUnit" autocomplete="off" /></td></tr>
    <tr><td><button class="button" type="submit" >Submit</button></td></tr>
</table>

</form>

</li>
</ul>
</div>
</div>