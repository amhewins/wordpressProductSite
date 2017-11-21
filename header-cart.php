<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta id="viewport" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=1" />
        <title><?php wp_title(); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>
        <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
        <?php wp_head(); ?>

    </head>

  <body <?php body_class();?>>

  <?php
    wp_nav_menu( array( 'theme_location' => 'cart-menu' ) );
    ?>
    <?php if( is_front_page() ) :
      $front_page_id = get_option( 'page_on_front' );
      $image = get_field( 'home_banner', $front_page_id );
    ?>
      <div style="width:100%;"><img style="width: 100%; height: auto;" src="<?php echo $image['url']; ?>" /></div>
    <?php
        endif;
     ?>
  <div class="bodycontent">
