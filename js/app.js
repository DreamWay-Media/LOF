$(document).ready(function(){
	$(function() {
	  $('ul.products').addClass(' row-eq-height');
	});	
	$(function() {
	  $('.slick-track').addClass(' row-eq-height');
	});
  /* Carousel */
  if($('#owl-carousel').length){
    $('#owl-carousel').owlCarousel({
	  autoplay: true,
      loop: true,
      margin: 0,
      nav: false,
      dots:true,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:1
          },
          1000:{
              items:1
          }
        }
    });
  }
	if($('#owl-carousel-latest').length){
    $('#owl-carousel-latest').owlCarousel({
	  autoplay: true,
      loop: true,
      margin: 0,
      nav: false,
      dots:true,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:1
          },
          1000:{
              items:1
          }
        }
    });
  }
  if($('#owl-carousel-flags').length){
    $('#owl-carousel-flags').owlCarousel({
	  autoplay: true,
      loop: true,
      margin: 10,
      nav: false,
      dots:false,
      responsiveClass:true,
      responsive:{
          0:{
              items:4
          },
          600:{
              items:6
          },
          1000:{
              items:8
          }
        }
    });
  }
})