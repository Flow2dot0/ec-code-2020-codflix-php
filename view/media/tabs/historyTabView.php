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