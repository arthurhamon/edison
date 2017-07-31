<?php
function register_widgets(){
	register_sidebar( array(
		'name' => 'Панель на странице магазина для фильтров',
		'id' => 'shop-header',
		'description' => 'Панель на странице магазина',
		'before_widget' => '<div class="item">',
		'after_widget' => '</div>',
		'before_title' => '<a href="#" data-toggle="dropdown" class="title">',
		'after_title' => '</a>',
	) );
	
	register_sidebar( array(
		'name' => 'Панель на странице магазина для фильтров по цене',
		'id' => 'shop-price-filter',
		'description' => 'Панель на странице магазина',
		'before_widget' => '<div class="item">',
		'after_widget' => '</div>',
		'before_title' => '<div>',
		'after_title' => '</div>',
	) );
}
add_action( 'widgets_init', 'register_widgets' );
