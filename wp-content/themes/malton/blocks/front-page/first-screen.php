<div class="front-page-first-screen full-window-height">
	<div class="bg">
		<?php if(get_field('video-mp4', 141) || get_field('video-webm', 141)) : ?>	
			<video id="home-vid" autoplay="" loop="" preload="" muted="" style="width: 100%; height: auto;" class="hidden-xs">
				<?php if(get_field('video-mp4', 141)) : ?>
					<source type="video/mp4" src="<?php echo get_field('video-mp4', 141) ?>">
				<?php endif; ?>
				<?php if(get_field('video-webm', 141)) : ?>
					<source type="video/webm" src="<?php echo get_field('video-webm', 141) ?>">
				<?php endif; ?>
			</video>		
		<?php else : ?>	
			<?php 
				$gallery = get_field('first-screen-slider', 141);
				if($gallery) :
			?>
			<ul class="gallery">
				<?php $i=0; foreach($gallery as $row) : $i++;?>
				<li class="<?php if($i==1) echo 'active'; ?>" style="background-image: url(<?php echo $row['url']; ?>)"></li>
				<?php endforeach; ?>
			</ul>
			<?php endif; ?>	
		<?php endif; ?>
	</div>
	<div class="top-part">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-3">
					<div class="wrap-btn-menu">
						<a href="#menu-first-screen" class="btn-menu switch-menu-first-screen" id="switch-menu-first-screen">
							<span class="icon"><span class="middle-line"></span></span>
							<span class="hidden-xs">МЕНЮ</span>
						</a>
					</div>
				</div>
				<div class="col-sm-6 col-xs-12 text-center wrap-logo">
					<a class="logo" href="/"></a>
				</div>
				<div class="col-sm-3 col-xs-12">
					<div class="contact-info">
						<span><?php the_field('phone', 'option'); ?></span><br />
						<?php the_field('address', 'option'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="middle-part">
		<div class="container-fluid hidden-xs">
			<div class="row">
				<div class="col-xs-12">
					<div class="text">Только качественная косметика,<br />только лучшие специалисты!</div>
					<div class="separate"></div>
				</div>
			</div>
		</div>
		
		<div class="container-fluid hidden-xs">
			<div class="row">
				<div class="col-xs-4 col-xs-offset-4">
					<div class="wrap-btn"><a class="btn btn-block btn-green fancybox-preset-registration" data-from="Домашняя страница первый блок" href="#fancybox-registration">ЗАПИСАТЬСЯ ONLINE</a></div>
				</div>
			</div>
		</div>
		
		<div class="social">
			<?php if( have_rows('social', 'option') ): ?>
				<?php while ( have_rows('social', 'option') ) : the_row(); ?>					
					<a href="<?php the_sub_field('href'); ?>"><?php the_sub_field('icon'); ?></a>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
	<div class="wrap-next-screen"><a href="#next-screen" class="next-screen scroll-to-first-screen"></a></div>
	
	<div class="wrap-bottom-mobile visible-xs"><a class="btn btn-block btn-green fancybox-preset-registration" data-from="Домашняя страница первый блок" href="#fancybox-registration">ЗАПИСАТЬСЯ ONLINE</a></div>
</div>
<div id="next-screen"></div>