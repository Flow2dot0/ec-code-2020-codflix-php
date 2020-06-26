<?php
class media_base {
  var $FIRST_ROW=0;
  var $MAX_ROWS=200;
  var $order_by;
  var $id;
  var $list_genre_id;
  var $api_id;
  var $title;
  var $description;
  var $popularity;
  var $vote_count;
  var $poster_path;
  var $backdrop_path;
  var $vote_average;
  var $duration;
  var $type;
  var $release_date;
  var $summary;
  var $trailer_url;
  var $release_date__start;
  var $release_date__end;

  function __construct() {
    $this->id = "";
    $this->list_genre_id = "";
    $this->api_id = "";
    $this->title = "";
    $this->description = "";
    $this->popularity = "";
    $this->vote_count = "";
    $this->poster_path = "";
    $this->backdrop_path = "";
    $this->vote_average = "";
    $this->duration = "";
    $this->type = "";
    $this->release_date = "";
    $this->summary = "";
    $this->trailer_url = "";
    $this->order_by = "";
  }

  function nbRows() {
    global $pdo;
    $param = array();
    $query = "SELECT count(*) as NB FROM `media` WHERE 0=0";
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
    if(!empty($this->list_genre_id) || (isset($this->list_genre_id) && $this->list_genre_id === 0)) {
      $query .= " AND `list_genre_id`";

      // different of
      if(substr($this->list_genre_id, 1, 1) == "!") {
        // different of empty
        if($this->list_genre_id == "!" || $this->list_genre_id == "%!%") {
          $query .= " != '' && `list_genre_id` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :list_genre_id";
          $param["list_genre_id"]= substr($this->list_genre_id, 2);
        }
      // is empty
      } elseif(substr($this->list_genre_id, 1, 1) == "=") {
        $query .= " = '' || `list_genre_id` IS NULL";
      // like
      } else {
        $query .= " LIKE :list_genre_id";
        $param["list_genre_id"]= $this->list_genre_id;
      }
    }
    if(!empty($this->api_id) || (isset($this->api_id) && $this->api_id === 0)) {
      $query .= " AND `api_id`";

      // different of
      if(substr($this->api_id, 1, 1) == "!") {
        // different of empty
        if($this->api_id == "!" || $this->api_id == "%!%") {
          $query .= " != '' && `api_id` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :api_id";
          $param["api_id"]= substr($this->api_id, 2);
        }
      // is empty
      } elseif(substr($this->api_id, 1, 1) == "=") {
        $query .= " = '' || `api_id` IS NULL";
      // like
      } else {
        $query .= " LIKE :api_id";
        $param["api_id"]= $this->api_id;
      }
    }
    if(!empty($this->title) || (isset($this->title) && $this->title === 0)) {
      $query .= " AND `title`";

      // different of
      if(substr($this->title, 1, 1) == "!") {
        // different of empty
        if($this->title == "!" || $this->title == "%!%") {
          $query .= " != '' && `title` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :title";
          $param["title"]= substr($this->title, 2);
        }
      // is empty
      } elseif(substr($this->title, 1, 1) == "=") {
        $query .= " = '' || `title` IS NULL";
      // like
      } else {
        $query .= " LIKE :title";
        $param["title"]= $this->title;
      }
    }
    if(!empty($this->description) || (isset($this->description) && $this->description === 0)) {
      $query .= " AND `description`";

      // different of
      if(substr($this->description, 1, 1) == "!") {
        // different of empty
        if($this->description == "!" || $this->description == "%!%") {
          $query .= " != '' && `description` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :description";
          $param["description"]= substr($this->description, 2);
        }
      // is empty
      } elseif(substr($this->description, 1, 1) == "=") {
        $query .= " = '' || `description` IS NULL";
      // like
      } else {
        $query .= " LIKE :description";
        $param["description"]= $this->description;
      }
    }
    if(!empty($this->popularity) || (isset($this->popularity) && $this->popularity === 0)) {
      $query .= " AND `popularity`";

      // different of
      if(substr($this->popularity, 1, 1) == "!") {
        // different of empty
        if($this->popularity == "!" || $this->popularity == "%!%") {
          $query .= " != '' && `popularity` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :popularity";
          $param["popularity"]= substr($this->popularity, 2);
        }
      // is empty
      } elseif(substr($this->popularity, 1, 1) == "=") {
        $query .= " = '' || `popularity` IS NULL";
      // like
      } else {
        $query .= " LIKE :popularity";
        $param["popularity"]= $this->popularity;
      }
    }
    if(!empty($this->vote_count) || (isset($this->vote_count) && $this->vote_count === 0)) {
      $query .= " AND `vote_count`";

      // different of
      if(substr($this->vote_count, 1, 1) == "!") {
        // different of empty
        if($this->vote_count == "!" || $this->vote_count == "%!%") {
          $query .= " != '' && `vote_count` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :vote_count";
          $param["vote_count"]= substr($this->vote_count, 2);
        }
      // is empty
      } elseif(substr($this->vote_count, 1, 1) == "=") {
        $query .= " = '' || `vote_count` IS NULL";
      // like
      } else {
        $query .= " LIKE :vote_count";
        $param["vote_count"]= $this->vote_count;
      }
    }
    if(!empty($this->poster_path) || (isset($this->poster_path) && $this->poster_path === 0)) {
      $query .= " AND `poster_path`";

      // different of
      if(substr($this->poster_path, 1, 1) == "!") {
        // different of empty
        if($this->poster_path == "!" || $this->poster_path == "%!%") {
          $query .= " != '' && `poster_path` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :poster_path";
          $param["poster_path"]= substr($this->poster_path, 2);
        }
      // is empty
      } elseif(substr($this->poster_path, 1, 1) == "=") {
        $query .= " = '' || `poster_path` IS NULL";
      // like
      } else {
        $query .= " LIKE :poster_path";
        $param["poster_path"]= $this->poster_path;
      }
    }
    if(!empty($this->backdrop_path) || (isset($this->backdrop_path) && $this->backdrop_path === 0)) {
      $query .= " AND `backdrop_path`";

      // different of
      if(substr($this->backdrop_path, 1, 1) == "!") {
        // different of empty
        if($this->backdrop_path == "!" || $this->backdrop_path == "%!%") {
          $query .= " != '' && `backdrop_path` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :backdrop_path";
          $param["backdrop_path"]= substr($this->backdrop_path, 2);
        }
      // is empty
      } elseif(substr($this->backdrop_path, 1, 1) == "=") {
        $query .= " = '' || `backdrop_path` IS NULL";
      // like
      } else {
        $query .= " LIKE :backdrop_path";
        $param["backdrop_path"]= $this->backdrop_path;
      }
    }
    if(!empty($this->vote_average) || (isset($this->vote_average) && $this->vote_average === 0)) {
      $query .= " AND `vote_average`";

      // different of
      if(substr($this->vote_average, 1, 1) == "!") {
        // different of empty
        if($this->vote_average == "!" || $this->vote_average == "%!%") {
          $query .= " != '' && `vote_average` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :vote_average";
          $param["vote_average"]= substr($this->vote_average, 2);
        }
      // is empty
      } elseif(substr($this->vote_average, 1, 1) == "=") {
        $query .= " = '' || `vote_average` IS NULL";
      // like
      } else {
        $query .= " LIKE :vote_average";
        $param["vote_average"]= $this->vote_average;
      }
    }
    if(!empty($this->duration) || (isset($this->duration) && $this->duration === 0)) {
      $query .= " AND `duration`";

      // different of
      if(substr($this->duration, 1, 1) == "!") {
        // different of empty
        if($this->duration == "!" || $this->duration == "%!%") {
          $query .= " != '' && `duration` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :duration";
          $param["duration"]= substr($this->duration, 2);
        }
      // is empty
      } elseif(substr($this->duration, 1, 1) == "=") {
        $query .= " = '' || `duration` IS NULL";
      // like
      } else {
        $query .= " LIKE :duration";
        $param["duration"]= $this->duration;
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
    if(!empty($this->release_date) || (isset($this->release_date) && $this->release_date === 0)) {
      $query .= " AND `release_date`";

      // different of
      if(substr($this->release_date, 1, 1) == "!") {
        // different of empty
        if($this->release_date == "!" || $this->release_date == "%!%") {
          $query .= " != '' && `release_date` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :release_date";
          $param["release_date"]= substr($this->release_date, 2);
        }
      // is empty
      } elseif(substr($this->release_date, 1, 1) == "=") {
        $query .= " = '' || `release_date` IS NULL";
      // like
      } else {
        $query .= " LIKE :release_date";
        $param["release_date"]= $this->release_date;
      }
    }
    if(!empty($this->summary) || (isset($this->summary) && $this->summary === 0)) {
      $query .= " AND `summary`";

      // different of
      if(substr($this->summary, 1, 1) == "!") {
        // different of empty
        if($this->summary == "!" || $this->summary == "%!%") {
          $query .= " != '' && `summary` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :summary";
          $param["summary"]= substr($this->summary, 2);
        }
      // is empty
      } elseif(substr($this->summary, 1, 1) == "=") {
        $query .= " = '' || `summary` IS NULL";
      // like
      } else {
        $query .= " LIKE :summary";
        $param["summary"]= $this->summary;
      }
    }
    if(!empty($this->trailer_url) || (isset($this->trailer_url) && $this->trailer_url === 0)) {
      $query .= " AND `trailer_url`";

      // different of
      if(substr($this->trailer_url, 1, 1) == "!") {
        // different of empty
        if($this->trailer_url == "!" || $this->trailer_url == "%!%") {
          $query .= " != '' && `trailer_url` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :trailer_url";
          $param["trailer_url"]= substr($this->trailer_url, 2);
        }
      // is empty
      } elseif(substr($this->trailer_url, 1, 1) == "=") {
        $query .= " = '' || `trailer_url` IS NULL";
      // like
      } else {
        $query .= " LIKE :trailer_url";
        $param["trailer_url"]= $this->trailer_url;
      }
    }
    if(!empty($this->release_date__start) || (isset($this->release_date__start) && $this->release_date__start === 0)) {
      $query .= " AND `release_date` >= :release_date__start";
      $param["release_date__start"]=$this->release_date__start;
    }
    if(!empty($this->release_date__end) || (isset($this->release_date__end) && $this->release_date__end === 0)) {
      $query .= " AND `release_date` <= :release_date__end";
      $param["release_date__end"]=$this->release_date__end;
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
    $query  = "SELECT * FROM `media` WHERE 0=0";
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
    if(!empty($this->list_genre_id) || (isset($this->list_genre_id) && $this->list_genre_id === 0)) {
      $query .= " AND `list_genre_id`";

      // different of
      if(substr($this->list_genre_id, 1, 1) == "!") {
        // different of empty
        if($this->list_genre_id == "!" || $this->list_genre_id == "%!%") {
          $query .= " != '' && `list_genre_id` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :list_genre_id";
          $param["list_genre_id"]= substr($this->list_genre_id, 2);
        }
      // is empty
      } elseif(substr($this->list_genre_id, 1, 1) == "=") {
        $query .= " = '' || `list_genre_id` IS NULL";
      // like
      } else {
        $query .= " LIKE :list_genre_id";
        $param["list_genre_id"]= $this->list_genre_id;
      }
    }
    if(!empty($this->api_id) || (isset($this->api_id) && $this->api_id === 0)) {
      $query .= " AND `api_id`";

      // different of
      if(substr($this->api_id, 1, 1) == "!") {
        // different of empty
        if($this->api_id == "!" || $this->api_id == "%!%") {
          $query .= " != '' && `api_id` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :api_id";
          $param["api_id"]= substr($this->api_id, 2);
        }
      // is empty
      } elseif(substr($this->api_id, 1, 1) == "=") {
        $query .= " = '' || `api_id` IS NULL";
      // like
      } else {
        $query .= " LIKE :api_id";
        $param["api_id"]= $this->api_id;
      }
    }
    if(!empty($this->title) || (isset($this->title) && $this->title === 0)) {
      $query .= " AND `title`";

      // different of
      if(substr($this->title, 1, 1) == "!") {
        // different of empty
        if($this->title == "!" || $this->title == "%!%") {
          $query .= " != '' && `title` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :title";
          $param["title"]= substr($this->title, 2);
        }
      // is empty
      } elseif(substr($this->title, 1, 1) == "=") {
        $query .= " = '' || `title` IS NULL";
      // like
      } else {
        $query .= " LIKE :title";
        $param["title"]= $this->title;
      }
    }
    if(!empty($this->description) || (isset($this->description) && $this->description === 0)) {
      $query .= " AND `description`";

      // different of
      if(substr($this->description, 1, 1) == "!") {
        // different of empty
        if($this->description == "!" || $this->description == "%!%") {
          $query .= " != '' && `description` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :description";
          $param["description"]= substr($this->description, 2);
        }
      // is empty
      } elseif(substr($this->description, 1, 1) == "=") {
        $query .= " = '' || `description` IS NULL";
      // like
      } else {
        $query .= " LIKE :description";
        $param["description"]= $this->description;
      }
    }
    if(!empty($this->popularity) || (isset($this->popularity) && $this->popularity === 0)) {
      $query .= " AND `popularity`";

      // different of
      if(substr($this->popularity, 1, 1) == "!") {
        // different of empty
        if($this->popularity == "!" || $this->popularity == "%!%") {
          $query .= " != '' && `popularity` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :popularity";
          $param["popularity"]= substr($this->popularity, 2);
        }
      // is empty
      } elseif(substr($this->popularity, 1, 1) == "=") {
        $query .= " = '' || `popularity` IS NULL";
      // like
      } else {
        $query .= " LIKE :popularity";
        $param["popularity"]= $this->popularity;
      }
    }
    if(!empty($this->vote_count) || (isset($this->vote_count) && $this->vote_count === 0)) {
      $query .= " AND `vote_count`";

      // different of
      if(substr($this->vote_count, 1, 1) == "!") {
        // different of empty
        if($this->vote_count == "!" || $this->vote_count == "%!%") {
          $query .= " != '' && `vote_count` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :vote_count";
          $param["vote_count"]= substr($this->vote_count, 2);
        }
      // is empty
      } elseif(substr($this->vote_count, 1, 1) == "=") {
        $query .= " = '' || `vote_count` IS NULL";
      // like
      } else {
        $query .= " LIKE :vote_count";
        $param["vote_count"]= $this->vote_count;
      }
    }
    if(!empty($this->poster_path) || (isset($this->poster_path) && $this->poster_path === 0)) {
      $query .= " AND `poster_path`";

      // different of
      if(substr($this->poster_path, 1, 1) == "!") {
        // different of empty
        if($this->poster_path == "!" || $this->poster_path == "%!%") {
          $query .= " != '' && `poster_path` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :poster_path";
          $param["poster_path"]= substr($this->poster_path, 2);
        }
      // is empty
      } elseif(substr($this->poster_path, 1, 1) == "=") {
        $query .= " = '' || `poster_path` IS NULL";
      // like
      } else {
        $query .= " LIKE :poster_path";
        $param["poster_path"]= $this->poster_path;
      }
    }
    if(!empty($this->backdrop_path) || (isset($this->backdrop_path) && $this->backdrop_path === 0)) {
      $query .= " AND `backdrop_path`";

      // different of
      if(substr($this->backdrop_path, 1, 1) == "!") {
        // different of empty
        if($this->backdrop_path == "!" || $this->backdrop_path == "%!%") {
          $query .= " != '' && `backdrop_path` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :backdrop_path";
          $param["backdrop_path"]= substr($this->backdrop_path, 2);
        }
      // is empty
      } elseif(substr($this->backdrop_path, 1, 1) == "=") {
        $query .= " = '' || `backdrop_path` IS NULL";
      // like
      } else {
        $query .= " LIKE :backdrop_path";
        $param["backdrop_path"]= $this->backdrop_path;
      }
    }
    if(!empty($this->vote_average) || (isset($this->vote_average) && $this->vote_average === 0)) {
      $query .= " AND `vote_average`";

      // different of
      if(substr($this->vote_average, 1, 1) == "!") {
        // different of empty
        if($this->vote_average == "!" || $this->vote_average == "%!%") {
          $query .= " != '' && `vote_average` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :vote_average";
          $param["vote_average"]= substr($this->vote_average, 2);
        }
      // is empty
      } elseif(substr($this->vote_average, 1, 1) == "=") {
        $query .= " = '' || `vote_average` IS NULL";
      // like
      } else {
        $query .= " LIKE :vote_average";
        $param["vote_average"]= $this->vote_average;
      }
    }
    if(!empty($this->duration) || (isset($this->duration) && $this->duration === 0)) {
      $query .= " AND `duration`";

      // different of
      if(substr($this->duration, 1, 1) == "!") {
        // different of empty
        if($this->duration == "!" || $this->duration == "%!%") {
          $query .= " != '' && `duration` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :duration";
          $param["duration"]= substr($this->duration, 2);
        }
      // is empty
      } elseif(substr($this->duration, 1, 1) == "=") {
        $query .= " = '' || `duration` IS NULL";
      // like
      } else {
        $query .= " LIKE :duration";
        $param["duration"]= $this->duration;
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
    if(!empty($this->release_date) || (isset($this->release_date) && $this->release_date === 0)) {
      $query .= " AND `release_date`";

      // different of
      if(substr($this->release_date, 1, 1) == "!") {
        // different of empty
        if($this->release_date == "!" || $this->release_date == "%!%") {
          $query .= " != '' && `release_date` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :release_date";
          $param["release_date"]= substr($this->release_date, 2);
        }
      // is empty
      } elseif(substr($this->release_date, 1, 1) == "=") {
        $query .= " = '' || `release_date` IS NULL";
      // like
      } else {
        $query .= " LIKE :release_date";
        $param["release_date"]= $this->release_date;
      }
    }
    if(!empty($this->summary) || (isset($this->summary) && $this->summary === 0)) {
      $query .= " AND `summary`";

      // different of
      if(substr($this->summary, 1, 1) == "!") {
        // different of empty
        if($this->summary == "!" || $this->summary == "%!%") {
          $query .= " != '' && `summary` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :summary";
          $param["summary"]= substr($this->summary, 2);
        }
      // is empty
      } elseif(substr($this->summary, 1, 1) == "=") {
        $query .= " = '' || `summary` IS NULL";
      // like
      } else {
        $query .= " LIKE :summary";
        $param["summary"]= $this->summary;
      }
    }
    if(!empty($this->trailer_url) || (isset($this->trailer_url) && $this->trailer_url === 0)) {
      $query .= " AND `trailer_url`";

      // different of
      if(substr($this->trailer_url, 1, 1) == "!") {
        // different of empty
        if($this->trailer_url == "!" || $this->trailer_url == "%!%") {
          $query .= " != '' && `trailer_url` IS NOT NULL";
        // different of value
        } else {
          $query .= " NOT LIKE :trailer_url";
          $param["trailer_url"]= substr($this->trailer_url, 2);
        }
      // is empty
      } elseif(substr($this->trailer_url, 1, 1) == "=") {
        $query .= " = '' || `trailer_url` IS NULL";
      // like
      } else {
        $query .= " LIKE :trailer_url";
        $param["trailer_url"]= $this->trailer_url;
      }
    }
    if(!empty($this->release_date__start) || (isset($this->release_date__start) && $this->release_date__start === 0)) {
      $query .= " AND `release_date` >= :release_date__start";
      $param["release_date__start"]=$this->release_date__start;
    }
    if(!empty($this->release_date__end) || (isset($this->release_date__end) && $this->release_date__end === 0)) {
      $query .= " AND `release_date` <= :release_date__end";
      $param["release_date__end"]=$this->release_date__end;
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
    $query = "SELECT * FROM `media` WHERE id= :id";
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
        $this->list_genre_id = $row->list_genre_id;
        $this->api_id = $row->api_id;
        $this->title = $row->title;
        $this->description = $row->description;
        $this->popularity = $row->popularity;
        $this->vote_count = $row->vote_count;
        $this->poster_path = $row->poster_path;
        $this->backdrop_path = $row->backdrop_path;
        $this->vote_average = $row->vote_average;
        $this->duration = $row->duration;
        $this->type = $row->type;
        $this->release_date = $row->release_date;
        $this->summary = $row->summary;
        $this->trailer_url = $row->trailer_url;
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
  
    $query = "INSERT INTO `media` SET";
    $query .= " `list_genre_id` = :list_genre_id";
    $param["list_genre_id"] = !empty($this->list_genre_id) || $this->list_genre_id != "" ? $this->list_genre_id : NULL;
    $query .= ", `api_id` = :api_id";
    $param["api_id"] = !empty($this->api_id) || $this->api_id != "" ? $this->api_id : NULL;
    $query .= ", `title` = :title";
    $param["title"] = !empty($this->title) || $this->title != "" ? $this->title : NULL;
    $query .= ", `description` = :description";
    $param["description"] = !empty($this->description) || $this->description != "" ? $this->description : NULL;
    $query .= ", `popularity` = :popularity";
    $param["popularity"] = !empty($this->popularity) || $this->popularity != "" ? $this->popularity : NULL;
    $query .= ", `vote_count` = :vote_count";
    $param["vote_count"] = !empty($this->vote_count) || $this->vote_count != "" ? $this->vote_count : NULL;
    $query .= ", `poster_path` = :poster_path";
    $param["poster_path"] = !empty($this->poster_path) || $this->poster_path != "" ? $this->poster_path : NULL;
    $query .= ", `backdrop_path` = :backdrop_path";
    $param["backdrop_path"] = !empty($this->backdrop_path) || $this->backdrop_path != "" ? $this->backdrop_path : NULL;
    $query .= ", `vote_average` = :vote_average";
    $param["vote_average"] = !empty($this->vote_average) || $this->vote_average != "" ? $this->vote_average : NULL;
    $query .= ", `duration` = :duration";
    $param["duration"] = !empty($this->duration) || $this->duration != "" ? $this->duration : NULL;
    $query .= ", `type` = :type";
    $param["type"] = !empty($this->type) || $this->type != "" ? $this->type : NULL;
    $query .= ", `release_date` = :release_date";
    $param["release_date"] = !empty($this->release_date) || $this->release_date != "" ? $this->release_date : NULL;
    $query .= ", `summary` = :summary";
    $param["summary"] = !empty($this->summary) || $this->summary != "" ? $this->summary : NULL;
    $query .= ", `trailer_url` = :trailer_url";
    $param["trailer_url"] = !empty($this->trailer_url) || $this->trailer_url != "" ? $this->trailer_url : NULL;
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
  
    $query = "UPDATE `media` SET";
    $query .= " `list_genre_id` = :list_genre_id";
    $param["list_genre_id"] = !empty($this->list_genre_id) || $this->list_genre_id != "" ? $this->list_genre_id : NULL;
    $query .= ", `api_id` = :api_id";
    $param["api_id"] = !empty($this->api_id) || $this->api_id != "" ? $this->api_id : NULL;
    $query .= ", `title` = :title";
    $param["title"] = !empty($this->title) || $this->title != "" ? $this->title : NULL;
    $query .= ", `description` = :description";
    $param["description"] = !empty($this->description) || $this->description != "" ? $this->description : NULL;
    $query .= ", `popularity` = :popularity";
    $param["popularity"] = !empty($this->popularity) || $this->popularity != "" ? $this->popularity : NULL;
    $query .= ", `vote_count` = :vote_count";
    $param["vote_count"] = !empty($this->vote_count) || $this->vote_count != "" ? $this->vote_count : NULL;
    $query .= ", `poster_path` = :poster_path";
    $param["poster_path"] = !empty($this->poster_path) || $this->poster_path != "" ? $this->poster_path : NULL;
    $query .= ", `backdrop_path` = :backdrop_path";
    $param["backdrop_path"] = !empty($this->backdrop_path) || $this->backdrop_path != "" ? $this->backdrop_path : NULL;
    $query .= ", `vote_average` = :vote_average";
    $param["vote_average"] = !empty($this->vote_average) || $this->vote_average != "" ? $this->vote_average : NULL;
    $query .= ", `duration` = :duration";
    $param["duration"] = !empty($this->duration) || $this->duration != "" ? $this->duration : NULL;
    $query .= ", `type` = :type";
    $param["type"] = !empty($this->type) || $this->type != "" ? $this->type : NULL;
    $query .= ", `release_date` = :release_date";
    $param["release_date"] = !empty($this->release_date) || $this->release_date != "" ? $this->release_date : NULL;
    $query .= ", `summary` = :summary";
    $param["summary"] = !empty($this->summary) || $this->summary != "" ? $this->summary : NULL;
    $query .= ", `trailer_url` = :trailer_url";
    $param["trailer_url"] = !empty($this->trailer_url) || $this->trailer_url != "" ? $this->trailer_url : NULL;
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
        
      $query = "DELETE FROM `media` WHERE id= :id";
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