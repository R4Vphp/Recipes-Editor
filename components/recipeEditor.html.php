<?php

$selectedRecipe = $_SESSION["RecipeList"][$_GET[0]];
if(!is_object($selectedRecipe)){
    header("Location: ./");
}
$recipeId = $selectedRecipe->getId();

?>
<div class='panel'>
<h2>Recipe editor: <?= $selectedRecipe->getName(); ?></h2>
<div class='content'>
<ul>
<h4>Ingredients:</h4>
<?php $selectedRecipe->printIngredients(); ?>

<h4>Add something here:</h4>
<li>
<form action='includes/addIngredient.inc.php' method='post'>
<input type="hidden" name="recipeId" value="<?= $selectedRecipe->getId();?>" />

<table>
    <tr><td><label for="ingrName">Name:</label></td><td><input type="text" id="ingrName" name="ingrName" autocomplete="off" autofocus /></td></tr>
    <tr><td><label for="ingrAmount">Amount:</label></td><td><input type="number" step="0.01" id="ingrAmount" name="ingrAmount" autocomplete="off" /></td></tr>
    <tr><td><label for="ingrUnit">Unit:</label></td><td><input type="text" id="ingrUnit" name="ingrUnit" autocomplete="off" /></td></tr>
    <tr><td><button class="button" type="submit" ><div class="icon"><img src='style/create_icon.svg' height='20px'></div>Add ingredient</button></td></tr>
</table>

</form>

</li>
<h4>Others</h4>
<li>
    <h3>Options</h3>
    <div class="options">
        <form action="renameRecipe.php?<?= $recipeId; ?>" method="post">
            <button type="submit" rename><img src="style/text_icon.svg" height="25px"></button>
        </form>
    </div>
</li>
</ul>
</div>
</div>