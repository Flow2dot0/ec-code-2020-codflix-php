<div class="container mt-2 mb-2" id="">
    <div class="row">
        <h4 class="font-weight-bold">Médias susceptibles de vous plaire</h4>
    </div>
    <div class="row mt-3" id="loadSuggest">
        <div class="owl-carousel suggest-car" >
            <?php largeCard(); ?>
            <?php largeCard(); ?>
            <?php largeCard(); ?>
            <?php largeCard(); ?>
            <?php largeCard(); ?>
            <?php largeCard(); ?>
        </div>
    </div>
</div>
<div class="dropdown-divider mb-3"></div>
<div class="container ">
    <div class="row justify-content-between">
        <div class="row align-items-center ml-1">
            <div class="material-icons mr-2" style="font-size: 40px;">play_circle_filled</div>
            <h5 class="font-weight-bold mt-2">Mon historique</h5>
        </div>

        <div>
            <a href="index.php?action=deleteallhistory" class="btn btn-raised btn-danger">Effacer l'historique</a>
        </div>
    </div>
    <div class="row" id="loadHistory">
        <div class="owl-carousel def-car">
            <?php
            foreach ($rows_series as $s){
                    mediumCard('https://image.tmdb.org/t/p/w200/'.$s->poster_path, $media_manager->formatDuration($s->duration), $favorite_manager->isFavorite($s->id, $_SESSION['user_id']), $s->id, $_SESSION['user_id'], 0);
            }
            ?>

        </div>
    </div>
</div>
<div class="dropdown-divider mb-3"></div>

<div class="container ">
    <div class="row">
        <div class="material-icons mr-2" style="font-size: 40px;">stars</div>
        <h5 class="font-weight-bold mt-2">Vos médias à regarder</h5>
    </div>
    <div class="row">
        <div class="owl-carousel def-car">
            <?php
            foreach ($rows_series as $s){
                if($favorite_manager->isFavorite($s->id, $_SESSION['user_id']))
                    mediumCard('https://image.tmdb.org/t/p/w200/'.$s->poster_path, $media_manager->formatDuration($s->duration), $favorite_manager->isFavorite($s->id, $_SESSION['user_id']), $s->id, $_SESSION['user_id'], 0);
            }
            ?>
            <?php
            foreach ($rows_movies as $m){
                if($favorite_manager->isFavorite($m->id, $_SESSION['user_id']))
                    mediumCard('https://image.tmdb.org/t/p/w200/'.$m->poster_path, $media_manager->formatDuration($m->duration), $favorite_manager->isFavorite($m->id, $_SESSION['user_id']), $m->id, $_SESSION['user_id'], 0);
            }
            ?>
        </div>
    </div>
</div>
<div class="dropdown-divider mb-3"></div>

<div class="container">
    <div class="row">
        <div class="material-icons mr-2" style="font-size: 40px;">tv</div>
        <h5 class="font-weight-bold mt-2">Séries</h5>
    </div>
    <div class="row">
        <div class="owl-carousel def-car">
            <?php
            foreach ($rows_series as $s){
                mediumCard('https://image.tmdb.org/t/p/w200/'.$s->poster_path, $media_manager->formatDuration($s->duration), $favorite_manager->isFavorite($s->id, $_SESSION['user_id']), $s->id, $_SESSION['user_id'], 0);
            }
            ?>
        </div>
    </div>
</div>
<div class="dropdown-divider mb-3"></div>

<div class="container ">
    <div class="row">
        <div class="material-icons mr-2" style="font-size: 40px;">movie</div>
        <h5 class="font-weight-bold mt-2">Films</h5>
    </div>
    <div class="row">
        <div class="owl-carousel def-car">
            <?php
            foreach ($rows_movies as $m){
                mediumCard('https://image.tmdb.org/t/p/w200/'.$m->poster_path, $media_manager->formatDuration($m->duration), $favorite_manager->isFavorite($m->id, $_SESSION['user_id']), $m->id, $_SESSION['user_id'], 0);
            }
            ?>
        </div>
    </div>
</div>
