<?php
require_once dirname(__FILE__) . "/bases/history_base.class.php";

class history extends history_base {
    function getDataByID(int $id, $obj = true) {
        global $pdo;
        $param=array();
        $query  = "SELECT * FROM `history` WHERE user_id=".$id;
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
        if(!empty($this->start_date) || (isset($this->start_date) && $this->start_date === 0)) {
            $query .= " AND `start_date`";

            // different of
            if(substr($this->start_date, 1, 1) == "!") {
                // different of empty
                if($this->start_date == "!" || $this->start_date == "%!%") {
                    $query .= " != '' && `start_date` IS NOT NULL";
                    // different of value
                } else {
                    $query .= " NOT LIKE :start_date";
                    $param["start_date"]= substr($this->start_date, 2);
                }
                // is empty
            } elseif(substr($this->start_date, 1, 1) == "=") {
                $query .= " = '' || `start_date` IS NULL";
                // like
            } else {
                $query .= " LIKE :start_date";
                $param["start_date"]= $this->start_date;
            }
        }
        if(!empty($this->finish_date) || (isset($this->finish_date) && $this->finish_date === 0)) {
            $query .= " AND `finish_date`";

            // different of
            if(substr($this->finish_date, 1, 1) == "!") {
                // different of empty
                if($this->finish_date == "!" || $this->finish_date == "%!%") {
                    $query .= " != '' && `finish_date` IS NOT NULL";
                    // different of value
                } else {
                    $query .= " NOT LIKE :finish_date";
                    $param["finish_date"]= substr($this->finish_date, 2);
                }
                // is empty
            } elseif(substr($this->finish_date, 1, 1) == "=") {
                $query .= " = '' || `finish_date` IS NULL";
                // like
            } else {
                $query .= " LIKE :finish_date";
                $param["finish_date"]= $this->finish_date;
            }
        }
        if(!empty($this->watch_duration) || (isset($this->watch_duration) && $this->watch_duration === 0)) {
            $query .= " AND `watch_duration`";

            // different of
            if(substr($this->watch_duration, 1, 1) == "!") {
                // different of empty
                if($this->watch_duration == "!" || $this->watch_duration == "%!%") {
                    $query .= " != '' && `watch_duration` IS NOT NULL";
                    // different of value
                } else {
                    $query .= " NOT LIKE :watch_duration";
                    $param["watch_duration"]= substr($this->watch_duration, 2);
                }
                // is empty
            } elseif(substr($this->watch_duration, 1, 1) == "=") {
                $query .= " = '' || `watch_duration` IS NULL";
                // like
            } else {
                $query .= " LIKE :watch_duration";
                $param["watch_duration"]= $this->watch_duration;
            }
        }
        if(!empty($this->start_date__start) || (isset($this->start_date__start) && $this->start_date__start === 0)) {
            $query .= " AND `start_date` >= :start_date__start";
            $param["start_date__start"]=$this->start_date__start;
        }
        if(!empty($this->start_date__end) || (isset($this->start_date__end) && $this->start_date__end === 0)) {
            $query .= " AND `start_date` <= :start_date__end";
            $param["start_date__end"]=$this->start_date__end;
        }
        if(!empty($this->finish_date__start) || (isset($this->finish_date__start) && $this->finish_date__start === 0)) {
            $query .= " AND `finish_date` >= :finish_date__start";
            $param["finish_date__start"]=$this->finish_date__start;
        }
        if(!empty($this->finish_date__end) || (isset($this->finish_date__end) && $this->finish_date__end === 0)) {
            $query .= " AND `finish_date` <= :finish_date__end";
            $param["finish_date__end"]=$this->finish_date__end;
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

    function getRowExists(int $user_id, int $media_id) {
        global $pdo;
        $query = "SELECT * FROM `history` WHERE user_id= :user_id AND media_id= :media_id";
        try {
            $prepare = $pdo->prepare($query);
            $prepare->bindValue("user_id", $user_id, PDO::PARAM_INT);
            $prepare->bindValue("media_id", $media_id, PDO::PARAM_INT);
            if ($prepare->execute()===false) {
                error_log($prepare->errorCode() ." - ". var_export($prepare->errorInfo(),TRUE));
                return false;
            }
            $row = $prepare->fetch(PDO::FETCH_OBJ);
            if ($row) {
                $this->id = $row->id;
                $this->user_id = $row->user_id;
                $this->media_id = $row->media_id;
                $this->start_date = $row->start_date;
                $this->finish_date = $row->finish_date;
                $this->watch_duration = $row->watch_duration;
            }
        } catch(PDOExecption $e) {
            error_log("Error!: " . $e->getMessage() . "</br>");
            return false;
        }
    }
}