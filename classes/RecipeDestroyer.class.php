<?php

class RecipeDestroyer extends Database {

    const SUCCESS = "Recipe deleted successfully.";

    private string $recipeId;

    public function grabInputs(){

        $this->recipeId = $_POST["recipeId"] ?? null;

    }

    public function deleteRecipe(){
        
        $deleteRecipe = $this->connectDatabase()->prepare(SqlQuery::DELETE_RECIPE);
        $deleteRecipe->bindParam(":recipeId", $this->recipeId, PDO::PARAM_STR);
        $deleteRecipe->execute();

        self::setNotificationMessage(self::SUCCESS);

    }

}