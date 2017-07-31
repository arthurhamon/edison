<?php
add_filter('woocommerce_product_add_to_cart_text', 'wh_archive_custom_cart_button_text'); 
add_filter('woocommerce_product_single_add_to_cart_text', 'wh_archive_custom_cart_button_text'); 

function wh_archive_custom_cart_button_text()
{
    return 'в корзину';
}


// Change "Default Sorting" to "Our sorting" on shop page and in WC Product Settings
function skyverge_change_default_sorting_name( $catalog_orderby ) {
	
	unset($catalog_orderby["menu_order"]);
	unset($catalog_orderby["rating"]);
	unset($catalog_orderby["date"]);
		
		
	$catalog_orderby["price"] =  '<i class="fa fa-long-arrow-up" aria-hidden="true"></i> цене';
	$catalog_orderby["price-desc"] =  '<i class="fa fa-long-arrow-down" aria-hidden="true"></i> цене';
	//Меняем порядок
	$array_order = array('price', 'price-desc', 'popularity');
	$catalog_orderby = array_merge(array_flip($array_order), $catalog_orderby);	
	
	return $catalog_orderby;
}
add_filter( 'woocommerce_catalog_orderby', 'skyverge_change_default_sorting_name' );
add_filter( 'woocommerce_default_catalog_orderby_options', 'skyverge_change_default_sorting_name' );

remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );

// Hook in
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
	unset($fields['billing']['billing_company']);
	unset($fields['billing']['billing_last_name']);
	unset($fields['billing']['billing_country']);
	unset($fields['billing']['billing_address_1']);
	unset($fields['billing']['billing_address_2']);
	unset($fields['billing']['billing_city']);
	unset($fields['billing']['billing_state']);
	unset($fields['billing']['billing_postcode']);
	
	
	unset($fields['shipping']['shipping_country']);
	unset($fields['shipping']['shipping_address_1']);
	
	
	unset($fields['order']['order_comments']);
	$fields['billing']['billing_first_name']['placeholder'] = 'Как мы можем к вам обращаться';
	$fields['billing']['billing_phone']['label'] = 'Ваш контактный телефон';
	$fields['billing']['billing_phone']['placeholder'] = 'По которому мы сможем с вами связаться';
	$fields['billing']['billing_email']['label'] = 'Ваш email или ссылка на аккаунт в соцсетях';
	$fields['billing']['billing_email']['placeholder'] = 'Напишите email или вставте ссылку';
	/*echo('<pre>');
    var_dump($fields);
	echo('</pre>');*/
     return $fields;
}


function woocommerce_form_field( $key, $args, $value = null ) {
	$defaults = array(
		'type'              => 'text',
		'label'             => '',
		'description'       => '',
		'placeholder'       => '',
		'maxlength'         => false,
		'required'          => false,
		'autocomplete'      => false,
		'id'                => $key,
		'class'             => array(),
		'label_class'       => array(),
		'input_class'       => array(),
		'return'            => false,
		'options'           => array(),
		'custom_attributes' => array(),
		'validate'          => array(),
		'default'           => '',
		'autofocus'         => '',
		'priority'          => '',
	);

	$args = wp_parse_args( $args, $defaults );
	$args = apply_filters( 'woocommerce_form_field_args', $args, $key, $value );

	if ( $args['required'] ) {
		$args['class'][] = 'validate-required';
		$required = ' <abbr class="required" title="' . esc_attr__( 'required', 'woocommerce' ) . '">*</abbr>';
	} else {
		$required = '';
	}

	if ( is_string( $args['label_class'] ) ) {
		$args['label_class'] = array( $args['label_class'] );
	}

	if ( is_null( $value ) ) {
		$value = $args['default'];
	}

	// Custom attribute handling
	$custom_attributes         = array();
	$args['custom_attributes'] = array_filter( (array) $args['custom_attributes'] );

	if ( $args['maxlength'] ) {
		$args['custom_attributes']['maxlength'] = absint( $args['maxlength'] );
	}

	if ( ! empty( $args['autocomplete'] ) ) {
		$args['custom_attributes']['autocomplete'] = $args['autocomplete'];
	}

	if ( true === $args['autofocus'] ) {
		$args['custom_attributes']['autofocus'] = 'autofocus';
	}

	if ( ! empty( $args['custom_attributes'] ) && is_array( $args['custom_attributes'] ) ) {
		foreach ( $args['custom_attributes'] as $attribute => $attribute_value ) {
			$custom_attributes[] = esc_attr( $attribute ) . '="' . esc_attr( $attribute_value ) . '"';
		}
	}

	if ( ! empty( $args['validate'] ) ) {
		foreach ( $args['validate'] as $validate ) {
			$args['class'][] = 'validate-' . $validate;
		}
	}

	$field           = '';
	$label_id        = $args['id'];
	$sort            = $args['priority'] ? $args['priority'] : '';
	$field_container = '%3$s';

	switch ( $args['type'] ) {
		case 'country' :

			$countries = 'shipping_country' === $key ? WC()->countries->get_shipping_countries() : WC()->countries->get_allowed_countries();

			if ( 1 === sizeof( $countries ) ) {

				$field .= '<strong>' . current( array_values( $countries ) ) . '</strong>';

				$field .= '<input type="hidden" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" value="' . current( array_keys( $countries ) ) . '" ' . implode( ' ', $custom_attributes ) . ' class="country_to_state" />';

			} else {

				$field = '<select name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" class="country_to_state country_select ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" ' . implode( ' ', $custom_attributes ) . '>' . '<option value="">' . esc_html__( 'Select a country&hellip;', 'woocommerce' ) . '</option>';

				foreach ( $countries as $ckey => $cvalue ) {
					$field .= '<option value="' . esc_attr( $ckey ) . '" ' . selected( $value, $ckey, false ) . '>' . $cvalue . '</option>';
				}

				$field .= '</select>';

				$field .= '<noscript><input type="submit" name="woocommerce_checkout_update_totals" value="' . esc_attr__( 'Update country', 'woocommerce' ) . '" /></noscript>';

			}

			break;
		case 'state' :

			/* Get Country */
			$country_key = 'billing_state' === $key ? 'billing_country' : 'shipping_country';
			$current_cc  = WC()->checkout->get_value( $country_key );
			$states      = WC()->countries->get_states( $current_cc );

			if ( is_array( $states ) && empty( $states ) ) {

				$field_container = '<p class="form-row %1$s" id="%2$s" style="display: none">%3$s</p>';

				$field .= '<input type="hidden" class="hidden" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" value="" ' . implode( ' ', $custom_attributes ) . ' placeholder="' . esc_attr( $args['placeholder'] ) . '" />';

			} elseif ( is_array( $states ) ) {

				$field .= '<select name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" class="state_select ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" ' . implode( ' ', $custom_attributes ) . ' data-placeholder="' . esc_attr( $args['placeholder'] ) . '">
					<option value="">' . esc_html__( 'Select a state&hellip;', 'woocommerce' ) . '</option>';

				foreach ( $states as $ckey => $cvalue ) {
					$field .= '<option value="' . esc_attr( $ckey ) . '" ' . selected( $value, $ckey, false ) . '>' . $cvalue . '</option>';
				}

				$field .= '</select>';

			} else {

				$field .= '<input type="text" class="form-control big-height ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" value="' . esc_attr( $value ) . '"  placeholder="' . esc_attr( $args['placeholder'] ) . '" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" ' . implode( ' ', $custom_attributes ) . ' />';

			}

			break;
		case 'textarea' :

			$field .= '<textarea name="' . esc_attr( $key ) . '" class="form-control big-height ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" id="' . esc_attr( $args['id'] ) . '" placeholder="' . esc_attr( $args['placeholder'] ) . '" ' . ( empty( $args['custom_attributes']['rows'] ) ? ' rows="2"' : '' ) . ( empty( $args['custom_attributes']['cols'] ) ? ' cols="5"' : '' ) . implode( ' ', $custom_attributes ) . '>' . esc_textarea( $value ) . '</textarea>';

			break;
		case 'checkbox' :

			$field = '<label class="checkbox ' . implode( ' ', $args['label_class'] ) . '" ' . implode( ' ', $custom_attributes ) . '>
					<input type="' . esc_attr( $args['type'] ) . '" class="input-checkbox ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" value="1" ' . checked( $value, 1, false ) . ' /> '
					 . $args['label'] . $required . '</label>';

			break;
		case 'password' :
		case 'text' :
		case 'email' :
		case 'tel' :
		case 'number' :

			$field .= '<input type="' . esc_attr( $args['type'] ) . '" class="form-control big-height ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" placeholder="' . esc_attr( $args['placeholder'] ) . '"  value="' . esc_attr( $value ) . '" ' . implode( ' ', $custom_attributes ) . ' />';

			break;
		case 'select' :

			$options = $field = '';

			if ( ! empty( $args['options'] ) ) {
				foreach ( $args['options'] as $option_key => $option_text ) {
					if ( '' === $option_key ) {
						// If we have a blank option, select2 needs a placeholder
						if ( empty( $args['placeholder'] ) ) {
							$args['placeholder'] = $option_text ? $option_text : __( 'Choose an option', 'woocommerce' );
						}
						$custom_attributes[] = 'data-allow_clear="true"';
					}
					$options .= '<option value="' . esc_attr( $option_key ) . '" ' . selected( $value, $option_key, false ) . '>' . esc_attr( $option_text ) . '</option>';
				}

				$field .= '<select name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" class="select ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" ' . implode( ' ', $custom_attributes ) . ' data-placeholder="' . esc_attr( $args['placeholder'] ) . '">
						' . $options . '
					</select>';
			}

			break;
		case 'radio' :

			$label_id = current( array_keys( $args['options'] ) );

			if ( ! empty( $args['options'] ) ) {
				foreach ( $args['options'] as $option_key => $option_text ) {
					$field .= '<input type="radio" class="input-radio ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" value="' . esc_attr( $option_key ) . '" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '_' . esc_attr( $option_key ) . '"' . checked( $value, $option_key, false ) . ' />';
					$field .= '<label for="' . esc_attr( $args['id'] ) . '_' . esc_attr( $option_key ) . '" class="radio ' . implode( ' ', $args['label_class'] ) . '">' . $option_text . '</label>';
				}
			}

			break;
	}

	if ( ! empty( $field ) ) {
		$field_html = '';

		if ( $args['label'] && 'checkbox' != $args['type'] ) {
			$field_html .= '<span class="additional-placeholder">' . $args['label'] . ' <span>'. $required . '</span></span>';
		}

		$field_html .= $field;

		if ( $args['description'] ) {
			$field_html .= '<span class="description">' . esc_html( $args['description'] ) . '</span>';
		}

		$container_class = esc_attr( implode( ' ', $args['class'] ) );
		$container_id    = esc_attr( $args['id'] ) . '_field';
		$field           = sprintf( $field_container, $container_class, $container_id, $field_html );
	}

	$field = apply_filters( 'woocommerce_form_field_' . $args['type'], $field, $key, $args, $value );

	if ( $args['return'] ) {
		return $field;
	} else {
		echo $field;
	}
}

function woocommerce_widget_shopping_cart_button_view_cart() {
		echo '<a href="' . esc_url( wc_get_cart_url() ) . '" class="button wc-forward">test' . esc_html__( 'View cart', 'woocommerce' ) . '</a>';
	} 
function woocommerce_widget_shopping_cart_proceed_to_checkout() {
		echo '<a href="' . esc_url( wc_get_checkout_url() ) . '" class="button checkout wc-forward">test2' . esc_html__( 'Checkout', 'woocommerce' ) . '</a>';
	} 



