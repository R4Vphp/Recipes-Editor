<?php

class RecipeCalculator extends Database {

    const SUCCESS = "Multiplier succesfully set to: ";

    private string $reipeId;
    private $multiplier;

    public function grabInputs(){

        $this->recipeId = $_POST["recipeId"] ?? null;
        $this->multiplier = abs($_POST["multiplier"]) ?? 1;

    }

    public function handleErrors(){

        $multiplier = $this->multiplier;

        $val = new Validator;

        if(
            $val->isEmpty($multiplier, "Multiplier")
        ){
            return false;
        }
        return true;

    }

    public function setMultiplierOnRecipe(){

        return $_SESSION["RecipeMultiplier"] = $this->multiplier;

        self::setNotificationMessage(self::SUCCESS.$this->multiplier);

    }

    public function getRecipeId(){
        return $this->recipeId;
    }


}