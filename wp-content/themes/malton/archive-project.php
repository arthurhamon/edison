<?php get_header(); ?>	
<div class="archive-project page">
	<div class="container">
		<div class="row top-part">
			<div class="col-xs-8 col-xs-offset-2">
				<h1>Наши проекты</h1>
				<div class="text-center">Задача организации, в особенности же укрепление и развитие структуры в значительной степени обуславливает создание направлений прогрессивного развития. Задача организации, в особенности же реализация намеченных плановых заданий требуют определения и уточнения соответствующий условий активизации.</div>
			</div>
		</div>
		<?php if ( have_posts() ) : ?>
		<div class="row">
			<?php $i=0; while ( have_posts() ) : the_post(); $i++; ?>
			<div class="col-xs-6">
				<div class="item">
					<a href="<?php the_permalink(); ?>">
					<div class="img" style="background-image: url(<?php if(has_post_thumbnail()) echo get_the_post_thumbnail_url( get_the_ID(), 'image-540-auto' ); ?>)"></div>
					<div class="row">
						<div class="col-xs-8 col-xs-offset-2 text-center">
							<div class="logo">
								<div class="vertical-middle">
									<?php $log = get_field('logo'); 
									if($log) :
									?>
									<img src="<?php echo $log['url']; ?>" alt="" />
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
					</a>
					<?php the_excerpt(); ?>
					<div class="bottom-part">
						<div class="row">
							<div class="col-xs-6"><a href="<?php the_permalink(); ?>">Подробнее о проекте</a></div>
							<?php if(get_field('site-href')) : ?>
							<div class="col-xs-6 text-right"><a href="<?php the_field('site-href'); ?>"><?php the_field('site'); ?></a></div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<?php if($i==2) : $i=0; ?>
				</div>
				<div class="row">
			<?php endif; ?>
			<?php endwhile; ?>
		</div>
		<?php endif; ?>
	</div>
</div>
	<?php get_template_part('blocks/front-page/about-cooperation'); ?>
<?php get_footer(); ?>
