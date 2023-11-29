<?php

class RecipeCreator extends Database{

    const SUCCESS = "Recipe created successfully.";

    private string $name;

    public function grabInputs(){

        $this->name = $_POST["recipeName"] ?? null;

    }

    public function handleErrors(){

        $name = $this->name;
        $val = new Validator;
        
        if(
            $val->isEmpty($name, "Recipe name") OR
            $val->alreadyTaken($name, "Recipe name", "recipes", "title") OR
            $val->inproperLen($name, "Recipe name")
        ){
            return false;
        }
        return true;

    }

    public function uploadRecipe(){

        $id = strtoupper(hash(self::HASH_METHOD, bin2hex(random_bytes(8)).time()));
        $name = htmlspecialchars($this->name);
        $time = time();

        $stmt = $this->connectDatabase()->prepare(SqlQuery::CREATE_RECIPE);
        $stmt->bindParam(":recipeId", $id, PDO::PARAM_STR);
        $stmt->bindParam(":title", $name, PDO::PARAM_STR);
        $stmt->bindParam(":creation_time", $time, PDO::PARAM_INT);
        $stmt->execute();

        self::setNotificationMessage(self::SUCCESS);

        return $id;

    }

}