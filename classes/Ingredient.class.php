<?php

class Ingredient {

    private string $id;
    private string $name;
    private float $amount;
    private string $unit;

    public function __construct(string $id, string $name, float $amount, string $unit){
        $this->id = $id;
        $this->name = $name;
        $this->amount = $amount;
        $this->unit = $unit;
    }

    public function getName(){
        return $this->name;
    }
    public function getAmount(){
        return $this->amount;
    }
    public function getUnit(){
        return $this->unit;
    }

    public function print($multiplier){

        $recipeId = $_GET[0];

        $id = $this->id;
        $name = $this->name;
        $amount = $this->amount * $multiplier;
        $unit = $this->unit;

        echo "<ul>
        <li class='listed'>
        <h3>$name</h3>
        <p>$amount $unit</p>
        <div class='options'>
        <form method='post' action='includes/deleteIngredient.inc.php'>
        <input type='hidden' name='ingrId' value='$id' />
        <input type='hidden' name='recipeId' value='$recipeId' />
        <button type='submit' del ><img src='style/delete_icon.svg' height='25px'></button>
        </form>
        </div>
        </li>
        </ul>";

    }
}