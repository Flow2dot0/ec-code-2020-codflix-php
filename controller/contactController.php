<?php

require_once('model/mail.manager.php');
require_once('model/user.manager.php');

/****************************
 * ----- LOAD CONTACT PAGE -----
 ****************************/
function contactPage(){

    // for navbar index
    $nav_index = 3;
    require('view/contactView.php');

}

/***********************************
 * ----- SEND CONTACT MESSAGE -----
 **********************************/
function sendContactMessage($post){

    // if exist a message
    if(isset($post['contact']) && (isset($post['message']) && !empty($post['message']))){
        // TODO : continue tomorrow

        // in case of registered member contact message
        if(!isset($post['email']) && empty($post['email'])){
            $user_manager = new UserManager();
            $user = $user_manager->getUserData($_SESSION['user_id']);
        }

        $params = [
            'firstname' => isset($post['firstname']) && !empty($post['firstname']) ? strval(htmlspecialchars($post['firstname'])) : $user->firstname,
            'lastname' => isset($post['lastname']) && !empty($post['lastname']) ? strval(htmlspecialchars($post['lastname'])) : $user->lastname,
            'email' => isset($post['email']) && !empty($post['email']) ? strval(htmlspecialchars($post['email'])) : $user->email,
            'message' => strval(htmlspecialchars($post['message'])),
        ];

        // send
        $mail_manager = new MailManager();
        $mail_manager->contactMessage($params);
    }
    // redirect
    header('location: index.php ');

}