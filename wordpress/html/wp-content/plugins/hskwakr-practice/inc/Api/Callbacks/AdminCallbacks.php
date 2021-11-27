<?php
/**
 * @package hskwakr-practice
 */
namespace Inc\Api\Callbacks;

use \Inc\Base\BaseController;

/**
 * Class AdminCallbacks
 * @author hskwakr
 */
class AdminCallbacks extends BaseController
{
  public function adminDashboard()
  {
    return require_once(
      $this->plugin_path . '/templates/admin.php'
    );
  }

  public function adminCpt()
  {
    return require_once(
      $this->plugin_path . '/templates/cpt.php'
    );
  }

  public function adminTaxonomy()
  {
    return require_once(
      $this->plugin_path . '/templates/taxonomy.php'
    );
  }

  public function adminWidget()
  {
    return require_once(
      $this->plugin_path . '/templates/widget.php'
    );
  }

  public function optionGroup( $input )
  {
    return $input;
  }

  public function adminSection()
  {
    echo 'Check this awesome section!';
  }

  public function textExample()
  {
    $value = esc_attr( get_option( 'text_example' ) );

    echo '<input type="text" class="regular-text" name="text_example" value="' . $value . '" placeholder="Write something here...">';
  }
}
