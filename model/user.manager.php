<?php

require_once('conf/init.inc.php');
require_once('mail.manager.php');

class UserManager
{
    function __construct(){}

    /**********************************
     * ----- ADD SESSION FUNCTION -----
     *********************************/
    function addSessions($email, $id = null)
    {
        $_SESSION['ses_email'] = $email;

        if($id != null) $_SESSION['user_id'] = $id;
    }

    /**********************************
     * ----- DELETE SESSION FUNCTION -----
     *********************************/
    function deleteSessions()
    {
        $_SESSION = array();
        session_destroy();
    }

    /**********************************
     * ----- CREATE USER FUNCTION -----
     *********************************/
    function createUser($params){

        // check if already exist
        $new_user = new user();
        $new_user->getRowByEmail($params['email']);


        // if user exits
        if($new_user->id != null){
            // TODO : ADD RELOAD TO REGISTER PAGE WITH ERROR MSG
            $_SESSION['err_msg'] = "L'adresse email existe déjà.";
            return null;
        }

        $new_user->email = $params['email'];
        $new_user->username = $params['username'];
        $new_user->firstname = $params['firstname'];
        $new_user->lastname = $params['lastname'];
        $new_user->type = "member";


        // checking passwords
        // if passwords are not equals
        if ($params['password'] != $params['password_confirm']) {
            // TODO : ADD RELOAD TO REGISTER PAGE WITH ERROR MSG
            $_SESSION['err_msg'] = "Les deux mots de passe ne sont pas identiques.";
            return null;
        }

        // create token confirmation
        $generate = password_hash(strval(random_int(100000, 999999)), PASSWORD_DEFAULT);
        $new_user->token_confirmation = $generate;

        // insert
        $new_user->password = password_hash($params['password'], PASSWORD_DEFAULT);
        $new_user->status = 'disabled';
        $new_user->insertRow();

        // checking insertion
        $check_insertion = new user();
        $check_insertion->getRowByEmail($new_user->email);

        // let alert by email
        if ($check_insertion->id != null) {
            $mail_manager = new MailManager();
            $mail_manager->newUser($check_insertion->email, $new_user->token_confirmation);
            return $check_insertion;
        }
        $_SESSION['err_msg'] = "La création du compte a échouée, veuillez réessayer ou contacter un administrateur.";
        return null;
    }

    /**********************************
     * ----- UPDATE USER FUNCTION -----
     *********************************/
    function updateUser($params){

        $new_user = new user();
        $new_user->getRow($params['id']);

        // update if exists
        if($params['email'] != null) $new_user->email = $params['email'];
        if($params['username'] != null) $new_user->username = $params['username'];
        if($params['firstname'] != null) $new_user->firstname = $params['firstname'];
        if($params['lastname'] != null) $new_user->lastname = $params['lastname'];



        // checking passwords
        // if passwords are not equals and old is correct
        if($params['old_password'] != null || $params['password'] != null || $params['password_confirm'] != null) {

            $verify = password_verify($params['old_password'], $new_user->password);
            if($verify){
                if ($params['password'] == $params['password_confirm']) {
                    $new_user->password = password_hash($params['password'], PASSWORD_DEFAULT);

                    // create token confirmation
                    $generate = password_hash(strval(random_int(100000, 999999)), PASSWORD_DEFAULT);
                    $new_user->token_confirmation = $generate;

                    $new_user->status = 'disabled';
                    $new_user->updateRow();
                    $new_user->getRow($params['id']);


                    // let alert by email
                    $mail_manager = new MailManager();
                    $mail_manager->newUser($new_user->email, $new_user->token_confirmation);

                    return 2;
                }

            }
            $_SESSION['err_msg'] = "Tous les champs mots de passe doivent être correctement renseignés pour une modification de mot de passe.";
        }
        $new_user->updateRow();
        $new_user->getRow($params['id']);
        return 1;
    }

    /*****************************************
     * ----- VERIFICATION USER FUNCTION -----
     ****************************************/
    function confirmUser($params){

        // init
        $test_user = new user();
        $test_user->getRowByEmail($params['email']);

        // test
        if($test_user->email != null){
            if($params['token_confirmation'] == $test_user->token_confirmation){

                // update
                // i can let empty because my input form field locked at required
                $test_user->token_confirmation = '';
                $test_user->status = 'enabled';
                $test_user->updateRow();

                return $test_user;
            }
        }
        return null;
    }

    /**********************************
     * ----- LOGIN FUNCTION ----------
     *********************************/
    function connectingUser($params){

        // init
        $test_user = new user();
        $test_user->getRowByEmail($params['email']);

        if($test_user->status == 'disabled') {
            $_SESSION['err_msg'] = "Votre compte n'est pas confirmé, veuillez regarder dans vos mails.";
            return null;
        }

        // test
        if($test_user->email != null){

            $verify = password_verify($params['password'], $test_user->password);

            if($verify){
                return $test_user;
            }
            $_SESSION['err_msg'] = "Le mot de passe est incorrect.";
            return null;
        }
        $_SESSION['err_msg'] = "Cet email n'existe pas.";
        return null;
    }

    /**********************************
     * --- GET USER DATA FUNCTION ---
     *********************************/
    function getUserData($id){

        // init
        $usr = new user();
        $usr->getRow($id);

        // test
        if($usr->id != null){
            return $usr;
        }
        return null;
    }
}