$(document).ready(function() {

    // checking token
    $('#checking').on( 'click', function()  {

        let val = $('#token_check').val();
        let email = $('#email').val();

        if(val!==""){
            $.ajax({
                // to change on server ftp
                url : 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=silentcheck',
                method : "POST",
                data : {checking:val, email:email},
                success : function(data) {
                    let decode = JSON.parse(data);
                    if(decode){
                        window.location.replace("http://localhost:8888/ec-code-2020-codflix-php-master/index.php");
                    }else{
                        $('.error-msg').html('La vérification a échouée, veuillez consulter vos emails et réessayer. Sinon, contactez un administrateur.');
                    }
                }
            });
        }
    });



})