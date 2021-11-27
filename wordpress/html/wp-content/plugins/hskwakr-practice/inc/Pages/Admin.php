<?php
/**
 * @package hskwakr-practice
 */
namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;
use \Inc\Api\Callbacks\AdminCallbacks;

/**
 * Class Admin
 * @author hskwakr
 */
class Admin extends BaseController
{
  public $settings;
  public $callbacks;

  public $pages;
  public $subpages;

  public function register()
  {
    $this->settings = new SettingsApi();
    $this->callbacks = new AdminCallbacks();

    $this->setPages();
    $this->setSubpages();

    $this->settings
         ->addPages( $this->pages )
         ->withSubpages( 'Dashboard' )
         ->addSubpages( $this->subpages )
         ->register();
  }

  function setPages()
  {
    $this->pages = array(
      array(
        'page_title' => 'hskwakr practice',
        'menu_title' => 'hskwakr practice',
        'capability' => 'manage_options',
        'menu_slug'  => 'hskwakr_practice',
        'callback'   => array( $this->callbacks, 'adminDashboard' ),
        'icon_url'   => 'dashicons-admin-plugins',
        'position'   => 110
      ),
    );
  }

  function setSubpages()
  {
    $this->subpages = array(
      array(
        'parent_slug' => 'hskwakr_practice',
        'page_title'  => 'Custom Post Type',
        'menu_title'  => 'CPT',
        'capability'  => 'manage_options',
        'menu_slug'   => 'hskwakr_practice_cpt',
        'callback'    => function() { echo '<h1>CPT Manager</h1>'; }
      ),
      array(
        'parent_slug' => 'hskwakr_practice',
        'page_title'  => 'Custom Taxonomies',
        'menu_title'  => 'Taxonomies',
        'capability'  => 'manage_options',
        'menu_slug'   => 'hskwakr_practice_taxonomies',
        'callback'    => function() { echo '<h1>Taxonomies Manager</h1>'; }
      ),
      array(
        'parent_slug' => 'hskwakr_practice',
        'page_title'  => 'Custom Widgets',
        'menu_title'  => 'Widgets',
        'capability'  => 'manage_options',
        'menu_slug'   => 'hskwakr_practice_widgets',
        'callback'    => function() { echo '<h1>Widgets Manager</h1>'; }
      ),
    );
  }

  function adminIndex()
  {
    require_once $this->plugin_path . 'templates/admin.php';
  }
}
