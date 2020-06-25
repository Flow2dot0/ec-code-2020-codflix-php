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
    $rows_movies = $media_manager->getFullDataByType('movie');
    $rows_series = $media_manager->getFullDataByType('serie');
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

