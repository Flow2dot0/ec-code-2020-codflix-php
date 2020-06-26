$(document).ready(function() {

  $( '#sidebarCollapse' ).on( 'click', function() {

    $( '#sidebar' ).toggleClass('open');

  });

  // Owl Carousel default
  let owl = $(".def-car");
  owl.owlCarousel({
    margin:10,
    loop:false,
    autoWidth:true,
  });


  // Owl Carousel suggest
  let owlSuggest = $(".suggest-car");
  owlSuggest.owlCarousel({
    items:2,
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:4000,
    autoplayHoverPause:true
  });

  // Date format
  String.prototype.toHHMMSS = function () {
    var sec_num = parseInt(this, 10); // don't forget the second param
    var hours   = Math.floor(sec_num / 3600);
    var minutes = Math.floor((sec_num - (hours * 3600)) / 60);
    var seconds = sec_num - (hours * 3600) - (minutes * 60);

    if (hours   < 10) {hours   = "0"+hours;}
    if (minutes < 10) {minutes = "0"+minutes;}
    if (seconds < 10) {seconds = "0"+seconds;}
    return hours+'h'+minutes+'m'+seconds+'s';
  }

});





