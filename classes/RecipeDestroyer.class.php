<?php

class RecipeDestroyer extends Database {

    const SUCCESS = "Recipe deleted successfully.";

    private string $recipeId;

    public function grabInputs(){

        $this->recipeId = $_POST["recipeId"] ?? null;

    }

    public function deleteRecipe(){

        $deleteIngredients = $this->connectDatabase()->prepare("DELETE FROM ingredients WHERE recipeId = ?");
        $deleteIngredients->execute([
            $this->recipeId
        ]);

        $deleteRecipe = $this->connectDatabase()->prepare("DELETE FROM recipes WHERE id = ?");
        $deleteRecipe->execute([
            $this->recipeId
        ]);

        self::setNotificationMessage(self::SUCCESS);

    }

}