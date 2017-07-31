<div class="top-panel hidden-xs">
	<div class="container inner-bg">
		<div class="row">
			<div class="col-xs-3 no-p">
				<div class="type-sort">
					<a href="#" data-toggle="dropdown" class="dropdown-open">
						<div class="title <?php if($_GET['sort-type']=='zone' || $_GET['sort-type']=='') echo 'active'; ?>" id="tab-zones-title">
							<div class="vertical-middle"><img src="<?php echo get_bloginfo('template_url'); ?>/img/zone-icon.png" />Сортировать<br />по зонам</div>
						</div>
						<div class="title <?php if($_GET['sort-type']=='spec') echo 'active'; ?>" id="tab-specialists-title">
							<div class="vertical-middle"><img src="<?php echo get_bloginfo('template_url'); ?>/img/spec-icon.png" />Сортировать<br />по специалистам</div>
						</div>
					</a>
					<ul>
						<li class="<?php if($_GET['sort-type']=='zone' || $_GET['sort-type']=='') echo 'active'; ?>"><a href="#" data-target="#tab-zones-title, #tab-zones" class="title" data-toggle="tab"><div class="vertical-middle"><img src="<?php echo get_bloginfo('template_url'); ?>/img/zone-icon.png" />Сортировать<br />по зонам</div></a></li>
						<li class="<?php if($_GET['sort-type']=='spec') echo 'active'; ?>"><a href="#" data-target="#tab-specialists-title, #tab-specialists" class="title" data-toggle="tab"><div class="vertical-middle"><img src="<?php echo get_bloginfo('template_url'); ?>/img/spec-icon.png" />Сортировать<br />по специалистам</div></a></li>
					</ul>
				</div>
			</div>
			<div class="col-xs-9 no-pl">
				<div class="wrap-tabs">
					<div class="tab-item <?php if($_GET['sort-type']=='zone' || $_GET['sort-type']=='') echo 'active'; ?>" id="tab-zones">
					<?php
						$service_direction = get_terms('service_direction', 
							array(
							'hide_empty' => true,
						));
						
						if(isset($_GET['zone'])) {
							foreach($service_direction as $key=>$row) {
								if($_GET['zone'] == $row->term_id) {
									unset($service_direction[$key]);
									array_unshift($service_direction, $row);
								}
							}
						}
					?>
					<?php if(count($service_direction)) : ?>
						<div class="wrap-jcarousel" data-wrap="circular">
							<div class="jcarousel">
								<ul>	
									<?php foreach($service_direction as $row) : 
										$class = '';
										if($_GET['zone'] == $row->term_id) $class = 'active';
									?>
										<li><a class="item <?php echo $class; ?>" href="<?php echo site_url('/services?sort-type=zone&zone='.$row->term_id ); ?> "><div class="inner-item"><div class="vertical-middle"><?php echo $row->name; ?></div></div></a></li>
									<?php endforeach; ?>
								</ul>
							</div>
							<a href="#" class="jcarousel-prev"></a>
							<a href="#" class="jcarousel-next"></a>
						</div>
					<?php endif; ?>
					</div>
					<div class="tab-item <?php if($_GET['sort-type']=='spec') echo 'active'; ?>" id="tab-specialists">
					<?php //Специалисты
						$query = new WP_Query(array( 'post_type' => 'specialist', 'posts_per_page' => -1)); 
						
						$service_specialists = array();
						$begin_elem = false;
						global $post;
						while ( $query->have_posts() ) { $query->the_post();
							if($_GET['spec'] == get_the_ID()) {
								$begin_elem = $post;
							}
							else {
								$service_specialists[] = $post;
							}
						}
						if($begin_elem) {
							array_unshift($service_specialists, $begin_elem);
						}
						
						
						?>
						
						<?php if(count($service_specialists)) : ?>
							<div class="wrap-jcarousel" data-wrap="circular">
								<div class="jcarousel">
									<ul>	
										<?php foreach ( $service_specialists as $row ) : $post = $row; setup_postdata($post);
											$class = '';
											if($_GET['spec'] == get_the_ID()) $class = 'active';
										?>
											<li><a class="item <?php echo $class; ?>" href="<?php echo site_url('/services?sort-type=spec&spec='.get_the_ID()); ?> "><div class="inner-item"><div class="vertical-middle"><?php echo get_field('name').' '.get_field('surname'); ?></div></div></a></li>
										<?php endforeach; wp_reset_postdata(); ?>
									</ul>
								</div>
								<a href="#" class="jcarousel-prev"></a>
								<a href="#" class="jcarousel-next"></a>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>