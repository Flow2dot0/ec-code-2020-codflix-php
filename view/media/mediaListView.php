<?php ob_start(); ?>

<form class="row mr-3 ml-3 mt-4 bg-dark p-1" style="border-radius: 15px; color: white !important;">
    <div class="col-lg-5">
        <div class="form-group">
            <label for="title" class="bmd-label-floating fix-text-color">Rechercher un film ou une série</label>
            <input type="search" class="form-control fix-text-color" id="title" name="title" >
        </div>
    </div>
    <div class="col-lg-2" style="margin-top: -8px;">
        <div class="form-group">
            <label for="exampleSelect1" class="bmd-label-floating fix-text-color">Genre</label>
            <select name="genre" class="form-control fix-text-color" id="genre">
                <option value=""></option>
                <option value="Action">Action</option>
                <option value="Aventure">Aventure</option>
                <option value="Animation">Animation</option>
                <option value="Comédie">Comédie</option>
                <option value="Crime">Crime</option>
                <option value="Documentaire">Documentaire</option>
                <option value="Drame">Drame</option>
                <option value="Familial">Familial</option>
                <option value="Fantastique">Fantastique</option>
                <option value="Histoire">Histoire</option>
                <option value="Horreur">Horreur</option>
                <option value="Musique">Musique</option>
                <option value="Mystère">Mystère</option>
                <option value="Romance">Romance</option>
                <option value="Science-Fiction">Science-Fiction</option>
                <option value="Téléfilm">Téléfilm</option>
                <option value="Thriller">Thriller</option>
                <option value="Guerre">Guerre</option>
                <option value="Western">Western</option>
                <option value="Action & Adventure">Action & Adventure</option>
                <option value="Kids">Kids</option>
                <option value="News">News</option>
                <option value="Science-Fiction & Fantastique">Science-Fiction & Fantastique</option>
                <option value="Soap">Soap</option>
                <option value="Talk">Talk</option>
                <option value="War & Politics">War & Politics</option>

            </select>
        </div>
    </div>
    <div class="col-lg-2" style="">
        <div class="form-group">
            <label for="date" class="bmd-label-floating fix-text-color">Date de sortie</label>
            <input type="text" maxlength="4" class="form-control fix-text-color" id="date" name="date" >
        </div>
    </div>
    <div class="col-lg-3" style="margin-top: -8px;">
        <div class="form-group">
            <label for="type" class="bmd-label-floating fix-text-color">Type</label>
            <select name="genre" class="form-control fix-text-color" id="type">
                <option value="">Tous</option>
                <option value="movie">Films</option>
                <option value="serie">Séries</option>
            </select>
        </div>
    </div>

    <div class="col-lg-12 pt-4 pb-3">

        <button id="loadSearch" type="button" name="searching" class="btn btn-raised btn-danger">Valider</button>
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
            <li class="nav-item" hidden>
                <a class="nav-link" id="pills-search-tab" data-toggle="pill" href="#pills-search" role="tab" aria-controls="pills-search" aria-selected="false">XXXX</a>
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


<?php $content = ob_get_clean(); ?>
<?php require('view/dashboard.php'); ?>