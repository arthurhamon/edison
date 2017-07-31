<?php
/**
 * Product attributes
 *
 * Used by list_attributes() in the products class.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-attributes.php.
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
	exit;
}
?>
<div class="attributes">
	<div class="container">
		<div class="row">
			<?php $i=0; foreach ( $attributes as $attribute ) : $i++;
				$openTag = '';
				$closeTag = '';
				
				if($i==1) $openTag = '<div class="col-sm-3 col-sm-offset-1 col-xs-10 col-xs-offset-1">';					
				if($i==2) $closeTag = '</div>';		
				
				if($i==3) $openTag = '<div class="col-sm-3 col-xs-10 col-xs-offset-1">';	
				if($i==4) $closeTag = '</div>';	
				
				if($i==5) $openTag = '<div class="col-sm-3 col-sm-offset-1 col-xs-10 col-xs-offset-1">';	
			?>				
				<?php echo $openTag; ?>
					<div class="title"><?php echo wc_attribute_label( $attribute->get_name() ); ?></div>
					<?php
					$values = array();

					if ( $attribute->is_taxonomy() ) {
						$attribute_taxonomy = $attribute->get_taxonomy_object();
						$attribute_values = wc_get_product_terms( $product->get_id(), $attribute->get_name(), array( 'fields' => 'all' ) );

						foreach ( $attribute_values as $attribute_value ) {
							$value_name = esc_html( $attribute_value->name );
							
							$values[] = '<div class="sub-title">'.$value_name.'</div>';
							
							/*if ( $attribute_taxonomy->attribute_public ) {
								$values[] = '<a href="' . esc_url( get_term_link( $attribute_value->term_id, $attribute->get_name() ) ) . '" rel="tag">' . $value_name . '</a>';
							} else {
								$values[] = '<div class="sub-title">'.$value_name.'</div>';
							}*/
						}
					} else {
						$values = $attribute->get_options();

						foreach ( $values as &$value ) {
							$value = esc_html( $value );
						}
					}

					echo apply_filters( 'woocommerce_attribute', implode( '', $values), $attribute, $values );
					?>	
				<?php echo $closeTag; ?>
			<?php endforeach;?>
			<?php if($closeTag == '') echo '</div>'; ?>
		</div>
	</div>
</div>
