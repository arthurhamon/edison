(function( $ ){
	
	$.fn.sameHeight = function( options ) {  
		var settings = $.extend( {
			itemClass: '.item-same-height',
		}, options);
		return this.each(function() {	
			var items = $(this).find(settings.itemClass);
			var maxHeight = 0;
			for(var i=0; i<items.length; i++) {
				var newHeight = items.eq(i).outerHeight();
				console.log(newHeight);
				maxHeight = (maxHeight < newHeight) ? newHeight : maxHeight;
			}
			items.outerHeight(maxHeight);
		});
	};
	
})( jQuery );