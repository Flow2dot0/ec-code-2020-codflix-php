<?php
class genre_base {
  var $FIRST_ROW=0;
  var $MAX_ROWS=200;
  var $order_by;
  var $id;
  var $name;

  function __construct() {
    $this->id = "";
    $this->name = "";
    $this->order_by = "";
  }

  function nbRows() {
    global $pdo;
    $param = array();
    $query = "SELECT count(*) as NB FROM `genre` WHERE 0=0";
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
    if(!empty($this->name) || (isset($this->name) && $this->name === 0)) {
      $query .= " AND `name`";

      // different of
      if(substr($this->name, 1, 1) == "!") {
        // different of empty
        if($this->name == "!" || $this->name == "%!%") {
          $query .= " != '' && `name` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :name";
          $param["name"]= substr($this->name, 2);
        }
      // is empty
      } elseif(substr($this->name, 1, 1) == "=") {
        $query .= " = '' || `name` IS NULL";
      // like
      } else {
        $query .= " LIKE :name";
        $param["name"]= $this->name;
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
    $query  = "SELECT * FROM `genre` WHERE 0=0";
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
    if(!empty($this->name) || (isset($this->name) && $this->name === 0)) {
      $query .= " AND `name`";

      // different of
      if(substr($this->name, 1, 1) == "!") {
        // different of empty
        if($this->name == "!" || $this->name == "%!%") {
          $query .= " != '' && `name` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :name";
          $param["name"]= substr($this->name, 2);
        }
      // is empty
      } elseif(substr($this->name, 1, 1) == "=") {
        $query .= " = '' || `name` IS NULL";
      // like
      } else {
        $query .= " LIKE :name";
        $param["name"]= $this->name;
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
    $query = "SELECT * FROM `genre` WHERE id= :id";
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
        $this->name = $row->name;
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
  
    $query = "INSERT INTO `genre` SET";
    $query .= " `name` = :name";
    $param["name"] = !empty($this->name) || $this->name != "" ? $this->name : NULL;
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
      require_once(dirname(__FILE__).  "/../logs.class.php");
    
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
  
    $query = "UPDATE `genre` SET";
    $query .= " `name` = :name";
    $param["name"] = !empty($this->name) || $this->name != "" ? $this->name : NULL;
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
      require_once(dirname(__FILE__).  "/../logs.class.php");
      
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
        
      $query = "DELETE FROM `genre` WHERE id= :id";
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
      require_once(dirname(__FILE__).  "/../logs.class.php");
      
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