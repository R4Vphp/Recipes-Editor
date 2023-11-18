<?php

class RebuiltGet {

    public function __construct(){
        
        $_GET = explode("/", trim(array_key_first($_GET), "/"));
    
    }

}