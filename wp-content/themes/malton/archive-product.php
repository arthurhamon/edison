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
global $wp_query;
get_header( 'shop' ); 
?>

<div class="shop">
<?php get_template_part('blocks/base/shop-top-panel'); ?>
<?php get_template_part('blocks/shop/brand'); ?>
<?php if ( have_posts() ) : ?>
	<div class="container">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1">
				<div class="wrap-filter">
					<?php if ( function_exists('dynamic_sidebar') ) : ?>
						<div class="filters">
							<?php dynamic_sidebar('shop-header'); ?>
						</div>
					<?php endif; ?>
					
					<?php if ( function_exists('dynamic_sidebar') ) : ?>
						<?php dynamic_sidebar('shop-price-filter'); ?>
					<?php endif; ?>
				</div>
				
				<div class="row">
					<div class="col-sm-7 ol-xs-12">
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
					<div class="col-sm-5 ol-xs-12">
						<?php woocommerce_pagination(); ?>
					</div>
				</div>
				<div class="row">
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
	</div>
	
				
	<div class="bottom-panel">
		<div class="container">
			<div class="row">
				<div class="col-sm-5 col-sm-offset-1 ol-xs-12">
					<div class="on-page text-center-xs">
						
						<?php 			
						$onPage = array(9, 18, 27, 36, 45, 54, 63); 
						if($wp_query->query_vars['posts_per_page'] == -1) {
							$count_items = $wp_query->post_count;
						}
						else {
							$count_items = $wp_query->query_vars['posts_per_page'] * $wp_query->max_num_pages;
						}
						?>
						Показывать по: <br class="visible-xs" />
						<?php foreach($onPage as $row) : ?>
							<a class="<?php if($_GET['on-page'] == $row) echo 'active'; ?>" href="<?php echo getUrlParam('on-page', $row); ?>"><?php echo $row; ?></a>
						<?php 						
						if($row >= $count_items) break;
						endforeach; ?>
						<a class="<?php if($_GET['on-page'] == 'all') echo 'active'; ?>" href="<?php echo getUrlParam('on-page', 'all'); ?>">все</a>
					</div>
				</div>
				<div class="col-sm-5 ol-xs-12 text-right">
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
	<?php get_template_part('blocks/shop/tags'); ?>
	<?php get_template_part('blocks/shop/brands'); ?>
</div>
<?php get_template_part('blocks/shop/menu-categories'); ?>
<?php get_footer( 'shop' ); ?>
