<div class="statistic full-height">
	<div class="left-top-border hidden-xs">
		<div class="container">
			<div class="row">
				<div class="col-xs-2 no-pl">
					<div class="inner-border">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-1 text-right text-left-md top-margin-logo hidden-xs">
				<a href="/" class="logo main-logo-dark" href="#"></a>
			</div>
			<div class="col-sm-9 col-sm-offset-1 col-xs-12 <?php if(!wpmd_is_phone()) : ?>full-window-height<?php endif; ?>">
				<div class="wrap-vertical-position">
					<div class="vertical-middle">
						<?php if( have_rows('statistic', 26) ): ?>
						<div class="row items">
						<?php $i=0; while ( have_rows('statistic', 26) ) : the_row(); $i++; ?>	
							<div class="col-sm-6 col-xs-10">
								<div class="item">
									<div class="title"><div class="inner"><?php the_sub_field('title'); ?></div></div>
									<div class="text"><?php the_sub_field('text'); ?></div>
								</div>
							</div>
						<?php if(!($i%2)) : ?>
						</div>
						<div class="row items">
						<?php endif; ?>
						<?php endwhile; ?>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="col-xs-3">				
				<?php get_template_part('blocks/base/navigate-panel'); ?>
			</div>
		</div>
	</div>
</div>