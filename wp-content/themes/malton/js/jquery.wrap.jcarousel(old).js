/*
Структура
<div class="wrap-jcarousel">
	<div class="jcarousel">
		<ul>
			<li></li>
		</ul>
	</div>
	<a href="#" class="jcarousel-prev"></a>
	<a href="#" class="jcarousel-next"></a>
	<div class="jcarousel-scroll-pagination"></div>
</div>
*/

(function( $ ){

var methods = {
	init : function( options ) { 
		var settings = $.extend( {
			responsiveCountItem: 0,
			//На всю ширину элемента
			isFullHeight: false,
		}, options);
		
		var jcarouselcontrolActive = function() {
			$(this).removeClass('inactive');
		};
		var jcarouselcontrolInactive = function() {
			$(this).addClass('inactive');
		};
		
		function initJcarouselControl(jelement) {
			var wrapJcarousel = jelement.parents('.wrap-jcarousel');
			if( wrapJcarousel.find('.jcarousel-prev').length) {	
				wrapJcarousel.find('.jcarousel-prev')
				.on('jcarouselcontrol:active', jcarouselcontrolActive)
				.on('jcarouselcontrol:inactive', jcarouselcontrolInactive)
				.jcarouselControl({
					target: '-=1',
					carousel: jelement
				});
			}
			if( wrapJcarousel.find('.jcarousel-next').length) {	
				wrapJcarousel.find('.jcarousel-next')
				.on('jcarouselcontrol:active', jcarouselcontrolActive)
				.on('jcarouselcontrol:inactive', jcarouselcontrolInactive)
				.jcarouselControl({
					target: '+=1',
					carousel: jelement
				});
			}
			
			wrapJcarousel.swipe( {
				swipeRight:function(event, direction, distance, duration, fingerCount, fingerData) {
					$(this).find('.jcarousel').jcarousel('scroll', '-=1');
				},
				swipeLeft:function(event, direction, distance, duration, fingerCount, fingerData) {
					$(this).find('.jcarousel').jcarousel('scroll', '+=1');
				}
			});
			
		}
		this.find('.jcarousel').on('jcarousel:create', function() {
			//Инициализируем управление
			initJcarouselControl($(this));	
				
		});		
		this.find('.jcarousel').on('jcarousel:destroyend', function() {
			//ПереИнициализируем управление
			var wrapJcarousel = $(this).parents('.wrap-jcarousel');
			if( wrapJcarousel.find('.jcarousel-prev').length) {	
				wrapJcarousel.find('.jcarousel-prev').off().jcarouselControl('destroy');
			}
			if( wrapJcarousel.find('.jcarousel-next').length) {	
				wrapJcarousel.find('.jcarousel-next').off().jcarouselControl('destroy');
			}	
		});
		this.find('.jcarousel').on('jcarousel:create jcarousel:reloadend', function() {
			
			var wrapJcarousel = $(this).parents('.wrap-jcarousel'),
				jelement = $(this),
				wrapWidth = jelement.innerWidth();
				wrapHeight = jelement.innerHeight();
			
			
			var jitems = jelement.jcarousel('items')
			//Пронумеруем каждый элемень(для скролинга)
			for(var i=0; i<jitems.length; i++) {
				jitems.eq(i).attr('data-index', i);
			}
			//Если задана responsiveCountItem то делаем все элементы фиксированой шириной
			if(settings.responsiveCountItem > 0) {
				jitems.css('width', wrapWidth/settings.responsiveCountItem + 'px');		
			}	
			if(settings.isFullHeight) {
				var jitems = jelement.jcarousel('items')
				jitems.css('height', wrapHeight + 'px');	
			}

			//Инициализируем скролл
			var scrollPagination = wrapJcarousel.find('.jcarousel-scroll-pagination');
			if(scrollPagination.length) {		
				//Находим слайдер
				var jitems = jelement.jcarousel('items');
				//считаем общюю ширину элементов
				var totalWidth = 0;
				for(var i=0; i<jitems.length; i++) {
					totalWidth += jitems.eq(i).outerWidth();
				}
				//вычисляем ширину скрола
				
				var jcarouseWidth = jelement.width();
				var factor = jcarouseWidth / totalWidth;
				if(jcarouseWidth == 0 || totalWidth == 0) {
					factor = 0;
				}
				scrollPagination.html('<div class="jcarousel-slider"></div>');
				
				var jcarouselSliderWidth = Math.floor(jcarouseWidth * factor);
				
				if(totalWidth < jcarouseWidth) {
					jcarouselSliderWidth = jcarouseWidth;
				}			
				scrollPagination.find('.jcarousel-slider').css('width', jcarouselSliderWidth + 'px');
			}		
			
		}).jcarousel();
		
		//Инициализируем постраничную пагинацию
		var jpagination = this.find('.jcarousel-pagination');
		if(jpagination.length) {		
			jpagination
			.on('jcarouselpagination:active', 'a', function() {
				$(this).addClass('active');
			})
			.on('jcarouselpagination:inactive', 'a', function() {
				$(this).removeClass('active');
			}).jcarouselPagination({
				carousel: this.find('.jcarousel'),
				item: function(page) {
					return '<a href="#' + page + '"></a>';
				}
			});
		}
		
		this.find('.jcarousel').on('jcarousel:visiblein', 'li', function(event, carousel) {
			var wrapJcarousel = $(this).parents('.wrap-jcarousel');
			var scrollPagination = wrapJcarousel.find('.jcarousel-scroll-pagination');			
			var totalWidth = 0;
			var jitems = carousel.items();
			for(var i=0; i<jitems.length; i++) {
				totalWidth += jitems.eq(i).outerWidth();
			}
			//вычисляем ширину скрола
			var jcarouselSliderTotalWidth = scrollPagination.width();
			//вычисляем ширину скрола
			var jcarouselSliderTotalWidth = scrollPagination.width();
			var positionScroll = 0;
			//Получаем текущий индекс элемента
			var curentIndex = $(this).attr('data-index');
			//Пробегаемся по всем элементам до текущейго элемента
			console.log(curentIndex);
			for(var j=0; j<curentIndex; j++) {
				positionScroll += carousel.items().filter('[data-index='+j+']').outerWidth();
			}
			
			var leftPosition = positionScroll / totalWidth * jcarouselSliderTotalWidth;
			console.log(positionScroll  + ' / ' + totalWidth  + ' * ' + jcarouselSliderTotalWidth);
			scrollPagination.find('.jcarousel-slider').css('left', leftPosition + 'px');
		});
		/*
		this.find('.jcarousel').on('jcarousel:scrollend', function(event, carousel, target, animate) {
			var wrapJcarousel = $(this).parents('.wrap-jcarousel');
			var scrollPagination = wrapJcarousel.find('.jcarousel-scroll-pagination');			
			var totalWidth = 0;
			var jitems = $(this).jcarousel('items');
			for(var i=0; i<jitems.length; i++) {
				totalWidth += jitems.eq(i).outerWidth();
			}
			//вычисляем ширину скрола
			var jcarouselSliderTotalWidth = scrollPagination.width();
			
			//Растовляем точки скрола
			var visibleElements = $(carousel.visible());
			var curentIndex = visibleElements.eq(0).attr('data-index');
			var positionScroll = 0;
			console.log(curentIndex);
			for(var j=0; j<curentIndex; j++) {
				positionScroll += $(this).find('ul>li[data-index='+j+']').outerWidth();
			}
			
			var leftPosition = positionScroll / totalWidth * jcarouselSliderTotalWidth;
			console.log(positionScroll  + ' / ' + totalWidth  + ' * ' + jcarouselSliderTotalWidth);
			scrollPagination.find('.jcarousel-slider').css('left', leftPosition + 'px');
		});*/
		return this;
	},
	reload : function( ) {
		this.find('.jcarousel').jcarousel('reload');
	},
	destroy : function( ) {
		this.find('.jcarousel').jcarousel('destroy').off().children('ul').attr('style', 'left: 0px; top: 0px;');
	},
};

$.fn.wrapJcarousel = function( method  ) {	
	if ( methods[method] ) {
      return methods[ method ].apply( this, Array.prototype.slice.call( arguments, 1 ));
    } else if ( typeof method === 'object' || ! method ) {
      return methods.init.apply( this, arguments );
    } else {
      $.error( 'Метод с именем ' +  method + ' не существует для jQuery.tooltip' );
    } 
  };
})( jQuery );