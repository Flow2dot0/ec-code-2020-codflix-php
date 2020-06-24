$(document).ready(function() {

  $( '#sidebarCollapse' ).on( 'click', function() {

    $( '#sidebar' ).toggleClass('open');

  });

  // Owl Carousel default
  let owl = $(".def-car");
  owl.owlCarousel({
    margin:10,
    loop:true,
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

});


