<?php ob_start(); ?>

<div class="row">
    <div class="col-md-12 full-height bg-white">
        <div class="auth-container">
            <h2><span>Cod</span>'Flix</h2>
            <h3>Information personnelles</h3>

            <form method="post" action="index.php?action=profile" class="custom-form">


                <div class="form-group">
                    <label for="username">Pseudo</label>
                    <input type="text" name="username" value="<?= $user->username ?>" id="username" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="firstname">Prénom</label>
                    <input type="text" name="firstname" value="<?= $user->firstname ?>" id="firstname" class="form-control" />
                </div>

                <div class="form-group">
                    <label for="lastname">Nom</label>
                    <input type="text" name="lastname" value="<?= $user->lastname ?>" id="lastname" class="form-control" />
                </div>

                <div class="form-group">
                    <label for="email">Adresse email</label>
                    <input type="email" name="email" value="<?= $user->email ?>" id="email" class="form-control" />
                </div>

                <div class="form-group">
                    <label for="old_password">Votre ancien mot de passe</label>
                    <input type="password" name="old_password" id="old_password" class="form-control"
                           />
                </div>

                <div class="form-group">
                    <label for="password">Votre nouveau mot de passe</label>
                    <input type="password" name="password" id="password" class="form-control" />
                </div>

                <div class="form-group">
                    <label for="password_confirm">Confirmation de votre nouveau mot de passe</label>
                    <input type="password" name="password_confirm" id="password_confirm" class="form-control" />
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" name="updating_profile" class="btn btn-block bg-blue">Mettre à jour
                            </button>
                        </div>
                        <div class="col-md-6">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-block bg-red" data-toggle="modal" data-target="#deleteConfirmModal">Supprimer le compte
                            </button>

                        </div>
                    </div>
                </div>

                <span class="error-msg"><?= isset($_SESSION['err_msg']) ? $_SESSION['err_msg'] : null ?></span>
            </form>
        </div>
    </div>
</div>



<!-- Modal -->
<form method="post" action="index.php?action=deleting" class="modal fade" id="deleteConfirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Confirmer vous la suppression du compte ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Nous ne conservons aucunes données. Il vous faudra vous enregister de nouveau afin de profiter du catalogue.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Non</button>
                <button type="submit" name="deleting_profile" class="btn btn-info">Oui</button>
            </div>
        </div>
    </div>
</form>


<?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>
