<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Cod'Flix</title>

      <!--    <link href="public/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" />-->
      <link href="public/lib/font-awesome/css/all.min.css" rel="stylesheet" />

      <link href="public/css/partials/partials.css" rel="stylesheet" />
      <link href="public/css/layout/layout.css" rel="stylesheet" />

      <!-- Material Design for Bootstrap fonts and icons -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">

      <!-- Material Design for Bootstrap CSS -->
      <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">

  </head>


  <body>
    <div class="wrapper d-flex align-items-stretch">
      <nav id="sidebar">
        <h2 class="title">Bienvenue</h2>
        <div class="sidebar-menu">
          <ul>
            <li class="<?= $nav_index == 1 ? 'active' : '' ?>"><a href="index.php">Médias</a></li>
              <li class="<?= $nav_index == 2 ? 'active' : '' ?>"><a href="index.php?action=profile">Mon profil</a></li>
            <li class="<?= $nav_index == 3 ? 'active' : '' ?>"><a href="index.php?action=contact">Nous contacter</a></li>
            <li><a href="index.php?action=logout">Me déconnecter</a></li>
          </ul>
        </div>
      </nav>

        <!-- Page Content  -->
      <div id="content">
        <div class="header">
            <h2 class="title">Cod<span>'Flix</span></h2>
          <div class="toggle-menu d-block d-md-none">
            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fas fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
          </div>
        </div>
        <div class="content pr-3 pl-3 pt-0 pb-0">
          <?= $content; ?>
        </div>
        <footer>Copyright Cod'Flix</footer>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
    <script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>

    <script src="public/js/script.js"></script>
    <script src="public/ajax/script.js"></script>
  </body>

</html>
