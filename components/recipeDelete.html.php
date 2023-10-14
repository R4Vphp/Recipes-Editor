<?php

$selectedRecipe = $_SESSION["RecipeList"][$_GET["recipe"]];
if(!is_object($selectedRecipe)){
    header("Location: ./");
}

?>
<div class='panel'>
<h2>Warning</h2>
<div class='content'>
<ul>
<li>
<h3>Are you sure to delete <?= $selectedRecipe->getName(); ?> recipe?</h3>
<form action='includes/deleteRecipe.inc.php' method='post'>
<input type="hidden" name="recipeId" value="<?= $selectedRecipe->getId(); ?>" />
<button type="submit" class="button">Confirm</button>
</form>
</li>
</ul>
</div>
</div>