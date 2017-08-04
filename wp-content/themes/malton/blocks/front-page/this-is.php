<div class="this-is" id="this-is">
	<h2 class="text-center main-title"><span>Группа компаний ЭДИСОН - это:</span></h2>
	<div class="container">
		<div class="items">
			<?php if( have_rows('this-is', 2) ): ?>
				<div class="row">
				<?php $i=0; while ( have_rows('this-is', 2) ) : the_row(); $i++;
					$class="col-xs-9 col-xs-offset-3 item";
					if($i==2) $class="col-xs-9 col-xs-offset-1 item";
				?>
					<div class="col-xs-6">
						<div class="row">
							<div class="<?php echo $class;?>">
								<h3><?php the_sub_field('title'); ?></h3>
								<p class="text"><?php the_sub_field('text'); ?></p>
							</div>
						</div>
					</div>
					<?php if($i==2) : $i=0; ?>
					</div>
					<div class="row">
					<?php endif; ?>
				<?php endwhile; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>