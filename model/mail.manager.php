<?php
class MailManager{

    function newUser(String $email, String $token_confirmation){
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
                                       
                                       <p><a href="http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=checking&email='.$email.'">Votre lien ! Cliquez ici.</a></p>
                                        
                                       <br>
                                       
                                       <p>Cordialement.</p>
                                       <p>L\'équipe Cod Flix.</p>
                                       
                                      </body>
                                     </html>
                                     ';

        // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';

        mail($email, $subject, utf8_decode($message), implode("\r\n", $headers));
    }

    function resetPassword(String $email, String $password){
        // send email with random password
        $subject = 'BOOKDAY - Récupération de compte !';

        // message
        $message = '
                 <html>
                  <head>
                   <title></title>
                  </head>
                  <body>
                   <h3>Bienvenue chez BOOKDAY</h3>
                   <h4>Voici les détails !</h4>
                   <br>
                   
                    <p>Identifiant : <span style="font-style: italic; color: green">' . $email . '</span></p>
                    <p>Mot de passe : <span style="font-style: italic; color: green">' . $password . '</span></p>
                   
                    <br>
                    <p>Votre mot de passe a été réinitialisé, veuillez après vous être connecté définir un nouveau mot de passe pour des raisons de sécurité.</p>
                    
                   <br>
                   
                   <p>Cordialement.</p>
                   <p>L\'équipe BOOKDAY.</p>
                   
                  </body>
                 </html>
                 ';

        // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';

        mail($email, $subject, utf8_decode($message), implode("\r\n", $headers));
    }

    function updateUser(String $email, String $password){
        $subject = 'BOOKDAY - Mise à jour de compte !';

        // message
        $message = '
                                     <html>
                                      <head>
                                       <title></title>
                                      </head>
                                      <body>
                                       <h3>Mise à jour de vos informations personnelles chez BOOKDAY</h3>
                                       <h4>Voici les détails !</h4>
                                       <br>
                                       
                                        <p>Identifiant : <span style="font-style: italic; color: green">' . $email . '</span></p>
                                        <p>Mot de passe : <span style="font-style: italic; color: green">' . $password . '</span></p>
                                        
                                       <br>
                                       
                                       <p>Cordialement.</p>
                                       <p>L\'équipe BOOKDAY.</p>
                                       
                                      </body>
                                     </html>
                                     ';

        // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';

        mail($email, $subject, utf8_decode($message), implode("\r\n", $headers));
    }
}