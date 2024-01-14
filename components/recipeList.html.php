<?php

$recipeList = new RecipeList;
$recipeList->loadRecipes();

?>
<div class='panel'>
<h2>Recipes list</h2>
<div class='content'>
<ul class="limit">
<h4>Recipes:</h4>
<?php

$recipeList->printRecipes();

?>
</ul>
<form action='createRecipe.php' method='post'>
    <table>
        <tr><td><button class='button' type='submit' ><div class="icon"><img src='style/create_icon.svg' height='20px'></div>New recipe</button></td></tr>
    </table>
</form>
</div>
</div>