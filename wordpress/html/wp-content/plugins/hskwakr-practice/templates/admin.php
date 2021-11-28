<div class="wrap">
  <h1>Admin page</h1>
  <?php settings_errors(); ?>

  <form method="post" action="options.php">
    <?php
      settings_fields( 'hskwakr_practice_option_groups' );
      do_settings_sections( 'hskwakr_practice' );
      submit_button();
    ?>
  </form>
</div>
