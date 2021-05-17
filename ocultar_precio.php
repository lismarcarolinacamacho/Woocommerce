<?php

/*
Plugin Name: Demo Plugin
Plugin URI: https://github.com/lismarcarolinacamacho/
Description: Mostrar Precio solo a los usuarios registrados
Version: 1.0
Author: Lismar Camacho
Author URI: https://github.com/lismarcarolinacamacho/
Licence: GPLv2
*/


 add_action('after_setup_theme','activate_filter') ;

function activate_filter(){
add_filter('woocommerce_get_price_html', 'show_price_logged');
}
function show_price_logged($price)
{
if(is_user_logged_in() ){
return $price;
} else {

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );

}
}