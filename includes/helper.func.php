<?php

function dd($x){

    echo "<pre>";
    var_dump($x);
    echo "</pre>";

}

function clearDate($timestamp){

    return date("H:i d/m/Y", $timestamp);

}