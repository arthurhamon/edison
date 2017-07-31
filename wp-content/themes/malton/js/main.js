//Инициализируем плагин после загруски всех картинок
$(window).load(
	function() {

		$('.front-page-first-screen .bg .gallery li.active').addClass('start-anim');
	
		$('.preloader').fadeOut( "slow" );
		
		if(!$('body').hasClass('is-tablet')) {
			if($('.full-window-height').length) {
				var fullScreenHeight = $(window).innerHeight();
				if(!$('body').hasClass('is-front-page')) {
					fullScreenHeight -= $('.header').height();
				}
				$('.full-window-height').innerHeight(fullScreenHeight);
			}
		}
		
		$('.shop .brands .wrap-jcarousel').wrapJcarousel();
		$('.services .top-panel .wrap-jcarousel').wrapJcarousel();
		$('.blog .important .wrap-jcarousel').wrapJcarousel();
		$('.front-page .hot-hours .wrap-jcarousel').wrapJcarousel();
		$('.about .certificates .wrap-jcarousel').wrapJcarousel();
		
		
		$('.group-same-heights').sameHeight();
		
		$('.header').scrollCheckpoint({className: "is-fixed-header", forClassName: $('body')});
	}
);

if(!$('body').hasClass('is-tablet') && !$('body').hasClass('is-phone')) {
	$('.front-page .list-actions').sparallax("100%", 0.1, true, -300);
	$('.front-page .list-actions .left-bg').sparallax("0", 0.1, true, -200);
	$('body').stellar();
	$('.single-product .gallery .thumbnails .item a').on('click', function() {
		$('.single-product .gallery .thumbnails .item').removeClass('active');
		$(this).parents('.item').addClass('active');
		
		var img = '<img src="'+$(this).parents('.item').data('thumb')+'" />'
		$('.single-product .gallery .image a').attr('href', $(this).parents('.item').data('full') );
		$('.single-product .gallery .image a').html(img);
		return false;
	});
}

for(var i=0; i<$('.countdown').length; i++) {
	$('.countdown').eq(i).countdown({
		endtime: new Date($('.countdown').eq(i).data('endtime') * 1000),
		//begintime: new Date($('.countdown').eq(i).data('begintime') * 1000), //Серверное время
		begintime: new Date(), //Время из браузре пользователя
		hours: $('.countdown').eq(i).find('.wrap-num .hours'),
		minutes: $('.countdown').eq(i).find('.wrap-num .minutes'),
		seconds: $('.countdown').eq(i).find('.wrap-num .seconds'),
	});
}




$(function(){
    $('.spinner .btn-control:first-of-type').on('click', function() {
      var btn = $(this);
      var input = btn.closest('.spinner').find('input');
	  
	  //Если макс не указан то не проверяем
      if ((input.attr('max') == undefined || input.attr('max') == '') || parseInt(input.val()) < parseInt(input.attr('max'))) {    
        input.val(parseInt(input.val(), 10) + 1);
		$('[name=update_cart]').prop("disabled", false);
      } else {
        btn.next("disabled", true);
      }
	  input.trigger('keydown');	  
	  return false;
    });
    $('.spinner .btn-control:last-of-type').on('click', function() {
      var btn = $(this);
      var input = btn.closest('.spinner').find('input');
      if ((input.attr('min') == undefined || input.attr('min') == '')  || parseInt(input.val()) > parseInt(input.attr('min'))) {    
        input.val(parseInt(input.val(), 10) - 1);
		$('[name=update_cart]').prop("disabled", false);
      } else {
        btn.prev("disabled", true);
      }
	  return false;
    });
});


$('#switch-menu-categories').on('click', function() {
	if($(this).parent().hasClass('show')) {
		$(this).parent().removeClass('show');
		$('html').removeClass('fancybox-lock');
		$('.header .fixed-part').removeClass('fancybox-padding');
		$('html').removeClass('fancybox-margin');
		$($(this).attr('href')).hide( "slide", {direction: 'left'}, 150);
	} else {
		$(this).parent().addClass('show');
		$('html').addClass('fancybox-lock');
		$('.header .fixed-part').addClass('fancybox-padding');
		$('html').addClass('fancybox-margin');
		$($(this).attr('href')).show( "slide", {direction: 'left'}, 150);
	}
	return false;
});


$('.switch-menu-first-screen').on('click', function() {
	function_switch_menu_first_screen();
	return false;
});
function function_switch_menu_first_screen() {
	$('.switch-menu-blog-categories').parent().removeClass('show')
	$('#menu-blog-categories').hide( "slide", {direction: 'left'}, 150);
	
	$('#switch-menu-categories').parent().removeClass('show')
	$('#menu-categories').hide( "slide", {direction: 'left'}, 150);
	
	if($('.switch-menu-first-screen').parent().hasClass('show')) {
		$('.switch-menu-first-screen').parent().removeClass('show');
		$('html').removeClass('fancybox-lock');
		$('html').removeClass('fancybox-margin');
		$($('.switch-menu-first-screen').attr('href')).hide( "slide", {direction: 'left'}, 150);
	} else {
		$('.switch-menu-first-screen').parent().addClass('show');
		$('html').addClass('fancybox-lock');
		$('html').addClass('fancybox-margin');
		$($('.switch-menu-first-screen').attr('href')).show( "slide", {direction: 'left'}, 150);
	}	
}


$('.switch-menu-blog-categories').on('click', function() {
	$('.switch-menu-first-screen').parent().removeClass('show')
	$('#menu-first-screen').hide( "slide", {direction: 'left'}, 150);
	if($(this).parent().hasClass('show')) {
		$(this).parent().removeClass('show');
		$('html').removeClass('fancybox-lock');
		$('html').removeClass('fancybox-margin');
		$($(this).attr('href')).hide( "slide", {direction: 'left'}, 150);
	} else {		
		$(this).parent().addClass('show');
		$('html').addClass('fancybox-lock');
		$('html').addClass('fancybox-margin');
		$($(this).attr('href')).show( "slide", {direction: 'left'}, 150);
	}
	return false;
});

$('#menu-first-screen .close-area').on('click', function() {
	function_switch_menu_first_screen();
});


$('.switch-menu-specialists').on('click', function() {
	if($(this).parent().hasClass('active')) {
		$('.switch-menu-specialists').parent().removeClass('active');
		$('html').removeClass('fancybox-lock');
		$('.header .fixed-part').removeClass('fancybox-padding');
		$('html').removeClass('fancybox-margin');
		$($(this).attr('href')).hide( "slide", {direction: 'left'}, 150);
	} else {		
		$('.switch-menu-specialists').parent().addClass('active');
		$('html').addClass('fancybox-lock');
		$('.header .fixed-part').addClass('fancybox-padding');
		$('html').addClass('fancybox-margin');
		$($(this).attr('href')).show( "slide", {direction: 'left'}, 150);
	}
	return false;
});

$('#menu-specialists .close-area').on('click', function() {
	$('#switch-menu-specialists').click();
})


//Показываем подкатегории при ховере
$('.menu-categories .parents-list ul li a').on('mouseenter', function() {
	$('.menu-categories .parents-list ul li a').removeClass('active');
	$(this).addClass('active');
	$('.menu-categories .childs-list>ul').hide();
	$('.menu-categories .brans-list .item').hide();
	$($(this).attr('href')).show();
	$($(this).data('brand-list')).show();
});

$(".fancybox-full-screen").fancybox({
	width: "100%", 
	height: "100%",
	autoSize: false,
	margin: [0,0 ,0, 0],
	padding: [0, 0, 0, 0],
});
$(".fancybox").fancybox({
	margin: [0,0 ,0, 0],
	padding: [40, 40, 0, 0],
});


//Здесь мы настраиваем онлайн регестрацию с уже заполненными полями
var $actPresetRegistration;
$(".fancybox-preset-registration").on('click', function() {
	$actPresetRegistration = $(this);
});
$(".fancybox-preset-registration").fancybox({
	width: "100%", 
	height: "100%",
	autoSize: false,
	margin: [0,0 ,0, 0],
	padding: [0, 0, 0, 0],
	afterClose: function() {
		//Онуляем родительские категории
		var $selectpickerParentServices = $('#fancybox-registration .selectpicker.parent-services');
		$selectpickerParentServices.selectpicker('setreadonly', false);
		$selectpickerParentServices.find('option').prop("selected", false);
		$selectpickerParentServices.selectpicker('refresh');	
		$selectpickerParentServices.selectpicker('render');
		
		//Обнуляем дочерние категории
		var $selectpickerChildServices = $('#fancybox-registration .selectpicker.child-services');
		$selectpickerChildServices.selectpicker('setreadonly', false);
		$selectpickerChildServices.html('');
		$selectpickerChildServices.selectpicker('refresh');	
		$selectpickerChildServices.selectpicker('render');
		
		//Обнуляем дату
		$inputDate = $( "#fancybox-registration input[name=date].datepicker");
		$inputDate.val('');
		$inputDate.prop('readonly', false);
		$inputDate.datepicker({'dateFormat': 'dd-mm-yy'});
		
		//Обнуляем время
		$inputTime = $( "#fancybox-registration input[name=your-time]");
		$inputTime.val('');
		$inputTime.prop('readonly', false);
		
		//Обнуляем имя
		$( "#fancybox-registration input[name=your-name]").val('');
		
		//Обнуляем Телефон
		$( "#fancybox-registration input[name=your-phone]").val('');
		
		//Обнуляем email
		$( "#fancybox-registration input[name=your-email]").val('');
	},
	beforeShow: function() {		
		var yourTime = $actPresetRegistration.data('time');
		var date = $actPresetRegistration.data('date');
		var serviceId = $actPresetRegistration.data('service-id');		
		var serviceChildId = $actPresetRegistration.data('service-child-id');		
		var datafrom = $actPresetRegistration.data('from');		
		//Выбираем услугу и запрещаем редактировать
		if(serviceId != undefined) {
			var $selectpickerParentServices = $('#fancybox-registration .selectpicker.parent-services');
			$selectpickerParentServices.find('option[data-id='+serviceId+']').prop("selected", true);			
			$selectpickerParentServices.selectpicker('render');
			
			
			//Имитируем клик для заполнения дочерних категорий
			$selectpickerParentServices.trigger('hidden.bs.select');
			
			
			
			$selectpickerParentServices.selectpicker('setreadonly', true);
			$selectpickerParentServices.selectpicker('refresh');
		}
		//Выбираем услугу и запрещаем редактировать
		if(serviceChildId != undefined) {
			var $selectpickerChildServices = $('#fancybox-registration .selectpicker.child-services');
			$selectpickerChildServices.find('option[data-id='+serviceChildId+']').prop("selected", true);			
			$selectpickerChildServices.selectpicker('render');
			
			
			//Имитируем клик для заполнения дочерних категорий
			$selectpickerChildServices.trigger('hidden.bs.select');
			
			
			
			$selectpickerChildServices.selectpicker('setreadonly', true);
			$selectpickerChildServices.selectpicker('refresh');
		}
		//Устанавливаем дату и запрещаем редактировать
		if(date != undefined) {
			$inputDate = $( "#fancybox-registration input[name=date].datepicker");
			$inputDate.val(date);
			$inputDate.prop('readonly', true);
			$inputDate.datepicker( "destroy" );
			/*
			$inputDate.datepicker( "setDate", date );
			$inputDate.prop('readonly', true);
			$inputDate.datepicker( "refresh" );*/
		}
		//Устанавливаем время и запрещаем редактировать
		if(date != undefined) {
			$inputTime = $( "#fancybox-registration input[name=your-time]");
			$inputTime.val(yourTime);
			$inputTime.prop('readonly', true);
		}
		//Устанавливаем время и запрещаем редактировать
		if(datafrom != undefined) {
			$inputFrom = $( "#fancybox-registration input[name=from]");
			$inputFrom.val(datafrom);
			$inputFrom.prop('readonly', true);
		}
	}
});



//Заполняем все селекты родителями услуг
var commonListServicesParents = $('ul.common-list-services > li > span');
$('.selectpicker.parent-services').html('');
$('.selectpicker.child-services').html('');
for(var i=0; i<commonListServicesParents.length; i++) {	
	$('.selectpicker.parent-services').append('<option data-id="'+commonListServicesParents.eq(i).data('id')+'" value="'+commonListServicesParents.eq(i).html()+'">'+commonListServicesParents.eq(i).html()+'</option>');
}
$('.selectpicker.selectpicker-live-search').selectpicker({
	title: 'Или начните вводить название',
	style: 'btn-selectpicker',
	liveSearch: true,
});
//Меняем значение связанного селектора
$('.selectpicker.parent-services').on('hidden.bs.select', function (e) {
	var id = $(this).find('option:selected').data('id');
	
	var childs = $('ul.common-list-services > li[data-parent-id='+id+']').find('ul li');
	
	var wrap = $(this).parents('.wrap-selectpicker-link');
	if(wrap.length) {
		var childsSelectpicker = wrap.find('.selectpicker.child-services');
		childsSelectpicker.html('');
		for(var i=0; i<childs.length; i++) {
			childsSelectpicker.append('<option data-id="'+childs.eq(i).data('id')+'" value="'+childs.eq(i).html()+'">'+childs.eq(i).html()+'</option>');
		}
		childsSelectpicker.selectpicker('refresh');
	}
});

$( ".datepicker" ).datepicker({'dateFormat': 'dd-mm-yy'});



//Для Fancybox
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
$('.wrap-input-file input[type="file"]').on('change', function (event, files, label) {
	var file_name = this.value.replace(/\\/g, '/').replace(/.*\//, '');
	var parent = $(this).parents('.wrap-input-file');
	parent.find('.file-name').html(file_name);
});


$('.scroll-to').scrollToAnim({
	topOffset: $('header').height() + 150,
});
$('.scroll-to-first-screen').scrollToAnim({
	topOffset: 0,
});


$(function () {
	$(window).scroll(function () {
		if ($(this).scrollTop() > $(window).height()) {
			$('#back-top').fadeIn();
		} else {
			$('#back-top').fadeOut();
		}
		
		if ($(this).scrollTop() > 100) {
			$('.scroll-spy').addClass('is-scroll');
		} else {
			$('.scroll-spy').removeClass('is-scroll')
		}
	});

	$('#back-top a').click(function () {
		$('body,html').animate({
			scrollTop: 0
		}, 800);
		return false;
	});
});

if($('.front-page-first-screen .bg .gallery li').length) {
	var galleryTimerMulti = window.setInterval("runMultipleTimerGallery();", 8000);
	function runMultipleTimerGallery()
	{	
		var index = $('.front-page-first-screen .bg .gallery li.active').index();
		index++;
		if(index >= $('.front-page-first-screen .bg .gallery li').length) {
			index = 0;
		}
		$('.front-page-first-screen .bg .gallery li.active').removeClass('active');
		$('.front-page-first-screen .bg .gallery li').eq(index).addClass('active').addClass('start-anim');
	}
}


/*
$(window).load(
	function() {
		$('.front-page .second-screen .wrap-jcarousel').wrapJcarousel();
		$('.front-page .history .wrap-jcarousel').wrapJcarousel();
		$('.reviews .wrap-jcarousel').wrapJcarousel();
		
		$('.transformation .posts .item .slider .wrap-jcarousel').wrapJcarousel();
		$('.transformation-single .post .posts .item .slider .wrap-jcarousel').wrapJcarousel();
		
		
		$('.group-same-heights').sameHeight();
	}	
);


$(".fancybox").fancybox({
	padding: [0, 0, 0, 0]
});

var timerMultiFancyboxClose;
function fancyboxClose() {
	timerMulti = window.setInterval("runMultipleFancyboxClose();", 1000);
}
function runMultipleFancyboxClose()
{
	var text = $('.fancybox-skin div.wpcf7-response-output').html();
	if(text != '') {
		window.clearTimeout(timerMultiFancyboxClose);
		$.fancybox.open('<div class="facnybox-form">'+text+'</div>');
	}
}


//Инициализируем плагин после загруски всех картинок
$(window).load(
	function() {
		
		$('.services .reviews .wrap-jcarousel').wrapJcarousel({responsiveCountItem: 1});
		$('.services .gallery .wrap-jcarousel').wrapJcarousel();
		
		$('.single-portfolio .wrap-jcarousel').wrapJcarousel({responsiveCountItem: 1});
		
		$('.portfolio .wrap-jcarousel').wrapJcarousel({responsiveCountItem: 1, isFullHeight: true});
		
		$('.about .slider .wrap-jcarousel').wrapJcarousel();
		$('.about .gallery .wrap-jcarousel').wrapJcarousel();
	}
);
//Фансибокс
//Показываем/скрываем меню
$('.fixed-left-part .menu > li').on('mouseenter', function() {
	$(this).find('.wrap-sub-menu')
	.stop( true, true ) //Останавливаем предыдущую анимацию
	.show( "slide", {direction: 'left'}, 150);
});

$('.fixed-left-part .menu > li').on('mouseleave', function() {
	$(this).find('.wrap-sub-menu')
	.stop( true, true ) //Останавливаем предыдущую анимацию
	.hide( "slide", {direction: 'left'}, 150);
});

$('.fixed-left-part-responsive .menu').on('click', function() {
	$('.fixed-left-part-responsive').addClass('is-showed');
	$('.fixed-left-part').show( "slide", {direction: 'left'}, 150);
	return false;
});
$('body').on('click', '.fixed-left-part-responsive.is-showed', function() {
	$('.fixed-left-part-responsive').removeClass('is-showed');
	$('.fixed-left-part').hide( "slide", {direction: 'left'}, 150, function() {
		$(this).css('display', '');
	});
	return false;
});



/*
$('.presentation .items .item').hoverTarget({
	targetElements: $('.presentation .hover-elements .item'), 
	activeClass: 'active',
	hoverClass: 'is-hover',
	whoPrescribedHoverClass: $('.presentation .items')
});

$('#advantages').sparallax("50%", 0.1, true, -300);
$('#presentation').sparallax("50%", 0.1, true, 500);

$('body').scrollspy({ targets: ['#navbar-main-menu', '#navbar-mobile-main-menu'] });
$('.animation-background').runByElements({ interval: 5000 });
*/