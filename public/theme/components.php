<?php

function snackbar($data){
    ?>
    <button type="button" class="btn btn-secondary" data-toggle="snackbar" data-content="<?= $data ?>" data-html-allowed="true" data-timeout="3">
        Snackbar
    </button>
    <?php
}


/******************************
 * -----   MEDIUM CARD  -----
 ****************************/
function mediumCard(String $url = 'https://fr.web.img5.acsta.net/r_640_360/newsv7/20/06/02/11/30/1318590.jpg', String $duration = '', bool $isFavorite = false, int $media_id = null, int $user_id = null, int $favorite_id = null, String $css = 'text-white bg-dark mb-5 mt-5 p-1'){
    // handle favorite display
    ?>
    <form id method="post" action="index.php?action=favorite" class="custom-form sizeUp card <?= $css ?>" style="width: 12rem;">


        <img class="card-img-top" src="<?= $url ?>" alt="Card image cap" style="max-height: 245px;">
        <button id="" type="button" class="updateFavorite btn <?= ($isFavorite) ? 'btn-light' : 'btn-danger' ?> bmd-btn-icon">
            <input type="text" class="media_id" value="<?= $media_id ?>" hidden>
            <input type="text" class="user_id" value="<?= $user_id ?>" hidden>
            <input type="text" class="favorite_id" value="<?= $favorite_id ?>" hidden>
            <i class="material-icons <?= ($isFavorite) ? 'text-danger' : '' ?>"><?= ($isFavorite) ? 'favorite' : 'favorite_border' ?></i>
        </button>
        <div class="bg-dark pr-2 pl-2 pt-0 pb-2 rounded mediumCardDuration"><?= $duration ?></div>
    </form>
    <?php
}


/******************************
 * -----   LARGE CARD  -----
 ****************************/
function largeCard(String $url = 'https://fr.web.img5.acsta.net/r_640_360/newsv7/20/06/02/11/30/1318590.jpg', String $css = 'text-white bg-secondary mb-3 p-1'){
    ?>
    <div class="card <?= $css ?>" style="max-width: 35rem;">
        <img class="card-img-top" src="<?= $url ?>" alt="Card image cap">
    </div>
    <?php
}