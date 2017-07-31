<?php get_header(); ?>
	<div class="single-blog">
		<div class="container">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
					<?php if( have_posts() ) : the_post(); ?>
						<h1 class="main-title"><?php the_title(); ?></h1>
						<?php if(has_post_thumbnail()) : ?>
							<div class="img"><img src="<?php echo the_post_thumbnail_url(); ?>" /></div>
						<?php endif; ?>
						<div class="text"><?php the_content(); ?></div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>