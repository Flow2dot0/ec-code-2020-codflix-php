<?php

class MailManager
{

    /***********************************************
     * ----- SEND EMAIL WHEN NEW USER FUNCTION -----
     ***********************************************/
    function newUser(String $email, String $token_confirmation)
    {
        $subject = 'Cod Flix - Création de compte !';

        // message
        $message = '
                                     <html>
                                      <head>
                                       <title></title>
                                      </head>
                                      <body>
                                       <h3>Bienvenue chez Cod Flix</h3>
                                       <h4>Veuillez confirmer votre compte par le lien d\'activation ci-dessous!</h4>
                                       <br>
                                       
                                        <p>Identifiant : <span style="font-style: italic; color: green">' . $email . '</span></p>
                                        <p>Code de vérification : <span style="font-style: italic; color: green">' . $token_confirmation . '</span></p>
                                       
                                       <p><a href="http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=checking&email=' . $email . '">Votre lien ! Cliquez ici.</a></p>
                                        
                                       <br>
                                       
                                       <p>Cordialement.</p>
                                       <p>L\'équipe Cod Flix.</p>
                                       
                                      </body>
                                     </html>
                                     ';

        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';

        // send
        mail($email, $subject, utf8_decode($message), implode("\r\n", $headers));
    }

    /****************************************************
     * ----SEND EMAIL WHEN UPDATE USER PW FUNCTION -----
     ***************************************************/
    function updateUser(String $email, String $token_confirmation)
    {
        $subject = 'Cod Flix - Modification de compte !';

        // message
        $message = '
                                     <html>
                                      <head>
                                       <title></title>
                                      </head>
                                      <body>
                                       <h3>Vous avez demandé un changement de mot de passe.</h3>
                                       <h4>Veuillez confirmer votre compte par le lien d\'activation ci-dessous!</h4>
                                       <br>
                                       
                                        <p>Identifiant : <span style="font-style: italic; color: green">' . $email . '</span></p>
                                        <p>Code de vérification : <span style="font-style: italic; color: green">' . $token_confirmation . '</span></p>
                                       
                                       <p><a href="http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=checking&email=' . $email . '">Votre lien ! Cliquez ici.</a></p>
                                        
                                       <br>
                                       
                                       <p>Cordialement.</p>
                                       <p>L\'équipe Cod Flix.</p>
                                       
                                      </body>
                                     </html>
                                     ';

        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';

        // send
        mail($email, $subject, utf8_decode($message), implode("\r\n", $headers));
    }

    /****************************************************
     * --------- SEND CONTACT MESSAGE FUNCTION ----------
     ***************************************************/
    function contactMessage(){
        $subject = 'Cod Flix - Formulaire de contact -';

        // message
        $message = '
                                     <html>
                                      <head>
                                       <title></title>
                                      </head>
                                      <body>
                                       <h3>Vous avez demandé un changement de mot de passe.</h3>
                                       <h4>Veuillez confirmer votre compte par le lien d\'activation ci-dessous!</h4>
                                       <br>
                                       
                                        <p>Identifiant : <span style="font-style: italic; color: green">' . $email . '</span></p>
                                        <p>Code de vérification : <span style="font-style: italic; color: green">' . $token_confirmation . '</span></p>
                                       
                                       <p><a href="http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=checking&email=' . $email . '">Votre lien ! Cliquez ici.</a></p>
                                        
                                       <br>
                                       
                                       <p>Cordialement.</p>
                                       <p>L\'équipe Cod Flix.</p>
                                       
                                      </body>
                                     </html>
                                     ';

        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';

        // send
        mail($email, $subject, utf8_decode($message), implode("\r\n", $headers));
    }
}