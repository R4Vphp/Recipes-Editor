<?php

class RecipeList extends Database {


    public function loadRecipes(){

        $recipes = $this->connectDatabase()->query("SELECT * FROM recipes ORDER BY title ASC");
        $result = $recipes->fetchAll();

        $recipeList = [];

        forEach($result as $key => $r){

            $recipeId = $r["id"];
            $recipeName = $r["title"];
            $ingr = [];
            $time = $r["creation_time"];

            $ingredients = $this->connectDatabase()->prepare("SELECT * FROM ingredients WHERE recipeId = ? ORDER BY title ASC");
            $ingredients->execute([$recipeId]);

            $result2 = $ingredients->fetchAll();

            forEach($result2 as $k => $i){

                $ingrId = $i["id"];
                $ingrName = $i["title"];
                $ingrAmount = $i["amount"];
                $ingrUnit = $i["unit"];

                $ingr[$ingrId] = new Ingredient($ingrId, $ingrName, $ingrAmount, $ingrUnit);

            }
        
            $recipeList[$recipeId] = new Recipe($recipeId, $recipeName, $ingr, $time);

        }

        $_SESSION[__CLASS__] = $recipeList;

    }

    public function printRecipes(){

        if(!$_SESSION[__CLASS__] OR !count($_SESSION[__CLASS__])){
            echo "<li><p>No recipes yet...</p></li>";
            return false;
        }
        forEach($_SESSION[__CLASS__] as $key => $recipe){

            $recipe->printRecipe();

        }

    }

}