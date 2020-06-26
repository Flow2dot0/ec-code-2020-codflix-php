<?php
require_once('/Volumes/DATA/dev/ec-code-2020-codflix-php-master/conf/init.inc.php');

class MediaManager
{
    function __construct(){}

    /********************************************
     * ----- GET FULL DATA / TYPE FUNCTION -----
     *******************************************/
    function getFullDataByType(String $type){

        $media = new media();
        return $media->getFullData($type);
    }

    /**********************************
     * ----- GET FULL ROW FUNCTION -----
     *********************************/
    function  getFullRow($params){

        if($params['media_id'] != null && $params['user_id'] != null){
            $media = new media();
            $media->getFullRow($params['media_id'], $params['user_id']);
            return ($media->id != null) ? $media : null;
        }
        return null;
    }

    /*********************************************
     * ----- GET FULL DETAIL SERIE FUNCTION -----
     *******************************************/
    function getFullDetailSerie($params){

        $new_season = new season();
        $new_season->getRowByMediaID($params['media_id']);

        if($new_season->id != null){
            return $new_season;
        }
        return null;
    }

    /**********************************
     * ----- SORT GENRE FUNCTION -----
     *********************************/
    function sortByGenre($rows){

        $genre = new genre();
        $data = $genre->getData();

        $arr = [];

        // loop on name
        foreach($data as $elem){
            // loop on item
            foreach ($rows as $r){
                // if exists
                if($elem->name == $r->genre_1 ||
                    $elem->name == $r->genre_2 ||
                    $elem->name == $r->genre_3 ||
                    $elem->name == $r->genre_4 ||
                    $elem->name == $r->genre_4){
                    // add
                    $arr[$elem->name][] = $r;
                }
            }

        }
        return $arr;
    }


    /**********************************
     * --- FORMAT DURATION FUNCTION ---
     *********************************/
    function formatDuration(int $duration){
        // I know in the backlog it said without seconds
        // according to the fake data, I do add seconds.
        $t = round($duration);
        return sprintf('%02dh%02dm%02ds', ($t/3600),($t/60%60), $t%60);
    }

}