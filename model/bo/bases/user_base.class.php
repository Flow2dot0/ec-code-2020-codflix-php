<?php
class user_base {
  var $FIRST_ROW=0;
  var $MAX_ROWS=200;
  var $order_by;
  var $id;
  var $email;
  var $password;
  var $firstname;
  var $lastname;
  var $username;
  var $type;
  var $token_confirmation;
  var $status;

  function __construct() {
    $this->id = "";
    $this->email = "";
    $this->password = "";
    $this->firstname = "";
    $this->lastname = "";
    $this->username = "";
    $this->type = "";
    $this->token_confirmation = "";
    $this->status = "";
    $this->order_by = "";
  }

  function nbRows() {
    global $pdo;
    $param = array();
    $query = "SELECT count(*) as NB FROM `user` WHERE 0=0";
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
    if(!empty($this->email) || (isset($this->email) && $this->email === 0)) {
      $query .= " AND `email`";

      // different of
      if(substr($this->email, 1, 1) == "!") {
        // different of empty
        if($this->email == "!" || $this->email == "%!%") {
          $query .= " != '' && `email` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :email";
          $param["email"]= substr($this->email, 2);
        }
      // is empty
      } elseif(substr($this->email, 1, 1) == "=") {
        $query .= " = '' || `email` IS NULL";
      // like
      } else {
        $query .= " LIKE :email";
        $param["email"]= $this->email;
      }
    }
    if(!empty($this->password) || (isset($this->password) && $this->password === 0)) {
      $query .= " AND `password`";

      // different of
      if(substr($this->password, 1, 1) == "!") {
        // different of empty
        if($this->password == "!" || $this->password == "%!%") {
          $query .= " != '' && `password` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :password";
          $param["password"]= substr($this->password, 2);
        }
      // is empty
      } elseif(substr($this->password, 1, 1) == "=") {
        $query .= " = '' || `password` IS NULL";
      // like
      } else {
        $query .= " LIKE :password";
        $param["password"]= $this->password;
      }
    }
    if(!empty($this->firstname) || (isset($this->firstname) && $this->firstname === 0)) {
      $query .= " AND `firstname`";

      // different of
      if(substr($this->firstname, 1, 1) == "!") {
        // different of empty
        if($this->firstname == "!" || $this->firstname == "%!%") {
          $query .= " != '' && `firstname` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :firstname";
          $param["firstname"]= substr($this->firstname, 2);
        }
      // is empty
      } elseif(substr($this->firstname, 1, 1) == "=") {
        $query .= " = '' || `firstname` IS NULL";
      // like
      } else {
        $query .= " LIKE :firstname";
        $param["firstname"]= $this->firstname;
      }
    }
    if(!empty($this->lastname) || (isset($this->lastname) && $this->lastname === 0)) {
      $query .= " AND `lastname`";

      // different of
      if(substr($this->lastname, 1, 1) == "!") {
        // different of empty
        if($this->lastname == "!" || $this->lastname == "%!%") {
          $query .= " != '' && `lastname` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :lastname";
          $param["lastname"]= substr($this->lastname, 2);
        }
      // is empty
      } elseif(substr($this->lastname, 1, 1) == "=") {
        $query .= " = '' || `lastname` IS NULL";
      // like
      } else {
        $query .= " LIKE :lastname";
        $param["lastname"]= $this->lastname;
      }
    }
    if(!empty($this->username) || (isset($this->username) && $this->username === 0)) {
      $query .= " AND `username`";

      // different of
      if(substr($this->username, 1, 1) == "!") {
        // different of empty
        if($this->username == "!" || $this->username == "%!%") {
          $query .= " != '' && `username` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :username";
          $param["username"]= substr($this->username, 2);
        }
      // is empty
      } elseif(substr($this->username, 1, 1) == "=") {
        $query .= " = '' || `username` IS NULL";
      // like
      } else {
        $query .= " LIKE :username";
        $param["username"]= $this->username;
      }
    }
    if(!empty($this->type) || (isset($this->type) && $this->type === 0)) {
      $query .= " AND `type`";

      // different of
      if(substr($this->type, 1, 1) == "!") {
        // different of empty
        if($this->type == "!" || $this->type == "%!%") {
          $query .= " != '' && `type` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :type";
          $param["type"]= substr($this->type, 2);
        }
      // is empty
      } elseif(substr($this->type, 1, 1) == "=") {
        $query .= " = '' || `type` IS NULL";
      // like
      } else {
        $query .= " LIKE :type";
        $param["type"]= $this->type;
      }
    }
    if(!empty($this->token_confirmation) || (isset($this->token_confirmation) && $this->token_confirmation === 0)) {
      $query .= " AND `token_confirmation`";

      // different of
      if(substr($this->token_confirmation, 1, 1) == "!") {
        // different of empty
        if($this->token_confirmation == "!" || $this->token_confirmation == "%!%") {
          $query .= " != '' && `token_confirmation` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :token_confirmation";
          $param["token_confirmation"]= substr($this->token_confirmation, 2);
        }
      // is empty
      } elseif(substr($this->token_confirmation, 1, 1) == "=") {
        $query .= " = '' || `token_confirmation` IS NULL";
      // like
      } else {
        $query .= " LIKE :token_confirmation";
        $param["token_confirmation"]= $this->token_confirmation;
      }
    }
    if(!empty($this->status) || (isset($this->status) && $this->status === 0)) {
      $query .= " AND `status`";

      // different of
      if(substr($this->status, 1, 1) == "!") {
        // different of empty
        if($this->status == "!" || $this->status == "%!%") {
          $query .= " != '' && `status` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :status";
          $param["status"]= substr($this->status, 2);
        }
      // is empty
      } elseif(substr($this->status, 1, 1) == "=") {
        $query .= " = '' || `status` IS NULL";
      // like
      } else {
        $query .= " LIKE :status";
        $param["status"]= $this->status;
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
    $query  = "SELECT * FROM `user` WHERE 0=0";
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
    if(!empty($this->email) || (isset($this->email) && $this->email === 0)) {
      $query .= " AND `email`";

      // different of
      if(substr($this->email, 1, 1) == "!") {
        // different of empty
        if($this->email == "!" || $this->email == "%!%") {
          $query .= " != '' && `email` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :email";
          $param["email"]= substr($this->email, 2);
        }
      // is empty
      } elseif(substr($this->email, 1, 1) == "=") {
        $query .= " = '' || `email` IS NULL";
      // like
      } else {
        $query .= " LIKE :email";
        $param["email"]= $this->email;
      }
    }
    if(!empty($this->password) || (isset($this->password) && $this->password === 0)) {
      $query .= " AND `password`";

      // different of
      if(substr($this->password, 1, 1) == "!") {
        // different of empty
        if($this->password == "!" || $this->password == "%!%") {
          $query .= " != '' && `password` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :password";
          $param["password"]= substr($this->password, 2);
        }
      // is empty
      } elseif(substr($this->password, 1, 1) == "=") {
        $query .= " = '' || `password` IS NULL";
      // like
      } else {
        $query .= " LIKE :password";
        $param["password"]= $this->password;
      }
    }
    if(!empty($this->firstname) || (isset($this->firstname) && $this->firstname === 0)) {
      $query .= " AND `firstname`";

      // different of
      if(substr($this->firstname, 1, 1) == "!") {
        // different of empty
        if($this->firstname == "!" || $this->firstname == "%!%") {
          $query .= " != '' && `firstname` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :firstname";
          $param["firstname"]= substr($this->firstname, 2);
        }
      // is empty
      } elseif(substr($this->firstname, 1, 1) == "=") {
        $query .= " = '' || `firstname` IS NULL";
      // like
      } else {
        $query .= " LIKE :firstname";
        $param["firstname"]= $this->firstname;
      }
    }
    if(!empty($this->lastname) || (isset($this->lastname) && $this->lastname === 0)) {
      $query .= " AND `lastname`";

      // different of
      if(substr($this->lastname, 1, 1) == "!") {
        // different of empty
        if($this->lastname == "!" || $this->lastname == "%!%") {
          $query .= " != '' && `lastname` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :lastname";
          $param["lastname"]= substr($this->lastname, 2);
        }
      // is empty
      } elseif(substr($this->lastname, 1, 1) == "=") {
        $query .= " = '' || `lastname` IS NULL";
      // like
      } else {
        $query .= " LIKE :lastname";
        $param["lastname"]= $this->lastname;
      }
    }
    if(!empty($this->username) || (isset($this->username) && $this->username === 0)) {
      $query .= " AND `username`";

      // different of
      if(substr($this->username, 1, 1) == "!") {
        // different of empty
        if($this->username == "!" || $this->username == "%!%") {
          $query .= " != '' && `username` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :username";
          $param["username"]= substr($this->username, 2);
        }
      // is empty
      } elseif(substr($this->username, 1, 1) == "=") {
        $query .= " = '' || `username` IS NULL";
      // like
      } else {
        $query .= " LIKE :username";
        $param["username"]= $this->username;
      }
    }
    if(!empty($this->type) || (isset($this->type) && $this->type === 0)) {
      $query .= " AND `type`";

      // different of
      if(substr($this->type, 1, 1) == "!") {
        // different of empty
        if($this->type == "!" || $this->type == "%!%") {
          $query .= " != '' && `type` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :type";
          $param["type"]= substr($this->type, 2);
        }
      // is empty
      } elseif(substr($this->type, 1, 1) == "=") {
        $query .= " = '' || `type` IS NULL";
      // like
      } else {
        $query .= " LIKE :type";
        $param["type"]= $this->type;
      }
    }
    if(!empty($this->token_confirmation) || (isset($this->token_confirmation) && $this->token_confirmation === 0)) {
      $query .= " AND `token_confirmation`";

      // different of
      if(substr($this->token_confirmation, 1, 1) == "!") {
        // different of empty
        if($this->token_confirmation == "!" || $this->token_confirmation == "%!%") {
          $query .= " != '' && `token_confirmation` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :token_confirmation";
          $param["token_confirmation"]= substr($this->token_confirmation, 2);
        }
      // is empty
      } elseif(substr($this->token_confirmation, 1, 1) == "=") {
        $query .= " = '' || `token_confirmation` IS NULL";
      // like
      } else {
        $query .= " LIKE :token_confirmation";
        $param["token_confirmation"]= $this->token_confirmation;
      }
    }
    if(!empty($this->status) || (isset($this->status) && $this->status === 0)) {
      $query .= " AND `status`";

      // different of
      if(substr($this->status, 1, 1) == "!") {
        // different of empty
        if($this->status == "!" || $this->status == "%!%") {
          $query .= " != '' && `status` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :status";
          $param["status"]= substr($this->status, 2);
        }
      // is empty
      } elseif(substr($this->status, 1, 1) == "=") {
        $query .= " = '' || `status` IS NULL";
      // like
      } else {
        $query .= " LIKE :status";
        $param["status"]= $this->status;
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
    $query = "SELECT * FROM `user` WHERE id= :id";
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
    
  function insertRow($nolog = 0) {
    global $pdo;
    $param = array();
  
    // set date & user tracking  
    $this->created_on=date("Y-m-d H:i:s");
    if(!empty($_SESSION["ses_id"])) $this->created_by = $_SESSION["ses_id"];
    $this->updated_on = NULL;
    $this->updated_by = NULL;
  
    $query = "INSERT INTO `user` SET";
    $query .= " `email` = :email";
    $param["email"] = !empty($this->email) || $this->email != "" ? $this->email : NULL;
    $query .= ", `password` = :password";
    $param["password"] = !empty($this->password) || $this->password != "" ? $this->password : NULL;
    $query .= ", `firstname` = :firstname";
    $param["firstname"] = !empty($this->firstname) || $this->firstname != "" ? $this->firstname : NULL;
    $query .= ", `lastname` = :lastname";
    $param["lastname"] = !empty($this->lastname) || $this->lastname != "" ? $this->lastname : NULL;
    $query .= ", `username` = :username";
    $param["username"] = !empty($this->username) || $this->username != "" ? $this->username : NULL;
    $query .= ", `type` = :type";
    $param["type"] = !empty($this->type) || $this->type != "" ? $this->type : NULL;
    $query .= ", `token_confirmation` = :token_confirmation";
    $param["token_confirmation"] = !empty($this->token_confirmation) || $this->token_confirmation != "" ? $this->token_confirmation : NULL;
    $query .= ", `status` = :status";
    $param["status"] = !empty($this->status) || $this->status != "" ? $this->status : NULL;
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
  
    $query = "UPDATE `user` SET";
    $query .= " `email` = :email";
    $param["email"] = !empty($this->email) || $this->email != "" ? $this->email : NULL;
    $query .= ", `password` = :password";
    $param["password"] = !empty($this->password) || $this->password != "" ? $this->password : NULL;
    $query .= ", `firstname` = :firstname";
    $param["firstname"] = !empty($this->firstname) || $this->firstname != "" ? $this->firstname : NULL;
    $query .= ", `lastname` = :lastname";
    $param["lastname"] = !empty($this->lastname) || $this->lastname != "" ? $this->lastname : NULL;
    $query .= ", `username` = :username";
    $param["username"] = !empty($this->username) || $this->username != "" ? $this->username : NULL;
    $query .= ", `type` = :type";
    $param["type"] = !empty($this->type) || $this->type != "" ? $this->type : NULL;
    $query .= ", `token_confirmation` = :token_confirmation";
    $param["token_confirmation"] = !empty($this->token_confirmation) || $this->token_confirmation != "" ? $this->token_confirmation : NULL;
    $query .= ", `status` = :status";
    $param["status"] = !empty($this->status) || $this->status != "" ? $this->status : NULL;
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
        
      $query = "DELETE FROM `user` WHERE id= :id";
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