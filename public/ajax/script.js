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


    // fill modal data on click on card
    // add youtube embed player
    // add favorite option
    // toggle modal
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


                    let modal =  $('#dataModal');


                    $('#dataModalTitle').html(decode[0].title);
                    $('#dataModalDate').html(decode[0].release_date);
                    $('#dataModalGenre').html('');

                    if(decode[0].genre_1 != null)
                        $('#dataModalGenre').append('                    <div class="mr-1">\n' +
                        '                        <h5><span class="badge badge-pill badge-dark pr-3 pl-3 pt-2 pb-2">'+decode[0].genre_1+'</span></h5>\n' +
                        '                    </div>');

                    if(decode[0].genre_2 != null)
                        $('#dataModalGenre').append('                    <div class="mr-1">\n' +
                            '                        <h5><span class="badge badge-pill badge-dark pr-3 pl-3 pt-2 pb-2">'+decode[0].genre_2+'</span></h5>\n' +
                            '                    </div>');

                    if(decode[0].genre_3 != null)
                        $('#dataModalGenre').append('                    <div class="mr-1">\n' +
                            '                        <h5><span class="badge badge-pill badge-dark pr-3 pl-3 pt-2 pb-2">'+decode[0].genre_3+'</span></h5>\n' +
                            '                    </div>');

                    if(decode[0].genre_4 != null)
                        $('#dataModalGenre').append('                    <div class="mr-1">\n' +
                            '                        <h5><span class="badge badge-pill badge-dark pr-3 pl-3 pt-2 pb-2">'+decode[0].genre_4+'</span></h5>\n' +
                            '                    </div>');

                    if(decode[0].genre_5 != null)
                        $('#dataModalGenre').append('                    <div class="mr-1">\n' +
                            '                        <h5><span class="badge badge-pill badge-dark pr-3 pl-3 pt-2 pb-2">'+decode[0].genre_5+'</span></h5>\n' +
                            '                    </div>');


                    $('#dataModalDescription').html('<p class="p-4 text-justify">'+decode[0].description+'</p>');

                    $('#dataModalVoteAverage').html('<p class="font-weight-bold text-danger" style="font-size: 50px;">'+decode[0].vote_average+'</p>');
                    $('#dataModalPopularity').html('<p class="font-weight-bold text-danger" style="font-size: 30px;">'+decode[0].popularity+'</p>');
                    $('#dataModalVoteCount').html('<p class="text-danger">'+decode[0].vote_count+'</p>');

                    $('#dataModalIsFavorite').attr('data-media', decode[0].id);
                    $('#dataModalIsFavorite').attr('data-user', decode[0].user_id);
                    $('#dataModalIsFavorite').html('<i class="material-icons text-danger">'+(decode[1] ? 'favorite' : 'favorite_border')+'</i>')
                    // if movies
                    $('#dataModalVideo').html(iframe);

                    // if series
                    if(decode[0]['type'] === 'serie'){
                        $.ajax({
                            url : 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=silentseries',
                            method : "POST",
                            data : {fetch_series:decode[0].id},
                            success : function(data) {
                                let decoded = JSON.parse(data);
                                if(decoded != null){
                                    console.log(decoded);

                                    $('#ss1').html('');
                                    $('#ss1').append('<td class="font-weight-bold text-danger m-2" style="font-size: 20px;">1</td>');
                                    for(var i = 1; i <= decoded.s1 ; i++ ){
                                        $('#ss1').append('<td class="font-weight-bold p-0 pt-2"><input class="ss1-index" type="button" value="'+ (i) +'"></td>');
                                    }

                                    $('#ss2').html('');
                                    $('#ss2').append('<td class="font-weight-bold text-danger m-2" style="font-size: 20px;">2</td>');
                                    for(var i = 1; i <= decoded.s2 ; i++ ){
                                        $('#ss2').append('<td class="font-weight-bold p-0 pt-2"><input class="ss2-index" type="button" value="'+ (i) +'"></td>');
                                    }
                                }
                            }
                        });
                    }
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

