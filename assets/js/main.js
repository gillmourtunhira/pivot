jQuery.noConflict();
jQuery( document ).ready(function( $ ) {

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