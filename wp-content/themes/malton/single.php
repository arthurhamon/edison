<?php get_header(); ?>
	<?php get_template_part('blocks/blog/blog-categories'); ?>
	<div class="single-blog">
		<div class="container">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
					<?php if( have_posts() ) : the_post(); ?>
						<h1 class="main-title"><?php the_title(); ?></h1>
						<div class="date">Дата публикации: <?php echo get_the_date('d.m.Y'); ?></div>
						<div class="text"><?php the_content(); ?></div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php comments_template(); ?>
	</div>
<?php get_footer(); ?>