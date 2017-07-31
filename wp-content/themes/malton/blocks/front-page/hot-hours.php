<?php if( have_rows('hot-hours') ): ?>
<?php //Узнаем ближайшие акции
	
	//От сейчас
	$beginTime = time();
	//До конца дня	
	$format = "d/m/Y H:i:s";
	$external = date("d/m/Y 23:59:59");
	$dateobj = DateTime::createFromFormat($format, $external);
	$endTime = $dateobj->getTimestamp();
	
	$actions = array();
	while ( have_rows('hot-hours') ) { the_row();
	
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
				'title' => get_sub_field('title'),
				'text' => get_sub_field('text'),
				'discount' => get_sub_field('discount'),
				'service' => get_sub_field('service'),
			);
			$actions[$time] = $row;
		}
	
	}
	ksort($actions);
	//Список часов которые мы отображаем
	$actionsVisible = array();
	//Списко id категорий часов которые мы уже добавили в массив
	$serviceIds = array();
	//удаляем часы с одинаковыми категориями(оставляем по одному ближайшему горячему часу)
	foreach($actions as $row) {
		if(!in_array($row['service']->ID, $serviceIds)) {
			$actionsVisible[] = $row;
			$serviceIds[] = $row['service']->ID;
		}
	}
	
?>
<?php if(count($actionsVisible)) : 
	$verticalClass = "vertical";
	$dataJcarousel = 'data-vertical="true"';
	if(wpmd_is_phone()) {
		$verticalClass = "";
		$dataJcarousel = '';
	}
?>
<div class="hot-hours">
	<div class="wrap-jcarousel" data-responsivecountitem="1" <?php echo $dataJcarousel; ?>>
		<div class="jcarousel <?php echo $verticalClass; ?>">
			<ul>
				<?php foreach($actionsVisible as $row) : ?>
					<li class="group-same-heights">
						<div class="container">
							<div class="row">
								<div class="col-sm-5 col-sm-offset-2 col-xs-12 col-xs-offset-0 text-block item-same-height">	
									<div class="h2 title"><?php echo $row['title']; ?></div>
									<div class="text"><?php echo $row['text']; ?></div>
									<div class="date">Время начала сеанса: 
										<span><?php echo date('d', $row['time']) .' '. get_month_str(date('n', $row['time'])) ; ?>
										в
										<?php echo date('H:i', $row['time']); ?></span>
									</div>
									<div class="discount">Скидка: <span><?php echo $row['discount']; ?>%</span></div>
									
									<a href="#fancybox-registration"  data-from="Домашняя страница горящие часы" data-date="<?php echo date('d-m-y', $row['time']); ?>" data-service-id="<?php echo $row['service']->ID; ?>" data-time="<?php echo date('H:i', $row['time']); ?>"  class="btn btn-transparent-3 btn-bold-border text-uppercase fancybox-preset-registration visible-xs">Записаться онлайн</a>
								</div>
								<div class="col-xs-5 no-pr hidden-xs">
									<div class="timer-block item-same-height">
										<img src="<?php echo get_the_post_thumbnail_url($row['service']->ID, 'image-585-auto'); ?>" alt="" />
										<div class="inner">
											<div class="vertical-middle">
												<div class="countdown-text">до начала сеанса осталось:</div>
												<div class="countdown" data-endtime="<?php echo $row['time']; ?>" data-begintime="<?php echo time(); ?>">
													<span class="wrap-num">
														<span class="num hours"></span><br />
														<span class="num-name">часов</span>
													</span>
													<span class="wrap-num">
														<span class="num">:</span><br />
														<span class="num-name">&nbsp;</span>
													</span>
													<span class="wrap-num">
														<span class="num minutes"></span><br />
														<span class="num-name">минут</span>
													</span>
													<span class="wrap-num">
														<span class="num">:</span><br />
														<span class="num-name">&nbsp;</span>
													</span>
													<span class="wrap-num">
														<span class="num seconds"></span><br />
														<span class="num-name">секунд</span>
													</span>
												</div>
												<a href="#fancybox-registration"  data-from="Домашняя страница горящие часы" data-date="<?php echo date('d-m-y', $row['time']); ?>" data-service-id="<?php echo $row['service']->ID; ?>" data-time="<?php echo date('H:i', $row['time']); ?>"  class="btn btn-transparent-3 btn-bold-border text-uppercase fancybox-preset-registration">Записаться онлайн</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
		
		<div class="control-panel">
			<div class="wrap-vertical-position">
				<div class="vertical-middle">
					<a href="#" class="jcarousel-prev"></a>
					<div class="jcarousel-pagination" data-shownum="false"></div>
					<a href="#" class="jcarousel-next"></a>
				</div>
			</div>
		</div>
		
	</div>
</div>
<?php endif; ?>
<?php endif; ?>