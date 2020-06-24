<?php

require_once('model/user.manager.php');

/****************************
 * ----- LOAD SIGNUP PAGE -----
 ****************************/

function signupPage()
{

    $user = new user();
    $user->id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;

    if (!$user->id):
        require('view/auth/signupView.php');
    else:
        require('view/homeView.php');
    endif;

}


/***************************
 * ----- SIGNUP FUNCTION -----
 ***************************/

function signup($post){


    // check if all fields completed
    if (isset($post['registering'])) {
        if ($post['username'] && !empty($post['username'])
            && $post['firstname'] && !empty($post['firstname'])
            && $post['lastname'] && !empty($post['lastname'])
            && $post['email'] && !empty($post['email'])
            && $post['password'] && !empty($post['password'])
            && $post['password_confirm'] && !empty($post['password_confirm'])
        ) {

            // prepare data
            $params = [
                'username' => strval(htmlspecialchars($post['username'])),
                'firstname' => strval(htmlspecialchars($post['firstname'])),
                'lastname' => strval(htmlspecialchars($post['lastname'])),
                'email' => strval(htmlspecialchars($post['email'])),
                'password' => strval(htmlspecialchars($post['password'])),
                'password_confirm' => strval(htmlspecialchars($post['password_confirm'])),
            ];

            // create new user
            $user_manager = new UserManager();
            $create = $user_manager->createUser($params);

            // redirect
            if($create->id != null){
                $user_manager->addSessions($create->email);
                require('view/auth/checkingView.php');
            }
        }
    }
    require('view/auth/signupView.php');
}


