<?php ob_start(); ?>

<div class="row">
    <div class="col-md-8">
        <ul class="nav mt-4" style="font-size: 12px">
            <li class="nav-item">
                <a class="nav-link text-info" href="#">Séries</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-info" href="#">Films</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-info" href="#">Ma liste</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-info" href="#">Mon historique</a>
            </li>
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

    <div class="container mt-2 mb-2">
        <div class="row">
            <h5 class="font-weight-bold">Cela pourrait éventuellement vous intéresser</h5>
        </div>
        <div class="row">
            <div class="owl-carousel suggest-car" >
                <?php largeCard(); ?>
                <?php largeCard(); ?>
                <?php largeCard(); ?>
                <?php largeCard(); ?>
                <?php largeCard(); ?>
                <?php largeCard(); ?>
            </div>
        </div>
    </div>


<div class="container">
    <div class="row">
        <h5 class="font-weight-bold">Reprendre le visionnage</h5>
    </div>
    <div class="row">
        <div class="owl-carousel def-car">
            <?php mediumCard('https://fr.web.img5.acsta.net/r_640_360/newsv7/20/06/02/11/30/1318590.jpg', 'text-white bg-dark mb-3 p-1') ?>
            <?php mediumCard('https://fr.web.img5.acsta.net/r_640_360/newsv7/20/06/02/11/30/1318590.jpg', 'text-white bg-dark mb-3 p-1') ?>
            <?php mediumCard('https://fr.web.img5.acsta.net/r_640_360/newsv7/20/06/02/11/30/1318590.jpg', 'text-white bg-dark mb-3 p-1') ?>
            <?php mediumCard('https://fr.web.img5.acsta.net/r_640_360/newsv7/20/06/02/11/30/1318590.jpg', 'text-white bg-dark mb-3 p-1') ?>
            <?php mediumCard('https://fr.web.img5.acsta.net/r_640_360/newsv7/20/06/02/11/30/1318590.jpg', 'text-white bg-dark mb-3 p-1') ?>
            <?php mediumCard('https://fr.web.img5.acsta.net/r_640_360/newsv7/20/06/02/11/30/1318590.jpg', 'text-white bg-dark mb-3 p-1') ?>
        </div>
    </div>
</div>

    <div class="container">
        <div class="row">
            <h5 class="font-weight-bold">Ma liste</h5>
        </div>
        <div class="row">
            <div class="owl-carousel def-car">
                <?php mediumCard('https://fr.web.img5.acsta.net/r_640_360/newsv7/20/06/02/11/30/1318590.jpg', 'text-white bg-dark mb-3 p-1') ?>
                <?php mediumCard('https://fr.web.img5.acsta.net/r_640_360/newsv7/20/06/02/11/30/1318590.jpg', 'text-white bg-dark mb-3 p-1') ?>
                <?php mediumCard('https://fr.web.img5.acsta.net/r_640_360/newsv7/20/06/02/11/30/1318590.jpg', 'text-white bg-dark mb-3 p-1') ?>
                <?php mediumCard('https://fr.web.img5.acsta.net/r_640_360/newsv7/20/06/02/11/30/1318590.jpg', 'text-white bg-dark mb-3 p-1') ?>
                <?php mediumCard('https://fr.web.img5.acsta.net/r_640_360/newsv7/20/06/02/11/30/1318590.jpg', 'text-white bg-dark mb-3 p-1') ?>
                <?php mediumCard('https://fr.web.img5.acsta.net/r_640_360/newsv7/20/06/02/11/30/1318590.jpg', 'text-white bg-dark mb-3 p-1') ?>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <h5 class="font-weight-bold">Séries</h5>
        </div>
        <div class="row">
            <div class="owl-carousel def-car">
                <?php mediumCard('https://fr.web.img5.acsta.net/r_640_360/newsv7/20/06/02/11/30/1318590.jpg', 'text-white bg-dark mb-3 p-1') ?>
                <?php mediumCard('https://fr.web.img5.acsta.net/r_640_360/newsv7/20/06/02/11/30/1318590.jpg', 'text-white bg-dark mb-3 p-1') ?>
                <?php mediumCard('https://fr.web.img5.acsta.net/r_640_360/newsv7/20/06/02/11/30/1318590.jpg', 'text-white bg-dark mb-3 p-1') ?>
                <?php mediumCard('https://fr.web.img5.acsta.net/r_640_360/newsv7/20/06/02/11/30/1318590.jpg', 'text-white bg-dark mb-3 p-1') ?>
                <?php mediumCard('https://fr.web.img5.acsta.net/r_640_360/newsv7/20/06/02/11/30/1318590.jpg', 'text-white bg-dark mb-3 p-1') ?>
                <?php mediumCard('https://fr.web.img5.acsta.net/r_640_360/newsv7/20/06/02/11/30/1318590.jpg', 'text-white bg-dark mb-3 p-1') ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <h5 class="font-weight-bold">Films</h5>
        </div>
        <div class="row">
            <div class="owl-carousel def-car">
                <?php mediumCard('https://fr.web.img5.acsta.net/r_640_360/newsv7/20/06/02/11/30/1318590.jpg', 'text-white bg-dark mb-3 p-1') ?>
                <?php mediumCard('https://fr.web.img5.acsta.net/r_640_360/newsv7/20/06/02/11/30/1318590.jpg', 'text-white bg-dark mb-3 p-1') ?>
                <?php mediumCard('https://fr.web.img5.acsta.net/r_640_360/newsv7/20/06/02/11/30/1318590.jpg', 'text-white bg-dark mb-3 p-1') ?>
                <?php mediumCard('https://fr.web.img5.acsta.net/r_640_360/newsv7/20/06/02/11/30/1318590.jpg', 'text-white bg-dark mb-3 p-1') ?>
                <?php mediumCard('https://fr.web.img5.acsta.net/r_640_360/newsv7/20/06/02/11/30/1318590.jpg', 'text-white bg-dark mb-3 p-1') ?>
                <?php mediumCard('https://fr.web.img5.acsta.net/r_640_360/newsv7/20/06/02/11/30/1318590.jpg', 'text-white bg-dark mb-3 p-1') ?>
            </div>
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
<?php require('dashboard.php'); ?>