$('.scroll-to').scrollToAnim();
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
	padding: [40, 40, 0, 0],
});
//Для инициализации плагинов которым важно дождаться загрузки картинок
$(window).load(
	function() {	
		$('#preloader').hide();
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
$('.wrap-input-text .placeholder').click(function(){
	$(this).parents('.wrap-input-text').find('input').focus();
});
$('.wrap-input-text input').focusin(function() {
	$(this).parents('.wrap-input-text').addClass('is-focus');
});
$('.wrap-input-text input').focusout(function() {
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