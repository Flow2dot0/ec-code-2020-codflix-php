<?php
class logs_base {
  var $FIRST_ROW=0;
  var $MAX_ROWS=200;
  var $order_by;
  var $id;
  var $id_users;
  var $url;
  var $logdate;
  var $post_data;
  var $get_data;
  var $category;
  var $page;
  var $table_ref;
  var $id_ref;
  var $data_deleted;
  var $action;
  var $ip;
  var $logdate__start;
  var $logdate__end;

  function __construct() {
    $this->id = "";
    $this->id_users = "";
    $this->url = "";
    $this->logdate = "";
    $this->post_data = "";
    $this->get_data = "";
    $this->category = "";
    $this->page = "";
    $this->table_ref = "";
    $this->id_ref = "";
    $this->data_deleted = "";
    $this->action = "";
    $this->ip = "";
    $this->order_by = "";
  }

  function nbRows() {
    global $pdo;
    $param = array();
    $query = "SELECT count(*) as NB FROM `logs` WHERE 0=0";
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
    if(!empty($this->id_users) || (isset($this->id_users) && $this->id_users === 0)) {
      $query .= " AND `id_users`";

      // different of
      if(substr($this->id_users, 1, 1) == "!") {
        // different of empty
        if($this->id_users == "!" || $this->id_users == "%!%") {
          $query .= " != '' && `id_users` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :id_users";
          $param["id_users"]= substr($this->id_users, 2);
        }
      // is empty
      } elseif(substr($this->id_users, 1, 1) == "=") {
        $query .= " = '' || `id_users` IS NULL";
      // like
      } else {
        $query .= " LIKE :id_users";
        $param["id_users"]= $this->id_users;
      }
    }
    if(!empty($this->url) || (isset($this->url) && $this->url === 0)) {
      $query .= " AND `url`";

      // different of
      if(substr($this->url, 1, 1) == "!") {
        // different of empty
        if($this->url == "!" || $this->url == "%!%") {
          $query .= " != '' && `url` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :url";
          $param["url"]= substr($this->url, 2);
        }
      // is empty
      } elseif(substr($this->url, 1, 1) == "=") {
        $query .= " = '' || `url` IS NULL";
      // like
      } else {
        $query .= " LIKE :url";
        $param["url"]= $this->url;
      }
    }
    if(!empty($this->logdate) || (isset($this->logdate) && $this->logdate === 0)) {
      $query .= " AND `logdate`";

      // different of
      if(substr($this->logdate, 1, 1) == "!") {
        // different of empty
        if($this->logdate == "!" || $this->logdate == "%!%") {
          $query .= " != '' && `logdate` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :logdate";
          $param["logdate"]= substr($this->logdate, 2);
        }
      // is empty
      } elseif(substr($this->logdate, 1, 1) == "=") {
        $query .= " = '' || `logdate` IS NULL";
      // like
      } else {
        $query .= " LIKE :logdate";
        $param["logdate"]= $this->logdate;
      }
    }
    if(!empty($this->post_data) || (isset($this->post_data) && $this->post_data === 0)) {
      $query .= " AND `post_data`";

      // different of
      if(substr($this->post_data, 1, 1) == "!") {
        // different of empty
        if($this->post_data == "!" || $this->post_data == "%!%") {
          $query .= " != '' && `post_data` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :post_data";
          $param["post_data"]= substr($this->post_data, 2);
        }
      // is empty
      } elseif(substr($this->post_data, 1, 1) == "=") {
        $query .= " = '' || `post_data` IS NULL";
      // like
      } else {
        $query .= " LIKE :post_data";
        $param["post_data"]= $this->post_data;
      }
    }
    if(!empty($this->get_data) || (isset($this->get_data) && $this->get_data === 0)) {
      $query .= " AND `get_data`";

      // different of
      if(substr($this->get_data, 1, 1) == "!") {
        // different of empty
        if($this->get_data == "!" || $this->get_data == "%!%") {
          $query .= " != '' && `get_data` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :get_data";
          $param["get_data"]= substr($this->get_data, 2);
        }
      // is empty
      } elseif(substr($this->get_data, 1, 1) == "=") {
        $query .= " = '' || `get_data` IS NULL";
      // like
      } else {
        $query .= " LIKE :get_data";
        $param["get_data"]= $this->get_data;
      }
    }
    if(!empty($this->category) || (isset($this->category) && $this->category === 0)) {
      $query .= " AND `category`";

      // different of
      if(substr($this->category, 1, 1) == "!") {
        // different of empty
        if($this->category == "!" || $this->category == "%!%") {
          $query .= " != '' && `category` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :category";
          $param["category"]= substr($this->category, 2);
        }
      // is empty
      } elseif(substr($this->category, 1, 1) == "=") {
        $query .= " = '' || `category` IS NULL";
      // like
      } else {
        $query .= " LIKE :category";
        $param["category"]= $this->category;
      }
    }
    if(!empty($this->page) || (isset($this->page) && $this->page === 0)) {
      $query .= " AND `page`";

      // different of
      if(substr($this->page, 1, 1) == "!") {
        // different of empty
        if($this->page == "!" || $this->page == "%!%") {
          $query .= " != '' && `page` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :page";
          $param["page"]= substr($this->page, 2);
        }
      // is empty
      } elseif(substr($this->page, 1, 1) == "=") {
        $query .= " = '' || `page` IS NULL";
      // like
      } else {
        $query .= " LIKE :page";
        $param["page"]= $this->page;
      }
    }
    if(!empty($this->table_ref) || (isset($this->table_ref) && $this->table_ref === 0)) {
      $query .= " AND `table_ref`";

      // different of
      if(substr($this->table_ref, 1, 1) == "!") {
        // different of empty
        if($this->table_ref == "!" || $this->table_ref == "%!%") {
          $query .= " != '' && `table_ref` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :table_ref";
          $param["table_ref"]= substr($this->table_ref, 2);
        }
      // is empty
      } elseif(substr($this->table_ref, 1, 1) == "=") {
        $query .= " = '' || `table_ref` IS NULL";
      // like
      } else {
        $query .= " LIKE :table_ref";
        $param["table_ref"]= $this->table_ref;
      }
    }
    if(!empty($this->id_ref) || (isset($this->id_ref) && $this->id_ref === 0)) {
      $query .= " AND `id_ref`";

      // different of
      if(substr($this->id_ref, 1, 1) == "!") {
        // different of empty
        if($this->id_ref == "!" || $this->id_ref == "%!%") {
          $query .= " != '' && `id_ref` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :id_ref";
          $param["id_ref"]= substr($this->id_ref, 2);
        }
      // is empty
      } elseif(substr($this->id_ref, 1, 1) == "=") {
        $query .= " = '' || `id_ref` IS NULL";
      // like
      } else {
        $query .= " LIKE :id_ref";
        $param["id_ref"]= $this->id_ref;
      }
    }
    if(!empty($this->data_deleted) || (isset($this->data_deleted) && $this->data_deleted === 0)) {
      $query .= " AND `data_deleted`";

      // different of
      if(substr($this->data_deleted, 1, 1) == "!") {
        // different of empty
        if($this->data_deleted == "!" || $this->data_deleted == "%!%") {
          $query .= " != '' && `data_deleted` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :data_deleted";
          $param["data_deleted"]= substr($this->data_deleted, 2);
        }
      // is empty
      } elseif(substr($this->data_deleted, 1, 1) == "=") {
        $query .= " = '' || `data_deleted` IS NULL";
      // like
      } else {
        $query .= " LIKE :data_deleted";
        $param["data_deleted"]= $this->data_deleted;
      }
    }
    if(!empty($this->action) || (isset($this->action) && $this->action === 0)) {
      $query .= " AND `action`";

      // different of
      if(substr($this->action, 1, 1) == "!") {
        // different of empty
        if($this->action == "!" || $this->action == "%!%") {
          $query .= " != '' && `action` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :action";
          $param["action"]= substr($this->action, 2);
        }
      // is empty
      } elseif(substr($this->action, 1, 1) == "=") {
        $query .= " = '' || `action` IS NULL";
      // like
      } else {
        $query .= " LIKE :action";
        $param["action"]= $this->action;
      }
    }
    if(!empty($this->ip) || (isset($this->ip) && $this->ip === 0)) {
      $query .= " AND `ip`";

      // different of
      if(substr($this->ip, 1, 1) == "!") {
        // different of empty
        if($this->ip == "!" || $this->ip == "%!%") {
          $query .= " != '' && `ip` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :ip";
          $param["ip"]= substr($this->ip, 2);
        }
      // is empty
      } elseif(substr($this->ip, 1, 1) == "=") {
        $query .= " = '' || `ip` IS NULL";
      // like
      } else {
        $query .= " LIKE :ip";
        $param["ip"]= $this->ip;
      }
    }
    if(!empty($this->logdate__start) || (isset($this->logdate__start) && $this->logdate__start === 0)) {
      $query .= " AND `logdate` >= :logdate__start";
      $param["logdate__start"]=$this->logdate__start;
    }
    if(!empty($this->logdate__end) || (isset($this->logdate__end) && $this->logdate__end === 0)) {
      $query .= " AND `logdate` <= :logdate__end";
      $param["logdate__end"]=$this->logdate__end;
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
    $query  = "SELECT * FROM `logs` WHERE 0=0";
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
    if(!empty($this->id_users) || (isset($this->id_users) && $this->id_users === 0)) {
      $query .= " AND `id_users`";

      // different of
      if(substr($this->id_users, 1, 1) == "!") {
        // different of empty
        if($this->id_users == "!" || $this->id_users == "%!%") {
          $query .= " != '' && `id_users` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :id_users";
          $param["id_users"]= substr($this->id_users, 2);
        }
      // is empty
      } elseif(substr($this->id_users, 1, 1) == "=") {
        $query .= " = '' || `id_users` IS NULL";
      // like
      } else {
        $query .= " LIKE :id_users";
        $param["id_users"]= $this->id_users;
      }
    }
    if(!empty($this->url) || (isset($this->url) && $this->url === 0)) {
      $query .= " AND `url`";

      // different of
      if(substr($this->url, 1, 1) == "!") {
        // different of empty
        if($this->url == "!" || $this->url == "%!%") {
          $query .= " != '' && `url` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :url";
          $param["url"]= substr($this->url, 2);
        }
      // is empty
      } elseif(substr($this->url, 1, 1) == "=") {
        $query .= " = '' || `url` IS NULL";
      // like
      } else {
        $query .= " LIKE :url";
        $param["url"]= $this->url;
      }
    }
    if(!empty($this->logdate) || (isset($this->logdate) && $this->logdate === 0)) {
      $query .= " AND `logdate`";

      // different of
      if(substr($this->logdate, 1, 1) == "!") {
        // different of empty
        if($this->logdate == "!" || $this->logdate == "%!%") {
          $query .= " != '' && `logdate` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :logdate";
          $param["logdate"]= substr($this->logdate, 2);
        }
      // is empty
      } elseif(substr($this->logdate, 1, 1) == "=") {
        $query .= " = '' || `logdate` IS NULL";
      // like
      } else {
        $query .= " LIKE :logdate";
        $param["logdate"]= $this->logdate;
      }
    }
    if(!empty($this->post_data) || (isset($this->post_data) && $this->post_data === 0)) {
      $query .= " AND `post_data`";

      // different of
      if(substr($this->post_data, 1, 1) == "!") {
        // different of empty
        if($this->post_data == "!" || $this->post_data == "%!%") {
          $query .= " != '' && `post_data` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :post_data";
          $param["post_data"]= substr($this->post_data, 2);
        }
      // is empty
      } elseif(substr($this->post_data, 1, 1) == "=") {
        $query .= " = '' || `post_data` IS NULL";
      // like
      } else {
        $query .= " LIKE :post_data";
        $param["post_data"]= $this->post_data;
      }
    }
    if(!empty($this->get_data) || (isset($this->get_data) && $this->get_data === 0)) {
      $query .= " AND `get_data`";

      // different of
      if(substr($this->get_data, 1, 1) == "!") {
        // different of empty
        if($this->get_data == "!" || $this->get_data == "%!%") {
          $query .= " != '' && `get_data` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :get_data";
          $param["get_data"]= substr($this->get_data, 2);
        }
      // is empty
      } elseif(substr($this->get_data, 1, 1) == "=") {
        $query .= " = '' || `get_data` IS NULL";
      // like
      } else {
        $query .= " LIKE :get_data";
        $param["get_data"]= $this->get_data;
      }
    }
    if(!empty($this->category) || (isset($this->category) && $this->category === 0)) {
      $query .= " AND `category`";

      // different of
      if(substr($this->category, 1, 1) == "!") {
        // different of empty
        if($this->category == "!" || $this->category == "%!%") {
          $query .= " != '' && `category` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :category";
          $param["category"]= substr($this->category, 2);
        }
      // is empty
      } elseif(substr($this->category, 1, 1) == "=") {
        $query .= " = '' || `category` IS NULL";
      // like
      } else {
        $query .= " LIKE :category";
        $param["category"]= $this->category;
      }
    }
    if(!empty($this->page) || (isset($this->page) && $this->page === 0)) {
      $query .= " AND `page`";

      // different of
      if(substr($this->page, 1, 1) == "!") {
        // different of empty
        if($this->page == "!" || $this->page == "%!%") {
          $query .= " != '' && `page` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :page";
          $param["page"]= substr($this->page, 2);
        }
      // is empty
      } elseif(substr($this->page, 1, 1) == "=") {
        $query .= " = '' || `page` IS NULL";
      // like
      } else {
        $query .= " LIKE :page";
        $param["page"]= $this->page;
      }
    }
    if(!empty($this->table_ref) || (isset($this->table_ref) && $this->table_ref === 0)) {
      $query .= " AND `table_ref`";

      // different of
      if(substr($this->table_ref, 1, 1) == "!") {
        // different of empty
        if($this->table_ref == "!" || $this->table_ref == "%!%") {
          $query .= " != '' && `table_ref` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :table_ref";
          $param["table_ref"]= substr($this->table_ref, 2);
        }
      // is empty
      } elseif(substr($this->table_ref, 1, 1) == "=") {
        $query .= " = '' || `table_ref` IS NULL";
      // like
      } else {
        $query .= " LIKE :table_ref";
        $param["table_ref"]= $this->table_ref;
      }
    }
    if(!empty($this->id_ref) || (isset($this->id_ref) && $this->id_ref === 0)) {
      $query .= " AND `id_ref`";

      // different of
      if(substr($this->id_ref, 1, 1) == "!") {
        // different of empty
        if($this->id_ref == "!" || $this->id_ref == "%!%") {
          $query .= " != '' && `id_ref` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :id_ref";
          $param["id_ref"]= substr($this->id_ref, 2);
        }
      // is empty
      } elseif(substr($this->id_ref, 1, 1) == "=") {
        $query .= " = '' || `id_ref` IS NULL";
      // like
      } else {
        $query .= " LIKE :id_ref";
        $param["id_ref"]= $this->id_ref;
      }
    }
    if(!empty($this->data_deleted) || (isset($this->data_deleted) && $this->data_deleted === 0)) {
      $query .= " AND `data_deleted`";

      // different of
      if(substr($this->data_deleted, 1, 1) == "!") {
        // different of empty
        if($this->data_deleted == "!" || $this->data_deleted == "%!%") {
          $query .= " != '' && `data_deleted` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :data_deleted";
          $param["data_deleted"]= substr($this->data_deleted, 2);
        }
      // is empty
      } elseif(substr($this->data_deleted, 1, 1) == "=") {
        $query .= " = '' || `data_deleted` IS NULL";
      // like
      } else {
        $query .= " LIKE :data_deleted";
        $param["data_deleted"]= $this->data_deleted;
      }
    }
    if(!empty($this->action) || (isset($this->action) && $this->action === 0)) {
      $query .= " AND `action`";

      // different of
      if(substr($this->action, 1, 1) == "!") {
        // different of empty
        if($this->action == "!" || $this->action == "%!%") {
          $query .= " != '' && `action` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :action";
          $param["action"]= substr($this->action, 2);
        }
      // is empty
      } elseif(substr($this->action, 1, 1) == "=") {
        $query .= " = '' || `action` IS NULL";
      // like
      } else {
        $query .= " LIKE :action";
        $param["action"]= $this->action;
      }
    }
    if(!empty($this->ip) || (isset($this->ip) && $this->ip === 0)) {
      $query .= " AND `ip`";

      // different of
      if(substr($this->ip, 1, 1) == "!") {
        // different of empty
        if($this->ip == "!" || $this->ip == "%!%") {
          $query .= " != '' && `ip` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :ip";
          $param["ip"]= substr($this->ip, 2);
        }
      // is empty
      } elseif(substr($this->ip, 1, 1) == "=") {
        $query .= " = '' || `ip` IS NULL";
      // like
      } else {
        $query .= " LIKE :ip";
        $param["ip"]= $this->ip;
      }
    }
    if(!empty($this->logdate__start) || (isset($this->logdate__start) && $this->logdate__start === 0)) {
      $query .= " AND `logdate` >= :logdate__start";
      $param["logdate__start"]=$this->logdate__start;
    }
    if(!empty($this->logdate__end) || (isset($this->logdate__end) && $this->logdate__end === 0)) {
      $query .= " AND `logdate` <= :logdate__end";
      $param["logdate__end"]=$this->logdate__end;
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
    $query = "SELECT * FROM `logs` WHERE id= :id";
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
        $this->id_users = $row->id_users;
        $this->url = $row->url;
        $this->logdate = $row->logdate;
        $this->post_data = $row->post_data;
        $this->get_data = $row->get_data;
        $this->category = $row->category;
        $this->page = $row->page;
        $this->table_ref = $row->table_ref;
        $this->id_ref = $row->id_ref;
        $this->data_deleted = $row->data_deleted;
        $this->action = $row->action;
        $this->ip = $row->ip;
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
  
    $query = "INSERT INTO `logs` SET";
    $query .= " `id_users` = :id_users";
    $param["id_users"] = !empty($this->id_users) || $this->id_users != "" ? $this->id_users : NULL;
    $query .= ", `url` = :url";
    $param["url"] = !empty($this->url) || $this->url != "" ? $this->url : NULL;
    $query .= ", `logdate` = :logdate";
    $param["logdate"] = !empty($this->logdate) || $this->logdate != "" ? $this->logdate : NULL;
    $query .= ", `post_data` = :post_data";
    $param["post_data"] = !empty($this->post_data) || $this->post_data != "" ? $this->post_data : NULL;
    $query .= ", `get_data` = :get_data";
    $param["get_data"] = !empty($this->get_data) || $this->get_data != "" ? $this->get_data : NULL;
    $query .= ", `category` = :category";
    $param["category"] = !empty($this->category) || $this->category != "" ? $this->category : NULL;
    $query .= ", `page` = :page";
    $param["page"] = !empty($this->page) || $this->page != "" ? $this->page : NULL;
    $query .= ", `table_ref` = :table_ref";
    $param["table_ref"] = !empty($this->table_ref) || $this->table_ref != "" ? $this->table_ref : NULL;
    $query .= ", `id_ref` = :id_ref";
    $param["id_ref"] = !empty($this->id_ref) || $this->id_ref != "" ? $this->id_ref : NULL;
    $query .= ", `data_deleted` = :data_deleted";
    $param["data_deleted"] = !empty($this->data_deleted) || $this->data_deleted != "" ? $this->data_deleted : NULL;
    $query .= ", `action` = :action";
    $param["action"] = !empty($this->action) || $this->action != "" ? $this->action : NULL;
    $query .= ", `ip` = :ip";
    $param["ip"] = !empty($this->ip) || $this->ip != "" ? $this->ip : NULL;
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
    
  }
  
    
  function updateRow($nolog = 0) {
    global $pdo;
    $param = array();
  
    // set date & user tracking  
    $this->updated_on = date("Y-m-d H:i:s");
    if(!empty($_SESSION["ses_id"])) $this->updated_by = $_SESSION["ses_id"];
  
    $query = "UPDATE `logs` SET";
    $query .= " `id_users` = :id_users";
    $param["id_users"] = !empty($this->id_users) || $this->id_users != "" ? $this->id_users : NULL;
    $query .= ", `url` = :url";
    $param["url"] = !empty($this->url) || $this->url != "" ? $this->url : NULL;
    $query .= ", `logdate` = :logdate";
    $param["logdate"] = !empty($this->logdate) || $this->logdate != "" ? $this->logdate : NULL;
    $query .= ", `post_data` = :post_data";
    $param["post_data"] = !empty($this->post_data) || $this->post_data != "" ? $this->post_data : NULL;
    $query .= ", `get_data` = :get_data";
    $param["get_data"] = !empty($this->get_data) || $this->get_data != "" ? $this->get_data : NULL;
    $query .= ", `category` = :category";
    $param["category"] = !empty($this->category) || $this->category != "" ? $this->category : NULL;
    $query .= ", `page` = :page";
    $param["page"] = !empty($this->page) || $this->page != "" ? $this->page : NULL;
    $query .= ", `table_ref` = :table_ref";
    $param["table_ref"] = !empty($this->table_ref) || $this->table_ref != "" ? $this->table_ref : NULL;
    $query .= ", `id_ref` = :id_ref";
    $param["id_ref"] = !empty($this->id_ref) || $this->id_ref != "" ? $this->id_ref : NULL;
    $query .= ", `data_deleted` = :data_deleted";
    $param["data_deleted"] = !empty($this->data_deleted) || $this->data_deleted != "" ? $this->data_deleted : NULL;
    $query .= ", `action` = :action";
    $param["action"] = !empty($this->action) || $this->action != "" ? $this->action : NULL;
    $query .= ", `ip` = :ip";
    $param["ip"] = !empty($this->ip) || $this->ip != "" ? $this->ip : NULL;
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
  
  }
  
    
  function deleteRow() {
    global $pdo;
  
    if(!empty($this->id)) {
        
      $query = "DELETE FROM `logs` WHERE id= :id";
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
  
    }
  }
  
}