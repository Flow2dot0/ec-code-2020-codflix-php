<?php
require_once('conf/init.inc.php');

class HistoryManager
{
    function __construct(){}

    /**************************************
     * ----- GET HISTORY FUNCTION -----
     **************************************/
    function getHistory($params){

        $h = new history();
        $rh = $h->getDataByID($params['user_id']);

        $hs = new history_season();
        $rhs = $hs->getDataByID($params['user_id']);

        return [$rh, $rhs];
    }

    /**************************************
     * ----- HANDLE HISTORY FUNCTION -----
     **************************************/
    function handleHistory($params){

        if($params['type'] == 'movie'){
            $history = new history();
            $history->getRowExists($params['user_id'], $params['media_id']);

            if($history->id != null){
                $history->watch_duration = $params['duration'];
                $history->updateRow();
                return [0, $history];
            }else{
                $history->user_id = $params['user_id'];
                $history->media_id = $params['media_id'];
                $history->insertRow();
                return [0, $history];

            }
        }else{
            $history_season = new history_season();
            $history_season->getRowExists($params['user_id'], $params['season_id']);

            if($history_season->id != null){
                $history_season->watch_duration = $params['duration'];
                $history_season->updateRow();
                return [$history_season, 0];
            }else{
                $history_season->user_id = $params['user_id'];
                $history_season->season_id = $params['season_id'];
                $history_season->index_season = $params['index_season'];
                $history_season->index_season = $params['index_episode'];
                $history_season->insertRow();
                return [$history_season, 0];
            }
        }
    }

    /**************************************
     * ----- DELETE HISTORY FUNCTION -----
     **************************************/
    function deleteHistory($params){

        if($params['type'] == 'movie'){
            $history = new history();
            $history->getRow($params['history_id']);

            if($history->id != null){
                $history->deleteRow();
            }
        }else{
            $history_season = new history_season();
            $history_season->getRow($params['history_id']);

            if($history_season->id != null){
                $history_season->deleteRow();
            }
        }
    }

    /**************************************
     * ----- DELETE ALL HISTORY FUNCTION -----
     **************************************/
    function deleteAllHistory($params){

        $history = new history();
        $data = $history->getDataByID($params['user_id']);

        foreach ($data as $h){
            $history->getRow($h->id);
            $history->deleteRow();
        }

        $history_season = new history_season();
        $data_season = $history_season->getDataByID($params['user_id']);

        foreach ($data_season as $hs){
            $history_season->getRow($hs->id);
            $history_season->deleteRow();
        }
    }


}