<?php get_header(); ?>	
<?php if( have_posts() ) : the_post(); ?>
	<div class="front-page">
		<?php get_template_part('blocks/front-page/first-screen'); ?>
		<?php get_template_part('blocks/front-page/this-is'); ?>
		<?php get_template_part('blocks/front-page/our-mission'); ?>
		<?php get_template_part('blocks/front-page/our-projects'); ?>
		<?php get_template_part('blocks/front-page/provider'); ?>
	</div>
<?php endif; ?>
<?php get_footer(); ?>
