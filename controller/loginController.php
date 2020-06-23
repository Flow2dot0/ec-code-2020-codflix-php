<?php

session_start();

require_once('model/user.manager.php');

/****************************
 * ----- LOAD LOGIN PAGE -----
 ****************************/

function loginPage()
{

    $user = new stdClass();
    $user->id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;

    if (!$user->id):
        require('view/auth/loginView.php');
    else:
        require('view/homeView.php');
    endif;

}

/***************************
 * ----- LOGIN FUNCTION -----
 ***************************/

function login($post)
{

    if (isset($post['connecting'])) {
        if ((isset($post['email']) && !empty($post['email'])) &&
            (isset($post['password']) && !empty($post['password']))) {

            $params = [
                'email' => strval(htmlspecialchars($post['email'])),
                'password' => strval(htmlspecialchars($post['password'])),
            ];

            $user_manager = new UserManager();
            $test = $user_manager->connectingUser($params);


            if($test != null){
                $user_manager->addSessions($test->email, $test->id);
                header('location: index.php ');
            }
        }
    }
    require('view/auth/loginView.php');
}

/****************************
 * ----- LOGOUT FUNCTION -----
 ****************************/

function logout()
{
    $_SESSION = array();
    session_destroy();

    header('location: index.php');
}
