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



    // let favorite = $('.updateFavorite');
    // favorite.on('click', function () {
    //
    //     let userID;
    //     let mediaID;
    //
    //
    //     $('.user_id').each(function () {
    //         console.log($(this).val());
    //         if($(this).val().length > 0) userID = $(this).val();
    //     })
    //
    //     $('.media_id').each(function () {
    //         if($(this).val().length > 0) mediaID = $(this).val();
    //     })
    //
    //
    //     console.log(mediaID);
    //
    //     console.log(userID);
    //
    //     $.ajax({
    //         url : 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=silentfavorite',
    //         method : "POST",
    //         data : {user_id: userID, media_id : mediaID},
    //         success : function(data) {
    //             let decode = JSON.parse(data);
    //             if(decode != null){
    //                 favorite.html('<i class="material-icons text-danger">favorite</i>');
    //             }else{
    //                 favorite.html('<i class="material-icons text-danger">favorite_border</i>');
    //             }
    //             console.log(decode);
    //             // if(decode){
    //             //     window.location.replace("http://localhost:8888/ec-code-2020-codflix-php-master/index.php");
    //             // }else{
    //             //     $('.error-msg').html('La vérification a échouée, veuillez consulter vos emails et réessayer. Sinon, contactez un administrateur.');
    //             // }
    //         }
    //     });
    //
    // })


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



$(document).ready(function() {


    $('.updateFavorite').on('click', function (event) {
        event.preventDefault();
        event.stopPropagation();
        event.stopImmediatePropagation();

        let media = $(this).attr('data-media');
        let user = $(this).attr('data-user');

        let elem = $(this);
        console.log($(this).parent().html());

        $.ajax({
            url : 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=silentfavorite',
            method : "POST",
            data : {user_id: user, media_id : media},
            success : function(data) {
                let decode = JSON.parse(data);
                console.log(decode);

                if(decode !== null){
                    elem.html('<i class="material-icons text-danger">favorite</i>');
                }else{
                    elem.html('<i class="material-icons text-danger">favorite_border</i>');
                }
            }
        });

    })
})
