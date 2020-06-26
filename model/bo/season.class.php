<?php
require_once dirname(__FILE__) . "/bases/season_base.class.php";

class season extends season_base {

    function getRowByMediaID($id) {
        global $pdo;
        $query = "SELECT * FROM `season` WHERE media_id= :id";
        try {
            $prepare = $pdo->prepare($query);
            $prepare->bindValue("id", $id, PDO::PARAM_INT);
            if ($prepare->execute()===false) {
                error_log($prepare->errorCode() ." - ". var_export($prepare->errorInfo(),TRUE));
                return false;
            }
            $row = $prepare->fetch(PDO::FETCH_OBJ);
            if ($row) {
                $this->id = $row->id;
                $this->media_id = $row->media_id;
                $this->total_season = $row->total_season;
                $this->s1 = $row->s1;
                $this->s2 = $row->s2;
                $this->s3 = $row->s3;
                $this->s4 = $row->s4;
                $this->s5 = $row->s5;
                $this->s6 = $row->s6;
                $this->s7 = $row->s7;
                $this->s8 = $row->s8;
                $this->s9 = $row->s9;
                $this->s10 = $row->s10;
            }
        } catch(PDOExecption $e) {
            error_log("Error!: " . $e->getMessage() . "</br>");
            return false;
        }
    }

}