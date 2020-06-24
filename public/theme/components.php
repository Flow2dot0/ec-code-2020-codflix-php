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
function mediumCard(String $url = 'https://fr.web.img5.acsta.net/r_640_360/newsv7/20/06/02/11/30/1318590.jpg', String $css = 'text-white bg-dark mb-5 mt-5 p-1'){
    ?>
    <div class="sizeUp card <?= $css ?>" style="max-width: 18rem;">
        <img class="card-img-top" src="<?= $url ?>" alt="Card image cap">
    </div>
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