<?php if( have_rows('list-actions') ): ?>
<div class="list-actions"> 	
	<div class="left-bg">
		<div class="container">
		<?php $i=0; while ( have_rows('list-actions') ) : the_row(); $i++; 
			$textPartClass = 'col-sm-4 col-sm-offset-0';
			$imgClass = 'col-sm-6 col-sm-push-2 col-sm-offset-0';
			if(!($i%2)) {
				$textPartClass = 'col-sm-5 col-sm-pull-4 col-sm-offset-0';
				$imgClass = 'col-sm-6 col-sm-push-5 col-sm-offset-0';
			}
			$imgClass .= ' col-xs-10 col-xs-push-0 col-xs-offset-1';
			$textPartClass .= ' col-xs-10 col-xs-pull-0 col-xs-offset-1';
			?>
			<div class="row item">
				<div class="<?php echo $imgClass; ?>">
					<?php $img = get_sub_field('img'); ?>
					<?php if($img) : ?>
						<div class="img" data-stellar-ratio="1.2" data-stellar-vertical-offset="300">
							<img src="<?php echo $img['sizes']['image-630-auto']; ?>" alt="" />
						</div>
					<?php endif;?>
				</div>
				<div class="<?php echo $textPartClass; ?>">
					<div class="text-part" data-stellar-ratio="1.4" data-stellar-vertical-offset="300">
						<div class="h2 title"><?php the_sub_field('title'); ?></div>
						<div class="text"><?php the_sub_field('text'); ?></div>
						<a class="more" href="<?php the_sub_field('href'); ?>"></a>
					</div>
				</div>
			</div>

		<?php endwhile; ?>
		</div>
	</div>
</div>
<?php endif; ?>