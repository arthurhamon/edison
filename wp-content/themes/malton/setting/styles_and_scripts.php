<?php
//Подключаем стили
function remove_head_scripts() {
	remove_action('wp_head', 'wp_print_scripts');
	remove_action('wp_head', 'wp_print_head_scripts', 9);
	remove_action('wp_head', 'wp_enqueue_scripts', 1);

	add_action('wp_footer', 'wp_print_scripts', 5);
	add_action('wp_footer', 'wp_enqueue_scripts', 5);
	add_action('wp_footer', 'wp_print_head_scripts', 5);
}

if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
	add_action( 'wp_enqueue_scripts', 'remove_head_scripts' );
}
function theme_name_scripts() {	
	remove_action('wp_head', 'wp_print_scripts');
	remove_action('wp_head', 'wp_print_head_scripts', 9);
	remove_action('wp_head', 'wp_enqueue_scripts', 1);

	add_action('wp_footer', 'wp_print_scripts', 5);
	add_action('wp_footer', 'wp_enqueue_scripts', 5);
	add_action('wp_footer', 'wp_print_head_scripts', 5);
	
	//get_bloginfo('template_url')
	//Стили
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css' );	
	wp_enqueue_style( 'fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'jcarousel', get_template_directory_uri() . '/css/jcarousel.css' );
	wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/fancybox/source/jquery.fancybox.css' );
	wp_enqueue_style( 'jquery-ui', get_template_directory_uri() . '/css/jquery-ui-1.9.2.custom.min.css' );
	wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css', array(), '1.0.0' );
	wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );
	
	/*
	wp_enqueue_style( 'fonts', 'https://fonts.googleapis.com/css?family=Play' );		
	wp_enqueue_style( 'jscrollpane', get_template_directory_uri() . '/css/jquery.jscrollpane.css' );	
	wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );			
	//Скрипты
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js' );	
	
	wp_enqueue_script( 'particleground', get_template_directory_uri() . '/js/jquery.particleground.js' );
	wp_enqueue_script( 'jscrollpane', get_template_directory_uri() . '/js/jquery.jscrollpane.js' );	
	wp_enqueue_script( 'jquery-ui', get_template_directory_uri() . '/js/jquery-ui.min.js' );
	wp_enqueue_script( 'map', get_template_directory_uri() . '/js/map.js' );		
	wp_enqueue_script( 'hoverTarget', get_template_directory_uri() . '/js/jquery.hoverTarget.js' );	
	wp_enqueue_script( 'sparallax', get_template_directory_uri() . '/js/jquery.sparallax.js' );	
	wp_enqueue_script( 'parallax', get_template_directory_uri() . '/js/jquery.parallax.js' );		
	wp_enqueue_script( 'runByElements', get_template_directory_uri() . '/js/jquery.runByElements.js' );	
	*/
	
	wp_enqueue_script( 'google-map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAoIhlfl0vA6Uv0DuIgbriry2cZYDbNw2g&callback=initMap' );	
	wp_enqueue_script( 'jquery-2', get_template_directory_uri() . '/js/jquery.min.js' );
	wp_enqueue_script( 'browser', get_template_directory_uri() . '/js/jquery.browser.min.js' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js' );
	wp_enqueue_script( 'jcarousel', get_template_directory_uri() . '/js/jquery.jcarousel.min.js' );
	wp_enqueue_script( 'touchSwipe', get_template_directory_uri() . '/js/jquery.touchSwipe.min.js' );
	wp_enqueue_script( 'wrap-jcarousel', get_template_directory_uri() . '/js/jquery.wrap.jcarousel.js' );
	wp_enqueue_script( 'sameHeight', get_template_directory_uri() . '/js/jquery.same.height.js' );	
	wp_enqueue_script( 'countdown', get_template_directory_uri() . '/js/jquery.countdown.js' );	
	wp_enqueue_script( 'scrollCheckpoint', get_template_directory_uri() . '/js/jquery.scrollCheckpoint.js' );
	wp_enqueue_script( 'mousewheel', get_template_directory_uri() . '/fancybox/lib/jquery.mousewheel.pack.js' );
	wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/fancybox/source/jquery.fancybox.pack.js' );	
	wp_enqueue_script( 'bootstrap-select', get_template_directory_uri() . '/js/bootstrap-select.js' );	
	wp_enqueue_script( 'defaults-ru_RU', get_template_directory_uri() . '/js/defaults-ru_RU.js' );	
	wp_enqueue_script( 'jquery-ui', get_template_directory_uri() . '/js/jquery-ui-1.9.2.custom.min.js' );	
	wp_enqueue_script( 'jquery.ui.datepicker-ru', get_template_directory_uri() . '/js/jquery.ui.datepicker-ru.js' );	
	wp_enqueue_script( 'sparallax', get_template_directory_uri() . '/js/jquery.sparallax.js' );	
	wp_enqueue_script( 'stellar', get_template_directory_uri() . '/js/jquery.stellar.min.js' );	
	wp_enqueue_script( 'scrollToAnim', get_template_directory_uri() . '/js/jquery.scrollToAnim.js' );	
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array(), '1.0.0' );
	
	
}
if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
	add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );
}
?>