<?php
/*
 The template for displaying 404 pages (Not Found)
*/

get_header(); ?>

<div class="page404">
  <h1>
    Oops! Page not found!
  </h1>
  <h5>Didn't find what you were looking for? Try searching here:
			<?php echo do_shortcode('[wpdreams_ajaxsearchlite]')?>
			</h5>
</div>

<?php get_footer(); ?>
