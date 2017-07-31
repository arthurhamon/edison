<?php
/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
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
 * @version     2.3.6
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="cart_totals <?php if ( WC()->customer->has_calculated_shipping() ) echo 'calculated_shipping'; ?>">
	<?php do_action( 'woocommerce_before_cart_totals' ); ?>
	<?php 
		$total_quantities = 0;  
		if($cart_item_quantities = WC()->cart->get_cart_item_quantities()) {
			foreach($cart_item_quantities as $row) {
				$total_quantities += $row;
			}
		}
	?>

	<div><div class="count"><i class="fa fa-shopping-basket" aria-hidden="true"></i><div class="text"><?php echo $total_quantities; ?></div></div>
	<?php if($total_quantities) : ?>
		<a class="hidden-xs" href="<?php echo WC()->cart->get_cart_url(); ?>">Корзина</a>
	<?php else : ?>
		<span class="hidden-xs">Корзина</span>
	<?php endif; ?>
	</div>

	<?php do_action( 'woocommerce_after_cart_totals' ); ?>

</div>
