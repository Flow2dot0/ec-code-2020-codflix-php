<?php
require_once dirname(__FILE__) . "/bases/favorite_base.class.php";

class favorite extends favorite_base {

    function getDataByID(int $id, $obj = true) {
        global $pdo;
        $param=array();
        $query  = "SELECT * FROM `favorite` WHERE user_id=".$id;
        if(!empty($this->id) || (isset($this->id) && $this->id === 0)) {
            $query .= " AND `id`";

            // different of
            if(substr($this->id, 1, 1) == "!") {
                // different of empty
                if($this->id == "!" || $this->id == "%!%") {
                    $query .= " != '' && `id` IS NOT NULL";
                    // different of value
                } else {
                    $query .= " NOT LIKE :id";
                    $param["id"]= substr($this->id, 2);
                }
                // is empty
            } elseif(substr($this->id, 1, 1) == "=") {
                $query .= " = '' || `id` IS NULL";
                // like
            } else {
                $query .= " LIKE :id";
                $param["id"]= $this->id;
            }
        }
        if(!empty($this->media_id) || (isset($this->media_id) && $this->media_id === 0)) {
            $query .= " AND `media_id`";

            // different of
            if(substr($this->media_id, 1, 1) == "!") {
                // different of empty
                if($this->media_id == "!" || $this->media_id == "%!%") {
                    $query .= " != '' && `media_id` IS NOT NULL";
                    // different of value
                } else {
                    $query .= " NOT LIKE :media_id";
                    $param["media_id"]= substr($this->media_id, 2);
                }
                // is empty
            } elseif(substr($this->media_id, 1, 1) == "=") {
                $query .= " = '' || `media_id` IS NULL";
                // like
            } else {
                $query .= " LIKE :media_id";
                $param["media_id"]= $this->media_id;
            }
        }
        if(!empty($this->user_id) || (isset($this->user_id) && $this->user_id === 0)) {
            $query .= " AND `user_id`";

            // different of
            if(substr($this->user_id, 1, 1) == "!") {
                // different of empty
                if($this->user_id == "!" || $this->user_id == "%!%") {
                    $query .= " != '' && `user_id` IS NOT NULL";
                    // different of value
                } else {
                    $query .= " NOT LIKE :user_id";
                    $param["user_id"]= substr($this->user_id, 2);
                }
                // is empty
            } elseif(substr($this->user_id, 1, 1) == "=") {
                $query .= " = '' || `user_id` IS NULL";
                // like
            } else {
                $query .= " LIKE :user_id";
                $param["user_id"]= $this->user_id;
            }
        }
        if(!empty($this->order_by)) {
            $query .= " ORDER BY ".$this->order_by;
        }
        if(!empty($this->MAX_ROWS)) {
            $query .= " LIMIT ".$this->FIRST_ROW.",".$this->MAX_ROWS;
        }
        try {
            $prepare = $pdo->prepare($query);
            if ($prepare->execute($param)===false) {
                error_log($prepare->errorCode() ." - ". var_export($prepare->errorInfo(),TRUE));
                return false;
            }
            $data = $prepare->fetchAll(PDO::FETCH_OBJ);
            if($obj !== true) {
                $arr=array();
                foreach ($data as $e) {
                    $arr[$e->id]=$e;
                }
                $data = "";
                return $arr;
            }
            return $data;
        } catch(PDOExecption $e) {
            error_log("Error!: " . $e->getMessage() . "</br>");
            return false;
        }
    }


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
