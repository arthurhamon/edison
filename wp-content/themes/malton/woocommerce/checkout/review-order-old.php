<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
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
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="row">
	<div class="col-xs-6 text-right">
		<?php _e( 'Total', 'woocommerce' ); ?>:
	</div>
	<div class="col-xs-6 text-right">
		<?php do_action( 'woocommerce_review_order_before_order_total' ); ?>
			<?php wc_cart_totals_order_total_html(); ?>
		<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>
	</div>
</div>
