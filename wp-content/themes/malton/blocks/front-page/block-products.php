<?php 
global $post;
$meta_query  = WC()->query->get_meta_query();
$tax_query   = WC()->query->get_tax_query();
$tax_query[] = array(
	'taxonomy' => 'product_visibility',
	'field'    => 'name',
	'terms'    => 'featured',
	'operator' => 'IN',
);
$query = new WP_Query(array( 'post_type' => 'product', 'posts_per_page' => 9, 'meta_query' => $meta_query, 'tax_query' => $tax_query)); ?>
<?php if($query->have_posts()) : ?>
<div class="block-products">
	<div class="container">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1">
				<h2 class="main-title">Популярные товары в нашем <a href="/shop/">магазине</a></h2>
				<div class="row">
						<ul>
						<?php while ( $query->have_posts() ) : $query->the_post(); ?>
							<li>
								<div class="wrap-border">
									<div class="inner">
										<?php global $product; ?>
										<div class="bg">
											<div class="vertical-middle">
												<?php echo woocommerce_get_product_thumbnail(); ?>
											</div>
										</div>
										<div class="bottom-part">
											<h3 class="title"><?php echo the_title(); ?></h3>
											<div class="brand"><?php the_terms(get_the_ID(), 'product_brand'); ?></div>
											<div class="price"><?php echo woocommerce_template_loop_price(); ?></div>
										</div>
										<div class="hover-part">
											<div class="vertical-middle hidden-xs">
												<div>
													<a class="btn btn-transparent" href="<?php the_permalink(); ?>">Посмотреть</a>
												</div>
												<div>
													<span class="btn btn-transparent"><?php echo woocommerce_template_loop_add_to_cart(); ?></span>
												</div>
											</div>
											<a href="<?php the_permalink(); ?>" class="mobile-cover visible-xs"></a>
										</div>
									</div>
								</div>
							</li>
						<?php endwhile; ?>
						</ul>
					<?php endif; ?>
					
					
					<?php //echo do_shortcode('[featured_products per_page="9" columns="3"]'); ?>
				</div>
			</div>
		</div>
	</div>
</div>