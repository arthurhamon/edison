	</div>
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-sm-2 col-xs-12">
					&copy; Калуга, <?php echo date('Y'); ?>
				</div>
				<div class="col-sm-3 col-xs-12">
					Сделано в <a href="http://malton.ru">Malton Tech.</a>
				</div>
				<div class="col-sm-2 col-xs-12">
					<?php the_field('phone', 'option'); ?>
				</div>
				<div class="col-sm-3 col-xs-12">
					<?php the_field('address', 'option'); ?>
				</div>
				<div class="col-sm-2 col-xs-12">
					<div class="social">
						<?php if( have_rows('social', 'option') ): ?>
							<?php while ( have_rows('social', 'option') ) : the_row(); ?>					
								<a href="<?php the_sub_field('href'); ?>"><?php the_sub_field('icon'); ?></a>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<div id="back-top" class="hidden-xs"><a href="#"></a></div>
	<div style="display: none">
		<?php $services = get_posts_hierarchy('service');?>
		<ul class="common-list-services">
			<?php foreach($services[0] as $row) : ?>
				<?php if(isset($services[$row->ID])) : ?>
					<li data-parent-id="<?php echo $row->ID; ?>">
						<span data-id="<?php echo $row->ID; ?>"><?php echo $row->post_title; ?></span>
						<ul>
							<?php foreach($services[$row->ID] as $row_child) : ?>
								<li data-id="<?php echo $row_child->ID; ?>"><?php echo $row_child->post_title; ?></li>
							<?php endforeach; ?>
						</ul>
					</li>
				<?php endif; ?>
			<?php endforeach; ?>
		</ul>
	</div>
	
	
	
	<div style="display: none;">
		<div id="fancybox-registration" class="form-fancybox-full-screen fancybox-registration">
			<?php if(!wpmd_is_phone()): ?>
			<div class="wrap-vertical-position">
				<div class="vertical-middle">
			<?php endif; ?>
					<div class="container-fluid">
						<div class="row">
							<div class="col-xs-10 col-xs-offset-1">
								<div class="main-title text-center">Записаться online</div>
							</div>
						</div>
					</div>
					<div class="container-fluid">
						<div class="row wrap-form wrap-selectpicker-link">
							<?php echo do_shortcode('[contact-form-7 id="189" title="Записаться online"]'); ?>
						</div>
					</div>
					
			<?php if(!wpmd_is_phone()): ?>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</div>
	<?php wp_footer(); ?>
	</body>
</html>