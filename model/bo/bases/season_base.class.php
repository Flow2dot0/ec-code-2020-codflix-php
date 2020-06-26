<?php
class season_base {
  var $FIRST_ROW=0;
  var $MAX_ROWS=200;
  var $order_by;
  var $id;
  var $media_id;
  var $total_season;
  var $s1;
  var $s2;
  var $s3;
  var $s4;
  var $s5;
  var $s6;
  var $s7;
  var $s8;
  var $s9;
  var $s10;

  function __construct() {
    $this->id = "";
    $this->media_id = "";
    $this->total_season = "";
    $this->s1 = "";
    $this->s2 = "";
    $this->s3 = "";
    $this->s4 = "";
    $this->s5 = "";
    $this->s6 = "";
    $this->s7 = "";
    $this->s8 = "";
    $this->s9 = "";
    $this->s10 = "";
    $this->order_by = "";
  }

  function nbRows() {
    global $pdo;
    $param = array();
    $query = "SELECT count(*) as NB FROM `season` WHERE 0=0";
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
    if(!empty($this->total_season) || (isset($this->total_season) && $this->total_season === 0)) {
      $query .= " AND `total_season`";

      // different of
      if(substr($this->total_season, 1, 1) == "!") {
        // different of empty
        if($this->total_season == "!" || $this->total_season == "%!%") {
          $query .= " != '' && `total_season` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :total_season";
          $param["total_season"]= substr($this->total_season, 2);
        }
      // is empty
      } elseif(substr($this->total_season, 1, 1) == "=") {
        $query .= " = '' || `total_season` IS NULL";
      // like
      } else {
        $query .= " LIKE :total_season";
        $param["total_season"]= $this->total_season;
      }
    }
    if(!empty($this->s1) || (isset($this->s1) && $this->s1 === 0)) {
      $query .= " AND `s1`";

      // different of
      if(substr($this->s1, 1, 1) == "!") {
        // different of empty
        if($this->s1 == "!" || $this->s1 == "%!%") {
          $query .= " != '' && `s1` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :s1";
          $param["s1"]= substr($this->s1, 2);
        }
      // is empty
      } elseif(substr($this->s1, 1, 1) == "=") {
        $query .= " = '' || `s1` IS NULL";
      // like
      } else {
        $query .= " LIKE :s1";
        $param["s1"]= $this->s1;
      }
    }
    if(!empty($this->s2) || (isset($this->s2) && $this->s2 === 0)) {
      $query .= " AND `s2`";

      // different of
      if(substr($this->s2, 1, 1) == "!") {
        // different of empty
        if($this->s2 == "!" || $this->s2 == "%!%") {
          $query .= " != '' && `s2` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :s2";
          $param["s2"]= substr($this->s2, 2);
        }
      // is empty
      } elseif(substr($this->s2, 1, 1) == "=") {
        $query .= " = '' || `s2` IS NULL";
      // like
      } else {
        $query .= " LIKE :s2";
        $param["s2"]= $this->s2;
      }
    }
    if(!empty($this->s3) || (isset($this->s3) && $this->s3 === 0)) {
      $query .= " AND `s3`";

      // different of
      if(substr($this->s3, 1, 1) == "!") {
        // different of empty
        if($this->s3 == "!" || $this->s3 == "%!%") {
          $query .= " != '' && `s3` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :s3";
          $param["s3"]= substr($this->s3, 2);
        }
      // is empty
      } elseif(substr($this->s3, 1, 1) == "=") {
        $query .= " = '' || `s3` IS NULL";
      // like
      } else {
        $query .= " LIKE :s3";
        $param["s3"]= $this->s3;
      }
    }
    if(!empty($this->s4) || (isset($this->s4) && $this->s4 === 0)) {
      $query .= " AND `s4`";

      // different of
      if(substr($this->s4, 1, 1) == "!") {
        // different of empty
        if($this->s4 == "!" || $this->s4 == "%!%") {
          $query .= " != '' && `s4` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :s4";
          $param["s4"]= substr($this->s4, 2);
        }
      // is empty
      } elseif(substr($this->s4, 1, 1) == "=") {
        $query .= " = '' || `s4` IS NULL";
      // like
      } else {
        $query .= " LIKE :s4";
        $param["s4"]= $this->s4;
      }
    }
    if(!empty($this->s5) || (isset($this->s5) && $this->s5 === 0)) {
      $query .= " AND `s5`";

      // different of
      if(substr($this->s5, 1, 1) == "!") {
        // different of empty
        if($this->s5 == "!" || $this->s5 == "%!%") {
          $query .= " != '' && `s5` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :s5";
          $param["s5"]= substr($this->s5, 2);
        }
      // is empty
      } elseif(substr($this->s5, 1, 1) == "=") {
        $query .= " = '' || `s5` IS NULL";
      // like
      } else {
        $query .= " LIKE :s5";
        $param["s5"]= $this->s5;
      }
    }
    if(!empty($this->s6) || (isset($this->s6) && $this->s6 === 0)) {
      $query .= " AND `s6`";

      // different of
      if(substr($this->s6, 1, 1) == "!") {
        // different of empty
        if($this->s6 == "!" || $this->s6 == "%!%") {
          $query .= " != '' && `s6` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :s6";
          $param["s6"]= substr($this->s6, 2);
        }
      // is empty
      } elseif(substr($this->s6, 1, 1) == "=") {
        $query .= " = '' || `s6` IS NULL";
      // like
      } else {
        $query .= " LIKE :s6";
        $param["s6"]= $this->s6;
      }
    }
    if(!empty($this->s7) || (isset($this->s7) && $this->s7 === 0)) {
      $query .= " AND `s7`";

      // different of
      if(substr($this->s7, 1, 1) == "!") {
        // different of empty
        if($this->s7 == "!" || $this->s7 == "%!%") {
          $query .= " != '' && `s7` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :s7";
          $param["s7"]= substr($this->s7, 2);
        }
      // is empty
      } elseif(substr($this->s7, 1, 1) == "=") {
        $query .= " = '' || `s7` IS NULL";
      // like
      } else {
        $query .= " LIKE :s7";
        $param["s7"]= $this->s7;
      }
    }
    if(!empty($this->s8) || (isset($this->s8) && $this->s8 === 0)) {
      $query .= " AND `s8`";

      // different of
      if(substr($this->s8, 1, 1) == "!") {
        // different of empty
        if($this->s8 == "!" || $this->s8 == "%!%") {
          $query .= " != '' && `s8` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :s8";
          $param["s8"]= substr($this->s8, 2);
        }
      // is empty
      } elseif(substr($this->s8, 1, 1) == "=") {
        $query .= " = '' || `s8` IS NULL";
      // like
      } else {
        $query .= " LIKE :s8";
        $param["s8"]= $this->s8;
      }
    }
    if(!empty($this->s9) || (isset($this->s9) && $this->s9 === 0)) {
      $query .= " AND `s9`";

      // different of
      if(substr($this->s9, 1, 1) == "!") {
        // different of empty
        if($this->s9 == "!" || $this->s9 == "%!%") {
          $query .= " != '' && `s9` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :s9";
          $param["s9"]= substr($this->s9, 2);
        }
      // is empty
      } elseif(substr($this->s9, 1, 1) == "=") {
        $query .= " = '' || `s9` IS NULL";
      // like
      } else {
        $query .= " LIKE :s9";
        $param["s9"]= $this->s9;
      }
    }
    if(!empty($this->s10) || (isset($this->s10) && $this->s10 === 0)) {
      $query .= " AND `s10`";

      // different of
      if(substr($this->s10, 1, 1) == "!") {
        // different of empty
        if($this->s10 == "!" || $this->s10 == "%!%") {
          $query .= " != '' && `s10` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :s10";
          $param["s10"]= substr($this->s10, 2);
        }
      // is empty
      } elseif(substr($this->s10, 1, 1) == "=") {
        $query .= " = '' || `s10` IS NULL";
      // like
      } else {
        $query .= " LIKE :s10";
        $param["s10"]= $this->s10;
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
    $query  = "SELECT * FROM `season` WHERE 0=0";
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
    if(!empty($this->total_season) || (isset($this->total_season) && $this->total_season === 0)) {
      $query .= " AND `total_season`";

      // different of
      if(substr($this->total_season, 1, 1) == "!") {
        // different of empty
        if($this->total_season == "!" || $this->total_season == "%!%") {
          $query .= " != '' && `total_season` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :total_season";
          $param["total_season"]= substr($this->total_season, 2);
        }
      // is empty
      } elseif(substr($this->total_season, 1, 1) == "=") {
        $query .= " = '' || `total_season` IS NULL";
      // like
      } else {
        $query .= " LIKE :total_season";
        $param["total_season"]= $this->total_season;
      }
    }
    if(!empty($this->s1) || (isset($this->s1) && $this->s1 === 0)) {
      $query .= " AND `s1`";

      // different of
      if(substr($this->s1, 1, 1) == "!") {
        // different of empty
        if($this->s1 == "!" || $this->s1 == "%!%") {
          $query .= " != '' && `s1` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :s1";
          $param["s1"]= substr($this->s1, 2);
        }
      // is empty
      } elseif(substr($this->s1, 1, 1) == "=") {
        $query .= " = '' || `s1` IS NULL";
      // like
      } else {
        $query .= " LIKE :s1";
        $param["s1"]= $this->s1;
      }
    }
    if(!empty($this->s2) || (isset($this->s2) && $this->s2 === 0)) {
      $query .= " AND `s2`";

      // different of
      if(substr($this->s2, 1, 1) == "!") {
        // different of empty
        if($this->s2 == "!" || $this->s2 == "%!%") {
          $query .= " != '' && `s2` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :s2";
          $param["s2"]= substr($this->s2, 2);
        }
      // is empty
      } elseif(substr($this->s2, 1, 1) == "=") {
        $query .= " = '' || `s2` IS NULL";
      // like
      } else {
        $query .= " LIKE :s2";
        $param["s2"]= $this->s2;
      }
    }
    if(!empty($this->s3) || (isset($this->s3) && $this->s3 === 0)) {
      $query .= " AND `s3`";

      // different of
      if(substr($this->s3, 1, 1) == "!") {
        // different of empty
        if($this->s3 == "!" || $this->s3 == "%!%") {
          $query .= " != '' && `s3` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :s3";
          $param["s3"]= substr($this->s3, 2);
        }
      // is empty
      } elseif(substr($this->s3, 1, 1) == "=") {
        $query .= " = '' || `s3` IS NULL";
      // like
      } else {
        $query .= " LIKE :s3";
        $param["s3"]= $this->s3;
      }
    }
    if(!empty($this->s4) || (isset($this->s4) && $this->s4 === 0)) {
      $query .= " AND `s4`";

      // different of
      if(substr($this->s4, 1, 1) == "!") {
        // different of empty
        if($this->s4 == "!" || $this->s4 == "%!%") {
          $query .= " != '' && `s4` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :s4";
          $param["s4"]= substr($this->s4, 2);
        }
      // is empty
      } elseif(substr($this->s4, 1, 1) == "=") {
        $query .= " = '' || `s4` IS NULL";
      // like
      } else {
        $query .= " LIKE :s4";
        $param["s4"]= $this->s4;
      }
    }
    if(!empty($this->s5) || (isset($this->s5) && $this->s5 === 0)) {
      $query .= " AND `s5`";

      // different of
      if(substr($this->s5, 1, 1) == "!") {
        // different of empty
        if($this->s5 == "!" || $this->s5 == "%!%") {
          $query .= " != '' && `s5` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :s5";
          $param["s5"]= substr($this->s5, 2);
        }
      // is empty
      } elseif(substr($this->s5, 1, 1) == "=") {
        $query .= " = '' || `s5` IS NULL";
      // like
      } else {
        $query .= " LIKE :s5";
        $param["s5"]= $this->s5;
      }
    }
    if(!empty($this->s6) || (isset($this->s6) && $this->s6 === 0)) {
      $query .= " AND `s6`";

      // different of
      if(substr($this->s6, 1, 1) == "!") {
        // different of empty
        if($this->s6 == "!" || $this->s6 == "%!%") {
          $query .= " != '' && `s6` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :s6";
          $param["s6"]= substr($this->s6, 2);
        }
      // is empty
      } elseif(substr($this->s6, 1, 1) == "=") {
        $query .= " = '' || `s6` IS NULL";
      // like
      } else {
        $query .= " LIKE :s6";
        $param["s6"]= $this->s6;
      }
    }
    if(!empty($this->s7) || (isset($this->s7) && $this->s7 === 0)) {
      $query .= " AND `s7`";

      // different of
      if(substr($this->s7, 1, 1) == "!") {
        // different of empty
        if($this->s7 == "!" || $this->s7 == "%!%") {
          $query .= " != '' && `s7` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :s7";
          $param["s7"]= substr($this->s7, 2);
        }
      // is empty
      } elseif(substr($this->s7, 1, 1) == "=") {
        $query .= " = '' || `s7` IS NULL";
      // like
      } else {
        $query .= " LIKE :s7";
        $param["s7"]= $this->s7;
      }
    }
    if(!empty($this->s8) || (isset($this->s8) && $this->s8 === 0)) {
      $query .= " AND `s8`";

      // different of
      if(substr($this->s8, 1, 1) == "!") {
        // different of empty
        if($this->s8 == "!" || $this->s8 == "%!%") {
          $query .= " != '' && `s8` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :s8";
          $param["s8"]= substr($this->s8, 2);
        }
      // is empty
      } elseif(substr($this->s8, 1, 1) == "=") {
        $query .= " = '' || `s8` IS NULL";
      // like
      } else {
        $query .= " LIKE :s8";
        $param["s8"]= $this->s8;
      }
    }
    if(!empty($this->s9) || (isset($this->s9) && $this->s9 === 0)) {
      $query .= " AND `s9`";

      // different of
      if(substr($this->s9, 1, 1) == "!") {
        // different of empty
        if($this->s9 == "!" || $this->s9 == "%!%") {
          $query .= " != '' && `s9` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :s9";
          $param["s9"]= substr($this->s9, 2);
        }
      // is empty
      } elseif(substr($this->s9, 1, 1) == "=") {
        $query .= " = '' || `s9` IS NULL";
      // like
      } else {
        $query .= " LIKE :s9";
        $param["s9"]= $this->s9;
      }
    }
    if(!empty($this->s10) || (isset($this->s10) && $this->s10 === 0)) {
      $query .= " AND `s10`";

      // different of
      if(substr($this->s10, 1, 1) == "!") {
        // different of empty
        if($this->s10 == "!" || $this->s10 == "%!%") {
          $query .= " != '' && `s10` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :s10";
          $param["s10"]= substr($this->s10, 2);
        }
      // is empty
      } elseif(substr($this->s10, 1, 1) == "=") {
        $query .= " = '' || `s10` IS NULL";
      // like
      } else {
        $query .= " LIKE :s10";
        $param["s10"]= $this->s10;
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
    $query = "SELECT * FROM `season` WHERE id= :id";
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
    
  function insertRow($nolog = 0) {
    global $pdo;
    $param = array();
  
    // set date & user tracking  
    $this->created_on=date("Y-m-d H:i:s");
    if(!empty($_SESSION["ses_id"])) $this->created_by = $_SESSION["ses_id"];
    $this->updated_on = NULL;
    $this->updated_by = NULL;
  
    $query = "INSERT INTO `season` SET";
    $query .= " `media_id` = :media_id";
    $param["media_id"] = !empty($this->media_id) || $this->media_id != "" ? $this->media_id : NULL;
    $query .= ", `total_season` = :total_season";
    $param["total_season"] = !empty($this->total_season) || $this->total_season != "" ? $this->total_season : NULL;
    $query .= ", `s1` = :s1";
    $param["s1"] = !empty($this->s1) || $this->s1 != "" ? $this->s1 : NULL;
    $query .= ", `s2` = :s2";
    $param["s2"] = !empty($this->s2) || $this->s2 != "" ? $this->s2 : NULL;
    $query .= ", `s3` = :s3";
    $param["s3"] = !empty($this->s3) || $this->s3 != "" ? $this->s3 : NULL;
    $query .= ", `s4` = :s4";
    $param["s4"] = !empty($this->s4) || $this->s4 != "" ? $this->s4 : NULL;
    $query .= ", `s5` = :s5";
    $param["s5"] = !empty($this->s5) || $this->s5 != "" ? $this->s5 : NULL;
    $query .= ", `s6` = :s6";
    $param["s6"] = !empty($this->s6) || $this->s6 != "" ? $this->s6 : NULL;
    $query .= ", `s7` = :s7";
    $param["s7"] = !empty($this->s7) || $this->s7 != "" ? $this->s7 : NULL;
    $query .= ", `s8` = :s8";
    $param["s8"] = !empty($this->s8) || $this->s8 != "" ? $this->s8 : NULL;
    $query .= ", `s9` = :s9";
    $param["s9"] = !empty($this->s9) || $this->s9 != "" ? $this->s9 : NULL;
    $query .= ", `s10` = :s10";
    $param["s10"] = !empty($this->s10) || $this->s10 != "" ? $this->s10 : NULL;
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
  
    $query = "UPDATE `season` SET";
    $query .= " `media_id` = :media_id";
    $param["media_id"] = !empty($this->media_id) || $this->media_id != "" ? $this->media_id : NULL;
    $query .= ", `total_season` = :total_season";
    $param["total_season"] = !empty($this->total_season) || $this->total_season != "" ? $this->total_season : NULL;
    $query .= ", `s1` = :s1";
    $param["s1"] = !empty($this->s1) || $this->s1 != "" ? $this->s1 : NULL;
    $query .= ", `s2` = :s2";
    $param["s2"] = !empty($this->s2) || $this->s2 != "" ? $this->s2 : NULL;
    $query .= ", `s3` = :s3";
    $param["s3"] = !empty($this->s3) || $this->s3 != "" ? $this->s3 : NULL;
    $query .= ", `s4` = :s4";
    $param["s4"] = !empty($this->s4) || $this->s4 != "" ? $this->s4 : NULL;
    $query .= ", `s5` = :s5";
    $param["s5"] = !empty($this->s5) || $this->s5 != "" ? $this->s5 : NULL;
    $query .= ", `s6` = :s6";
    $param["s6"] = !empty($this->s6) || $this->s6 != "" ? $this->s6 : NULL;
    $query .= ", `s7` = :s7";
    $param["s7"] = !empty($this->s7) || $this->s7 != "" ? $this->s7 : NULL;
    $query .= ", `s8` = :s8";
    $param["s8"] = !empty($this->s8) || $this->s8 != "" ? $this->s8 : NULL;
    $query .= ", `s9` = :s9";
    $param["s9"] = !empty($this->s9) || $this->s9 != "" ? $this->s9 : NULL;
    $query .= ", `s10` = :s10";
    $param["s10"] = !empty($this->s10) || $this->s10 != "" ? $this->s10 : NULL;
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
        
      $query = "DELETE FROM `season` WHERE id= :id";
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