<?php
/******************************
 * -----   MEDIUM CARD  -----
 ****************************/
function mediumCard(String $url = '', String $duration = '', bool $isFavorite = false, int $media_id = null, int $user_id = null, String $modal_id = null, String $css = 'text-white bg-dark mb-5 mt-5 p-1'){
    // handle favorite display
    ?>

    <div id="" class="sizeUp card <?= $css ?>" style="width: 12rem;">
        <a data-toggle="modal" class="previewModal" data-media="<?= $media_id ?>">
            <img class="card-img-top" src="<?= $url ?>" alt="Card image cap" style="max-height: 245px;">
        </a>
        <button id="" type="button" class="updateFavorite btn btn-danger bmd-btn-icon" data-media="<?= $media_id ?>" data-user="<?= $user_id ?>">
            <i class="material-icons text-danger"><?= ($isFavorite) ? 'favorite' : 'favorite_border' ?></i>
        </button>
        <div class="bg-dark pr-2 pl-2 pt-0 pb-2 rounded mediumCardDuration"><?= $duration ?></div>

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


function modalData(){
    ?>
    <!-- Modal -->
    <div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title font-weight-bold" id="dataModalTitle"></h4>
                    <button id="dataModalIsFavorite" type="button" class="updateFavorite btn btn-danger bmd-btn-icon" data-media="" data-user="">
                    </button>
                </div>
                <div class="dropdown-divider mt-3 mb-0"></div>
                <div class="modal-body p-0" id="dataModalVideo">
                    ...video
                </div>
                <div class="dropdown-divider mt-0 mb-4"></div>
                <div class="modal-body p-0" id="">
                    <div class="container" id="">
                        <h4 class="modal-title text-secondary text-center mb-3" id="" style="margin-left: -20px !important;">Saison</h4>
                        <table class="table" style="font-size: 11px;">
                            <tbody id="dataModalEpisodes">
                            <tr id="ss1"></tr>
                            <tr id="ss2"></tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row justify-content-center" id="dataModalGenre">
                    </div>
                    <div class="dropdown-divider mt-3 mb-4"></div>
                    <div class="container" id="dataModalDescription">
                    </div>
                    <div class="dropdown-divider mt-3 mb-4"></div>
                    <div class="container pr-5 pl-5" id="">
                        <div class="row justify-content-between">
                            <div class="font-weight-bold" id="">
                                Date de sortie :
                            </div>
                            <h4 class="modal-title text-danger" id="dataModalDate"></h4>
                        </div>

                    </div>
                    <div class="dropdown-divider mt-3 mb-4"></div>
                    <div class="container pr-5 pl-5" id="">
                        <div class="row justify-content-between">
                            <div class="font-weight-bold" id="" style="font-size: 50px;">
                                Note / 10 :
                            </div>
                            <div class="" id="dataModalVoteAverage">

                            </div>
                        </div>
                    </div>
                    <div class="dropdown-divider mt-3 mb-4"></div>
                    <div class="container pr-5 pl-5" id="">
                        <div class="row justify-content-between">
                            <div class="font-weight-bold" id=""  style="font-size: 30px;">
                                Popularité :
                            </div>
                            <div class="" id="dataModalPopularity">

                            </div>
                        </div>
                    </div>
                    <div class="dropdown-divider mt-3 mb-4"></div>
                    <div class="container pr-5 pl-5" id="">
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
<?php

}

