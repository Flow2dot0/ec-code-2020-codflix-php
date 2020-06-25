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



    $('.previewModal').on('click', function (e) {
        let modalTrigger = $(this);

        const media = modalTrigger.attr('data-media');
        $.ajax({
            url : 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=silentmodal',
            method : "POST",
            data : {modal:media},
            success : function(data) {
                let decode = JSON.parse(data);
                console.log(decode);
                if(decode != null){

                    let iframe = '<div class="containerVideo"></div><iframe id="ytplayer" height="100%" type="text/html"\n' +
                        '  src="http://www.youtube.com/embed/M7lc1UVf-VE?autoplay=1&origin=http://example.com"\n' +
                        '  class="video" allowfullscreen frameborder="0"/></div>';



                    let $params = {
                        'title' : decode['title'],
                        'release_date' : decode['release_date'],
                        'genre_1' : decode['genre_1'],
                        'genre_2' : decode['genre_2'],
                        'genre_3' : decode['genre_3'],
                        'genre_4' : decode['genre_4'],
                        'genre_5' : decode['genre_5'],
                        'api_id' : decode['api_id'],
                        'trailer_url' : decode['trailer_url'],
                        'type' : decode['type'],
                        'duration' : decode['duration'],
                        'vote_average' : decode['vote_average'],
                        'backdrop_path' : decode['backdrop_path'],
                        'poster_path' : decode['poster_path'],
                        'vote_count' : decode['vote_count'],
                        'popularity' : decode['popularity'],
                        'description' : decode['description'],
                        'user_id': decode['user_id'],
                    };

                    let modal =  $('#dataModal');
                    let modalTitle = $('#dataModalTitle');
                    let modalVideo = $('#dataModalVideo');
                    let modalBody = $('#dataModalBody');

                    let buildBody = '';

                    modalTitle.html(decode['title']);
                    modalVideo.html(iframe);
                    modal.modal('toggle');
                }
            }
        });
    })

})


// handle favorite ajax on / off
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

