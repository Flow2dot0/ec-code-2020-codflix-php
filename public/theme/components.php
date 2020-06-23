<?php

function snackbar($data){
    ?>
    <button type="button" class="btn btn-secondary" data-toggle="snackbar" data-content="<?= $data ?>" data-html-allowed="true" data-timeout="3">
        Snackbar
    </button>
    <?php
}
