<?php

class Notification {

    const TYPE_SUCCESS = "Notice!";
    const TYPE_ERROR = "Error!";

    public function __construct(){

        if($notify = $_SESSION["NOTIFICATION"] ?? false){
            $msg = $notify["MSG"];
            $type = $notify["TYPE"];

            if($type == self::TYPE_ERROR ? $icon = "warn_icon" : $icon = "logo_icon");

            echo "
            <div class='notification'>
                <h4>$type</h4>
                <p>$msg</p>
                <div class='icon'><img src='style/$icon.svg' height='30px'></div>
            </div>";
            unset($_SESSION["NOTIFICATION"]);
        }

    }

}