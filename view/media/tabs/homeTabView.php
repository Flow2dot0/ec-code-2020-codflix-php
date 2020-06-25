<div class="container mt-2 mb-2">
    <div class="row">
        <h4 class="font-weight-bold">Cela pourrait éventuellement vous intéresser</h4>
    </div>
    <div class="row mt-3">
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
    <div class="row align-items-center">
        <div class="material-icons mr-2" style="font-size: 40px;">play_circle_filled</div>
        <h5 class="font-weight-bold mt-2">Reprendre le visionnage</h5>
    </div>
    <div class="row">
        <div class="owl-carousel def-car">
            <?php
            foreach ($rows_series as $s){
                mediumCard('https://image.tmdb.org/t/p/w200/'.$s->poster_path, $media_manager->formatDuration($s->duration));
            }
            ?>

        </div>
    </div>
</div>
<div class="dropdown-divider mb-3"></div>

<div class="container ">
    <div class="row">
        <div class="material-icons mr-2" style="font-size: 40px;">stars</div>
        <h5 class="font-weight-bold mt-2">Ma liste</h5>
    </div>
    <div class="row">
        <div class="owl-carousel def-car">
            <?php
            foreach ($rows_series as $s){
                mediumCard('https://image.tmdb.org/t/p/w200/'.$s->poster_path, $media_manager->formatDuration($s->duration));
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
                mediumCard('https://image.tmdb.org/t/p/w200/'.$s->poster_path, $media_manager->formatDuration($s->duration), $favorite_manager->isFavorite($s->id, $_SESSION['user_id']), $s->id, $_SESSION['user_id']);
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
                mediumCard('https://image.tmdb.org/t/p/w200/'.$m->poster_path, $media_manager->formatDuration($m->duration));
            }
            ?>
        </div>
    </div>
</div>
