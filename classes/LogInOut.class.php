<?php

class LogInOut extends Database {

    const SUCCESS = "You are logged successfully.";
    const LOGOUT = "Logged out successfully.";
    const SESSION_TIME_LIMIT = 900;

    const ACCOUNT_NOT_FOUND = "Username/Email not found";

    private string $uid;
    private string $password;

    public function grabInputs(){

        $this->uid = $_POST["uid"] ?? "";
        $this->password = $_POST["password"] ?? "";

    }

    public function handleErrors(){

        $uid = $this->uid;
        $password = $this->password;

        $val = new Validator;


        if(
            $val->isEmpty($uid, "Username/Email") OR
            !$this->getIdByUid(true)
        ){
            return false;
        }
        if(
            $val->isEmpty($password, "Password") OR
            !$val->verifyPassword($password, $this->getPasswordHash($userId = $this->getIdByUid($uid)))
        ){
            return false;
        }
        return $userId;

    }

    private function getIdByUid($sendFeedback = false){

        $stmt = $this->connectDatabase()->prepare(SqlQuery::GET_ID_BY_UID);
        $stmt->bindParam(":uid", $this->uid, PDO::PARAM_STR);
        $stmt->execute();

        $userId = $stmt->fetchAll()[0]["id"] ?? false;

        if($sendFeedback AND !$userId){
            self::setNotificationMessage(self::ACCOUNT_NOT_FOUND, Notification::TYPE_ERROR);
        }
        return $userId;

    }

    private function getPasswordHash($userId){
        
        $stmt = $this->connectDatabase()->prepare(SqlQuery::GET_USER_PASSWORD_HASH);
        $stmt->bindParam(":userId", $userId, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll()[0]["password"] ?? false;

    }

    public function loginAccount($userId){

        $_SESSION["USER"] = new User($userId);
        self::setNotificationMessage(self::SUCCESS);

    }

    public static function logoutAccount(){

        unset($_SESSION["USER"]);
        unset($_SESSION["RecipeList"]);
        self::setNotificationMessage(self::LOGOUT);

    }

    public function log($success){

        $time = time();
        $ip = $_SERVER["REMOTE_ADDR"];

        $stmt = $this->connectDatabase()->prepare(SqlQuery::LOG);
        $stmt->bindParam(":userId", $userId, PDO::PARAM_STR);
        $stmt->bindParam(":logTime", $time, PDO::PARAM_STR);
        $stmt->bindParam(":ip", $ip, PDO::PARAM_STR);
        $stmt->bindParam(":success", $success, PDO::PARAM_INT);
        $stmt->execute();

    }

}