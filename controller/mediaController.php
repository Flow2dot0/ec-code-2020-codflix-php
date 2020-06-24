<?php

require_once('model/media.manager.php');

/***************************
* ----- LOAD HOME PAGE -----
***************************/

function mediaPage() {

    // for navbar index
    $nav_index = 1;

//  $search = isset( $_GET['titl'] ) ? $_GET['titl'] : null;
//  $medias = Media::filterMedias( $search );

  require('view/media/mediaListView.php');

}
