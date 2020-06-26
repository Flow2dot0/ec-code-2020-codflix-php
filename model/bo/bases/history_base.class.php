<?php
class history_base {
  var $FIRST_ROW=0;
  var $MAX_ROWS=200;
  var $order_by;
  var $id;
  var $user_id;
  var $media_id;
  var $start_date;
  var $finish_date;
  var $watch_duration;
  var $start_date__start;
  var $start_date__end;
  var $finish_date__start;
  var $finish_date__end;

  function __construct() {
    $this->id = "";
    $this->user_id = "";
    $this->media_id = "";
    $this->start_date = "";
    $this->finish_date = "";
    $this->watch_duration = "";
    $this->order_by = "";
  }

  function nbRows() {
    global $pdo;
    $param = array();
    $query = "SELECT count(*) as NB FROM `history` WHERE 0=0";
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
    try {
      $prepare = $pdo->prepare($query);
      if ($prepare->execute($param)===false) {
        error_log($prepare->errorCode() ." - ". var_export($prepare->errorInfo(),TRUE));
        return false;
      }
      $data = $prepare->fetch(PDO::FETCH_OBJ);
      return $data->NB;
    } catch(PDOExecption $e) {
      error_log("Error!: " . $e->getMessage() . "</br>");
      return false;
    }
  }

  function getData($obj = true) {
    global $pdo;
    $param=array();
    $query  = "SELECT * FROM `history` WHERE 0=0";
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
    
  function getRow($id) {
    global $pdo;
    $query = "SELECT * FROM `history` WHERE id= :id";
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
    
  function insertRow($nolog = 0) {
    global $pdo;
    $param = array();
  
    // set date & user tracking  
    $this->created_on=date("Y-m-d H:i:s");
    if(!empty($_SESSION["ses_id"])) $this->created_by = $_SESSION["ses_id"];
    $this->updated_on = NULL;
    $this->updated_by = NULL;
  
    $query = "INSERT INTO `history` SET";
    $query .= " `user_id` = :user_id";
    $param["user_id"] = !empty($this->user_id) || $this->user_id != "" ? $this->user_id : NULL;
    $query .= ", `media_id` = :media_id";
    $param["media_id"] = !empty($this->media_id) || $this->media_id != "" ? $this->media_id : NULL;
    $query .= ", `start_date` = :start_date";
    $param["start_date"] = !empty($this->start_date) || $this->start_date != "" ? $this->start_date : NULL;
    $query .= ", `finish_date` = :finish_date";
    $param["finish_date"] = !empty($this->finish_date) || $this->finish_date != "" ? $this->finish_date : NULL;
    $query .= ", `watch_duration` = :watch_duration";
    $param["watch_duration"] = !empty($this->watch_duration) || $this->watch_duration != "" ? $this->watch_duration : NULL;
    try {
      $prepare = $pdo->prepare($query);
      $pdo->beginTransaction();
      if ($prepare->execute($param)===false) {
        $pdo->rollback();
        error_log($prepare->errorCode() ." - ". var_export($prepare->errorInfo(),TRUE));
        return false;
      }
      $this->id=$pdo->lastInsertId();
      $pdo->commit();
    } catch(PDOExecption $e) {
      $pdo->rollback();
      error_log("Error!: " . $e->getMessage() . "</br>");
      return false;
    }
    
    if(empty($nolog)) {
      
      // require logs class
      require_once(dirname(__FILE__) . "/../logs.class.php");
    
      // this class name
      $this_class = get_class($this);

      // add to logs
      $logs = new logs();
      if(!empty($_SESSION["ses_id"])) $logs->id_utilisateur = $_SESSION["ses_id"];
      $logs->url = !empty($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : NULL;
      $logs->logdate = date("Y-m-d H:i:s");
      $logs->category = $this_class;
      $logs->source = "insertRow";
      $logs->table_ref = $this_class;
      $logs->id_ref = $this->id;    
      $logs->post_data = json_encode($this);
      $logs->action = "insert";
      $logs->ip = !empty($_SERVER["REMOTE_ADDR"]) ? $_SERVER["REMOTE_ADDR"] : NULL;
      $logs->insertRow();
    }
      
  }
  
    
  function updateRow($nolog = 0) {
    global $pdo;
    $param = array();
  
    // set date & user tracking  
    $this->updated_on = date("Y-m-d H:i:s");
    if(!empty($_SESSION["ses_id"])) $this->updated_by = $_SESSION["ses_id"];
  
    $query = "UPDATE `history` SET";
    $query .= " `user_id` = :user_id";
    $param["user_id"] = !empty($this->user_id) || $this->user_id != "" ? $this->user_id : NULL;
    $query .= ", `media_id` = :media_id";
    $param["media_id"] = !empty($this->media_id) || $this->media_id != "" ? $this->media_id : NULL;
    $query .= ", `start_date` = :start_date";
    $param["start_date"] = !empty($this->start_date) || $this->start_date != "" ? $this->start_date : NULL;
    $query .= ", `finish_date` = :finish_date";
    $param["finish_date"] = !empty($this->finish_date) || $this->finish_date != "" ? $this->finish_date : NULL;
    $query .= ", `watch_duration` = :watch_duration";
    $param["watch_duration"] = !empty($this->watch_duration) || $this->watch_duration != "" ? $this->watch_duration : NULL;
    $query .= " WHERE `id` = :id"; 
    $param["id"] = $this->id;
    try {
      $prepare = $pdo->prepare($query);
      if ($prepare->execute($param)===false) {
        error_log($prepare->errorCode() ." - ". var_export($prepare->errorInfo(),TRUE));
        return false;
      }
    } catch(PDOExecption $e) {
      error_log("Error!: " . $e->getMessage() . "</br>");
      return false;
    }
  
    if(empty($nolog)) {

      // require logs class
      require_once(dirname(__FILE__) . "/../logs.class.php");
      
      // this class name
      $this_class = get_class($this);
      
      // object to backup
      $sav = new $this_class();
      $sav->getRow($this->id);
        
      // looking for differences and backup it
      $sav_diff = array();
      $this_diff = array();
      foreach($this as $k => $v) {
        if($sav->$k != $v) {
          $sav_diff[$k] = $sav->$k;
          $this_diff[$k] = $v;
        }
      }
      
      // add to logs
      $logs = new logs();
      if(!empty($_SESSION["ses_id"])) $logs->id_user = $_SESSION["ses_id"];
      $logs->url = !empty($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : "";
      $logs->logdate = date("Y-m-d H:i:s");
      $logs->category = $this_class;
      $logs->source = "updateRow";
      $logs->table_ref = $this_class;
      $logs->id_ref = $this->id;
      $logs->post_data = json_encode($this_diff);
      $logs->data_deleted = json_encode($sav_diff);
      $logs->action = "update";
      $logs->ip = !empty($_SERVER["REMOTE_ADDR"]) ? $_SERVER["REMOTE_ADDR"] : NULL;
      $logs->insertRow();  
    }
  
  }
  
    
  function deleteRow() {
    global $pdo;
  
    if(!empty($this->id)) {
        
      $query = "DELETE FROM `history` WHERE id= :id";
      try {
        $prepare = $pdo->prepare($query);
        $prepare->bindValue("id", $this->id, PDO::PARAM_INT);
        if ($prepare->execute()===false) {
          error_log($prepare->errorCode() ." - ". var_export($prepare->errorInfo(),TRUE));
          return false;
        }
      } catch(PDOExecption $e) {
        error_log("Error!: " . $e->getMessage() . "</br>");
        return false;
      }
  
      // require logs class
      require_once(dirname(__FILE__) . "/../logs.class.php");
      
      // this class name
      $this_class = get_class($this);
      
      // object to backup
      $sav = new $this_class();
      $sav->getRow($this->id);
      
      // add to logs
      $logs = new logs();
      if(!empty($_SESSION["ses_id"])) $logs->id_user = $_SESSION["ses_id"];
      $logs->url = !empty($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : "";
      $logs->logdate = date("Y-m-d H:i:s");
      $logs->category = $this_class;
      $logs->source = "deleteRow";
      $logs->table_ref = $this_class;
      $logs->id_ref = $this->id;
      $logs->data_deleted = json_encode($sav);
      $logs->action = "delete";
      $logs->ip = !empty($_SERVER["REMOTE_ADDR"]) ? $_SERVER["REMOTE_ADDR"] : NULL;
      $logs->insertRow();  
    
    }
  }
  
}