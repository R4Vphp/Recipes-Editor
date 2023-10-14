<?php

class Notification {

    public static function listen(){

        if($notify = $_SESSION["NOTIFICATION"] ?? false){
            echo "<div class='notification'><h4>Notice</h4><p>$notify</p></div>";
            unset($_SESSION["NOTIFICATION"]);
        }

    }

}