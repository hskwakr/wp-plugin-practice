<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="bg-light p-5 rounded-lg m-3">
  <h1>Plugin Settings</h1>

  <form method="POST" action="options.php">

<?php
settings_fields( 'plugin_name_custom_settings' );
do_settings_sections( 'plugin_name_custom_settings' );
?>

    <div class="mb-3 mt-3">
      <label for="exampleFormControlInput1">Email address</label>
      <input type="email" name="theemail" value="<?php echo get_option( 'theemail' ); ?>" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>

    <div class="mb-3">

<?php
$selected_option = get_option( 'thedays' );
?>

      <label for="exampleFormControlSelect1">Example select</label>
      <select name="thedays" class="form-control" id="exampleFormControlSelect1">
        <option <?php if ( $selected_option == 1 ) echo 'selected'; ?> >1</option>
        <option <?php if ( $selected_option == 2 ) echo 'selected'; ?> >2</option>
        <option <?php if ( $selected_option == 3 ) echo 'selected'; ?> >3</option>
        <option <?php if ( $selected_option == 4 ) echo 'selected'; ?> >4</option>
        <option <?php if ( $selected_option == 5 ) echo 'selected'; ?> >5</option>
      </select>
    </div>

    <div class="mb-3">

      <label for="exampleFormControlSelect2">Example multiple select</label>
      <select multiple name="themultiselect" class="form-control" id="exampleFormControlSelect2">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
      </select>
    </div>

    <button type="submit" class="btn btn-danger mb-2">Submit</button>
  </form>
</div>
