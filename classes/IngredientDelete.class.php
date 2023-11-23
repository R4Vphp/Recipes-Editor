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

        $stmt = $this->connectDatabase()->prepare(sqlQuery::DELETE_INGREDIENT);
        $stmt->bindParam(":id", $this->ingrId, PDO::PARAM_STR);
        $stmt->execute();

        self::setNotificationMessage(self::SUCCESS);

    }

    public function getRecipeId(){
        return $this->recipeId;
    }

}