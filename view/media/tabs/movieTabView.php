<div class="container ">
    <div class="row">
        <div class="material-icons mr-2" style="font-size: 40px;">movie</div>
        <h5 class="font-weight-bold mt-2">Films</h5>
    </div>
    <div class="row">
        <div class="owl-carousel def-car">
            <?php
            foreach ($rows_movies as $m){
                mediumCard('https://image.tmdb.org/t/p/w200/'.$m->poster_path, $media_manager->formatDuration($m->duration), $favorite_manager->isFavorite($m->id, $_SESSION['user_id']), $m->id, $_SESSION['user_id']);
            }
            ?>
        </div>
    </div>
</div>