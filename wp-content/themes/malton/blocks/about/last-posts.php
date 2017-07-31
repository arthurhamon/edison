<?php $catId = get_field('category-post');
if($catId) :
$query = new WP_Query(array( 'post_type' => 'post', 'posts_per_page' => 3,
	'tax_query' => array(
		array(
			'taxonomy' => 'category',
			'field'    => 'id',
			'terms'    => $catId
		)
	)
)); ?>
<?php if($query->have_posts()) : ?>

<div id="press-center" class="last-posts hidden-xs">
	<h2 class="main-title">Пресс-центр</h2>
	<div class="container">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1">
				<div class="row">
					<?php while($query->have_posts()) : $query->the_post(); ?>
						<div class="col-xs-4">
							<?php if(has_post_thumbnail()) : ?>
								<div class="img"><img src="<?php the_post_thumbnail_url('image-370-auto'); ?>" /></div>
							<?php endif; ?>
							<h3 class="title"><?php the_title(); ?></h3>
							<div class="where"><?php the_field('where'); ?></div>
							<div class="text"><?php the_excerpt(); ?></div>
							<a class="more" href="<?php the_permalink(); ?>"></a>
						</div>
					<?php endwhile; ?> 
				</div>
			</div>
		</div>
	</div>
	<div class="all-posts text-center"><a href="<?php echo get_term_link( $catId ); ?>" class="btn btn-transparent-2 text-uppercase">Посмотреть все записи</a></div>
</div>

<?php endif; ?>
<?php endif; ?>