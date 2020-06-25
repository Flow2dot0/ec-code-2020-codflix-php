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