<?php
    get_header();
?>

<?php
$images = get_field('home_banner_image');
$text = get_field('home_banner_text');
$link = get_field('home_banner_button');
    woocommerce_content();
   ?>

   <?php
       get_footer();
   ?>
