<?php

$selectedRecipe = $_SESSION["RecipeList"][$_GET[0]];
if(!is_object($selectedRecipe)){
    header("Location: ./");
}

?>
<div class='panel'>
<h2>Warning</h2>
<div class='content'>
<ul>
<li>
<h3>Are you sure to delete <span><?= $selectedRecipe->getName(); ?></span> recipe?</h3>
<form action='includes/deleteRecipe.inc.php' method='post'>
<input type="hidden" name="recipeId" value="<?= $selectedRecipe->getId(); ?>" />
<button type="submit" class="button"><div class="icon"><img src='style/delete_icon.svg' height='20px'></div>Delete</button>
</form>
</li>
</ul>
</div>
</div>