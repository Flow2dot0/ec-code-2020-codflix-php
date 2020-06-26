<?php ob_start(); ?>

<form class="row mr-3 ml-3 mt-4 bg-dark p-1" style="border-radius: 15px; color: white !important;">
    <div class="col-lg-5">
        <div class="form-group">
            <label for="search" class="bmd-label-floating fix-text-color">Rechercher un film ou une série</label>
            <input type="search" class="form-control fix-text-color" id="search" name="title" >
        </div>
    </div>
    <div class="col-lg-2" style="margin-top: -8px;">
        <div class="form-group">
            <label for="exampleSelect1" class="bmd-label-floating fix-text-color">Genre</label>
            <select class="form-control fix-text-color" id="exampleSelect1">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>
    </div>
    <div class="col-lg-2" style="">
        <div class="form-group">
            <label for="search" class="bmd-label-floating fix-text-color">Date de sortie</label>
            <input type="search" class="form-control fix-text-color" id="search" name="title" >
        </div>
    </div>
    <div class="col-lg-3 mt-4" style="">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
            <label class="form-check-label" for="exampleRadios1">
                Tous
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
            <label class="form-check-label" for="exampleRadios2">
                Films
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3">
            <label class="form-check-label" for="exampleRadios3">
                Séries
            </label>
        </div>

    </div>

    <div class="col-lg-12 pt-4 pb-3">

        <button type="button" class="btn btn-raised btn-danger">Valider</button>

    </div>
</form>


<div class="row">
    <div class="col-md-12 mt-3">
        <!-- NAV TAB        -->
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-series-tab" data-toggle="pill" href="#pills-series" role="tab" aria-controls="pills-series" aria-selected="false">Séries</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-movies-tab" data-toggle="pill" href="#pills-movies" role="tab" aria-controls="pills-movies" aria-selected="false">Films</a>
            </li>
            <li class="nav-item" >
                <a class="nav-link" id="pills-movies-tab" data-toggle="pill" href="#pills-search" role="tab" aria-controls="pills-search" aria-selected="false">XXXX</a>
            </li>
        </ul>
    </div>

</div>


<!-- NAV CONTENT       -->
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <?php
        require('view/media/tabs/homeTabView.php')
        ?>
    </div>
    <div class="tab-pane fade" id="pills-series" role="tabpanel" aria-labelledby="pills-series-tab">
        <?php require('view/media/tabs/serieTabView.php') ?>
    </div>
    <div class="tab-pane fade" id="pills-movies" role="tabpanel" aria-labelledby="pills-movies-tab">
        <?php require('view/media/tabs/movieTabView.php') ?>
    </div>
    <div class="tab-pane fade" id="pills-search" role="tabpanel" aria-labelledby="pills-search-tab">
        <?php require('view/media/tabs/searchTabView.php') ?>
    </div>
</div>


<div class="media-list">
    <?php foreach( $medias as $media ): ?>
        <a class="item" href="index.php?media=<?= $media['id']; ?>">
            <div class="video">
                <div>
                    <iframe allowfullscreen="" frameborder="0"
                            src="<?= $media['trailer_url']; ?>" ></iframe>
                </div>
            </div>
            <div class="title"><?= $media['title']; ?></div>
        </a>
    <?php endforeach; ?>
</div>


<?php $content = ob_get_clean(); ?>
<?php require('view/dashboard.php'); ?>