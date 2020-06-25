<?php ob_start(); ?>

<div class="row">
    <div class="col-md-8 mt-3">
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
<!--            <li class="nav-item">-->
<!--                <a class="nav-link" id="pills-favorites-tab" data-toggle="pill" href="#pills-favorites" role="tab" aria-controls="pills-favorites" aria-selected="false">Ma liste</a>-->
<!--            </li>-->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link" id="pills-history-tab" data-toggle="pill" href="#pills-history" role="tab" aria-controls="pills-history" aria-selected="false">Mon historique</a>-->
<!--            </li>-->
        </ul>
    </div>
    <div class="col-md-4">
        <form method="get">
            <div class="form-group has-btn">
                <input type="search" id="search" name="title" value="<?= $search; ?>" class="form-control"
                       placeholder="Rechercher un film ou une série">

                <button type="submit" class="btn btn-block bg-red">Valider</button>
            </div>
        </form>
    </div>
</div>


<!-- IF NOT SEARCH MADE -->
<?php if(!isset($_GET['search'])){
    ?>
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
        <div class="tab-pane fade" id="pills-favorites" role="tabpanel" aria-labelledby="pills-favorites-tab">
            <?php require('view/media/tabs/favoriteTabView.php') ?>
        </div>
        <div class="tab-pane fade" id="pills-history" role="tabpanel" aria-labelledby="pills-history-tab">
            <?php require('view/media/tabs/historyTabView.php') ?>
        </div>
    </div>
    <?php

} ?>


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