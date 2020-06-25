$(document).ready(function() {

    // checking token
    $('#checking').on( 'click', function()  {

        let val = $('#token_check').val();
        let email = $('#email').val();

        if(val!==""){
            $.ajax({
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

    // update favorite
    $('.updateFavorite').on('click', function () {

        let userID;
        let mediaID;
        let favoriteID;

        $('.user_id').each(function () {
            if($(this).val().length > 0) userID = $(this).val();
        })

        $('.media_id').each(function () {
            if($(this).val().length > 0) mediaID = $(this).val();
        })

        $('.favorite_id').each(function () {
            if($(this).val().length > 0) favoriteID = $(this).val();
        })

        console.log(mediaID);
        console.log(favoriteID);
        console.log(userID);

        $.ajax({
            url : 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=silentfavorite',
            method : "POST",
            data : {user_id: userID, media_id : mediaID, favorite_id : favoriteID},
            success : function(data) {
                let decode = JSON.parse(data);
                if(decode != null){
                    $('.user_id').each(function () {
                        console.log(decode['user_id']);
                        if($(this).val().length > 0) $(this).val(decode['user_id']);
                    })
                    $('.media_id').each(function () {
                        console.log(decode['media_id']);

                        if($(this).val().length > 0) $(this).val(decode['media_id']);
                    })
                    $('.favorite_id').each(function () {
                        console.log(decode['id']);
                        if($(this).val().length > 0) $(this).val(decode['id']);
                    })
                }
                console.log(decode);
                // if(decode){
                //     window.location.replace("http://localhost:8888/ec-code-2020-codflix-php-master/index.php");
                // }else{
                //     $('.error-msg').html('La vérification a échouée, veuillez consulter vos emails et réessayer. Sinon, contactez un administrateur.');
                // }
            }
        });

    })


    // fix for the profileView display err msg
    // by only php the msg is too quickly deleted
    let cleaner = $('.error-msg').html();
    if(cleaner && cleaner.length > 0){
        $.ajax({
            url : 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=fix1',
            method : "POST",
            data : {fix1:true},
            success : function() {}
        });
    }


})