<?php
/*
Template Name: transformation
*/
?>
<?php get_header(); ?>
<?php if( have_posts() ) : the_post(); ?>	
	<div class="breadcrumbs">					
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<?php if(function_exists('kama_breadcrumbs')) kama_breadcrumbs(' / '); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="transformation">
		<div class="first-screen">
			<div class="container">
				<div class="row">
					<div class="col-xs-8 col-xs-offset-2">
						<h1 class="main-title"><?php the_field('main-title'); ?></h1>
						<div class="text">
							<?php the_content(); ?>
						</div>
						<a href="#" class="btn btn-green">записаться на проект</a>
					</div>
				</div>
			</div>
		</div>
		<div class="lists">
			<div class="container">
				<div class="row">
					<div class="col-xs-5 col-xs-offset-1">
						<h3 class="title">Что мы будем делать?</h3>
						<?php if ( have_rows('what-to-do') ) : ?>
							<ul>
							<?php $i=0; while ( have_rows('what-to-do') ) : the_row(); $i++;?>
								<li><?php the_sub_field('text'); ?></li>
							<?php endwhile; ?>
							</ul>
						<?php endif; ?>
					</div>
					<div class="col-xs-5 col-xs-offset-1">
						<h3 class="title">Что Вы получаете?</h3>	
						<?php if ( have_rows('wha-you-get') ) : ?>
							<ul>
							<?php $i=0; while ( have_rows('wha-you-get') ) : the_row(); $i++;?>
								<li><?php the_sub_field('text'); ?></li>
							<?php endwhile; ?>
							</ul>
						<?php endif; ?>					
					</div>
				</div>
			</div>	
		</div>

		<div class="posts">
			<div class="container">
				<div class="row">
					<div class="col-xs-6">
						<div class="item">
							<div class="slider">
							</div>
							<h2 class="title">Доктор Борменталь преображает!</h2>
							<div class="text">22 килограмма за 3 месяца – это не шутки! Если честно, то я до сих пор нахожусь под впечатлением от фотографии «до»!</div>
							<a href="#" class="more">Читать далее</a>
						</div>
					</div>
					<div class="col-xs-6">
						<div class="item">
							<div class="slider">
							</div>
							<h2 class="title">«Стиль в каждой из нас!»</h2>
							<div class="text">Это выражение слышали почти все и по многу раз, но что же на самом деле это значит? Что стоит за этой набившей оскомину фразой? </div>
							<a href="#" class="more">Читать далее</a>
						</div>
					</div>
				</div>
			</div>			
		</div>
		
	<?php get_template_part('blocks/base/contact-form');?>
	</div>
<?php endif; ?>
<?php get_footer(); ?> 