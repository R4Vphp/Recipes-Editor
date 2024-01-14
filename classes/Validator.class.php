<?php

class Validator extends Database {

    const INPUT_NULL = " has to be specified.";
    const INPUT_TOO_LONG = " cannot be longer than ";
    const INPUT_TOO_SHORT = " cannot be shorter than ";
    const INPUT_EXISTS = " already exists.";
    const INPUT_INVALID = " contains invalid symbols.";
    const INPUT_NOT_DIGIT = " has to be digit.";
    const INPUTS_NOT_MATCH = " do not match.";
    const INPUT_NOT_EMAIL = "Invalid email format.";
    const PASSWORD_INCORRECT = "Incorrect password.";

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

    public function isProperEmail($input){

        if(filter_var($input, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        self::setNotificationMessage(self::INPUT_NOT_EMAIL, Notification::TYPE_ERROR);
        return false;

    }


    public function doMatch($input1, $input2, $name = "Name"){

        if($input1 === $input2){
            return true;
        }
        self::setNotificationMessage($name.self::INPUTS_NOT_MATCH, Notification::TYPE_ERROR);
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

    public function verifyPassword($password, $hash){

        if(!password_verify($password, $hash)){
            self::setNotificationMessage(self::PASSWORD_INCORRECT, Notification::TYPE_ERROR);
            return false;
        }
        return true;

    }


}