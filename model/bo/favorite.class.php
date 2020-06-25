<?php
require_once dirname(__FILE__) . "/bases/favorite_base.class.php";

class favorite extends favorite_base {

    function getRowByIDs(int $media_id,  int $user_id) {
        global $pdo;
        $query = "SELECT * FROM `favorite` WHERE favorite.media_id= :media_id AND favorite.user_id= :user_id LIMIT 1";
        try {
            $prepare = $pdo->prepare($query);
            $prepare->bindValue("media_id", $media_id, PDO::PARAM_INT);
            $prepare->bindValue("user_id", $user_id, PDO::PARAM_INT);
            if ($prepare->execute()===false) {
                error_log($prepare->errorCode() ." - ". var_export($prepare->errorInfo(),TRUE));
                return false;
            }
            $row = $prepare->fetch(PDO::FETCH_OBJ);
            if ($row) {
                $this->id = $row->id;
                $this->media_id = $row->media_id;
                $this->user_id = $row->user_id;
            }
        } catch(PDOExecption $e) {
            error_log("Error!: " . $e->getMessage() . "</br>");
            return false;
        }
    }

}
