<div class="container" id="BoxSearch">
    <div class="row">
        <?php
        foreach ($rows as $r){
            ?>
            <div class="col">
                <?php
                mediumCard('https://image.tmdb.org/t/p/w200/'.$r->poster_path, $media_manager->formatDuration($r->duration), $favorite_manager->isFavorite($r->id, $_SESSION['user_id']), $r->id, $_SESSION['user_id'], 0, substr($r->release_date, 0, 4));
                ?>
            </div>
            <?php
        }
        ?>
    </div>
</div>