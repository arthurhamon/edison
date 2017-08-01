<?php $img = get_field('bg-design', 26);?>
<div class="clothing-design light-text full-height dark-bg" style="background-image: url(<?php if($img) echo $img['url']; ?>)">
	<div class="container">
		<div class="row">
			<div class="col-xs-1 text-right text-left-md top-margin-logo hidden-xs">
				<a href="/" class="logo main-logo-light" href="#"></a>
			</div>
			<div class="col-sm-7 col-sm-pull-1 col-xs-10 <?php if(!wpmd_is_phone()) : ?>full-window-height<?php endif; ?>">
				<div class="wrap-vertical-position">
					<div class="vertical-middle">
						<div class="h1">дизайнер одежды</div>
						<div class="row">
							<div class="col-xs-10">
								<?php the_field('text-design', 26); ?>
							</div>
						</div>
					</div>
				</div>				
			</div>
			<div class="col-xs-6">				
				<?php 
				global $navigatePanelSetting;
				$navigatePanelSetting = array();
				$navigatePanelSetting['isLast'] = true;
				get_template_part('blocks/base/navigate-panel'); ?>
			</div>
		</div>
	</div>
</div>