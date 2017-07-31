<?php if($_GET['sort-type']=='spec' && is_numeric($_GET['spec'])) : 
global $post;
$spec = get_post(intval($_GET['spec'])); 
$post = $spec; setup_postdata( $post );
?>
<div class="act-specialist">
	<div class="container">
		<div class="row">
			<div class="col-xs-4 col-xs-offset-2">
				<?php if(has_post_thumbnail()) : ?>
					<img src="<?php the_post_thumbnail_url('image-450-auto'); ?>" />
				<?php endif; ?>
			</div>
			<div class="col-xs-5">
				<div class="right-part">
					<div class="h2 title"><?php the_title(); ?></div>
					<div class="specialization"><?php the_field('specialization'); ?></div>
					<div class="text">
						<?php the_excerpt(); ?>
					</div>
					<a href="<?php the_permalink(); ?>">Подробнее о специалисте</a>
				</div>
			</div>
		</div>
	</div>
	<a href="#" onclick="$(this).parents('.act-specialist').hide(); return false;" class="close-btn"></a>
</div>
<?php wp_reset_postdata(); endif; ?>