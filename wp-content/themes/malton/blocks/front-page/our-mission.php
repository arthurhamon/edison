<div class="our-mission">
	<div class="container">
		<div class="row">
			<div class="col-xs-3 col-xs-offset-1 text-center">
				<?php $img = get_field('our-mission-img', 2); 
				if($img) :?>
				<div class="img"><img src="<?php echo $img['url']; ?>" /></div>
				<?php endif; ?>
				<h4>
					<?php the_field('our-mission-name', 2); ?>
				</h4>
				<p><?php the_field('our-mission-position', 2); ?></p>
			</div>
			<div class="col-xs-6 col-xs-offset-1">
				<h2><?php the_field('our-mission-title', 2); ?></h2>	
				<?php the_field('our-mission-text', 2); ?>
			</div>
		</div>
	</div>
</div>