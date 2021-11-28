<div class="wrap">
  <h1>Admin page</h1>
  <?php settings_errors(); ?>

  <ul class="nav nav-tabs">
    <li class="active">
      <a href="tab-1">Manage Settings</a>
    </li>

    <li>
      <a href="tab-2">Updates</a>
    </li>

    <li>
      <a href="tab-3">About</a>
    </li>
  </ul>

  <div class="tab-content">
    <div id="tab-1" class="tab-pane active">
      <form method="post" action="options.php">
        <?php
          settings_fields( 'hskwakr_practice_option_groups' );
          do_settings_sections( 'hskwakr_practice' );
          submit_button();
        ?>
      </form>
    </div>

    <div id="tab-2">
      <h3>Updates</h3>
    </div>

    <div id="tab-3">
      <h3>About</h3>
    </div>
  </div>
</div>
