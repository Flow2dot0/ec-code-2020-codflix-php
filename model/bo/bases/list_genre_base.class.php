<?php
class list_genre_base {
  var $FIRST_ROW=0;
  var $MAX_ROWS=200;
  var $order_by;
  var $id;
  var $first;
  var $second;
  var $third;
  var $fourth;
  var $fifth;

  function __construct() {
    $this->id = "";
    $this->first = "";
    $this->second = "";
    $this->third = "";
    $this->fourth = "";
    $this->fifth = "";
    $this->order_by = "";
  }

  function nbRows() {
    global $pdo;
    $param = array();
    $query = "SELECT count(*) as NB FROM `list_genre` WHERE 0=0";
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
    if(!empty($this->first) || (isset($this->first) && $this->first === 0)) {
      $query .= " AND `first`";

      // different of
      if(substr($this->first, 1, 1) == "!") {
        // different of empty
        if($this->first == "!" || $this->first == "%!%") {
          $query .= " != '' && `first` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :first";
          $param["first"]= substr($this->first, 2);
        }
      // is empty
      } elseif(substr($this->first, 1, 1) == "=") {
        $query .= " = '' || `first` IS NULL";
      // like
      } else {
        $query .= " LIKE :first";
        $param["first"]= $this->first;
      }
    }
    if(!empty($this->second) || (isset($this->second) && $this->second === 0)) {
      $query .= " AND `second`";

      // different of
      if(substr($this->second, 1, 1) == "!") {
        // different of empty
        if($this->second == "!" || $this->second == "%!%") {
          $query .= " != '' && `second` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :second";
          $param["second"]= substr($this->second, 2);
        }
      // is empty
      } elseif(substr($this->second, 1, 1) == "=") {
        $query .= " = '' || `second` IS NULL";
      // like
      } else {
        $query .= " LIKE :second";
        $param["second"]= $this->second;
      }
    }
    if(!empty($this->third) || (isset($this->third) && $this->third === 0)) {
      $query .= " AND `third`";

      // different of
      if(substr($this->third, 1, 1) == "!") {
        // different of empty
        if($this->third == "!" || $this->third == "%!%") {
          $query .= " != '' && `third` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :third";
          $param["third"]= substr($this->third, 2);
        }
      // is empty
      } elseif(substr($this->third, 1, 1) == "=") {
        $query .= " = '' || `third` IS NULL";
      // like
      } else {
        $query .= " LIKE :third";
        $param["third"]= $this->third;
      }
    }
    if(!empty($this->fourth) || (isset($this->fourth) && $this->fourth === 0)) {
      $query .= " AND `fourth`";

      // different of
      if(substr($this->fourth, 1, 1) == "!") {
        // different of empty
        if($this->fourth == "!" || $this->fourth == "%!%") {
          $query .= " != '' && `fourth` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :fourth";
          $param["fourth"]= substr($this->fourth, 2);
        }
      // is empty
      } elseif(substr($this->fourth, 1, 1) == "=") {
        $query .= " = '' || `fourth` IS NULL";
      // like
      } else {
        $query .= " LIKE :fourth";
        $param["fourth"]= $this->fourth;
      }
    }
    if(!empty($this->fifth) || (isset($this->fifth) && $this->fifth === 0)) {
      $query .= " AND `fifth`";

      // different of
      if(substr($this->fifth, 1, 1) == "!") {
        // different of empty
        if($this->fifth == "!" || $this->fifth == "%!%") {
          $query .= " != '' && `fifth` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :fifth";
          $param["fifth"]= substr($this->fifth, 2);
        }
      // is empty
      } elseif(substr($this->fifth, 1, 1) == "=") {
        $query .= " = '' || `fifth` IS NULL";
      // like
      } else {
        $query .= " LIKE :fifth";
        $param["fifth"]= $this->fifth;
      }
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
    $query  = "SELECT * FROM `list_genre` WHERE 0=0";
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
    if(!empty($this->first) || (isset($this->first) && $this->first === 0)) {
      $query .= " AND `first`";

      // different of
      if(substr($this->first, 1, 1) == "!") {
        // different of empty
        if($this->first == "!" || $this->first == "%!%") {
          $query .= " != '' && `first` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :first";
          $param["first"]= substr($this->first, 2);
        }
      // is empty
      } elseif(substr($this->first, 1, 1) == "=") {
        $query .= " = '' || `first` IS NULL";
      // like
      } else {
        $query .= " LIKE :first";
        $param["first"]= $this->first;
      }
    }
    if(!empty($this->second) || (isset($this->second) && $this->second === 0)) {
      $query .= " AND `second`";

      // different of
      if(substr($this->second, 1, 1) == "!") {
        // different of empty
        if($this->second == "!" || $this->second == "%!%") {
          $query .= " != '' && `second` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :second";
          $param["second"]= substr($this->second, 2);
        }
      // is empty
      } elseif(substr($this->second, 1, 1) == "=") {
        $query .= " = '' || `second` IS NULL";
      // like
      } else {
        $query .= " LIKE :second";
        $param["second"]= $this->second;
      }
    }
    if(!empty($this->third) || (isset($this->third) && $this->third === 0)) {
      $query .= " AND `third`";

      // different of
      if(substr($this->third, 1, 1) == "!") {
        // different of empty
        if($this->third == "!" || $this->third == "%!%") {
          $query .= " != '' && `third` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :third";
          $param["third"]= substr($this->third, 2);
        }
      // is empty
      } elseif(substr($this->third, 1, 1) == "=") {
        $query .= " = '' || `third` IS NULL";
      // like
      } else {
        $query .= " LIKE :third";
        $param["third"]= $this->third;
      }
    }
    if(!empty($this->fourth) || (isset($this->fourth) && $this->fourth === 0)) {
      $query .= " AND `fourth`";

      // different of
      if(substr($this->fourth, 1, 1) == "!") {
        // different of empty
        if($this->fourth == "!" || $this->fourth == "%!%") {
          $query .= " != '' && `fourth` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :fourth";
          $param["fourth"]= substr($this->fourth, 2);
        }
      // is empty
      } elseif(substr($this->fourth, 1, 1) == "=") {
        $query .= " = '' || `fourth` IS NULL";
      // like
      } else {
        $query .= " LIKE :fourth";
        $param["fourth"]= $this->fourth;
      }
    }
    if(!empty($this->fifth) || (isset($this->fifth) && $this->fifth === 0)) {
      $query .= " AND `fifth`";

      // different of
      if(substr($this->fifth, 1, 1) == "!") {
        // different of empty
        if($this->fifth == "!" || $this->fifth == "%!%") {
          $query .= " != '' && `fifth` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :fifth";
          $param["fifth"]= substr($this->fifth, 2);
        }
      // is empty
      } elseif(substr($this->fifth, 1, 1) == "=") {
        $query .= " = '' || `fifth` IS NULL";
      // like
      } else {
        $query .= " LIKE :fifth";
        $param["fifth"]= $this->fifth;
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
    
  function getRow($id) {
    global $pdo;
    $query = "SELECT * FROM `list_genre` WHERE id= :id";
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
        $this->first = $row->first;
        $this->second = $row->second;
        $this->third = $row->third;
        $this->fourth = $row->fourth;
        $this->fifth = $row->fifth;
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
  
    $query = "INSERT INTO `list_genre` SET";
    $query .= " `first` = :first";
    $param["first"] = !empty($this->first) || $this->first != "" ? $this->first : NULL;
    $query .= ", `second` = :second";
    $param["second"] = !empty($this->second) || $this->second != "" ? $this->second : NULL;
    $query .= ", `third` = :third";
    $param["third"] = !empty($this->third) || $this->third != "" ? $this->third : NULL;
    $query .= ", `fourth` = :fourth";
    $param["fourth"] = !empty($this->fourth) || $this->fourth != "" ? $this->fourth : NULL;
    $query .= ", `fifth` = :fifth";
    $param["fifth"] = !empty($this->fifth) || $this->fifth != "" ? $this->fifth : NULL;
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
  
    $query = "UPDATE `list_genre` SET";
    $query .= " `first` = :first";
    $param["first"] = !empty($this->first) || $this->first != "" ? $this->first : NULL;
    $query .= ", `second` = :second";
    $param["second"] = !empty($this->second) || $this->second != "" ? $this->second : NULL;
    $query .= ", `third` = :third";
    $param["third"] = !empty($this->third) || $this->third != "" ? $this->third : NULL;
    $query .= ", `fourth` = :fourth";
    $param["fourth"] = !empty($this->fourth) || $this->fourth != "" ? $this->fourth : NULL;
    $query .= ", `fifth` = :fifth";
    $param["fifth"] = !empty($this->fifth) || $this->fifth != "" ? $this->fifth : NULL;
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
        
      $query = "DELETE FROM `list_genre` WHERE id= :id";
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