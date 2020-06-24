<?php

require_once('model/mail.manager.php');

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

    if(isset($post['contact'])){
        // TODO : continue tomorrow
    }


}