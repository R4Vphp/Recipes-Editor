<?php

$selectedRecipe = $_SESSION["RecipeList"][$_GET[0]];
if(!is_object($selectedRecipe)){
    header("Location: ./");
}

?>
<div class='panel'>
<h2>Rename recipe: <?= $selectedRecipe->getName(); ?><div class="options"><a href="./"><img src="style/delete_icon.svg" height="20px"></a></div></h2>
<div class='content'>
<ul>
<h4>Choose a new name:</h4>
<li>
<form action='includes/renameRecipe.inc.php' method='post'>

<table>
    <tr><td><label>New name:<label></td><td><input id='recipeNewName' name='recipeNewName' type='text' autocomplete="off" value="<?= $selectedRecipe->getName(); ?>" autofocus /></td></tr>
    <tr><td><button class='button' type='submit' ><div class="icon"><img src='style/text_icon.svg' height='20px'></div>Rename</button></td></tr>
</table>

<input type="hidden" name="recipeId" value="<?= $selectedRecipe->getId(); ?>" />
</form>
</li>
</ul>
</div>
</div>