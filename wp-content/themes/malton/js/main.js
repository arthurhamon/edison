$('.scroll-to').scrollToAnim();
$('.wrap-scroll-to a').scrollToAnim();
$(".fancybox-full-screen").fancybox({
	width: "100%", 
	height: "100%",
	autoSize: false,
	margin: [0,0 ,0, 0],
	padding: [0, 0, 0, 0],
	afterShow: function() {
		$('.fancybox-skin .jcarousel').jcarousel('reload');		
	}
});
$(".fancybox").fancybox({
	margin: [0,0 ,0, 0],
	padding: [0, 0, 0, 0],
	minWidth: 500,
});
//Для инициализации плагинов которым важно дождаться загрузки картинок
$(window).load(
	function() {	
		$('#loader').fadeOut();
		$('#sliderScrollbar').sliderScrollbar();
		fullWindowHeight();
		$('.front-page .provider .wrap-jcarousel').wrapJcarousel();		
	}
);
$( window ).resize(function() {
	fullWindowHeight();
});
function fullWindowHeight() {
	//Делаем блоки с классом full-window-height на всю ширину
	if($('.full-window-height').length) {
		var fullScreenHeight = $(window).innerHeight();
		if(!$('body').hasClass('is-front-page')) {
			fullScreenHeight -= $('.header').height();
		}
		$('.full-window-height').innerHeight(fullScreenHeight);
	}
}
//Прикрепляем файл
$('body').on('change', '.wrap-input-file input[type="file"]', function (event, files, label) {
	var file_name = this.value.replace(/\\/g, '/').replace(/.*\//, '');
	var parent = $(this).parents('.wrap-input-file');
	parent.find('.file-name-text').html(file_name);
});

//Плейсхолдер меняется при фокусе на инпут
$('body').on('click', '.wrap-input-text .placeholder', function() {
	$(this).parents('.wrap-input-text').find('input').focus();
});
$('body').on('focusin', '.wrap-input-text input', function() {
	$(this).parents('.wrap-input-text').addClass('is-focus');
});
$('body').on('focusout', '.wrap-input-text input', function() {
	if($(this).val() == '') {
		$(this).parents('.wrap-input-text').removeClass('is-focus');
	}
});
//Для Fancybox Закрываем fancybox после отправки сообщения
var timerMultiFancyboxClose;
function fancyboxClose() {
	timerMultiFancyboxClose = window.setInterval("runMultipleFancyboxClose();", 1000);
}
function runMultipleFancyboxClose()
{
	var text = $('.fancybox-skin div.wpcf7-response-output').html();
	if(text != '') {
		window.clearTimeout(timerMultiFancyboxClose);
		$.fancybox.open('<div class="fancybox-message">'+text+'</div>');
	}
}


$('.front-page .our-projects .items .item').on('mouseenter', function() {
	//Меняем на #54514F
	if($('.front-page .our-projects .items .item.active .logo').length) {
		changeAttrSvg($('.front-page .our-projects .items .item.active .logo').get(0), 'fill', "#54514F");
	}
	
	
	$('.front-page .our-projects .items .item').removeClass('active');
	$(this).addClass('active');
	$('.front-page .our-projects .hover-block .item').removeClass('active');
	$($(this).data('href')).addClass('active');
	
	
	//Меняем на белый цвет
	/*var logo = $(this).find(".logo").get(0);
	var svgDocument = logo.contentDocument;
	var elements = svgDocument.getElementsByTagName("use");
	for(var i=0; i<elements.length; i++) {
		if ( elements[i].getAttribute( 'fill' ) != undefined) {
			elements[i].setAttribute("fill", "#fff");
		}
	}*/
	changeAttrSvg($(this).find(".logo").get(0), 'fill', "#fff");
});
function changeAttrSvg(obj, attr, val) {
	var svgDocument = obj.contentDocument;
	var elements = svgDocument.getElementsByTagName("use");
	for(var i=0; i<elements.length; i++) {
		if ( elements[i].getAttribute( attr ) != undefined) {
			elements[i].setAttribute(attr, val);
		}
	}
}




/*-------------------------------------------------------------------------------------------------------*/

//Показываем мобальное меню
$('.switch-mobile-menu').on('click', function() {
	var $this = $(this);
	if($this.hasClass('active')) {
		$this.removeClass('active');
		$($this.attr('href')).hide('slide', {direction: "left"});
	} else {
		$this.addClass('active');
		$($this.attr('href')).show('slide', {direction: "left"});
	}
});
//Паралакс
$('body').stellar({horizontalScrolling: false, });