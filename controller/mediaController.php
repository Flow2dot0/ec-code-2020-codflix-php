<?php

require_once('model/media.manager.php');
require_once('model/tmdb.manager.php');
require_once('model/favorite.manager.php');

function reloader(){

    if(!empty($_POST['load']) && $_POST['load'] == 'history'){
        $media_manager = new MediaManager();
        $favorite_manager = new FavoriteManager();

        $tmp = [];

        $rows_series = $media_manager->getFullDataByType('serie');
        foreach ($rows_series as $r){
            if($favorite_manager->isFavorite($r->id, $_SESSION['user_id'])){
                $tmp[] = true;
            }
            $tmp[] = false;
        }


        echo json_encode([$tmp, $rows_series, $_SESSION['user_id']]);
    }
    $media_manager = new MediaManager();
    $favorite_manager = new FavoriteManager();
    // home tab
    $rows_series = $media_manager->getFullDataByType('serie');
    $rows_movies = $media_manager->getFullDataByType('movie');


    // serie tab
    $rows_series_sorted = $media_manager->sortByGenre($rows_series);

    // movie tab
    $rows_movies_sorted = $media_manager->sortByGenre($rows_movies);

}
/***************************
 * ----- LOAD DETAIL PAGE -----
 ***************************/
function detailPage(){



    require('view/detailView.php');
}


/***************************
* ----- LOAD MEDIA PAGE -----
***************************/

function mediaPage() {
    $media_manager = new MediaManager();
    $rows = $media_manager->getFullDataByType();

// to fill the database
    $tmdb_manager = new TmdbManager();
//    $tmdb_manager->init();
//    $rows_series = $media_manager->getFullDataByType('serie');
//
//    $tmdb_manager->initSerieDetail($rows_series);


    // for navbar index
    $nav_index = 1;

    // home tab
    $rows_series = $media_manager->getFullDataByType('serie');
    $rows_movies = $media_manager->getFullDataByType('movie');


    // serie tab
    $rows_series_sorted = $media_manager->sortByGenre($rows_series);

    // movie tab
    $rows_movies_sorted = $media_manager->sortByGenre($rows_movies);

    $favorite_manager = new FavoriteManager();

  require('view/media/mediaListView.php');

}

/****************************
 * --------- FAVORITES -----
 ****************************/
function silentFavorite(){

    $params = [
        'user_id' => !empty($_POST['user_id']) ? intval(htmlspecialchars($_POST['user_id'])) : null,
        'media_id' => !empty($_POST['media_id']) ? intval(htmlspecialchars($_POST['media_id'])) : null,
    ];

    $favorite_manager = new FavoriteManager();
    $res = $favorite_manager->handleFavorite($params);

    echo json_encode($res);
}

function silentIsFavorite(){

    $params = [
        'media_id' => !empty($_POST['media_id']) ? intval(htmlspecialchars($_POST['media_id'])) : null,
        'user_id' => !empty($_POST['user_id']) ? intval(htmlspecialchars($_POST['user_id'])) : null,
    ];

    $favorite_manager = new FavoriteManager();
    $is_favorite = $favorite_manager->isFavorite($params['media_id'], $params['user_id']);

    echo json_encode($is_favorite);

}

/****************************
 * --------- MODAL DATA -----
 ****************************/
function silentModal(){

    $params = [
        'media_id' => !empty($_POST['modal']) ? intval(htmlspecialchars($_POST['modal'])) : null,
        'user_id' => $_SESSION['user_id'],
    ];

    $media_manager = new MediaManager();
    $res = $media_manager->getFullRow($params);

    $favorite_manager = new FavoriteManager();
    $is_favorite = $favorite_manager->isFavorite($params['media_id'], $params['user_id']);

    echo json_encode([$res, $is_favorite]);
}

/****************************
 * --------- SERIES -----
 ****************************/
function silentSeries(){

    $params = [
        'media_id' => !empty($_POST['fetch_series']) ? intval(htmlspecialchars($_POST['fetch_series'])) : null,
        'user_id' => $_SESSION['user_id'],
    ];

    $media_manager = new MediaManager();
    $res = $media_manager->getFullDetailSerie($params);


    echo  json_encode($res);
}

/***************************
 * ----- SEARCH -----
 ***************************/
function silentSearch(){

    $params = [
        'title' => !empty($_POST['title']) ? strval(htmlspecialchars($_POST['title'])) : null,
        'genre' => !empty($_POST['genre']) ? strval(htmlspecialchars($_POST['genre'])) : null,
        'date' => !empty($_POST['date']) ? strval(htmlspecialchars($_POST['date'])) : null,
        'type' => !empty($_POST['type']) ? strval(htmlspecialchars($_POST['type'])) : null,
    ];

    $media_manager = new MediaManager();
    $res = $media_manager->searchData($params);

    echo json_encode([$res, $_SESSION['user_id']]);
}
