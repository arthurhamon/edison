<div class="map">	
	<div id="map" lat="54.513319" lng="36.246725" placemark="<?php echo get_bloginfo('template_url'); ?>/img/placemark.png" placemark-width="35" placemark-height="48"></div>
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-xs-3 col-xs-offset-9 no-p text-center">
					<div class="inner">
						<div class="logo"></div>
						<div class="h4 phone"><?php the_field('phone', 'options'); ?></div>
						<p class="address"><?php the_field('address', 'options'); ?></p>
						<?php if( have_rows('emails', 'options') ): ?>
						<?php while ( have_rows('emails', 'options') ) : the_row(); ?>
						<a href="mainto:<?php the_sub_field('text'); ?>"><?php the_sub_field('text'); ?></a><br />
						<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>