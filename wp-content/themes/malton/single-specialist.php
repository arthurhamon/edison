<?php get_header(); ?>
<?php if ( have_posts() ) : the_post();?>
	<div class="blog-categories visible-xs">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="wrap-btn-menu">
						<a href="#menu-blog-categories" class="btn-menu switch-menu-blog-categories" id="switch-menu-blog-categories">
							<span class="icon"><span class="middle-line"></span></span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div id="menu-blog-categories" class="first-screen-wrap-menu">
		<div class="close-area"></div>
		<ul>
		<?php $query = new WP_Query(array( 'post_type' => 'specialist', 'posts_per_page' => -1)); ?>						
		<?php if($query->have_posts()) : ?>
			<?php $i=0; while ( $query->have_posts() ) : $query->the_post(); $i++; ?>
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			<?php endwhile; wp_reset_postdata();?>
		<?php endif; ?>
		</ul>
	</div>
	
	<div class="single-specialist">
		<div id="menu-specialists" class="wrap-menu hidden-xs">
			<div class="close-area"></div>
			<div class="menu">
							<div class="wrap-btn-menu">
								<a href="#menu-specialists" class="btn-menu switch-menu-specialists">
									<span class="icon"><span class="middle-line"></span></span>
									СПЕЦИАЛИСТЫ
								</a>
							</div>
				<div>
				<?php $query = new WP_Query(array( 'post_type' => 'specialist', 'posts_per_page' => -1)); ?>						
				<?php if($query->have_posts()) : ?>
					<?php $i=0; while ( $query->have_posts() ) : $query->the_post(); $i++; ?>
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					<?php endwhile; wp_reset_postdata();?>
				<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="first-screen full-window-height hidden-xs" data-stellar-background-ratio="0.5" style="background-image: url(<?php the_post_thumbnail_url('full'); ?>)">
			<div class="top-part">
				<div class="container">
					<div class="row">
						<div class="col-xs-4">
							<div class="wrap-btn-menu">
								<a href="#menu-specialists" class="btn-menu switch-menu-specialists">
									<span class="icon"><span class="middle-line"></span></span>
									СПЕЦИАЛИСТЫ
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="container">
					<div class="row">
						<div class="col-xs-4">
							<div class="first-info">
								<h1 class="title"><?php echo get_field('name').' '.get_field('middle-name').' '.get_field('surname'); ?></h1>
								<div class="specialization"><?php the_field('specialization'); ?></div>
								<a class="scroll-to-first-screen more" href="#specialist-content">Подробнее</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="visible-xs">
			<img width="100%" src="<?php the_post_thumbnail_url('full'); ?>" />
		</div>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-xs-offset-0">
					<div class="content" id="specialist-content">
						<div class="visible-xs">
							<h1 class="title text-center"><?php echo get_field('name').' '.get_field('middle-name').' '.get_field('surname'); ?></h1>
							<div class="specialization text-center"><?php the_field('specialization'); ?></div>
						</div>
						<?php $prevPost = get_previous_post();?>
						<?php $nextPost = get_next_post();?>
						<?php if($prevPost) : ?>
							<a class="prev-post" href="<?php echo get_permalink($prevPost->ID); ?>"></a>
						<?php endif; ?>
						<?php if($nextPost) : ?>
							<a class="next-post" href="<?php echo get_permalink($nextPost->ID); ?>"></a>
						<?php endif; ?>	
							<a class="more-arrow scroll-to-first-screen hidden-xs" href="#specialist-content"></a>
						<?php if( have_rows('content') ): ?>
							<div class="text">							
								<?php while ( have_rows('content') ) : the_row(); ?>
									<?php if(get_sub_field('type') == 'indent') : ?>
										<div class="row">
											<div class="col-xs-10 col-xs-offset-1">
												<div class="indent">
													<?php the_sub_field('text'); ?>
												</div>
											</div>
										</div>									
									<?php else : ?>
										<div class="noindent">
											<?php the_sub_field('text'); ?>	
											<div class="clearfix"></div>
										</div>										
									<?php endif; ?>
								<?php endwhile; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		
		<div class="wrap-form">
			<div class="h2 title">Записаться на приём к специалисту</div>
			<div class="container">
				<div class="row">
					<?php echo do_shortcode('[contact-form-7 id="290" title="Записаться online на странице специалиста" specialist-name="'.get_field('name').' '.get_field('surname').' '.get_field('middle-name').'"]'); ?>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
<?php get_footer(); ?>
