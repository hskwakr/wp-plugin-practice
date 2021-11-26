<?php
/**
 * @package hskwakr-practice
 */
namespace Inc\Base;

use \Inc\Base\BaseController;

/**
 * Class SettingsLinks
 * @author hskwakr
 */
class SettingsLinks extends BaseController
{
  public function register()
  {
    add_filter( 'plugin_action_links_' . $this->plugin_name, array( $this, 'settingsLink') );
  }

  public function settingsLink( $links )
  {
    $settings_link = '<a href="admin.php?page=hskwakr_practice">Settings</a>';

    array_push( $links, $settings_link );
    return $links;
  }
}
