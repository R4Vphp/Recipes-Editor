<?php

class IngredientDelete extends Database {

    const SUCCESS = "Ingredient deleted successfully.";

    private string $recipeId;
    private string $ingrId;
    
    public function grabInputs(){

        $this->ingrId = $_POST["ingrId"] ?? null;
        $this->recipeId = $_POST["recipeId"] ?? null;

    }

    public function deleteIngredient(){

        $stmt = $this->connectDatabase()->prepare("DELETE FROM ingredients WHERE id = ?");
        $stmt->execute([
            $this->ingrId
        ]);

        self::setNotificationMessage(self::SUCCESS);

    }

    public function getRecipeId(){
        return $this->recipeId;
    }

}