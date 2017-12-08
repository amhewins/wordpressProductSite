<?php
  get_header();
  ?>
  <?php if( is_front_page() ) :
    $front_page_id = get_option( 'page_on_front' );
    $image = get_field( 'home_banner', $front_page_id );
    $text = get_field('home_banner_text');
    $link = get_field('home_banner_button');
  ?>
    <div style="width:100%;"><img style="width: 100%; height: auto;" src="<?php echo $image['url']; ?>" /></div>
  <?php
      endif;
  get_footer();
 ?>
