<div class="container ">

    <?php
    $count = 0;
    foreach (array_keys($rows_series_sorted) as $genre_name){

        ?>
        <div class="row">
            <div class="material-icons mr-2" style="font-size: 40px;">movie</div>
            <h5 class="font-weight-bold mt-2"><?= $genre_name ?></h5>
        </div>
        <div class="row">
            <div class="owl-carousel def-car">
                <?php
                foreach ($rows_series_sorted[$genre_name] as $m){
                    mediumCard('https://image.tmdb.org/t/p/w200/'.$m->poster_path,
                        $media_manager->formatDuration($m->duration),
                        $favorite_manager->isFavorite($m->id,
                        $_SESSION['user_id']),
                        $m->id, $_SESSION['user_id'],
                        1);
                }
                ?>
            </div>
        </div>
        <?php
        $count++;
    }
    ?>
</div>

