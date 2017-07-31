(function( $ ){
//Почереди присваевает класс списку элементов 1 2 3 4 1 2 3 4
  $.fn.runByElements = function( options ) {  

    var settings = $.extend( {
		className: 'active',
		interval: 3000,
    }, options);
	
	console.log(options);
	
	var timerMultiRunByElements;
	var actElementUl = this.find('ul');
	actElementUl.find('li').eq(0).addClass(settings.className);
	var runMultipleRunByElements = function() {
		var li = actElementUl.find('li');
		var length = li.length;
		var index = li.index(actElementUl.find('li.'+settings.className));
		if(li.length-1 == index) {
			index = 0;
		} else {
			index++;
		}
		li.removeClass(settings.className);
		li.eq(index).addClass(settings.className);
	};	
	timerMultiRunByElements = window.setInterval(runMultipleRunByElements, settings.interval);

  };
})( jQuery );