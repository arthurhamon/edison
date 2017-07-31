(function( $ ){

  $.fn.scrollToAnim = function( options ) {  

    var settings = $.extend( {
		topOffset: 0,
    }, options);
	this.click(function () {
		var elementClick = $(this).attr("href")
		if(elementClick.length) {
			var destination = $(elementClick).offset().top - settings.topOffset;
			jQuery("html:not(:animated),body:not(:animated)").animate({scrollTop: destination}, 800);
		}
		return false;
	});

  };
})( jQuery );