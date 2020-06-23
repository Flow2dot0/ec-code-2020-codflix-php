<?php ob_start(); ?>

<div class="landscape">
    <div class="bg-black">
        <div class="row no-gutters">
            <div class="col-md-6 full-height bg-white">
                <div class="auth-container">
                    <h2><span>Cod</span>'Flix</h2>
                    <h3>Vérification</h3>

                    <div class="row justify-content-center">
                        <div class="col-md-6 pb-5">
                            <p>Un email contenant votre code de vérification se trouve sur votre boite mail, pensez à regarder dans vos spams.</p>
                        </div>
                    </div>

                    <form class="custom-form">

                        <div class="form-group" hidden>
                            <input type="text" name="email" value="<?= $_SESSION['ses_email'] ?>" id="email" class="form-control" />
                        </div>

                        <div class="form-group">
                            <label for="token_check">Code de vérification</label>
                            <input type="text" name="token_check" value="" id="token_check" class="form-control" required/>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="button" name="checking" id="checking" class="btn btn-block bg-red">Valider
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <a href="index.php" class="btn btn-block bg-blue">Accueil</a>

                                </div>
                            </div>
                        </div>

                        <span class="error-msg">
                        </span>
                    </form>


                </div>
            </div>
            <div class="col-md-6 p-5">
                <div class="auth-container">
                    <h1>Une derrnière chose et à vous le catalogue !</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require( __DIR__ . '/../base.php'); ?>
