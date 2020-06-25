<?php

require_once('model/media.manager.php');
require_once('model/tmdb.manager.php');
require_once('model/favorite.manager.php');

/***************************
* ----- LOAD HOME PAGE -----
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


