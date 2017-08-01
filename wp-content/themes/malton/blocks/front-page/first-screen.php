<div class="<?php if(wpmd_is_phone() || wpmd_is_tablet()) echo 'full-window-height'; ?> first-screen full-height light-text dark-bg" data-stellar-offset-parent="true">
	<div class="border-bottom" data-stellar-ratio="0.1">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-lg-offset-4 col-sm-5 col-sm-offset-4 col-xs-6 col-xs-offset-3">
					<div class="inner"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-1 col-xs-12 text-center-xs text-right top-margin-logo">
				<a href="/" class="logo main-logo-light big-logo" href="#"></a>
			</div>
			<div class="col-sm-3 col-xs-12 text-center-xs top-margin-logo">
				<a href="/" class="logo-text text-uppercase">Калужская<br />швейная фабрика</a>
				<div class="visible-xs"><br /><span class="logo-text"><?php the_field('phone', 'option'); ?></span></div>
			</div>
			<div class="col-xs-8">				
				<?php 
				global $navigatePanelSetting;
				$navigatePanelSetting = array();
				$navigatePanelSetting['isFirst'] = true;
				get_template_part('blocks/base/navigate-panel'); ?>
			</div>
		</div>
	</div>		
	<?php if( have_rows('first-screen-slider', 26) ): ?>
	<div class="slider">
		<ul>			
			<?php while ( have_rows('first-screen-slider', 26) ) : the_row(); ?>			
				<?php $img = get_sub_field('img'); 
				if($img) : ?>
				<li data-stellar-ratio="0.5">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<div class="row">
									<div class="col-md-3 col-md-offset-1 col-sm-4 position-static hidden-xs">	
										<div class="left-text">
											<div class="h1"><?php the_sub_field('text'); ?></div>
										</div>
									</div>
									<div class="col-lg-4 col-lg-pull-0 col-lg-offset-0 col-sm-5 col-sm-offset-0 col-xs-6 col-xs-offset-3 text-center">
										<img class="center-img" src="<?php echo $img['sizes']['image-auto-800']; ?>" alt="" />
									</div>
								</div>
							</div>
						</div>
					</div>
				</li>
				<?php endif; ?>
			<?php endwhile; ?>
		</ul>
	</div>
	<?php endif; ?>
</div>