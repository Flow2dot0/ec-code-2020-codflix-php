<?php

require_once('controller/homeController.php');
require_once('controller/loginController.php');
require_once('controller/signupController.php');
require_once('controller/mediaController.php');
require_once('controller/checkingController.php');
/**************************
 * ----- HANDLE ACTION -----
 ***************************/

if (isset($_GET['action'])):

    switch ($_GET['action']):

        case 'login':

            if (!empty($_POST)) login($_POST);
            else loginPage();

            break;

        case 'signup':

            if (!empty($_POST)) signup($_POST);
            else signupPage();

            break;


        case 'checking':
            if(isset($_GET['email']) && !empty($_GET['email'])) $_SESSION['ses_email'] = htmlspecialchars($_GET['email']);
            checkingPage();

            break;

        case 'silentcheck':

            silentCheck();

            break;


        case 'logout':

            logout();

            break;

    endswitch;

else:

    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;

    if ($user_id):
        mediaPage();
    else:
        homePage();
    endif;

endif;
