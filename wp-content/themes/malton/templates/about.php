<?php
/*
Template Name: about
*/
?>
<?php get_header(); ?>
<?php if( have_posts() ) : the_post(); ?>
	<div class="scroll-spy hidden-xs" id="nav-scroll">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<ul>
						<li><a class="scroll-to" href="#history">История компании</a></li>
						<li><a class="scroll-to" href="#certificates">Лицензии и сертификаты</a></li>
						<li><a class="scroll-to" href="#press-center">Пресс-центр</a></li>
						<li><a class="scroll-to" href="#summary">Отправить резюме</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="about">
		<div id="history" class="first-screen">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
						<h1 class="main-title text-center"><?php the_field('title'); ?></h1>
						<div class="content">
							<?php the_content(); ?>
							<?php if(get_field('excerpt')) : ?>					
								<div class="excerpt"><?php the_field('excerpt'); ?></div>
							<?php endif; ?>
							<?php if(get_field('text-after-excerpt')) : ?>					
								<?php the_field('text-after-excerpt'); ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>	
		</div>		
		<?php get_template_part('blocks/about/certificates'); ?>
		<?php get_template_part('blocks/about/last-posts'); ?>
		<?php get_template_part('blocks/about/summary'); ?>
		
	</div>
	
<?php endif; ?>
<?php get_footer(); ?> 