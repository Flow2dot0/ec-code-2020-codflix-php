<?php

require_once('model/media.manager.php');
require_once('model/tmdb.manager.php');
require_once('model/favorite.manager.php');

/***************************
* ----- LOAD MEDIA PAGE -----
***************************/

function mediaPage() {

// to fill the database
//    $tmdb_manager = new TmdbManager();
//    $tmdb_manager->init();


    // for navbar index
    $nav_index = 1;

    $media_manager = new MediaManager();

    // home tab
    $rows_series = $media_manager->getFullDataByType('serie');
    $rows_movies = $media_manager->getFullDataByType('movie');


    // serie tab
    $rows_series_sorted = $media_manager->sortByGenre($rows_series);

    // movie tab
    $rows_movies_sorted = $media_manager->sortByGenre($rows_movies);



    $favorite_manager = new FavoriteManager();


//  $search = isset( $_GET['titl'] ) ? $_GET['titl'] : null;
//  $medias = Media::filterMedias( $search );

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

    echo  json_encode([$res, $is_favorite]);
}
