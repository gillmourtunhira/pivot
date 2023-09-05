jQuery.noConflict();

// import "bootstrap/dist/js/bootstrap.min.js";
// import 'slick-carousel';

jQuery( document ).ready(function( $ ) {

	$(".partners").slick({

  // normal options...
	infinite: true,
  arrows: true,
  slidesToShow: 4,
  slidesToScroll: 1,
  autoplay: true,
	centerMode: true,
  centerPadding: '10px',
	dots: false,

  cssEase: 'linear',
  // swipeToSlide: true,
  speed: 500,

  // the magic
  responsive: [{

      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        infinite: true
      }

    }, {

      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        dots: true
      }

    }, {

      breakpoint: 300,
      // settings: "unslick" // destroys slick

    }]
});

$(function(){
	console.log('We are in!');
});

// Insights Archive Filter
// $('.cat-list_item').on('click', function(){
// 	$('.cat-list_item').removeClass('active');
// 	$(this).addClass('active');

// 	$.ajax({
// 	  type: 'POST',
// 	  url: frontend_ajax_object.ajaxurl,
// 	  dataType: 'html',
// 	  data: {
// 		action: 'filter_insights',
// 		category: $(this).data('slug'),
// 	  },
// 	  success: function(res){
// 		$('.insights-list').html(res);
// 	  }
// 	});

//   });

});
