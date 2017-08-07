<?php get_header(); ?>	
<div class="archive-vacancy">
	<div class="top-part page">
		<div class="container">
			<div class="row">
				<div class="col-xs-8 col-xs-offset-2 text-center">
					<h1>Наши вакансии</h1>
					Товарищи! новая модель организационной деятельности в значительной степени обуславливает создание систем массового участия. Таким образом реализация намеченных плановых заданий требуют от нас анализа систем массового участия. Задача организации, в особенности же постоянный количественный рост и сфера нашей активности играет важную роль в формировании систем массового участия.
				</div>
			</div>
		</div>
	</div>
	<?php if ( have_posts() ) : ?>
	<div class="items">
		<?php $i=0; while ( have_posts() ) : the_post(); $i++; ?>
		<div class="container item">
			<div class="row">	
				<div class="col-xs-4 text-center">
					<?php if(has_post_thumbnail()) : ?>
						<img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'image-210-auto' ); ?>" />
					<?php endif; ?>
					<h2 class="h2"><?php the_title(); ?></h2>
					<div class="h2 price"><?php the_field('price'); ?></div>
				</div>
				<div class="col-xs-4">
					<div class="inner">
						<?php the_field('left-content'); ?>
					</div>
				</div>
				<div class="col-xs-4">
					<div class="inner">
						<?php the_field('right-content'); ?>
					</div>
				</div>
			</div>
		</div>
		<?php endwhile; ?>
	</div>
	<?php endif; ?>
	<div class="send-resume">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 text-center">
					<div class="inner">
						<div class="row">
							<div class="col-xs-10 col-xs-offset-1">
								<div class="h2">Присоединяйтесь к нашей команде!</div>
								<p class="text">Уважаемые соискатели! Мы ищем персонал, который разделяет наши ценности и стремление быть лучшими. Все кандидаты, направившие нам свое резюме, проходят конкурсный отбор. К сожалению, из-за объема получаемых резюме, мы не можем ответить каждому кандидату лично, но уверяем вас, что каждое резюме рассмотрено. Если ваши навыки и опыт соответствуют требованиям должности, наши рекрутеры свяжутся с вами в течение дня. Если вы находитесь в другом городе или в другой стране, мы предложим вам пройти предварительное собеседование по электронным каналам связи. Процесс найма может занять от нескольких дней до нескольких недель в зависимости от вакансии.</p>
								<div class="row">
									<?php echo do_shortcode('[contact-form-7 id="111" title="Присоединяйтесь к нашей команде!"]'); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
