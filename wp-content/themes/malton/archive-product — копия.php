<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); 

get_term_of_term('product_cat', 'product_brand', 'product');
?>

<div class="shop">
<?php get_template_part('blocks/base/shop-top-panel'); ?>
<?php if ( have_posts() ) : ?>
	<div class="container">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1">
				<?php if ( function_exists('dynamic_sidebar') ) : ?>
					<div class="filters">
						<?php dynamic_sidebar('shop-header'); ?>
					</div>
				<?php endif; ?>
				
				<div class="row">
					<div class="col-xs-6">
						<?php
							/**
							 * woocommerce_before_shop_loop hook.
							 *
							 * @hooked wc_print_notices - 10
							 * @hooked woocommerce_result_count - 20
							 * @hooked woocommerce_catalog_ordering - 30
							 */
							do_action( 'woocommerce_before_shop_loop' );
						?>
					</div>
					<div class="col-xs-6 text-right">
						<?php woocommerce_pagination(); ?>
					</div>
				</div>
				
				<div class="products">

				<?php woocommerce_product_loop_start(); ?>

					<?php woocommerce_product_subcategories(); ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php
							/**
							 * woocommerce_shop_loop hook.
							 *
							 * @hooked WC_Structured_Data::generate_product_data() - 10
							 */
							do_action( 'woocommerce_shop_loop' );
						?>

						<?php wc_get_template_part( 'content', 'product' ); ?>

					<?php endwhile; // end of the loop. ?>
				<?php woocommerce_product_loop_end(); ?>

				<div class="clearfix"></div>	
				</div>
			</div>
		</div>
	</div>
	
				
	<div class="bottom-panel">
		<div class="container">
			<div class="row">
				<div class="col-xs-5 col-xs-offset-1">
				</div>
				<div class="col-xs-5 text-right">
					<?php
						/**
						 * woocommerce_after_shop_loop hook.
						 *
						 * @hooked woocommerce_pagination - 10
						 */
						do_action( 'woocommerce_after_shop_loop' );
					?>	
				</div>
			</div>
		</div>
	</div>
		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php
				/**
				 * woocommerce_no_products_found hook.
				 *
				 * @hooked wc_no_products_found - 10
				 */
				do_action( 'woocommerce_no_products_found' );
			?>

		<?php endif; ?>
	<?php get_template_part('blocks/shop/brands'); ?>
</div>
<?php $product_cat = get_term_of_term('product_cat', 'product_brand', 'product'); ?>
<div id="menu-categories" class="menu-categories">
	<div class="inner">
	<div class="container">
		<div class="row">
			<div class="col-xs-4 parents-list">
				<?php if(isset($product_cat[0])) : ?>
				<ul>
					<?php foreach($product_cat[0] as $row) : ?>
						<li><a data-brand-list="#brand-list-<?php echo $row->term_id; ?>" href="#childs-<?php echo $row->term_id; ?>"><?php echo $row->name; ?></a></li>
					<?php endforeach; ?>
				</ul>				
				<?php endif; ?>
			</div>
			<div class="col-xs-4 childs-list">
				<?php foreach($product_cat[0] as $row) {
					writeParent($row->term_id, $product_cat, true);
				}?>
			</div>
			<div class="col-xs-4 brans-list">
				<div class="row">
					<?php foreach($product_cat[0] as $row) : ?>
						<?php if(count($row->link_terms)) : ?>
							<div class="item" id="brand-list-<?php echo $row->term_id; ?>">
								<?php $i=0; foreach($row->link_terms as $brand) : $i++;
									$img = get_field('img', $brand);
									$img = ($img) ? '<img src="'.$img['sizes']['image-auto-210'].'" alt="" />' : $brand->name;
								?>								
								<div class="col-xs-6"><a href=""><?php echo $img; ?></a></div>
								<?php if(!($i%2)) echo '<div class="clearfix"></div>'; ?>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
					<?php endforeach;?>
				</div>
			</div>
		</div>
	</div>
	</div>
</div>
<?php get_footer( 'shop' ); ?>
