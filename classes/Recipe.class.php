<?php

class Recipe extends Database {

    private string $id;
    private string $name;

    private int $time;

    private array $ingredients = [];

    public function __construct($id, $name, $ingredients, $time){

        $this->id = $id;
        $this->name = $name;
        $this->ingredients = $ingredients;
        $this->time = $time;

    }

    public function printRecipe(){

        $id = $this->id;
        $recipeName = $this->getNameShorter();
        $time = date("d-m-Y H:i:s", $this->time);

        echo "
        <li class='listed'>
        <h3>$recipeName</h3>
        <p>$time</p>
        <div class='options'>
        <form method='post' action='showRecipe.php?$id'><button type='submit' show ><img src='style/logo_icon.svg' height='25px'></button></form>
        <form method='post' action='editRecipe.php?$id'><button type='submit' edit ><img src='style/edit_icon.svg' height='25px'></button></form>
        <form method='post' action='deleteRecipe.php?$id'><button type='submit' del ><img src='style/delete_icon.svg' height='25px'></button></form>
        </div>
        </li>";

    }

    public function printIngredients($multiplier = 1){

        $ingredients = $this->ingredients;
        if(!count($ingredients)){
            echo "<li><p>No ingredients yet...</p></li>";
            return;
        }

        forEach($ingredients as $key => $i){

            $i->print($multiplier);
        }

    }

    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    public function getIngredients(){
        return $this->ingredients;
    }
    public function getNameShorter($maxLen = 24){
        if(strlen($this->name) > $maxLen){
            return substr($this->name, 0, $maxLen)."...";
        }
        return $this->name;
    }

}