<?php

class RecipeRename extends Database {

    const SUCCESS = "Recipe name changed successfully";

    private string $recipeId;
    private string $newName;

    public function grabInputs(){

        $this->recipeId = $_POST["recipeId"];
        $this->newName = $_POST["recipeNewName"] ?? null;

    }

    public function handleErrors(){

        $name = $this->newName;
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

    public function changeName(){

        $id = $this->recipeId;
        $name = htmlspecialchars($this->newName);

        $stmt = $this->connectDatabase()->prepare("UPDATE recipes SET title = ? WHERE id = ?;");
        $stmt->execute([
            $name,
            $id
        ]);

        self::setNotificationMessage(self::SUCCESS);

        return $id;

    }

    public function getRecipeId(){
        return $this->recipeId;
    }
    public function getNewName(){
        return $this->newName;
    }

}