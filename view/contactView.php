<?php ob_start(); ?>

<div class="row">
    <div class="col-md-12 full-height bg-white">
        <div class="auth-container">
            <h2><span>Cod</span>'Flix</h2>
            <h3>Nous contacter</h3>

            <form method="post" action="index.php?action=contact" class="custom-form">

                <?php
                if(!isset($_SESSION['user_id']) && empty($_SESSION['user_id'])){
                    ?>
                    <div class="form-group">
                        <label for="firstname">Prénom</label>
                        <input type="text" name="firstname" value="" id="firstname" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="lastname">Nom</label>
                        <input type="text" name="lastname" value="" id="lastname" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="email">Adresse email</label>
                        <input type="email" name="email" value="" id="email" class="form-control" />
                    </div>
                    <?php
                }
                ?>

                <div class="form-group">
                    <label for="message" class="bmd-label-floating">Votre message</label>
                    <textarea class="form-control" name="message" id="message" rows="10"></textarea>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" name="contact" class="btn btn-block bg-blue">Envoyer le message
                            </button>
                        </div>
                    </div>
                </div>

                <span class="error-msg"><?= isset($_SESSION['err_msg']) ? $_SESSION['err_msg'] : null ?></span>
            </form>
        </div>
    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
    require('dashboard.php');
}else{
    require('base.php');
}
?>
