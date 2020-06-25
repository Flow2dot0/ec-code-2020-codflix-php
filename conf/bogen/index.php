<?php
/* DEBUG */
error_reporting(E_ALL);
ini_set('log_errors', '1'); 
ini_set('display_errors', 'On');
ini_set("error_log", "generate_bo.log");
$bypass_login =1;
require_once('../init.inc.php');
$pdo = connexion();
/*
// database connection
try {
  $pdo = new PDO('mysql:host=localhost;dbname=webdv', 'webdv', 'Ei9aAc!5$1', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(Exception $e) {
  echo 'Error while connecting to database';
  exit();
}
*/

// get tables list
$query = $pdo->prepare('SHOW TABLES');
$query->execute();
$tables_list = array();
while($rows = $query->fetch(PDO::FETCH_ASSOC)){
  foreach($rows as $k => $v) {  
    $tables_list[] = $v;
  }
}

// iterates tables
foreach($tables_list as $table_name) {

    // global parameters
    $MAX_ROWS = "200";

    // get columns list
    $query = $pdo->prepare('SHOW COLUMNS FROM `' . $table_name . '`');
    $query->execute();
    $table_fields = array();
    while ($rows = $query->fetch(PDO::FETCH_ASSOC)) {
        $table_fields[] = array("name" => $rows["Field"], "type" => $rows["Type"], "null" => $rows["Null"], "default" => $rows["Default"]);
    }

    // set additionals fields for search
    $table_additional_fields = array();
    foreach ($table_fields as $k => $v) {
        // date type
        if ($v["type"] == "date" || $v["type"] == "datetime") {
            $table_additional_fields[] = array("name" => $v["name"] . "__start", "fieldname" => $v["name"], "type" => $v["type"], "null" => $v['null'], "default" => $v["default"]);
            $table_additional_fields[] = array("name" => $v["name"] . "__end", "fieldname" => $v["name"], "type" => $v["type"], "null" => $v['null'], "default" => $v["default"]);
        }
    }

    /*
     * Starting class
     */
    $data = '<?php
class ' . $table_name . '_base {
  var $FIRST_ROW=0;
  var $MAX_ROWS=' . $MAX_ROWS . ';
  var $order_by;';

    // Iterate fields for declarations
    foreach ($table_fields as $k => $v) {
        $data .= '
  var $' . $v['name'] . ';';
    }

    // Iterate additionnal fields for declarations
    foreach ($table_additional_fields as $k => $v) {
        $data .= '
  var $' . $v['name'] . ';';
    }

    /*
     * Construct function
    */
    $data .= '

  function __construct() {';

    // iterate fields for construct
    foreach ($table_fields as $k => $v) {
        $data .= '
    $this->' . $v['name'] . ' = "";';
    }

    // end function
    $data .= '
    $this->order_by = "";
  }';


    /*
     * nbRows function
    */
    $data .= '

  function nbRows() {
    global $pdo;
    $param = array();
    $query = "SELECT count(*) as NB FROM `' . $table_name . '` WHERE 0=0";';

    // iterate fields
    foreach ($table_fields as $k => $v) {
        $data .= '
    if(!empty($this->' . $v['name'] . ') || (isset($this->' . $v['name'] . ') && $this->' . $v['name'] . ' === 0)) {
      $query .= " AND `' . $v['name'] . '`";

      // different of
      if(substr($this->' . $v['name'] . ', 1, 1) == "!") {
        // different of empty
        if($this->' . $v['name'] . ' == "!" || $this->' . $v['name'] . ' == "%!%") {
          $query .= " != \'\' && `' . $v['name'] . '` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :' . $v['name'] . '";
          $param["' . $v['name'] . '"]= substr($this->' . $v['name'] . ', 2);
        }
      // is empty
      } elseif(substr($this->' . $v['name'] . ', 1, 1) == "=") {
        $query .= " = \'\' || `' . $v['name'] . '` IS NULL";
      // like
      } else {
        $query .= " LIKE :' . $v['name'] . '";
        $param["' . $v['name'] . '"]= $this->' . $v['name'] . ';
      }
    }';
    }

    // iterate additional fields
    foreach ($table_additional_fields as $k => $v) {
        if ($v["type"] == "datetime" || $v["type"] == "date") {
            $data .= '
    if(!empty($this->' . $v['name'] . ') || (isset($this->' . $v['name'] . ') && $this->' . $v['name'] . ' === 0)) {
      $query .= " AND `' . $v['fieldname'] . '` ' . ((strpos($v["name"], "__start") !== false) ? '>=' : '<=') . ' :' . $v['name'] . '";
      $param["' . $v['name'] . '"]=$this->' . $v['name'] . ';
    }';
        }
    }

    // query DB & end function
    $data .= '
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
  }';


    /*
     * getData function
    */
    $data .= '

  function getData($obj = true) {
    global $pdo;
    $param=array();
    $query  = "SELECT * FROM `' . $table_name . '` WHERE 0=0";';

    // iterate fields
    foreach ($table_fields as $k => $v) {
        $data .= '
    if(!empty($this->' . $v['name'] . ') || (isset($this->' . $v['name'] . ') && $this->' . $v['name'] . ' === 0)) {
      $query .= " AND `' . $v['name'] . '`";

      // different of
      if(substr($this->' . $v['name'] . ', 1, 1) == "!") {
        // different of empty
        if($this->' . $v['name'] . ' == "!" || $this->' . $v['name'] . ' == "%!%") {
          $query .= " != \'\' && `' . $v['name'] . '` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :' . $v['name'] . '";
          $param["' . $v['name'] . '"]= substr($this->' . $v['name'] . ', 2);
        }
      // is empty
      } elseif(substr($this->' . $v['name'] . ', 1, 1) == "=") {
        $query .= " = \'\' || `' . $v['name'] . '` IS NULL";
      // like
      } else {
        $query .= " LIKE :' . $v['name'] . '";
        $param["' . $v['name'] . '"]= $this->' . $v['name'] . ';
      }
    }';
    }

    // iterate additional fields
    foreach ($table_additional_fields as $k => $v) {
        if ($v["type"] == "datetime" || $v["type"] == "date") {
            $data .= '
    if(!empty($this->' . $v['name'] . ') || (isset($this->' . $v['name'] . ') && $this->' . $v['name'] . ' === 0)) {
      $query .= " AND `' . $v['fieldname'] . '` ' . ((strpos($v["name"], "__start") !== false) ? '>=' : '<=') . ' :' . $v['name'] . '";
      $param["' . $v['name'] . '"]=$this->' . $v['name'] . ';
    }';
        }
    }

    // order & max_rows
    $data .= '
    if(!empty($this->order_by)) {
      $query .= " ORDER BY ".$this->order_by;
    } 
    if(!empty($this->MAX_ROWS)) {
      $query .= " LIMIT ".$this->FIRST_ROW.",".$this->MAX_ROWS;
    }';

    // query DB & end function
    $data .= '
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
  }';


    /*
     * getRow function
    */
    $data .= '
    
  function getRow($id) {
    global $pdo;
    $query = "SELECT * FROM `' . $table_name . '` WHERE id= :id";
    try {
      $prepare = $pdo->prepare($query);
      $prepare->bindValue("id", $id, PDO::PARAM_INT);
      if ($prepare->execute()===false) {
        error_log($prepare->errorCode() ." - ". var_export($prepare->errorInfo(),TRUE));
        return false;
      }
      $row = $prepare->fetch(PDO::FETCH_OBJ);
      if ($row) {';

    // iterate fields
    foreach ($table_fields as $k => $v) {
        $data .= '
        $this->' . $v['name'] . ' = $row->' . $v['name'] . ';';
    }

    // end function
    $data .= '
      }
    } catch(PDOExecption $e) {
      error_log("Error!: " . $e->getMessage() . "</br>");
      return false;
    }
  }';


    /*
     * insertRow function
    */
    $data .= '
    
  function insertRow($nolog = 0) {
    global $pdo;
    $param = array();
  
    // set date & user tracking  
    $this->created_on=date("Y-m-d H:i:s");
    if(!empty($_SESSION["ses_id"])) $this->created_by = $_SESSION["ses_id"];
    $this->updated_on = NULL;
    $this->updated_by = NULL;
  
    $query = "INSERT INTO `' . $table_name . '` SET";';

    // iterate fields
    $c = 0;
    foreach ($table_fields as $k => $v) {
        if ($v['name'] != 'id') { // don't insert id field, auto increment
            $comma = ($c > 0) ? ',' : '';
            $data .= '
    $query .= "' . $comma . ' `' . $v['name'] . '` = :' . $v['name'] . '";
    $param["' . $v['name'] . '"] = !empty($this->' . $v['name'] . ') || $this->' . $v['name'] . ' != "" ? $this->' . $v['name'] . ' : NULL;';
            $c++;
        }
    }

    // query DB & end function
    $data .= '
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
    ';

    // don't log logs.. :D
    if ($table_name != 'logs') {
        $data .= '
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
      ';
    }

    $data .= '
  }
  ';


    /*
     * updateRow function
    */
    $data .= '
    
  function updateRow($nolog = 0) {
    global $pdo;
    $param = array();
  
    // set date & user tracking  
    $this->updated_on = date("Y-m-d H:i:s");
    if(!empty($_SESSION["ses_id"])) $this->updated_by = $_SESSION["ses_id"];
  
    $query = "UPDATE `' . $table_name . '` SET";';

    // iterate fields
    $c = 0;
    foreach ($table_fields as $k => $v) {
        if ($v['name'] != 'id') { // don't update id field, it's primary key
            $comma = ($c > 0) ? ',' : '';
            $data .= '
    $query .= "' . $comma . ' `' . $v['name'] . '` = :' . $v['name'] . '";
    $param["' . $v['name'] . '"] = !empty($this->' . $v['name'] . ') || $this->' . $v['name'] . ' != "" ? $this->' . $v['name'] . ' : NULL;';
            $c++;
        }
    }

    // query DB & end function
    $data .= '
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
  ';

    // don't log logs.. :D
    if ($table_name != 'logs') {

        $data .= '
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
  ';

    }

    $data .= '
  }
  ';


    /*
     * deleteRow function
    */
    $data .= '
    
  function deleteRow() {
    global $pdo;
  
    if(!empty($this->id)) {
        
      $query = "DELETE FROM `' . $table_name . '` WHERE id= :id";
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
  ';

    // don't log logs.. :D
    if ($table_name != 'logs') {

        $data .= '
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
    ';
    }

    $data .= '
    }
  }
  ';


    /*
     * end of class
    */
    $data .= '
}';


    /*
     * write file
    */
    if (!is_dir("bo")) mkdir("bo");
    if (!is_dir("bo/bases")) mkdir("bo/bases");
    file_put_contents("bo/bases/" . $table_name . "_base.class.php", $data);

    /*
     * extended class if not exist
    */
    if (!is_file("bo/" . $table_name . ".class.php")) {
        $data = '<?php
require_once dirname(__FILE__).  "/bases/' . $table_name . '_base.class.php";

class ' . $table_name . ' extends ' . $table_name . '_base {
    
}';
        file_put_contents("bo/" . $table_name . ".class.php", $data);
    }
}