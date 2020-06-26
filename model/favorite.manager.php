<?php
require_once('conf/init.inc.php');


class FavoriteManager
{
    function __construct(){}

    /**********************************
     * -- HANDLE FAVORITE FUNCTION ---
     *********************************/
    function handleFavorite($params){

        $favorite = new favorite();
        $favorite->getRowByIDs(intval($params['media_id']), intval($params['user_id']));

        if($favorite->id != null){
            $favorite->deleteRow();
            return null;
        }else{
            $favorite->media_id = $params['media_id'];
            $favorite->user_id = $params['user_id'];
            $favorite->insertRow();
            return $favorite;
        }

    }

    /**********************************
     * ----- IS FAVORITE FUNCTION -----
     *********************************/
    function isFavorite(int $media_id, int $user_id){

        $favorite = new favorite();
        $favorite->getRowByIDs($media_id, $user_id);

        return ($favorite->id != null) ? true : false;
    }
}