<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <title>Treely - <?php wp_title("",true); ?></title>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta id="viewport" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=1" />
        <title><?php wp_title(); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <link href="https://fonts.googleapis.com/css?family=Catamaran|Shadows+Into+Light+Two" rel="stylesheet">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>
        <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
        <?php wp_head(); ?>

    </head>

  <body <?php body_class();?>>

    <div class="logo">
      <a href="http://arcadia-hewins.com/treely"><img src="http://arcadia-hewins.com/treely/wp-content/uploads/2017/12/treely-1.png" alt="Treely Logo" /> </a>
    </div>

  <?php
    wp_nav_menu( array( 'theme_location' => 'header-menu' ) );
    wp_nav_menu( array( 'theme_location' => 'header-bottom-menu' ) );
    if( !is_front_page() ) :
?>

  <div class="bodycontent">
<?php
    endif;
?>
<?php woocommerce_breadcrumb(); ?>
