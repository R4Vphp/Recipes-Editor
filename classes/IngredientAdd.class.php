<?php

class IngredientAdd extends Database {

    const SUCCESS = "Ingredient added successfully.";

    private string $recipeId;
    private string $name;
    private string $amount;
    private string $unit;

    public function grabInputs(){

        $this->recipeId = $_POST["recipeId"] ?? null;
        $this->name = $_POST["ingrName"] ?? null;
        $this->amount = $_POST["ingrAmount"] ?? null;
        $this->unit = $_POST["ingrUnit"] ?? null;

    }

    public function handleErrors(){

        $name = $this->name;
        $amount = $this->amount;
        $unit = $this->unit;

        $val = new Validator;

        if(
            $val->isEmpty($name) OR
            $val->inproperLen($name)
        ){
            return false;
        }
        if(
            $val->isEmpty($amount, "Amount")
        ){
            return false;
        }
        if(
            $val->isEmpty($unit, "Unit") OR
            $val->inproperLen($unit, "Unit", 1, 32)
        ){
            return false;
        }
        return true;

    }

    public function addIngredient(){

        $id = strtoupper(hash(self::HASH_METHOD, time()));
        $name = htmlspecialchars($this->name);
        $amount = abs($this->amount);
        $unit = htmlspecialchars($this->unit);
        $recipeId = $this->recipeId;

        $stmt = $this->connectDatabase()->prepare("INSERT INTO ingredients(id, recipeId, title, amount, unit) VALUES(?, ?, ?, ?, ?)");
        $stmt->execute([
            $id,
            $recipeId,
            $name,
            $amount,
            $unit
        ]);

        self::setNotificationMessage(self::SUCCESS);

    }

    public function getRecipeId(){
        return $this->recipeId;
    }

}