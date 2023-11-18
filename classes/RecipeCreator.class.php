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

        $id = strtoupper(hash(self::HASH_METHOD, time()));
        $name = htmlspecialchars($this->name);
        $time = time();

        $stmt = $this->connectDatabase()->prepare("INSERT INTO recipes(id, title, creation_time) VALUES(?, ?, ?)");
        $stmt->execute([
            $id,
            $name,
            $time
        ]);

        self::setNotificationMessage(self::SUCCESS);

        return $id;

    }

}