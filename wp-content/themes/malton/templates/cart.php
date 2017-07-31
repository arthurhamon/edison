<?php
/*
Template Name: cart
*/
?>
<?php get_header(); ?>
<?php if( have_posts() ) : the_post(); ?>
	<div class="cart-page">
		<div class="container">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2 col-sm-10 col-xs-offset-1">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
<?php get_footer(); ?> 