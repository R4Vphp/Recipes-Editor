<head>
<?php
require_once("includes/helper.func.php");
require_once("classes/Database.class.php");
require_once("classes/SqlQuery.class.php");
require_once("classes/Validator.class.php");
require_once("classes/Recipe.class.php");
require_once("classes/Ingredient.class.php");
require_once("classes/RecipeList.class.php");
require_once("classes/Notification.class.php");
require_once("classes/RebuiltGet.class.php");
require_once("classes/Style.class.php");
session_start();

new RebuiltGet;
$style = new Style;
?>

<title>Cookbook Application</title>
<link rel='stylesheet' href='style/style.css'>
<link rel="shortcut icon" href="style/logo_icon.svg">

<style>
body{
    --primaryColor: var(<?= $style->getPrimaryColor(); ?>);
}
</style>

</head>
