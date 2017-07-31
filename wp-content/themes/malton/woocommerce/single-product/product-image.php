<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
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
 * @version 3.0.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $product;
$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
$full_size_image   = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
$image_title       = get_post_field( 'post_excerpt', $post_thumbnail_id );
$placeholder       = has_post_thumbnail() ? 'with-images' : 'without-images';
$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
	'woocommerce-product-gallery',
	'woocommerce-product-gallery--' . $placeholder,
	'woocommerce-product-gallery--columns-' . absint( $columns ),
	'images',
) );
?>

<div class="gallery">
	<div class="wrap-image">
		<div class="vertical-middle">
			<div class="image">
				<?php if ( has_post_thumbnail() ) : ?>
					<a class="fancybox" href="<?php echo esc_url( $full_size_image[0] ); ?>"><?php echo get_the_post_thumbnail( $post->ID, 'shop_single', $attributes );?></a>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="thumbnails">
		<div class="row">
		<?php
		$attributes = array(
			'title'                   => $image_title,
			'data-src'                => $full_size_image[0],
			'data-large_image'        => $full_size_image[0],
			'data-large_image_width'  => $full_size_image[1],
			'data-large_image_height' => $full_size_image[2],
		);
		$attachment_ids = $product->get_gallery_image_ids();
		if ( $attachment_ids && has_post_thumbnail() ) {
			$html  = '<div class="col-xs-4"><div data-thumb="' . get_the_post_thumbnail_url( $post->ID, 'shop_thumbnail' ) . '" data-full="' . get_the_post_thumbnail_url( $post->ID, 'full' ) . '" class="item active"><div class="vertical-middle"><a href="' . esc_url( $full_size_image[0] ) . '" style="background-image: url(' . get_the_post_thumbnail_url( $post->ID, 'shop_single' ) . ')">';
			//$html .= get_the_post_thumbnail( $post->ID, 'shop_single', $attributes );
			$html .= '</a></div></div></div>';
		}
		echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, get_post_thumbnail_id( $post->ID ) );

		do_action( 'woocommerce_product_thumbnails' );
		?>
		</div>
	</div>
</div>
