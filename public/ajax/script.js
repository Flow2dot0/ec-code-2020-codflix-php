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
    let triggeredModal;
    $('.previewModal').on('click', function (e) {
        console.log('clické');
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
                    $('#play_pause').attr('data-media', decode[0]['id']);
                    $('#play_pause').attr('data-user', decode[0]['user_id']);

                    console.log(decode[0]['api_id']);
                    let iframe = '<div class="containerVideo"><iframe id="ytplayer" height="100%" type="text/html"\n' +
                        '  src="http://www.youtube.com/embed/'+decode[0]['trailer_url']+'"\n' +
                        '  class="video" autoplay=1 allowfullscreen frameborder="0"/></div>';
                    // let iframe = '<div class="containerVideo"><div id="player" class="video"></div></div>';


                    let modal =  $('#dataModal');


                    $('#dataModalTitle').html(decode[0].title);
                    $('#dataModalDate').html(decode[0].release_date.substr(0,4));
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

                    $('#isSeries').html('');
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

                                    $('#isSeries').html('<div class="container" id="isSeries">\n' +
                                        '                        <h4 class="modal-title text-secondary text-center mb-3 " id="" style="margin-left: -20px !important;">Saison</h4>\n' +
                                        '                        <table class="table" style="font-size: 11px;">\n' +
                                        '                            <tbody id="dataModalEpisodes">\n' +
                                        '                            <tr id="ss1"></tr>\n' +
                                        '                            <tr id="ss2"></tr>\n' +
                                        '                            </tbody>\n' +
                                        '                        </table>\n' +
                                        '                    </div>');

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
                                }else{
                                    $('#ss1').html('');
                                    $('#ss2').html('');
                                }
                            }
                        });
                    }
                    modal.modal('toggle');

                    // $('.ss1-index').on('click', function () {
                    //     let test = $(this).val();
                    //     console.log('coucou');
                    // })
                    //
                    // $('.ss2-index').on('click', function () {
                    //     let test = $(this).val();
                    //     console.log('cc');
                    // })


                    $('#play').on('click', function () {
                        console.log($(this).attr('data-media'));
                        let mediaID = $('#play').attr('data-media');
                        let userID = $('#play').attr('data-user');

                        // TODO : AJAX
                        // add into history

                    });
                    $('#pause').on('click', function () {
                        console.log($(this).attr('data-media'));
                        let mediaID = $('#pause').attr('data-media');
                        let userID = $('#pause').attr('data-user');

                        // TODO : AJAX
                        // add into history

                    })
                    triggeredModal = modal;
                    modal.on('hidden.bs.modal', function (e) {
                    })
                }
            }

        });
    })




    // hide tabs and go result search
    $('#loadSearch').on('click', function () {
        $('#pills-home-tab').removeClass("active");
        $('#pills-home-tab').attr('hidden', 'hidden');
        $('#pills-home').hide();
        $('#pills-series-tab').removeClass("active");
        $('#pills-series-tab').attr('hidden', 'hidden');
        $('#pills-series').hide();
        $('#pills-movies-tab').removeClass("active");
        $('#pills-movies-tab').attr('hidden', 'hidden');
        $('#pills-movies').hide();

        $('#pills-search-tab').addClass("active");
        $('#pills-search').removeClass("fade");
        $('#pills-search').show();



        let title = $('#title').val();

        let genre = $('#genre option:selected').val();

        let date = $('#date').val();

        let type = $('#type option:selected').val();


        $.ajax({
            url : 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=silentsearch',
            method : "POST",
            data : {title: title, genre : (genre !== '' ? genre : null), date : (date !== '' ? date : null), type : (type !== '' ? type : null)},
            success : function(data) {
                let decode = JSON.parse(data);
                console.log(decode);
                $('#BoxSearch').html('');
                if(decode[0] != false){
                    decode[0].forEach((e) => {
                        $.ajax({
                            url : 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=silentisfavorite',
                            method : "POST",
                            data : {user_id:decode[1], media_id: e.id},
                            success : function(isFavorite) {
                                let isFav = JSON.parse(isFavorite);
                                let eval = isFav ? 'favorite' : 'favorite_border';
                                let body = '    ' +
                                    '<div class="col testest">' +
                                    '<div id="" class="sizeUp card text-white bg-dark mb-5 mt-5 p-1\'" style="width: 12rem;">\n' +
                                    '        <a data-toggle="modal" class="previewModal" data-media="'+e.id+'" data-index="3">\n' +
                                    '            <img class="card-img-top" src="https://image.tmdb.org/t/p/w200/'+e.poster_path+'" alt="Card image cap" style="max-height: 245px;">\n' +
                                    '        </a>\n' +
                                    '        <button id="" type="button" class="updateFavorite btn btn-danger bmd-btn-icon" data-media="'+e.id+'" data-user="'+decode[1]+'">\n' +
                                    '            <i class="material-icons text-danger">'+eval+'</i>\n' +
                                    '        </button>\n' +
                                    '        <div class="bg-dark pr-2 pl-2 pt-0 pb-2 rounded mediumCardDuration">'+e.duration.toHHMMSS()+'</div>\n' +
                                    '           </div>' +
                                    '    <h4 class="text-center" style="position: absolute; top: 10px;">\n' +
                                    '        <span class="badge badge-pill badge-danger">'+e['release_date'].substr(0, 4)+'</span>\n' +
                                    '    </h4>\n'+
                                    '</div>';
                                $('#BoxSearch').append(body);
                            }
                        });
                    });
                }
            }
        });
    })
})


// handle favorite ajax on / off
$(document).ready(function() {


    $('.testest').on('click', function () {
        console.log('coucou');

    })


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
                    // window.location.replace("http://localhost:8888/ec-code-2020-codflix-php-master/index.php");
                }else{
                    elem.html('<i class="material-icons text-danger">favorite_border</i>');
                    // window.location.replace("http://localhost:8888/ec-code-2020-codflix-php-master/index.php");
                }
            }
        });

    })


    // refresh
    // function reloadHistory(){
    //     $('#loadHistory').load("view/media/load/loadHistoryView.php").fadeIn("slow");
    //     console.log('coucou')
    // }

    // function ajaxLoad(type, target){
    //
    //     $.ajax({
    //         url : 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=silentload',
    //         method : "POST",
    //         data : {load: type},
    //         success : function(data) {
    //             let decode = JSON.parse(data);
    //             console.log(decode);
    //             if(decode != null){
    //                 for(let i = 0 ; i < decode[1].length ; i++){
    //                     let body = '    <div id="" class="sizeUp card text-white bg-dark mb-5 mt-5 p-1" style="width: 12rem;">\n' +
    //                         '        <a data-toggle="modal" class="previewModal" data-media="'+decode[1][i].id+'">\n' +
    //                         '            <img class="card-img-top" src="<?= $url ?>" alt="Card image cap" style="max-height: 245px;">\n' +
    //                         '        </a>\n' +
    //                         '        <button id="" type="button" class="updateFavorite btn btn-danger bmd-btn-icon" data-media="'+decode[1][i].id+'" data-user="'+decode[2]+'">\n' +
    //                         '            <i class="material-icons text-danger">'+(decode[0][i] ? 'favorite' : 'favorite_border' )+'</i>\n' +
    //                         '        </button>\n' +
    //                         '        <div class="bg-dark pr-2 pl-2 pt-0 pb-2 rounded mediumCardDuration">'+decode[1][i].duration.toHHMMSS()+'</div>\n' +
    //                         '\n' +
    //                         '    </div>';
    //
    //                     $(target).html(body);
    //                 }
    //             }
    //         }
    //     });
    // }
})


