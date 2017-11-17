<?php

function my_assets() {
	/*wp_enqueue_style( 'theme-style', get_template_directory_uri(), array( 'style' ) );*/
	wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );

	/*wp_enqueue_script( 'owl-carousel', get_stylesheet_directory_uri() . '/owl.carousel.js', array( 'jquery' ) );*/
	wp_enqueue_script( 'theme-scripts', get_stylesheet_directory_uri() . '/website-scripts.js', array( 'owl-carousel', 'jquery' ), '1.0', true );
}

  add_action( 'wp_enqueue_scripts', 'my_assets' );

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

  add_action( 'after_setup_theme', 'woocommerce_support' );
  function woocommerce_support() {
      add_theme_support( 'woocommerce' );
  }

  function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'banner-menu' => __( 'Banner Menu' ),
			'header-checkout-menu' => __( 'Checkout Menu' ),
			'footer-menu' => __( 'Footer Menu' ),
			'social-menu' => __( 'Social Menu' ),
    )
  );
}
add_action( 'init', 'register_my_menus' );

add_action( 'woocommerce_thankyou', 'bbloomer_redirectcustom');

function bbloomer_redirectcustom( $order_id ){
    $order = new WC_Order( $order_id );

    $url = 'http://arcadia-hewins.com/treely/thank-you.php';

    if ( $order->status != 'failed' ) {
        wp_redirect($url);
        exit;
    }
}

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

 ?>
