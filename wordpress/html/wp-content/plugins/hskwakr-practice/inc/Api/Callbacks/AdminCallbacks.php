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
}
