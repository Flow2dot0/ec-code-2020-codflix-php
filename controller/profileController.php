<?php
require_once('model/user.manager.php');
require_once('public/theme/components.php');
require_once('model/favorite.manager.php');

/****************************
 * ----- LOAD PROFILE PAGE -----
 ****************************/
function profilePage()
{
    // get data for the view
    $user = profileData();
    // for navbar index
    $nav_index = 2;
    require('view/profileView.php');

}


/****************************
 * ----- LOAD PROFILE DATA -----
 ****************************/
function profileData()
{
    $user_manager = new UserManager();
    return $user_manager->getUserData($_SESSION['user_id']);
}


/****************************
 * ----- UPDATE PROFILE -----
 ****************************/
function updateProfile($post)
{

    if (isset($post['updating_profile'])) {


        $params = [
            'id' => $_SESSION['user_id'],
            'email' => isset($post['email']) && !empty($post['email']) ? strval(htmlspecialchars($post['email'])) : null,
            'username' => isset($post['username']) && !empty($post['username']) ? strval(htmlspecialchars($post['username'])) : null,
            'firstname' => isset($post['firstname']) && !empty($post['firstname']) ? strval(htmlspecialchars($post['firstname'])) : null,
            'lastname' => isset($post['lastname']) && !empty($post['lastname']) ? strval(htmlspecialchars($post['lastname'])) : null,
            'old_password' => isset($post['old_password']) && !empty($post['old_password']) ? strval(htmlspecialchars($post['old_password'])) : null,
            'password' => isset($post['password']) && !empty($post['password']) ? strval(htmlspecialchars($post['password'])) : null,
            'password_confirm' => isset($post['password_confirm']) && !empty($post['password_confirm']) ? strval(htmlspecialchars($post['password_confirm'])) : null,
        ];

        $user_manager = new UserManager();
        $user = $user_manager->updateUser($params);

        // redirect
        if($user == 2){
            $user_manager->deleteSessions();
            $user_manager->addSessions($params['email']);
            require('view/auth/checkingView.php');
        }
    }
}

/****************************
 * ----- DELETE PROFILE -----
 ****************************/
function deleteProfile(){
    // TODO : delete all fk links
    // TODO : come back later
}

