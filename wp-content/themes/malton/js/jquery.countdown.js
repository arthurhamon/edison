(function( $ ){
	
  $.fn.countdown = function( options ) {  
  
    var settings = $.extend( {
		endtime: new Date(), //new Date(year, month, date, hours, minutes, seconds, ms)
		//для коректной работы должна быть меньше endtime
		begintime: new Date(), //new Date(year, month, date, hours, minutes, seconds, ms) 
		days: false,
		hours: false,
		minutes: false,
		seconds: false,
		intervalFunc: false, //Функция со всеми параметрами таймера для доп обработки
	}, options);	
	
	
	var $this = this;
	
	var timerMultiCountdown;
		
	
	var runMultipleCountdown = function() {
		var countdownStr = getTimeRemaining();
		if(countdownStr.total <= 0) { 
			countdownStr.days = '0'; countdownStr.hours = '0'; countdownStr.minutes = '0'; countdownStr.seconds = '0'; 
			//Завершаем таймер
			window.clearTimeout(timerMultiCountdown);
		
		}
		
		if(settings.days != false) settings.days.html(format(countdownStr.days));
		if(settings.hours != false) settings.hours.html(format(countdownStr.hours));
		if(settings.minutes != false) settings.minutes.html(format(countdownStr.minutes));
		if(settings.seconds != false) settings.seconds.html(format(countdownStr.seconds));
		
		if(settings.intervalFunc) {
			settings.intervalFunc(countdownStr);
		}
		
		
	};	
	
	timerMultiCountdown = window.setInterval(runMultipleCountdown, 1000);	
	
	//Добавляем 0 в начало и каждый элемент запихиваем в спан
	function format(num) {
		var res = '';
		var strNum = num + "";
		if(strNum.length == 1) strNum = "0"+strNum;
		for(var i=0; i<strNum.length; i++) {
			res += '<span class="wrap-item"><span class="item">'+strNum.charAt(i)+'</span></span>';
		}
		return res;		
	}	
	
	function getTimeRemaining(){
	  var f = Date.parse(settings.endtime) - Date.parse(settings.begintime);
	  var t = Date.parse(settings.endtime) - Date.parse(new Date());
	  var seconds = Math.floor( (t/1000) % 60 );
	  var minutes = Math.floor( (t/1000/60) % 60 );
	  var hours = Math.floor( (t/(1000*60*60)) % 24 );
	  var days = Math.floor( t/(1000*60*60*24) );
	  return {
		'full': f,
		'total': t,//Сколько всего от текущего времени
		'days': days,
		'hours': hours,
		'minutes': minutes,
		'seconds': seconds
	  };
	}
  };
})( jQuery );