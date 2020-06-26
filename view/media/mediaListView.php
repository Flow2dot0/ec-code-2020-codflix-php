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
            <li class="nav-item" >
                <a class="nav-link" id="pills-movies-tab" data-toggle="pill" href="#pills-search" role="tab" aria-controls="pills-search" aria-selected="false">XXXX</a>
            </li>
        </ul>
    </div>
    <div class="col-md-4">
        <form method="get" >
            <div class="form-group has-btn">
                <input type="search" id="search" name="title" value="<?= $search; ?>" class="form-control"
                       placeholder="Rechercher un film ou une série">

                <button type="submit" name="searching" class="btn btn-block bg-red">Valider</button>
            </div>
        </form>
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