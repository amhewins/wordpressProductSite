<?php
<<<<<<< HEAD
	get_header();
?>
<main>
	<h1><?php the_title(); ?></h1>
	<p>This is the index.php template.</p>
</main>
<?php
	get_footer();
?>
=======
    get_header();
?>

<?php
    if( have_posts() ):
      while ( have_posts()): the_post();
  ?>
        <div class="post">
          <h1><?php the_title(); ?></h1>
          <div class="content">
            <?php the_content(); ?>
          </div> <!--content-->
        </div> <!--post-->
  <?php
      endwhile;
    endif;
   ?>

   <?php
       get_footer();
   ?>
>>>>>>> origin/master
