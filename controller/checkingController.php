<?php

require_once('model/user.manager.php');

/****************************
 * ----- LOAD VERIFICATION PAGE -----
 ****************************/

function checkingPage()
{

    require('view/auth/checkingView.php');
}


/****************************
 * ----- AJAX CHECK TOKEN -----
 ****************************/

function silentCheck()
{

    // check if ajax query POST
    if (isset($_POST['checking']) && !empty($_POST['checking'])) {

        // prepare data
        $params = [
            'token_confirmation' => strval(htmlspecialchars($_POST['checking'])),
            'email' => strval(htmlspecialchars($_POST['email']))
        ];

        //
        $user_manager = new UserManager();
        $test = $user_manager->confirmUser($params);

        if ($test != null) {
            $_SESSION['user_id'] = $test->id;
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }

}
