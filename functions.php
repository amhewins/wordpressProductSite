<?php

function my_assets() {
	/*wp_enqueue_style( 'theme-style', get_template_directory_uri(), array( 'style' ) );*/
	wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );

<<<<<<< HEAD
	/*wp_enqueue_script( 'owl-carousel', get_stylesheet_directory_uri() . '/owl.carousel.js', array( 'jquery' ) );*/
	wp_enqueue_script( 'theme-scripts', get_stylesheet_directory_uri() . '/website-scripts.js', array( 'owl-carousel', 'jquery' ), '1.0', true );
=======
	wp_enqueue_script( 'theme-scripts', get_stylesheet_directory_uri() . '/website-scripts.js', array( 'jquery' ), '1.0', true );
>>>>>>> origin/master
}
add_action( 'wp_enqueue_scripts', 'my_assets' );

/*
  function theme_loader($directory)
  {
  	$pattern = $directory.'/*';
  	foreach(glob($pattern) as $file){
  		if(is_dir($file)){
  			theme_loader($file);
  		} else {
  			include_once $file;
  		}
  	}
  }
  theme_loader(dirname(__FILE__) . '/functions');
*/
function woocommerce_support() {
		add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'woocommerce_support' );

function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'banner-menu' => __( 'Banner Menu' ),
			'header-cart-menu' => __( 'Cart Menu' ),
			'footer-menu' => __( 'Footer Menu' ),
			'social-menu' => __( 'Social Menu' ),
    )
  );
}
add_action( 'init', 'register_my_menus' );

function bbloomer_redirectcustom( $order_id ){
    $order = new WC_Order( $order_id );

    $url = 'http://arcadia-hewins.com/treely/thank-you.php';

    if ( $order->status != 'failed' ) {
        wp_redirect($url);
        exit;
    }
}
add_action( 'woocommerce_thankyou', 'bbloomer_redirectcustom');

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

// Related Products Tab
function woo_custom_product_tab( $tabs ) {

    $custom_tab = array(
      		'custom_tab' =>  array(
    							'title' => __('Related Products','woocommerce'),
    							'priority' => 49,
    							'callback' => 'woo_custom_product_tab_content'
    						)
    				);
    return array_merge( $custom_tab, $tabs );
}

function woo_custom_product_tab_content() {
	woocommerce_related_products();
}
add_filter( 'woocommerce_product_tabs', 'woo_custom_product_tab' );

// Upsell Tab
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );

add_filter( 'woocommerce_product_tabs', 'woo_new_product_tab' );
function woo_new_product_tab( $tabs ) {

$tabs['upsell_tab'] = array(
    'title'     => __( 'You May Also Like', 'woocommerce' ),
    'priority'  => 50,
    'callback'  => 'woo_new_product_tab_content'
);

return $tabs;

}
function woo_new_product_tab_content() {

	woocommerce_upsell_display();

}

function ecomm_theme_wrapper_start() {
		global $post;
		echo '<section class="woo-content" role="main"><div class="container">';
}
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
add_action('woocommerce_before_main_content', 'ecomm_theme_wrapper_start', 10);
function ecomm_theme_wrapper_end() {
		echo '</div><!--/container--></section><!--/woo-content-->';
}
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action( 'woocommerce_after_main_content', 'ecomm_theme_wrapper_end', 10 );

add_filter( 'woocommerce_cross_sells_columns', 'change_cross_sells_columns' );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 7 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 15 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cart_totals', 10 );
remove_action( 'woocommerce_proceed_to_checkout', 'woocommerce_button_proceed_to_checkout', 20 );

add_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display', 5 );
add_action( 'woocommerce_cart_collaterals', 'woocommerce_cart_totals', 10 );
add_action( 'woocommerce_proceed_to_checkout', 'woocommerce_button_proceed_to_checkout', 20 );


 ?>
