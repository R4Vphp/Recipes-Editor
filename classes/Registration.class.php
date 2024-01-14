<?php

class Registration extends Database {

    const SUCCESS = "Account created successfully.";

    private string $username;
    private string $email;
    private string $password;
    private string $confirmPassword;

    public function grabInputs(){

        $this->username = $_POST["username"] ?? "";
        $this->email = $_POST["email"] ?? "";
        $this->password = $_POST["password"] ?? "";
        $this->confirmPassword = $_POST["confirmPassword"] ?? "";

    }

    public function handleErrors(){

        $val = new Validator;
        $username = $this->username;
        $email = $this->email;
        $pass1 = $this->password;
        $pass2 = $this->confirmPassword;

        if(
            $val->isEmpty($username, "Username") OR
            $val->inproperLen($username, "Username", 3, 32) OR
            $val->alreadyTaken($username, "Username", "users", "username") OR
            $val->bannedSymbols($username, "Username")
        ){
            return false;
        }
        if(
            $val->isEmpty($email, "Email") OR
            $val->inproperLen($email, "Email", 5, 64) OR
            $val->alreadyTaken($email, "Email", "users", "email") OR
            !$val->isProperEmail($email)
        ){
            return false;
        }
        if(
            $val->isEmpty($pass1, "Password") OR
            !$val->doMatch($pass1, $pass2, "Password") OR
            $val->inproperLen($pass1, "Password", 8, 100)
        ){
            return false;
        }
        return true;

    }

    public function createAccount(){

        $id = strtoupper(hash(self::HASH_METHOD, bin2hex(random_bytes(8)).time()));
        $username = $this->username;
        $email = $this->email;
        $password = password_hash($this->password, PASSWORD_BCRYPT);
        $registerDate = time();

        $stmt = $this->connectDatabase()->prepare(SqlQuery::CREATE_ACCOUNT);
        $stmt->bindParam(":id", $id, PDO::PARAM_STR);
        $stmt->bindParam(":username", $username, PDO::PARAM_STR);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":password", $password, PDO::PARAM_STR);
        $stmt->bindParam(":registerDate", $registerDate, PDO::PARAM_INT);
        $stmt->execute();

        self::setNotificationMessage(self::SUCCESS);
        return $id;

    }

}