<?php get_header(); ?>	
<?php if( have_posts() ) : the_post(); ?>	
	<?php //get_template_part('blocks/front-page/list-actions'); ?>
<?php endif; ?>
<?php get_footer(); ?>
