<?php ob_start(); ?>

<div class="landscape">
    <div class="bg-black">
        <div class="row no-gutters">
            <div class="col-md-6 full-height bg-white">
                <div class="auth-container">
                    <h2><span>Cod</span>'Flix</h2>
                    <h3>Inscription</h3>

                    <form method="post" action="index.php?action=signup" class="custom-form">


                        <div class="form-group">
                            <label for="username">Pseudo</label>
                            <input type="text" name="username" value="" id="username" class="form-control" required/>
                        </div>

                        <div class="form-group">
                            <label for="firstname">Prénom</label>
                            <input type="text" name="firstname" value="" id="firstname" class="form-control" required/>
                        </div>

                        <div class="form-group">
                            <label for="lastname">Nom</label>
                            <input type="text" name="lastname" value="" id="lastname" class="form-control" required/>
                        </div>

                        <div class="form-group">
                            <label for="email">Adresse email</label>
                            <input type="email" name="email" value="" id="email" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" name="password" id="password" class="form-control" required/>
                        </div>

                        <div class="form-group">
                            <label for="password_confirm">Confirmez votre mot de passe</label>
                            <input type="password" name="password_confirm" id="password_confirm" class="form-control"
                                   required/>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" name="registering" class="btn btn-block bg-red">Valider
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <a href="index.php?action=login" class="btn btn-block bg-blue">Connexion</a>
                                </div>
                            </div>
                        </div>

                        <span class="error-msg">
                            <?= isset($_SESSION['err_msg']) ? $_SESSION['err_msg'] : null ?>
                        </span>
                    </form>
                </div>
            </div>
            <div class="col-md-6 full-height">
                <div class="auth-container">
                    <h1>Bienvenue sur Cod'Flix !</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if(isset($_SESSION['err_msg'])) $_SESSION['err_msg'] = ''; ?>
<?php $content = ob_get_clean(); ?>

<?php require(__DIR__ . '/../base.php'); ?>
