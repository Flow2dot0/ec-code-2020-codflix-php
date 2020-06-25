<?php
require_once dirname(__FILE__) . "/bases/user_base.class.php";

class user extends user_base {

    function getRowByEmail(String $email) {
        global $pdo;
        $query = "SELECT * FROM `user` WHERE email= :email";

        try {
            $prepare = $pdo->prepare($query);
            $prepare->bindValue("email", $email, PDO::PARAM_STR);

            if ($prepare->execute()===false) {
                error_log($prepare->errorCode() ." - ". var_export($prepare->errorInfo(),TRUE));
                return false;
            }
            $row = $prepare->fetch(PDO::FETCH_OBJ);
            if ($row) {
                $this->id = $row->id;
                $this->email = $row->email;
                $this->password = $row->password;
                $this->firstname = $row->firstname;
                $this->lastname = $row->lastname;
                $this->username = $row->username;
                $this->type = $row->type;
                $this->token_confirmation = $row->token_confirmation;
                $this->status = $row->status;
            }
        } catch(PDOExecption $e) {
            error_log("Error!: " . $e->getMessage() . "</br>");
            return false;
        }
    }
}