(function($){

$(function(){
	$('.btn-menu').click(function(event) {
		$('.main-navigation').slideToggle(500);
		return false;
	});

	if($('#content').length != 0 && $(window).width() >=768){
		setTimeout(function(){
			var sidebar_height = $('#sidebar').height();
			$('#content').css({'min-height': sidebar_height});
		}, 500);
	}
});

})(jQuery);