<?php

class User extends Database {

    private string $id;
    private string $username;
    private string $email;
    private int $registerDate;
    private int $sessionTimer;

    public function __construct($userId){

        $stmt = $this->connectDatabase()->prepare(SqlQuery::GET_USER);
        $stmt->bindParam(":userId", $userId, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetchAll()[0];

        $this->id = $result["id"];
        $this->username = $result["username"];
        $this->email = $result["email"];
        $this->registerDate = $result["registerDate"];
        $this->sessionTimer = time();

    }

    public static function getLogged(){
        if($user = $_SESSION["USER"] ?? false){
            return $user;
        }
        return false;
    }

    public function getId(){
        return $this->id;
    }
    public function getUsername(){
        return $this->username;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getRegisterDate(){
        return $this->registerDate;
    }

    public function __destruct(){

        if((time() - $this->sessionTimer) > LogInOut::SESSION_TIME_LIMIT){
            LogInOut::logoutAccount();
        }else{
            $this->sessionTimer = time();
        }


    }

}