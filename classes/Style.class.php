<?php

class Style {

    private string $primaryColor;

    const AVAILABLE_COLORS = [
        "--accentGreen",
        "--accentYellow",
        "--accentOrange",
        "--accentBlue"
    ];

    public function __construct(){

        if(!isSet($_SESSION[__CLASS__])){

            $this->primaryColor = self::AVAILABLE_COLORS[rand(0, count(self::AVAILABLE_COLORS) - 1)];
            $_SESSION[__CLASS__] = $this;

        }

    }

    public function getPrimaryColor(){
        return $_SESSION[__CLASS__]->primaryColor;
    }

}