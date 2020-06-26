<?php

require_once('model/media.manager.php');
require_once('model/tmdb.manager.php');
require_once('model/favorite.manager.php');
require_once('model/history.manager.php');

/***************************
* ----- LOAD MEDIA PAGE -----
***************************/
function mediaPage() {
    // for navbar index
    $nav_index = 1;

    $media_manager = new MediaManager();
    $favorite_manager = new FavoriteManager();
    $history_manager = new HistoryManager();

    $rows_history = $history_manager->getHistory($_SESSION['user_id']);
    $rows = $media_manager->getFullDataByType();

    // home tab
    $rows_series = $media_manager->getFullDataByType('serie');
    $rows_movies = $media_manager->getFullDataByType('movie');

    // serie tab
    $rows_series_sorted = $media_manager->sortByGenre($rows_series);

    // movie tab
    $rows_movies_sorted = $media_manager->sortByGenre($rows_movies);

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


/***************************
 * ----- UPSERT HISTORY -----
 ***************************/
function silentHistory(){

    $params = [
        'media_id' => !empty($_POST['media_id']) ? intval(htmlspecialchars($_POST['media_id'])) : null,
        'user_id' => !empty($_POST['user_id']) ? intval(htmlspecialchars($_POST['user_id'])) : null,
        'season_id' => !empty($_POST['season_id']) ? intval(htmlspecialchars($_POST['season_id'])) : null,
        'type' => !empty($_POST['type']) ? strval(htmlspecialchars($_POST['type'])) : null,
        'index_season' => !empty($_POST['index_season']) ? intval(htmlspecialchars($_POST['index_season'])) : null,
        'index_episode' => !empty($_POST['index_episode']) ? intval(htmlspecialchars($_POST['index_episode'])) : null,
        'duration' => !empty($_POST['duration']) ? intval(htmlspecialchars($_POST['duration'])) : null,
    ];

    $history_manager = new HistoryManager();
    return $history_manager->handleHistory($params);

}

/********************************
 * ----- DELETE ALL HISTORY -----
 *******************************/
function deleteAllHistory(){

    if(isset($_GET['delete']) && !empty($_GET['delete'])){
        $history_manager = new HistoryManager();
        $history_manager->deleteAllHistory(['user_id' => $_SESSION['user_id']]);
    }
    header('Location: index.php');
}

/********************************
 * ----- DELETE SINGLE HISTORY -----
 *******************************/
function deleteHistory(){

    if(isset($_GET['delete']) && !empty($_GET['delete'])){

        $params = [
            'history_id' => !empty($_GET['history_id']) ? intval(htmlspecialchars($_GET['history_id'])) : null ,
            'type' => !empty($_GET['type']) ? strval(htmlspecialchars($_GET['type'])) : null,
        ];
        $history_manager = new HistoryManager();
        $history_manager->deleteHistory($params);
    }
    header('Location: index.php');
}