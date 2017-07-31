<?php if(have_posts()) : ?>
<div class="posts">
	<div class="container">
		<div class="row">
			<?php while(have_posts()) : the_post(); ?>
			<div class="col-xs-6">
				<div class="item">
					<div class="slider">
						<?php $gallery = get_field('gallery');  
						if($gallery) : ?>
							<div class="wrap-jcarousel" data-responsivecountitem="1">
								<div class="jcarousel">
									<ul>
										<?php foreach($gallery as $row) : ?>
										<li style="background-image: url(<?php echo $row['sizes']['image-420-auto']; ?>);"></li>
										<?php endforeach; ?>
									</ul>
								</div>
								<a href="#" class="jcarousel-prev"></a>
								<a href="#" class="jcarousel-next"></a>
							</div>
						<?php elseif(has_post_thumbnail()) : ?>
							<div class="wrap-jcarousel" data-responsivecountitem="1">
								<div class="jcarousel">
									<ul>
										<li style="background-image: url(<?php the_post_thumbnail_url('image-420-auto'); ?>);"></li>
									</ul>
								</div>
								<a href="#" class="jcarousel-prev"></a>
								<a href="#" class="jcarousel-next"></a>
							</div>
						<?php endif; ?>
					</div>
					<h2 class="title"><?php the_title(); ?></h2>
					<div class="text"><?php the_excerpt(); ?></div>
					<a href="<?php the_permalink(); ?>" class="more">Читать далее</a>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
	</div>			
</div>
<?php endif; ?>