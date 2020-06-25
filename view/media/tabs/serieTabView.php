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
                        $genre_name.$m->id);
//                    previewModal($genre_name.$m->id);
                }
                ?>
            </div>
        </div>
        <?php
        $count++;
    }
    ?>
</div>

<!-- Modal -->
<div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="dataModalTitle"></h4>
                <h4 class="modal-title" id="dataModalDate"></h4>
            </div>
            <div class="dropdown-divider mt-3 mb-0"></div>
            <div class="modal-body p-0" id="dataModalVideo">
                ...video
            </div>
            <div class="dropdown-divider mt-0 mb-4"></div>
            <div class="modal-body p-0" id="dataModalBody">
                <div class="row justify-content-center" id="dataModalGenre">
                </div>
                <div class="dropdown-divider mt-3 mb-4"></div>
                <div class="container" id="dataModalDescription">
                </div>
                <div class="dropdown-divider mt-3 mb-4"></div>
                <div class="container pr-5 pl-5" id="">
                    <div class="row justify-content-between">
                        <div class="font-weight-bold" id="">
                            Note / 10 :
                        </div>
                        <div class="" id="dataModalVoteAverage">

                        </div>
                    </div>
                    <div class="row justify-content-between">
                        <div class="font-weight-bold" id="">
                            Popularité :
                        </div>
                        <div class="" id="dataModalPopularity">

                        </div>
                    </div>
                    <div class="row justify-content-between">
                        <div class="font-weight-bold" id="">
                            Nombre de vote :
                        </div>
                        <div class="" id="dataModalVoteCount">

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
