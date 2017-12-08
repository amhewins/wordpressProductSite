<?php
if( !is_front_page() ) :
?>
</div>
<?php
endif;
?>

    <footer>
      <!-- <?php wp_nav_menu( array( 'theme_location' => 'image-menu' ) ); ?>
      <?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
      <?php wp_nav_menu( array( 'theme_location' => 'social-menu' ) ); ?>
      <?php wp_nav_menu( array( 'theme_location' => 'news-menu' ) ); ?> -->

      <div class="image">
        <div class="footer-logo">
          <img src="http://arcadia-hewins.com/treely/wp-content/uploads/2017/12/treely-1.png" alt="Treely Logo" />
        </div>
      </div>

      <div class="tnp tnp-subscription">
        <form method="post" action="http://arcadia-hewins.com/treely/?na=s" onsubmit="return newsletter_check(this)">
          <div class="tnp-field tnp-field-email"><label>Stay Connected With Our Newsletter</label><input class="tnp-email" type="email" name="ne" required>
          </div>
          <div class="tnp-field tnp-field-button"><input class="tnp-submit" type="submit" value="Subscribe">
          </div>
        </form>
      </div>

      <?php wp_nav_menu( array( 'theme_location' => 'social-menu' ) ); ?>
      <?php wp_nav_menu( array( 'theme_location' => 'contact-menu' ) ); ?>
      <?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
    </footer>

  </body>
</html>

<?php
wp_footer();
?>
