jQuery(document).ready(function($) {

//
//Video play button
//
  var myVideo = $('.video');
  $('.play').click(function(){

    if (myVideo.get(0).paused) {
      myVideo.get(0).play(); 
    }
    else {
      myVideo.get(0).pause(); 
    }
  });
    
//
// Slick carousel
//

//Home page carousel
   $('.carousel').slick({
          
    slidesToShow: 3,

    prevArrow: $('.prev'),
    nextArrow: $('.next'),
    responsive: [
        {
            breakpoint: 1101,
              settings: {
                "slidesToShow": 2,
              }
        },
        {
            breakpoint: 651,
              settings: {
                "slidesToShow": 1,
              }
        }
    ]

  });


// Skip cloned elements
// Fancybox settings
$('a[data-fancybox="gallery"]:not(.slick-cloned)').fancybox({
  loop: true,
  infobar : true,
  hash: false,
  backFocus : false,
  animationEffect : "fade",
  thumbs: {
  autoStart: false
},
// buttons: [
//   'slideShow',
//   'fullScreen',
//   'close'
//   ]
} );


//Biografija page carousel  
$('.slider-for').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  asNavFor: '.slider-nav',
  adaptiveHeight: true,
  infinite: true

});

$('.slider-nav').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  prevArrow: $('.prev'),
    nextArrow: $('.next'),
  asNavFor: '.slider-for',
  responsive: [
    {
        breakpoint: 1101,
          settings: {
            "slidesToShow": 2,
          }
    },
    {
        breakpoint: 1001,
          settings: {
            "slidesToShow": 3,
          }
    },
    {
        breakpoint: 651,
          settings: {
            "slidesToShow": 2,
          }
    }
]

});

  //
  // Form validation 
  //

  $("#form").validate({
    errorPlacement: function(){
        return false;  // suppresses error message text
    },
    errorClass: 'error-validation-class'
    });  
    $.validator.addClassRules({
        required: {
            required: true,
            minlength: 2
        },
        requiredemail: {
            required: true,
            email: true
        },
        number: {
          required: true,
          number: true,
          minlength: 7 
        },
        mintnine: {
            required: true,
            minlength: 9
        }
    });

//
// Form sending 
//
    $(document).on('submit', '#form', function(event){
      event.preventDefault();
      
      $('.spinner').toggleClass('display-none');
      $('.on-top-bg').toggleClass('display-none');
      var formData = new FormData(this);
      formData.append('action', 'send_contact_form_message');
      
      jQuery.ajax({
          url: variables.ajax_url,
          data: formData,
          processData: false,
          contentType: false,
          type: 'POST',
          success: function (data) {
              console.log(data);
              
              $('.spinner').toggleClass('display-none');
              $('.on-top-bg').toggleClass('display-none');
              $('.post-send-mess').toggleClass('display-none');
              setTimeout(function()  {$('.post-send-mess').toggleClass("display-none"); }, 3000);

              var inputValue = document.querySelectorAll('input');
              for(var i = 0; i < inputValue.length; i++){
                  inputValue[i].value = '';
              }
              document.querySelector('#message').value = '';

          }
      });
  });

//
// Load more images in gallery page
//
  $('.event-btn').click(function(){

    var attr_ID = $(this).attr('data-post-id');
    $('div[load-data-post-id='+attr_ID+']').toggleClass('display-none');

    var formData = new FormData();
    formData.append('action', 'load_more_images');
    formData.append('number', attr_ID);
    
    jQuery.ajax({
      url: variables.ajax_url,
      type: 'POST',
      processData: false,
      contentType: false,
      data: formData,
      success: function(data) {
        // console.log(data );

        $('div[load-data-post-id='+attr_ID+']').toggleClass('display-none');
        $('div[data-post-id='+attr_ID+']').append(data);
        $('button[data-post-id='+attr_ID+']').css("display", "none");
    }
    });
  });

//
// Agenda full description on click
//
$('.open-descr').click(function(){

  var data_ID = $(this).attr('agenda-post-id');
  
  $(' div[agenda-post-id='+data_ID+']').toggleClass('display-none');
  setTimeout(function()  {$(' div[agenda-post-id='+data_ID+']').toggleClass('onShow'); }, 100);

});

//
// Agenda scroll to element
//
if(window.location.hash) {
  var hash = window.location.hash.substring(1);

  var target = $(' li[id='+hash+']');
  
  $('html, body').stop().animate({
    scrollTop: target.offset().top-16
  }, 500, 'linear');

  setTimeout(function()  {$(' div[agenda-post-id='+hash+']').toggleClass('display-none'); }, 600);
  setTimeout(function()  {$(' div[agenda-post-id='+hash+']').toggleClass('onShow'); }, 700);
  
} 


//
// Mob nav menu
//
  $('.checkbox').click(function(){
    $('html').toggleClass('hidden');
  });


//
// Select
//

//Agenda select
  $('.filter').select2({
    placeholder: 'Filtruoti pagal datą'
  });

//Map select
  $('.search-item').select2({
    placeholder: 'Pasirinkite'
  });
 
//
// Filter form select
//
  $('.filter').on('change', function(){
    $('#filter-form').submit();
  });

//
//Copy text on click
//
  $(".copy-btn").click(function(){
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($('.bill-number').text()).select();
    document.execCommand("copy");
    $temp.remove();

    $('.post-copy-mess').toggleClass('display-none');
    setTimeout(function()  {$('.post-copy-mess').toggleClass("display-none"); }, 1500);

  });

});


//
// Map
//

google.maps.event.addDomListener(window, 'load', init);
        
function init() {
    
    var mapOptions = {
        zoom: 11,
        
        center: new google.maps.LatLng(54.4, 24.05), 

        disableDefaultUI: true,

        styles: [{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#d3d3d3"}]},{"featureType":"transit","stylers":[{"color":"#808080"},{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"visibility":"on"},{"color":"#b3b3b3"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"weight":1.8}]},{"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"color":"#d7d7d7"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#ebebeb"}]},{"featureType":"administrative","elementType":"geometry","stylers":[{"color":"#a7a7a7"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#efefef"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#696969"}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"color":"#737373"}]},{"featureType":"poi","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"color":"#d6d6d6"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"color":"#dadada"}]}],

    

    };

    


    var mapElement = document.querySelector('.map');

    var map = new google.maps.Map(mapElement, mapOptions);

  //   var marker = new google.maps.Marker({
  //     position: new google.maps.LatLng(40.6700, -73.9400),
  //     map: map,
  // });

  var geocoder = new google.maps.Geocoder();
  var address 
  jQuery(document).ready(function($) {
  $('.search-item').on('select2:select', function (e) {
    $('.map-location').css('display', 'none');
    address = e.params.data.id;
    geocodeAddress(address, geocoder, map);
  });
});

}


function geocodeAddress(address, geocoder, resultsMap) {
  

  geocoder.geocode({
    'address': address
  }, function(results, status) {
    if (status === google.maps.GeocoderStatus.OK) {
      resultsMap.fitBounds(results[0].geometry.viewport);
      jQuery('.map-location').css('display', 'block');
      jQuery('.search-result').toggleClass('display-none');
      setTimeout(function()  {jQuery('.search-result').toggleClass("display-none"); }, 3000);

    } 
  });
}





