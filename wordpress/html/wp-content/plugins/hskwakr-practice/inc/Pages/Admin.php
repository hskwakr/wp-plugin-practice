<?php
/**
 * @package hskwakr-practice
 */
namespace Inc\Pages;

/**
 * Class Admin
 * @author hskwakr
 */
class Admin
{
  public function register()
  {
    add_action( 'admin_menu', array( $this, 'add_admin_page' ) );
  }

  function add_admin_page()
  {
    add_menu_page( 'hskwakr practice', 'hskwakr', 'manage_options', 'hskwakr_practice', array( $this, 'admin_index' ), 'dashicons-store', 110 );
  }

  function admin_index()
  {
    require_once PLUGIN_PATH . 'templates/admin.php';
  }
}
