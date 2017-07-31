<?php $query = new WP_Query( array('post_type'=>'reviews', 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'ASC'  ) ); ?>
<?php if($query->have_posts()) :?>
<div class="reviews">
	<h2 class="main-title title-bottom-line">ОТЗЫВЫ</h2>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="wrap-jcarousel" data-responsivecountitem="1">
					<div class="jcarousel">
						<ul>
							<?php $i=0; while($query->have_posts()) : $query->the_post(); $i++; ?>
							<li>
								<div class="row">
									<div class="col-xs-3 col-xs-offset-1">
										<?php if(has_post_thumbnail()) : ?>
											<img src="<?php the_post_thumbnail_url('image-220-auto'); ?>" />
										<?php endif; ?>
									</div>
									<div class="col-xs-7">
										<div class="right-part">
											<?php the_field('begin-text'); ?>
											<?php if(get_field('end-text') != '') : ?>
												<div class="collapse" id="end-text-<?php echo $i; ?>" aria-expanded="true">
												<?php the_field('end-text'); ?>
												</div>
											<?php endif; ?>
											<div class="bottom-part">
												<div class="row">
													<div class="col-xs-6">
														<?php if(get_field('end-text') != '') : ?>
															<a data-toggle="collapse" href="#end-text-<?php echo $i; ?>" aria-expanded="true" class="collapsed">Прочитать отзыв полностью.</a>
														<?php endif; ?>
													</div>
													<div class="col-xs-6 author">
														<?php if(get_field('href')) : ?>
														<a href="<?php the_field('href'); ?>"><i class="fa fa-vk" aria-hidden="true"></i>&nbsp;&nbsp;<?php the_title(); ?></a>
														<?php else : ?>
														<a><?php the_title(); ?></a>
														<?php endif; ?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
							<?php endwhile; ?>
						</ul>
					</div>					
					<a href="#" class="jcarousel-prev"></a>
					<a href="#" class="jcarousel-next"></a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endif; wp_reset_postdata(); ?>