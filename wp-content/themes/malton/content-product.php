<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php post_class(); ?>>
	<div class="wrap-border">
		<div class="inner">
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
