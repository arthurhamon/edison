(function( $ ){

  $.fn.hoverTarget = function( options ) {  

    // Создаём настройки по-умолчанию, расширяя их с помощью параметров, которые были переданы
    var settings = $.extend( {
      parentTargetElements : false,
      activeClass : 'active',
      hoverClass : 'is-hover',
	  whoPrescribedHoverClass : false
    }, options);

    return this.each(function() {        
		$(this).on('mouseenter', function() {
			settings.targetElements.removeClass(settings.activeClass);	
			settings.targetElements.filter($(this).attr('href')).addClass(settings.activeClass);			
			
			$(this).addClass(settings.activeClass);

			if(settings.whoPrescribedHoverClass != false) {
				settings.whoPrescribedHoverClass.addClass(settings.hoverClass);
			}
			

		});
		$(this).on('mouseleave', function() {
			settings.targetElements.removeClass(settings.activeClass);
			
			$(this).removeClass(settings.activeClass);
			
			if(settings.whoPrescribedHoverClass != false) {
				settings.whoPrescribedHoverClass.removeClass(settings.hoverClass);
			}
		});
    });

  };
})( jQuery );