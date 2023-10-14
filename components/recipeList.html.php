<div class='panel'>
<h2>Recipes list</h2>
<div class='content'>
<ul>
<?php

$recipeList = new RecipeList;
$recipeList->loadRecipes();
$recipeList->printRecipes();

?>
</ul>
<form action='createRecipe.php' method='post'>
<button class='button' type='submit' >New recipe</button>
</form>
</div>
</div>