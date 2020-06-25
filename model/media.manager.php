<?php
require_once('conf/init.inc.php');

class MediaManager
{
    function __construct(){}

    /**********************************
     * ----- ADD SESSION FUNCTION -----
     *********************************/
    function getFullDataByType(String $type){

        $medias = new media();
        return $medias->getFullData($type);
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