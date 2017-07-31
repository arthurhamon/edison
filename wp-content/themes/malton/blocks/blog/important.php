<?php 
global $post;
$important = get_field('important', 83);
if($important) : 
	$class = "";
	if(count($important) == 1) {
		$important[] = $important[0];
		$important[] = $important[0];
		$important[] = $important[0];
	}
	if(count($important) == 2) {
		$important[] = $important[0];
		$important[] = $important[1];			
	}
	if(count($important) == 3) {
		$important[] = $important[0];
		$important[] = $important[1];			
		$important[] = $important[2];			
	}
?>
<div class="important hidden-xs">
	<div class="wrap-jcarousel" data-responsivecountitem="3" data-wrap="circular">
		<div class="jcarousel">
			<ul>
				<?php foreach($important as $row) : $post = $row; setup_postdata( $post );?>
				<li>
					<div class="item">
						<div class="bg" style="background-image: url(<?php the_post_thumbnail_url('image-960-600'); ?>"></div>
						<div class="bottom-panel">	
							<div class="container-fluid">
								<div class="row">
									<div class="col-xs-8">
										<div class="left-part">
											<div class="vertical-middle">
												<div class="h2 title">
													<a href="<?php the_permalink(); ?>">
														<?php if(get_field('important-title')) : ?>
															<?php the_field('important-title'); ?>
														<?php else : ?>
															<?php the_title(); ?>
														<?php endif;?>
													</a>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xs-3 col-xs-offset-1 no-pl">
										<div class="right-part">
											<?php the_category(); ?>
											<div class="date">
												<?php echo get_the_date('d.m.Y'); ?>
											</div>
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
		<a href="#" class="jcarousel-prev"></a>
		<a href="#" class="jcarousel-next"></a>
	</div>
</div>
<?php endif; ?>