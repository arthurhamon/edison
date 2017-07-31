<?php get_header(); ?>
<?php
	//Горячие часы
	$hothours = array();
	if( have_rows('hot-hours', 141) ) {
		//От сейчас
		$beginTime = time();
		//До конца дня	
		$format = "d/m/Y H:i:s";
		$external = date("d/m/Y 23:59:59");
		$dateobj = DateTime::createFromFormat($format, $external);
		$endTime = $dateobj->getTimestamp();
		
		$actions = array();
		while ( have_rows('hot-hours', 141) ) { the_row();
		
			//Время
			$external = get_sub_field('time');
			
			//Формат должен совпадать с форматом даты вывода произвольного поля
			$format = "d/m/Y H:i:s";
			$dateobj = DateTime::createFromFormat($format, $external);
			$time = $dateobj->getTimestamp();
			
			//Только те акции что действуют сейчас до конца дня
			if($time > $beginTime && $time < $endTime) {
				$row = array(
					'time' => $time,
					'discount' => get_sub_field('discount'),
					'service' => get_sub_field('service'),
				);
				$actions[$time] = $row;
			}
		
		}
		ksort($actions);
		//Распределяем по категориям
		foreach($actions as $row) {
			if(!isset($hothours[$row['service']->ID])) $hothours[$row['service']->ID] = array();
			$hothours[$row['service']->ID][] = $row;
		}
		
	}


	global $post;
	$services = array();
	//Предворительно распределяем записи по родителям что бы сохранить сортировку или задать
	$query = new WP_Query(array( 'post_type' => 'service',  'post_parent' => 0, 'posts_per_page' => -1, 'order' => 'ASC'));
	while ( $query->have_posts() ) { $query->the_post();
		$services[get_the_ID()] = array('childs'=>array(), 'post'=>$post, 'hothours' => array(), 'max-discount' => 0);
				
		//Если есть горячие часы то добавляем
		if(isset($hothours[get_the_ID()])) {
			$services[get_the_ID()]['hothours'] = $hothours[get_the_ID()];
			//Узнаем максимальную скидку
			$maxDiscount = 0;
			foreach($services[get_the_ID()]['hothours'] as $row) {
				$maxDiscount = ($maxDiscount < $row['discount']) ? $row['discount'] : $maxDiscount;
			}
			$services[get_the_ID()]['max-discount'] = $maxDiscount;
		}
	}
	wp_reset_postdata();
	//распределяем по родителям
	while ( have_posts() ) { the_post();
		if($post->post_parent > 0) {
			if(!isset($services[$post->post_parent])) {
				$services[$post->post_parent] = array('childs'=>array());
			}
			$services[$post->post_parent]['childs'][] = $post;
		}
	}
?>


<div class="services">
	<?php get_template_part('blocks/services/top-panel'); ?>
	<?php get_template_part('blocks/services/act-specialist'); ?>
	<?php foreach($services as $key=>$parent_row) : ?>
		<?php if(count($parent_row['childs'])) : $post = $parent_row['post']; setup_postdata( $post ); ?>	
		<div class="list">
			<div class="service-description">
				<div class="container">
					<div class="row">
						<div class="col-sm-6 no-p col-xs-12">
							<div class="img-part">
								<?php if(has_post_thumbnail()) : ?>
									<img src="<?php the_post_thumbnail_url('full'); ?>" alt="" />
								<?php endif; ?>
							</div>
						</div>
						<div class="col-sm-5 col-xs-12">
							<div class="right-part">
								<h2 class="main-title"><?php the_title(); ?></h2>
								<div class="text"><?php the_content('Подробнее об услуге'); ?></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php if($_GET['sort-type']!='spec') : ?>
			<?php if(count($parent_row['hothours'])) : ?>
				<div class="hot-hours">
					<div class="container">
						<div class="row">
							<div class="col-sm-4 col-sm-offset-2 col-xs-12 col-xs-offset-0 ">
								<div class="title">Горячие часы!</div>
								<div class="text">(Скидка от <?php echo $parent_row['max-discount']; ?>% при записи на это время)</div>
							</div>
							<div class="col-sm-6 col-xs-12 list-hours">
								<div class="row">
									<?php foreach($parent_row['hothours'] as $hour_row) : ?>
									<div class="col-sm-2 col-xs-3">
										<a href="#fancybox-registration" data-from="Страница услуги, горячие часы" data-date="<?php echo date('d-m-y', $hour_row['time']); ?>" data-service-id="<?php echo $hour_row['service']->ID; ?>" data-time="<?php echo date('H:i', $hour_row['time']); ?>" class="fancybox-preset-registration"><?php echo date('H:i', $hour_row['time']); ?></a>
									</div>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>
			<?php endif; ?>
			<div class="price-list">
				<?php foreach($parent_row['childs'] as $row) : $post = $row; setup_postdata( $post ); ?>
					<div class="item">
						<div class="container">
							<div class="row">
								<div class="col-sm-4 col-sm-offset-2 col-xs-12 col-xs-offset-0">
									<div class="row">
										<div class="col-sm-9 col-xs-8">
											<h3 class="title"><?php the_title(); ?></h3>
										</div>
										<div class="col-xs-4 visible-xs text-right">
											<?php if(get_field('price')) : ?>
												<div class="price"><?php the_field('price'); ?> <span class="woocommerce-Price-currencySymbol">&#8381;</span></div>
											<?php endif; ?>
										</div>
									</div>
									<?php if(get_field('time')) : ?>
										<div class="time">(<?php the_field('time'); ?>)</div>
									<?php endif; ?>
								</div>
								<div class="col-sm-2 text-center hidden-xs">
									<?php if(get_field('price')) : ?>
										<div class="price"><?php the_field('price'); ?> <span class="woocommerce-Price-currencySymbol">&#8381;</span></div>
									<?php endif; ?>
								</div>
								<div class="col-sm-2 col-xs-12">
									<div class="wrap-btn">
										<a href="#fancybox-registration" data-from="Страница услуги, обычная запись" data-service-id="<?php echo $row->post_parent; ?>" data-service-child-id="<?php echo $row->ID; ?>" class="btn btn-transparent btn-block text-uppercase fancybox-preset-registration">Записаться</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>	
		</div>		
		<?php endif; ?>		
	<?php endforeach; ?>
</div>



<?php get_footer(); ?>