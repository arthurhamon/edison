(function( $ ){
	
  $.fn.scrollCheckpoint = function( options ) {  
  
	if(this.length) {
		var settings = $.extend( {
			className: '',	
			forClassName: false,	
			topOffset: 0,
		}, options);	
		
		var thisElement = this;
		
		var beginOffset = thisElement.offset();
		
		var scrollFunc = function() {
			
			var checkpointY = beginOffset.top - settings.topOffset;
			//Если мы проскролили до нашего элемента то присваиваем ему класс
			if ( $(window).scrollTop() >= checkpointY ){ 
				settings.forClassName.addClass(settings.className);
				//thisElement.css('top', $(window).scrollTop() + settings.topOffset+'px');
			}
			//Если выше элемента то убираем класс
			else {
				settings.forClassName.removeClass(settings.className);
				//thisElement.css('top', beginOffset.top+'px');
			}
		}
		
		$(window).on('scroll', scrollFunc);
		
		$(function() {
			scrollFunc();
		});
	}
  };
})( jQuery );