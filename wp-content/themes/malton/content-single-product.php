<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<div id="product-<?php the_ID(); ?>" class="single-product">
<?php get_template_part('blocks/base/shop-top-panel'); ?>
	<div class="container">
		<div class="row">
			<div class="col-sm-5 col-sm-offset-1 col-xs-10 col-xs-offset-1">
				<div class="summary entry-summary">
					<div class="visible-xs"><?php woocommerce_template_single_title(); ?></div>
				</div>
				<?php
					/**
					 * woocommerce_before_single_product_summary hook.
					 *
					 * @hooked woocommerce_show_product_sale_flash - 10
					 * @hooked woocommerce_show_product_images - 20
					 */
					do_action( 'woocommerce_before_single_product_summary' );
				?>
			</div>
			<div class="col-sm-5 col-xs-10 col-xs-offset-1">
				<div class="summary entry-summary">
					<div class="hidden-xs"><?php woocommerce_template_single_title(); ?></div>
					<div class="row">
						<div class="col-sm-5 col-xs-12">
							<div class="price"><?php woocommerce_template_single_price(); ?></div>
						</div>
						<?php woocommerce_template_single_add_to_cart(); ?>
					</div>
					<div  class="description">
						<?php the_content(); ?>
					</div>
				</div><!-- .summary -->
			</div>
		</div>
	</div>
	<?php woocommerce_product_additional_information_tab(); ?>

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
