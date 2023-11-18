<?php

class Validator extends Database {

    const INPUT_NULL = " has to be specified.";
    const INPUT_TOO_LONG = " cannot be longer than ";
    const INPUT_TOO_SHORT = " cannot be shorter than ";
    const INPUT_EXISTS = " already exists.";
    const INPUT_INVALID = " contains invalid symbols.";
    const INPUT_NOT_DIGIT = " has to be digit.";

    const ALLOWED_SYMBOLS = "abcdefghijklmnopqrstuvwxyz 0123456789";

    public function alreadyTaken($input, $name = "Name", $table, $row){

        $stmt = $this->connectDatabase()->prepare("SELECT * FROM $table WHERE $row = ?");
        $stmt->execute([
            $input
        ]);

        if($stmt->rowCount()){
            self::setNotificationMessage($name.self::INPUT_EXISTS, Notification::TYPE_ERROR);
            return true;
        }
        return false;

    }

    public function inproperLen($input, $name = "Name", $min = 3, $max = 64){

        if(strlen($input) > $max){
            $info = $max." chars.";
            self::setNotificationMessage($name.self::INPUT_TOO_LONG.$info, Notification::TYPE_ERROR);
            return true;
        }elseif(strlen($input) < $min){
            $info = $min." chars.";
            self::setNotificationMessage($name.self::INPUT_TOO_SHORT.$info, Notification::TYPE_ERROR);
            return true;
        }else{
            return false;
        }

    }

    public function bannedSymbols($input, $name = "Name"){

        $input = str_split(strtolower($input), 1);

        forEach($input as $symbol){
            if(strpos(self::ALLOWED_SYMBOLS, $symbol) === false){
                self::setNotificationMessage($name.self::INPUT_INVALID, Notification::TYPE_ERROR);
                return true;
            }
        }
        return false;

    }

    public static function isEmpty($input, $name = "Name"){

        if(empty($input)){
            self::setNotificationMessage($name.self::INPUT_NULL, Notification::TYPE_ERROR);
            return true;
        }
        return false;

    }

    public function isDigit($input, $name = "Name"){

        if(!is_float($input) OR !is_int($input)){
            return false;
            self::setNotificationMessage($name.self::INPUT_NOT_DIGIT, Notification::TYPE_ERROR);
        }
        
        return true;

    }


}